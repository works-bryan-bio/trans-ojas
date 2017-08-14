<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;
use Cake\Routing\Router;
use Cake\Network\Email\Email;
/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class ForgotPasswordController extends AppController
{
    public $helpers = ['NavigationSelector'];
    public $paginate = ['maxLimit' => 10];

    /**
     * initialize method
     *  ID : CA-01
     * 
     */
    public function initialize()
    {
        parent::initialize();                
        $this->Auth->allow();
    }

    /**
     * beforeFilter method
     *  ID : CA-02
     * 
     */
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);        
    }

    /**
     * Index method
     * ID : CA-03
     * @return void
     */
    public function index()
    {
        $this->Users = TableRegistry::get("Users");

        if ($this->request->is('post')) {            
            $data = $this->request->data;
            $user_email = $data['email'];
            $user       = $this->Users->find()
                ->where(['Users.username' => $data['email']])
                ->first()
            ;
            
            if( !empty($user) ){                
                $new_password = generateRandomString();                

                //Reset Member Password                 
                $randChar   = rand() . $user->id;                
                $reset_code = md5(uniqid($randChar, true));  

                //Save verification code
                $user->reset_code = $reset_code;
                $this->Users->save($user);

                //Send email notification to customer                
                $edata = [
                    'user_name' => $user->firstname,
                    'reset_code' => $reset_code
                ];

                $recipient = $user->username;                     
                $email_smtp = new Email('cake_smtp');
                $email_smtp->from(['websystem@daniell6.sg-host.com' => 'Transparency IT System'])
                    ->template('forgot_password')
                    ->emailFormat('html')
                    ->to($recipient)                                                                                                     
                    ->subject('Transparency IT Consulting : Reset Password')
                    ->viewVars(['edata' => $edata])
                    ->send();
                
                $this->Flash->success(__('An email was sent to you on how to change your password. Please check your email.'));
                return $this->redirect(['controller' => 'member_login']);
            }else{
                $this->Flash->error(__('Email address does not exists!'));
            }            
        }
        $this->viewBuilder()->layout("front_pages");
        $this->set(['page_title' => 'Forgot Password']);
    }   

    /**
     * Reset method
     * ID : CA-04
     * @return void
     */
    public function reset( $reset_code )
    {
        $this->Users = TableRegistry::get('Users');

        $is_code_valid = false;
        $user = array();

        if( $reset_code != '' ){
            $user = $this->Users->find()
                ->where(['Users.reset_code' => $reset_code])
                ->first()
            ;
            if( $user ){
                $is_code_valid = true;
                if ($this->request->is('post')) {     
                    $data = $this->request->data;                    
                    if( $data['password'] == $data['repassword'] ){
                        $user = $this->Users->find()
                            ->where(['Users.reset_code' => $reset_code])
                            ->first()
                        ;                        

                        if( !empty($user) ){
                            //EMPTY RESET CODE AND UPDATE NEW PASSWORD
                            $user->reset_code = "";
                            $user->password = $data['password'];
                            $this->Users->save($user);
                            
                            //SEND EMAIL NOTIFICATION                            
                            $edata = [
                                'firstname' => $user->firstname,
                                'new_password' => $data['password']
                            ];

                            $recipient = $user->username;                     
                            $email_smtp = new Email('cake_smtp');
                            $email_smtp->from(['websystem@daniell6.sg-host.com' => 'Transparency IT System'])
                                ->template('reset_password')
                                ->emailFormat('html')
                                ->to($recipient)                                                                                                     
                                ->subject('Transparency IT Consulting : New Password')
                                ->viewVars(['edata' => $edata])
                                ->send();

                            //REDIRECT TO LOGIN
                            $this->Flash->success(__('Password was successfully updated.')); 
                            return $this->redirect(['controller' => 'member_login']);
                        }else{
                            $this->Flash->error(__('Invalid code')); 
                        }
                    }else{
                        $this->Flash->error(__('Password does not match!'));            
                    }
                }
            }else{
                $this->Flash->error(__('Invalid code'));    
            }
        }else{
            $this->Flash->error(__('Invalid code'));
        }

        $this->viewBuilder()->layout("front_pages");
        $this->set(['page_title' => 'Reset Password']);
        $this->set(compact('is_code_valid','user'));
    }   
}
