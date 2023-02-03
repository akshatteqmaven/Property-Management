<style>
    .sample {
        display: none;
    }
</style>
<?php

/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Property> $properties
 */
?>
<div class="properties index content">
    <h3><?= __('Properties') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('property_title') ?></th>
                    <th><?= $this->Paginator->sort('property_description') ?></th>
                    <th><?= $this->Paginator->sort('property_image') ?></th>
                    <th><?= $this->Paginator->sort('property_category ') ?></th>
                    <th><?= $this->Paginator->sort('property_tags') ?></th>
                    <th><?= $this->Paginator->sort('posted_date') ?></th>
                    <th class="actions"><?= __('Property links') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($properties as $property) : ?>
                    <?php
                    if ($property->status == 1) {
                    ?>
                        <tr>
                            <td><?= $this->Number->format($property->id) ?></td>
                            <td><?= h($property->property_title) ?></td>
                            <td><?= h($property->property_description) ?></td>
                            <td><?= $this->Html->image(h($property->property_image)) ?></td>
                            <td><?= h($property->property_category) ?></td>
                            <td><?= h($property->property_tags) ?></td>
                            <td><?= h($property->created_date) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('click here'), ['action' => 'propertyListView', $property->id]) ?>
                            </td>
                        </tr>
                    <?php } ?>
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