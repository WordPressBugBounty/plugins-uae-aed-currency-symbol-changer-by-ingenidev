<?php

/**
 * Plugin Name: ingenidev, UAE - AED Currency Symbol Changer | مغير رمز عملة الدرهم الإماراتي
 * Plugin URI: https://ingenidev.com/uae-aed-currency-symbol-changer-wordpress-plugin/
 * Author: ingenidev
 * Author URI: https://ingenidev.com
 * Description: By default, Woocommerce  uses the currency symbol for the UAE Dirham (AED) as "د.إ". This plugin changes it to the new official symbol. | يغير هذا الإضافة رمز الدرهم الإماراتي من "د.إ" إلى الرمز الرسمي الجديد الصادر عن البنك المركزي الإماراتي.
 * Version: 1.1.1
 * Requires Plugins: woocommerce
 * Text Domain: ingenidev-uae-aed-currency-symbol-changer
 * Domain Path: /languages
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */
defined('ABSPATH') or die('Direct access not permitted');

add_filter('woocommerce_currency_symbol', 'ingenidev_uaecsc_change_uae_currency_symbol', 10, 2);

function ingenidev_uaecsc_enqueue_aed_font_styles() {

    wp_enqueue_style(
        'ig-new-aed-symbol-style', // A unique handle for your stylesheet
        plugin_dir_url( __FILE__ ) . 'custom-aed-font.css', // Path to your CSS file
        array(),
        '1.1.1'
    );
}
add_action( 'wp_enqueue_scripts', 'ingenidev_uaecsc_enqueue_aed_font_styles', 99 ); // For front-end

// If the symbol also needs to appear in the admin area (e.g., WooCommerce order pages):
add_action( 'admin_enqueue_scripts', 'ingenidev_uaecsc_enqueue_aed_font_styles', 99 );

function ingenidev_uaecsc_change_uae_currency_symbol($currency_symbol, $currency)
{
    //$pua_character_of_new_symbol = html_entity_decode('&#x00EA;', ENT_QUOTES | ENT_HTML5, 'UTF-8');
    // $new_symbol_html = '<span class="ig-new-uae-dirham-symbol"> AED </span>';
    $new_symbol_html = 'AED';

    switch ($currency) {
        case 'AED':
            $currency_symbol = $new_symbol_html;
            break;
    }
    return $currency_symbol;
}


