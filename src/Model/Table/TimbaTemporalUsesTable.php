<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TimbaTemporalUses Model
 *
 * @property \App\Model\Table\TimbasTable|\Cake\ORM\Association\BelongsTo $Timbas
 *
 * @method \App\Model\Entity\TimbaTemporalUse get($primaryKey, $options = [])
 * @method \App\Model\Entity\TimbaTemporalUse newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TimbaTemporalUse[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TimbaTemporalUse|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TimbaTemporalUse saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TimbaTemporalUse patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TimbaTemporalUse[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TimbaTemporalUse findOrCreate($search, callable $callback = null, $options = [])
 */
class TimbaTemporalUsesTable extends Table
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

        $this->setTable('timba_temporal_uses');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Timbas', [
            'foreignKey' => 'timbas_id',
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
            ->allowEmptyString('status', 'create');

        $validator
            ->dateTime('date')
            ->allowEmptyDateTime('date','create');

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
        $rules->add($rules->existsIn(['timbas_id'], 'Timbas'));

        return $rules;
    }
}
