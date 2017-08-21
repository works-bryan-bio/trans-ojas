<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;

/**
 * JobRoles Controller
 *
 * @property \App\Model\Table\JobRolesTable $JobRoles
 */
class AjaxController extends AppController
{

    /**
     * Initialize method     
     *
     */
    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow();

    }

    /**
     * Ajax load states by country id method     
     */
    public function ajax_load_states_by_country_id() { 
        $this->States = TableRegistry::get('States');

        $country_id = $this->request->data['country_id'];
        $states     = $this->States->find('all')
            ->where(['States.country_id' => $country_id])
        ;

        $this->viewBuilder()->layout('');            
        $this->set('states', $states);  
    }

    /**
     * Ajax load locations by state id method     
     */
    public function ajax_load_locations_by_state_id() { 
        $this->Locations = TableRegistry::get('Locations');

        $state_id  = $this->request->data['state_id'];
        $locations = $this->Locations->find('all')
            ->where(['Locations.state_id' => $state_id])
        ;

        $this->viewBuilder()->layout('');            
        $this->set('locations', $locations);  
    }

    /**
     * Ajax load areas by location id method     
     */
    public function ajax_load_areas_by_location_id() { 
        $this->Areas = TableRegistry::get('Areas');

        $location_id = $this->request->data['location_id'];
        $areas = $this->Areas->find('all')
            ->where(['Areas.location_id' => $location_id])
        ;

        $this->viewBuilder()->layout('');            
        $this->set('areas', $areas);  
    }

    /**
     * Ajax load suburb by area id method     
     */
    public function ajax_load_suburb_by_area_id() { 
        $this->Suburbs = TableRegistry::get('Suburbs');

        $area_id = $this->request->data['area_id'];
        $suburbs = $this->Suburbs->find('all')
            ->where(['Suburbs.area_id' => $area_id])
        ;

        $this->viewBuilder()->layout('');            
        $this->set('suburbs', $suburbs);  
    }
}
