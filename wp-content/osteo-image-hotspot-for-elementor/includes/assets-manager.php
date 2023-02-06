<?php

namespace Osteo_Image_Hotspot;
defined( 'ABSPATH' ) || die();

if ( !class_exists( 'Assets_Manager' ) ) {

    class Assets_Manager {

        private static $_instance = null;
        public static function instance() {
            if ( is_null( self::$_instance ) ) {
                self::$_instance = new self();
            }
            return self::$_instance;
        }

        public function __construct() {
            add_action( "elementor/frontend/after_enqueue_styles", [$this, 'frontend_enqueue_styles'] );
            add_action( 'elementor/frontend/after_enqueue_scripts', [$this, 'frontend_enqueue_scripts'] );
        }

        public function frontend_enqueue_styles() {

            wp_enqueue_style( 'tooltipster', OSTEO_IMAGE_HOTSPOT_ASSETS . 'vendor/tooltipster/tooltipster.css', array(), '3.2.6' );
            wp_enqueue_style( 'image-hotspot', OSTEO_IMAGE_HOTSPOT_ASSETS . 'vendor/image-hotspot/image-hotspot.css', array(), '1.0.0' );
            wp_enqueue_style( 'osteo-image-hotspot-style', OSTEO_IMAGE_HOTSPOT_ASSETS . 'css/style.css', array(), '1.0.0' );
            wp_style_add_data( 'osteo-image-hotspot-style', 'rtl', 'replace' );

        }

        public function frontend_enqueue_scripts() {

            wp_enqueue_script( 'tooltipster', OSTEO_IMAGE_HOTSPOT_ASSETS . 'vendor/tooltipster/jquery.tooltipster.min.js', array( 'jquery' ), '3.2.6', true );
            wp_enqueue_script( 'image-hotspot', OSTEO_IMAGE_HOTSPOT_ASSETS . 'vendor/image-hotspot/image-hotspot.js', array( 'jquery' ), '1.0.0', true );

        }

    }

    Assets_Manager::instance();

}