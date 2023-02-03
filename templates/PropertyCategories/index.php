<?php

/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Propertyproperty_category> $propertyCategories
 */
?>
<div class="propertyCategories index content">

    <?= $this->Html->link(__('New Property property_category'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Property Categories') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('property_category_name') ?></th>
                    <th><?= $this->Paginator->sort('status') ?></th>
                    <th><?= $this->Paginator->sort('created_date') ?></th>
                    <th><?= $this->Paginator->sort('modified_date') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($propertyCategories as $propertyproperty_category) : ?>
                    <tr>
                        <td><?= $this->Number->format($propertyproperty_category->id) ?></td>
                        <td><?= h($propertyproperty_category->property_category_name) ?></td>
                        <td><?= h($propertyproperty_category->status) ?></td>
                        <td><?= h($propertyproperty_category->created_date) ?></td>
                        <td><?= h($propertyproperty_category->modified_date) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['action' => 'view', $propertyproperty_category->id]) ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $propertyproperty_category->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $propertyproperty_category->id], ['confirm' => __('Are you sure you want to delete # {0}?', $propertyproperty_category->id)]) ?>
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