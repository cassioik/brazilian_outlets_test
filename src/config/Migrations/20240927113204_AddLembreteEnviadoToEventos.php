<?php
use Migrations\AbstractMigration;

class AddLembreteEnviadoToEventos extends AbstractMigration
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
        $table->addColumn('lembrete_enviado', 'boolean', [
            'default' => null,
            'null' => false,
        ]);
        $table->update();
    }
}
