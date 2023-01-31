<?php

/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\UsersProfile> $usersProfile
 */
?>
<div class="usersProfile index content">
    <!-- <?= $this->Html->link(__('New Users Profile'), ['action' => 'add'], ['class' => 'button float-right']) ?> -->
    <h3><?= __('Users Profile') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <!-- <th><?= $this->Paginator->sort('user_id') ?></th> -->
                    <th><?= $this->Paginator->sort('first_name') ?></th>
                    <th><?= $this->Paginator->sort('last_name') ?></th>
                    <th><?= $this->Paginator->sort('contact') ?></th>
                    <th><?= $this->Paginator->sort('address') ?></th>
                    <th><?= $this->Paginator->sort('profile_image') ?></th>
                    <th><?= $this->Paginator->sort('status') ?></th>
                    <!-- <th><?= $this->Paginator->sort('created_date') ?></th> -->
                    <!-- <th><?= $this->Paginator->sort('modified_date') ?></th> -->
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($usersProfile as $usersProfile) : ?>
                    <tr>
                        <td><?= $this->Number->format($usersProfile->id) ?></td>
                        <!-- <td><?= $usersProfile->has('user') ? $this->Html->link($usersProfile->user->id, ['controller' => 'Users', 'action' => 'view', $usersProfile->user->id]) : '' ?></td> -->
                        <td><?= h($usersProfile->first_name) ?></td>
                        <td><?= h($usersProfile->last_name) ?></td>
                        <td><?= h($usersProfile->contact) ?></td>
                        <td><?= h($usersProfile->address) ?></td>
                        <td><?= $this->Html->image(h($usersProfile->profile_image), (array('width' => '50px'))) ?></td>
                        <td><?= h($users->status) ?></td>
                        <!-- <td><?= h($usersProfile->created_date) ?></td> -->
                        <!-- <td><?= h($usersProfile->modified_date) ?></td> -->
                        <td class="actions">
                            <!-- <?= $this->Html->link(__('View'), ['action' => 'view', $usersProfile->id]) ?> -->
                            <!-- <?= $this->Html->link(__('Edit'), ['action' => 'edit', $usersProfile->id]) ?> -->
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $usersProfile->id], ['confirm' => __('Are you sure you want to delete # {0}?', $usersProfile->id)]) ?>
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