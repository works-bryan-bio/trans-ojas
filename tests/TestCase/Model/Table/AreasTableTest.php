<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AreasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AreasTable Test Case
 */
class AreasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AreasTable
     */
    public $Areas;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.areas',
        'app.locations',
        'app.states',
        'app.countries',
        'app.companies',
        'app.users',
        'app.aros',
        'app.acos',
        'app.permissions',
        'app.groups',
        'app.candidates',
        'app.candidate_jobroles',
        'app.job_roles',
        'app.opportunities',
        'app.industries',
        'app.industry_groups',
        'app.opportunity_types',
        'app.opportunity_statuses',
        'app.salary_types',
        'app.work_types',
        'app.opportunity_selling_points',
        'app.suburbs'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Areas') ? [] : ['className' => 'App\Model\Table\AreasTable'];
        $this->Areas = TableRegistry::get('Areas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Areas);

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
