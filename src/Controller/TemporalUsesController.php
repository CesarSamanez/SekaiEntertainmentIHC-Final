<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TemporalUses Controller
 *
 * @property \App\Model\Table\TemporalUsesTable $TemporalUses
 *
 * @method \App\Model\Entity\TemporalUse[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TemporalUsesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Tables']
        ];
        $temporalUses = $this->TemporalUses->find('all');

        $this->set(compact('temporalUses'));
    }

    /**
     * View method
     *
     * @param string|null $id Temporal Use id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $temporalUse = $this->TemporalUses->get($id, [
            'contain' => ['Tables']
        ]);

        $this->set('temporalUse', $temporalUse);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $temporalUse = $this->TemporalUses->newEntity();
        if ($this->request->is('post')) {
            $temporalUse = $this->TemporalUses->patchEntity($temporalUse, $this->request->getData());
            if ($this->TemporalUses->save($temporalUse)) {
                $this->Flash->success(__('The temporal use has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The temporal use could not be saved. Please, try again.'));
        }
        $tables = $this->TemporalUses->Tables->find('list', ['limit' => 200]);
        $this->set(compact('temporalUse', 'tables'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Temporal Use id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $temporalUse = $this->TemporalUses->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $temporalUse = $this->TemporalUses->patchEntity($temporalUse, $this->request->getData());
            if ($this->TemporalUses->save($temporalUse)) {
                $this->Flash->success(__('The temporal use has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The temporal use could not be saved. Please, try again.'));
        }
        $tables = $this->TemporalUses->Tables->find('list', ['limit' => 200]);
        $this->set(compact('temporalUse', 'tables'));
    }


    public function update($id = null)
    {
        $temporalUse = $this->TemporalUses->find()->where(['tables_id' => $id]);
        foreach ($temporalUse as $temp) {


        $temp = $this->TemporalUses->patchEntity($temp, array('status' => 1 ));
            if ($this->TemporalUses->save($temp)) {
                $this->Flash->success(__("Inicializando contador mesa $id"));

              return $this->redirect(['controller' => 'tableUses','action' => 'control']);
            }
            $this->Flash->error(__('Error :c'));

        $tables = $this->TemporalUses->Tables->find('list', ['limit' => 200]);
        $this->set(compact('temporalUse', 'tables'));
      }
    }

    /**
     * Delete method
     *
     * @param string|null $id Temporal Use id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $temporalUse = $this->TemporalUses->get($id);
        if ($this->TemporalUses->delete($temporalUse)) {
            $this->Flash->success(__('The temporal use has been deleted.'));
        } else {
            $this->Flash->error(__('The temporal use could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
