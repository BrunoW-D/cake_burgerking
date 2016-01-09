<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MealsProductsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MealsProductsTable Test Case
 */
class MealsProductsTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.meals_products',
        'app.meals',
        'app.meal_lines',
        'app.meal_prices',
        'app.products',
        'app.categories',
        'app.product_lines',
        'app.stocks'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('MealsProducts') ? [] : ['className' => 'App\Model\Table\MealsProductsTable'];
        $this->MealsProducts = TableRegistry::get('MealsProducts', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MealsProducts);

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
