<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Eventos Model
 *
 * @method \App\Model\Entity\Evento get($primaryKey, $options = [])
 * @method \App\Model\Entity\Evento newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Evento[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Evento|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Evento saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Evento patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Evento[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Evento findOrCreate($search, callable $callback = null, $options = [])
 */
class EventosTable extends Table
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

        $this->setTable('eventos');
        $this->setDisplayField('nome_evento');
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
            ->scalar('nome_evento')
            ->maxLength('nome_evento', 255)
            ->requirePresence('nome_evento', 'create')
            ->notEmptyString('nome_evento');

        $validator
            ->dateTime('data_inicio')
            ->requirePresence('data_inicio', 'create')
            ->notEmptyDateTime('data_inicio');

        $validator
            ->dateTime('data_fim')
            ->requirePresence('data_fim', 'create')
            ->notEmptyDateTime('data_fim')
            ->add('data_fim', 'custom', [
                'rule' => function ($value, $context) {
                    $dataInicio = $context['data']['data_inicio'] ?? null;
                    if ($dataInicio && $value) {
                        return $value > $dataInicio;
                    }
                    return true;
                },
                'message' => 'A data de fim deve ser maior que a data de início.'
            ]);

        $validator
            ->scalar('descricao')
            ->allowEmptyString('descricao');

        $validator
            ->dateTime('data_lembrete')
            ->allowEmptyDateTime('data_lembrete')
            ->add('data_lembrete', 'custom', [
                'rule' => function ($value, $context) {
                    $dataInicio = $context['data']['data_inicio'] ?? null;
                    if ($dataInicio && $value) {
                        return $value <= $dataInicio;
                    }
                    return true;
                },
                'message' => 'A data do lembrete não pode ser maior que a data de início.'
            ]);

        return $validator;
    }
}
