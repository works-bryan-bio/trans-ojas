<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * FeaturedCompany Entity
 *
 * @property int $id
 * @property int $entity_id
 * @property string $cover
 * @property string $map
 * @property string $value
 * @property string $gallery
 * @property string $testimonial
 * @property string $website
 * @property bool $hide
 * @property bool $publish
 * @property int $sorting
 * @property int $vcount
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \App\Model\Entity\Entity $entity
 */
class FeaturedCompany extends Entity
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
