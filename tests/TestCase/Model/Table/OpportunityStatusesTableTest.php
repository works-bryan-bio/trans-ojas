<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OpportunityStatusesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OpportunityStatusesTable Test Case
 */
class OpportunityStatusesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\OpportunityStatusesTable
     */
    public $OpportunityStatuses;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.opportunity_statuses',
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
        'app.opportunity_types',
        'app.industries',
        'app.industry_groups'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('OpportunityStatuses') ? [] : ['className' => 'App\Model\Table\OpportunityStatusesTable'];
        $this->OpportunityStatuses = TableRegistry::get('OpportunityStatuses', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->OpportunityStatuses);

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
