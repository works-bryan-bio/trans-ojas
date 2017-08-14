<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CandidateJobRolesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CandidateJobRolesTable Test Case
 */
class CandidateJobRolesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CandidateJobRolesTable
     */
    public $CandidateJobRoles;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.candidate_job_roles',
        'app.candidates',
        'app.users',
        'app.aros',
        'app.acos',
        'app.permissions',
        'app.groups',
        'app.companies',
        'app.countries',
        'app.opportunities',
        'app.industries',
        'app.industry_groups',
        'app.opportunity_types',
        'app.states',
        'app.opportunity_statuses',
        'app.salary_types',
        'app.work_types',
        'app.opportunity_selling_points',
        'app.job_roles'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('CandidateJobRoles') ? [] : ['className' => 'App\Model\Table\CandidateJobRolesTable'];
        $this->CandidateJobRoles = TableRegistry::get('CandidateJobRoles', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CandidateJobRoles);

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
