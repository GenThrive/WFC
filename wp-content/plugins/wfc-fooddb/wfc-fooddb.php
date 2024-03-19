<?php
/**
 * Plugin Name: WFC Food DB
 * Description: Water Footprint of Food Galery
 * Version: v1 (Feb 22)
 */

//Register scripts to use
function db_func_load_vuescripts() {
    wp_register_script('db_wpvue_vuejs', 'https://cdn.jsdelivr.net/npm/vue@2.6.14');
    wp_register_script('db_my_vuecode', plugin_dir_url( __FILE__ ).'wpvuedb.js', 'db_wpvue_vuejs', true );
    wp_register_style('db_wpvue_style1', plugin_dir_url( __FILE__ ).'style.css', true);
  }
//Tell WordPress to register the scripts 
add_action('wp_enqueue_scripts', 'db_func_load_vuescripts');


//Return string for shortcode
function db_func_wp_vue(){

  //Build String
  $str= "<div id='wpvuedb'>"
    ."</div>";

  //Return to display
  return $str;
} // end function

//Return string for shortcode
function db_func_wp_vue_head(){
  wp_enqueue_script('db_wpvue_vuejs');
  wp_enqueue_script('db_my_vuecode');
  wp_enqueue_style('db_wpvue_style1');
} // end function

//Add shortcode to WordPress
add_shortcode( 'wpvuedb', 'db_func_wp_vue' );
add_shortcode( 'db_wpvuehead', 'db_func_wp_vue_head' );


?>