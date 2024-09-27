<?php
namespace App\Test\TestCase\Shell\Task;

use App\Shell\Task\EnviarLembreteTask;
use Cake\TestSuite\TestCase;

/**
 * App\Shell\Task\EnviarLembreteTask Test Case
 */
class EnviarLembreteTaskTest extends TestCase
{
    /**
     * ConsoleIo mock
     *
     * @var \Cake\Console\ConsoleIo|\PHPUnit_Framework_MockObject_MockObject
     */
    public $io;

    /**
     * Test subject
     *
     * @var \App\Shell\Task\EnviarLembreteTask
     */
    public $EnviarLembrete;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->io = $this->getMockBuilder('Cake\Console\ConsoleIo')->getMock();
        $this->EnviarLembrete = new EnviarLembreteTask($this->io);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->EnviarLembrete);

        parent::tearDown();
    }

    /**
     * Test getOptionParser method
     *
     * @return void
     */
    public function testGetOptionParser()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test main method
     *
     * @return void
     */
    public function testMain()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
