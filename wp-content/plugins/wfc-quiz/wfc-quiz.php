<?php
/**
 * Plugin Name: WFC Quiz
 * Description: WFC Quiz
 * Version: v1 (Feb 22)
 */


//Register scripts to use
function func_load_vuescripts() {
    wp_register_script('wpvue_vuejs', 'https://cdn.jsdelivr.net/npm/vue@2.6.14');
    wp_register_script('sortable', 'https://cdn.jsdelivr.net/npm/sortablejs@1.8.4/Sortable.min.js');
    wp_register_script('vuedraggable', 'https://cdnjs.cloudflare.com/ajax/libs/Vue.Draggable/2.20.0/vuedraggable.umd.min.js');
    wp_register_script('my_vuecode', plugin_dir_url( __FILE__ ).'vuecode.js', 'wpvue_vuejs', true );
    wp_register_style('wpvue_style1', plugin_dir_url( __FILE__ ).'style.css', true);
  }
//Tell WordPress to register the scripts 
add_action('wp_enqueue_scripts', 'func_load_vuescripts');


//Return string for shortcode
function func_wp_vue(){

  //Build String
  $str= "<div id='wfcquiz'>"
    ."</div>";

  //Return to display
  return $str;
} // end function

//Return string for shortcode
function func_wp_vue_head(){
  wp_enqueue_script('wpvue_vuejs');
  wp_enqueue_script('sortable');
  wp_enqueue_script('vuedraggable');
  wp_enqueue_script('my_vuecode');
  wp_enqueue_style('wpvue_style1');
} // end function

//Add shortcode to WordPress
add_shortcode( 'wpvue', 'func_wp_vue' );
add_shortcode( 'wpvuehead', 'func_wp_vue_head' );


?>