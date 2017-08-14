<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;
use Cake\Routing\Router;
use Cake\Network\Email\Email;

/**
 * Pages Controller
 *
 * @property \App\Model\Table\PagesTable $Pages
 */
class PagesController extends AppController
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
        $this->Auth->allow(['frontview','contact_us','ajax_email_inquiry','ajax_email_newsletter', 'ajax_job_roles_description', 'about_us', 'why_us']);
        $nav_selected = ["pages"];
        $this->set('nav_selected', $nav_selected);

    }

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('pages', $this->paginate($this->Pages));
        $this->set('_serialize', ['pages']);
    }

    /**
     * View method
     *
     * @param string|null $id Page id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $page = $this->Pages->get($id, [
            'contain' => []
        ]);
        $this->set('page', $page);
        $this->set('_serialize', ['page']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $page = $this->Pages->newEntity();
        if ($this->request->is('post')) {
            $last_page = $this->Pages->find()                
                ->order(['Pages.sorting' => 'DESC'])
                ->first()
            ;
            $this->request->data['sorting'] = $last_page->sort + 1;
            $page = $this->Pages->patchEntity($page, $this->request->data);
            if ($this->Pages->save($page)) {
                $this->Flash->success(__('The page has been saved.'));
                $action = $this->request->data['save'];
                if( $action == 'save' ){
                    return $this->redirect(['action' => 'index']);
                }else{
                    return $this->redirect(['action' => 'add']);
                }                    
            } else {
                $this->Flash->error(__('The page could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('page'));
        $this->set('_serialize', ['page']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Page id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $page = $this->Pages->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $page = $this->Pages->patchEntity($page, $this->request->data);
            if ($this->Pages->save($page)) {
                $this->Flash->success(__('The page has been saved.'));
                $action = $this->request->data['save'];
                if( $action == 'save' ){
                    return $this->redirect(['action' => 'index']);
                }else{
                    return $this->redirect(['action' => 'edit', $id]);
                }         
            } else {
                $this->Flash->error(__('The page could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('page'));
        $this->set('_serialize', ['page']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Page id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $page = $this->Pages->get($id);
        if ($this->Pages->delete($page)) {
            $this->Flash->success(__('The page has been deleted.'));
        } else {
            $this->Flash->error(__('The page could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    /**
     * frontview method        
     */
    public function frontview($id = null) {     
        $this->JobRoles = TableRegistry::get('JobRoles');

        $page = $this->Pages->get($id, [
            'contain' => []
        ]);

        $load_job_role_script = false;
        $jobRoles = array();
        if( $id == 2 ){
            $load_job_role_script = true;
            $jobRoles = $this->JobRoles->find('all');
        }        

        $this->viewBuilder()->layout("front_pages");         
        $this->set(['page' => $page, 'page_title' => $page->title, 'page_id' => $id, 'jobRoles' => $jobRoles, 'load_job_role_script' => $load_job_role_script]);        
    }

    /**
     * frontview method        
     */
    public function contact_us() {     
        
        $this->viewBuilder()->layout("front_pages");         
        $this->set(['page_title' => 'Contact Us']);        
    }

    /**
     * Email inquiry
     * 
     */
    public function ajax_email_inquiry()
    {
        $json_data = [
            "is_success" => true,
            'message' => '<div class="label label-success fade in">Email was successfully sent!</div>'
        ];        

        $edata = $this->request->data;        

        $recipient = "bryan.yobi@gmail.com";        
        $email_smtp = new Email('cake_smtp');
        $email_smtp->from(['websystem@daniell6.sg-host.com' => 'Transparency IT System'])
            ->template('contact_us')
            ->emailFormat('html')
            ->to($recipient)                                                                                                     
            ->subject('Transparency IT : Inquiry')
            ->viewVars(['edata' => $edata])
            ->send();

        echo json_encode($json_data);
        $this->viewBuilder()->layout('');
        exit;  
    }

    /**
     * Email newsletter request
     * 
     */
    public function ajax_email_newsletter()
    {
        $json_data = [
            "is_success" => true,
            'message' => '<div class="label label-success fade in">Email was successfully sent!</div>'
        ];        

        $edata = $this->request->data;        

        $recipient = "admin@daniell6.sg-host.com";    
        $email_smtp = new Email('cake_smtp');
        $email_smtp->from(['websystem@daniell6.sg-host.com' => 'Transparency IT System'])
            ->template('signup_newsletter')
            ->emailFormat('html')
            ->to($recipient)                                                                                                     
            ->subject('Transparency IT : Signup Newsletter')
            ->viewVars(['edata' => $edata])
            ->send();

        echo json_encode($json_data);
        $this->viewBuilder()->layout('');
        exit;  
    }

    /**
     * updatePublish method     
     *
     */
    public function updatePublish() 
    {
        $this->viewBuilder()->layout('');     

        $id   = $this->request->data['id'];        
        $page = $this->Pages->get($id);
        if($page->is_publish == 1) {
            $page->is_publish = 0;
            $message = __("Unpublish");
        }else{
            $page->is_publish = 1;
            $message = __("Publish");
        }

        // Update is_publish
        if ($this->Pages->save($page)) {
            $return['message'] = __('You have successfully set as ').$message;
        } else {
            $return['message'] = __('Unable to update publish.');
        }

        echo json_encode($return);
        exit;
    }

    /**
     * Frontend ajax job role description
     *
     */
    public function ajax_job_roles_description() 
    {
        $this->JobRoles = TableRegistry::get('JobRoles');

        $job_role_id = $this->request->query['selected_id'];
        $jobRole     = $this->JobRoles->get($job_role_id);
        if( $jobRole ){
            $return['description'] = $jobRole->definition;
        }else{
            $return['description'] = "";
        }
        $this->viewBuilder()->layout('');
        echo json_encode($return);
        exit;

    }

    /**
     * Frontend ajax job role description
     *
     */
    public function about_us() 
    {
        $page = $this->Pages->get(1, [
            'contain' => []
        ]);

        $this->viewBuilder()->layout("front_about_us");         
        $this->set(['page' => $page, 'page_title' => $page->title]);    

    }

    /**
     * Frontend why us
     *
     */
    public function why_us() 
    {
        $page = $this->Pages->get(1, [
            'contain' => []
        ]);

        $this->viewBuilder()->layout("front_pages");         
        $this->set(['page_title' => 'Why Us?']);    

    }
}
