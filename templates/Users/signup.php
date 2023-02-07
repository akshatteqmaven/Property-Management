<br>
<?= $this->Html->css(['color']); ?>


<div class="panel_reg">
    <h2 class="text-center">Registration Form</h2>
    <?= $this->Form->create($user, ['enctype' => 'multipart/form-data', 'id' => 'form']); ?>
    <div class="row">
        <div class="col">
            <?= $this->Form->control('users_profile.first_name', ['required' => false]); ?>

        </div>
        <div class="col">
            <?= $this->Form->control('users_profile.last_name', ['required' => false]); ?>

        </div>
    </div>
    <div class="row">
        <div class="col">
            <?= $this->Form->control('email', ['required' => false]); ?>

        </div>
        <div class="col">
            <?= $this->Form->control('users_profile.contact', ['required' => false]); ?>

        </div>
    </div>
    <div class="row">
        <div class="col">
            <?= $this->Form->control('users_profile.address', ['required' => false]); ?>

        </div>
        <div class="col">
            <?= $this->Form->control('users_profile.profile_image', ['type' => 'file']); ?>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <?= $this->Form->control('password', array('type' => 'password', 'required' => false)); ?>

        </div>
        <div class="col">
            <?= $this->Form->control('confirm_password', array('type' => 'password', 'required' => false)); ?>

        </div>
    </div>
    <?= $this->Form->button('Register', ['class' => 'test']); ?>
    <?= $this->Form->end(); ?>

</div>
</div>
<style>

</style>