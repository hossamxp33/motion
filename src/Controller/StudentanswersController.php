<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Studentanswers Controller
 *
 * @property \App\Model\Table\StudentanswersTable $Studentanswers
 * @property \Alaxos\Controller\Component\FilterComponent $Filter
 */
class StudentanswersController extends AppController
{

    /**
     * Helpers
     *
     * @var array
     */
    public $helpers = ['Alaxos.AlaxosHtml', 'Alaxos.AlaxosForm', 'Alaxos.Navbars'];

    /**
     * Components
     *
     * @var array
     */
    public $components = ['Alaxos.Filter'];

    /**
    * Index method
    *
    * @return void
    */
    public function index()
    {
        $this->viewBuilder()->layout('dashboard');
        $this->paginate = [
            'contain' => ['Students', 'Questions', 'Answers']
        ];
        $this->set('studentanswers', $this->paginate($this->Filter->getFilterQuery()));
        $this->set('_serialize', ['studentanswers']);
        
        $students = $this->Studentanswers->Students->find('list', ['limit' => 200]);
        $questions = $this->Studentanswers->Questions->find('list', ['limit' => 200]);
        $answers = $this->Studentanswers->Answers->find('list', ['limit' => 200]);
        $this->set(compact('students', 'questions', 'answers'));
    }

    /**
     * View method
     *
     * @param string|null $id Studentanswer id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $studentanswer = $this->Studentanswers->get($id, [
            'contain' => ['Students', 'Questions', 'Answers']
        ]);
        $this->set('studentanswer', $studentanswer);
        $this->set('_serialize', ['studentanswer']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $studentanswer = $this->Studentanswers->newEntity();
        if ($this->request->is('post')) {
            $studentanswer = $this->Studentanswers->patchEntity($studentanswer, $this->request->data);
            if ($this->Studentanswers->save($studentanswer)) {
                $this->Flash->success(___('the studentanswer has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $studentanswer->id]);
            } else {
                $this->Flash->error(___('the studentanswer could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $students = $this->Studentanswers->Students->find('list', ['limit' => 200]);
        $questions = $this->Studentanswers->Questions->find('list', ['limit' => 200]);
        $answers = $this->Studentanswers->Answers->find('list', ['limit' => 200]);
        $this->set(compact('studentanswer', 'students', 'questions', 'answers'));
        $this->set('_serialize', ['studentanswer']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Studentanswer id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $studentanswer = $this->Studentanswers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $studentanswer = $this->Studentanswers->patchEntity($studentanswer, $this->request->data);
            if ($this->Studentanswers->save($studentanswer)) {
                $this->Flash->success(___('the studentanswer has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $studentanswer->id]);
            } else {
                $this->Flash->error(___('the studentanswer could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $students = $this->Studentanswers->Students->find('list', ['limit' => 200]);
        $questions = $this->Studentanswers->Questions->find('list', ['limit' => 200]);
        $answers = $this->Studentanswers->Answers->find('list', ['limit' => 200]);
        $this->set(compact('studentanswer', 'students', 'questions', 'answers'));
        $this->set('_serialize', ['studentanswer']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Studentanswer id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $studentanswer = $this->Studentanswers->get($id);
        
        try
        {
            if ($this->Studentanswers->delete($studentanswer)) {
                $this->Flash->success(___('the studentanswer has been deleted'), ['plugin' => 'Alaxos']);
            } else {
                $this->Flash->error(___('the studentanswer could not be deleted. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        catch(\Exception $ex)
        {
            if($ex->getCode() == 23000)
            {
                $this->Flash->error(___('the studentanswer could not be deleted as it is still used in the database'), ['plugin' => 'Alaxos']);
            }
            else
            {
                $this->Flash->error(sprintf(__('The studentanswer could not be deleted: %s'), $ex->getMessage()), ['plugin' => 'Alaxos']);
            }
        }
        
        return $this->redirect(['action' => 'index']);
    }
    
    /**
     * Delete all method
     */
    public function delete_all() {
        $this->request->allowMethod('post', 'delete');
        
        if(isset($this->request->data['checked_ids']) && !empty($this->request->data['checked_ids'])){
            
            $query = $this->Studentanswers->query();
            $query->delete()->where(['id IN' => $this->request->data['checked_ids']]);
            
            try{
                if ($statement = $query->execute()) {
                    $deleted_total = $statement->rowCount();
                    if($deleted_total == 1){
                        $this->Flash->set(___('the selected studentanswer has been deleted.'), ['element' => 'Alaxos.success']);
                    }
                    elseif($deleted_total > 1){
                        $this->Flash->set(sprintf(__('The %s selected studentanswers have been deleted.'), $deleted_total), ['element' => 'Alaxos.success']);
                    }
                } else {
                    $this->Flash->set(___('the selected studentanswers could not be deleted. Please, try again.'), ['element' => 'Alaxos.error']);
                }
            }
            catch(\Exception $ex){
                $this->Flash->set(___('the selected studentanswers could not be deleted. Please, try again.'), ['element' => 'Alaxos.error', 'params' => ['exception_message' => $ex->getMessage()]]);
            }
        } else {
            $this->Flash->set(___('there was no studentanswer to delete'), ['element' => 'Alaxos.error']);
        }
        
        return $this->redirect(['action' => 'index']);
    }
    
