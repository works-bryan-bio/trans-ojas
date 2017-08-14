<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * OpportunitySellingPoints Controller
 *
 * @property \App\Model\Table\OpportunitySellingPointsTable $OpportunitySellingPoints
 */
class OpportunitySellingPointsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Opportunities']
        ];
        $this->set('opportunitySellingPoints', $this->paginate($this->OpportunitySellingPoints));
        $this->set('_serialize', ['opportunitySellingPoints']);
    }

    /**
     * View method
     *
     * @param string|null $id Opportunity Selling Point id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $opportunitySellingPoint = $this->OpportunitySellingPoints->get($id, [
            'contain' => ['Opportunities']
        ]);
        $this->set('opportunitySellingPoint', $opportunitySellingPoint);
        $this->set('_serialize', ['opportunitySellingPoint']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $opportunitySellingPoint = $this->OpportunitySellingPoints->newEntity();
        if ($this->request->is('post')) {
            $opportunitySellingPoint = $this->OpportunitySellingPoints->patchEntity($opportunitySellingPoint, $this->request->data);
            if ($this->OpportunitySellingPoints->save($opportunitySellingPoint)) {
                $this->Flash->success(__('The opportunity selling point has been saved.'));
                $action = $this->request->data['save'];
                if( $action == 'save' ){
                    return $this->redirect(['action' => 'index']);
                }else{
                    return $this->redirect(['action' => 'add']);
                }                    
            } else {
                $this->Flash->error(__('The opportunity selling point could not be saved. Please, try again.'));
            }
        }
        $opportunities = $this->OpportunitySellingPoints->Opportunities->find('list', ['limit' => 200]);
        $this->set(compact('opportunitySellingPoint', 'opportunities'));
        $this->set('_serialize', ['opportunitySellingPoint']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Opportunity Selling Point id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $opportunitySellingPoint = $this->OpportunitySellingPoints->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $opportunitySellingPoint = $this->OpportunitySellingPoints->patchEntity($opportunitySellingPoint, $this->request->data);
            if ($this->OpportunitySellingPoints->save($opportunitySellingPoint)) {
                $this->Flash->success(__('The opportunity selling point has been saved.'));
                $action = $this->request->data['save'];
                if( $action == 'save' ){
                    return $this->redirect(['action' => 'index']);
                }else{
                    return $this->redirect(['action' => 'edit', $id]);
                }         
            } else {
                $this->Flash->error(__('The opportunity selling point could not be saved. Please, try again.'));
            }
        }
        $opportunities = $this->OpportunitySellingPoints->Opportunities->find('list', ['limit' => 200]);
        $this->set(compact('opportunitySellingPoint', 'opportunities'));
        $this->set('_serialize', ['opportunitySellingPoint']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Opportunity Selling Point id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $opportunitySellingPoint = $this->OpportunitySellingPoints->get($id);
        if ($this->OpportunitySellingPoints->delete($opportunitySellingPoint)) {
            $this->Flash->success(__('The opportunity selling point has been deleted.'));
        } else {
            $this->Flash->error(__('The opportunity selling point could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
