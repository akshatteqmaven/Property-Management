<style>
    .button.float-right {
        margin-right: 19px;
    }
</style>
<?php


/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Property> $properties
 */
?>
<div class="properties index content">
    <?= $this->Html->link(__('New Property'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Properties') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('property_title') ?></th>
                    <th><?= $this->Paginator->sort('property_description') ?></th>
                    <th><?= $this->Paginator->sort('property_category') ?></th>
                    <th><?= $this->Paginator->sort('property_image') ?></th>
                    <th><?= $this->Paginator->sort('property_tags') ?></th>
                    <th><?= $this->Paginator->sort('status') ?></th>
                    <th><?= $this->Paginator->sort('created_date') ?></th>
                    <th><?= $this->Paginator->sort('modified_date') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($properties as $property) : ?>
                    <tr>
                        <td><?= $this->Number->format($property->id) ?></td>
                        <td><?= h($property->property_title) ?></td>
                        <td><?= h($property->property_description) ?></td>
                        <td><?= h($property->property_category) ?></td>
                        <td><?= $this->Html->image(h($property->property_image)) ?></td>
                        <td><?= h($property->property_tags) ?></td>
                        <td>
                            <?php if ($property->status == 1) : ?>
                                <?= $this->Form->postLink(__('Active'), ['action' => 'propertyStatus', $property->id, $property->status], ['confirm' => __('Are you sure you want to change the status of : {0}?', $property->property_title)]) ?>
                            <?php else : ?>
                                <?= $this->Form->postLink(__('Inactive'), ['action' => 'propertyStatus', $property->id, $property->status], ['confirm' => __('Are you sure you want to  change the status of : {0}?', $property->property_title)]) ?>
                            <?php endif; ?>

                        </td>
                        <td><?= h($property->created_date) ?></td>
                        <td><?= h($property->modified_date) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['action' => 'view', $property->id]) ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $property->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $property->id], ['confirm' => __('Are you sure you want to delete : {0}?', $property->property_title)]) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>