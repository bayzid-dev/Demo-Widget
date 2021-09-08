<?php
/**
 * Plugin Name: Our Widget
 * Plugin Uri: https://column-demo
 * Description: 
 * Author: SeJan ahmed BayZid
 * Version: 1.0
 * License: 
 * Text Domain: demo-widget
 * Domain path: /languages
 */

/** 
 *  textdomain 
 */
require_once plugin_dir_path(__FILE__) . "widgets/class.widget.php";

function demo_widget_textdomain(){

    load_plugin_textdomain('demo-widget', false, dirname(__FILE__) . '/languages');
}
add_action('plugin_loaded', 'demo_widget_textdomain');


// registering the demo widget
function register_demo_widget(){
    register_widget('DemoWidget');
}
add_action('widgets_init', 'register_demo_widget');
