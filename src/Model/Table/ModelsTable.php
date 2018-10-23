<?php
namespace App\Model\Table;

use App\Model\Entity\Model;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Models Model
 *
 * @property \Cake\ORM\Association\HasMany $Questions
 * @property \Cake\ORM\Association\HasMany $Settings
 * @property \Cake\ORM\Association\HasMany $Studentmodels
 */
class ModelsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('models');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Alaxos.UserLink');
        $this->addBehavior('Alaxos.Timezoned');

        $this->hasMany('Questions', [
            'foreignKey' => 'model_id'
        ]);
        $this->hasMany('Settings', [
            'foreignKey' => 'model_id'
        ]);
        $this->hasMany('Studentmodels', [
            'foreignKey' => 'model_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->integer('sort')
            ->requirePresence('sort', 'create')
            ->notEmpty('sort');

        return $validator;
    }

    public function view($id,$contain=array()){
        $data=$this->find('all')->where($id)->contain($contain)->toarray();
        return $data;
    
    }
}
