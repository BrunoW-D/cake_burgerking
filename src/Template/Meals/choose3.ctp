<?php echo $this->element('menu'); ?>

<div>
    <h4><?= $meal->nom ?></h4>
    <br/>
    <?= $meal->description ?>
    <br/>
    Prix :<br/>
    &nbsp; &nbsp; normale : <?= $prix[$meal->id][0]; ?> credits
    <br/>
    &nbsp; &nbsp; king size : <?= $prix[$meal->id][1]; ?> credits
    <br/>
    <!-- <?= $this->Html->image($product->image, ['alt' => "photo ".$product->nom, 'fullBase' => true]); ?> -->
    <img src=<?= $meal->image ?> />
    <br/>
    <br/>
    <?php
        echo $this->Form->create($form, ['action' => 'index']);
        echo $this->Form->hidden('id', ['value' => $mealsProducts]);
        echo $this->Form->select(
            'type',
            ['normale', 'king size'],
            ['empty' => '(choisissez la taille du menu)']
        );
        echo $this->Form->input('qte', ['label' => 'Quantité']);
        echo $this->Form->button('Ajouter au panier', ['type' => 'submit']);
        echo $this->Form->end();
    ?>
</div>