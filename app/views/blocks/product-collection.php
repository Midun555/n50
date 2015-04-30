<?php $products = $this->block_data; ?>

<?php $num_products = count($products); ?>
<?php $i = 0; ?>

<?php foreach ( $products as $product ) : ?>

    <?php if ( $i % 4 == 0 ) : ?>
        <div class="row">
    <?php endif; ?>

    <div class="col-md-3 col-xs-6 text-center">
        <div>
            <a href="/product/<?php echo $product['slug'] ?>/">
                <img src="/media/products/placeholder.jpg" alt="<?php echo $product['slug'] ?>" class="img-responsive">
            </a>
        </div>
        <div class="n50-product-block-lower">
            <h2 class="n50-fs-md">
                <a href="/product/<?php echo $product['slug'] ?>/">
                    <strong><?php echo $product['name'] ?></strong>
                </a>
            </h2>
            <div class="n50-fs-sm">
                <em>$<?php echo $product['price'] ?></em>
            </div>
        </div>
    </div>

    <?php if ( $i % 4 == 3 || $i == ($num_products - 1) ) : ?>
        </div>
    <?php endif; ?>

    <?php $i++; ?>

<?php endforeach; ?>