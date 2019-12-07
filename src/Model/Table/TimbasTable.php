<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Timbas Model
 *
 * @method \App\Model\Entity\Timba get($primaryKey, $options = [])
 * @method \App\Model\Entity\Timba newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Timba[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Timba|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Timba saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Timba patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Timba[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Timba findOrCreate($search, callable $callback = null, $options = [])
 */
class TimbasTable extends Table
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

        $this->setTable('timbas');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
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
            ->allowEmptyDateTime('date', false);

        $validator
            ->integer('total_uses')
            ->allowEmptyString('total_uses', false);

        return $validator;
    }
}
