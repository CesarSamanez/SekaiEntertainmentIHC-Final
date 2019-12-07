<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Timbas Controller
 *
 * @property \App\Model\Table\TimbasTable $Timbas
 *
 * @method \App\Model\Entity\Timba[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TimbasController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $timbas = $this->paginate($this->Timbas);

        $this->set(compact('timbas'));
    }
     public function ganancias(){
      $timbas = $this->paginate($this->Timbas);

      $this->set(compact('timbas'));
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
        $timba = $this->Timbas->get($id, [
            'contain' => []
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
        $this->loadModel('TimbaTemporalUses');
        $timba = $this->Timbas->newEntity();
        if ($this->request->is('post')) {
            $timba = $this->Timbas->patchEntity($timba, $this->request->getData());
            if ($this->Timbas->save($timba)) {
              $temp=$this->TimbaTemporalUses->newEntity();
              $temp_a=array('timbas_id' => $timba->id );
              $temp=$this->TimbaTemporalUses->patchEntity($temp,$temp_a);
              $this->TimbaTemporalUses->save($temp);
                $this->Flash->success(__('The timba has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The timba could not be saved. Please, try again.'));
        }
        $this->set(compact('timba'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Timba id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $timba = $this->Timbas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $timba = $this->Timbas->patchEntity($timba, $this->request->getData());
            if ($this->Timbas->save($timba)) {
                $this->Flash->success(__('The timba has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The timba could not be saved. Please, try again.'));
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
        $timba = $this->Timbas->get($id);
        if ($this->Timbas->delete($timba)) {
            $this->Flash->success(__('The timba has been deleted.'));
        } else {
            $this->Flash->error(__('The timba could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
