<div class="container n50-body-wrapper" id="js-checkout-shipping-address">

    <div class="page-header">
        <h1>Shipping Address</h1>
    </div>

    <form id="js-shipping-address">
        <div class="row">
            <div class="col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="first-name">first name</label>
                    <input type="text" name="first_name" id="first-name" value="Miguel" required class="form-control" autofocus>
                </div>
            </div>
            <div class="col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="last-name">last name</label>
                    <input type="text" name="last_name" id="last-name" value="Pelota" class="form-control" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="email">email</label>
                    <input type="email" name="email" id="email" value="miguelpelota1@yahoo.com" class="form-control" required>
                </div>
            </div>
            <div class="col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="phone">phone</label>
                    <input type="text" name="phone" id="phone" value="1112223333" class="form-control" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="address-1">address 1</label>
                    <input type="text" name="address_1" id="address-1" value="11235 Knott Ave. Suite B" class="form-control" required>
                </div>
            </div>
            <div class="col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="address-2">address 2</label>
                    <input type="text" name="address_2" id="address-2" class="form-control" value="">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="city">city</label>
                    <input type="text" name="city" id="city" value="Cypress" class="form-control" required>
                </div>
            </div>
            <div class="col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="state">state</label>
                    <select name="state" id="state" class="form-control">
                        <option value=""></option>
                        <option value="CA" selected>California</option>
                        <?php foreach ( $this->states as $name => $abbreviation ) : ?>
                            <option value="<?php echo $abbreviation ?>">
                                <?php echo $name; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="zip">zip</label>
                    <input type="text" name="zip" id="zip" value="90630" class="form-control" required>
                </div>
            </div>
            <div class="col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="country">country</label>
                    <input type="text" name="country" id="country" value="United States" disabled value="" class="form-control" required>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
    </form>

</div>

<div class="container hide" id="js-checkout-totals">

    <div class="page-header">
        <h1>Totals</h1>
    </div>

    <div class="row">
        <div class="col-md-3 col-xs-6"><strong>Subtotal</strong></div>
        <div class="col-md-1 col-xs-6 text-right">$<span id="js-subtotal"></span></div>
    </div>
    <div class="row">
        <div class="col-md-3 col-xs-6"><strong>Tax (@ <span id="js-tax-rate">7</span>%)</strong></div>
        <div class="col-md-1 col-xs-6 text-right">$<span id="js-tax-amount"></span></div>
    </div>
    <div class="row">
        <div class="col-md-3 col-xs-6"><strong>Shipping (<span id="js-shipping-method">UPS Ground</span>)</strong></div>
        <div class="col-md-1 col-xs-6 text-right">$<span id="js-shipping-amount"></span></div>
    </div>
    <div class="row">
        <div class="col-md-3 col-xs-6"><h4><strong>Grand Total</strong></h4></div>
        <div class="col-md-1 col-xs-6 text-right"><h4>$<span id="js-grand-total"></span></h4></div>
    </div>
    <div class="row">
        <div class="col-md-3 col-xs-12">
            <form action="/checkout/charge/" method="post">
                <script
                    src="https://checkout.stripe.com/checkout.js"
                    class="stripe-button"
                    id="js-stripe"
                    data-key="<?php echo STRIPE_TEST_PUBLISHABLE_KEY; ?>"
                    data-amount=""
                    data-color="black"
                    data-name="n50"
                    data-description="<?php echo $this->cart_count ?> items"
                    data-image="/skin/images/logo.png">
                </script>
            </form>
        </div>
    </div>

</div>