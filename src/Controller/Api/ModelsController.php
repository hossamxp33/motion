<?php namespace App\Controller\Api;
 use App\Controller\Api\AppController;

/**
 * Models Controller
 *
 * @property \App\Model\Table\ModelsTable $Models
 * @property \Alaxos\Controller\Component\FilterComponent $Filter
 */
class ModelsController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
          $this->loadComponent('Paginator');
                  $this->Auth->allow(['getdata','add','edit','view','myChat','chatBtnUsers']);

    }
    
    
public function getdata($id){
    $data=$this->Models->view(['id'=>$id],['Questions'=>['Answers']]);
    $this->set(compact('data'));
    $this->set('_serialize', ['data']);

}     
     
}


