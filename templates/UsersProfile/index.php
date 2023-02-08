<style>
    .col {
        width: 11.5rem;
        float: right;
        text-align: center;
    }
</style>
<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\UsersProfile> $usersProfile
 */

use PhpParser\Node\Stmt\Label;

?>
<div class="usersProfile index content">

    <div class="col">
        <select name="category_id" id="test" class="form-control">
            <option value="" disabled selected>choose category</option>
            <option value="0">Active</option>
            <option value="1">Deactivate</option>
        </select>


    </div>
    <h3><?= __('Users list') ?></h3>
    <?= $this->element('flash/userlist'); ?>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>