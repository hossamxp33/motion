<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Studentmodels Controller
 *
 * @property \App\Model\Table\StudentmodelsTable $Studentmodels
 * @property \Alaxos\Controller\Component\FilterComponent $Filter
 */
class StudentmodelsController extends AppController
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
        $this->paginate = [
            'contain' => ['Students', 'Models']
        ];
        $this->set('studentmodels', $this->paginate($this->Filter->getFilterQuery()));
        $this->set('_serialize', ['studentmodels']);
        
        $students = $this->Studentmodels->Students->find('list', ['limit' => 200]);
        $models = $this->Studentmodels->Models->find('list', ['limit' => 200]);
        $this->set(compact('students', 'models'));
    }

    /**
     * View method
     *
     * @param string|null $id Studentmodel id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $studentmodel = $this->Studentmodels->get($id, [
            'contain' => ['Students', 'Models']
        ]);
        $this->set('studentmodel', $studentmodel);
        $this->set('_serialize', ['studentmodel']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $studentmodel = $this->Studentmodels->newEntity();
        if ($this->request->is('post')) {
            $studentmodel = $this->Studentmodels->patchEntity($studentmodel, $this->request->data);
            if ($this->Studentmodels->save($studentmodel)) {
                $this->Flash->success(___('the studentmodel has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $studentmodel->id]);
            } else {
                $this->Flash->error(___('the studentmodel could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $students = $this->Studentmodels->Students->find('list', ['limit' => 200]);
        $models = $this->Studentmodels->Models->find('list', ['limit' => 200]);
        $this->set(compact('studentmodel', 'students', 'models'));
        $this->set('_serialize', ['studentmodel']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Studentmodel id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $studentmodel = $this->Studentmodels->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $studentmodel = $this->Studentmodels->patchEntity($studentmodel, $this->request->data);
            if ($this->Studentmodels->save($studentmodel)) {
                $this->Flash->success(___('the studentmodel has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $studentmodel->id]);
            } else {
                $this->Flash->error(___('the studentmodel could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $students = $this->Studentmodels->Students->find('list', ['limit' => 200]);
        $models = $this->Studentmodels->Models->find('list', ['limit' => 200]);
        $this->set(compact('studentmodel', 'students', 'models'));
        $this->set('_serialize', ['studentmodel']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Studentmodel id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $studentmodel = $this->Studentmodels->get($id);
        
        try
        {
            if ($this->Studentmodels->delete($studentmodel)) {
                $this->Flash->success(___('the studentmodel has been deleted'), ['plugin' => 'Alaxos']);
            } else {
                $this->Flash->error(___('the studentmodel could not be deleted. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        catch(\Exception $ex)
        {
            if($ex->getCode() == 23000)
            {
                $this->Flash->error(___('the studentmodel could not be deleted as it is still used in the database'), ['plugin' => 'Alaxos']);
            }
            else
            {
                $this->Flash->error(sprintf(__('The studentmodel could not be deleted: %s'), $ex->getMessage()), ['plugin' => 'Alaxos']);
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
            
            $query = $this->Studentmodels->query();
            $query->delete()->where(['id IN' => $this->request->data['checked_ids']]);
            
            try{
                if ($statement = $query->execute()) {
                    $deleted_total = $statement->rowCount();
                    if($deleted_total == 1){
                        $this->Flash->set(___('the selected studentmodel has been deleted.'), ['element' => 'Alaxos.success']);
                    }
                    elseif($deleted_total > 1){
                        $this->Flash->set(sprintf(__('The %s selected studentmodels have been deleted.'), $deleted_total), ['element' => 'Alaxos.success']);
                    }
                } else {
                    $this->Flash->set(___('the selected studentmodels could not be deleted. Please, try again.'), ['element' => 'Alaxos.error']);
                }
            }
            catch(\Exception $ex){
                $this->Flash->set(___('the selected studentmodels could not be deleted. Please, try again.'), ['element' => 'Alaxos.error', 'params' => ['exception_message' => $ex->getMessage()]]);
            }
        } else {
            $this->Flash->set(___('there was no studentmodel to delete'), ['element' => 'Alaxos.error']);
        }
        
        return $this->redirect(['action' => 'index']);
    }
    
    /**
     * Copy method
     *
     * @param string|null $id Studentmodel id.
     * @return void Redirects on successful copy, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function copy($id = null)
    {
        $studentmodel = $this->Studentmodels->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $studentmodel = $this->Studentmodels->newEntity();
            $studentmodel = $this->Studentmodels->patchEntity($studentmodel, $this->request->data);
            if ($this->Studentmodels->save($studentmodel)) {
                $this->Flash->success(___('the studentmodel has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $studentmodel->id]);
            } else {
                $this->Flash->error(___('the studentmodel could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $students = $this->Studentmodels->Students->find('list', ['limit' => 200]);
        $models = $this->Studentmodels->Models->find('list', ['limit' => 200]);
        
        $studentmodel->id = $id;
        $this->set(compact('studentmodel', 'students', 'models'));
        $this->set('_serialize', ['studentmodel']);
    }
}
