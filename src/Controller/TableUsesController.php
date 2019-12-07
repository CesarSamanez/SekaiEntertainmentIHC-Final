<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TableUses Controller
 *
 * @property \App\Model\Table\TableUsesTable $TableUses
 *
 * @method \App\Model\Entity\TableUse[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TableUsesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Tables', 'Users']
        ];
        $tableUses = $this->paginate($this->TableUses);

        $this->set(compact('tableUses'));
    }

    /**
     * View method
     *
     * @param string|null $id Table Use id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tableUse = $this->TableUses->get($id, [
            'contain' => ['Tables', 'Users']
        ]);

        $this->set('tableUse', $tableUse);
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tableUse = $this->TableUses->newEntity();
        if ($this->request->is('post')) {
            $tableUse = $this->TableUses->patchEntity($tableUse, $this->request->getData());
            if ($this->TableUses->save($tableUse)) {
                $this->Flash->success(__('The {0} has been saved.', 'Table Use'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Table Use'));
        }
        $tables = $this->TableUses->Tables->find('list', ['limit' => 200]);
        $users = $this->TableUses->Users->find('list', ['limit' => 200]);
        $this->set(compact('tableUse', 'tables', 'users'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Table Use id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tableUse = $this->TableUses->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tableUse = $this->TableUses->patchEntity($tableUse, $this->request->getData());
            if ($this->TableUses->save($tableUse)) {
                $this->Flash->success(__('The {0} has been saved.', 'Table Use'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Table Use'));
        }
        $tables = $this->TableUses->Tables->find('list', ['limit' => 200]);
        $users = $this->TableUses->Users->find('list', ['limit' => 200]);
        $this->set(compact('tableUse', 'tables', 'users'));
    }


    /**
     * Delete method
     *
     * @param string|null $id Table Use id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tableUse = $this->TableUses->get($id);
        if ($this->TableUses->delete($tableUse)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Table Use'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Table Use'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
