<?php
/**
 * Plugin Name: Osteo Image Hotspot for Elementor
 * Description: This is a image hotspot addon for elementor page builder.
 * Plugin URI:  https://twinkledev.xyz/codecanyon/osteo-image-hotspot/
 * Version:     1.0.0
 * Author:      TwinkleTheme
 * Author URI:  https://codecanyon.net/user/twinkletheme
 * Text Domain: 'osteo-image-hotspot'
 */

namespace Osteo_Image_Hotspot;

defined( 'ABSPATH' ) || die();
define( 'OSTEO_IMAGE_HOTSPOT_VERSION', '1.0.0' );
define( 'OSTEO_IMAGE_HOTSPOT_ROOT', __FILE__ );
define( 'OSTEO_IMAGE_HOTSPOT_PATH', plugin_dir_path( OSTEO_IMAGE_HOTSPOT_ROOT ) );
define( 'OSTEO_IMAGE_HOTSPOT_URL', plugin_dir_url( OSTEO_IMAGE_HOTSPOT_ROOT ) );
define( 'OSTEO_IMAGE_HOTSPOT_ASSETS', trailingslashit( OSTEO_IMAGE_HOTSPOT_URL . 'assets/' ) );
define( 'OSTEO_IMAGE_HOTSPOT_PLUGIN_BASE', plugin_basename( OSTEO_IMAGE_HOTSPOT_ROOT ) );

final class OsteoImageHotspot {

    const MINIMUM_ELEMENTOR_VERSION = '2.0.0';
    const MINIMUM_PHP_VERSION = '7.0';

    public function __construct() {

        // Load translation
        add_action( 'init', array( $this, 'i18n' ) );

        // Init Plugin
        add_action( 'plugins_loaded', array( $this, 'init' ) );
    }

    public function i18n() {
        load_plugin_textdomain( 'osteo-image-hotspot' );
    }

    public function init() {

        $this->include_files();

        // Check if Elementor installed and activated
        if ( !did_action( 'elementor/loaded' ) ) {
            add_action( 'admin_notices', array( $this, 'admin_notice_missing_main_plugin' ) );
            return;
        }

        // Check for required Elementor version
        if ( !version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
            add_action( 'admin_notices', array( $this, 'admin_notice_minimum_elementor_version' ) );
            return;
        }

        // Check for required PHP version
        if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
            add_action( 'admin_notices', array( $this, 'admin_notice_minimum_php_version' ) );
            return;
        }

    }

    public function admin_notice_missing_main_plugin() {
        if ( isset( $_GET['activate'] ) ) {
            unset( $_GET['activate'] );
        }

        $message = sprintf(
            /* translators: 1: Plugin name 2: Elementor */
            esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'osteo-image-hotspot' ),
            '<strong>' . esc_html__( 'Osteo Progressbar for Elementor', 'osteo-image-hotspot' ) . '</strong>',
            '<strong>' . esc_html__( 'Elementor', 'osteo-image-hotspot' ) . '</strong>'
        );

        printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
    }

    public function admin_notice_minimum_elementor_version() {
        if ( isset( $_GET['activate'] ) ) {
            unset( $_GET['activate'] );
        }

        $message = sprintf(
            /* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
            esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'osteo-image-hotspot' ),
            '<strong>' . esc_html__( 'Osteo Progressbar for Elementor', 'osteo-image-hotspot' ) . '</strong>',
            '<strong>' . esc_html__( 'Elementor', 'osteo-image-hotspot' ) . '</strong>',
            self::MINIMUM_ELEMENTOR_VERSION
        );

        printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
    }

    public function admin_notice_minimum_php_version() {
        if ( isset( $_GET['activate'] ) ) {
            unset( $_GET['activate'] );
        }

        $message = sprintf(
            /* translators: 1: Plugin name 2: PHP 3: Required PHP version */
            esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'osteo-image-hotspot' ),
            '<strong>' . esc_html__( 'Osteo Progressbar for Elementor', 'osteo-image-hotspot' ) . '</strong>',
            '<strong>' . esc_html__( 'PHP', 'osteo-image-hotspot' ) . '</strong>',
            self::MINIMUM_PHP_VERSION
        );

        printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
    }

    public function include_files() {

        include_once OSTEO_IMAGE_HOTSPOT_PATH . ( 'includes/assets-manager.php' );
        include_once OSTEO_IMAGE_HOTSPOT_PATH . ( 'includes/widgets-manager.php' );
        include_once OSTEO_IMAGE_HOTSPOT_PATH . ( 'includes/row-manager.php' );
        include_once OSTEO_IMAGE_HOTSPOT_PATH . ( 'lib/tgm-active.php' );
    }

}

// Instantiate Twinkle_Kit.
new OsteoImageHotspot();