<?php
/*Plugin Name: BtScore Footer Adjust
Plugin URI: https://github.com/norico/BtScore-Footer-Adjust/
Description: Move footer on bottom.
Version: 1.0.0
Author: Norico
Author URI: https://github.com/norico
License: MIT License
*/

if ( ! defined( 'ABSPATH' ) ) die( "403 - You are not authorized to view this page." );

add_filter('language_attributes', 'bootscore_5_sticky_footer_adjust');
add_action('wp_enqueue_scripts',  'bootscore_enqueue_footer_adjust_styles');


/**
 * bootscore 5 test main or child theme.
 */
function bootscore_5_test()
{
    $load = "bootScore" === wp_get_theme()->get('Name');
    if ( is_child_theme() )
        $load = "bootscore-main" === wp_get_theme()->get('Template');
    return $load;
}

/**
 * Adding class if necessary.
 */
function bootscore_5_sticky_footer_adjust($lang)
{
    if (is_user_logged_in() && bootscore_5_test() )
        $lang = $lang . 'class="admin-bar"';
    return $lang;

}

/**
 * Custom template tags for this theme.
 */
function bootscore_enqueue_footer_adjust_styles()
{
    if ( bootscore_5_test() )
        wp_enqueue_style('footer_adjust', plugin_dir_url(__FILE__) . 'footer_adjust.css', array('bootstrap'));
}
