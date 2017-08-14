<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CandidateJobRole Entity
 *
 * @property int $id
 * @property int $candidate_id
 * @property int $job_role_id
 * @property \Cake\I18n\Time $created
 *
 * @property \App\Model\Entity\Candidate $candidate
 * @property \App\Model\Entity\JobRole $job_role
 */
class CandidateJobRole extends Entity
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
