<?php namespace App\Controller\Api;
 use App\Controller\Api\AppController;

/**
 * Questions Controller
 *
 * @property \App\Model\Table\QuestionsTable $Questions
 * @property \Alaxos\Controller\Component\FilterComponent $Filter
 */
class QuestionsController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
          $this->loadComponent('Paginator');
                  $this->Auth->allow(['getdata','add','edit','view','myChat','chatBtnUsers']);

    }
    
    
public function getdata($moid){
    $this->loadModel('Studentanswers');
    $this->loadModel('Questions');
    $this->loadModel('Models');
    $changeStatus = $this->Models->get($moid);
    $data=$this->Questions->find('all')->where(['Questions.model_id'=>$moid])->contain(['Models'])->count();
    $Data=$this->Questions->find('all')->where(['Questions.model_id'=>$moid])->contain(['Models','Answers','Studentanswers'])->toarray();
    $this->set(compact('data','Data'));
    $this->set('_serialize', ['data','Data']);

}     
     
}


