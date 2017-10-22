<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;
use Cake\Routing\Router;
use Cake\Network\Email\Email;

/**
 * Opportunities Controller
 *
 * @property \App\Model\Table\OpportunitiesTable $Opportunities
 */
class OpportunitiesController extends AppController
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
        $nav_selected = ["opportunities"];
        $this->set('nav_selected', $nav_selected);
        $this->Auth->allow(['front_listing','advance_search','front_view','ajax_load_sub_classifications','search_result','front_apply','search']);

    }

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['OpportunityTypes', 'Countries', 'States', 'OpportunityStatuses', 'OpportunitySellingPoints', 'Industries', 'SalaryTypes', 'WorkTypes']
        ];
        $this->set('opportunities', $this->paginate($this->Opportunities));
        $this->set('_serialize', ['opportunities']);
    }

    /**
     * View method
     *
     * @param string|null $id Opportunity id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $opportunity = $this->Opportunities->get($id, [
            'contain' => ['OpportunityTypes', 'Countries', 'States', 'OpportunityStatuses','OpportunitySellingPoints','Industries']
        ]);
        $this->set('opportunity', $opportunity);
        $this->set('_serialize', ['opportunity']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $opportunity = $this->Opportunities->newEntity();
        if ($this->request->is('post')) {            
            $this->request->data['publish_contact'] = 1;
            $opportunity = $this->Opportunities->patchEntity($opportunity, $this->request->data);            
            if ( $result_oppo = $this->Opportunities->save($opportunity)) {
                $data_key_points = $this->request->data['keySellingPoints'];
                foreach( $data_key_points as $pt ){
                    $selling_point = trim($pt);
                    if( $selling_point != "" ){
                        $data_selling_points = [
                            'opportunity_id' => $result_oppo->id,
                            'key_selling_points' => $selling_point
                        ];
                        $opportunitySellingPoint = $this->Opportunities->OpportunitySellingPoints->newEntity();
                        $opportunitySellingPoint = $this->Opportunities->OpportunitySellingPoints->patchEntity($opportunitySellingPoint, $data_selling_points);
                        $this->Opportunities->OpportunitySellingPoints->save($opportunitySellingPoint);
                    }
                }
                $country = $this->Opportunities->Countries->find()
                    ->where(['Countries.id' => $this->request->data['country_id']])
                    ->first()
                ;

                $uid = oppoGenerateUniqueId($country->iso, $result_oppo->id);
                $result_oppo->uid = $uid;
                $this->Opportunities->save($result_oppo);
                $this->Flash->success(__('The opportunity has been saved.'));
                $action = $this->request->data['save'];
                if( $action == 'save' ){
                    return $this->redirect(['action' => 'index']);
                }else{
                    return $this->redirect(['action' => 'add']);
                }                    
            } else {
                $this->Flash->error(__('The opportunity could not be saved. Please, try again.'));
            }
        }        
        $maxSellingPoints = 3;
        $salaryTypes = $this->Opportunities->SalaryTypes->find('list', ['limit' => 200]);
        $workTypes   = $this->Opportunities->WorkTypes->find('list', ['limit' => 200]);
        $opportunityTypes = $this->Opportunities->OpportunityTypes->find('list', ['limit' => 200]);
        $countries   = $this->Opportunities->Countries->find('list', ['limit' => 200]);
        $states      = $this->Opportunities->States->find('list', ['limit' => 200]);
        $opportunityStatuses = $this->Opportunities->OpportunityStatuses->find('list', ['limit' => 200]);
        $industries = $this->Opportunities->Industries->find('list', ['limit' => 200]);
        $this->set(compact('opportunity', 'opportunityTypes', 'countries', 'states', 'opportunityStatuses', 'industries', 'salaryTypes', 'workTypes','maxSellingPoints'));
        $this->set('_serialize', ['opportunity']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Opportunity id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->OpportunitySellingPoints = TableRegistry::get('OpportunitySellingPoints');
         $OpportunitySellingPoints = $this->OpportunitySellingPoints->find('all')
            ->where([
                'opportunity_id' => $id,
            ])
        ;
        $opportunity = $this->Opportunities->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $opportunity = $this->Opportunities->patchEntity($opportunity, $this->request->data);            
            if ($this->Opportunities->save($opportunity)) {
                $this->Flash->success(__('The opportunity has been saved.'));
                $action = $this->request->data['save'];
                if( $action == 'save' ){

                     $OpportunitySellingPoints = $this->OpportunitySellingPoints->find('all')
                        ->where([
                            'opportunity_id' => $id,
                        ])
                    ;
                    if($OpportunitySellingPoints){
                        foreach ($OpportunitySellingPoints as  $value) {
                            $osp_id = $value->id;
                            $OpportunitySellingPoints = $this->OpportunitySellingPoints->get($osp_id);
                            $this->OpportunitySellingPoints->delete($OpportunitySellingPoints);
                        }
                    }
                        $data_key_points = $this->request->data['keySellingPoints'];
                        foreach( $data_key_points as $pt ){
                            $selling_point = trim($pt);
                            if( $selling_point != "" ){
                                $data_selling_points = [
                                    'opportunity_id' => $id,
                                    'key_selling_points' => $selling_point
                                ];
                                $opportunitySellingPoint = $this->Opportunities->OpportunitySellingPoints->newEntity();
                                $opportunitySellingPoint = $this->Opportunities->OpportunitySellingPoints->patchEntity($opportunitySellingPoint, $data_selling_points);
                                $this->Opportunities->OpportunitySellingPoints->save($opportunitySellingPoint);
                            }
                        }
                    

                   
                    return $this->redirect(['action' => 'index']);
                }else{
                    return $this->redirect(['action' => 'edit', $id]);
                }         
            } else {
                $this->Flash->error(__('The opportunity could not be saved. Please, try again.'));
            }
        }    

   $maxSellingPoints = 3;

        $salaryTypes = $this->Opportunities->SalaryTypes->find('list', ['limit' => 200]);
        $workTypes   = $this->Opportunities->WorkTypes->find('list', ['limit' => 200]);
        $opportunityTypes = $this->Opportunities->OpportunityTypes->find('list', ['limit' => 200]);
        $countries   = $this->Opportunities->Countries->find('list', ['limit' => 200]);
        $states      = $this->Opportunities->States->find('list', ['limit' => 200]);

        $location   = $this->Opportunities->Locations->find('list', ['limit' => 200]);
        $areas   = $this->Opportunities->Areas->find('list', ['limit' => 200]);
        $suburbs   = $this->Opportunities->Suburbs->find('list', ['limit' => 200]);

        $opportunityStatuses = $this->Opportunities->OpportunityStatuses->find('list', ['limit' => 200]);
        $industries = $this->Opportunities->Industries->find('list', ['limit' => 200]);
        $this->set(compact('opportunity', 'opportunityTypes', 'countries', 'states', 'opportunityStatuses', 'industries', 'salaryTypes', 'workTypes','maxSellingPoints', 'location' , 'areas', 'suburbs', 'OpportunitySellingPoints'));
        $this->set('_serialize', ['opportunity']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Opportunity id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $opportunity = $this->Opportunities->get($id);
        if ($this->Opportunities->delete($opportunity)) {
            $this->Flash->success(__('The opportunity has been deleted.'));
        } else {
            $this->Flash->error(__('The opportunity could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    /**
     * Front End : Listing method
     *
     * @return void
     */
    public function front_listing()
    {
        $opportunities = $this->Opportunities->find('all')
            ->contain(['OpportunityTypes', 'Countries', 'States', 'OpportunityStatuses', 'OpportunitySellingPoints', 'Industries', 'SalaryTypes', 'WorkTypes'])
            ->where(['Opportunities.end_date >=' => date("Y-m-d")])
            ->orWhere(['Opportunities.end_date' => '0000-00-00'])
            ->order(['Opportunities.end_date' => 'DESC'])
        ;

        $countries = $this->Opportunities->Countries->find('list');
        $states    = $this->Opportunities->States->find('list');
        $this->viewBuilder()->layout("job_list");    
        $this->set(['countries' => $countries, 'states' => $states]);
        $this->set('opportunities', $this->paginate($opportunities));
        $this->set('_serialize', ['opportunities']);
    }

    /**
     * Front End : Search method
     *
     * @return void
     */
    public function search()
    {
        $data = $this->request->query;

        if( $data['job_query'] != "" && $data['job_location'] > 0 ){
            $opportunities = $this->Opportunities->find('all')
                ->contain(['OpportunityTypes', 'Countries', 'States', 'OpportunityStatuses', 'OpportunitySellingPoints', 'Industries', 'SalaryTypes', 'WorkTypes'])
                ->where([                    
                    'Opportunities.state_id' => $data['job_location'],
                    'Opportunities.end_date >=' => date("Y-m-d"),
                    'Opportunities.title LIKE' => "%" . $data['job_query'] . "%"
                ])                
            ;
        }else{
            $opportunities = $this->Opportunities->find('all')
                ->contain(['OpportunityTypes', 'Countries', 'States', 'OpportunityStatuses', 'OpportunitySellingPoints', 'Industries', 'SalaryTypes', 'WorkTypes'])
                ->where([                                                            
                    'Opportunities.title LIKE' => "%" . $data['job_query'] . "%"
                ])                
            ;
        }
        
        $countries = $this->Opportunities->Countries->find('list');   
        $states    = $this->Opportunities->States->find('list');     
        $this->viewBuilder()->layout("job_list");    
        $this->set(['countries' => $countries, 'states' => $states]);
        $this->set('opportunities', $this->paginate($opportunities));
        $this->set('_serialize', ['opportunities']);            
    }

    /**
     * Front End : Search method
     *
     * @return void
     */
    public function advance_search()
    {
        $this->IndustryGroups = TableRegistry::get('IndustryGroups');

        $countries = $this->Opportunities->Countries->find('all')
            ->contain(['States'])
        ;
        $industryGroups = $this->IndustryGroups->find('list');

        $salaryTypes = $this->Opportunities->SalaryTypes->find('list', ['limit' => 200]);
        $workTypes   = $this->Opportunities->WorkTypes->find('list', ['limit' => 200]);
        $default_industry_group_id = 6;

        $this->viewBuilder()->layout("job_list");    
        $this->set(compact('industryGroups','countries','workTypes','salaryTypes','default_industry_group_id'));    
    }

    /**
     * Front End : Search Result method
     *
     * @return void
     */
    public function search_result()
    {
        $data = $this->request->query;
        if( $data['industry_id'] == 'all' || !isset($data['industry_id']) ){
            $opportunities = $this->Opportunities->find('all')
                ->contain(['OpportunityTypes', 'Countries', 'States', 'Areas', 'Locations', 'Suburbs', 'OpportunityStatuses', 'OpportunitySellingPoints', 'Industries' => ['IndustryGroups'], 'SalaryTypes', 'WorkTypes'])
                ->where([
                    'Opportunities.title LIKE' => "%" . $data['keywords'] . "%",
                    'Opportunities.description LIKE' => "%" . $data['keywords'] . "%",
                    'Opportunities.state_id' => $data['location_id'],
                    'Opportunities.work_type_id' => $data['work_type_id'],
                    'Opportunities.salary_type_id' => $data['salary_type_id'],
                    'Industries.industry_group_id' => $data['industry_group_id'],
                    'Opportunities.min_salary >=' => $data['min_salary'], 'Opportunities.max_salary <=' => $data['max_salary']                    
                ])
            ;
        }else{
            $opportunities = $this->Opportunities->find('all')
                ->contain(['OpportunityTypes', 'Countries', 'States', 'Areas', 'Locations', 'Suburbs', 'OpportunityStatuses', 'OpportunitySellingPoints', 'Industries' => ['IndustryGroups'], 'SalaryTypes', 'WorkTypes'])
                ->where([                    
                    'Opportunities.state_id' => $data['location_id'],
                    'Opportunities.work_type_id' => $data['work_type_id'],
                    'Opportunities.salary_type_id' => $data['salary_type_id'],
                    'Opportunities.industry_id' => $data['industry_id'],
                    'Opportunities.min_salary >=' => $data['min_salary'], 'Opportunities.max_salary <=' => $data['max_salary']
                ])
                ->orWhere(['Opportunities.title LIKE' => "%" . $data['keywords'] . "%", 'Opportunities.description LIKE' => "%" . $data['keywords'] . "%"])
            ;
        }              
        $this->viewBuilder()->layout("job_list");    
        $this->set('opportunities', $this->paginate($opportunities));
        $this->set('_serialize', ['opportunities']);            
    }

    /**
     * Front End : View Job method
     *
     * @return void
     */
    public function front_view( $id = null )
    {   
        $this->IndustryGroups = TableRegistry::get('IndustryGroups');

        $opportunity = $this->Opportunities->find()
            ->contain(['OpportunityTypes', 'Countries', 'Locations', 'Areas', 'Suburbs', 'OpportunitySellingPoints', 'States', 'OpportunityStatuses', 'Industries', 'SalaryTypes', 'WorkTypes'])
            ->where(['Opportunities.id' => $id])
            ->first()
        ;        

        $this->viewBuilder()->layout("job_list");    
        $this->set(compact('opportunity'));
    }

    /**
     * Front End : Apply Job method
     *
     * @return void
     */
    public function front_apply( $id = null )
    {           
        $this->IndustryGroups = TableRegistry::get('IndustryGroups');

        $opportunity = $this->Opportunities->find()
            ->contain(['OpportunityTypes', 'Countries', 'States', 'OpportunityStatuses', 'Industries', 'SalaryTypes', 'WorkTypes'])
            ->where(['Opportunities.id' => $id])
            ->first()
        ;        

        if($this->request->is('post')){
            $data = $this->request->data;

            //Send email                
            $edata = [
                'firstname' => $data['firstname'],
                'lastname' => $data['lastname'],
                'email' => $data['email'],
                'phone_number' => $data['phone_number'],
                'postcode_location' => $data['postcode_location'],
                'free_text' => $data['free_text'],
                'job_id' => $opportunity->uid,
                'job_title' => $opportunity->title
            ];             
            $company_email = "cvs@transparencyit.com";                   
            $email = new Email('cake_smtp');   
            $email->from(['websystem@daniell6.sg-host.com' => 'Transparency IT System'])
                ->template('opportunity_application')
                ->emailFormat('text')
                ->to($company_email)                    
                //->bcc(array('', ''))                                   
                ->subject('Transparency IT : Application for JOB ID ' . $opportunity->uid)
                ->attachments([
                    $this->request->data['fileToUploadResume']['name'] => [
                        'file' => $this->request->data['fileToUploadResume']['tmp_name'],
                        'mimetype' => $this->request->data['fileToUploadResume']['type'],
                        'contentId' => 'my-unique-id'
                    ],
                    $this->request->data['fileToUploadCoverPhoto']['name'] => [
                        'file' => $this->request->data['fileToUploadCoverPhoto']['tmp_name'],
                        'mimetype' => $this->request->data['fileToUploadCoverPhoto']['type'],
                        'contentId' => 'my-unique-id'
                    ]

                ])
                ->viewVars(['edata' => $edata])
                ->send();

            //Send email notification candidate
            $edata = [
                'name' => $this->request->data['firstname'] . " " . $this->request->data['lastname']
            ];

            $applicant_email = $this->request->data['email'];            
            $email = new Email('cake_smtp');   
            $email->from(['websystem@daniell6.sg-host.com' => 'Transparency IT System'])
                ->template('applicant_registration')
                ->emailFormat('text')
                ->to($applicant_email)                    
                //->bcc(array('', ''))                                   
                ->subject('Transparency IT : Application')                        
                ->viewVars(['edata' => $edata])
                ->send();

            $this->Flash->success(__("Your application was successfully sent!"));            
        }

        $this->viewBuilder()->layout("front_pages_c");    
        $this->set(compact('opportunity'));
    }

    /**
     * Front End : Load sub classification
     *
     * @return void
     */
    public function ajax_load_sub_classifications()
    {
        $this->Industries     = TableRegistry::get('Industries');
        $this->IndustryGroups = TableRegistry::get('IndustryGroups');

        $industry_group_id = $this->request->query['industry_id'];

        $industry_group = $this->IndustryGroups->find()
            ->where(['IndustryGroups.id' => $industry_group_id])
            ->first()
        ;

        $industries = $this->Industries->find('all')
            ->where(['Industries.industry_group_id' => $industry_group_id])
        ;

        $this->set(compact('industries','industry_group'));
        $this->viewBuilder()->layout('');        
    }
}
