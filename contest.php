<?php
/*
* Plugin Name: Tripzilla Contest
* Description: Create Contest shortcode.
* Version: 1.0
* Author: ye.minhtut@travelogy.com
* Author URI: http://magdev.tripzilla.com
*/
if ( ! defined( 'TZ_PLUGIN_DIR' ) )
	define( 'TZ_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
// // Example 1 : WP Shortcode to display form on any page or post.
// function contest_one(){

// $template_path =  TZ_PLUGIN_DIR . 'template/contestone-template.php';
// include($template_path);
// add_shortcode('contest1', 'contest_one');
// }
function form_creation(){
$template_path =  TZ_PLUGIN_DIR . 'template/contestone-template.php';
include($template_path);
}
add_shortcode('contest1', 'form_creation');
?>