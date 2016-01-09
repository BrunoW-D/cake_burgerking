<?php
namespace App\Model\Table;

use App\Model\Entity\Order;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Orders Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Restaurants
 * @property \Cake\ORM\Association\BelongsTo $Towns
 * @property \Cake\ORM\Association\BelongsTo $Users
 * @property \Cake\ORM\Association\HasMany $MealLines
 * @property \Cake\ORM\Association\HasMany $ProductLines
 */
class OrdersTable extends Table
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

        $this->table('orders');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Restaurants', [
            'foreignKey' => 'restaurant_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Towns', [
            'foreignKey' => 'town_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('MealLines', [
            'foreignKey' => 'order_id'
        ]);
        $this->hasMany('ProductLines', [
            'foreignKey' => 'order_id'
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
            ->requirePresence('cp', 'create')
            ->notEmpty('cp');

        $validator
            ->requirePresence('adresse', 'create')
            ->notEmpty('adresse');

        $validator
            ->add('prix', 'valid', ['rule' => 'numeric'])
            ->requirePresence('prix', 'create')
            ->notEmpty('prix');

        $validator
            ->add('date', 'valid', ['rule' => 'datetime'])
            ->requirePresence('date', 'create')
            ->notEmpty('date');

        $validator
            ->add('active', 'valid', ['rule' => 'boolean'])
            ->requirePresence('active', 'create')
            ->notEmpty('active');

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
        $rules->add($rules->existsIn(['restaurant_id'], 'Restaurants'));
        $rules->add($rules->existsIn(['town_id'], 'Towns'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        return $rules;
    }
}
