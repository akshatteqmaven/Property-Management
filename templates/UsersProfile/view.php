<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UsersProfile $usersProfile
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Users Profile'), ['action' => 'edit', $usersProfile->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Users Profile'), ['action' => 'delete', $usersProfile->id], ['confirm' => __('Are you sure you want to delete # {0}?', $usersProfile->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Users Profile'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Users Profile'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="usersProfile view content">
            <h3><?= h($usersProfile->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $usersProfile->has('user') ? $this->Html->link($usersProfile->user->id, ['controller' => 'Users', 'action' => 'view', $usersProfile->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('First Name') ?></th>
                    <td><?= h($usersProfile->first_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Last Name') ?></th>
                    <td><?= h($usersProfile->last_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Contact') ?></th>
                    <td><?= h($usersProfile->contact) ?></td>
                </tr>
                <tr>
                    <th><?= __('Address') ?></th>
                    <td><?= h($usersProfile->address) ?></td>
                </tr>
                <tr>
                    <th><?= __('Profile Image') ?></th>
                    <td><?= h($usersProfile->profile_image) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($usersProfile->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created Date') ?></th>
                    <td><?= h($usersProfile->created_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified Date') ?></th>
                    <td><?= h($usersProfile->modified_date) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
