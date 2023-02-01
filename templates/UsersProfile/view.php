<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UsersProfile $usersProfile
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <?= $this->Html->link(__('Go back'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="usersProfile view content">
            <h3><?= h($usersProfile->first_name) ?></h3>
            <table>

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
                    <th><?= __('Status') ?></th>
                    <td>
                        <?php if ($usersProfile->user->status == 0) {
                            echo 'Activate';
                        } else if ($usersProfile->user->status == 1) {
                            echo 'Deactivate';
                        }
                        ?>

                    </td>
                </tr>
                <tr>
                    <th><?= __('Profile Image') ?></th>
                    <td><?= $this->Html->image(h($usersProfile->profile_image), array('width' => '220px', 'class' => 'test')) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created Date') ?></th>
                    <td><?= h($usersProfile->created_date) ?></td>
                </tr>
                <!-- <tr>
                    <th><?= __('Modified Date') ?></th>
                    <td><?= h($usersProfile->modified_date) ?></td>
                </tr> -->
            </table>
        </div>
    </div>
</div>