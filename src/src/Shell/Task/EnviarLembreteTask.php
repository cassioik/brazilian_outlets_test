<?php
namespace App\Shell\Task;

use Cake\Console\Shell;
use Cake\I18n\Time;
use Cake\Mailer\Email;
use Cake\ORM\TableRegistry;

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
        $currentDateTime = Time::now()->i18nFormat('yyyy-MM-dd HH:mm:ss');
        $this->out("[$currentDateTime] Verificando lembretes...");

        /**
         * Mais validações poderiam ser colocadas aqui, para não permitir
         * enviar um lembrete de um evento que já teve inicio ou foi finalizado,
         * por exemplo. Para fins de teste imagino que não seja necessário.
         */
        $eventosTable = TableRegistry::getTableLocator()->get('Eventos');
        $eventos = $eventosTable->find()
            ->where([
                'lembrete_enviado' => false,
                'data_lembrete IS NOT' => null,
                'data_lembrete <=' => Time::now()
            ])
            ->all();

        $contador = 0;

        foreach ($eventos as $evento) {
            $email = new Email('default');
            $email->setFrom(['no-reply@example.com' => 'Lembrete de evento']) // Deixei hardcoded para fins de teste
                  ->setTo('recipient@example.com') // Deixei hardcoded para fins de teste
                  ->setSubject('Lembrete: ' . $evento->nome_evento)
                  ->send($evento->descricao);

            $evento->lembrete_enviado = true;
            $eventosTable->save($evento);

            $contador++;
        }

        $this->out("Lembretes enviados: $contador");
    }
}
