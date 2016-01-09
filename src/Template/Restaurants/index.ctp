<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Restaurant'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Towns'), ['controller' => 'Towns', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Town'), ['controller' => 'Towns', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Order'), ['controller' => 'Orders', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Stocks'), ['controller' => 'Stocks', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Stock'), ['controller' => 'Stocks', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="restaurants index large-9 medium-8 columns content">
    <h3><?= __('Restaurants') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('town_id') ?></th>
                <th><?= $this->Paginator->sort('adresse') ?></th>
                <th><?= $this->Paginator->sort('cp') ?></th>
                <th><?= $this->Paginator->sort('latitude') ?></th>
                <th><?= $this->Paginator->sort('longitude') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($restaurants as $restaurant): ?>
            <tr>
                <td><?= $this->Number->format($restaurant->id) ?></td>
                <td><?= $restaurant->has('town') ? $this->Html->link($restaurant->town->id, ['controller' => 'Towns', 'action' => 'view', $restaurant->town->id]) : '' ?></td>
                <td><?= h($restaurant->adresse) ?></td>
                <td><?= h($restaurant->cp) ?></td>
                <td><?= $this->Number->format($restaurant->latitude) ?></td>
                <td><?= $this->Number->format($restaurant->longitude) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $restaurant->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $restaurant->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $restaurant->id], ['confirm' => __('Are you sure you want to delete # {0}?', $restaurant->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
