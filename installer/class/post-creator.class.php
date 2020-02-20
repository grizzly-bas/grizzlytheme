<?php

if ( ! function_exists( 'PostCreator' ) ) {

    function PostCreator(
        $name      = 'AUTO POST',
        $content   = 'DUMMY CONTENT',
        $category  = array(1,2)
    ) {
            
        $post_data = array(
            'post_title'    => wp_strip_all_tags( $name ),
            'post_content'  => $content,
            'post_status'   => 'publish',
            'post_type'     => 'page',
            'post_author'   => 1,
            'post_category' => $category,
            'page_template' => ''
        );
        $postid = wp_insert_post( $post_data );

        if ( ! add_post_meta( $postid, '_et_pb_use_builder', 'on', true ) ) { 
            update_post_meta ( $postid, '_et_pb_use_builder', 'on' );
         }

    }

}