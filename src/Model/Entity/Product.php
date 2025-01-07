<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class Product extends Entity
{
    // Fields that can be mass assigned using newEntity() or patchEntity()
    protected $_accessible = [
        'name' => true,
        'quantity' => true,
        'price' => true,
    ];

    /**
     * Format the quantity.
     *
     * @return string
     */
    protected function _getFormattedQuantity()
    {
        return number_format($this->quantity);
    }

    /**
     * Get the dynamic status based on quantity.
     *
     * @return string
     */
    protected function _getStatus()
    {
        return $this->quantity == 0 ? 'Out of Stock' : 'In Stock';
    }
}
