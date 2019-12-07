<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TemporalUsesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TemporalUsesTable Test Case
 */
class TemporalUsesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TemporalUsesTable
     */
    public $TemporalUses;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.TemporalUses',
        'app.Tables'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('TemporalUses') ? [] : ['className' => TemporalUsesTable::class];
        $this->TemporalUses = TableRegistry::getTableLocator()->get('TemporalUses', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TemporalUses);

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
