<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Opportunities Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Companies
 * @property \Cake\ORM\Association\BelongsTo $Industries
 * @property \Cake\ORM\Association\BelongsTo $OpportunityTypes
 * @property \Cake\ORM\Association\BelongsTo $Countries
 * @property \Cake\ORM\Association\BelongsTo $States
 * @property \Cake\ORM\Association\BelongsTo $OpportunityStatuses
 *
 * @method \App\Model\Entity\Opportunity get($primaryKey, $options = [])
 * @method \App\Model\Entity\Opportunity newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Opportunity[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Opportunity|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Opportunity patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Opportunity[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Opportunity findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class OpportunitiesTable extends Table
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

        $this->table('opportunities');
        $this->displayField('title');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Industries', [
            'foreignKey' => 'industry_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('OpportunityTypes', [
            'foreignKey' => 'opportunity_type_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Countries', [
            'foreignKey' => 'country_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('States', [
            'foreignKey' => 'state_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Locations', [
            'foreignKey' => 'location_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Areas', [
            'foreignKey' => 'area_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Suburbs', [
            'foreignKey' => 'suburb_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('OpportunityStatuses', [
            'foreignKey' => 'opportunity_status_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('SalaryTypes', [
            'foreignKey' => 'salary_type_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('WorkTypes', [
            'foreignKey' => 'work_type_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('OpportunitySellingPoints', [
            'foreignKey' => 'opportunity_id'
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
            ->requirePresence('title', 'create')
            ->notEmpty('title');

        $validator
            ->requirePresence('description', 'create')
            ->notEmpty('description');

        $validator
            ->requirePresence('requirements', 'create')
            ->notEmpty('requirements');

        $validator
            ->requirePresence('city', 'create')
            ->notEmpty('city');

        /*$validator
            ->date('end_date')
            ->requirePresence('end_date', 'create')
            ->notEmpty('end_date');*/

        $validator
            ->boolean('publish_contact')
            ->requirePresence('publish_contact', 'create')
            ->notEmpty('publish_contact');

        $validator
            ->requirePresence('admin_remark', 'create')
            ->notEmpty('admin_remark');

        $validator
            ->integer('min_salary')
            ->requirePresence('min_salary', 'create')
            ->notEmpty('min_salary');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {        
        $rules->add($rules->existsIn(['industry_id'], 'Industries'));
        $rules->add($rules->existsIn(['opportunity_type_id'], 'OpportunityTypes'));
        $rules->add($rules->existsIn(['country_id'], 'Countries'));
        $rules->add($rules->existsIn(['state_id'], 'States'));
        $rules->add($rules->existsIn(['salary_type_id'], 'SalaryTypes'));
        $rules->add($rules->existsIn(['opportunity_status_id'], 'OpportunityStatuses'));
        $rules->add($rules->existsIn(['work_type_id'], 'WorkTypes'));

        return $rules;
    }
}
