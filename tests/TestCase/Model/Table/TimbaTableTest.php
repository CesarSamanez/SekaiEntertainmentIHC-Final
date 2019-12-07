<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TimbaTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TimbaTable Test Case
 */
class TimbaTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TimbaTable
     */
    public $Timba;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Timba',
        'app.TimbaUses'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Timba') ? [] : ['className' => TimbaTable::class];
        $this->Timba = TableRegistry::getTableLocator()->get('Timba', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Timba);

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
