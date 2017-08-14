<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;
use Cake\Routing\Router;
use Cake\Network\Email\Email;

/**
 * JobRoles Controller
 *
 * @property \App\Model\Table\JobRolesTable $JobRoles
 */
class JobRolesController extends AppController
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
        $nav_selected = ["job_roles"];
        $this->set('nav_selected', $nav_selected);

    }

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('jobRoles', $this->paginate($this->JobRoles));
        $this->set('_serialize', ['jobRoles']);
    }

    /**
     * View method
     *
     * @param string|null $id Job Role id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $jobRole = $this->JobRoles->get($id, [
            'contain' => []
        ]);
        $this->set('jobRole', $jobRole);
        $this->set('_serialize', ['jobRole']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $jobRole = $this->JobRoles->newEntity();
        if ($this->request->is('post')) {
            $jobRole = $this->JobRoles->patchEntity($jobRole, $this->request->data);
            if ($this->JobRoles->save($jobRole)) {
                $this->Flash->success(__('The job role has been saved.'));
                $action = $this->request->data['save'];
                if( $action == 'save' ){
                    return $this->redirect(['action' => 'index']);
                }else{
                    return $this->redirect(['action' => 'add']);
                }                    
            } else {
                $this->Flash->error(__('The job role could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('jobRole'));
        $this->set('_serialize', ['jobRole']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Job Role id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $jobRole = $this->JobRoles->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $jobRole = $this->JobRoles->patchEntity($jobRole, $this->request->data);
            if ($this->JobRoles->save($jobRole)) {
                $this->Flash->success(__('The job role has been saved.'));
                $action = $this->request->data['save'];
                if( $action == 'save' ){
                    return $this->redirect(['action' => 'index']);
                }else{
                    return $this->redirect(['action' => 'edit', $id]);
                }         
            } else {
                $this->Flash->error(__('The job role could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('jobRole'));
        $this->set('_serialize', ['jobRole']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Job Role id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $jobRole = $this->JobRoles->get($id);
        if ($this->JobRoles->delete($jobRole)) {
            $this->Flash->success(__('The job role has been deleted.'));
        } else {
            $this->Flash->error(__('The job role could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
