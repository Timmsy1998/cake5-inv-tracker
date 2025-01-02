<?php

use Phinx\Seed\AbstractSeed;

class ProductsSeed extends AbstractSeed
{
    public function run(): void
    {
        $data = [
            ['name' => 'Product 1', 'quantity' => 10, 'price' => 50],
            ['name' => 'Product 2', 'quantity' => 5, 'price' => 150],
            ['name' => 'Product 3', 'quantity' => 20, 'price' => 10],
            ['name' => 'Product 4', 'quantity' => 0, 'price' => 200],
            ['name' => 'Product 5', 'quantity' => 15, 'price' => 75],
        ];

        $table = $this->table('products');
        $table->insert($data)->saveData();
    }
}
