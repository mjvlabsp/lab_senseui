<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Data Controller
 *
 * @property \App\Model\Table\DataTable $Data
 */
class DashboardController extends AppController {
    
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->viewBuilder()->layout('sense');
        $data = "Olá";

        $this->set(compact('data'));
        $this->set('_serialize', ['data']);
    }

}