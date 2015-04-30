(function($){

    $("#js-shipping-address").on("submit", function(e){
        e.preventDefault();

        var shipping_address = {};

        $(this).find("input, select").each(function(index) {
            if ( this.name ) shipping_address[this.name] = $.trim(this.value);
        });

        $.ajax({
            url: "/checkout/shipping_save/",
            data: shipping_address,
            type: "POST",
            dataType: "json",
            cache: false,
            beforeSend: function() {
                // add preloader
            },
            success: function(json) {
                // remove preloader
                if ( json.status == 0 ) {
                    alert(json.message);
                } else {
                    jQuery("#js-subtotal").text(json.subtotal);
                    jQuery("#js-tax-rate").text(json.tax_rate);
                    jQuery("#js-tax-amount").text(json.tax_amount);
                    jQuery("#js-shipping-method").text(json.shipping_method);
                    jQuery("#js-shipping-amount").text(json.shipping_amount);
                    jQuery("#js-grand-total").text(json.grand_total);
                    jQuery("#js-stripe").attr("data-amount", json.grand_total * 100);
                    jQuery("#js-checkout-totals").removeClass("hide").addClass("show");
                }
            }
        });
    });


    $(document).on("click", "#js-pdp-media-view", function(e){
        $("#js-pdp-media-main").attr("src", $(this).attr("src"));
    });


    $(document).on("click", ".js-add-to-cart", function(e){
        $.ajax({
            url: "/cart/add_item/",
            data: {
                product_id: $(this).data("id"),
                quantity: $(".js-quantity select").val()
            },
            type: "POST",
            cache: false,
            beforeSend: function() {
                $(".js-message").text("Adding to cart...");
            },
            success: function() {
                $(".js-message").html("Added to cart. <a href='/cart/'>View cart.</a>");
            }
        });
    });


    // CONTACT FORM SUBMISSION
    $(document).on("submit", ".js-contact-form", function(e){
        e.preventDefault();
        var preventDefault = false;
        var values = [];
        $(this).find(".required").each(function(index) {
            if ( $.trim(this.value) == "" ) {
                preventDefault = true;
            } else {
                values[index] = this.value;
            }
        });
        if ( preventDefault ) {
            $(".js-submit-message")
                .hide()
                .html("Please fill in all required fields.")
                .fadeIn(400);
        } else {
            $.ajax({
                data: { values: values },
                cache: false,
                url: "/contact/submit/",
                type: "POST",
                success: function() {
                    $(".js-submit-message")
                        .hide()
                        .html("Thank you for sharing!")
                        .fadeIn(400);
                }
            });
        }
    });

})(jQuery);