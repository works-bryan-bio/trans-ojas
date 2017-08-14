<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * OpportunityStatuses Controller
 *
 * @property \App\Model\Table\OpportunityStatusesTable $OpportunityStatuses
 */
class OpportunityStatusesController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('opportunityStatuses', $this->paginate($this->OpportunityStatuses));
        $this->set('_serialize', ['opportunityStatuses']);
    }

    /**
     * View method
     *
     * @param string|null $id Opportunity Status id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $opportunityStatus = $this->OpportunityStatuses->get($id, [
            'contain' => ['Opportunities']
        ]);
        $this->set('opportunityStatus', $opportunityStatus);
        $this->set('_serialize', ['opportunityStatus']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $opportunityStatus = $this->OpportunityStatuses->newEntity();
        if ($this->request->is('post')) {
            $opportunityStatus = $this->OpportunityStatuses->patchEntity($opportunityStatus, $this->request->data);
            if ($this->OpportunityStatuses->save($opportunityStatus)) {
                $this->Flash->success(__('The opportunity status has been saved.'));
                $action = $this->request->data['save'];
                if( $action == 'save' ){
                    return $this->redirect(['action' => 'index']);
                }else{
                    return $this->redirect(['action' => 'add']);
                }                    
            } else {
                $this->Flash->error(__('The opportunity status could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('opportunityStatus'));
        $this->set('_serialize', ['opportunityStatus']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Opportunity Status id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $opportunityStatus = $this->OpportunityStatuses->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $opportunityStatus = $this->OpportunityStatuses->patchEntity($opportunityStatus, $this->request->data);
            if ($this->OpportunityStatuses->save($opportunityStatus)) {
                $this->Flash->success(__('The opportunity status has been saved.'));
                $action = $this->request->data['save'];
                if( $action == 'save' ){
                    return $this->redirect(['action' => 'index']);
                }else{
                    return $this->redirect(['action' => 'edit', $id]);
                }         
            } else {
                $this->Flash->error(__('The opportunity status could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('opportunityStatus'));
        $this->set('_serialize', ['opportunityStatus']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Opportunity Status id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $opportunityStatus = $this->OpportunityStatuses->get($id);
        if ($this->OpportunityStatuses->delete($opportunityStatus)) {
            $this->Flash->success(__('The opportunity status has been deleted.'));
        } else {
            $this->Flash->error(__('The opportunity status could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
