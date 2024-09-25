<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LembretesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LembretesTable Test Case
 */
class LembretesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\LembretesTable
     */
    public $Lembretes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Lembretes',
        'app.Eventos',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Lembretes') ? [] : ['className' => LembretesTable::class];
        $this->Lembretes = TableRegistry::getTableLocator()->get('Lembretes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Lembretes);

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
