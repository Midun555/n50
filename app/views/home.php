<div class="container">

    <div>
        <img src="/media/cms/home-hero-placeholder.jpg" class="img-responsive">
    </div>

    <div class="page-header">
        <h1>Featured Products</h1>
    </div>
    <?php $this->loadBlock('product-collection', $this->featured_products); ?>

    <div class="page-header">
        <h1>Instagram<small> @n50</small></h1>
    </div>
    <div class="row">
        <?php for ( $i = 0; $i < 12; $i++ ) : ?>
            <div class="col-sm-2 col-xs-6 n50-bottom-buffer-sm">
                <a href="#">
                    <img src="/media/products/placeholder.jpg" class="img-responsive">
                </a>
            </div>
        <?php endfor; ?>
    </div>

</div>