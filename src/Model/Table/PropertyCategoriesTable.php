<?php

declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PropertyCategories Model
 *
 * @method \App\Model\Entity\PropertyCategory newEmptyEntity()
 * @method \App\Model\Entity\PropertyCategory newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\PropertyCategory[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PropertyCategory get($primaryKey, $options = [])
 * @method \App\Model\Entity\PropertyCategory findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\PropertyCategory patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PropertyCategory[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\PropertyCategory|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PropertyCategory saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PropertyCategory[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\PropertyCategory[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\PropertyCategory[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\PropertyCategory[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class PropertyCategoriesTable extends Table
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

        $this->setTable('property_categories');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('Properties', [
            'foreignKey' => 'property_categorie_id',
            'joinType' => 'INNER'
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
            ->scalar('category_name')
            ->maxLength('category_name', 155)
            ->requirePresence('category_name', 'create')
            ->notEmptyString('category_name');



        return $validator;
    }
}
