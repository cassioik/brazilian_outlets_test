<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Tarefas Controller
 *
 * @property \App\Model\Table\TarefasTable $Tarefas
 *
 * @method \App\Model\Entity\Tarefa[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TarefasController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $tarefas = $this->paginate($this->Tarefas);

        $this->set(compact('tarefas'));
    }

    /**
     * View method
     *
     * @param string|null $id Tarefa id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tarefa = $this->Tarefas->get($id, [
            'contain' => [],
        ]);

        $this->set('tarefa', $tarefa);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tarefa = $this->Tarefas->newEntity();
        if ($this->request->is('post')) {
            $tarefa = $this->Tarefas->patchEntity($tarefa, $this->request->getData());
            if ($this->Tarefas->save($tarefa)) {
                $this->Flash->success(__('The tarefa has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tarefa could not be saved. Please, try again.'));
        }
        $this->set(compact('tarefa'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Tarefa id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tarefa = $this->Tarefas->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tarefa = $this->Tarefas->patchEntity($tarefa, $this->request->getData());
            if ($this->Tarefas->save($tarefa)) {
                $this->Flash->success(__('The tarefa has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tarefa could not be saved. Please, try again.'));
        }
        $this->set(compact('tarefa'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Tarefa id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tarefa = $this->Tarefas->get($id);
        if ($this->Tarefas->delete($tarefa)) {
            $this->Flash->success(__('The tarefa has been deleted.'));
        } else {
            $this->Flash->error(__('The tarefa could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function toggle($id = null)
    {
        $this->request->allowMethod(['post']);
        $tarefa = $this->Tarefas->get($id);
        $tarefa->completo = !$tarefa->completo;
        if ($this->Tarefas->save($tarefa)) {
            $this->Flash->success(__('A tarefa foi atualizada com sucesso.'));
            $status = 'success';
        } else {
            $this->Flash->error(__('A tarefa não pôde ser atualizada. Por favor, tente novamente.'));
            $status = 'error';
        }
        $this->set(compact('status'));
        $this->set('_serialize', ['status']);
        $this->viewBuilder()->setClassName('Json'); // Define que a resposta será JSON
    }
}
