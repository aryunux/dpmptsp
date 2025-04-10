<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Profiles Controller
 *
 * @property \App\Model\Table\ProfilesTable $Profiles
 */
class ProfilesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
      return $this->redirect(['controller'=>'users','action' => 'index']);
    }

    /**
     * View method
     *
     * @param string|null $id Profile id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $profile = $this->Profiles->get($id, contain: ['Users']);
        $this->Authorization->authorize($profile);

        $this->set(compact('profile'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $profile = $this->Profiles->newEmptyEntity();
        if ($this->request->is('post')) {
            $profile = $this->Profiles->patchEntity($profile, $this->request->getData());
            $profile->user_id = $this->request->getAttribute('identity')->getIdentifier();

            if(!$profile->getErrors){
              $pasfoto = $this->request->getData('pasfoto');
              $namaPasfoto = $pasfoto->getClientFilename();
              $targetPasfoto = WWW_ROOT.'img'.DS.'profiles'.DS.'pasfoto'.DS.$namaPasfoto;

              if($namaPasfoto)
              $pasfoto->moveTo($targetPasfoto);

              $ktp = $this->request->getData('ktp');
              $namaKtp = $ktp->getClientFilename();
              $targetKtp = WWW_ROOT.'img'.DS.'profiles'.DS.'ktp'.DS.$namaKtp;

              if($namaKtp)
              $ktp->moveTo($targetKtp);

              $profile->pasfoto = $namaPasfoto;
              $profile->ktp = $namaKtp;
            }

            if ($this->Profiles->save($profile)) {
                $this->Flash->success(__('The profile has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The profile could not be saved. Please, try again.'));
        }
        $users = $this->Profiles->Users->find('list', limit: 200)->all();
        $this->set(compact('profile', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Profile id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $profile = $this->Profiles->get($id, contain: []);
        $this->Authorization->authorize($profile);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $profile = $this->Profiles->patchEntity($profile, $this->request->getData());
            $profile->user_id = $this->request->getAttribute('identity')->getIdentifier();


            if ($this->Profiles->save($profile)) {
                $this->Flash->success(__('The profile has been saved.'));

                return $this->redirect(['action' => 'view',$id]);
            }
            $this->Flash->error(__('The profile could not be saved. Please, try again.'));
        }
        $users = $this->Profiles->Users->find('list', limit: 200)->all();
        $this->set(compact('profile', 'users'));
    }



    public function updatePasfoto($id = null)
    {
      $this->Authorization->skipAuthorization();
      $profile = $this->Profiles->get($id, contain: []);
      if ($this->request->is(['patch', 'post', 'put'])) {
          $profile = $this->Profiles->patchEntity($profile, $this->request->getData());
          $type = ['image/jpg','image/jpeg','image/png'];
          if(!$profile->getErrors){
            $pasfoto = $this->request->getData('pasfoto');
            $namaPasfoto = $pasfoto->getClientFilename();
            $targetPasfoto = WWW_ROOT.'img'.DS.'profiles'.DS.'pasfoto'.DS.$namaPasfoto;

            if(!$pasfoto->getError()){
                if(!in_array($pasfoto->getClientMediaType(),$type))
                {
                    $this->Flash->error(__('Tipe File tidak sesuai'));
                    return $this->redirect(['action' => 'view',$id]);

                } else if($pasfoto->getSize() > 1000000) {
                    $this->Flash->error(__('Ukuran file maksimal 1MB'));
                    return $this->redirect(['action' => 'view',$id]);
                } else {
                    if($namaPasfoto)
                    $pasfoto->moveTo($targetPasfoto);
                    $profile->pasfoto = $namaPasfoto;
                }
            }

          }

          if ($this->Profiles->save($profile)) {
              $this->Flash->success(__('The profile has been saved.'));

              return $this->redirect(['action' => 'view',$id]);
          }
          $this->Flash->error(__('The profile could not be saved. Please, try again.'));
      }
      $users = $this->Profiles->Users->find('list', limit: 200)->all();
      $this->set(compact('profile', 'users'));
    }

    public function updateKtp($id = null)
    {
      $profile = $this->Profiles->get($id, contain: []);
      if ($this->request->is(['patch', 'post', 'put'])) {
          $profile = $this->Profiles->patchEntity($profile, $this->request->getData());

          if(!$profile->getErrors){
            $ktp = $this->request->getData('ktp');
            $namaKtp = $ktp->getClientFilename();
            $targetKtp = WWW_ROOT.'img'.DS.'profiles'.DS.'ktp'.DS.$namaKtp;

            if($namaKtp)
            $ktp->moveTo($targetKtp);
            $profile->ktp = $namaKtp;
          }

          if ($this->Profiles->save($profile)) {
              $this->Flash->success(__('The profile has been saved.'));

              return $this->redirect(['action' => 'view',$id]);
          }
          $this->Flash->error(__('The profile could not be saved. Please, try again.'));
      }
      $users = $this->Profiles->Users->find('list', limit: 200)->all();
      $this->set(compact('profile', 'users'));
    }
}
