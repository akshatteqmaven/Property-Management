<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PropertyComment $propertyComment
 * @var string[]|\Cake\Collection\CollectionInterface $properties
 * @var string[]|\Cake\Collection\CollectionInterface $users
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $propertyComment->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $propertyComment->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Property Comments'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="propertyComments form content">
            <?= $this->Form->create($propertyComment) ?>
            <fieldset>
                <legend><?= __('Edit Property Comment') ?></legend>
                <?php
                    echo $this->Form->control('property_id', ['options' => $properties]);
                    echo $this->Form->control('user_id', ['options' => $users]);
                    echo $this->Form->control('comments');
                    echo $this->Form->control('created_date');
                    echo $this->Form->control('modified_date', ['empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
