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
            <?= $this->Html->link(__('Go back'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="properties form content">
            <?= $this->Form->create($property, ['enctype' => 'multipart/form-data']) ?>
            <fieldset>
                <legend><?= __('Add Property') ?></legend>
                <?= $this->Form->control('property_image', ['type' => 'file', 'required' => false]); ?>
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
                                <option value="<?= h($category->id) ?>"><?= h($category->category_name) ?></option>
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