<br>
<div class="index large-4 medium-4 large-offset-4 medium-offset-4 columns">
    <div class="panel">
        <h2 class="text-center">Registration Form</h2>
        <?= $this->Form->create($user, ['enctype' => 'multipart/form-data']); ?>
        <?= $this->Form->control('users_profile.first_name', ['required' => false]); ?>
        <?= $this->Form->control('users_profile.last_name', ['required' => false]); ?>
        <?= $this->Form->control('users_profile.contact', ['required' => false]); ?>
        <?= $this->Form->control('users_profile.address', ['required' => false]); ?>
        <?= $this->Form->control('email', ['required' => false]); ?>
        <?= $this->Form->control('password', array('type' => 'password', 'required' => false)); ?>
        <?= $this->Form->control('confirm_password', array('type' => 'password', 'required' => false)); ?>
        <?= $this->Form->control('users_profile.profile_image', ['type' => 'file']); ?>
        <?= $this->Form->button('Register'); ?>
        <?= $this->Form->end(); ?>

    </div>
</div>