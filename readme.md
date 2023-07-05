# WC Product Shortcut with Full Details Including Extra Product Options

The WC Product Shortcut with Full Details Including Extra Product Options is a custom WordPress plugin that allows you to display any WooCommerce product with extra options, add to cart, and add to wishlist buttons using a custom shortcode.

## Installation

1. Download the plugin ZIP file from the [GitHub repository](https://github.com/example/repo).
2. Log in to your WordPress admin panel.
3. Go to "Plugins" > "Add New".
4. Click on the "Upload Plugin" button.
5. Select the downloaded ZIP file and click "Install Now".
6. Once installed, click on the "Activate" button.

## Usage

To display a WooCommerce product with extra options, add to cart, and add to wishlist buttons on any WordPress page, use the following shortcode:

[znyd_wc_product_page id="250"]

css
Copy code

Make sure to replace `id` with the actual product ID of the product you want to display.

### Example

To display a product with the ID 250, use the shortcode:

[znyd_wc_product_page id="250"]

css
Copy code

## Additional Information

- This plugin requires WooCommerce to be installed and activated on your WordPress site.
- If you are using a wishlist plugin, such as YITH Wishlist, the add to wishlist button will be displayed alongside the add to cart button.
- The plugin uses the `[product_page]`, `[add_to_cart]`, and `[yith_wcwl_add_to_wishlist]` shortcodes internally to generate the necessary functionality.

## License

This project is licensed under the [MIT License](LICENSE).

## Author Info
