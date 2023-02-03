<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PropertyComment $propertyComment
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Go back'), ['action' => 'view', $propertyComment->id], ['class' => 'side-nav-item']) ?>

        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="propertyComments view content">
            <table>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= h($usersProfile->first_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Comments') ?></th>
                    <td><?= h($propertyComment->comments) ?></td>
                </tr>

                <tr>
                    <th><?= __('Posted Date') ?></th>
                    <td><?= h($propertyComment->created_date) ?></td>
                </tr>

            </table>
        </div>
    </div>
</div>