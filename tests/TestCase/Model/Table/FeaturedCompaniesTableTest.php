<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FeaturedCompaniesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FeaturedCompaniesTable Test Case
 */
class FeaturedCompaniesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\FeaturedCompaniesTable
     */
    public $FeaturedCompanies;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.featured_companies',
        'app.entities'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('FeaturedCompanies') ? [] : ['className' => 'App\Model\Table\FeaturedCompaniesTable'];
        $this->FeaturedCompanies = TableRegistry::get('FeaturedCompanies', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->FeaturedCompanies);

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
