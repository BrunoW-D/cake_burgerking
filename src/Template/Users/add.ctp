<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Inscription') ?></legend>
        <?php
            echo $this->Form->input('username', ['label' => 'Nom d\'utilisateur']);
            echo $this->Form->input('email');
            echo $this->Form->input('password', ['label' => 'Mot de passe']);
            echo $this->Form->hidden('role', ['value' => 'client']);
            echo $this->Form->input('nom');
            echo $this->Form->input('prenom');
            echo $this->Form->input('telephone', ['label' => 'Téléphone']);
            echo $this->Form->input('ville');
            echo $this->Form->input('cp', ['label' => 'Code Postal']);
            echo $this->Form->input('adresse');
            // echo $this->Form->input('dateInscription');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Envoyer')) ?>
    <?= $this->Form->end() ?>
</div>
