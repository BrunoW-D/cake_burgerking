<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MealsTypesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MealsTypesTable Test Case
 */
class MealsTypesTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.meals_types',
        'app.meals',
        'app.meal_lines',
        'app.meal_prices',
        'app.products',
        'app.categories',
        'app.product_lines',
        'app.stocks',
        'app.meals_products',
        'app.types'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('MealsTypes') ? [] : ['className' => 'App\Model\Table\MealsTypesTable'];
        $this->MealsTypes = TableRegistry::get('MealsTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MealsTypes);

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
