<?php

echo $this->Form->create($product);
echo $this->Form->control('name', ['class' => 'form-control']);
echo $this->Form->control('quantity', ['class' => 'form-control']);
echo $this->Form->control('price', ['class' => 'form-control']);
echo $this->Form->button(__('Save'), ['class' => 'btn btn-success mt-3']);
echo $this->Form->end();
