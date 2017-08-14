<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\IndustryGroupsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\IndustryGroupsTable Test Case
 */
class IndustryGroupsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\IndustryGroupsTable
     */
    public $IndustryGroups;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.industry_groups',
        'app.industries'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('IndustryGroups') ? [] : ['className' => 'App\Model\Table\IndustryGroupsTable'];
        $this->IndustryGroups = TableRegistry::get('IndustryGroups', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->IndustryGroups);

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
