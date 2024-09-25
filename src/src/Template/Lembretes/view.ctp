<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Lembrete $lembrete
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Lembrete'), ['action' => 'edit', $lembrete->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Lembrete'), ['action' => 'delete', $lembrete->id], ['confirm' => __('Are you sure you want to delete # {0}?', $lembrete->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Lembretes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Lembrete'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Eventos'), ['controller' => 'Eventos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Evento'), ['controller' => 'Eventos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="lembretes view large-9 medium-8 columns content">
    <h3><?= h($lembrete->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Evento') ?></th>
            <td><?= $lembrete->has('evento') ? $this->Html->link($lembrete->evento->id, ['controller' => 'Eventos', 'action' => 'view', $lembrete->evento->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($lembrete->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Data Lembrete') ?></th>
            <td><?= h($lembrete->data_lembrete) ?></td>
        </tr>
    </table>
</div>
