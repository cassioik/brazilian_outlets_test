<?php
use Migrations\AbstractMigration;

class CreateTasks extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('tarefas');
        $table->addColumn('titulo', 'string', [
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('completo', 'boolean', [
            'default' => false,
            'null' => false,
        ]);
        $table->create();
    }
}
