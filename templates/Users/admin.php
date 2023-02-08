<?= $this->Html->Css('adminpage', ['Block' => 'Css']) ?>
<div class="row">
    <div class="col-md-6">
        <?= $this->Html->link(__('User Detailes'), ['controller' => 'users_profile', 'action' => 'index'], ['class' => 'button']) ?>
    </div>
    <div class="col-md-6">
        <?= $this->Html->link(__('property Detailes'), ['controller' => 'properties', 'action' => 'index'], ['class' => 'button']) ?>
    </div>
</div>
<br>
<div class="row">

    <div class="col-md-6">
        <?= $this->Html->link(__('Add property catagories'), ['controller' => 'property-categories', 'action' => 'add'], ['class' => 'button']) ?>
    </div>
    <div class="col-md-6">
        <?= $this->Html->link(__('Add new Property'), ['controller' => 'properties', 'action' => 'add'], ['class' => 'button ']) ?>
    </div>
</div>