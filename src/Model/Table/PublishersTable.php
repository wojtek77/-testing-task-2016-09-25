<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Publishers Model
 *
 * @property \Cake\ORM\Association\HasMany $Games
 *
 * @method \App\Model\Entity\Publisher get($primaryKey, $options = [])
 * @method \App\Model\Entity\Publisher newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Publisher[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Publisher|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Publisher patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Publisher[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Publisher findOrCreate($search, callable $callback = null)
 */
class PublishersTable extends Table
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

        $this->table('publishers');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->hasMany('Games', [
            'foreignKey' => 'publisher_id'
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
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        return $validator;
    }
}
