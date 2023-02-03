<style>
    .sample {
        display: none;
    }
</style>
<?php


/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\User> $users
 */
?>
<div class="users index content">
    <?= $this->Html->link(__('New User'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Properties') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('property_title') ?></th>
                    <th><?= $this->Paginator->sort('property_description') ?></th>
                    <th><?= $this->Paginator->sort('property_image') ?></th>
                    <th><?= $this->Paginator->sort('property_category') ?></th>
                    <th><?= $this->Paginator->sort('property_tags') ?></th>
                    <th><?= $this->Paginator->sort('Posted date') ?></th>


                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user) : ?>
                    <tr>
                        <td><?= $this->Number->format($user->id) ?></td>
                        <td><?= h($user->$Properties->property_title) ?></td>
                        <td><?= h($user->users_profile->last_name) ?></td>
                        <td><?= h($user->users_profile->contact) ?></td>
                        <td><?= h($user->users_profile->address) ?></td>
                        <td><?= $this->Html->image(h($user->users_profile->profile_image), (array('width' => '50px'))) ?></td>
                        <td><?= h($user->email) ?></td>

                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['action' => 'propertyListView', $user->id]) ?>
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


$properties->property_description
$properties->property_category
$properties->property_tags