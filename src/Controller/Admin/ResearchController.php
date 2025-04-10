<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;
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
            ->contain(['Users'])
            ->where(['submitted'=> true]);
        $research = $this->paginate($query);

        $this->Authorization->skipAuthorization();
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
        $research = $this->Research->get($id, contain: ['Users', 'ResearchSks', 'ResearchVerifications']);
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
        $research = $this->Research->newEmptyEntity();
        if ($this->request->is('post')) {
            $research = $this->Research->patchEntity($research, $this->request->getData());
            if ($this->Research->save($research)) {
                $this->Flash->success(__('The research has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The research could not be saved. Please, try again.'));
        }
        $users = $this->Research->Users->find('list', limit: 200)->all();
        $this->set(compact('research', 'users'));
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
        if ($this->request->is(['patch', 'post', 'put'])) {
            $research = $this->Research->patchEntity($research, $this->request->getData());
            if ($this->Research->save($research)) {
                $this->Flash->success(__('The research has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The research could not be saved. Please, try again.'));
        }
        $users = $this->Research->Users->find('list', limit: 200)->all();
        $this->set(compact('research', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Research id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $research = $this->Research->get($id);
        if ($this->Research->delete($research)) {
            $this->Flash->success(__('The research has been deleted.'));
        } else {
            $this->Flash->error(__('The research could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function show($file)
    {
        $this->Authorization->skipAuthorization();
        $response = $this->response->withFile(WWW_ROOT.'file'.DS.'research'.DS.$file);

        return $response;
    }
}
