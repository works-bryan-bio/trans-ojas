<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;
use Cake\Routing\Router;
use Cake\Network\Email\Email;

/**
 * Candidates Controller
 *
 * @property \App\Model\Table\CandidatesTable $Candidates
 */
class CandidatesController extends AppController
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

        $session = $this->request->session();    
        $user_data = $session->read('User.data');                 
        if( isset($user_data) ){
            if( $user_data->group_id == 1 ){ //Super Admin
                $this->Auth->allow();
            }elseif( $user_data->group_id == 3 ){ //Candidate                
                $this->Auth->deny();
                $this->Auth->allow(['edit_profile','edit_job_roles', 'upload_resume']);
            }
        }

        $this->Auth->allow(['register','send_resume']);  
        $nav_selected = ["candidates"];
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
            'contain' => ['Users']
        ];
        $this->set('candidates', $this->paginate($this->Candidates));
        $this->set('_serialize', ['candidates']);
    }

    /**
     * View method
     *
     * @param string|null $id Candidate id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $candidate = $this->Candidates->get($id, [
            'contain' => ['Users']
        ]);
        $this->set('candidate', $candidate);
        $this->set('_serialize', ['candidate']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $candidate = $this->Candidates->newEntity();
        if ($this->request->is('post')) {
            $user_data = [
                'firstname' => $this->request->data['firstname'],
                'lastname' => $this->request->data['lastname'],
                'middlename' => $this->request->data['middlename'],                             
                'username' => $this->request->data['email'],
                'password' => $this->request->data['password'],
                'is_active' => 1,
                'group_id' => 3
            ];
            $user = $this->Candidates->Users->newEntity();
            $user = $this->Candidates->Users->patchEntity($user, $user_data);
            if( $result_user = $this->Candidates->Users->save($user) ){
                $canidate_data = [
                    'user_id' => $result_user->id,
                    'email' => $this->request->data['email'],
                    'birthdate' => $this->request->data['birthdate'],
                    'photo' => $this->request->data['photo'],
                    'gender' => $this->request->data['gender'],
                    'country_id' => $this->request->data['country_id'],
                    'state_id' => $this->request->data['state_id'],
                    'address' => $this->request->data['address'],
                    'contact_no' => $this->request->data['contact_no']
                ];
                
                $candidate = $this->Candidates->newEntity();
                $candidate = $this->Candidates->patchEntity($candidate, $canidate_data);
                $result_candidate = $this->Candidates->save($candidate);

                /*$country = $this->Candidates->Countries->find()
                    ->where(['Countries.id' => $this->request->data['country_id']])
                    ->first()
                ;

                $uid = candidateGenerateUniqueId($country->iso, $result_candidate->id);*/
                $uid = candidateGenerateUniqueIdNoIso($result_candidate->id);
                $result_candidate->uid = $uid;
                $this->Candidates->save($result_candidate);


                $this->Flash->success(__('The candidate has been saved.'));
                $action = $this->request->data['save'];
                if( $action == 'save' ){
                    return $this->redirect(['action' => 'index']);
                }else{
                    return $this->redirect(['action' => 'add']);
                }
            }else {
                $this->Flash->error(__('The candidate could not be saved. Please, try again.'));
            }
        }
        $gender = ['Male' => 'Male', 'Female' => 'Female'];        
        $countries    = $this->Candidates->Countries->find('list', ['limit' => 200]);
        $states       = $this->Candidates->States->find('list', ['limit' => 200]);
        $this->set(compact('candidate', 'countries', 'states', 'users','gender'));
        $this->set('_serialize', ['candidate']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Candidate id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $candidate = $this->Candidates->get($id, [
            'contain' => ['Users']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user_data = [
                'firstname' => $this->request->data['firstname'],
                'lastname' => $this->request->data['lastname'],
                'middlename' => $this->request->data['middlename']                              
            ];
            $user = $this->Candidates->Users->get($candidate->user_id);
            $user = $this->Candidates->Users->patchEntity($user, $user_data);
            $this->Candidates->Users->save($user);
            $candidate = $this->Candidates->patchEntity($candidate, $this->request->data);
            if ($this->Candidates->save($candidate)) {
                $this->Flash->success(__('The candidate has been saved.'));
                $action = $this->request->data['save'];
                if( $action == 'save' ){
                    return $this->redirect(['action' => 'index']);
                }else{
                    return $this->redirect(['action' => 'edit', $id]);
                }         
            } else {
                $this->Flash->error(__('The candidate could not be saved. Please, try again.'));
            }
        }
        $gender = ['Male' => 'Male', 'Female' => 'Female'];        
        $countries    = $this->Candidates->Countries->find('list', ['limit' => 200]);
        $states       = $this->Candidates->States->find('list', ['limit' => 200]);
        $this->set(compact('candidate', 'countries', 'states', 'users','gender'));
        $this->set('_serialize', ['candidate']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Candidate id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $candidate = $this->Candidates->get($id);
        if ($this->Candidates->delete($candidate)) {
            $this->Flash->success(__('The candidate has been deleted.'));
        } else {
            $this->Flash->error(__('The candidate could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    /**
     * Frontend Register method
     *
     * @return void
     */
    public function register()
    {
        $this->Opportunities = TableRegistry::get('Opportunities');
        $this->JobRoles      = TableRegistry::get('JobRoles');

        $candidate = $this->Candidates->newEntity();

        $jobRoles = $this->JobRoles->find('all');

        if ($this->request->is('post')) {
            if( $this->request->data['password'] == $this->request->data['repassword'] ){  
                //Check if email already exists
                $users = $this->Candidates->Users->find('all')
                    ->where(['Users.username' => $this->request->data['email']])
                ;              

                if( $users->count() == 0 ){
                    $user_data = [
                        'firstname' => $this->request->data['firstname'],
                        'lastname' => $this->request->data['lastname'],                    
                        'username' => $this->request->data['email'],
                        'password' => $this->request->data['password'],
                        'is_active' => 1,
                        'group_id' => 3
                    ];
                    $user = $this->Candidates->Users->newEntity();                
                    $user = $this->Candidates->Users->patchEntity($user, $user_data);                  
                    if( $result_user = $this->Candidates->Users->save($user) ){
                        if( $this->request->data['option_service_provider'] = 'Yes' ){
                            $is_option_service_provider = 1;
                            $service_provider = $this->request->data['service_provider'];
                        }else{
                            $is_option_service_provider = 0;
                            $service_provider = "";
                        }

                        $canidate_data = [
                            'user_id' => $result_user->id,
                            'email' => $this->request->data['email'],   
                            'service_provider' => $service_provider,                     
                            'is_manage_service_provider' => $is_option_service_provider
                        ];
                        
                        $candidate = $this->Candidates->newEntity();
                        $candidate = $this->Candidates->patchEntity($candidate, $canidate_data);
                        $result_candidate = $this->Candidates->save($candidate);

                        $uid = candidateGenerateUniqueIdNoIso($result_candidate->id);
                        $result_candidate->uid = $uid;

                        if( $result_cadidate = $this->Candidates->save($result_candidate) ){
                            //Upload candidate resume
                            $file = $this->request->data['attachment'];           
                            $ext  = substr(strtolower(strrchr($file['name'], '.')), 1); 
                            $arr_ext        = array('pdf', 'doc', 'docx');
                            $setNewFileName = strtolower("resume_" . $this->request->data['firstname'] . "_" . $this->request->data['lastname']);
                            $setNewFileName = str_replace(" ", "_", $setNewFileName);
                            //if (in_array($ext, $arr_ext)) { 
                                $directory_name = WWW_ROOT . '/upload/files/resume/' . $result_cadidate->id . "/";                        
                                if(!is_dir($directory_name)){                                           
                                    mkdir($directory_name, 755, true);
                                }           
                                move_uploaded_file($file['tmp_name'], $directory_name . $setNewFileName . '.' . $ext);                        
                                chmod($directory_name . $setNewFileName . '.' . $ext, 0755);   

                                $resumeFileName = $setNewFileName . '.' . $ext;

                                $result_cadidate->resume = $resumeFileName;
                                $this->Candidates->save($result_cadidate);                                            
                            //}

                        }

                        //Save candidate job roles
                        foreach( $this->request->data['jobRoles'] as $key => $value ){
                            $jobRoleData = [
                                'candidate_id' => $result_candidate->id,
                                'job_role_id' => $key
                            ];

                            $jobRole = $this->Candidates->CandidateJobroles->newEntity();
                            $jobRole = $this->Candidates->CandidateJobroles->patchEntity($jobRole, $jobRoleData);
                            $this->Candidates->CandidateJobroles->save($jobRole);
                        }

                        //Send email notification Admin
                        $edata = [
                            'name' => $this->request->data['firstname'] . " " . $this->request->data['lastname'],
                            'candidate_id' => $uid,
                            'service_provider' => $service_provider,
                            'is_manage_service_provider' => $is_option_service_provider,
                            'email' => $this->request->data['email']                        
                        ];

                        $company_email = "cvs@transparencyit.com";                   
                        $email = new Email('cake_smtp');   
                        $email->from(['websystem@daniell6.sg-host.com' => 'Transparency IT System'])
                            ->template('candidate_register')
                            ->emailFormat('text')
                            ->to($company_email)                    
                            //->bcc(array('', ''))                                   
                            ->subject('Transparency IT : New Candidate')
                            ->attachments([
                                $this->request->data['attachment']['name'] => [
                                    'file' => $this->request->data['attachment']['tmp_name'],
                                    'mimetype' => $this->request->data['attachment']['type'],
                                    'contentId' => 'my-unique-id'
                                ]
                            ])
                            ->viewVars(['edata' => $edata])
                            ->send();

                        //Send email notification candidate
                        $edata = [
                            'name' => $this->request->data['firstname'] . " " . $this->request->data['lastname'],
                            'candidate_id' => $uid,
                            'email' => $this->request->data['email'],
                            'password' => $this->request->data['password']                        
                        ];

                        $candidate_email = $this->request->data['email'];
                        $email = new Email('cake_smtp');   
                        $email->from(['websystem@daniell6.sg-host.com' => 'Transparency IT System'])
                            ->template('candidate_email')
                            ->emailFormat('text')
                            ->to($candidate_email)                    
                            //->bcc(array('', ''))                                   
                            ->subject('Transparency IT : Registration Details')                        
                            ->viewVars(['edata' => $edata])
                            ->send();


                        $this->Flash->success(__("We've sent to your email your login details. Please check your email."));
                        return $this->redirect(['action' => 'register']);
                    }else {
                        $error_msg = objectErrorsToString($user->errors());                    
                        $this->Flash->error(__("Cannot save record. <br/><br/>" . $error_msg));                        
                    }
                }else{
                    $this->Flash->error(__('Email already taken'));
                }
            }else{
                $this->Flash->error(__('Password does not match. Please, try again.'));
            }            
        }

        $opportunities = $this->Opportunities->find('all')
            ->contain(['OpportunityTypes', 'Countries', 'States', 'OpportunityStatuses', 'Industries', 'SalaryTypes', 'WorkTypes'])
            ->where(['Opportunities.end_date >=' => date("Y-m-d")])
            ->order(['Opportunities.end_date' => 'DESC'])            
        ;
        $gender = ['Male' => 'Male', 'Female' => 'Female'];        
        $countries    = $this->Candidates->Countries->find('list', ['limit' => 200]);
        $states       = $this->Candidates->States->find('list', ['limit' => 200]);
        $this->viewBuilder()->layout('front');
        $this->set(['opportunities' => $this->paginate($opportunities), 'jobRoles' => $jobRoles]);
        $this->set(compact('candidate', 'countries', 'states', 'users','gender'));
        $this->set('_serialize', ['candidate']);
    }

    /**
     * Frontend Send Resume method
     *
     * @return void
     */
    public function send_resume()
    {        

        if ($this->request->is('post')) {
            if( $this->request->data['full_name'] != "" && $this->request->data['email'] != "" ){
                $edata = [
                    'name' => $this->request->data['full_name'],
                    'email' => $this->request->data['email'],
                    'contact_number' => $this->request->data['contact_number'],
                    'comment' => $this->request->data['comment']
                ];

                $company_email = "cvs@transparencyit.com";
                //$company_email = "bryan.yobi@gmail.com";
                $email = new Email('cake_smtp');   
                $email->from(['websystem@daniell6.sg-host.com' => 'Transparency IT System'])
                    ->template('submit_resume')
                    ->emailFormat('text')
                    ->to($company_email)                    
                    //->bcc(array('', ''))                                   
                    ->subject('Transparency IT : Candidate Resume')
                    ->attachments([
                        $this->request->data['attachment']['name'] => [
                            'file' => $this->request->data['attachment']['tmp_name'],
                            'mimetype' => $this->request->data['attachment']['type'],
                            'contentId' => 'my-unique-id'
                        ]
                    ])
                    ->viewVars(['edata' => $edata])
                    ->send();

                //Send email notification candidate
                $edata = [
                    'name' => $this->request->data['full_name']                    
                ];

                $candidate_email = $this->request->data['email'];
                $email = new Email('cake_smtp');   
                $email->from(['websystem@daniell6.sg-host.com' => 'Transparency IT System'])
                    ->template('candidate_submit_resume')
                    ->emailFormat('text')
                    ->to($candidate_email)                    
                    //->bcc(array('', ''))                                   
                    ->subject('Transparency IT : Submitted Resume')                        
                    ->viewVars(['edata' => $edata])
                    ->send();


                $this->Flash->success(__("Your resume was successfully sent."));
                return $this->redirect(['action' => 'register']);
            }else{
                $this->Flash->error(__('Cannot send mail. Please try again'));
            }            
        }

        $this->viewBuilder()->layout('front_pages');                
    }

    /**
     * Candidate : Edit Profile method
     *     
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit_profile()
    {        
        $session   = $this->request->session();    
        $session_user_data = $session->read('User.data');    

        $id        = $session_user_data->candidate->id;
        $candidate = $this->Candidates->get($id, [
            'contain' => ['Users']
        ]);        
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user_data = [
                'firstname' => $this->request->data['firstname'],
                'lastname' => $this->request->data['lastname'],
                'middlename' => $this->request->data['middlename']                              
            ];
            $user = $this->Candidates->Users->get($candidate->user_id);
            $user = $this->Candidates->Users->patchEntity($user, $user_data);
            $this->Candidates->Users->save($user);
            $candidate = $this->Candidates->patchEntity($candidate, $this->request->data);
            if ($this->Candidates->save($candidate)) {
                //Update session data
                $user_data = $this->Candidates->Users->find()                       
                    ->where(['Users.id' => $session_user_data->id])
                    ->first()
                ; 

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

                $this->Flash->success(__('Profile was successfully updated.'));
                $action = $this->request->data['save'];
                if( $action == 'save' ){
                    return $this->redirect(['controller' => 'users', 'action' => 'candidate_dashboard']);
                }else{
                    return $this->redirect(['action' => 'edit_profile']);
                }         
            } else {
                $this->Flash->error(__('The candidate could not be saved. Please, try again.'));
            }
        }
        $gender = ['Male' => 'Male', 'Female' => 'Female'];        
        $countries    = $this->Candidates->Countries->find('list', ['limit' => 200]);
        $states       = $this->Candidates->States->find('list', ['limit' => 200]);
        $this->set(compact('candidate', 'countries', 'states', 'users','gender'));
        $this->set('_serialize', ['candidate']);
    }

    /**
     * Candidate : Edit Job Roles method
     *     
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit_job_roles()
    { 
        $this->JobRoles = TableRegistry::get('JobRoles');

        $session   = $this->request->session();    
        $session_user_data = $session->read('User.data');    
              
        $candidate_id = $session_user_data->candidate->id;

        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->data;

            //Delete all candidate selected
            $this->Candidates->CandidateJobroles->deleteAll(['candidate_id' => $candidate_id]);
            foreach( $this->request->data['selectedJobRoles'] as $key => $value ){                
                $dataJobRoles  = [
                    'candidate_id' => $candidate_id,
                    'job_role_id' => $key
                ];
                $candiJobRoles = $this->Candidates->CandidateJobroles->newEntity();
                $candiJobRoles = $this->Candidates->CandidateJobroles->patchEntity($candiJobRoles, $dataJobRoles);
                $this->Candidates->CandidateJobroles->save($candiJobRoles);
            }
            
            $this->Flash->success(__('Job Roles was successfully updated.'));
            return $this->redirect(['controller' => 'users', 'action' => 'candidate_dashboard']);
        }   

        $candiJobRoles = $this->Candidates->CandidateJobRoles->find('all')
            ->where(['CandidateJobRoles.candidate_id' => $candidate_id])
        ;
        $selected_job_roles = array();
        foreach( $candiJobRoles as $cj ){
            $selected_job_roles[$cj->job_role_id] = $cj->job_role_id;
        }

        $jobRoles = $this->JobRoles->find('all');
        $this->set(compact('candiJobRoles', 'jobRoles', 'selected_job_roles'));
        $this->set('_serialize', ['candidate']);
    }

    /**
     * Candidate : Upload Resume method
     *     
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function upload_resume()
    {        
        $session   = $this->request->session();    
        $session_user_data = $session->read('User.data');    

        $id        = $session_user_data->candidate->id;
        $candidate = $this->Candidates->get($id, [
            'contain' => ['Users']
        ]);        
        if ($this->request->is(['patch', 'post', 'put'])) {
            $file = $this->request->data['candidate_resume'];             
            if( $file['size'] > 0 ){
                //Upload candidate resume                
                $ext  = substr(strtolower(strrchr($file['name'], '.')), 1); 
                $arr_ext        = array('pdf', 'doc', 'docx');
                $setNewFileName = strtolower("resume_" . $candidate->user->firstname . "_" . $candidate->user->lastname);
                $setNewFileName = str_replace(" ", "_", $setNewFileName);

                //if (in_array($ext, $arr_ext)) { 
                    $directory_name = WWW_ROOT . '/upload/files/resume/' . $candidate->id . "/";                        
                    if(!is_dir($directory_name)){                                           
                        mkdir($directory_name, 755, true);
                    }           
                    move_uploaded_file($file['tmp_name'], $directory_name . $setNewFileName . '.' . $ext);                        
                    chmod($directory_name . $setNewFileName . '.' . $ext, 0755);   

                    $resumeFileName = $setNewFileName . '.' . $ext;

                    $candidate->resume = $resumeFileName;
                    $this->Candidates->save($candidate);   

                    //Update session
                    $user_data = $this->Candidates->Users->find()                       
                        ->where(['Users.id' => $candidate->user_id])
                        ->first()
                    ;
                    $user_data['candidate'] = $candidate;
                    $session  = $this->request->session();  
                    $session->write('User.data', $user_data);                                         
                //}

                $this->Flash->success(__('Resume was successfully updated.'));
                return $this->redirect(['controller' => 'users', 'action' => 'candidate_dashboard']);                
            }else{
                $this->Flash->error(__("Please select resume to upload"));                
            }   
        }
        
        $this->set(compact('candidate'));
        $this->set('_serialize', ['candidate']);
    }
}
