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
                <div class="row">
                    <div class="col">
                        <?= $this->Form->control('property_title'); ?>
                    </div>
                    <div class="col">
                        <?= $this->Form->control('property_description'); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="property_categorie_id">Property Categorie</label>
                        <select name="property_categorie_id" id="property_categorie_id">
                            <option value="">choose one</option>
                            <?php foreach ($propertycategory as $category) : ?>
                                <?php if ($property->property_categorie_id == $category->id) { ?>
                                    <option value="<?= h($category->id) ?>" selected><?= h($category->category_name) ?></option>
                                <?php } else { ?>
                                    <option value="<?= h($category->id) ?>"><?= h($category->category_name) ?></option>
                                <?php } ?>
                            <?php endforeach; ?>
                        </select>
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