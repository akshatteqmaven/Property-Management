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
            <?= $this->Html->link(__('Edit Property property_category'), ['action' => 'edit', $propertyproperty_category->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Property property_category'), ['action' => 'delete', $propertyproperty_category->id], ['confirm' => __('Are you sure you want to delete # {0}?', $propertyproperty_category->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Property Categories'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Property property_category'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="propertyCategories view content">
            <h3><?= h($propertyproperty_category->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('property_category Name') ?></th>
                    <td><?= h($propertyproperty_category->property_category_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= h($propertyproperty_category->status) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($propertyproperty_category->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created Date') ?></th>
                    <td><?= h($propertyproperty_category->created_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified Date') ?></th>
                    <td><?= h($propertyproperty_category->modified_date) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>