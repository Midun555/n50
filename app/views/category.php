<div class="container">

    <div class="page-header">
        <h1><?php echo $this->category ?></h1>
    </div>

    <?php if ( !$this->products ) : ?>

        <p>No products found in this category.</p>

    <?php else : ?>

        <?php $this->loadBlock('product-collection', $this->products); ?>

    <?php endif; ?>

</div>