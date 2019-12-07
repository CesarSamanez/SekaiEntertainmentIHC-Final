<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TimbaUsesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TimbaUsesTable Test Case
 */
class TimbaUsesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TimbaUsesTable
     */
    public $TimbaUses;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.TimbaUses',
        'app.Timba',
        'app.Users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('TimbaUses') ? [] : ['className' => TimbaUsesTable::class];
        $this->TimbaUses = TableRegistry::getTableLocator()->get('TimbaUses', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TimbaUses);

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
