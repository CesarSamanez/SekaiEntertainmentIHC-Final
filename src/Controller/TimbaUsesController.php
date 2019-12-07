<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TimbaUses Controller
 *
 * @property \App\Model\Table\TimbaUsesTable $TimbaUses
 *
 * @method \App\Model\Entity\TimbaUse[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TimbaUsesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Timbas', 'Users']
        ];
        $timbaUses = $this->paginate($this->TimbaUses);

        $this->set(compact('timbaUses'));
    }

    /**
     * View method
     *
     * @param string|null $id Timba Use id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $timbaUse = $this->TimbaUses->get($id, [
            'contain' => ['Timbas', 'Users']
        ]);

        $this->set('timbaUse', $timbaUse);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    /*public function add()
    {
        $timbaUse = $this->TimbaUses->newEntity();
        if ($this->request->is('post')) {
            $timbaUse = $this->TimbaUses->patchEntity($timbaUse, $this->request->getData());
            if ($this->TimbaUses->save($timbaUse)) {
                $this->Flash->success(__('The timba use has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The timba use could not be saved. Please, try again.'));
        }
        $timba = $this->TimbaUses->Timbas->find('list', ['limit' => 200]);
        $users = $this->TimbaUses->Users->find('list', ['limit' => 200]);
        $this->set(compact('timbaUse', 'timba', 'users'));
    }*/

    public function add($id = null, $check = null, $price=null, $total=null)
    {
        $this->loadModel('TimbaTemporalUses');
        if($price!=null)
          echo 'help';
        $timbaUse = $this->TimbaUses->newEntity();
        $temporalUses = $this->TimbaTemporalUses->find()->where(['status'=>'1', 'timbas_id' => $id]);
        foreach ($temporalUses as $tempU) {

        date_default_timezone_set('America/Lima');
        echo date('Y-m-d H:i:s');
        echo 'pepe';
        $time=strtotime(date('H:i:s'))-strtotime($tempU->date->format('H:i:s'));
        echo $time;
        $hours=floor($time/3600);
        $time=$time%3600;
        $minutes=floor($time/60);
        $time=$time%60;
        $seconds=$time;
        $time_string=sprintf("%02s",$hours).':'.sprintf("%02s",$minutes).':'.sprintf("%02s",$seconds);
        echo '/'.$time_string.'/';
        echo $total;

          $timbaUse = $this->TimbaUses->patchEntity($timbaUse, array('initial_date'=>$tempU->date->format('Y-m-d H:i:s'),
                                                                      'time' => $time_string,
                                                                      'people' => $price,
                                                                      'timbas_id' => $id,
                                                                      'users_id' => $this->Auth->user('id'),
                                                                      'total' =>$total
        ));
        $tempU=$this->TimbaTemporalUses->patchEntity($tempU, array('status'=>0));
        $this->TimbaTemporalUses->save($tempU);
        }
        if($check!=null){

          echo 'chabelo';
          if ($this->TimbaUses->save($timbaUse)) {
              $this->Flash->success(__('The table use has been saved.'));

              return $this->redirect(['action' => 'index']);
          }
          $this->Flash->error(__('The table use could not be saved. Please, try again.'));
        }
        if ($this->request->is('post')) {
            if ($this->TimbaUses->save($timbaUse)) {
                $this->Flash->success(__('The table use has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The table use could not be saved. Please, try again.'));
        }
        $timbas = $this->TimbaUses->Timbas->find('all');
        $users = $this->TimbaUses->Users->find('list', ['limit' => 200]);
        $this->set(compact('timbaUse', 'timbas', 'users','temporalUses'));
    }

    public function control()
    {
        $this->loadModel('TimbaTemporalUses');
        $timbaUse = $this->TimbaTemporalUses->newEntity();
        if ($this->request->is('post')) {
            $timbaUse = $this->TimbaTemporalUses->patchEntity($timbaUse, $this->request->getData());
            if ($this->TimbaTemporalUses->save($timbaUse)) {
                $this->Flash->success(__('The table use has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The table use could not be saved. Please, try again.'));
        }
        $timbas = $this->TimbaUses->Timbas->find('all');
        $timbaTemporalUses = $this->TimbaTemporalUses->find()->where(['status'=>'1']);
        $users = $this->TimbaUses->Users->find('list', ['limit' => 200]);
        $this->set(compact('timbaUse', 'timbas', 'users','timbaTemporalUses'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Timba Use id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $timbaUse = $this->TimbaUses->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $timbaUse = $this->TimbaUses->patchEntity($timbaUse, $this->request->getData());
            if ($this->TimbaUses->save($timbaUse)) {
                $this->Flash->success(__('The timba use has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The timba use could not be saved. Please, try again.'));
        }
        $timba = $this->TimbaUses->Timbas->find('list', ['limit' => 200]);
        $users = $this->TimbaUses->Users->find('list', ['limit' => 200]);
        $this->set(compact('timbaUse', 'timba', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Timba Use id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $timbaUse = $this->TimbaUses->get($id);
        if ($this->TimbaUses->delete($timbaUse)) {
            $this->Flash->success(__('The timba use has been deleted.'));
        } else {
            $this->Flash->error(__('The timba use could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
