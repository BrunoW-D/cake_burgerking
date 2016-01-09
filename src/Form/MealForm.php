<?php
namespace App\Form;

use Cake\Form\Form;
use Cake\Form\Schema;
use Cake\Validation\Validator;

class MealForm extends Form
{

    protected function _buildSchema(Schema $schema)
    {
        return $schema->addField('id', 'integer')
            ->addField('type', ['type' => 'integer'])
            ->addField('qte', ['type' => 'integer']);
    }

    protected function _buildValidator(Validator $validator)
    {
        return $validator->add('qte', 'validValue', [
                'rule' => ['range', 1, 99],
                'message' => 'La quantité doit être comprise entre 1 et 99.'
            ])
                ->notEmpty('type', 'Choisissez la taille du menu.')
                ->notEmpty('qte', 'Choisissez la quantité.');
    }

    protected function _execute(array $data)
    {
        return true;
    }
}