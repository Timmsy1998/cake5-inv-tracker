<?=$this->Form->create($product);?>
<?=$this->Form->control('name', ['class' => 'form-control', 'label' => 'Product Name']);?>
<?=$this->Form->control('quantity', ['class' => 'form-control', 'label' => 'Quantity']);?>
<?=$this->Form->control('price', ['class' => 'form-control', 'label' => 'Price']);?>
<?=$this->Form->button(__('Save'), ['class' => 'btn btn-success mt-3']);?>
<?=$this->Form->end();
