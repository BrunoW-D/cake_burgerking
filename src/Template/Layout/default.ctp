<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'BurgerKing Livraison';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>
    <?= $this->Html->css('perso.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <nav class="top-bar expanded" data-topbar role="navigation">
        <section class="top-bar-section">
            <ul class="left">
                <li><?= $this->Html->link("Restaurants", ['controller' => 'Restaurants', 'action' => 'map']) ?></li>
                <li><?= $this->Html->link("Menus", ['controller' => 'Meals', 'action' => 'index']) ?></li>

            </ul>
            <ul class="right">
                <li><button id ="panier">Mon panier</button></li>                
                <?php
                if (!is_null($this->request->session()->read('Auth.User.id'))){
                ?>
                    <li><?= $this->Html->link('Se déconnecter', ['controller' => 'Users', 'action' => 'logout']) ?></li>
                <?php
                } else { 
                ?>
                    <li><?= $this->Html->link("S'inscrire", ['controller' => 'Users', 'action' => 'add']) ?></li>
                    <li><?= $this->Html->link('Se connecter', ['controller' => 'Users', 'action' => 'login']) ?></li>
                <?php }
                ?>
            </ul>
        </section>
    </nav>
    <?= $this->Flash->render() ?>
    <section class="container clearfix">
        <?= $this->fetch('content') ?>
    </section>
    <footer>
    </footer>
    <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/minicart/3.0.6/minicart.min.js"></script>
    <script>
        paypal.minicart.render({
        action: "https://www.sandbox.paypal.com/cgi-bin/webscr",
        strings: {
            button: "Commander",
            buttonAlt: "Total:",
            discount: "Reduction:",
            subtotal: "Sous-Total:" 
        }
        });
        $( "#panier" ).click(function() {
            paypal.minicart.view.show()
        });
    </script>
</body>
</html>
