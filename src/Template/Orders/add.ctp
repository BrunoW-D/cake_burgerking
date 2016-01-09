<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Orders'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Restaurants'), ['controller' => 'Restaurants', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Restaurant'), ['controller' => 'Restaurants', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Towns'), ['controller' => 'Towns', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Town'), ['controller' => 'Towns', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Meal Lines'), ['controller' => 'MealLines', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Meal Line'), ['controller' => 'MealLines', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Product Lines'), ['controller' => 'ProductLines', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product Line'), ['controller' => 'ProductLines', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="orders form large-9 medium-8 columns content">
    <?= $this->Form->create($order) ?>
    <fieldset>
        <legend><?= __('Add Order') ?></legend>
        <?php
            echo $this->Form->input('restaurant_id', ['options' => $restaurants]);
            echo $this->Form->input('town_id', ['options' => $towns]);
            echo $this->Form->input('user_id', ['options' => $users]);
            echo $this->Form->input('cp');
            echo $this->Form->input('adresse');
            echo $this->Form->input('prix');
            echo $this->Form->input('date');
            echo $this->Form->input('active');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
