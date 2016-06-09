<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Restaurant Entity.
 *
 * @property int $id
 * @property string $ville
 * @property string $adresse
 * @property string $cp
 * @property float $latitude
 * @property float $longitude
 * @property \App\Model\Entity\Order[] $orders
 * @property \App\Model\Entity\Stock[] $stocks
 */
class Restaurant extends Entity
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
        'id' => false,
    ];
}
