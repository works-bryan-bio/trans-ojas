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
 * UserEntities Controller
 *
 * @property \App\Model\Table\UserEntitiesTable $UserEntities
 */
class ProfileController extends AppController
{

    /**
     * initialize method    
     * 
     */
    public function initialize()
    {
        parent::initialize();
        // Add the selected sidebar-menu 'active' class
        // Valid value can be found in NavigationSelectorHelper       
        if ($this->request->action == "dashboard") {
            $nav_selected = [""];
        } else {
            $nav_selected = [""];
        }       

        $this->Auth->allow();
        $this->set('nav_selected', $nav_selected);
        $this->set(['load_css_script' => 'users']);
        $this->Users = TableRegistry::get('Users');
        $users = $this->Users->find('all');
        if($users->count() == 0) {
            //$this->redirect(['controller' => 'customer', 'action' => 'register']);
        }

        //$this->Auth->allow();
    }

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->UserEntities = TableRegistry::get("UserEntities");

        $session = $this->request->session();    
        $user_data = $session->read('User.data');
        $userEntity = $this->UserEntities->find()            
            ->where(['UserEntities.id' => $user_data->id])
            ->first()
        ;

        $this->set(compact('userEntity'));
    }

    /**
     * Edit method
     *     
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit()
    {
        $this->UserEntities = TableRegistry::get("UserEntities");

        $session = $this->request->session();    
        $user_data = $session->read('User.data');

        $userEntity = $this->UserEntities->get($user_data->id, [
            'contain' => []
        ]);
        
        if ($this->request->is(['patch', 'post', 'put'])) {            

            //Update user entity data
            $custom_fields = $this->request->data['custom_field'];
            $userEntity    = $this->UserEntities->patchEntity($userEntity, $this->request->data);
            if ($this->UserEntities->save($userEntity)) {

                //Custom Fields
                $this->UserEntities->UserCustomFields->deleteAll(['UserCustomFields.user_entity_id' => $userEntity->id]); //Delete all entries, will create new data
                foreach( $custom_fields as $cs ){
                    $custom_data = [
                        'user_entity_id' => $user_data->id,
                        'name' => $cs['name'],
                        'value' => $cs['value']
                    ];

                    $customFields = $this->UserEntities->UserCustomFields->newEntity();
                    $customFields = $this->UserEntities->UserCustomFields->patchEntity($customFields, $custom_data);
                    $this->UserEntities->UserCustomFields->save($customFields);
                }

                $this->Flash->success(__('Profile has been updated.'));

                //Update user session
                $userEntity = $this->UserEntities->find()
                    ->contain(['Users'])             
                    ->where(['UserEntities.id' => $user_data->id])
                    ->first()
                ;
                $session  = $this->request->session();  
                $session->write('User.data', $userEntity); 

                $action = $this->request->data['save'];
                if( $action == 'save' ){
                    return $this->redirect(['action' => 'index']);
                }else{
                    return $this->redirect(['action' => 'edit']);
                }         
            } else {
                $this->Flash->error(__('Cannot update profile. Please, try again.'));
            }
        }

        $customFields = $this->UserEntities->UserCustomFields->find('all')
            ->where(['UserCustomFields.user_entity_id' => $userEntity->id])
        ;        
        $dataCustomFields = array();
        foreach( $customFields as $cs ){
            $dataCustomFields[] = ['name' => $cs->name, 'value' => $cs->value];            
        }

        $agencies = $this->UserEntities->Agencies->find('list', ['limit' => 200]); 
        $groups   = $this->UserEntities->Users->Groups->find('list');       
        $gender   = array("Male" => "Male", "Female" => "Female");
        $this->set(compact('userEntity', 'agencies', 'groups', 'gender', 'dataCustomFields'));
        $this->set('_serialize', ['userEntity']);
    }

    /**
     * User Change Profile Photo
     * ID : CA-03   
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function change_profile_photo()
    {
        $this->UserEntities = TableRegistry::get('UserEntities');
        $session      = $this->request->session();    
        $user_session = $session->read('User.data');   
        
        if($this->request->is('post')) {
            $userEntity = $this->UserEntities->find()
                ->contain(['Users'])
                ->where(['UserEntities.id' => $user_session->id])
                ->first()
            ;  

            $file = $this->request->data['photo'];           
            $ext  = substr(strtolower(strrchr($file['name'], '.')), 1); 
            $arr_ext        = array('jpg', 'jpeg', 'gif');
            $setNewFileName = time() . "_" . rand(000000, 999999);
            if (in_array($ext, $arr_ext)) { 
                $directory_name = WWW_ROOT . '/upload/users/' . $userEntity->id . "/";                        
                if(!is_dir($directory_name)){                                           
                    mkdir($directory_name, 755, true);
                }           
                move_uploaded_file($file['tmp_name'], WWW_ROOT . '/upload/users/' . $userEntity->id . "/" . $setNewFileName . '.' . $ext);                        
                chmod(WWW_ROOT . '/upload/users/' . $userEntity->id . "/" . $setNewFileName . '.' . $ext, 0755);   

                $imageFileName = $setNewFileName . '.' . $ext;

                $userEntity->photo = $imageFileName;
                $this->UserEntities->save($userEntity);                
                $this->Flash->success(__('Your profile has been updated.'));   
                $session->write('User.data', $userEntity);
                return $this->redirect(['action' => 'index']);  
            }
        }        
    }
}
