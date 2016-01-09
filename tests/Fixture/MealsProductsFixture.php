<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * MealsProductsFixture
 *
 */
class MealsProductsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'meal_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'accompagnement_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'boisson_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'meal_id' => ['type' => 'index', 'columns' => ['meal_id', 'accompagnement_id', 'boisson_id'], 'length' => []],
            'accompagnement_id' => ['type' => 'index', 'columns' => ['accompagnement_id'], 'length' => []],
            'boisson_id' => ['type' => 'index', 'columns' => ['boisson_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'meals_products_ibfk_3' => ['type' => 'foreign', 'columns' => ['boisson_id'], 'references' => ['products', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'meals_products_ibfk_1' => ['type' => 'foreign', 'columns' => ['meal_id'], 'references' => ['meals', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'meals_products_ibfk_2' => ['type' => 'foreign', 'columns' => ['accompagnement_id'], 'references' => ['products', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8mb4_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'id' => 1,
            'meal_id' => 1,
            'accompagnement_id' => 1,
            'boisson_id' => 1
        ],
    ];
}
