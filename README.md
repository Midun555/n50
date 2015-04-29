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

- [x] implement bootstrap into frontend
- [x] integrate Stripe as payment
- [x] create class wrappers for Stripe (ie. StripeModel.php)
- [x] add newsletter signup in footer, for new product updates
- [x] add related products on PDP
- [x] add 'builder' column to CSV and db
- [x] add featured (homepage) column to CSV
- [x] integrate address validation via UPS

- [ ] add status as condition for all product queries
- [ ] style header, footer, homepage
- [ ] refactor checkout models (move to shipping/payment models)
- [ ] integrate shipping rate calculation via UPS
- [ ] add constant in init.php for document root, etc.