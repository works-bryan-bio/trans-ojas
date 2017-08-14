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
 * Main Controller
 *
 * @property \App\Model\Table\UsersTable $Main
 */
class MemberLoginController extends AppController
{
    public $helpers = ['NavigationSelector'];
    /**
     * Initialize Method
     *  ID : CA-01
     * 
     */
    public function initialize()
    {
        //$this->loadComponent('RequestHandler');

        parent::initialize();        
        $nav_selected = ["home"];
        $this->set('nav_selected', $nav_selected);
        $this->set('website_title', 'Transparency IT Consulting');
        $this->set('page_title', 'Member Login');
    }    
    
    /**
     * BeforeFilter Method
     *  ID : CA-02
     * 
     */
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow();
    }

    /**
     * Index method for homepage
     *  ID : CA-03
     * @return void
     */

    public function index()
    {    
        $this->Users = TableRegistry::get('Users');
        $this->Candidates = TableRegistry::get('Candidates');
        $this->Companies  = TableRegistry::get('Candidates');
        $this->viewBuilder()->layout('front_member_login');   
        //if already logged-in, redirect
        if($this->Auth->user()){
            $session = $this->request->session();    
            $user_data = $session->read('User.data');
            if( $user_data->user->group_id == 1 ){ //Company
                $this->redirect(array('action' => 'dashboard'));      
            }else{
                $this->redirect(array('action' => 'member_dashboard'));      
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
                    //$group_id = $user_data->user->group_id;    
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
}
