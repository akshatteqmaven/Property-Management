<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PropertyComment $propertyComment
 * @var \Cake\Collection\CollectionInterface|string[] $properties
 * @var \Cake\Collection\CollectionInterface|string[] $users
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Property Comments'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="propertyComments form content">
            <?= $this->Form->create($propertyComment) ?>
            <fieldset>
                <legend><?= __('Add Property Comment') ?></legend>
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
