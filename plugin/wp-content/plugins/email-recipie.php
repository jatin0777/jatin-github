<?php
/**
 * Plugin Name : Recipe email plugin
 * Description : This plugin extends the recipe plugin features.
 */


add_action('recipie_rating', function($arr){
    $post = get_post($arr['id']);
    $author_email = get_the_author_meta('user_email',$post->post_author);
    $subject ='Your recipe has recieved a new rating';
    $message = 'Your recipe'. $post->post_title .' has a rating of'.$arr['rating'];

    wp_mail( $author_email, $subject , $message );

});