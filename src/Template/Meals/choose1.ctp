<?php //echo $this->element('menu'); ?>

    <?php foreach ($products as $product): ?>
    <div>
        <h4><?= $product->nom ?></h4>
        <br/>
        <?= $product->description ?>
        <br/>
        <?= $this->Html->image($product->image, ['alt' => "photo ".$product->nom, 'fullBase' => true]); ?>
        
        <br/>
        <?= $this->Html->link('Choisir accompagnement', ['action' => 'choose2', $plat, $product->id]) ?>
        <br/>
        <br/>
    </div>
    <?php endforeach; ?>