    /**
     * Copy method
     *
     * @param string|null $id Studentanswer id.
     * @return void Redirects on successful copy, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function copy($id = null)
    {
        $studentanswer = $this->Studentanswers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $studentanswer = $this->Studentanswers->newEntity();
            $studentanswer = $this->Studentanswers->patchEntity($studentanswer, $this->request->data);
            if ($this->Studentanswers->save($studentanswer)) {
                $this->Flash->success(___('the studentanswer has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $studentanswer->id]);
            } else {
                $this->Flash->error(___('the studentanswer could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $students = $this->Studentanswers->Students->find('list', ['limit' => 200]);
        $questions = $this->Studentanswers->Questions->find('list', ['limit' => 200]);
        $answers = $this->Studentanswers->Answers->find('list', ['limit' => 200]);
        
        $studentanswer->id = $id;
        $this->set(compact('studentanswer', 'students', 'questions', 'answers'));
        $this->set('_serialize', ['studentanswer']);
    }
    public function chart(){ 
	$this->viewBuilder()->layout('dashboard');

		    $this->paginate = [
    
    'contain' => ['Students'=>['Cities'], 'Questions'=>['Models'], 'Answers']
];

	debug($this->paginate($this->Filter->getFilterQuery()));
$this->set('studentanswers', $this->paginate($this->Filter->getFilterQuery()));
$this->set('_serialize', ['studentanswers']);
// $allmodel=$this->Studentanswers->Students->find('all')->count(['Students.id']);
// $studentcount2=$this->Studentanswers->Questions->Answers->find('all')->where(['Answers.is_correct'=>1])->contain(['Questions'=>['Studentanswers'=>function($ahmed){
//                $ahmed->where(['Studentanswers.question_id'=>10])->count(['Studentanswers.question_id']);
//                return $ahmed;
//            }]])->toarray();

$all=$this->Studentanswers->Questions->find('all')->count();
$this->set('all', $this->paginate($this->Filter->getFilterQuery()));
$this->set('_serialize', ['all']);

$city=$this->Studentanswers->Students->Cities->find('list', ['limit' => 200,'keyField' => 'id',
'valueField' => 'name']);

$students = $this->Studentanswers->Students->find('list', ['limit' => 200,'keyField' => 'id',
             'valueField' => 'name']);
$questions = $this->Studentanswers->Questions->find('list', ['limit' => 200,'keyField' => 'id',
             'valueField' => 'question']);
$answers = $this->Studentanswers->Answers->find('list', ['limit' => 200,'keyField' => 'id',
                'valueField' => 'answer']);
$model=$this->Studentanswers->Questions->Models->find('list', ['limit' => 200,'keyField' => 'id',
            'valueField' => 'name']);
$this->set(compact('students', 'questions', 'answers','city','model','all'));
}

}
