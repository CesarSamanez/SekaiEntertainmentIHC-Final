<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Timba Controller
 *
 * @property \App\Model\Table\TimbaTable $Timba
 *
 * @method \App\Model\Entity\Timba[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TimbaController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $timba = $this->paginate($this->Timba);

        $this->set(compact('timba'));
    }

    /**
     * View method
     *
     * @param string|null $id Timba id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $timba = $this->Timba->get($id, [
            'contain' => ['TimbaUses']
        ]);

        $this->set('timba', $timba);
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $timba = $this->Timba->newEntity();
        if ($this->request->is('post')) {
            $timba = $this->Timba->patchEntity($timba, $this->request->getData());
            if ($this->Timba->save($timba)) {
                $this->Flash->success(__('The {0} has been saved.', 'Timba'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Timba'));
        }
        $this->set(compact('timba'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Timba id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $timba = $this->Timba->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $timba = $this->Timba->patchEntity($timba, $this->request->getData());
            if ($this->Timba->save($timba)) {
                $this->Flash->success(__('The {0} has been saved.', 'Timba'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Timba'));
        }
        $this->set(compact('timba'));
    }


    /**
     * Delete method
     *
     * @param string|null $id Timba id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $timba = $this->Timba->get($id);
        if ($this->Timba->delete($timba)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Timba'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Timba'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
