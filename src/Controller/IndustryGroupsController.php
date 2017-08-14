<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * IndustryGroups Controller
 *
 * @property \App\Model\Table\IndustryGroupsTable $IndustryGroups
 */
class IndustryGroupsController extends AppController
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
        $nav_selected = ["industry_groups"];
        $this->set('nav_selected', $nav_selected);

    }

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('industryGroups', $this->paginate($this->IndustryGroups));
        $this->set('_serialize', ['industryGroups']);
    }

    /**
     * View method
     *
     * @param string|null $id Industry Group id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $industryGroup = $this->IndustryGroups->get($id, [
            'contain' => ['Industries']
        ]);
        $this->set('industryGroup', $industryGroup);
        $this->set('_serialize', ['industryGroup']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $industryGroup = $this->IndustryGroups->newEntity();
        if ($this->request->is('post')) {
            $industryGroup = $this->IndustryGroups->patchEntity($industryGroup, $this->request->data);
            if ($this->IndustryGroups->save($industryGroup)) {
                $this->Flash->success(__('The industry group has been saved.'));
                $action = $this->request->data['save'];
                if( $action == 'save' ){
                    return $this->redirect(['action' => 'index']);
                }else{
                    return $this->redirect(['action' => 'add']);
                }                    
            } else {
                $this->Flash->error(__('The industry group could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('industryGroup'));
        $this->set('_serialize', ['industryGroup']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Industry Group id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $industryGroup = $this->IndustryGroups->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $industryGroup = $this->IndustryGroups->patchEntity($industryGroup, $this->request->data);
            if ($this->IndustryGroups->save($industryGroup)) {
                $this->Flash->success(__('The industry group has been saved.'));
                $action = $this->request->data['save'];
                if( $action == 'save' ){
                    return $this->redirect(['action' => 'index']);
                }else{
                    return $this->redirect(['action' => 'edit', $id]);
                }         
            } else {
                $this->Flash->error(__('The industry group could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('industryGroup'));
        $this->set('_serialize', ['industryGroup']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Industry Group id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $industryGroup = $this->IndustryGroups->get($id);
        if ($this->IndustryGroups->delete($industryGroup)) {
            $this->Flash->success(__('The industry group has been deleted.'));
        } else {
            $this->Flash->error(__('The industry group could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
