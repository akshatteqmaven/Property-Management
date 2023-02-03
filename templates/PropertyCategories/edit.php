<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Propertyproperty_category $propertyproperty_category
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $propertyproperty_category->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $propertyproperty_category->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Property Categories'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="propertyCategories form content">
            <?= $this->Form->create($propertyproperty_category) ?>
            <fieldset>
                <legend><?= __('Edit Property property_category') ?></legend>
                <?php
                echo $this->Form->control('property_category_name');
                echo $this->Form->control('status');
                echo $this->Form->control('created_date');
                echo $this->Form->control('modified_date', ['empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>