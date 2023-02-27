<?php
/**
 * This file is designed to be used to load as package NOT a WP plugin!
 *
 * @version 1.0.0
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
