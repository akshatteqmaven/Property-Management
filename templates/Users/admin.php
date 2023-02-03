      <div>
          <?= $this->Html->link(__('User Detailes'), ['controller' => 'users_profile', 'action' => 'index'], ['class' => 'button']) ?>

          <?= $this->Html->link(__('property Detailes'), ['controller' => 'properties', 'action' => 'index'], ['class' => 'button']) ?>

          <?= $this->Html->link(__('Add property catagories'), ['controller' => 'property-categories', 'action' => 'add'], ['class' => 'button']) ?>
      </div>