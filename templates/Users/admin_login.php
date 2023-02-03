<?= $this->Html->css(['color']); ?>
<div class="panel_main" style="background-color: lightsteelblue;">
    <h2 class="text-center">login</h2>
    <?= $this->Form->create(); ?>
    <?= $this->Form->control('email'); ?>
    <?= $this->Form->control('password', array('type' => 'password')); ?>
    <?= $this->Form->button('Login', array('class' => 'button')); ?>
    <?= $this->Form->end(); ?>
    <?= $this->Html->link(__('Forgot Password'), ['action' => 'forgot'], ['class' => 'button']) ?>
</div>