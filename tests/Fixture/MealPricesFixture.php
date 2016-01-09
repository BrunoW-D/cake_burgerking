<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * MealPricesFixture
 *
 */
class MealPricesFixture extends TestFixture
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
        'meal_type_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'prix' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'IDX_E7827A99CCD7E912' => ['type' => 'index', 'columns' => ['meal_id'], 'length' => []],
            'IDX_E7827A99EC666B44' => ['type' => 'index', 'columns' => ['meal_type_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'FK_E7827A99CCD7E912' => ['type' => 'foreign', 'columns' => ['meal_id'], 'references' => ['meals', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'FK_E7827A99EC666B44' => ['type' => 'foreign', 'columns' => ['meal_type_id'], 'references' => ['meal_types', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_unicode_ci'
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
            'meal_type_id' => 1,
            'prix' => 1
        ],
    ];
}
