<?php

/**
 * Plugin name: WooCommerce Custobar
 * Description: Syncs your WooCommerce data with Custobar CRM.
 * Author: Custobar CRM
 * Text Domain: woocommerce-custobar
 * Version: 1.3.3
 * Domain Path: /languages
 * WC requires at least: 4.0
 * Requires PHP 7.2+
 */
defined('ABSPATH') or exit;

if (!defined('WOOCOMMERCE_CUSTOBAR_PATH')) {
    define( 'WOOCOMMERCE_CUSTOBAR_PATH', plugin_dir_path( __FILE__ ) );
}
if (!defined('WOOCOMMERCE_CUSTOBAR_URL')) {
    define( 'WOOCOMMERCE_CUSTOBAR_URL', plugin_dir_url( __FILE__ ) );
}
if (!defined('WOOCOMMERCE_CUSTOBAR_VERSION')) {
    define( 'WOOCOMMERCE_CUSTOBAR_VERSION', '1.3.3' );
}

require_once(WOOCOMMERCE_CUSTOBAR_PATH . '/includes/loader.php');

register_activation_hook(__FILE__, [\WooCommerceCustobar\Plugin::class, 'activate']);
register_deactivation_hook(__FILE__, [\WooCommerceCustobar\Plugin::class, 'deactivate']);
