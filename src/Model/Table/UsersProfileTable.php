<?php

declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * UsersProfile Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\UsersProfile newEmptyEntity()
 * @method \App\Model\Entity\UsersProfile newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\UsersProfile[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\UsersProfile get($primaryKey, $options = [])
 * @method \App\Model\Entity\UsersProfile findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\UsersProfile patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\UsersProfile[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\UsersProfile|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\UsersProfile saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\UsersProfile[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\UsersProfile[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\UsersProfile[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\UsersProfile[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class UsersProfileTable extends Table
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

        $this->setTable('users_profile');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
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
            ->maxLength('first_name', 155)
            ->requirePresence('first_name', 'create')
            ->notEmptyString('first_name', 'Please enter your First name')
            ->add('first_name', [
                'notBlank' => [
                    'rule'    => ['notBlank'],
                    'message' => 'Please enter your First name',
                    'last' => true
                ],
                'characters' => [
                    'rule'    => ['custom', '/^[A-Z_ ]+$/i'],
                    'allowEmpty' => false,
                    'last' => true,
                    'message' => 'Please Enter characters only.'
                ],
                'length' => [
                    'rule' => ['minLength', 2],
                    'last' => true,
                    'message' => 'First Name need to be at least 2 characters long',
                ],
            ]);

        $validator
            ->scalar('last_name')
            ->maxLength('last_name', 155)
            ->requirePresence('last_name', 'create')
            ->notEmptyString('last_name', 'Please enter your last name')
            ->add('last_name', [
                'notBlank' => [
                    'rule'    => ['notBlank'],
                    'message' => 'Please enter your Last name',
                    'last' => true
                ],
                'characters' => [
                    'rule'    => ['custom', '/^[A-Z_ ]+$/i'],
                    'allowEmpty' => false,
                    'last' => true,
                    'message' => 'Please Enter characters only.'
                ],
                'length' => [
                    'rule' => ['minLength', 2],
                    'last' => true,
                    'message' => 'First Name need to be at least 2 characters long',
                ],
            ]);

        $validator
            ->scalar('contact')
            ->maxLength('contact', 155)
            ->requirePresence('contact', 'create')
            ->notEmptyString('contact', 'Please enter your Contact details')
            ->add('contact', [

                'number' => [
                    'rule'    => ['custom', '/^[0-9]+$/i'],
                    'allowEmpty' => false,
                    'last' => true,
                    'message' => 'Please Enter numbers only.'
                ],
                'minLength' => [
                    'rule' => ['minLength', 10],
                    'message' => 'Contact Number needs to be 10 characters long',
                ],
                'maxLength' => [
                    'rule' => ['maxLength', 10],
                    'message' => 'Contact Number needs to be only 10 characters long',
                ]
            ]);

        $validator
            ->scalar('address')
            ->maxLength('address', 155)
            ->requirePresence('address', 'create')
            ->notEmptyString('address', 'Please enter your address');

        $validator
            ->scalar('profile_image')
            ->requirePresence('profile_image', 'create')
            ->notEmptyFile('profile_image', 'Please select an image')
            ->add('image', 'size', ['rule' => ['filesize', '2MB']]);

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
        $rules->add($rules->existsIn('user_id', 'Users'), ['errorField' => 'user_id']);

        return $rules;
    }
}
