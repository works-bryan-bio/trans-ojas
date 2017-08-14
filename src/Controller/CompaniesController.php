<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;
use Cake\Routing\Router;
use Cake\Network\Email\Email;
/**
 * Companies Controller
 *
 * @property \App\Model\Table\CompaniesTable $Companies
 */
class CompaniesController extends AppController
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
        $nav_selected = ["companies"];
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
            'contain' => ['Users', 'Countries', 'States']
        ];
        $this->set('companies', $this->paginate($this->Companies));
        $this->set('_serialize', ['companies']);
    }

    /**
     * View method
     *
     * @param string|null $id Company id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $company = $this->Companies->get($id, [
            'contain' => ['Users', 'Countries', 'States', 'Opportunities']
        ]);
        $this->set('company', $company);
        $this->set('_serialize', ['company']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {        
        $this->Countries = TableRegistry::get('Countries');

        $company = $this->Companies->newEntity();        
        if ($this->request->is('post')) {
            $user_data = [
                'firstname' => $this->request->data['firstname'],
                'lastname' => $this->request->data['lastname'],
                'middlename' => $this->request->data['middlename'],
                'username' => $this->request->data['email'],
                'password' => $this->request->data['password'],
                'is_active' => 1,
                'is_password_changed' => 0,
                'group_id' => 2
            ];
            $user = $this->Companies->Users->newEntity();
            $user = $this->Companies->Users->patchEntity($user, $user_data);
            if( $result_user = $this->Companies->Users->save($user) ){
                $company_data = [                        
                    'user_id' => $result_user->id,
                    'name' => $this->request->data['name'],
                    'phone' => $this->request->data['phone'],
                    'fax' => $this->request->data['fax'],
                    'photo' => $this->request->data['photo'],
                    'address' => $this->request->data['address'],
                    'country_id' => $this->request->data['country_id'],
                    'state_id' => $this->request->data['state_id'],
                    'city' => $this->request->data['city'],
                    'zipcode' => $this->request->data['zipcode'],
                    'description' => $this->request->data['description']
                ];

                $company = $this->Companies->newEntity();
                $company = $this->Companies->patchEntity($company, $company_data);
                $result_company = $this->Companies->save($company);

                $country = $this->Countries->find()
                    ->where(['Countries.id' => $this->request->data['country_id']])
                    ->first()
                ;
                $cuid = companyGenerateUniqueId($country->iso, $result_company->id);
                $result_company->uid = $cuid;
                $this->Companies->save($result_company);

                $this->Flash->success(__('The company has been saved.'));
                $action = $this->request->data['save'];
                if( $action == 'save' ){
                    return $this->redirect(['action' => 'index']);
                }else{
                    return $this->redirect(['action' => 'add']);
                }
            }else{
                $this->Flash->error(__('The company could not be saved. Please, try again.'));
            }
        }
        $gender       = ['Male' => 'Male', 'Female' => 'Female'];        
        $countries    = $this->Companies->Countries->find('list', ['limit' => 200]);
        $states       = $this->Companies->States->find('list', ['limit' => 200]);
        $this->set(compact('company', 'countries', 'states', 'gender'));
        $this->set('_serialize', ['company']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Company id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $company = $this->Companies->get($id, [
            'contain' => ['Users']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $company = $this->Companies->patchEntity($company, $this->request->data);
            if ($this->Companies->save($company)) {
                $this->Flash->success(__('The company has been saved.'));
                $action = $this->request->data['save'];
                if( $action == 'save' ){
                    return $this->redirect(['action' => 'index']);
                }else{
                    return $this->redirect(['action' => 'edit', $id]);
                }         
            } else {
                $this->Flash->error(__('The company could not be saved. Please, try again.'));
            }
        }
        $gender       = ['Male' => 'Male', 'Female' => 'Female'];        
        $countries    = $this->Companies->Countries->find('list', ['limit' => 200]);
        $states       = $this->Companies->States->find('list', ['limit' => 200]);
        $this->set(compact('company', 'countries', 'states', 'gender'));
        $this->set('_serialize', ['company']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Company id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $company = $this->Companies->get($id);
        if ($this->Companies->delete($company)) {
            $this->Flash->success(__('The company has been deleted.'));
        } else {
            $this->Flash->error(__('The company could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
