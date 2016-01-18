<?php //echo $this->element('menu'); ?>

<div>
    <h4><?php echo "Menu ".$meal->nom ?></h4>
    <br/>
    <?= $meal->description ?>
    <br/>

    <form method="post" >
    <input type="hidden" name="cmd" value="_cart">
    <input type="hidden" name="business" value="bwangdomingo-facilitator@gmail.com">
    <input type="hidden" name="lc" value="FR">
    <input type="hidden" name="item_name" value='<?php echo "Menu ".$meal->nom; ?>' >
    <input type="hidden" name="item_number" value='<?php echo "_".$mealsProducts; ?>' >


    <input type="hidden" name="currency_code" value="EUR">
    <input type="hidden" name="add" value="1">

    <table>
    <tr><td><input type="hidden" name="on0" value="Taille">Taille</td></tr><tr><td><select name="os0">
        <option value="Normale">Normale €<?= $prix[$meal->id][0]; ?> EUR</option>
        <option value="King Size">King Size €<?= $prix[$meal->id][1]; ?> EUR</option>
    </select> </td></tr>
    </table>
    <input type="hidden" name="currency_code" value="EUR">
    <input type="hidden" name="option_select0" value="Normale">
    <input type="hidden" name="option_amount0" value=<?= $prix[$meal->id][0]; ?> >
    <input type="hidden" name="option_select1" value="King Size">
    <input type="hidden" name="option_amount1" value=<?= $prix[$meal->id][1]; ?> >
    <input type="hidden" name="option_index" value="0">
    <input type="image" src="https://www.paypalobjects.com/fr_FR/FR/i/btn/btn_cart_SM.gif" border="0" name="submit" alt="PayPal, le réflexe sécurité pour payer en ligne">
    <img alt="" border="0" src="https://www.paypalobjects.com/fr_XC/i/scr/pixel.gif" width="1" height="1">
    </form>
    
</div>

<script src="//cdnjs.cloudflare.com/ajax/libs/minicart/3.0.6/minicart.min.js"></script>