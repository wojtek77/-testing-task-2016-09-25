<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Species Model
 *
 * @property \Cake\ORM\Association\HasMany $Games
 * @property \Cake\ORM\Association\HasMany $Subscriptions
 *
 * @method \App\Model\Entity\Species get($primaryKey, $options = [])
 * @method \App\Model\Entity\Species newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Species[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Species|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Species patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Species[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Species findOrCreate($search, callable $callback = null)
 */
class SpeciesTable extends Table
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

        $this->table('species');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->hasMany('Games', [
            'foreignKey' => 'species_id'
        ]);
        $this->hasMany('Subscriptions', [
            'foreignKey' => 'species_id'
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
