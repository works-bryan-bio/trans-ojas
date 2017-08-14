<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;
use Cake\Routing\Router;
use Cake\Network\Email\Email;

/**
 * WorkTypes Controller
 *
 * @property \App\Model\Table\WorkTypesTable $WorkTypes
 */
class WorkTypesController extends AppController
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
        $nav_selected = ["work_types"];
        $this->set('nav_selected', $nav_selected);

    }

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('workTypes', $this->paginate($this->WorkTypes));
        $this->set('_serialize', ['workTypes']);
    }

    /**
     * View method
     *
     * @param string|null $id Work Type id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $workType = $this->WorkTypes->get($id, [
            'contain' => []
        ]);
        $this->set('workType', $workType);
        $this->set('_serialize', ['workType']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $workType = $this->WorkTypes->newEntity();
        if ($this->request->is('post')) {
            $workType = $this->WorkTypes->patchEntity($workType, $this->request->data);
            if ($this->WorkTypes->save($workType)) {
                $this->Flash->success(__('The work type has been saved.'));
                $action = $this->request->data['save'];
                if( $action == 'save' ){
                    return $this->redirect(['action' => 'index']);
                }else{
                    return $this->redirect(['action' => 'add']);
                }                    
            } else {
                $this->Flash->error(__('The work type could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('workType'));
        $this->set('_serialize', ['workType']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Work Type id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $workType = $this->WorkTypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $workType = $this->WorkTypes->patchEntity($workType, $this->request->data);
            if ($this->WorkTypes->save($workType)) {
                $this->Flash->success(__('The work type has been saved.'));
                $action = $this->request->data['save'];
                if( $action == 'save' ){
                    return $this->redirect(['action' => 'index']);
                }else{
                    return $this->redirect(['action' => 'edit', $id]);
                }         
            } else {
                $this->Flash->error(__('The work type could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('workType'));
        $this->set('_serialize', ['workType']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Work Type id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $workType = $this->WorkTypes->get($id);
        if ($this->WorkTypes->delete($workType)) {
            $this->Flash->success(__('The work type has been deleted.'));
        } else {
            $this->Flash->error(__('The work type could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
