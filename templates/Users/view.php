<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Users'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New User'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="users view content">
            <h3><?= h($user->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($user->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('User Type') ?></th>
                    <td><?= h($user->user_type) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= h($user->status) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($user->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created Date') ?></th>
                    <td><?= h($user->created_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified Date') ?></th>
                    <td><?= h($user->modified_date) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Properties') ?></h4>
                <?php if (!empty($user->properties)) : ?>
                    <div class="table-responsive">
                        <table>
                            <tr>
                                <th><?= __('Id') ?></th>
                                <th><?= __('User Id') ?></th>
                                <th><?= __('Property Title') ?></th>
                                <th><?= __('Property Description') ?></th>
                                <th><?= __('Property property_category') ?></th>
                                <th><?= __('Property Image') ?></th>
                                <th><?= __('Property Tags') ?></th>
                                <th><?= __('Status') ?></th>
                                <th><?= __('Created Date') ?></th>
                                <th><?= __('Modified Date') ?></th>
                                <th class="actions"><?= __('Actions') ?></th>
                            </tr>
                            <?php foreach ($user->properties as $properties) : ?>
                                <tr>
                                    <td><?= h($properties->id) ?></td>
                                    <td><?= h($properties->user_id) ?></td>
                                    <td><?= h($properties->property_title) ?></td>
                                    <td><?= h($properties->property_description) ?></td>
                                    <td><?= h($properties->property_category) ?></td>
                                    <td><?= h($properties->property_image) ?></td>
                                    <td><?= h($properties->property_tags) ?></td>
                                    <td><?= h($properties->status) ?></td>
                                    <td><?= h($properties->created_date) ?></td>
                                    <td><?= h($properties->modified_date) ?></td>
                                    <td class="actions">
                                        <?= $this->Html->link(__('View'), ['controller' => 'Properties', 'action' => 'view', $properties->id]) ?>
                                        <?= $this->Html->link(__('Edit'), ['controller' => 'Properties', 'action' => 'edit', $properties->id]) ?>
                                        <?= $this->Form->postLink(__('Delete'), ['controller' => 'Properties', 'action' => 'delete', $properties->id], ['confirm' => __('Are you sure you want to delete # {0}?', $properties->id)]) ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Property Comments') ?></h4>
                <?php if (!empty($user->property_comments)) : ?>
                    <div class="table-responsive">
                        <table>
                            <tr>
                                <th><?= __('Id') ?></th>
                                <th><?= __('Property Id') ?></th>
                                <th><?= __('User Id') ?></th>
                                <th><?= __('Comments') ?></th>
                                <th><?= __('Created Date') ?></th>
                                <th><?= __('Modified Date') ?></th>
                                <th class="actions"><?= __('Actions') ?></th>
                            </tr>
                            <?php foreach ($user->property_comments as $propertyComments) : ?>
                                <tr>
                                    <td><?= h($propertyComments->id) ?></td>
                                    <td><?= h($propertyComments->property_id) ?></td>
                                    <td><?= h($propertyComments->user_id) ?></td>
                                    <td><?= h($propertyComments->comments) ?></td>
                                    <td><?= h($propertyComments->created_date) ?></td>
                                    <td><?= h($propertyComments->modified_date) ?></td>
                                    <td class="actions">
                                        <?= $this->Html->link(__('View'), ['controller' => 'PropertyComments', 'action' => 'view', $propertyComments->id]) ?>
                                        <?= $this->Html->link(__('Edit'), ['controller' => 'PropertyComments', 'action' => 'edit', $propertyComments->id]) ?>
                                        <?= $this->Form->postLink(__('Delete'), ['controller' => 'PropertyComments', 'action' => 'delete', $propertyComments->id], ['confirm' => __('Are you sure you want to delete # {0}?', $propertyComments->id)]) ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Users Profile') ?></h4>
                <?php if (!empty($user->users_profile)) : ?>
                    <div class="table-responsive">
                        <table>
                            <tr>
                                <th><?= __('Id') ?></th>
                                <th><?= __('User Id') ?></th>
                                <th><?= __('First Name') ?></th>
                                <th><?= __('Last Name') ?></th>
                                <th><?= __('Contact') ?></th>
                                <th><?= __('Address') ?></th>
                                <th><?= __('Profile Image') ?></th>
                                <th><?= __('Created Date') ?></th>
                                <th><?= __('Modified Date') ?></th>
                                <th class="actions"><?= __('Actions') ?></th>
                            </tr>
                            <?php foreach ($user->users_profile as $usersProfile) : ?>
                                <tr>
                                    <td><?= h($usersProfile->id) ?></td>
                                    <td><?= h($usersProfile->user_id) ?></td>
                                    <td><?= h($usersProfile->first_name) ?></td>
                                    <td><?= h($usersProfile->last_name) ?></td>
                                    <td><?= h($usersProfile->contact) ?></td>
                                    <td><?= h($usersProfile->address) ?></td>
                                    <td><?= h($usersProfile->profile_image) ?></td>
                                    <td><?= h($usersProfile->created_date) ?></td>
                                    <td><?= h($usersProfile->modified_date) ?></td>
                                    <td class="actions">
                                        <?= $this->Html->link(__('View'), ['controller' => 'UsersProfile', 'action' => 'view', $usersProfile->id]) ?>
                                        <?= $this->Html->link(__('Edit'), ['controller' => 'UsersProfile', 'action' => 'edit', $usersProfile->id]) ?>
                                        <?= $this->Form->postLink(__('Delete'), ['controller' => 'UsersProfile', 'action' => 'delete', $usersProfile->id], ['confirm' => __('Are you sure you want to delete # {0}?', $usersProfile->id)]) ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>