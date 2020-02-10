<?php

if (! defined('WP_UNINSTALL_PLUGIN')){
    die();
}


// Delete Data
$testpost=get_post(array('post_type'=>'TestPlugin','numberposts'=>-1));
foreach ($testpost as $post){
    wp_delete_post($post->ID,true);
}