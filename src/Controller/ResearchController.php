<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Http\CallbackStream;
use Laminas\Diactoros\Stream;
use Psr\Http\Message\StreamInterface;
/**
 * Research Controller
 *
 * @property \App\Model\Table\ResearchTable $Research
 */
class ResearchController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Research->find()
            ->contain(['Users']);
        $research = $this->paginate($query);

        $this->set(compact('research'));
    }

    /**
     * View method
     *
     * @param string|null $id Research id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $research = $this->Research->get($id, contain: ['Users', 'ResearchVerifications','ResearchSks']);
        $this->Authorization->authorize($research);

        $this->set(compact('research'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->Authorization->skipAuthorization();

        $id =$this->request->getAttribute('identity')->id;
        $user = $this->Research->Users->get($id,contain: ['Profiles']);
        if(!empty($user->profile)){
            $research = $this->Research->newEmptyEntity();
            if ($this->request->is('post')) {
                $research = $this->Research->patchEntity($research, $this->request->getData());
                $research->user_id = $this->request->getAttribute('identity')->id;

                if(!$research->getErrors){
                  $permohonan = $this->request->getData('surat_permohonan');
                  $namaSuratPermohonan = $permohonan->getClientFilename();
                  $targetSuratPermohonan = WWW_ROOT.'file'.DS.'research'.DS.$namaSuratPermohonan;

                  if($namaSuratPermohonan)
                  $permohonan->moveTo($targetSuratPermohonan);

                  $pernyataan = $this->request->getData('surat_pernyataan');
                  $namaSuratPernyataan = $pernyataan->getClientFilename();
                  $targetSuratPernyataan = WWW_ROOT.'file'.DS.'research'.DS.$namaSuratPernyataan;

                  if($namaSuratPernyataan)
                  $pernyataan->moveTo($targetSuratPernyataan);

                  $dokumenTambahan = $this->request->getData('dokumen_tambahan');
                  $namaDokumenTambahan = $dokumenTambahan->getClientFilename();
                  $targetDokumenTambahan = WWW_ROOT.'file'.DS.'research'.DS.$namaDokumenTambahan;

                  if($namaDokumenTambahan)
                  $dokumenTambahan->moveTo($targetDokumenTambahan);

                  $research->surat_permohonan = $namaSuratPermohonan;
                  $research->surat_pernyataan = $namaSuratPernyataan;
                  $research->dokumen_tambahan = $namaDokumenTambahan;
                }

                if ($this->Research->save($research)) {
                    $this->Flash->success(__('The research has been saved.'));

                    return $this->redirect(['controller'=>'users','action' => 'index']);
                }
                $this->Flash->error(__('The research could not be saved. Please, try again.'));
            }

            $users = $this->Research->Users->find('list', limit: 200)->all();
            $this->set(compact('research', 'users'));
          }else{
            $this->Flash->error(__('Anda Harus melengkapi profil terlebih dahulu'));
            return $this->redirect(['controller'=>'profiles','action' => 'add']);
          }
    }

    /**
     * Edit method
     *
     * @param string|null $id Research id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {

        $research = $this->Research->get($id, contain: []);
        $this->Authorization->authorize($research);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $research = $this->Research->patchEntity($research, $this->request->getData());
            $research->user_id = $this->request->getAttribute('identity')->id;

            if(!$research->getErrors){
              $permohonan = $this->request->getData('surat_permohonan');
              $namaSuratPermohonan = $this->request->getAttribute('identity')->username.'_'.$permohonan->getClientFilename();
              $targetSuratPermohonan = WWW_ROOT.'file'.DS.'research'.DS.$namaSuratPermohonan;

              if($namaSuratPermohonan)
              $permohonan->moveTo($targetSuratPermohonan);

              $pernyataan = $this->request->getData('surat_pernyataan');
              $namaSuratPernyataan = $this->request->getAttribute('identity')->username.'_'.$pernyataan->getClientFilename();
              $targetSuratPernyataan = WWW_ROOT.'file'.DS.'research'.DS.$namaSuratPernyataan;

              if($namaSuratPernyataan)
              $pernyataan->moveTo($targetSuratPernyataan);

              $dokumenTambahan = $this->request->getData('dokumen_tambahan');
              $namaDokumenTambahan = $this->request->getAttribute('identity')->username.'_'.$dokumenTambahan->getClientFilename();
              $targetDokumenTambahan = WWW_ROOT.'file'.DS.'research'.DS.$namaDokumenTambahan;

              if($namaDokumenTambahan)
              $dokumenTambahan->moveTo($targetDokumenTambahan);

              $research->surat_permohonan = $namaSuratPermohonan;
              $research->surat_pernyataan = $namaSuratPernyataan;
              $research->dokumen_tambahan = $namaDokumenTambahan;
            }

            if ($this->Research->save($research)) {
                $this->Flash->success(__('The research has been saved.'));

                return $this->redirect(['controller'=>'users','action' => 'index']);
            }
            $this->Flash->error(__('The research could not be saved. Please, try again.'));
        }
        $users = $this->Research->Users->find('list', limit: 200)->all();
        $this->set(compact('research', 'users'));
    }



    public function show($file)
    {
        $this->Authorization->skipAuthorization();
        $response = $this->response->withFile(WWW_ROOT.'file'.DS.'research'.DS.$file);

        return $response;
    }

    public function download($file)
    {
        $this->Authorization->skipAuthorization();
        $response = $this->response->withFile(WWW_ROOT.'file'.DS.'formulir'.DS.$file);

        return $response;
    }


}
