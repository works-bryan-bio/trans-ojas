<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\JobRolesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\JobRolesTable Test Case
 */
class JobRolesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\JobRolesTable
     */
    public $JobRoles;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
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
        $config = TableRegistry::exists('JobRoles') ? [] : ['className' => 'App\Model\Table\JobRolesTable'];
        $this->JobRoles = TableRegistry::get('JobRoles', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->JobRoles);

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
