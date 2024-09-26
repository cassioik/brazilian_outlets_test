<?php
use Migrations\AbstractMigration;

class CreateEventosTable extends AbstractMigration
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
        $table = $this->table('eventos');
        $table->addColumn('nome_evento', 'string')
            ->addColumn('data_inicio', 'datetime')
            ->addColumn('data_fim', 'datetime')
            ->addColumn('descricao', 'text', ['null' => true])
            ->addColumn('data_lembrete', 'datetime', ['null' => true])
            ->create();
    }
}
