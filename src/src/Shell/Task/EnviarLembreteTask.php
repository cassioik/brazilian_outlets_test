<?php
namespace App\Shell\Task;

use Cake\Console\Shell;
use Cake\Mailer\Email;

/**
 * EnviarLembrete shell task.
 */
class EnviarLembreteTask extends Shell
{
    /**
     * Manage the available sub-commands along with their arguments and help
     *
     * @see http://book.cakephp.org/3.0/en/console-and-shells.html#configuring-options-and-generating-help
     * @return \Cake\Console\ConsoleOptionParser
     */
    public function getOptionParser()
    {
        $parser = parent::getOptionParser();

        return $parser;
    }

    /**
     * main() method.
     *
     * @return bool|int|null Success or error code.
     */
    public function main()
    {
        $this->out('Enviando lembrete...');

        $email = new Email('default');
        $email->setFrom(['no-reply@example.com' => 'My App'])
              ->setTo('recipient@example.com')
              ->setSubject('Lembrete')
              ->send('Este é um lembrete enviado pelo CakePHP.');

        $this->out('Lembrete enviado com sucesso.');
    }
}
