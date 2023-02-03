<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Property $property
 * @var \Cake\Collection\CollectionInterface|string[] $users
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Go back'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="properties form content">
            <?= $this->Form->create($property, ['enctype' => 'multipart/form-data']) ?>
            <fieldset>
                <legend><?= __('Add Property') ?></legend>
                <?php
                // echo $this->Form->control('user_id', ['options' => $users]);
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
                echo $this->Form->control('property_image', ['type' => 'file', 'required' => false]);
                echo $this->Form->control('property_tags');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>