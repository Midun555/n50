<?php $data = $this->data; ?>

<table cellpadding="0" cellspacing="0" border="0" width="800" align="center">
    <tr>
        <td style="padding: 40px 0 20px 0;">
            <p>Dear <?php echo $data['first_name'] . ' ' . $data['last_name'] ?>,</p>
            <br>
            <p>
                Thank you for your purchase from n50!
                Below you will find details regarding the order (ID <strong>#<?php echo $data['visitor_id'] ?></strong>)
                you just placed.
                If you have any questions, comments, concerns, or anything else,
                please do not hesitate to contact us at:
                <a href="mailto:miguelpelota1@yahoo.com">miguelpelota1@yahoo.com</a>.
            </p>
        </td>
    </tr>
</table>

<table cellpadding="0" cellspacing="0" border="0" width="800" align="center">
    <tr>
        <th>Customer</th>
        <th>Shipping</th>
        <th>Payment</th>
    </tr>
    <tr>
        <td style="text-align: center;">
            <p><?php echo $data['first_name'] . ' ' . $data['last_name'] ?></p>
            <p><?php echo $data['email'] ?></p>
            <p><?php echo $data['phone'] ?></p>
        </td>
        <td style="text-align: center;">
            <p><?php echo $data['address_1'] . ' ' . $data['address_2'] ?></p>
            <p><?php echo $data['city'] . ', ' . $data['state'] . ', ' . $data['zip'] ?></p>
            <p><?php echo $data['country'] ?></p>
        </td>
        <td style="text-align: center;">
            <p><strong>Subtotal: </strong>$<?php echo $data['subtotal'] ?></p>
            <p><strong>Tax (@ <?php echo $data['tax_rate'] ?>%): </strong>$<?php echo $data['tax_amount'] ?></p>
            <p><strong>Shipping (<?php echo $data['shipping_method'] ?>): </strong>$<?php echo $data['shipping_amount'] ?></p>
            <p><strong>Grand Total: </strong>$<?php echo $data['grand_total'] ?></p>
        </td>
    </tr>
</table>

<table cellpadding="0" cellspacing="0" border="0" width="800" align="center">
    <tr>
        <th>Product</th>
        <th>SKU</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Subtotal</th>
    </tr>
    <?php foreach ( $data['items'] as $item ) : ?>
        <tr>
            <td style="text-align: center;"><?php echo $item['name'] ?></td>
            <td style="text-align: center;"><?php echo $item['sku'] ?></td>
            <td style="text-align: center;">$<?php echo $item['price'] ?></td>
            <td style="text-align: center;"><?php echo $item['quantity'] ?></td>
            <td style="text-align: center;">$<?php echo $item['subtotal'] ?></td>
        </tr>
    <?php endforeach; ?>
</table>