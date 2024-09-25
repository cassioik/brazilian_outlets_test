<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Lembrete $lembrete
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Lembretes'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Eventos'), ['controller' => 'Eventos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Evento'), ['controller' => 'Eventos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="lembretes form large-9 medium-8 columns content">
    <?= $this->Form->create($lembrete) ?>
    <fieldset>
        <legend><?= __('Add Lembrete') ?></legend>
        <?php
            echo $this->Form->control('evento_id', ['options' => $eventos]);
            echo $this->Form->control('data_lembrete');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
