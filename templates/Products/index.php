<h1 class="mt-5">Products</h1>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Name</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($products as $product): ?>
            <tr>
                <td><?=h($product->name)?></td>
                <td><?=h($product->formatted_quantity)?></td> <!-- Use entity method for formatted quantity -->
                <td><?=h($product->price)?></td>
                <td><?=h($product->status)?></td> <!-- Use entity method for dynamic status -->
                <td>
                    <?=$this->Html->link('Edit', ['action' => 'edit', $product->id], ['class' => 'btn btn-primary'])?>
                </td>
            </tr>
        <?php endforeach;?>
    </tbody>
</table>
<?=$this->Paginator->prev('< ' . __('previous'), ['class' => 'btn btn-secondary'])?>
<?=$this->Paginator->numbers(['class' => 'btn btn-secondary'])?>
<?=$this->Paginator->next(__('next') . ' >', ['class' => 'btn btn-secondary'])?>
