<?php $product = $this->product; ?>

<div class="container">
    <div class="row">
        <div class="col-sm-6 col-xs-12">
            <div>
                <img src="/media/products/placeholder-1.jpg" class="img-responsive" id="js-pdp-media-main">
            </div>
            <div class="row">
                <?php for ( $i = 1; $i <= 4; $i++ ) : ?>
                    <div class="col-xs-3 n50-top-buffer-md">
                        <img src="/media/products/placeholder-<?php echo $i ?>.jpg" class="img-responsive" id="js-pdp-media-view">
                    </div>
                <?php endfor; ?>
            </div>
        </div>
        <div class="col-sm-6 col-xs-12">
            <div class="page-header">
                <h1><?php echo $product['name'] ?></h1>
            </div>
            <p><em>$<?php echo $product['price'] ?></em></p>
            <p>Estimate build time: <?php echo $product['build_time'] ?> days</p>
            <p><?php echo $product['description'] ?></p>
            <form action="/cart/add_item/" method="post">
                <input type="hidden" name="product_id" value="<?php echo $product['id'] ?>">
                <p>QTY <input type="number" name="quantity" value="1" max="10" min="1" required></p>
                <p><input type="submit" value="Add To Cart" class="btn btn-success"></p>
            </form>
        </div>
    </div>
    <div class="page-header">
        <h1>Related Products</h1>
    </div>
    <?php $this->loadBlock('product-collection', $product['related_products']); ?>
</div>