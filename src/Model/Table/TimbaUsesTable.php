<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TimbaUses Model
 *
 * @property |\Cake\ORM\Association\BelongsTo $Timbas
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\TimbaUse get($primaryKey, $options = [])
 * @method \App\Model\Entity\TimbaUse newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TimbaUse[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TimbaUse|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TimbaUse saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TimbaUse patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TimbaUse[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TimbaUse findOrCreate($search, callable $callback = null, $options = [])
 */
class TimbaUsesTable extends Table
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

        $this->setTable('timba_uses');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Timbas', [
            'foreignKey' => 'timbas_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'users_id',
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
            ->integer('people')
            ->requirePresence('people', 'create')
            ->allowEmptyString('people', false);

        $validator
            ->time('time')
            ->requirePresence('time', 'create')
            ->allowEmptyTime('time', false);

        $validator
            ->decimal('total')
            ->allowEmptyString('total');

        $validator
            ->dateTime('initial_date')
            ->requirePresence('initial_date', 'create')
            ->allowEmptyDateTime('initial_date', false);

        $validator
            ->dateTime('final_date')
            ->allowEmptyDateTime('final_date', false);

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
        $rules->add($rules->existsIn(['users_id'], 'Users'));

        return $rules;
    }
}
