<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;
use Cake\Routing\Router;
use Cake\Network\Email\Email;

/**
 * OpportunityTypes Controller
 *
 * @property \App\Model\Table\OpportunityTypesTable $OpportunityTypes
 */
class OpportunityTypesController extends AppController
{

    /**
     * Initialize method     
     *
     */
    public function initialize()
    {
        parent::initialize();
    
        // Add the selected sidebar-menu 'active' class
        // Valid value can be found in NavigationSelectorHelper        
        $nav_selected = ["opportunity_types"];
        $this->set('nav_selected', $nav_selected);

    }

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('opportunityTypes', $this->paginate($this->OpportunityTypes));
        $this->set('_serialize', ['opportunityTypes']);
    }

    /**
     * View method
     *
     * @param string|null $id Opportunity Type id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $opportunityType = $this->OpportunityTypes->get($id, [
            'contain' => ['Opportunities']
        ]);
        $this->set('opportunityType', $opportunityType);
        $this->set('_serialize', ['opportunityType']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $opportunityType = $this->OpportunityTypes->newEntity();
        if ($this->request->is('post')) {
            $opportunityType = $this->OpportunityTypes->patchEntity($opportunityType, $this->request->data);
            if ($this->OpportunityTypes->save($opportunityType)) {
                $this->Flash->success(__('The opportunity type has been saved.'));
                $action = $this->request->data['save'];
                if( $action == 'save' ){
                    return $this->redirect(['action' => 'index']);
                }else{
                    return $this->redirect(['action' => 'add']);
                }                    
            } else {
                $this->Flash->error(__('The opportunity type could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('opportunityType'));
        $this->set('_serialize', ['opportunityType']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Opportunity Type id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $opportunityType = $this->OpportunityTypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $opportunityType = $this->OpportunityTypes->patchEntity($opportunityType, $this->request->data);
            if ($this->OpportunityTypes->save($opportunityType)) {
                $this->Flash->success(__('The opportunity type has been saved.'));
                $action = $this->request->data['save'];
                if( $action == 'save' ){
                    return $this->redirect(['action' => 'index']);
                }else{
                    return $this->redirect(['action' => 'edit', $id]);
                }         
            } else {
                $this->Flash->error(__('The opportunity type could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('opportunityType'));
        $this->set('_serialize', ['opportunityType']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Opportunity Type id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $opportunityType = $this->OpportunityTypes->get($id);
        if ($this->OpportunityTypes->delete($opportunityType)) {
            $this->Flash->success(__('The opportunity type has been deleted.'));
        } else {
            $this->Flash->error(__('The opportunity type could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
