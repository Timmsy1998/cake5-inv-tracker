<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class ProductsTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);
        $this->setTable('products');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');
    }

    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create')
            ->requirePresence('name', 'create')
            ->notEmptyString('name')
            ->add('name', 'unique', ['rule' => 'validateUnique', 'provider' => 'table'])

            ->integer('quantity')
            ->requirePresence('quantity', 'create')
            ->greaterThanOrEqual('quantity', 0)

            ->decimal('price')
            ->requirePresence('price', 'create')
            ->greaterThan('price', 0)

            ->add('quantity', 'custom', [
                'rule' => function ($value, $context) {
                    if ($context['data']['price'] > 100 && $value < 10) {
                        return false;
                    }
                    return true;
                },
                'message' => 'Products with a price greater than 100 must have a minimum quantity of 10',
            ]);

        return $validator;
    }
}
