<div class="container">

    <div class="page-header">
        <h1>Cart</h1>
    </div>

    <?php if ( $this->data['items'] ) : ?>

        <form action="/cart/update_items/" method="post">

            <div class="row hidden-xs">
                <div class="col-xs-2"><h2 class="n50-fs-md"><strong>Product</strong></h2></div>
                <div class="col-xs-5">&nbsp;</div>
                <div class="col-xs-1 text-center"><h2 class="n50-fs-md"><strong>Price</strong></h2></div>
                <div class="col-xs-2 text-center"><h2 class="n50-fs-md"><strong>Quantity</strong></h2></div>
                <div class="col-xs-1 text-center"><h2 class="n50-fs-md"><strong>Subtotal</strong></h2></div>
                <div class="col-xs-1">&nbsp;</div>
            </div>

            <?php foreach ( $this->data['items'] as $product ) : ?>
                <div class="row n50-bottom-buffer-md">
                    <div class="col-sm-2 col-xs-4">
                        <a href="/product/<?php echo $product['slug'] ?>/">
                            <img src="/media/products/placeholder.jpg" class="img-responsive"/>
                        </a>
                    </div>
                    <div class="col-xs-8 visible-xs-block">
                        <p>
                            <a href="/product/<?php echo $product['slug'] ?>/">
                                <h4><?php echo $product['name'] ?></h4>
                            </a>
                        </p>
                        <p>Price: <em>$<?php echo $product['price'] ?></em></p>
                        <p>Quantity: <?php echo $product['quantity'] ?></p>
                        <p>Subtotal: <em>$<?php echo $product['subtotal'] ?></em></p>
                        <p>
                            <a href="/cart/remove_item/<?php echo $product['id'] ?>/">Remove</a>
                        </p>
                    </div>
                    <div class="col-sm-5 hidden-xs n50-bottom-buffer-xs">
                        <a href="/product/<?php echo $product['slug'] ?>/">
                            <h4><?php echo $product['name'] ?></h4>
                        </a>
                    </div>
                    <div class="col-sm-1 hidden-xs text-center">
                        <em>$<?php echo $product['price'] ?></em>
                    </div>
                    <div class="col-sm-2 hidden-xs text-center">
                        <input type="number" name="quantity[<?php echo $product['id'] ?>]" value="<?php echo $product['quantity'] ?>" min="0" required>
                    </div>
                    <div class="col-sm-1 hidden-xs text-center">
                        <em>$<?php echo $product['subtotal'] ?></em>
                    </div>
                    <div class="col-sm-1 hidden-xs text-right">
                        <a href="/cart/remove_item/<?php echo $product['id'] ?>/">
                            <span class="glyphicon glyphicon-remove"></span>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>

            <div class="row n50-top-buffer-md">
                <div class="col-xs-9">&nbsp;</div>
                <div class="col-sm-2 col-xs-6 text-left">
                    <h4><strong>Subtotal</strong></h4>
                </div>
                <div class="col-sm-1 col-xs-6 text-right">
                    <h4><strong>$<?php echo $this->data['subtotal'] ?></strong></h4>
                </div>
            </div>

            <div class="row n50-top-buffer-md">
                <div class="col-sm-3 hidden-xs n50-bottom-buffer-sm">
                    <input type="submit" value="Update Cart" class="btn btn-info btn-block">
                </div>
                <div class="col-sm-6 hidden-xs">&nbsp;</div>
                <div class="col-sm-3 col-xs-12 text-right">
                    <a href="/checkout/" class="btn btn-success btn-block">Checkout</a>
                </div>
            </div>

        </form>

    <?php else : ?>

        <p>You have no items in your cart. <a href="/category/all/">Start shopping!</a></p>

    <?php endif; ?>

</div>