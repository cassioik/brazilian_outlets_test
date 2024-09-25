<?php
use Migrations\AbstractMigration;

class CreateLembretesTable extends AbstractMigration
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
        $table = $this->table('lembretes');
        $table->addColumn('evento_id', 'integer')
            ->addColumn('data_lembrete', 'datetime')
            ->addForeignKey('evento_id', 'eventos', 'id')
            ->create();
    }
}
