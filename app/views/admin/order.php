<?php $order = $this->order; ?>

<div class="container">

    <div class="page-header">
        <h1>Admin - Order <small>(ID #<?php echo $order['visitor_id'] ?>)</small></h1>
    </div>

    <?php $this->loadBlock('admin-nav'); ?>

    <div class="row n50-admin-order-data">
        <div class="col-md-4 col-sm-12">
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
        <div class="col-md-4 col-sm-12">
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
        <div class="col-md-4 col-sm-12">
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

    <div class="table-responsive">
        <table class="table table-striped text-center">
            <thead>
                <tr>
                    <th class="text-center">Product</th>
                    <th class="text-center">SKU</th>
                    <th class="text-center">Price</th>
                    <th class="text-center">Quantity</th>
                    <th class="text-center">Builder</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ( $order['items'] as $item ) : ?>
                    <tr>
                        <td><?php echo $item['name'] ?></td>
                        <td><?php echo $item['sku'] ?></td>
                        <td>$<?php echo $item['price'] ?></td>
                        <td><?php echo $item['quantity'] ?></td>
                        <td><?php echo $item['builder'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</div>