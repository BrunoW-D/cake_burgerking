<?php
namespace App\Model\Table;

use App\Model\Entity\Product;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Products Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Categories
 * @property \Cake\ORM\Association\HasMany $ProductLines
 * @property \Cake\ORM\Association\HasMany $Stocks
 * @property \Cake\ORM\Association\BelongsToMany $Meals
 */
class ProductsTable extends Table
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

        $this->table('products');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Categories', [
            'foreignKey' => 'category_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('ProductLines', [
            'foreignKey' => 'product_id'
        ]);
        $this->hasMany('Stocks', [
            'foreignKey' => 'product_id'
        ]);
        $this->belongsToMany('Meals', [
            'foreignKey' => 'product_id',
            'targetForeignKey' => 'meal_id',
            'joinTable' => 'meals_products'
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
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('nom', 'create')
            ->notEmpty('nom');

        $validator
            ->requirePresence('description', 'create')
            ->notEmpty('description');

        $validator
            ->add('prix', 'valid', ['rule' => 'numeric'])
            ->requirePresence('prix', 'create')
            ->notEmpty('prix');

        $validator
            ->requirePresence('image', 'create')
            ->notEmpty('image');

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
        $rules->add($rules->existsIn(['category_id'], 'Categories'));
        return $rules;
    }
}
