<?php

/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\UsersProfile> $usersProfile
 */
?>
<style>
    .switch {
        position: relative;
        display: inline-block;
        width: 65px;
        height: 35px;
    }

    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: green;
        -webkit-transition: .2s;
        transition: .2s;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 26px;
        width: 26px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        -webkit-transition: .2s;
        transition: .2s;
    }

    input:checked+.slider {
        background-color: red;
    }


    input:checked+.slider:before {
        -webkit-transform: translateX(30px);
        -ms-transform: translateX(30px);
        transform: translateX(30px);
    }

    /* Rounded sliders */
    .slider.round {
        border-radius: 34px;
    }

    .slider.round:before {
        border-radius: 50%;
    }
</style>
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
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($usersProfile as $userProfile) : ?>
                    <tr>
                        <td><?= $this->Number->format($userProfile->id) ?></td>
                        <!-- <td><?= $userProfile->has('user') ? $this->Html->link($userProfile->user->id, ['controller' => 'Users', 'action' => 'view', $userProfile->user->id]) : '' ?></td> -->
                        <td><?= h($userProfile->first_name) ?></td>
                        <td><?= h($userProfile->last_name) ?></td>
                        <td><?= h($userProfile->contact) ?></td>
                        <td><?= h($userProfile->address) ?></td>
                        <td><?= $this->Html->image(h($userProfile->profile_image), (array('width' => '50px'))) ?></td>
                        <td>
                            <?php if ($userProfile->user->status == 1) : ?>
                                <?= $this->Form->postLink(__('Deactivate'), ['action' => 'userStatus', $userProfile->id, $userProfile->user->status], ['confirm' => __('Are you sure you want to deactivate  {0}?', $userProfile->first_name)]) ?>
                            <?php else : ?>
                                <?= $this->Form->postLink(__('Activate'), ['action' => 'userStatus', $userProfile->id, $userProfile->user->status], ['confirm' => __('Are you sure you want to activate  {0}?', $userProfile->first_name)]) ?>
                            <?php endif; ?>

                        </td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['action' => 'view', $userProfile->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $userProfile->id], ['confirm' => __('Are you sure you want to delete  {0}?', $userProfile->first_name)]) ?>
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