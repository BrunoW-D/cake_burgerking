<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Order'), ['controller' => 'Orders', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="users view large-9 medium-8 columns content">
    <h3><?= h($user->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Username') ?></th>
            <td><?= h($user->username) ?></td>
        </tr>
        <tr>
            <th><?= __('Email') ?></th>
            <td><?= h($user->email) ?></td>
        </tr>
        <tr>
            <th><?= __('Password') ?></th>
            <td><?= h($user->password) ?></td>
        </tr>
        <tr>
            <th><?= __('Role') ?></th>
            <td><?= h($user->role) ?></td>
        </tr>
        <tr>
            <th><?= __('Nom') ?></th>
            <td><?= h($user->nom) ?></td>
        </tr>
        <tr>
            <th><?= __('Prenom') ?></th>
            <td><?= h($user->prenom) ?></td>
        </tr>
        <tr>
            <th><?= __('Telephone') ?></th>
            <td><?= h($user->telephone) ?></td>
        </tr>
        <tr>
            <th><?= __('Ville') ?></th>
            <td><?= h($user->ville) ?></td>
        </tr>
        <tr>
            <th><?= __('Cp') ?></th>
            <td><?= h($user->cp) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($user->id) ?></td>
        </tr>
        <tr>
            <th><?= __('DateInscription') ?></th>
            <td><?= h($user->dateInscription) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Adresse') ?></h4>
        <?= $this->Text->autoParagraph(h($user->adresse)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Orders') ?></h4>
        <?php if (!empty($user->orders)): ?>
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
            <?php foreach ($user->orders as $orders): ?>
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
</div>
