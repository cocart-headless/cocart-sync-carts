<?php
/**
 * CoCart Sync Carts core setup.
 *
 * @author   Sébastien Dumont
 * @category Package
 * @license  GPL-2.0+
 */

namespace CoCart\SyncCarts;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Main CoCart Sync Carts class.
 *
 * @class CoCart\SyncCarts\Plugin
 */
final class Plugin {

	/**
	 * Plugin Version
	 *
	 * @access public
	 *
	 * @static
	 */
	public static $version = '1.0.0';

	/**
	 * Initiate CoCart Sync Carts.
	 *
	 * @access public
	 *
	 * @static
	 */
	public static function init() {
		// Load translation files.
		add_action( 'init', array( __CLASS__, 'load_plugin_textdomain' ), 0 );

		// Requires CoCart v3.7.12 or higher to fire triggers.
		if ( defined( 'COCART_VERSION' ) ) {
			$version = explode( '-', COCART_VERSION );

			if ( version_compare( $version[0], '3.7.12', '>=' ) ) {
				add_action( 'cocart_cart_loaded', array( __CLASS__, 'save_loaded_cart_session' ), 10, 1 );

				add_action( 'woocommerce_check_cart_items', array( __CLASS__, 'sync_cart_session' ), 99 );
				add_action( 'woocommerce_applied_coupon', array( __CLASS__, 'sync_cart_session' ), 99 );
				add_action( 'woocommerce_removed_coupon', array( __CLASS__, 'sync_cart_session' ), 99 );
				add_action( 'woocommerce_cart_emptied', array( __CLASS__, 'sync_cart_session' ), 99 );
				add_action( 'woocommerce_add_to_cart', array( __CLASS__, 'sync_cart_session' ), 99 );
				add_action( 'woocommerce_cart_item_removed', array( __CLASS__, 'sync_cart_session' ), 99 );
				add_action( 'woocommerce_cart_item_restored', array( __CLASS__, 'sync_cart_session' ), 99 );
				add_action( 'woocommerce_cart_item_set_quantity', array( __CLASS__, 'sync_cart_session' ), 99 );
			}
		}
	} // END init()

	/**
	 * Saves the loaded cart session information to the users account.
	 *
	 * @access public
	 *
	 * @static
	 *
	 * @param string $cart_key The cart key we are storing so we can sync.
	 */
	public static function save_loaded_cart_session( $cart_key ) {
		if ( is_user_logged_in() ) {
			$user_id = get_current_user_id();

			$data = array(
				'cart_key'  => $cart_key,
				'user_id'   => $user_id,
				'timestamp' => time(),
			);

			update_user_meta( $user_id, '_cocart_sync_cart', $data );
		}
	} // END save_loaded_cart_session()

	/**
	 * Syncs the cart session that was previously loaded.
	 *
	 * Dev Note: The cart expiration or expiry is not updated and
	 * can only update the cart if it still exists in order to sync.
	 *
	 * @access public
	 *
	 * @static
	 *
	 * @global wpdb $wpdb WordPress database abstraction object.
	 */
	public static function sync_cart_session() {
		global $wpdb;

		$user_id           = get_current_user_id();
		$cart_session_sync = get_user_meta( $user_id, '_cocart_sync_cart', true );

		if ( ! empty( $cart_session_sync ) ) {
			$wpdb->update(
				WC()->session->get_table_name(),
				array(
					'cart_value' => maybe_serialize( WC()->session->get_cart_data() ),
				),
				array( 'cart_key' => $cart_session_sync['cart_key'] ),
				array( '%s', '%d' ),
			);
		}
	} // END sync_cart_session()

	/**
	 * Return the name of the package.
	 *
	 * @access public
	 *
	 * @static
	 *
	 * @return string
	 */
	public static function get_name() {
		return 'CoCart Sync Carts';
	}

	/**
	 * Return the version of the package.
	 *
	 * @access public
	 *
	 * @static
	 *
	 * @return string
	 */
	public static function get_version() {
		return self::$version;
	}

	/**
	 * Return the path to the package.
	 *
	 * @access public
	 *
	 * @static
	 *
	 * @return string
	 */
	public static function get_path() {
		return dirname( __DIR__ );
	}

	/**
	 * Load the plugin translations if any ready.
	 *
	 * Note: the first-loaded translation file overrides any following ones if the same translation is present.
	 *
	 * Locales found in:
	 *      - WP_LANG_DIR/cocart-sync-carts/cocart-sync-carts-LOCALE.mo
	 *      - WP_LANG_DIR/plugins/cocart-sync-carts-LOCALE.mo
	 *
	 * @access public
	 *
	 * @static
	 */
	public static function load_plugin_textdomain() {
		if ( function_exists( 'determine_locale' ) ) {
			$locale = determine_locale();
		} else {
			$locale = is_admin() ? get_user_locale() : get_locale();
		}

		$locale = apply_filters( 'plugin_locale', $locale, 'cocart-sync-carts' );

		unload_textdomain( 'cocart-sync-carts' );
		load_textdomain( 'cocart-sync-carts', WP_LANG_DIR . '/cocart-sync-carts/cocart-sync-carts-' . $locale . '.mo' );
		load_plugin_textdomain( 'cocart-sync-carts', false, plugin_basename( dirname( COCART_SYNC_CARTS_FILE ) ) . '/languages' );
	} // END load_plugin_textdomain()

} // END class
