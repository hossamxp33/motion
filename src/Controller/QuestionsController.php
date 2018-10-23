<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Questions Controller
 *
 * @property \App\Model\Table\QuestionsTable $Questions
 * @property \Alaxos\Controller\Component\FilterComponent $Filter
 */
class QuestionsController extends AppController
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
            'contain' => ['Models']
        ];
        $this->set('questions', $this->paginate($this->Filter->getFilterQuery()));
        $this->set('_serialize', ['questions']);
        
        $models = $this->Questions->Models->find('list', ['limit' => 200]);
        $this->set(compact('models'));
    }

    /**
     * View method
     *
     * @param string|null $id Question id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->viewBuilder()->layout('dashboard');
        $question = $this->Questions->get($id, [
            'contain' => ['Models', 'Answers', 'Studentanswers']
        ]);
        $this->set('question', $question);
        $this->set('_serialize', ['question']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->viewBuilder()->layout('dashboard');
        $question = $this->Questions->newEntity();
        if ($this->request->is('post')) {
            $question = $this->Questions->patchEntity($question, $this->request->data);
            if ($this->Questions->save($question)) {
                $this->Flash->success(___('the question has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $question->id]);
            } else {
                $this->Flash->error(___('the question could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $models = $this->Questions->Models->find('list', ['limit' => 200]);
        $this->set(compact('question', 'models'));
        $this->set('_serialize', ['question']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Question id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->viewBuilder()->layout('dashboard');
        $question = $this->Questions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $question = $this->Questions->patchEntity($question, $this->request->data);
            if ($this->Questions->save($question)) {
                $this->Flash->success(___('the question has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $question->id]);
            } else {
                $this->Flash->error(___('the question could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $models = $this->Questions->Models->find('list', ['limit' => 200]);
        $this->set(compact('question', 'models'));
        $this->set('_serialize', ['question']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Question id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $question = $this->Questions->get($id);
        
        try
        {
            if ($this->Questions->delete($question)) {
                $this->Flash->success(___('the question has been deleted'), ['plugin' => 'Alaxos']);
            } else {
                $this->Flash->error(___('the question could not be deleted. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        catch(\Exception $ex)
        {
            if($ex->getCode() == 23000)
            {
                $this->Flash->error(___('the question could not be deleted as it is still used in the database'), ['plugin' => 'Alaxos']);
            }
            else
            {
                $this->Flash->error(sprintf(__('The question could not be deleted: %s'), $ex->getMessage()), ['plugin' => 'Alaxos']);
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
            
            $query = $this->Questions->query();
            $query->delete()->where(['id IN' => $this->request->data['checked_ids']]);
            
            try{
                if ($statement = $query->execute()) {
                    $deleted_total = $statement->rowCount();
                    if($deleted_total == 1){
                        $this->Flash->set(___('the selected question has been deleted.'), ['element' => 'Alaxos.success']);
                    }
                    elseif($deleted_total > 1){
                        $this->Flash->set(sprintf(__('The %s selected questions have been deleted.'), $deleted_total), ['element' => 'Alaxos.success']);
                    }
                } else {
                    $this->Flash->set(___('the selected questions could not be deleted. Please, try again.'), ['element' => 'Alaxos.error']);
                }
            }
            catch(\Exception $ex){
                $this->Flash->set(___('the selected questions could not be deleted. Please, try again.'), ['element' => 'Alaxos.error', 'params' => ['exception_message' => $ex->getMessage()]]);
            }
        } else {
            $this->Flash->set(___('there was no question to delete'), ['element' => 'Alaxos.error']);
        }
        
        return $this->redirect(['action' => 'index']);
    }
    
    /**
     * Copy method
     *
     * @param string|null $id Question id.
     * @return void Redirects on successful copy, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function copy($id = null)
    {
        $question = $this->Questions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $question = $this->Questions->newEntity();
            $question = $this->Questions->patchEntity($question, $this->request->data);
            if ($this->Questions->save($question)) {
                $this->Flash->success(___('the question has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $question->id]);
            } else {
                $this->Flash->error(___('the question could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $models = $this->Questions->Models->find('list', ['limit' => 200]);
        
        $question->id = $id;
        $this->set(compact('question', 'models'));
        $this->set('_serialize', ['question']);
    }
    function GetAnswerQuestion($id){
        $this->viewBuilder()->layout('dashboard');
       // $Data = $this->Courses->Coursefeatures->find('all')->where(['Coursefeatures.course_id'=>$id]);
        $Data = $this->Questions->Answers->find('all')->where(['Answers.question_id'=>$id]);
         $this->set('Answers',$this->paginate($Data));
    $this->set('_serialize', ['data']);
    }
}
