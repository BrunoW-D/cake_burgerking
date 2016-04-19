<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $user->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('Profil'), ['action' => 'info', $user->id]) ?></li>
    </ul>
</nav>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Editer compte') ?></legend>
        <?php
            echo $this->Form->input('username');
            echo $this->Form->input('email');
            echo $this->Form->label('User.password', 'Mot de passe');
            echo $this->Form->input('password');
            echo $this->Form->hidden('role', ['value' => $user->role]);
            echo $this->Form->input('nom');
            echo $this->Form->input('prenom');
            echo $this->Form->input('telephone');
            echo $this->Form->input('ville');
            echo $this->Form->input('cp');
            echo $this->Form->input('adresse');
            echo $this->Form->hidden('dateInscription', ['value' => $user->dateInscription]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Envoyer')) ?>
    <?= $this->Form->end() ?>
</div>
