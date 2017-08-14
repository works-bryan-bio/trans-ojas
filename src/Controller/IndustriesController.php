<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;
use Cake\Routing\Router;
use Cake\Network\Email\Email;

/**
 * Industries Controller
 *
 * @property \App\Model\Table\IndustriesTable $Industries
 */
class IndustriesController extends AppController
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
        $nav_selected = ["industries"];
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
            'contain' => ['IndustryGroups']
        ];
        $this->set('industries', $this->paginate($this->Industries));
        $this->set('_serialize', ['industries']);
    }

    /**
     * View method
     *
     * @param string|null $id Industry id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $industry = $this->Industries->get($id, [
            'contain' => ['IndustryGroups']
        ]);
        $this->set('industry', $industry);
        $this->set('_serialize', ['industry']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $industry = $this->Industries->newEntity();
        if ($this->request->is('post')) {
            $industry = $this->Industries->patchEntity($industry, $this->request->data);
            if ($this->Industries->save($industry)) {
                $this->Flash->success(__('The industry has been saved.'));
                $action = $this->request->data['save'];
                if( $action == 'save' ){
                    return $this->redirect(['action' => 'index']);
                }else{
                    return $this->redirect(['action' => 'add']);
                }                    
            } else {
                $this->Flash->error(__('The industry could not be saved. Please, try again.'));
            }
        }
        $industryGroups = $this->Industries->IndustryGroups->find('list', ['limit' => 200]);
        $this->set(compact('industry', 'industryGroups'));
        $this->set('_serialize', ['industry']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Industry id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $industry = $this->Industries->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $industry = $this->Industries->patchEntity($industry, $this->request->data);
            if ($this->Industries->save($industry)) {
                $this->Flash->success(__('The industry has been saved.'));
                $action = $this->request->data['save'];
                if( $action == 'save' ){
                    return $this->redirect(['action' => 'index']);
                }else{
                    return $this->redirect(['action' => 'edit', $id]);
                }         
            } else {
                $this->Flash->error(__('The industry could not be saved. Please, try again.'));
            }
        }
        $industryGroups = $this->Industries->IndustryGroups->find('list', ['limit' => 200]);
        $this->set(compact('industry', 'industryGroups'));
        $this->set('_serialize', ['industry']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Industry id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $industry = $this->Industries->get($id);
        if ($this->Industries->delete($industry)) {
            $this->Flash->success(__('The industry has been deleted.'));
        } else {
            $this->Flash->error(__('The industry could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
