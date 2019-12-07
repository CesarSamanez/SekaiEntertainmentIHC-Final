<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TimbaTemporalUses Controller
 *
 * @property \App\Model\Table\TimbaTemporalUsesTable $TimbaTemporalUses
 *
 * @method \App\Model\Entity\TimbaTemporalUse[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TimbaTemporalUsesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Timbas']
        ];
        $timbaTemporalUses = $this->paginate($this->TimbaTemporalUses);

        $this->set(compact('timbaTemporalUses'));
    }

    /**
     * View method
     *
     * @param string|null $id Timba Temporal Use id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $timbaTemporalUse = $this->TimbaTemporalUses->get($id, [
            'contain' => ['Timbas']
        ]);

        $this->set('timbaTemporalUse', $timbaTemporalUse);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $timbaTemporalUse = $this->TimbaTemporalUses->newEntity();
        if ($this->request->is('post')) {
            $timbaTemporalUse = $this->TimbaTemporalUses->patchEntity($timbaTemporalUse, $this->request->getData());
            if ($this->TimbaTemporalUses->save($timbaTemporalUse)) {
                $this->Flash->success(__('The timba temporal use has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The timba temporal use could not be saved. Please, try again.'));
        }
        $timbas = $this->TimbaTemporalUses->Timbas->find('list', ['limit' => 200]);
        $this->set(compact('timbaTemporalUse', 'timbas'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Timba Temporal Use id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $timbaTemporalUse = $this->TimbaTemporalUses->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $timbaTemporalUse = $this->TimbaTemporalUses->patchEntity($timbaTemporalUse, $this->request->getData());
            if ($this->TimbaTemporalUses->save($timbaTemporalUse)) {
                $this->Flash->success(__('The timba temporal use has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The timba temporal use could not be saved. Please, try again.'));
        }
        $timbas = $this->TimbaTemporalUses->Timbas->find('list', ['limit' => 200]);
        $this->set(compact('timbaTemporalUse', 'timbas'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Timba Temporal Use id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $timbaTemporalUse = $this->TimbaTemporalUses->get($id);
        if ($this->TimbaTemporalUses->delete($timbaTemporalUse)) {
            $this->Flash->success(__('The timba temporal use has been deleted.'));
        } else {
            $this->Flash->error(__('The timba temporal use could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function update($id = null)
    {
        $temporalUse = $this->TimbaTemporalUses->find()->where(['timbas_id' => $id]);
        foreach ($temporalUse as $temp) {


        $temp = $this->TimbaTemporalUses->patchEntity($temp, array('status' => 1 ));
            if ($this->TimbaTemporalUses->save($temp)) {
                $this->Flash->success(__("Inicializando contador timba $id"));

              return $this->redirect(['controller' => 'timbaUses','action' => 'control']);
            }
            $this->Flash->error(__('Error :c'));

        $timbas = $this->TimbaTemporalUses->Timbas->find('list', ['limit' => 200]);
        $this->set(compact('temporalUse', 'timbas'));
      }
    }
}
