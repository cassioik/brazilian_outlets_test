<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Evento $evento
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Evento'), ['action' => 'edit', $evento->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Evento'), ['action' => 'delete', $evento->id], ['confirm' => __('Are you sure you want to delete # {0}?', $evento->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Eventos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Evento'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Lembretes'), ['controller' => 'Lembretes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Lembrete'), ['controller' => 'Lembretes', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="eventos view large-9 medium-8 columns content">
    <h3><?= h($evento->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nome Evento') ?></th>
            <td><?= h($evento->nome_evento) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($evento->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Data Inicio') ?></th>
            <td><?= h($evento->data_inicio) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Data Fim') ?></th>
            <td><?= h($evento->data_fim) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Descricao') ?></h4>
        <?= $this->Text->autoParagraph(h($evento->descricao)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Lembretes') ?></h4>
        <?php if (!empty($evento->lembretes)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Evento Id') ?></th>
                <th scope="col"><?= __('Data Lembrete') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($evento->lembretes as $lembretes): ?>
            <tr>
                <td><?= h($lembretes->id) ?></td>
                <td><?= h($lembretes->evento_id) ?></td>
                <td><?= h($lembretes->data_lembrete) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Lembretes', 'action' => 'view', $lembretes->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Lembretes', 'action' => 'edit', $lembretes->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Lembretes', 'action' => 'delete', $lembretes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $lembretes->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
