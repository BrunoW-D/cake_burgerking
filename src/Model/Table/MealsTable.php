<?php
namespace App\Model\Table;

use App\Model\Entity\Meal;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Meals Model
 *
 * @property \Cake\ORM\Association\HasMany $MealLines
 * @property \Cake\ORM\Association\HasMany $MealPrices
 * @property \Cake\ORM\Association\BelongsToMany $Products
 */
class MealsTable extends Table
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

        $this->table('meals');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->hasMany('MealLines', [
            'foreignKey' => 'meal_id'
        ]);
        $this->hasMany('MealPrices', [
            'foreignKey' => 'meal_id'
        ]);
        $this->belongsToMany('Products', [
            'foreignKey' => 'meal_id',
            'targetForeignKey' => 'product_id',
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
            ->requirePresence('image', 'create')
            ->notEmpty('image');

        return $validator;
    }
}
