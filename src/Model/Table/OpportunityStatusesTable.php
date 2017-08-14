<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * OpportunityStatuses Model
 *
 * @property \Cake\ORM\Association\HasMany $Opportunities
 *
 * @method \App\Model\Entity\OpportunityStatus get($primaryKey, $options = [])
 * @method \App\Model\Entity\OpportunityStatus newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\OpportunityStatus[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\OpportunityStatus|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\OpportunityStatus patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\OpportunityStatus[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\OpportunityStatus findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class OpportunityStatusesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('opportunity_statuses');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Opportunities', [
            'foreignKey' => 'opportunity_status_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        return $validator;
    }
}
