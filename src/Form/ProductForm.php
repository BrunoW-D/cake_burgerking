<?php
namespace App\Form;

use Cake\Form\Form;
use Cake\Form\Schema;
use Cake\Validation\Validator;

class ProductForm extends Form
{

    protected function _buildSchema(Schema $schema)
    {
        return $schema->addField('id', 'integer')
            ->addField('qte', ['type' => 'integer']);
    }

    protected function _buildValidator(Validator $validator)
    {
        return $validator->add('qte', 'length', [
                'rule' => ['range', 1, 99],
                'message' => 'La quantité doit être comprise entre 1 et 99',
            ]);
    }

    protected function _execute(array $data)
    {
        return true;
    }
}