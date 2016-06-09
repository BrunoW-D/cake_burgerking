<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Editer'), ['action' => 'edit', $user->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Supprimer mon compte'), ['action' => 'delete', $user->id], ['confirm' => __('Etes-vous sûr de vouloir supprimer votre compte ?')]) ?> </li>
    </ul>
</nav>
<div class="users view large-9 medium-8 columns content">

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
            <th><?= __('DateInscription') ?></th>
            <td><?= h($user->dateInscription) ?></td>
        </tr>
        <tr>
            <th><?= __('Adresse') ?></th>
            <td><?= $this->Text->autoParagraph(h($user->adresse)); ?></td>
        </tr>
    </div>

    </table>
        <div class="related">
        <h4><?= __('Commandes passées') ?></h4>
        <?php if (!empty($user->orders)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Restaurant Id') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Ville') ?></th>
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
                <td><?= h($orders->user_id) ?></td>
                <td><?= h($orders->ville) ?></td>
                <td><?= h($orders->cp) ?></td>
                <td><?= h($orders->adresse) ?></td>
                <td><?= h($orders->prix) ?></td>
                <td><?= h($orders->date) ?></td>
                <td><?= h($orders->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Orders', 'action' => 'view', $orders->id]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
</div>
