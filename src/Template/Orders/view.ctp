<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Order'), ['action' => 'edit', $order->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Order'), ['action' => 'delete', $order->id], ['confirm' => __('Are you sure you want to delete # {0}?', $order->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Orders'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Order'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Restaurants'), ['controller' => 'Restaurants', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Restaurant'), ['controller' => 'Restaurants', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Towns'), ['controller' => 'Towns', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Town'), ['controller' => 'Towns', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Meal Lines'), ['controller' => 'MealLines', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Meal Line'), ['controller' => 'MealLines', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Product Lines'), ['controller' => 'ProductLines', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product Line'), ['controller' => 'ProductLines', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="orders view large-9 medium-8 columns content">
    <h3><?= h($order->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Restaurant') ?></th>
            <td><?= $order->has('restaurant') ? $this->Html->link($order->restaurant->id, ['controller' => 'Restaurants', 'action' => 'view', $order->restaurant->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Town') ?></th>
            <td><?= $order->has('town') ? $this->Html->link($order->town->id, ['controller' => 'Towns', 'action' => 'view', $order->town->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('User') ?></th>
            <td><?= $order->has('user') ? $this->Html->link($order->user->id, ['controller' => 'Users', 'action' => 'view', $order->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Cp') ?></th>
            <td><?= h($order->cp) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($order->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Prix') ?></th>
            <td><?= $this->Number->format($order->prix) ?></td>
        </tr>
        <tr>
            <th><?= __('Date') ?></th>
            <td><?= h($order->date) ?></td>
        </tr>
        <tr>
            <th><?= __('Active') ?></th>
            <td><?= $order->active ? __('Yes') : __('No'); ?></td>
         </tr>
    </table>
    <div class="row">
        <h4><?= __('Adresse') ?></h4>
        <?= $this->Text->autoParagraph(h($order->adresse)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Meal Lines') ?></h4>
        <?php if (!empty($order->meal_lines)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Meal Id') ?></th>
                <th><?= __('Meal Type Id') ?></th>
                <th><?= __('Qte') ?></th>
                <th><?= __('Order Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($order->meal_lines as $mealLines): ?>
            <tr>
                <td><?= h($mealLines->id) ?></td>
                <td><?= h($mealLines->meal_id) ?></td>
                <td><?= h($mealLines->meal_type_id) ?></td>
                <td><?= h($mealLines->qte) ?></td>
                <td><?= h($mealLines->order_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'MealLines', 'action' => 'view', $mealLines->id]) ?>

                    <?= $this->Html->link(__('Edit'), ['controller' => 'MealLines', 'action' => 'edit', $mealLines->id]) ?>

                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'MealLines', 'action' => 'delete', $mealLines->id], ['confirm' => __('Are you sure you want to delete # {0}?', $mealLines->id)]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Product Lines') ?></h4>
        <?php if (!empty($order->product_lines)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Product Id') ?></th>
                <th><?= __('Qte') ?></th>
                <th><?= __('Order Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($order->product_lines as $productLines): ?>
            <tr>
                <td><?= h($productLines->id) ?></td>
                <td><?= h($productLines->product_id) ?></td>
                <td><?= h($productLines->qte) ?></td>
                <td><?= h($productLines->order_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'ProductLines', 'action' => 'view', $productLines->id]) ?>

                    <?= $this->Html->link(__('Edit'), ['controller' => 'ProductLines', 'action' => 'edit', $productLines->id]) ?>

                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ProductLines', 'action' => 'delete', $productLines->id], ['confirm' => __('Are you sure you want to delete # {0}?', $productLines->id)]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
</div>
