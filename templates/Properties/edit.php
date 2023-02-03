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
                <div class="row">
                    <div class="col-md-4">
                        <?= $this->Form->control('property_image', ['type' => 'file', 'required' => false]); ?>
                    </div>
                    <div class="col-md-6">
                        <?= $this->Html->image(h($property->property_image), array('width' => '1000px')); ?>
                    </div>
                </div>
                <?= $this->Form->control('property_title'); ?>
                <?= $this->Form->control('property_description'); ?>
                <div class="row">
                    <div class="col">
                        <?= $this->Form->control('property_category', [
                            'options' => [
                                'Residential' => 'Residential',
                                'Industrial' => 'Industrial',
                                'Commercial' => 'Commercial',
                                'Institutional' => 'Institutional',
                                'Other' => 'Other'
                            ]
                        ]); ?>
                    </div>
                    <div class="col">
                        <?= $this->Form->control('property_tags'); ?>
                    </div>
                </div>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
<!-- <label for="property_category">Categories</label>
<select name="property_category ">
    <?php foreach ($propertyCategories as $property) : ?>
        <option value=<?= h($property->category_name) ?>><?= h($property->category_name) ?></option>
    <?php endforeach; ?>

</select> -->