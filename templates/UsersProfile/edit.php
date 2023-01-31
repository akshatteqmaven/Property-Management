<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UsersProfile $usersProfile
 * @var string[]|\Cake\Collection\CollectionInterface $users
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $usersProfile->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $usersProfile->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Users Profile'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="usersProfile form content">
            <?= $this->Form->create($usersProfile) ?>
            <fieldset>
                <legend><?= __('Edit Users Profile') ?></legend>
                <?php
                    echo $this->Form->control('user_id', ['options' => $users]);
                    echo $this->Form->control('first_name');
                    echo $this->Form->control('last_name');
                    echo $this->Form->control('contact');
                    echo $this->Form->control('address');
                    echo $this->Form->control('profile_image');
                    echo $this->Form->control('created_date');
                    echo $this->Form->control('modified_date', ['empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
