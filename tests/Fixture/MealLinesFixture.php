<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * MealLinesFixture
 *
 */
class MealLinesFixture extends TestFixture
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
        'qte' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'order_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'IDX_670D0611CCD7E912' => ['type' => 'index', 'columns' => ['meal_id'], 'length' => []],
            'IDX_670D061182EA2E54' => ['type' => 'index', 'columns' => ['order_id'], 'length' => []],
            'typemenu_id' => ['type' => 'index', 'columns' => ['meal_type_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'FK_670D061182EA2E54' => ['type' => 'foreign', 'columns' => ['order_id'], 'references' => ['orders', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'FK_670D0611CCD7E912' => ['type' => 'foreign', 'columns' => ['meal_id'], 'references' => ['meals', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'meal_lines_ibfk_1' => ['type' => 'foreign', 'columns' => ['meal_type_id'], 'references' => ['types', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
            'qte' => 1,
            'order_id' => 1
        ],
    ];
}
