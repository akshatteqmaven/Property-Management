<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Propertyproperty_category $propertyproperty_category
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="propertyCategories form content">
            <?= $this->Form->create($propertyproperty_category) ?>
            <fieldset>
                <legend><?= __('Add Property property_category') ?></legend>
                <?php
                echo $this->Form->control('property_category_name');

                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>