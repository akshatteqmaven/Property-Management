<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Property $property
 * @var string[]|\Cake\Collection\CollectionInterface $users
 */
?>
<div class="row">
    <aside class="row">
        <div class="side-nav">
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $property->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $property->property_title), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('Go Back'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="properties form content">
            <?= $this->Form->create($property, ['enctype' => 'multipart/form-data']) ?>
            <fieldset>
                <legend><?= __('Edit Property') ?></legend>
                <?php
                // echo $this->Form->control('user_id', ['options' => $users]);
                echo $this->Form->control('property_image', ['type' => 'file', 'required' => false]);
                echo $this->Form->control('property_title');
                echo $this->Form->control('property_description');
                echo $this->Form->control('property_category', [
                    'options' => [
                        'Residential' => 'Residential',
                        'Industrial' => 'Industrial',
                        'Commercial' => 'Commercial',
                        'Institutional' => 'Institutional',
                        'Other' => 'Other'
                    ]
                ]);

                echo $this->Form->control('property_tags');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>