<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Restaurant'), ['action' => 'edit', $restaurant->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Restaurant'), ['action' => 'delete', $restaurant->id], ['confirm' => __('Are you sure you want to delete # {0}?', $restaurant->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Restaurants'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Restaurant'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Towns'), ['controller' => 'Towns', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Town'), ['controller' => 'Towns', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Order'), ['controller' => 'Orders', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Stocks'), ['controller' => 'Stocks', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Stock'), ['controller' => 'Stocks', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="restaurants view large-9 medium-8 columns content">
    <h3><?= h($restaurant->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Town') ?></th>
            <td><?= $restaurant->has('town') ? $this->Html->link($restaurant->town->id, ['controller' => 'Towns', 'action' => 'view', $restaurant->town->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Adresse') ?></th>
            <td><?= h($restaurant->adresse) ?></td>
        </tr>
        <tr>
            <th><?= __('Cp') ?></th>
            <td><?= h($restaurant->cp) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($restaurant->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Latitude') ?></th>
            <td><?= $this->Number->format($restaurant->latitude) ?></td>
        </tr>
        <tr>
            <th><?= __('Longitude') ?></th>
            <td><?= $this->Number->format($restaurant->longitude) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Orders') ?></h4>
        <?php if (!empty($restaurant->orders)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Restaurant Id') ?></th>
                <th><?= __('Town Id') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Cp') ?></th>
                <th><?= __('Adresse') ?></th>
                <th><?= __('Prix') ?></th>
                <th><?= __('Date') ?></th>
                <th><?= __('Active') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($restaurant->orders as $orders): ?>
            <tr>
                <td><?= h($orders->id) ?></td>
                <td><?= h($orders->restaurant_id) ?></td>
                <td><?= h($orders->town_id) ?></td>
                <td><?= h($orders->user_id) ?></td>
                <td><?= h($orders->cp) ?></td>
                <td><?= h($orders->adresse) ?></td>
                <td><?= h($orders->prix) ?></td>
                <td><?= h($orders->date) ?></td>
                <td><?= h($orders->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Orders', 'action' => 'view', $orders->id]) ?>

                    <?= $this->Html->link(__('Edit'), ['controller' => 'Orders', 'action' => 'edit', $orders->id]) ?>

                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Orders', 'action' => 'delete', $orders->id], ['confirm' => __('Are you sure you want to delete # {0}?', $orders->id)]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Stocks') ?></h4>
        <?php if (!empty($restaurant->stocks)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Product Id') ?></th>
                <th><?= __('Restaurant Id') ?></th>
                <th><?= __('Qte') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($restaurant->stocks as $stocks): ?>
            <tr>
                <td><?= h($stocks->id) ?></td>
                <td><?= h($stocks->product_id) ?></td>
                <td><?= h($stocks->restaurant_id) ?></td>
                <td><?= h($stocks->qte) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Stocks', 'action' => 'view', $stocks->id]) ?>

                    <?= $this->Html->link(__('Edit'), ['controller' => 'Stocks', 'action' => 'edit', $stocks->id]) ?>

                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Stocks', 'action' => 'delete', $stocks->id], ['confirm' => __('Are you sure you want to delete # {0}?', $stocks->id)]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
</div>
