<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SalaryTypesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SalaryTypesTable Test Case
 */
class SalaryTypesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SalaryTypesTable
     */
    public $SalaryTypes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.salary_types',
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
        'app.opportunity_types',
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
        $config = TableRegistry::exists('SalaryTypes') ? [] : ['className' => 'App\Model\Table\SalaryTypesTable'];
        $this->SalaryTypes = TableRegistry::get('SalaryTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SalaryTypes);

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
