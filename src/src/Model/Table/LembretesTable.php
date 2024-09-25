<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Lembretes Model
 *
 * @property \App\Model\Table\EventosTable&\Cake\ORM\Association\BelongsTo $Eventos
 *
 * @method \App\Model\Entity\Lembrete get($primaryKey, $options = [])
 * @method \App\Model\Entity\Lembrete newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Lembrete[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Lembrete|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Lembrete saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Lembrete patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Lembrete[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Lembrete findOrCreate($search, callable $callback = null, $options = [])
 */
class LembretesTable extends Table
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

        $this->setTable('lembretes');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Eventos', [
            'foreignKey' => 'evento_id',
            'joinType' => 'INNER',
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
            ->allowEmptyString('id', null, 'create');

        $validator
            ->dateTime('data_lembrete')
            ->requirePresence('data_lembrete', 'create')
            ->notEmptyDateTime('data_lembrete');

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
        $rules->add($rules->existsIn(['evento_id'], 'Eventos'));

        return $rules;
    }
}
