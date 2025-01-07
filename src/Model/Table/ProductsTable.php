<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class ProductsTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);
        $this->setTable('products'); // Define the table used by this model
        $this->setDisplayField('name'); // Define the display field for this model
        $this->setPrimaryKey('id'); // Define the primary key for this model
    }

    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('id') // Ensure 'id' is an integer
            ->allowEmptyString('id', null, 'create') // Allow 'id' to be empty when creating a new record
            ->requirePresence('name', 'create') // Require 'name' field when creating a new record
            ->notEmptyString('name') // Ensure 'name' is not empty
            ->add('name', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']) // Ensure 'name' is unique

            ->integer('quantity') // Ensure 'quantity' is an integer
            ->requirePresence('quantity', 'create') // Require 'quantity' field when creating a new record
            ->greaterThanOrEqual('quantity', 0) // Ensure 'quantity' is greater than or equal to 0

            ->decimal('price') // Ensure 'price' is a decimal
            ->requirePresence('price', 'create') // Require 'price' field when creating a new record
            ->greaterThan('price', 0) // Ensure 'price' is greater than 0

            ->add('quantity', 'custom', [
                'rule' => function ($value, $context) {
                    if ($context['data']['price'] > 100 && $value < 10) {
                        return false; // Custom validation for price and quantity
                    }
                    return true;
                },
                'message' => 'Products with a price greater than 100 must have a minimum quantity of 10',
            ]);

        return $validator;
    }
}
