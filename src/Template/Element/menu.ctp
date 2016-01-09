<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Catégories') ?></li>
        <li><?= $this->Html->link(__('Menus'), ['controller' => 'Meals', 'action' => 'index']) ?></li>
        <?php foreach($categories as $category): ?>
            <li><?= $this->Html->link(__($category->nom), ['controller' => 'Products', 'action' => 'show', $category->id ]) ?></li>
        <?php endforeach; ?>
    </ul>
</nav>