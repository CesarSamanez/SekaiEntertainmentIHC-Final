<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TemporalUses Model
 *
 * @property \App\Model\Table\TablesTable|\Cake\ORM\Association\BelongsTo $Tables
 *
 * @method \App\Model\Entity\TemporalUse get($primaryKey, $options = [])
 * @method \App\Model\Entity\TemporalUse newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TemporalUse[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TemporalUse|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TemporalUse saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TemporalUse patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TemporalUse[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TemporalUse findOrCreate($search, callable $callback = null, $options = [])
 */
class TemporalUsesTable extends Table
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

        $this->setTable('temporal_uses');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Tables', [
            'foreignKey' => 'tables_id',
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
            ->allowEmptyString('id', 'create');

        $validator
            ->boolean('status')
            ->allowEmptyString('status', false);

        $validator
            ->dateTime('date')
            ->allowEmptyDateTime('date');

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
        $rules->add($rules->existsIn(['tables_id'], 'Tables'));

        return $rules;
    }
}
