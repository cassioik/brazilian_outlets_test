<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tarefa[]|\Cake\Collection\CollectionInterface $tarefas
 */
?>
<div class="tarefas index large-12 medium-12 columns content">
    <h3><?= __('Tarefas') ?></h3>
    <table>
        <thead>
            <tr>
                <th>Feito</th>
                <th>Tarefa</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tarefas as $tarefa): ?>
            <tr>
                <td>
                    <input type="checkbox" class="toggle-completo" data-id="<?= $tarefa->id ?>" <?= $tarefa->completo ? 'checked' : '' ?>>
                </td>
                <td><?= h($tarefa->titulo) ?></td>
                <td>
                    <?= $this->Html->link('Editar', ['action' => 'edit', $tarefa->id]) ?>
                    <?= $this->Form->postLink('Deletar', ['action' => 'delete', $tarefa->id], ['confirm' => 'Tem certeza?']) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?= $this->Html->link('Adicionar Tarefa', ['action' => 'add']) ?>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.toggle-completo').forEach(function(element) {
        element.addEventListener('change', function(event) {
            var tarefaId = this.getAttribute('data-id');
            var checkbox = this;
            fetch('<?= $this->Url->build(['controller' => 'Tarefas', 'action' => 'toggle']) ?>/' + tarefaId, {
                method: 'POST',
                headers: {
                    'X-CSRF-Token': '<?= $this->request->getParam('_csrfToken') ?>'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.status !== 'success') {
                    alert('Erro ao atualizar a tarefa.');
                    checkbox.checked = !checkbox.checked; // Reverter o estado do checkbox em caso de erro
                } else {
                    location.reload(); // Recarregar a página para exibir a mensagem Flash
                }
            });
        });
    });
});
</script>