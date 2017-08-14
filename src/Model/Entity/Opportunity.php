<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Opportunity Entity
 *
 * @property int $id
 * @property string $uid
 * @property int $company_id
 * @property int $industry_id
 * @property int $opportunity_type_id
 * @property string $title
 * @property string $description
 * @property string $requirements
 * @property int $country_id
 * @property int $state_id
 * @property string $city
 * @property \Cake\I18n\Time $end_date
 * @property int $opportunity_status_id
 * @property bool $publish_contact
 * @property string $admin_remark
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property int $min_salary
 * @property int $visit_count
 *
 * @property \App\Model\Entity\Company $company
 * @property \App\Model\Entity\OpportunityType $opportunity_type
 * @property \App\Model\Entity\Country $country
 * @property \App\Model\Entity\State $state
 * @property \App\Model\Entity\OpportunityStatus $opportunity_status
 */
class Opportunity extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
}
