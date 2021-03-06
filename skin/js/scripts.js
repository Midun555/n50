(function($){

    /**
     * Pinterest Pinit buttons
     *
     * Add a no hover attribute to all images, then remove that attribute for
     * only PDP main media gallery images that are pinable.
     */
    $("img").attr("data-pin-no-hover", true);
    $("#js-pdp-media-main").removeAttr("data-pin-no-hover");


    /*
     * Form validations.
     *
     * For every form being submitted, find all required fields and make sure
     * they have content.  This is a fallback for browsers that don't support
     * the html5 'required' tag attribute, such as iOS, Safari, and Android.
     */
    $(document).on("submit", "form", function(e){

        var prevent_default = false;

        $(this).find("input:required, textarea:required, select:required").each(function(index) {

            if ( $.trim(this.value) == "" ) {
                $(this).addClass("n50-input-error").focus();
                alert("Please complete all required fields.");
                prevent_default = true;
            }

        });

        return !prevent_default;

    });


    /**
     * /checkout/
     *
     * When the shipping address form is submitted on the checkout index page,
     * send the form data to /checkout/shipping_save/ for the address to be
     * validated, and for the shipping rates to be calculated. Upon success,
     * update the payment block with new totals and Stripe information, then
     * show the block.
     */
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
                    $("#js-subtotal").text(json.subtotal);
                    $("#js-tax-rate").text(json.tax_rate);
                    $("#js-tax-amount").text(json.tax_amount);
                    $("#js-shipping-method").text(json.shipping_method);
                    $("#js-shipping-amount").text(json.shipping_amount);
                    $("#js-grand-total").text(json.grand_total);
                    $("#js-stripe").attr("data-amount", json.grand_total * 100);
                    $("#js-checkout-totals").removeClass("hide").addClass("show");

                    $('html, body').animate({
                        scrollTop: $("#js-checkout-totals").offset().top
                    }, 800);
                }
            }
        });
    });


    /*
     * /product/{product_slug}/
     *
     * On click of the multiple view thumnails, change the main view image.
     */
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


    /**
     * Footer newsletter signup form.
     *
     * When the newsletter form in the footer is submitted, send the input email
     * to a file via AJAX. If the email is already signed up, return error and
     * alert message, otherwise, show success message in input field.
     */
    $("#js-newsletter-form").on("submit", function(e){
        e.preventDefault();
        var $this = $(this);
        $.ajax({
            url: "/newsletter/signup/",
            data: {
                email: $this.find("input").val(),
            },
            dataType: "json",
            type: "POST",
            cache: false,
            success: function(json) {

                if ( json["error"] == 1 ) {
                    alert(json["message"]);
                    $this.find("input").focus().parent().addClass("has-warning");
                } else {
                    $this.find("input").val(json["message"]).parent().addClass("has-success");
                }
            }
        });
    });





})(jQuery);