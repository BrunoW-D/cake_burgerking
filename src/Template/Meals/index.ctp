<?php echo $this->element('menu'); ?>

    <?php foreach ($meals as $meal): ?>
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
        <?= $this->Html->link('Choisir menu', ['action' => 'choose1', $meal->id]) ?>
        <br/>
        <br/>
    </div>
    <?php endforeach; ?>
