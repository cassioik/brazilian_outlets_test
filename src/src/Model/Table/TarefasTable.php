<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Tarefas Model
 *
 * @method \App\Model\Entity\Tarefa get($primaryKey, $options = [])
 * @method \App\Model\Entity\Tarefa newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Tarefa[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Tarefa|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Tarefa saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Tarefa patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Tarefa[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Tarefa findOrCreate($search, callable $callback = null, $options = [])
 */
class TarefasTable extends Table
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

        $this->setTable('tarefas');
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
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('titulo')
            ->maxLength('titulo', 255)
            ->requirePresence('titulo', 'create')
            ->notEmptyString('titulo');

        $validator
            ->boolean('completo')
            ->notEmptyString('completo');

        return $validator;
    }
}
