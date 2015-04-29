<div class="container">

    <div class="page-header">
        <h1><?php echo $this->category ?></h1>
    </div>

    <?php if ( !$this->products ) : ?>

        <p>No products found in this category.</p>

    <?php else : ?>

        <?php $num_products = count($this->products); ?>
        <?php $i = 0; ?>

        <?php foreach ( $this->products as $product ) : ?>

            <?php if ( $i % 4 == 0 ) : ?>
                <div class="row">
            <?php endif; ?>

            <div class="col-md-3 col-xs-6 text-center">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <a href="/product/<?php echo $product['slug'] ?>/">
                            <img src="/media/products/placeholder.jpg" alt="<?php echo $product['slug'] ?>" class="img-responsive">
                        </a>
                    </div>
                    <div class="panel-footer">
                        <p>
                            <a href="/product/<?php echo $product['slug'] ?>/">
                                <strong><?php echo $product['name'] ?></strong>
                            </a>
                        </p>
                        <p>
                            <em>$<?php echo $product['price'] ?></em>
                        </p>
                    </div>
                </div>
            </div>

            <?php if ( $i % 4 == 3 || $i == ($num_products - 1) ) : ?>
                </div>
            <?php endif; ?>

            <?php $i++; ?>

        <?php endforeach; ?>

    <?php endif; ?>

</div>