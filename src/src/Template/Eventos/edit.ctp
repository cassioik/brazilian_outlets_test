<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Evento $evento
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $evento->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $evento->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Eventos'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Lembretes'), ['controller' => 'Lembretes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Lembrete'), ['controller' => 'Lembretes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="eventos form large-9 medium-8 columns content">
    <?= $this->Form->create($evento) ?>
    <fieldset>
        <legend><?= __('Edit Evento') ?></legend>
        <?php
            echo $this->Form->control('nome_evento');
            echo $this->Form->control('data_inicio');
            echo $this->Form->control('data_fim');
            echo $this->Form->control('descricao');

            // Adicionar múltiplos lembretes
            foreach ($evento->lembretes as $index => $lembrete) {
                echo $this->Form->control("lembretes.$index.data_lembrete", ['label' => 'Data do Lembrete']);
            }

            // Adicionar lembretes extras
            echo $this->Form->control('lembretes.0.data_lembrete', ['label' => 'Novo Lembrete']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
