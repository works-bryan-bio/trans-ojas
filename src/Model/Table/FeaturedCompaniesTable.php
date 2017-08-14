<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * FeaturedCompanies Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Entities
 *
 * @method \App\Model\Entity\FeaturedCompany get($primaryKey, $options = [])
 * @method \App\Model\Entity\FeaturedCompany newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\FeaturedCompany[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\FeaturedCompany|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\FeaturedCompany patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\FeaturedCompany[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\FeaturedCompany findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class FeaturedCompaniesTable extends Table
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

        $this->table('featured_companies');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Entities', [
            'foreignKey' => 'entity_id',
            'joinType' => 'INNER'
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
            ->requirePresence('cover', 'create')
            ->notEmpty('cover');

        $validator
            ->requirePresence('map', 'create')
            ->notEmpty('map');

        $validator
            ->requirePresence('value', 'create')
            ->notEmpty('value');

        $validator
            ->requirePresence('gallery', 'create')
            ->notEmpty('gallery');

        $validator
            ->requirePresence('testimonial', 'create')
            ->notEmpty('testimonial');

        $validator
            ->requirePresence('website', 'create')
            ->notEmpty('website');

        $validator
            ->boolean('hide')
            ->requirePresence('hide', 'create')
            ->notEmpty('hide');

        $validator
            ->boolean('publish')
            ->requirePresence('publish', 'create')
            ->notEmpty('publish');

        $validator
            ->integer('sorting')
            ->requirePresence('sorting', 'create')
            ->notEmpty('sorting');

        $validator
            ->integer('vcount')
            ->requirePresence('vcount', 'create')
            ->notEmpty('vcount');

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
        $rules->add($rules->existsIn(['entity_id'], 'Entities'));

        return $rules;
    }
}
