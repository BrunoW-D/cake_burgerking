<?php echo $this->element('menu'); ?>
<div class="index large-9 medium-8 columns content">

    <?php foreach ($meals as $meal): ?>
    <div class="row">
        <h4><?= $meal->nom ?></h4>
        <?= $this->Html->image($meal->image, ['alt' => "photo ".$meal->nom, 'fullBase' => true, 'align' => 'right']); ?>
        <i><?= $meal->description ?></i>
        <br/><br/>
        <ul>Prix :
        <li>normale : <?= $prix[$meal->id][0]; ?> €</li>
        <li>king size : <?= $prix[$meal->id][1]; ?> €</li>
        </ul>
        <?= $this->Html->link('Choisir menu', ['action' => 'choose1', $meal->id]) ?>
    </div>
    <?php endforeach; ?>
</div>
