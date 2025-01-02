<h1><?=$this->request->getParam('action') === 'edit' ? 'Edit Product' : 'Add Product'?></h1>
<?php echo $this->element('form'); ?>
