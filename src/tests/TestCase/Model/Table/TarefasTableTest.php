<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TarefasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TarefasTable Test Case
 */
class TarefasTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TarefasTable
     */
    public $Tarefas;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Tarefas',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Tarefas') ? [] : ['className' => TarefasTable::class];
        $this->Tarefas = TableRegistry::getTableLocator()->get('Tarefas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Tarefas);

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
