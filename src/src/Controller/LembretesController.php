<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Lembretes Controller
 *
 * @property \App\Model\Table\LembretesTable $Lembretes
 *
 * @method \App\Model\Entity\Lembrete[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LembretesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Eventos'],
        ];
        $lembretes = $this->paginate($this->Lembretes);

        $this->set(compact('lembretes'));
    }

    /**
     * View method
     *
     * @param string|null $id Lembrete id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $lembrete = $this->Lembretes->get($id, [
            'contain' => ['Eventos'],
        ]);

        $this->set('lembrete', $lembrete);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $lembrete = $this->Lembretes->newEntity();
        if ($this->request->is('post')) {
            $lembrete = $this->Lembretes->patchEntity($lembrete, $this->request->getData());
            if ($this->Lembretes->save($lembrete)) {
                $this->Flash->success(__('The lembrete has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The lembrete could not be saved. Please, try again.'));
        }
        $eventos = $this->Lembretes->Eventos->find('list', ['limit' => 200]);
        $this->set(compact('lembrete', 'eventos'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Lembrete id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $lembrete = $this->Lembretes->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $lembrete = $this->Lembretes->patchEntity($lembrete, $this->request->getData());
            if ($this->Lembretes->save($lembrete)) {
                $this->Flash->success(__('The lembrete has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The lembrete could not be saved. Please, try again.'));
        }
        $eventos = $this->Lembretes->Eventos->find('list', ['limit' => 200]);
        $this->set(compact('lembrete', 'eventos'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Lembrete id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $lembrete = $this->Lembretes->get($id);
        if ($this->Lembretes->delete($lembrete)) {
            $this->Flash->success(__('The lembrete has been deleted.'));
        } else {
            $this->Flash->error(__('The lembrete could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
