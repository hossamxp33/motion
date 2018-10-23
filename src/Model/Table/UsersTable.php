<?php
namespace App\Model\Table;

use App\Model\Entity\User;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property \Cake\ORM\Association\BelongsTo $UserGroups
 * @property \Cake\ORM\Association\BelongsToMany $Groups
 */
class UsersTable extends Table
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

        $this->table('users');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Alaxos.UserLink');
        $this->addBehavior('Alaxos.Timezoned');

        $this->belongsTo('UserGroups', [
            'foreignKey' => 'user_group_id',
            'joinType' => 'INNER'
        ]);
        // $this->belongsToMany('Groups', [
        //     'foreignKey' => 'user_id',
        //     'targetForeignKey' => 'group_id',
        //     'joinTable' => 'users_groups'
        // ]);
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

        // $validator
        //     ->requirePresence('ip_address', 'create')
        //     ->notEmpty('ip_address');

        $validator
            ->allowEmpty('username');

        $validator
            ->requirePresence('password', 'create')
            ->notEmpty('password');

        // $validator
        //     ->allowEmpty('salt');

        // $validator
        //     ->email('email')
        //     ->requirePresence('email', 'create')
        //     ->notEmpty('email');

        // $validator
        //     ->allowEmpty('activation_code');

        // $validator
        //     ->allowEmpty('forgotten_password_code');

        // $validator
        //     ->integer('forgotten_password_time')
        //     ->allowEmpty('forgotten_password_time');

        // $validator
        //     ->allowEmpty('remember_code');

        // $validator
        //     ->integer('created_on')
        //     ->requirePresence('created_on', 'create')
        //     ->notEmpty('created_on');

        // $validator
        //     ->integer('last_login')
        //     ->allowEmpty('last_login');

        // $validator
        //     ->boolean('active')
        //     ->allowEmpty('active');

        // $validator
        //     ->allowEmpty('first_name');

        // $validator
        //     ->allowEmpty('last_name');

        // $validator
        //     ->allowEmpty('company');

        // $validator
        //     ->allowEmpty('phone');

        return $validator;
    }


    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['username']));
       // $rules->add($rules->makeHashedPassword(['password']));
       // $rules->add($rules->isUnique(['email']));
       // $rules->add($rules->existsIn(['user_group_id'], 'UserGroups'));
        return $rules;
    }

    public function adddata($data)
    {
        $varadduser=$data;
        $user = $this->newEntity();
       

            $user = $this->patchEntity($user, $data);
            if ($this->save($user)) {
                //$this->Flash->success(___('the productdesign has been saved'), ['plugin' => 'Alaxos']);
               // return $this->redirect(['action' => 'view', $productdesign->id]);
            } else {
               // $this->Flash->error(___('the productdesign could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        return $user;
        return $varadduser;
    }
}
