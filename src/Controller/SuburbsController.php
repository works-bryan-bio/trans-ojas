<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Suburbs Controller
 *
 * @property \App\Model\Table\SuburbsTable $Suburbs
 */
class SuburbsController extends AppController
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
        $nav_selected = ["suburbs"];
        $this->set('nav_selected', $nav_selected);

    }

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Areas']
        ];
        $this->set('suburbs', $this->paginate($this->Suburbs));
        $this->set('_serialize', ['suburbs']);
    }

    /**
     * View method
     *
     * @param string|null $id Suburb id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $suburb = $this->Suburbs->get($id, [
            'contain' => ['Areas']
        ]);
        $this->set('suburb', $suburb);
        $this->set('_serialize', ['suburb']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $suburb = $this->Suburbs->newEntity();
        if ($this->request->is('post')) {
            $suburb = $this->Suburbs->patchEntity($suburb, $this->request->data);
            if ($this->Suburbs->save($suburb)) {
                $this->Flash->success(__('The suburb has been saved.'));
                $action = $this->request->data['save'];
                if( $action == 'save' ){
                    return $this->redirect(['action' => 'index']);
                }else{
                    return $this->redirect(['action' => 'add']);
                }                    
            } else {
                $this->Flash->error(__('The suburb could not be saved. Please, try again.'));
            }
        }
        $areas = $this->Suburbs->Areas->find('list', ['limit' => 200]);
        $this->set(compact('suburb', 'areas'));
        $this->set('_serialize', ['suburb']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Suburb id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $suburb = $this->Suburbs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $suburb = $this->Suburbs->patchEntity($suburb, $this->request->data);
            if ($this->Suburbs->save($suburb)) {
                $this->Flash->success(__('The suburb has been saved.'));
                $action = $this->request->data['save'];
                if( $action == 'save' ){
                    return $this->redirect(['action' => 'index']);
                }else{
                    return $this->redirect(['action' => 'edit', $id]);
                }         
            } else {
                $this->Flash->error(__('The suburb could not be saved. Please, try again.'));
            }
        }
        $areas = $this->Suburbs->Areas->find('list', ['limit' => 200]);
        $this->set(compact('suburb', 'areas'));
        $this->set('_serialize', ['suburb']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Suburb id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $suburb = $this->Suburbs->get($id);
        if ($this->Suburbs->delete($suburb)) {
            $this->Flash->success(__('The suburb has been deleted.'));
        } else {
            $this->Flash->error(__('The suburb could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
