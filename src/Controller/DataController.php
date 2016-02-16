<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Data Controller
 *
 * @property \App\Model\Table\DataTable $Data
 */
class DataController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Sensors', 'Log']
        ];
        $data = $this->paginate($this->Data);

        $this->set(compact('data'));
        $this->set('_serialize', ['data']);
    }

    /**
     * View method
     *
     * @param string|null $id Data id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $data = $this->Data->get($id, [
            'contain' => ['Sensors', 'Log']
        ]);

        $this->set('data', $data);
        $this->set('_serialize', ['data']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $data = $this->Data->newEntity();
        if ($this->request->is('post')) {
            $data = $this->Data->patchEntity($data, $this->request->data);
            if ($this->Data->save($data)) {
                $this->Flash->success(__('The data has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The data could not be saved. Please, try again.'));
            }
        }
        $sensors = $this->Data->Sensors->find('list', ['limit' => 200]);
        $log = $this->Data->Log->find('list', ['limit' => 200]);
        $this->set(compact('data', 'sensors', 'log'));
        $this->set('_serialize', ['data']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Data id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $data = $this->Data->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->Data->patchEntity($data, $this->request->data);
            if ($this->Data->save($data)) {
                $this->Flash->success(__('The data has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The data could not be saved. Please, try again.'));
            }
        }
        $sensors = $this->Data->Sensors->find('list', ['limit' => 200]);
        $log = $this->Data->Log->find('list', ['limit' => 200]);
        $this->set(compact('data', 'sensors', 'log'));
        $this->set('_serialize', ['data']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Data id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $data = $this->Data->get($id);
        if ($this->Data->delete($data)) {
            $this->Flash->success(__('The data has been deleted.'));
        } else {
            $this->Flash->error(__('The data could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function send()
    {
        if(!empty($this->request->query('mac_address')) && !is_null($this->request->query('value'))) {
            $this->loadModel('Sensors');
            $sensor_id = $this->Sensors->find('all', ['conditions'   =>  ['mac_address'  =>  $this->request->query('mac_address')]]);
            //$sensor_id = $this->Sensors->find('all', ['conditions'   =>  ['mac_address'  =>  '00:00:00:00:00:00']]);
            
            //Receive raw data and send it to log table
            $sensor_id = $sensor_id->first()->id;
            $value = $this->request->query('value');
            $logdata = array(
                'sensor_id' =>  $sensor_id,
                'value' =>  $value
            );
            
            $this->LoadModel('Log');
            $log = $this->Log->newEntity();
            
            $log = $this->Log->patchEntity($log, $logdata);
            if ($this->Log->save($log)) {
                //$this->Flash->success(__('The log has been saved.'));
                //return $this->redirect(['action' => 'index']);
                $log_id = $log->id;
                
                $this->loadModel('Parameters');
                $param = $this->Parameters->find('all', ['conditions'    =>  ['sensor_id'    =>  $sensor_id]]);
                $max = $param->first()->max;
                $min = $param->first()->min;
                if( $value >= $min && $value <= $max) {
                    
                    $dataarray = array(
                        'sensor_id' =>  $sensor_id,
                        'value' =>  $value,
                        'log_id'    =>  $log_id
                    );
                    $this->loadModel('Data');
                    $data = $this->Data->newEntity();
        
                    $data = $this->Data->patchEntity($data, $dataarray);
                    if ($this->Data->save($data)) {
                        $this->Flash->success(__('The data has been saved.'));
                        //return $this->redirect(['action' => 'index']);
                        echo 'OK'; die();
                    } else {
                        $this->Flash->error(__('The data could not be saved. Please, try again.'));
                        echo 'ERROR'; die();
                    }
                    
                } else {
                    //return $this->redirect(['controller'    =>  'Log', 'action' => 'index']);
                    echo 'LOG OK'; die();
                }
                
            } else {
                $this->Flash->error(__('The log could not be saved. Please, try again.'));
            }
            
            $sensors = $this->Log->Sensors->find('list', ['limit' => 200]);
            $this->set(compact('log', 'sensors'));
            $this->set('_serialize', ['log']);
        } else {
            //debug($this->request->query('mac_address'));
            //echo $this->request->data('value');
            echo "ERROR NO VALID VALUE";die();
        }
        
        //data manipulation
        /*
        $data = $this->Data->newEntity();
        if ($this->request->is('post')) {
            $data = $this->Data->patchEntity($data, $this->request->data);
            if ($this->Data->save($data)) {
                $this->Flash->success(__('The data has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The data could not be saved. Please, try again.'));
            }
        }
        $sensors = $this->Data->Sensors->find('list', ['limit' => 200]);
        $log = $this->Data->Log->find('list', ['limit' => 200]);
        $this->set(compact('data', 'sensors', 'log'));
        $this->set('_serialize', ['data']);
        */
    }
    
    public function sendMultiple() {
        $mac = $_GET['ma'];
        $value = $_GET['v'];
        if(!empty($mac) && !is_null($value)) {
                $data = array();
                foreach($mac as $k => $m) {
                    $data[$k] = ['mac_address'  =>  $m, 'value' =>  $value[$k]];
                }
                foreach($data as $info) {
                        if(!empty($info)) {
                            $this->loadModel('Sensors');
                            $sensor_id = $this->Sensors->find('all', ['conditions'   =>  ['mac_address'  =>  $info['mac_address']]]);
                            //$sensor_id = $this->Sensors->find('all', ['conditions'   =>  ['mac_address'  =>  '00:00:00:00:00:00']]);
                            
                            //Receive raw data and send it to log table
                            $sensor_id = $sensor_id->first()->id;
                            $value = $info['value'];
                            $logdata = array(
                                'sensor_id' =>  $sensor_id,
                                'value' =>  $value
                            );
                            
                            $this->LoadModel('Log');
                            $log = $this->Log->newEntity();
                            
                            $log = $this->Log->patchEntity($log, $logdata);
                            if ($this->Log->save($log)) {
                                /*
                                //$this->Flash->success(__('The log has been saved.'));
                                //return $this->redirect(['action' => 'index']);
                                $log_id = $log->id;
                                
                                $this->loadModel('Parameters');
                                $param = $this->Parameters->find('all', ['conditions'    =>  ['sensor_id'    =>  $sensor_id]]);
                                $max = $param->first()->max;
                                $min = $param->first()->min;
                                if( $value >= $min && $value <= $max) {
                                    
                                    $dataarray = array(
                                        'sensor_id' =>  $sensor_id,
                                        'value' =>  $value,
                                        'log_id'    =>  $log_id
                                    );
                                    
                                    $this->loadModel('Data');
                                    $data = $this->Data->newEntity();
                        
                                    $data = $this->Data->patchEntity($data, $dataarray);
                                    if ($this->Data->save($data)) {
                                        $this->Flash->success(__('The data has been saved.'));
                                        //return $this->redirect(['action' => 'index']);
                                        //echo 'OK' . '<br/>'; //die();
                                    } else {
                                        $this->Flash->error(__('The data could not be saved. Please, try again.'));
                                        //echo 'ERROR' . '<br/>';// die();
                                    }
                                   
                                } else {
                                    //return $this->redirect(['controller'    =>  'Log', 'action' => 'index']);
                                    //echo 'LOG OK'. '<br/>'; //die();
                                }
                                
                            } else {
                                $this->Flash->error(__('The log could not be saved. Please, try again.'));
                            }
                            
    
                            } else {
                                //debug($this->request->query('mac_address'));
                                //echo $this->request->data('value');
                                //print("ERROR NO VALID VALUE". "<br/>"); die();
                            } */
                                $sensors = $this->Log->Sensors->find('list', ['limit' => 200]);
                                $this->set(compact('log', 'sensors'));
                                $this->set('_serialize', ['log']);
                            }
                        }
                }
        } else {
            //echo "ERROR NO VALID ARRAY"; die();
        }
    }
    
    function realTimeTable() {
        $this->loadModel('Sensors');
        $sensor_list = $this->Sensors->find('all');
        $sensors = array();
        foreach($sensor_list as $s) {
            //$sensors[$s->id] = $s->name . ' - ' . $s->location;
            $sensors[$s->id] = $s->location;
        }
        //debug($sensor_list->toArray());
        
        $last_values = array();
        foreach($sensors as $key => $name) {
            $last_read = $this->Log->find('all', ['conditions' =>  ['sensor_id'    =>  $key], 'order'  =>  ['id'   =>  'DESC']])->first();
            $last_values[] = [$last_read, $name];
            //$last_values[$key] =                         
        }
        
        $this->set(compact('last_values'));
    
        /*
        $dados = $this->Data->find('all');
        $dados = $dados->first();
        */
    }
    
    /*============================================================================================================================================================
                                                    FUNÇÃO DE TEMPO REAL, COM IMPLEMENTAÇÃO DO ALGORITMO DE ERRO
    ==============================================================================================================================================================*/
        function realTimeJson() {
        $begin = strtotime('now'); // DETERMINA TEMPO INICIAL
        //$this->viewBuilder()->layout('ajax');
        $this->loadModel('Sensors');// CARREGA MODELOS DO SENSOR
        $this->loadModel('Log');//CARREGA MODELOS DE LOG
        $this->loadModel('Parameters');//CARREGA MODELOS DE PARAMETROS
        $sensor_list = $this->Sensors->find('all');//ARMAZENA TODOS OS VALORES DOS SENSORES NA LISTA
        $sensors = array();
        foreach($sensor_list as $s) {
            //$sensors[$s->id] = $s->name . ' - ' . $s->location;
            $sensors[$s->id] = $s->location;//POPULA SENSORES[ID_SENSORES]=LOCALIZAÇÃO
        }
        $last_values = array();
        $params = $this->Parameters->find('all');//COLETA TODOS OS VALORES DOS PARAMETROS
        $higher_time = 0;
        foreach($params as $p) {
            if($p->error_time > $higher_time) //VERIFICA OS VALORES RECEBIDOS DE PARAMETROS
                $higher_time = $p->error_time; //ARMAZENA O MAIOR VALOR DE PARAMETRO PARA SERVIR COMO BASE
        }
        var_dump($higher_time);
        foreach($sensors as $key => $name) {
            $date = date('Y-m-d H:i:s',strtotime('now')); //COLETA DATA ATUAL. TEMPO REAL. CASO QUEIRA TESTES, MODIFICAR ESTA VARIÁVEL
            $date2 = date('Y-m-d H:i:s',strtotime('-'.$higher_time.'seconds')); // -param->error_time senconds    
            
            $last_read = $this->Log->find('all', ['order'  =>  ['id'   =>  'DESC']])
            ->where([
                'created BETWEEN :start AND :end'
            ])
            ->bind(':start', $date2, 'date')
            ->bind(':end',   $date, 'date');
            
            /*
            ->bind(':start', new \DateTime($date2), 'date')
            ->bind(':end',   new \DateTime($date), 'date');
            *///->limit(3);
            $data = $last_read->toArray();
            
            $dados = [];
            //var_dump($last_read->to);
            foreach($data as $dado) {
                
                
                
                $param = $this->Parameters->find('all')->where(['sensor_id'   =>  $dado->sensor_id])->first();
                
                
                if($dado->value >= $param->min && $dado->value <= $param->max ) {
                    $dados[] = ['created'   =>  $dado->created, 'value' =>  $dado->value, 'valid'   =>  true];    
                } else {
                    $dados[] = ['created'   =>  $dado->created, 'value' =>  $dado->value, 'valid'   =>  false];
                }
                
            }
            //$last_values[] = [$name, $data[1]->created];
            $last_values[] = [$name, $dados];
            //$last_values[$key] = 
        }
        var_dump($date);
        var_dump($date2);
        $end = strtotime('now');
        echo "<pre>";
        var_dump($last_values);
        echo "</pre>";
        
        /*
        $json = [];
        $i = 0;
        foreach($last_values as $lv) {
            if(!is_null($lv[0])) {
                $json[$i] = [$lv[1], $lv[0]->value, $lv[0]->created->toUnixString()];        
            } else {
                $json[$i] = [$lv[1], null, null];
            }
            $i++;
        }
       */ 
       //echo json_encode($json);
       $json = '';
        $this->set(compact('json'));
        
    
        
    }

    function realTime() {
        $this->loadModel('Sensors');
        $sensor_list = $this->Sensors->find('all');
        $sensors = array();
        foreach($sensor_list as $s) {
            //$sensors[$s->id] = $s->name . ' - ' . $s->location;
            $sensors[$s->id] = $s->location;
        }
        
        $last_values = array();
        foreach($sensors as $key => $name) {
            $last_read = $this->Data->find('all', ['conditions' =>  ['sensor_id'    =>  $key]])->first();
            $last_values[] = [$last_read, $name];
            //$last_values[$key] = 
        }
        $json = [];
        $i = 0;
        foreach($last_values as $lv) {
            if(!is_null($lv[0])) {
                $json[$i] = [$lv[1], $lv[0]->value, $lv[0]->created->toUnixString()];        
            } else {
                $json[$i] = [$lv[1], null, null];
            }
            $i++;
        }
        //echo json_encode($json); exit();
        $this->set(compact('json'));
    }
    
    function historicalView($id, $begin, $end) {
        debug($id);
        debug($begin);
        debug($end);
        $this->loadModel('Sensors');
        $sensor = $this->Sensors->find('all', ['conditions'    =>  ['id'   =>  $id]]);
        $sensor_data = $this->Data->find('all', ['conditions' =>  ['sensor_id'    =>  $id]])->order(['created'   =>  'ASC']);
        
        foreach($sensor_data AS $info) {
            debug($info->created);    
        }
    }
    
    function calibration($id) {
        
    }
    
    function calibrationAjax($id) {
        $this->viewBuilder()->layout('ajax');
        $this->loadModel('Log');
        $last_value = $this->Log->find('all', ['conditions' =>  ['sensor_id'    =>  $id], 'order'  =>  ['id'   =>  'DESC']])->first();
        $this->set(compact('last_value'));
    }
}
