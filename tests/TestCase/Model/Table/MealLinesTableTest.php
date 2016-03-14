<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MealLinesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MealLinesTable Test Case
 */
class MealLinesTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.meal_lines',
        'app.meals',
        'app.meal_prices',
        'app.products',
        'app.categories',
        'app.product_lines',
        'app.stocks',
        'app.meals_products',
        'app.types',
        'app.meals_types',
        'app.orders',
        'app.restaurants',
        'app.towns',
        'app.users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('MealLines') ? [] : ['className' => 'App\Model\Table\MealLinesTable'];
        $this->MealLines = TableRegistry::get('MealLines', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MealLines);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
