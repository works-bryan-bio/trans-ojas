<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OpportunityTypesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OpportunityTypesTable Test Case
 */
class OpportunityTypesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\OpportunityTypesTable
     */
    public $OpportunityTypes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.opportunity_types',
        'app.opportunities',
        'app.companies',
        'app.users',
        'app.aros',
        'app.acos',
        'app.permissions',
        'app.groups',
        'app.candidates',
        'app.countries',
        'app.states',
        'app.industries',
        'app.industry_groups',
        'app.opportunity_statuses'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('OpportunityTypes') ? [] : ['className' => 'App\Model\Table\OpportunityTypesTable'];
        $this->OpportunityTypes = TableRegistry::get('OpportunityTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->OpportunityTypes);

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
}
