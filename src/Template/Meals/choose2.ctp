<?php echo $this->element('menu'); ?>
<div class="index large-9 medium-8 columns content">

    <?php foreach ($products as $product): ?>
    <div class="row">
        <h4><?= $product->nom ?></h4>
        <?= $this->Html->image($product->image, ['alt' => "photo ".$product->nom, 'fullBase' => true, "align" => "right"]); ?>
        <br/><br/>
        <i><?= $product->description ?></i>
        <br/><br/>
        <?= $this->Html->link('Choisir Boisson', ['action' => 'choose3', $plat, $accompagnement, $product->id]) ?>
    </div>
    <?php endforeach; ?>
</div>