<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;
use Cake\Chronos\ChronosDate;

/**
 * ResearchSks Controller
 *
 * @property \App\Model\Table\ResearchSksTable $ResearchSks
 * @property \Authorization\Controller\Component\AuthorizationComponent $Authorization
 */
class ResearchSksController extends AppController
{
    /**
     * Initialize controller
     *
     * @return void
     */
    public function initialize(): void
    {
        parent::initialize();

        $this->loadComponent('Authorization.Authorization');
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->Authorization->skipAuthorization();

        $query = $this->ResearchSks->find()
            ->contain(['Research'])
            ->where(['tandatangan'=>false]);

        $researchSks = $this->paginate($query);

        $queryTtd = $this->ResearchSks->find()
            ->contain(['Research'])
            ->where(['tandatangan'=>true]);
        //$query = $this->Authorization->applyScope($query);
        $researchSksTtd = $this->paginate($queryTtd);


        $this->set(compact('researchSks','researchSksTtd'));
    }

    /**
     * View method
     *
     * @param string|null $id Research Sk id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $researchSk = $this->ResearchSks->get($id, contain: ['Research']);
        $this->Authorization->authorize($researchSk);
        $this->set(compact('researchSk'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $researchSk = $this->ResearchSks->newEmptyEntity();
        $this->Authorization->authorize($researchSk);
        if ($this->request->is('post')) {
            $researchSk = $this->ResearchSks->patchEntity($researchSk, $this->request->getData());


            if ($this->ResearchSks->save($researchSk)) {
                $this->Flash->success(__('The research sk has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The research sk could not be saved. Please, try again.'));
        }
        $research = $this->ResearchSks->Research->find('list', limit: 200)->all();
        $this->set(compact('researchSk', 'research'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Research Sk id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $researchSk = $this->ResearchSks->get($id, contain: []);
        $this->Authorization->authorize($researchSk);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $researchSk = $this->ResearchSks->patchEntity($researchSk, $this->request->getData());
            if ($this->ResearchSks->save($researchSk)) {
                $this->Flash->success(__('The research sk has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The research sk could not be saved. Please, try again.'));
        }
        $research = $this->ResearchSks->Research->find('list', limit: 200)->all();
        $this->set(compact('researchSk', 'research'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Research Sk id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $researchSk = $this->ResearchSks->get($id);
        $this->Authorization->authorize($researchSk);
        if ($this->ResearchSks->delete($researchSk)) {
            $this->Flash->success(__('The research sk has been deleted.'));
        } else {
            $this->Flash->error(__('The research sk could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function terbit($researchid)
    {
        $researchSk = $this->ResearchSks->newEmptyEntity();
        //$this->Authorization->authorize($researchSk);
        $this->Authorization->skipAuthorization();

        $getLast = $this->ResearchSks->find('all',order:['ResearchSks.created'=>'ASC'])->first();
        $expld = explode('/',"$getLast");
        $n0 = "503";
        $n1 = "DPMPTSP-BB";
        $n2 = "SKP";
        $n5 = DATE('Y');

        if(!empty($getLast))
        {
            if($expld[5] < $n5 ) {
              $n3 = 1 ;
            } else {
              $n3 = $expld[3]+1 ;
            }
        } else {
          $n3 = 1;
        }

        $b = DATE('n');
        $n4 = $this->intToRoman($b);
        $new = implode('/',[$n0,$n1,$n2,$n3,$n4,$n5]);


        if ($this->request->is('post')) {
            $researchSk = $this->ResearchSks->patchEntity($researchSk, $this->request->getData());
            $researchSk->research_id = $researchid;
            $researchSk->no_sk = $new;
            if ($this->ResearchSks->save($researchSk)) {
                $this->Flash->success(__('The research sk has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The research sk could not be saved. Please, try again.'));
        }
        $research = $this->ResearchSks->Research->find('list', limit: 200)->all();
        $this->set(compact('researchSk', 'research','new'));
    }

    public function ttd($id)
    {

      $researchSk = $this->fetchTable('ResearchSks');


      $sk = $this->ResearchSks->find('all')->where(['id' =>$id])->first();
      $this->Authorization->authorize($sk);

      $sk->tandatangan = true;
      $sk->tanggal_ttd = new ChronosDate();

       if($researchSk->save($sk)){
         $this->Flash->success(__('Tanda Tangan Berhasil'));
         return $this->redirect(['controller'=>'ResearchSks','action' => 'index']);
       }
    }


    public function intToRoman($num) {
        $mapping = [
            1000 => 'M',
            900 => 'CM',
            500 => 'D',
            400 => 'CD',
            100 => 'C',
            90 => 'XC',
            50 => 'L',
            40 => 'XL',
            10 => 'X',
            9 => 'IX',
            5 => 'V',
            4 => 'IV',
            1 => 'I'
        ];

        $result = '';

        foreach ($mapping as $value => $roman) {
            while ($num >= $value) {
                $result .= $roman;
                $num -= $value;
            }
        }

        return $result;
    }

}
