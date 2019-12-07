<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TableUses;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TableUses Test Case
 */
class TableUsesTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TableUses
     */
    public $TableUses;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Uses') ? [] : ['className' => TableUses::class];
        $this->TableUses = TableRegistry::getTableLocator()->get('Uses', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TableUses);

        parent::tearDown();
    }

    /**
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
