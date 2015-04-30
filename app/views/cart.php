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
                <div class="row n50-top-buffer-md">
                    <div class="col-sm-2 col-xs-6">
                        <img src="/media/products/placeholder.jpg" class="img-responsive"/>
                    </div>
                    <div class="col-sm-5 col-xs-6">
                        <a href="/product/<?php echo $product['slug'] ?>/">
                            <h4><?php echo $product['name'] ?></h4>
                        </a>
                    </div>
                    <div class="col-sm-1 col-xs-3 text-center">
                        <em>$<?php echo $product['price'] ?></em>
                    </div>
                    <div class="col-sm-2 col-xs-4 text-center">
                        <input type="number" name="quantity[<?php echo $product['id'] ?>]" value="<?php echo $product['quantity'] ?>" min="0">
                    </div>
                    <div class="col-sm-1 col-xs-3 text-center">
                        <em>$<?php echo $product['subtotal'] ?></em>
                    </div>
                    <div class="col-sm-1 col-xs-2 text-right">
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
                <div class="col-xs-2 hidden-xs">
                    <input type="submit" value="Update Cart" class="btn btn-info btn-block">
                </div>
                <div class="col-xs-8 hidden-xs">&nbsp;</div>
                <div class="col-sm-2 col-xs-12">
                    <a href="/checkout/" class="btn btn-success btn-block">Checkout</a>
                </div>
            </div>

        </form>

    <?php else : ?>

        <p>You have no items in your cart. <a href="/category/all/">Start shopping!</a></p>

    <?php endif; ?>

</div>