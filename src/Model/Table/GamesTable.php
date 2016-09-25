<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Event\Event;
use Cake\Datasource\EntityInterface;
use ArrayObject;

/**
 * Games Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Species
 * @property \Cake\ORM\Association\BelongsTo $Publishers
 *
 * @method \App\Model\Entity\Game get($primaryKey, $options = [])
 * @method \App\Model\Entity\Game newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Game[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Game|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Game patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Game[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Game findOrCreate($search, callable $callback = null)
 */
class GamesTable extends Table
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

        $this->table('games');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->belongsTo('Species', [
            'foreignKey' => 'species_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Publishers', [
            'foreignKey' => 'publisher_id',
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
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->date('release_date')
            ->requirePresence('release_date', 'create')
            ->notEmpty('release_date');

        $validator
            ->decimal('price')
            ->requirePresence('price', 'create')
            ->notEmpty('price');

        $validator
            ->integer('quantity')
            ->requirePresence('quantity', 'create')
            ->notEmpty('quantity');

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
        $rules->add($rules->existsIn(['species_id'], 'Species'));
        $rules->add($rules->existsIn(['publisher_id'], 'Publishers'));

        return $rules;
    }

    public function afterSave(Event $event, EntityInterface $entity, ArrayObject $options)
    {
        if ($entity->isNew()) { // insert

            /* subskrypcja - wysłanie informacji o nowo dodanej grze */
            $speciesId = $entity->species_id;
            $species = $this->Species->find()->where(['id' => $speciesId])->first();
            $subscriptionsTable = \Cake\ORM\TableRegistry::get('Subscriptions');
            $subscriptionsQuery = $subscriptionsTable->find()->where(['species_id' => $speciesId]);
            $emails = [];
            foreach ($subscriptionsQuery as $subscription) {
                $emails[] = $subscription->email;
            }
            if ($emails) {
                mail(
                    implode(',', $emails),
                    'Informacja o dodaniu nowej gry',
                    "Na portalu '{$_SERVER['HTTP_HOST']}' dodana została nowa gra z gatunku '{$species->name}' o tytule '{$entity->name}'"
                );
            }

        } else { // update

            /* wysłanie emaila do administratora o sprzedaniu ostatniej gry */
            if ($entity->quantity < 1) {
                // TODO utworzyć email do administratora w systemie
                //mail('admin@localhost', "Sprzedany został ostatni egzemplarz gry {$entity->name}", "Sprzedany został ostatni egzemplarz gry {$entity->name}");
            }
        }
    }
}
