<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @method \App\Model\Entity\User newEmptyEntity()
 * @method \App\Model\Entity\User newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\User|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class UsersTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('users');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('first_name')
            ->maxLength('first_name', 255)
            ->requirePresence('first_name', 'create')
            ->notEmptyString('first_name')
            ->add('first_name',[
                'first_name'=>[
                'rule' => array('custom', '/^[A-Za-z ]+$/'),
                'message' => 'Please enter alphabets only'
                ]
                ]);

        $validator
            ->scalar('last_name')
            ->maxLength('last_name', 255)
            ->allowEmptyString('last_name')
            ->add('last_name',[
                'last_name'=>[
                'rule' => array('custom', '/^[A-Za-z ]+$/'),
                'message' => 'Please enter alphabets only'
                ]
                ]);

        $validator
            ->email('email')
            ->requirePresence('email', 'Please enter Email Id')
            ->notEmptyString('email');


        $validator
            ->scalar('phone_number')
            ->minLength('phone_number', 10)
            ->maxLength('phone_number', 12)
            ->requirePresence('phone_number', 'Please enter phone number')
            ->notEmptyString('phone_number')
            ->integer('phone_number', 'Please enter only numbers');


        $validator
            ->scalar('password')
            ->maxLength('password', 255)
            ->requirePresence('password', 'create')
            ->notEmptyString('password')
            // ->add('password',[
            // 'password'=>[
            //     'rule' => array('custom', '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/'),
            //     'message' => 'Please enter password with atleat one upper case, special character and digit'
            //     ]
            // ]);
            ->add('password', [
            'notBlank' => [
            'rule' => ['notBlank'],
            'message' => '**Please enter Password', 
            ],
            'characters' => [
            'rule' => ['custom', '/[A-Z]/'],
            'message' => '**Please Enter One upper Case.'
            ],
            'lowercase' => [
            'rule' => ['custom', '/[a-z]/'],
            'message' => '**Please Enter One Lower Case.'
            ],
            'specialChar' => [
            'rule' => ['custom', '/[!@#$%&*_-]/'],
            'message' => '**Please Enter One Special Char.'
            ],
            'Numberic' => [
            'rule' => ['custom', '/[0-9]/'],
            'message' => '**Please Enter One Numeric Value.'
            ],
            ]);

        $validator
            ->scalar('gender')
            ->maxLength('gender', 100)
            ->requirePresence('gender', 'Please select a gender')
            ->notEmptyString('gender');

        $validator
            ->dateTime('updated_time')
            ->notEmptyDateTime('updated_time');

       $validator
       ->requirePresence('images', 'create')
       ->notEmpty('images')
       ->add('processImageUpload', 'custom', [
          'rule' => 'processImageUpload'
       ]);


        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->isUnique(['email']), ['errorField' => 'email']);

        return $rules;
    }
}
