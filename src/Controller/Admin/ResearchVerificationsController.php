<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;

/**
 * ResearchVerifications Controller
 *
 * @property \App\Model\Table\ResearchVerificationsTable $ResearchVerifications
 * @property \Authorization\Controller\Component\AuthorizationComponent $Authorization
 */
class ResearchVerificationsController extends AppController
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
        $query = $this->ResearchVerifications->find()
            ->contain(['Research', 'Users']);
        //$query = $this->Authorization->applyScope($query);
        $researchVerifications = $this->paginate($query);

        $this->set(compact('researchVerifications'));
    }

    /**
     * View method
     *
     * @param string|null $id Research Verification id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $researchVerification = $this->ResearchVerifications->get($id, contain: ['Research', 'Users']);
        $this->Authorization->authorize($researchVerification);
        $this->set(compact('researchVerification'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function verify($researchId)
    {
        $researchVerification = $this->ResearchVerifications->newEmptyEntity();
        $this->Authorization->authorize($researchVerification);

        if ($this->request->is('post')) {
            $researchVerification = $this->ResearchVerifications->patchEntity($researchVerification, $this->request->getData());
            $researchVerification->research_id = $researchId;
            $researchVerification->user_id = $this->request->getAttribute('identity')->getIdentifier();

            if ($this->ResearchVerifications->save($researchVerification)) {
                $this->Flash->success(__('The research verification has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The research verification could not be saved. Please, try again.'));
        }
        $research = $this->ResearchVerifications->Research->get($researchId);
        $users = $this->ResearchVerifications->Users->find('list', limit: 200)->all();
        $this->set(compact('researchVerification', 'research', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Research Verification id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $researchVerification = $this->ResearchVerifications->get($id, contain: []);
        $this->Authorization->authorize($researchVerification);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $researchVerification = $this->ResearchVerifications->patchEntity($researchVerification, $this->request->getData());
            $researchVerification->user_id = $this->request->getAttribute('identity')->getIdentifier();

            if ($this->ResearchVerifications->save($researchVerification)) {
                $this->Flash->success(__('The research verification has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The research verification could not be saved. Please, try again.'));
        }
        $research = $this->ResearchVerifications->Research->find('list', limit: 200)->all();
        $users = $this->ResearchVerifications->Users->find('list', limit: 200)->all();
        $this->set(compact('researchVerification', 'research', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Research Verification id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $researchVerification = $this->ResearchVerifications->get($id);
        $this->Authorization->authorize($researchVerification);
        if ($this->ResearchVerifications->delete($researchVerification)) {
            $this->Flash->success(__('The research verification has been deleted.'));
        } else {
            $this->Flash->error(__('The research verification could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
