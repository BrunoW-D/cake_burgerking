<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Order Entity.
 *
 * @property int $id
 * @property int $restaurant_id
 * @property \App\Model\Entity\Restaurant $restaurant
 * @property int $user_id
 * @property \App\Model\Entity\User $user
 * @property string ville
 * @property string $cp
 * @property string $adresse
 * @property int $prix
 * @property \Cake\I18n\Time $date
 * @property bool $active
 * @property \App\Model\Entity\MealLine[] $meal_lines
 * @property \App\Model\Entity\ProductLine[] $product_lines
 */
class Order extends Entity
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
