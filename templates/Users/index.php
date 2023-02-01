<?php

/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\User> $users
 */
?>
<div class="users index content">
    <?= $this->Html->link(__('New User'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Users') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('first_name') ?></th>
                    <th><?= $this->Paginator->sort('last_name') ?></th>
                    <th><?= $this->Paginator->sort('contact') ?></th>
                    <th><?= $this->Paginator->sort('address') ?></th>
                    <th><?= $this->Paginator->sort('profile_image') ?></th>
                    <th><?= $this->Paginator->sort('email') ?></th>
                    <th><?= $this->Paginator->sort('status') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user) : ?>
                    <tr>
                        <td><?= $this->Number->format($user->id) ?></td>
                        <td><?= h($user->users_profile->first_name) ?></td>
                        <td><?= h($user->users_profile->last_name) ?></td>
                        <td><?= h($user->users_profile->contact) ?></td>
                        <td><?= h($user->users_profile->address) ?></td>
                        <td><?= $this->Html->image(h($user->users_profile->profile_image), (array('width' => '50px'))) ?></td>
                        <td><?= h($user->email) ?></td>

                        <td>
                            <?php if ($user->status == 0) : ?>
                                <?= $this->Form->postLink(__('Deactivate'), ['action' => 'userStatus', $user->id, $user->status], ['block' => true, 'confirm' => __('Are you sure you want to deactivate # {0}?', $user->first_name), 'class' => 'button', 'escape' => false, 'title' => 'Deactivate Account']) ?>
                            <?php else : ?>
                                <?= $this->Form->postLink(__('Activate'), ['action' => 'userStatus', $user->id, $user->status], ['block' => true, 'confirm' => __('Are you sure you want to activate # {0}?', $user->id), 'class' => 'button', 'escape' => false, 'title' => 'Activate Account']) ?>
                            <?php endif; ?>

                        </td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['action' => 'view', $user->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>
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

<!--   
                               ///Speair code//    



<td>
                            <?php if ($user->user_type == 1) : ?>
                                <?= $this->Form->postLink(__('Admin')) ?>
                            <?php else : ?>
                                <?= $this->Form->postLink(__('User')) ?>
                            <?php endif; ?>
                        </td>/* mm*/
 -->