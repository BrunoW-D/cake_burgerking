<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProductLinesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProductLinesTable Test Case
 */
class ProductLinesTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.product_lines',
        'app.products',
        'app.categories',
        'app.stocks',
        'app.meals',
        'app.meal_lines',
        'app.types',
        'app.meals_types',
        'app.orders',
        'app.restaurants',
        'app.towns',
        'app.users',
        'app.meal_prices',
        'app.meals_products'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ProductLines') ? [] : ['className' => 'App\Model\Table\ProductLinesTable'];
        $this->ProductLines = TableRegistry::get('ProductLines', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ProductLines);

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
