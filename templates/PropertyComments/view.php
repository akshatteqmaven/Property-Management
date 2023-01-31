<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PropertyComment $propertyComment
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Property Comment'), ['action' => 'edit', $propertyComment->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Property Comment'), ['action' => 'delete', $propertyComment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $propertyComment->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Property Comments'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Property Comment'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="propertyComments view content">
            <h3><?= h($propertyComment->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Property') ?></th>
                    <td><?= $propertyComment->has('property') ? $this->Html->link($propertyComment->property->id, ['controller' => 'Properties', 'action' => 'view', $propertyComment->property->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $propertyComment->has('user') ? $this->Html->link($propertyComment->user->id, ['controller' => 'Users', 'action' => 'view', $propertyComment->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Comments') ?></th>
                    <td><?= h($propertyComment->comments) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($propertyComment->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created Date') ?></th>
                    <td><?= h($propertyComment->created_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified Date') ?></th>
                    <td><?= h($propertyComment->modified_date) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
