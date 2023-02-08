<div class="search-form">
</div>
<div class="table-responsive">
    <table>
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('first_name') ?></th>
                <th><?= $this->Paginator->sort('last_name') ?></th>
                <th><?= $this->Paginator->sort('email') ?></th>
                <th><?= $this->Paginator->sort('contact') ?></th>
                <th><?= $this->Paginator->sort('address') ?></th>
                <th><?= $this->Paginator->sort('profile_image') ?></th>
                <th><?= $this->Paginator->sort('status') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 1;
            foreach ($usersProfile as $userProfile) :
                if ($userProfile->id == $uid) {
                    continue;
                }
            ?>
                <tr>
                    <td><?= $i++ ?></td>
                    <td><?= h($userProfile->first_name) ?></td>
                    <td><?= h($userProfile->last_name) ?></td>
                    <td><?= h($userProfile->user->email) ?></td>
                    <td><?= h($userProfile->contact) ?></td>
                    <td><?= h($userProfile->address) ?></td>
                    <td><?= $this->Html->image(h($userProfile->profile_image), (array('width' => '50px'))) ?></td>
                    <td>
                        <?php if ($userProfile->user->status == 1) : ?>
                            <?= $this->Form->postLink(__('Deactivate'), ['action' => 'userStatus', $userProfile->id, $userProfile->user->status], ['confirm' => __('Are you sure you want to  change the status of:   {0}?', $userProfile->first_name)]) ?>
                        <?php else : ?>
                            <?= $this->Form->postLink(__('Activate'), ['action' => 'userStatus', $userProfile->id, $userProfile->user->status], ['confirm' => __('Are you sure you want to  change the status of: {0}?', $userProfile->first_name)]) ?>
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