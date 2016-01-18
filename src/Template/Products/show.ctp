

    <?php //echo $this->element('menu'); ?>

    <?php foreach ($products as $product): ?>
    <div>
        <h4><?= $product->nom ?></h4>
        <br/>
        <?= $product->description ?>
        <br/>
        Prix : <?= $product->prix ?> credits
        <br/>
        <?= $this->Html->image($product->image, ['alt' => "photo ".$product->nom, 'fullBase' => true]); ?>
        <br/>
        
        <?php
            /*echo $this->Form->create($form, ['action' => 'show']);
            echo $this->Form->hidden('id', ['value' => $product->id]);
            echo $this->Form->input('qte');
            echo $this->Form->button('Ajouter au panier', ['type' => 'submit']);
            echo $this->Form->end();*/
        ?>

        <form method="post" >
        <input type="hidden" name="cmd" value="_cart">
        <input type="hidden" name="business" value="bwangdomingo-facilitator@gmail.com">
        <input type="hidden" name="lc" value="FR">
        <input type="hidden" name="item_name" value='<?php echo $product->nom; ?>' >
        <input type="hidden" name="item_number" value=<?= $product->id; ?> >
        <input type="hidden" name="amount" value=<?= $product->prix; ?> >
        <input type="hidden" name="currency_code" value="EUR">


        <input type="hidden" name="add" value="1">

        <input type="image" src="https://www.paypalobjects.com/fr_FR/FR/i/btn/btn_cart_LG.gif" border="0" name="submit" alt="PayPal, le réflexe sécurité pour payer en ligne">
        <img alt="" border="0" src="https://www.paypalobjects.com/fr_XC/i/scr/pixel.gif" width="1" height="1">
        </form>
        
        <br/>
        <br/>
    </div>
    <?php endforeach; ?>

    <script src="//cdnjs.cloudflare.com/ajax/libs/minicart/3.0.6/minicart.min.js"></script>
    