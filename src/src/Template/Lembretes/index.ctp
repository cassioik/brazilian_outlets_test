<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Lembrete[]|\Cake\Collection\CollectionInterface $lembretes
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Lembrete'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Eventos'), ['controller' => 'Eventos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Evento'), ['controller' => 'Eventos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="lembretes index large-9 medium-8 columns content">
    <h3><?= __('Lembretes') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('evento_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('data_lembrete') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($lembretes as $lembrete): ?>
            <tr>
                <td><?= $this->Number->format($lembrete->id) ?></td>
                <td><?= $lembrete->has('evento') ? $this->Html->link($lembrete->evento->id, ['controller' => 'Eventos', 'action' => 'view', $lembrete->evento->id]) : '' ?></td>
                <td><?= h($lembrete->data_lembrete) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $lembrete->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $lembrete->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $lembrete->id], ['confirm' => __('Are you sure you want to delete # {0}?', $lembrete->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
