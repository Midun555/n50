<div class="container">

    <div class="page-header">
        <h1>Admin - Orders</h1>
    </div>

    <?php $this->loadBlock('admin-nav'); ?>

    <?php echo "<pre>"; print_r($this); echo "</pre><hr>"; die(); ?>

    <?php foreach ( $this->orders as $order ) : ?>

        <?php echo "<pre>"; print_r($order); echo "</pre><hr>"; ?>

        <div class="row">
            <div class="col-sm-4 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Customer</h3>
                    </div>
                    <div class="panel-body">
                        <p>
                            <?php echo $order['first_name'] . ' ' . $order['last_name'] ?><br>
                            <?php echo $order['email'] ?><br>
                            <?php echo $order['phone'] ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Shipping</h3>
                    </div>
                    <div class="panel-body">
                        <p>
                            <?php echo $order['address_1'] . ' ' . $order['address_2'] ?><br>
                            <?php echo $order['city'] . ', ' . $order['state'] . ', ' . $order['zip'] ?><br>
                            <?php echo $order['country'] ?><br>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Totals</h3>
                    </div>
                    <div class="panel-body">
                        <p>
                            <strong>Subtotal: </strong>$<?php echo $order['subtotal'] ?><br>
                            <strong>Tax (@ <?php echo $order['tax_rate'] ?>%): </strong>$<?php echo $order['tax_amount'] ?><br>
                            <strong>Shipping (<?php echo $order['shipping_method'] ?>): </strong>$<?php echo $order['shipping_amount'] ?><br>
                            <strong>Grand Total: </strong>$<?php echo $order['grand_total'] ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>

    <?php endforeach; ?>

</div>