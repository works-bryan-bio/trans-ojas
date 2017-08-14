<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;
use Cake\Routing\Router;
use App\Controller\SyncServiceController;
use Cake\Filesystem\Folder;
use Cake\Filesystem\File;
use Cake\Mailer\Email;
/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{
    public $helpers = ['NavigationSelector'];

    /**
     * initialize method
     *  ID : CA-01
     * 
     */
    public function initialize()
    {
        parent::initialize();
        // Add the selected sidebar-menu 'active' class
        // Valid value can be found in NavigationSelectorHelper       
        if ($this->request->action == "dashboard") {
            $nav_selected = ["dashboard"];
        } else {
            $nav_selected = ["users"];
        }


        $session = $this->request->session();    
        $user_data = $session->read('User.data');            
        if( isset($user_data) ){
            if( $user_data->group_id == 1 ){ //Super Admin
                $this->Auth->allow();
            }elseif( $user_data->group_id == 2 ){ //Administrator
                $this->Auth->deny();
                $this->Auth->allow(['company_dashboard','change_password']);
            }elseif( $user_data->group_id == 3 ){ //Member                
                $this->Auth->deny();
                $this->Auth->allow(['candidate_dashboard','change_password']);
            }
        }

        $this->set('nav_selected', $nav_selected);

        //$this->Auth->allow();
    }

    /**
     * beforeFilter method     
     * 
     */
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['logout', 'login']);
    }

    /**
     * Index method     
     * @return void
     */
    public function index()
    {
        $user = $this->Users->find('all', [
            'contain' => ['Groups']
        ]);
        $this->set('users', $this->paginate($user));
        $this->set('_serialize', ['users']);
    }

    /**
     * Admin Dashboard method     
     * @return void
     */
    public function dashboard()
    {        
        $this->set('page_title', 'Dashboard');
    }   

    /**
     * Canidadate Dashboard method     
     * @return void
     */
    public function candidate_dashboard()
    {
        $this->Opportunities = TableRegistry::get('Opportunities');
        $this->CandidateJobRoles    = TableRegistry::get('CandidateJobRoles');

        $session = $this->request->session();    
        $user_data = $session->read('User.data'); 

        $opportunities = $this->Opportunities->find('all')
            ->order(['Opportunities.id' => 'DESC'])
            ->limit(8)
        ;

        $jobRoles = $this->CandidateJobRoles->find('all')
            ->contain(['JobRoles'])
            ->where(['CandidateJobRoles.candidate_id' => $user_data->candidate->id])
        ;

        $nav_selected = ["dashboard"];        
        $this->set(['page_title' => 'Dashboard', 'nav_selected' => $nav_selected, 'opportunities' => $opportunities,'jobRoles' => $jobRoles]);
    }   

    /**
     * Company Dashboard method     
     * @return void
     */
    public function company_dashboard()
    {        
        $this->set('page_title', 'Dashboard');
    }   

    /**
     * View method     
     * @param string|null $id User id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ["Groups"]
        ]);
        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method     
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {      
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
        $groups = $this->Users->Groups->find('list', ['limit' => 200]);
        $this->set(compact('user', 'groups'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Edit method     
     * @param string|null $id User id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            $result = $this->Users->save($user);
            if ($result) {
                $this->Flash->success(__('User data has been updated.'));
                if(isset($this->request->data['edit'])) {
                    return $this->redirect(['action' => 'edit', $id]);
                }else{
                    return $this->redirect(['action' => 'index']);
                }
            } else {
                $this->Flash->error(__('User data could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);

         $this->set('groups', $this->Users->Groups->find('list', array('fields' => array('name','id') ) ) );
    }

    /**
     * delete method     
     * @return void
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }
        $this->Flash->error(__('Deleting of user is currently disabled.'));
        return $this->redirect(['action' => 'index']);
    }

    /**
     * Login     
     * lagin module then redirect to dashboard
     */
    public function login()
    {
        $this->Candidates = TableRegistry::get('Candidates');
        $this->Companies  = TableRegistry::get('Companies');

        $this->viewBuilder()->layout("Users/login");        
        
        //if already logged-in, redirect
        if($this->Auth->user()){
            $session = $this->request->session();    
            $user_data = $session->read('User.data');
            if( $user_data->user->group_id == 1 ){ //Company
                $this->redirect(array('action' => 'dashboard'));      
            }elseif($user_data->group_id == 2){
                return $this->redirect(['controller' => 'users', 'action' => 'company_dashboard']);           
            }else{
                $this->redirect(array('action' => 'candidate_dashboard'));      
            }            
        }

        if ($this->request->is('post')) {           
            $user = $this->Auth->identify();            
            if ($user) {      
                $user_data = $this->Users->find()                       
                    ->where(['Users.id' => $user['id']])
                    ->first()
                ; 
                if( $user_data->is_active == 1 ){
                    $group_id = $user_data->group_id;     
                    if( $group_id == 3 ){
                        $candidate = $this->Candidates->find()
                            ->where(['Candidates.user_id' => $user_data->id])
                            ->first()
                        ;                        
                        $user_data['candidate'] = $candidate;
                    }elseif( $group_id == 2 ){
                        $company = $this->Companies->find()
                            ->where(['Companies.user_id' => $user_data->id])
                            ->first()
                        ;
                        $user_data['company'] = $company;
                    }                   
                    
                    $session  = $this->request->session();  
                    $session->write('User.data', $user_data);                

                    $this->Auth->setUser($user);
                    $_SESSION['KCEDITOR']['disabled'] = false;
                    $_SESSION['KCEDITOR']['uploadURL'] = Router::url('/')."webroot/upload";
                    
                    if( $user_data->group_id == 1 ){
                        return $this->redirect($this->Auth->redirectUrl());           
                    }elseif( $user_data->group_id == 2 ){
                        return $this->redirect(['controller' => 'users', 'action' => 'company_dashboard']);           
                    }else{
                        return $this->redirect(['controller' => 'users', 'action' => 'candidate_dashboard']);           
                    }                    
                }else{
                    $this->Flash->error(__('Account inactive. Cannot login.'));
                    return $this->redirect(['action' => 'login']);
                }                
            }
            $this->Flash->error(__('Invalid username or password, try again'));
        }
        $this->set([
            'page_title' => 'User Login'            
        ]);
    }

    /**
     * logout     
     * logout user and go back to login page
     */
    public function logout()
    {
        session_start();
        session_destroy();
        return $this->redirect($this->Auth->logout());
    }

    /**
     * Change Password method     
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function change_password()
    {      
        $this->UserEntities = TableRegistry::get('UserEntities');
        $session      = $this->request->session();    
        $user_session = $session->read('User.data');       

        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->data;
            if( $data['password'] == $data['repassword'] ){
                
                $user = $this->UserEntities->Users->get($user_session->user->id);
                $user->password = $data['password'];                
                
                if( $this->UserEntities->Users->save($user) ){
                    //Update is_enabled
                    $user_entity = $this->UserEntities->get($user_session->id);
                    if( $user_entity->is_password_changed == 0 ){
                        $user_entity->is_password_changed = 1;
                        $this->UserEntities->save($user_entity);
                    }

                    //Send email
                    $edata = [
                        'user_name' => $user_session->firstname,
                        'password' => $data['password']                        
                    ];
                    $recipient = $user_session->email;                     
                    $email_smtp = new Email('cake_smtp');
                    $email_smtp->from(['websystem@emsuptodate.com' => 'WebSystem'])
                        ->template('change_password')
                        ->emailFormat('html')
                        ->to($recipient)                                                                                                     
                        ->subject('EmsAgencies : Change Password')
                        ->viewVars(['edata' => $edata])
                        ->send();

                    $this->Flash->success(__('Your password has been changed.'));
                    return $this->redirect(['controller' => 'profile', 'action' => 'index']);
                }else{
                    $this->Flash->error(__('Your password could not be change. Please, try again.'));                    
                }
            }else{
                $this->Flash->error(__('Password does not match!'));                    
            }
        }

        $load_form_css = true;
        $this->set(['user_data' => $user_session, 'load_form_css' => $load_form_css]);
    }
}
