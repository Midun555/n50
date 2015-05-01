# PAGES

- /
- /about/
- /contact/
- /shipping_handling/
- /cart/
- /search/{query}/
- /category/{category_slug}/
- /product/{product_slug}/

- /checkout/
- /checkout/shipping_address_save/
- /checkout/stripe_charge/
- /checkout/success/
- /checkout/error/

- /admin/upload/
- /admin/export/


# TODO

- [ ] run through Stripe error handling (https://stripe.com/docs/testing#cards)
- [ ] integrate shipping rate calculation via UPS
- [ ] ajax newsletter signup in footer
- [ ] build admin panel to view orders/items/totals/etc.
- [ ] add Stripe and UPS logos to footer

- [x] set up password protected admin panel
- [x] form validation through javascript
- [x] style homepage
- [x] style header
- [x] fix cart page on mobile
- [x] add loadBlock method to controller for reusable blocks
- [x] implement bootstrap into frontend
- [x] integrate Stripe as payment
- [x] create class wrappers for Stripe (ie. StripeModel.php)
- [x] add newsletter signup in footer, for new product updates
- [x] add related products on PDP
- [x] add 'builder' column to CSV and db
- [x] add featured (homepage) column to CSV
- [x] integrate address validation via UPS
- [x] add constants in init.php for document root, etc.
- [x] add status as condition for all product queries
- [x] adjust htaccess and folder structure for GoDaddy subdomains
- [x] style footer
- [x] refactor checkout models (move to shipping/payment models)