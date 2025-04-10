<?php
declare(strict_types=1);

namespace App\Controller;

use CakePdf\View\PdfView;
/**
 * ResearchSks Controller
 *
 * @property \App\Model\Table\ResearchSksTable $ResearchSks
 * @property \Authorization\Controller\Component\AuthorizationComponent $Authorization
 */
class ResearchSksController extends AppController
{
    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        $this->Authentication->addUnauthenticatedActions(['valid']);
    }
    /**
     * Initialize controller
     *
     * @return void
     */
    public function initialize(): void
    {
        parent::initialize();

        $this->loadComponent('Authorization.Authorization');
        $this->addViewClasses([PdfView::class]);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->ResearchSks->find()
            ->contain(['Research']);
        $query = $this->Authorization->applyScope($query);
        $researchSks = $this->paginate($query);

        $this->set(compact('researchSks'));
    }

    public function valid($id)
    {
      $this->Authorization->skipAuthorization();
      $sk = $this->ResearchSks->get($id);

      $this->set(compact('sk'));
    }

    public function download($id)
    {
      $this->Authorization->skipAuthorization();
      $researchSk = $this->ResearchSks->get($id, contain:['Research']);
      $useriId = $this->request->getAttribute('identity')->id;
      $profile = $this->ResearchSks->Research->Users->Profiles->find('all', conditions:['user_id'=>$useriId])->first();


      $this->viewBuilder()->setClassName('CakePdf.Pdf');
      $this->viewBuilder()->setOption(
            'pdfConfig',
            [
                'enable_local_file_access'=>true,
                'orientation' => 'portrait',
                'filename' => 'SKP_' . $profile->nik,
            ]
        );



      $this->set(compact('researchSk','profile'));
      //debug($profile);
    }
}
