

    <?php echo $this->element('menu'); ?>

    <?php foreach ($products as $product): ?>
    <div>
        <h4><?= $product->nom ?></h4>
        <br/>
        <?= $product->description ?>
        <br/>
        Prix : <?= $product->prix ?> credits
        <br/>
        <!-- <?= $this->Html->image($product->image, ['alt' => "photo ".$product->nom, 'fullBase' => true]); ?> -->
        <img src=<?= $product->image ?> />
        <br/>
        
        <?php
            echo $this->Form->create($form, ['action' => 'show']);
            echo $this->Form->hidden('id', ['value' => $product->id]);
            echo $this->Form->input('qte');
            echo $this->Form->button('Ajouter au panier', ['type' => 'submit']);
            echo $this->Form->end();
        ?>
        
        <br/>
        <br/>
    </div>
    <?php endforeach; ?>