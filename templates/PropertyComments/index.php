<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\PropertyComment> $propertyComments
 */
?>
<div class="propertyComments index content">
    <?= $this->Html->link(__('New Property Comment'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Property Comments') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('property_id') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('comments') ?></th>
                    <th><?= $this->Paginator->sort('created_date') ?></th>
                    <th><?= $this->Paginator->sort('modified_date') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($propertyComments as $propertyComment): ?>
                <tr>
                    <td><?= $this->Number->format($propertyComment->id) ?></td>
                    <td><?= $propertyComment->has('property') ? $this->Html->link($propertyComment->property->id, ['controller' => 'Properties', 'action' => 'view', $propertyComment->property->id]) : '' ?></td>
                    <td><?= $propertyComment->has('user') ? $this->Html->link($propertyComment->user->id, ['controller' => 'Users', 'action' => 'view', $propertyComment->user->id]) : '' ?></td>
                    <td><?= h($propertyComment->comments) ?></td>
                    <td><?= h($propertyComment->created_date) ?></td>
                    <td><?= h($propertyComment->modified_date) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $propertyComment->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $propertyComment->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $propertyComment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $propertyComment->id)]) ?>
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
