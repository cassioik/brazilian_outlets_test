<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Evento $evento
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Eventos'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Lembretes'), ['controller' => 'Lembretes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Lembrete'), ['controller' => 'Lembretes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="eventos form large-9 medium-8 columns content">
    <?= $this->Form->create($evento) ?>
    <fieldset>
        <legend><?= __('Add Evento') ?></legend>
        <?php
            echo $this->Form->control('nome_evento');
            echo $this->Form->control('data_inicio');
            echo $this->Form->control('data_fim');
            echo $this->Form->control('descricao');

            // Adicionar lembretes extras
            echo $this->Form->control('lembretes.0.data_lembrete', ['label' => 'Novo Lembrete']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
