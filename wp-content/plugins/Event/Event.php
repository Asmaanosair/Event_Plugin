<?php

/**
 * @package Event
 */
/*
Plugin Name: Event
Plugin URI: http://localhost/plugin
Description: Add Custom Post Type [Event].
Version: 5.3.2
Author: Asmaa Nusair
Author URI: http://localhost
License: GPLv2 or later
Text Domain: Localhost
Domain Path: /wp-content/plugins/Event/language
*/

/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.

Copyright 2005-2015 Automattic, Inc.
*/

defined('ABSPATH') or die("Hi there!  I'm just a plugin, not much I can do when called directly");
 class AddPostPlugin{
     function __construct()
     {
         add_action('init',array($this,'custom_post_type'));


     }


     function Activate(){
       flush_rewrite_rules();
    }
     function DeActivate(){
         flush_rewrite_rules();
     }
     function custom_post_type(){
        register_post_type('event', array(
            'labels' => 'event',
            'public' => true,
                'supports'   => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),

        ));

     }
     function enqueue(){
         wp_enqueue_style('pluginstyle',plugins_url('/assets/testplugin.css',__FILE__));
         wp_enqueue_script('pluginscript',plugins_url('/assets/testplugin.js',__FILE__));
     }

    /**************************************************
     ************  Add Meta box ****************
     **************************************************/

     function  add_meta_box_data(){
         add_meta_box( "Add_Post_Plugin_id", "Event_Start_Date", array($this,'Start_meta_box_callback'), "Event",
         "normal","high" );
         add_meta_box( "Add_Post_Plugin_id", "End_Start_Date", array($this,'Start_meta_box_callback'), "Event",
             "normal","high" );


     }

   
     function Start_meta_box_callback($post){
         wp_nonce_field(basename(__FILE__), "start_nonce");

         $start= get_post_meta($post->ID, "start_date", true);
         $end= get_post_meta($post->ID, "end_date", true);
         $start_date=date("Y-m-d", strtotime($start));
         $end_date=date("Y-m-d", strtotime($end));

            echo "  <label> Start:</label><br>
           <input type=\"date\" name=\"start\" value='$start_date'>  $start_date <br>  ";
         echo "  <label> End:</label><br>
           <input type=\"date\" name=\"end\" value='$end_date'>  $end_date <br>   ";


     }
     function save_data_metabox($post_id, $post){

         if (!isset($_POST['start_nonce']) || !wp_verify_nonce($_POST['start_nonce'], basename(__FILE__))) {
             return $post_id;
         }

         $post_slug = "event";
         if ($post_slug != $post->post_type) {
             return;
         }


         $start = '';
         $end = '';
         if (isset($_POST['start'])&& isset($_POST['end'])) {
             $start = sanitize_text_field($_POST['start']);
             $end = sanitize_text_field($_POST['end']);
         } else {
             $start = '';
             $end = '';
         }
         update_post_meta($post_id, "start_date", $start);
         update_post_meta($post_id, "end_date", $end);

     }
     function wp_shortcode($order,$num){
         $args = array(
             'post_type'=> 'event',
             'posts_per_page'=>$num,
             'orderby' => $order,
             'order'   => 'DESC',
         );
    $query = new WP_Query($args);


if($query->have_posts()) {
    while ($query->have_posts()):
        $query->the_post();

        $url = get_the_post_thumbnail_url( null, $size="post-thumbnail" );
        if ( $url ) {
            $imag= esc_url( $url );
        }
        echo "<div class='col-lg-4'><img src='".$imag."'>"."<h4>" . get_the_title() . "</h4>" . "<p>" . get_the_excerpt() . "</p>"  . "<h6> Start Date  :"."   ".get_post_meta(get_the_ID(),'start_date',true)."</h6>". "<a href='" . get_the_permalink() . "' class='btn btn-primary' style='margin: 5px;'> More</a></div>";
           endwhile;
}else{
    $result = "<p> There is no Events</p>";
}
    wp_reset_postdata();


}

     /********************
      * Translation
      * ******************
      */
     function trans() {
        $test=array(
            __('Start_Date','Localhost'),
            __('End_Date','Localhost'),

        );
     }
     function rad_plugin_load_text_domain() {
         load_plugin_textdomain( 'Localhost', dirname( plugin_basename( __FILE__ ) ) . '/language/' );
     }



 function loadMyBlock() {
 wp_enqueue_script(
 'my-new-block',
 plugin_dir_url(__FILE__) . 'test-block.js',
 array('wp-blocks','wp-editor'),
 true
 );
 }



     function register()
     {
         add_action('admin_enqueue_scripts',array($this,'enqueue'));
         add_action( 'add_meta_boxes',array($this,'add_meta_box_data'), 10, 1);
         add_action("save_post", array($this,'save_data_metabox'), 10, 2);
         add_shortcode('block', array($this,'wp_shortcode'));
         add_action( 'plugins_loaded',array($this,'rad_plugin_load_text_domain') );
         add_action('enqueue_block_editor_assets', array($this,'loadMyBlock'));
     }





 }



add_shortcode('block', 'ink_wp_shortcode');
 if(class_exists('AddPostPlugin')){
     $AddPostPlugin=new AddPostPlugin();
     $AddPostPlugin->register();
    



 }

 register_activation_hook(__FILE__,array($AddPostPlugin,'Activate'));
 register_deactivation_hook(__FILE__,array($AddPostPlugin,'DeActivate'));






