<div class="container">

    <div class="page-header">
        <h1>Admin - Orders</h1>
    </div>

    <?php $this->loadBlock('admin-nav'); ?>

    <div class="table-responsive">
        <table class="table table-striped text-center">
            <thead>
                <tr>
                    <th class="text-center">Order ID</th>
                    <th class="text-center">Date</th>
                    <th class="text-center">Name</th>
                    <th class="text-center">Location</th>
                    <th class="text-center">Grand Total</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ( $this->orders as $order ) : ?>
                    <tr>
                        <td><a href="/admin/order/<?php echo $order['id'] ?>/"><?php echo $order['id'] ?></a></td>
                        <td><?php echo $order['date'] ?></td>
                        <td><?php echo $order['name'] ?></td>
                        <td><?php echo $order['location'] ?></td>
                        <td>$<?php echo $order['grand_total'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</div>