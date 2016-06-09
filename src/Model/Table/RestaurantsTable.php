<?php
namespace App\Model\Table;

use App\Model\Entity\Restaurant;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Restaurants Model
 *
 * @property \Cake\ORM\Association\HasMany $Orders
 * @property \Cake\ORM\Association\HasMany $Stocks
 */
class RestaurantsTable extends Table
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

        $this->table('restaurants');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->hasMany('Orders', [
            'foreignKey' => 'restaurant_id'
        ]);
        $this->hasMany('Stocks', [
            'foreignKey' => 'restaurant_id'
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
            ->requirePresence('ville', 'create')
            ->notEmpty('ville');

        $validator
            ->requirePresence('adresse', 'create')
            ->notEmpty('adresse');

        $validator
            ->requirePresence('cp', 'create')
            ->notEmpty('cp');

        $validator
            ->add('latitude', 'valid', ['rule' => 'numeric'])
            ->requirePresence('latitude', 'create')
            ->notEmpty('latitude');

        $validator
            ->add('longitude', 'valid', ['rule' => 'numeric'])
            ->requirePresence('longitude', 'create')
            ->notEmpty('longitude');

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
        return $rules;
    }
}
