<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{

    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        $this->Authentication->addUnauthenticatedActions(['login','register']);
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {

      $id = $this->request->getAttribute('identity')->id;
      $user = $this->Users->get($id, contain: ['Profiles','Research']);

      $this->Authorization->authorize($user);
        $this->set(compact('user'));
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function register()
    {
        $this->Authorization->skipAuthorization();

        $this->viewBuilder()->setLayout('landingpage');

        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $user->role = 'user';
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Data Berhasil disimpan, lanjutkan melengkapi profil'));

                return $this->redirect(['controller'=>'profiles','action' => 'add']);
            }
            $this->Flash->error(__('Tidak dapat menyimpan, mohon ulangi lagi.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $user->role = 'user';
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }

        $this->Authorization->authorize($user);
        $this->set(compact('user'));
    }



    public function login()
    {
        $this->Authorization->skipAuthorization();

        $this->viewBuilder()->setLayout('landingpage');
        $this->request->allowMethod(['get', 'post']);
        $result = $this->Authentication->getResult();

        if ($result && $result->isValid()) {
            // redirect after login
            if($this->request->getAttribute('identity')->role=='admin' || $this->request->getAttribute('identity')->role=='staff'){
              $redirect = $this->request->getQuery('redirect', [
              'prefix'=>'Admin',
              'controller' => 'research',
              'action' => 'index',
              ]);
              return $this->redirect($redirect);
          } else {
              $redirect = $this->request->getQuery('redirect', [
              'prefix'=> false,
              'controller' => 'users',
              'action' => 'index',
              ]);
              return $this->redirect($redirect);
          }
        }
        // display error if user submitted and authentication failed
        if ($this->request->is('post') && !$result->isValid()) {
            $this->Flash->error(__('Invalid username or password'));
        }
    }

    public function logout()
    {
        $this->Authorization->skipAuthorization();

        $result = $this->Authentication->getResult();
        // regardless of POST or GET, redirect if user is logged in
        if ($result && $result->isValid()) {
            $this->Authentication->logout();
            return $this->redirect(['controller' => 'Pages', 'action' => 'index']);
        }
    }
}
