<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TableUses Model
 *
 * @property \App\Model\Table\TablesTable|\Cake\ORM\Association\BelongsTo $Tables
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\TableUse get($primaryKey, $options = [])
 * @method \App\Model\Entity\TableUse newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TableUse[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TableUse|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TableUse saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TableUse patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TableUse[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TableUse findOrCreate($search, callable $callback = null, $options = [])
 */
class TableUsesTable extends Table
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

        $this->setTable('table_uses');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Tables', [
            'foreignKey' => 'tables_id',
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
            ->time('time')
            ->requirePresence('time', 'create')
            ->allowEmptyTime('time', false);

        $validator
            ->decimal('total')
            ->requirePresence('total', 'create')
            ->allowEmptyString('total', false);

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
        $rules->add($rules->existsIn(['tables_id'], 'Tables'));
        $rules->add($rules->existsIn(['users_id'], 'Users'));

        return $rules;
    }
}
