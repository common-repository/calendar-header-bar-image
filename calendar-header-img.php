<?php
/*
Plugin Name: Calendar Header Bar Image
Plugin URI: http://www.ayarunicodegroup.com/
Description: Substitute text with appropiate image for calendar week days.Representation of week days and images are Sunday=Galon Bird,Monday=Tiger,Tuesday=Lion,Wednesday=Elephant,Thusday=Rat,Friday=Guinea-pig,Saturday=Dragon. Burmese Calendar Widget.
Author: Sithu Thwin
Author URI: http://www.http://www.ayarunicodegroup.com/
Version: 2.0
*/
if(defined('CHI_VERSION')) return;
define('CHI_VERSION', '2.0');
define('CHI_PLUGIN_PATH', dirname(__FILE__));
define('CHI_PLUGIN_FOLDER', basename(CHI_PLUGIN_PATH));

if(defined('WP_ADMIN') && defined('FORCE_SSL_ADMIN') && FORCE_SSL_ADMIN){
    define('CHI_PLUGIN_URL', rtrim(str_replace('http://','https://',get_option('siteurl')),'/') . '/'. PLUGINDIR . '/' . basename(dirname(__FILE__)) );
}else{
    define('CHI_PLUGIN_URL', rtrim(get_option('siteurl'),'/') . '/'. PLUGINDIR . '/' . basename(dirname(__FILE__)) );
}
/*Language loader*/
//define('PLUGIN_TEXTDOMAIN', 'chi', '/wp-content/plugins/calendar-header-img/languages' );
load_plugin_textdomain('chi','/wp-content/plugins/calendar-header-img/languages/');
// Set up the required text domain for the chosen language.

//	load_plugin_textdomain('chi', false, dirname( plugin_basename(__FILE__) ) . '/languages' );


function calendar_header_img() {
?>

<style type='text/css'>/* Begin Calendar CSS*/
#wp-calendar {
	empty-cells: hide;
	margin: 10px auto 0;
	width: 180px;
	padding: 0px;
	border-collapse: collapse;
 }
#wp-calendar thead tr th{
	text-indent:-5000px;
	background:transparent;
	height:25px;
}
<?php 
if (get_option('start_of_week') == "0"){
?>
#wp-calendar thead tr  {background:url(<?php echo CHI_PLUGIN_URL; ?>/images/sun_calendar_th.gif) no-repeat;}
<?php
}
if (get_option('start_of_week') == "1"){
?>
#wp-calendar thead tr  {background: url(<?php echo CHI_PLUGIN_URL; ?>/images/mon_calendar_th.gif) top center no-repeat;}
<?php
}
if (get_option('start_of_week') == "2"){
?>
#wp-calendar thead tr  {background:url(<?php echo CHI_PLUGIN_URL; ?>/images/tue_calendar_th.gif) no-repeat;}
<?php
}
if (get_option('start_of_week') == "3"){
?>
#wp-calendar thead tr  {background:url(<?php echo CHI_PLUGIN_URL; ?>/images/wed_calendar_th.gif) no-repeat;}
<?php
}
if (get_option('start_of_week') == "4"){
?>
#wp-calendar thead tr  {background:url(<?php echo CHI_PLUGIN_URL; ?>/images/thu_calendar_th.gif) no-repeat;}
<?php
}
if (get_option('start_of_week') == "5"){
?>
#wp-calendar thead tr  {background:url(<?php echo CHI_PLUGIN_URL; ?>/images/fri_calendar_th.gif) no-repeat;}
<?php
}
if (get_option('start_of_week') == "6"){
?>
#wp-calendar thead tr  {background:url(<?php echo CHI_PLUGIN_URL; ?>/images/sat_calendar_th.gif) no-repeat;}
<?php
}
?>
</style>
<!--[if IE]>
<style>
#wp-calendar thead tr th{
	text-indent:0px;
	background-image: url() no-repeat;
}/* End Calendar */
</style>
<![endif]-->


<?php
}
add_action('wp_head', 'calendar_header_img');

function burmese_calendar() {  ?>
<div style="padding:5px;"><script type="text/javascript" src="<?php echo CHI_PLUGIN_URL; ?>/js/myanmar.js"></script>
 <?php } 
function widget_burmese_calendar($args) {
	extract($args); 
	echo $before_widget;
			echo $args['before_title'];
	_e('Burmese Calendar','chi');
			echo $args['after_title'];
	burmese_calendar();
	echo $after_widget; 
}
register_sidebar_widget(__('Burmese Calendar','chi'), 'widget_burmese_calendar');

?>
