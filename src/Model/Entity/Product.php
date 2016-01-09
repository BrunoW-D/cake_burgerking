<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Product Entity.
 *
 * @property int $id
 * @property int $category_id
 * @property \App\Model\Entity\Category $category
 * @property string $nom
 * @property string $description
 * @property int $prix
 * @property string $image
 * @property \App\Model\Entity\ProductLine[] $product_lines
 * @property \App\Model\Entity\Stock[] $stocks
 * @property \App\Model\Entity\Meal[] $meals
 */
class Product extends Entity
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
