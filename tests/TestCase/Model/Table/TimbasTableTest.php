<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TimbasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TimbasTable Test Case
 */
class TimbasTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TimbasTable
     */
    public $Timbas;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Timbas'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Timbas') ? [] : ['className' => TimbasTable::class];
        $this->Timbas = TableRegistry::getTableLocator()->get('Timbas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Timbas);

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
