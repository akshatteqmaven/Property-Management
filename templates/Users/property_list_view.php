<style>
    .sample {
        display: none;
    }
</style>
<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Property $property
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <?= $this->Html->link(__('Go back'), ['action' => 'propertyListing'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="properties view content">
            <h3><?= h($property->property_title) ?></h3>
            <table>

                <tr>
                    <th><?= __('Property Title') ?></th>
                    <td><?= h($property->property_title) ?></td>
                </tr>
                <tr>
                    <th><?= __('Property Description') ?></th>
                    <td><?= h($property->property_description) ?></td>
                </tr>
                <tr>
                    <th><?= __('Property Image') ?></th>
                    <td><?= $this->Html->image(h($property->property_image), array('width' => '320px')) ?></td>
                </tr>
                <tr>
                    <th><?= __('Property property_category') ?></th>
                    <td><?= h($property->property_category) ?></td>
                </tr>
                <!-- <tr>
                    <th><?= __('Property Tags') ?></th>
                    <td><?= h($property->property_tags) ?></td>
                </tr> -->
                <tr>
                    <th><?= __('Posted Date') ?></th>
                    <td><?= h($property->created_date) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Comments') ?></h4>
                <?php if (!empty($property->property_comments)) : ?>
                    <div class="table-responsive">
                        <table>
                            <tr>
                                <th><?= __('Id') ?></th>
                                <th><?= __('Comments') ?></th>
                                <th><?= __('Posted date') ?></th>
                            </tr>
                            <?php
                            $i = 1;
                            foreach ($property->property_comments as $propertyComments) : ?>
                                <tr>
                                    <td><?= $i++ ?></td>
                                    <td><?= h($propertyComments->comments) ?></td>
                                    <td><?= h($propertyComments->created_date) ?></td>

                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                <?php endif; ?>
            </div>
            <?= $this->Form->create($propertyComments) ?>
            <fieldset>
                <legend><?= __('Add  Comments') ?></legend>
                <?php
                echo $this->Form->control('comments');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
</div>