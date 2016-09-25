<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Game Entity
 *
 * @property int $id
 * @property int $species_id
 * @property int $publisher_id
 * @property string $name
 * @property \Cake\I18n\Time $release_date
 * @property float $price
 * @property int $quantity
 *
 * @property \App\Model\Entity\Species $species
 * @property \App\Model\Entity\Publisher $publisher
 */
class Game extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
}
