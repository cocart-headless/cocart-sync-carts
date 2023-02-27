<?php
/*
 * Plugin Name: CoCart - Sync Carts
 * Plugin URI:  https://cocart.xyz
 * Description: Used to keep track of cart changes made to a previously loaded cart when passing a guest cart to a logged in customer.
 * Author:      Sébastien Dumont
 * Author URI:  https://sebastiendumont.com
 * Version:     1.0.0
 * Text Domain: cocart-sync-carts
 * Domain Path: /languages/
 * Requires at least: 5.6
 * Requires PHP: 7.4
 * WC requires at least: 6.4
 * WC tested up to: 7.4
 *
 * @package CoCart Sync Carts
 */

defined( 'ABSPATH' ) || exit;

if ( version_compare( PHP_VERSION, '7.4', '<' ) ) {
	return;
}

if ( ! defined( 'COCART_SYNC_CARTS_FILE' ) ) {
	define( 'COCART_SYNC_CARTS_FILE', __FILE__ );
}

// Include the main CoCart Sync Carts class.
if ( ! class_exists( 'CoCart\SyncCarts\Plugin', false ) ) {
	include_once untrailingslashit( plugin_dir_path( COCART_SYNC_CARTS_FILE ) ) . '/includes/class-cocart-sync-carts.php';
}

/**
 * Returns the main instance of cocart_sync_carts and only runs if it does not already exists.
 *
 * @return cocart_sync_carts
 */
if ( ! function_exists( 'cocart_sync_carts' ) ) {
	function cocart_sync_carts() {
		return \CoCart\SyncCarts\Plugin::init();
	}

	cocart_sync_carts();
}
