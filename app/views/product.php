<?php $product = $this->product; ?>

<div class="container">
    <div class="row">
        <div class="col-sm-6 col-xs-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <img src="/media/products/placeholder.jpg" class="img-responsive">
                </div>
                <div class="panel-footer">
                    <div class="row">
                        <?php for ( $i = 0; $i < 4; $i++ ) : ?>
                            <div class="col-xs-3">
                                <img src="/media/products/placeholder.jpg" class="img-responsive">
                            </div>
                        <?php endfor; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xs-12">
            <div class="page-header">
                <h1><?php echo $product['name'] ?></h1>
            </div>
            <p><em>$<?php echo $product['price'] ?></em></p>
            <p>Build time: <?php echo $product['build_time'] ?> days</p>
            <p><?php echo $product['description'] ?></p>
            <form action="/cart/add_item/" method="post">
                <input type="hidden" name="product_id" value="<?php echo $product['id'] ?>">
                <p><input type="number" name="quantity" value="1" max="10" min="1" required></p>
                <p><input type="submit" value="Add To Cart" class="btn btn-success"></p>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="page-header">
            <h1>Related Products</h1>
        </div>
        <?php foreach ( $product['related_products'] as $product ) : ?>
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
        <?php endforeach; ?>
    </div>
</div>