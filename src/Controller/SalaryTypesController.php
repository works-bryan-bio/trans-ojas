<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;
use Cake\Routing\Router;
use Cake\Network\Email\Email;


/**
 * SalaryTypes Controller
 *
 * @property \App\Model\Table\SalaryTypesTable $SalaryTypes
 */
class SalaryTypesController extends AppController
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
        $nav_selected = ["salary_types"];
        $this->set('nav_selected', $nav_selected);

    }

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('salaryTypes', $this->paginate($this->SalaryTypes));
        $this->set('_serialize', ['salaryTypes']);
    }

    /**
     * View method
     *
     * @param string|null $id Salary Type id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $salaryType = $this->SalaryTypes->get($id, [
            'contain' => ['Opportunities']
        ]);
        $this->set('salaryType', $salaryType);
        $this->set('_serialize', ['salaryType']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $salaryType = $this->SalaryTypes->newEntity();
        if ($this->request->is('post')) {
            $salaryType = $this->SalaryTypes->patchEntity($salaryType, $this->request->data);
            if ($this->SalaryTypes->save($salaryType)) {
                $this->Flash->success(__('The salary type has been saved.'));
                $action = $this->request->data['save'];
                if( $action == 'save' ){
                    return $this->redirect(['action' => 'index']);
                }else{
                    return $this->redirect(['action' => 'add']);
                }                    
            } else {
                $this->Flash->error(__('The salary type could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('salaryType'));
        $this->set('_serialize', ['salaryType']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Salary Type id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $salaryType = $this->SalaryTypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $salaryType = $this->SalaryTypes->patchEntity($salaryType, $this->request->data);
            if ($this->SalaryTypes->save($salaryType)) {
                $this->Flash->success(__('The salary type has been saved.'));
                $action = $this->request->data['save'];
                if( $action == 'save' ){
                    return $this->redirect(['action' => 'index']);
                }else{
                    return $this->redirect(['action' => 'edit', $id]);
                }         
            } else {
                $this->Flash->error(__('The salary type could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('salaryType'));
        $this->set('_serialize', ['salaryType']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Salary Type id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $salaryType = $this->SalaryTypes->get($id);
        if ($this->SalaryTypes->delete($salaryType)) {
            $this->Flash->success(__('The salary type has been deleted.'));
        } else {
            $this->Flash->error(__('The salary type could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
