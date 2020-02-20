<?php

// INITIALIZE INPUT SHORTCODE
function gnm_ajax_input()
{
    $postid = $post->ID;
    $nonce = wp_create_nonce("my_user_vote_nonce");
    $link = admin_url('admin-ajax.php?action=my_user_vote&post_id='.$postid.'&nonce='.$nonce);

    $ajax_input = sprintf(
        '
        <input class="search-input" type=text></input>
        <a class="search-button" data-nonce="%1$s" data-post_id="%2$s" href="%3$s">search</a>
        ',
        $nonce,
        $postid,
        $link
    );

    return $ajax_input;
}
add_shortcode('ajax-input', 'gnm_ajax_input');




// INITIALIZE OUTPUT SHORTCODE
function gnm_ajax_result()
{
    $ajax_result = sprintf(
        '<div class="ajax-result %1$s"></div>',
        ''
    );
    return $ajax_result;
}
add_shortcode('ajax-result', 'gnm_ajax_result');




// GET SEARCH RESULTS
function my_user_vote()
{
    
    if (!wp_verify_nonce($_REQUEST['nonce'], "my_user_vote_nonce")) {
        exit("No naughty business please");
    }

    $html = '';
    $s = $_REQUEST['term'];
    $args = array(
        's' =>$s
    );

    // The Query
    $the_query = new WP_Query($args);
    if ($the_query->have_posts()) {
        $html .= "<h2 style='font-weight:bold;color:#000'>Search Results for: ".get_query_var('s')."</h2>";
        while ($the_query->have_posts()) {
            $the_query->the_post();
            $html .= '<li><a href="' . the_permalink() . '">' . the_title() . '</a></li>';
        }
    } else {
        $html .= '<h2 style="font-weight:bold;color:#000">Nothing Found</h2><div class="alert alert-info"><p>Sorry, but nothing matched your search criteria. Please try again with some different keywords.</p></div>';
    }


    $passed = true;

    if ($passed === false) {
        $result['type'] = "error";
        $result['vote_count'] = 10;
    } else {
        $result['type'] = "success";
        $result['vote_count'] = $html;
    }

    if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
        $result = json_encode($result);
        echo $result;
    } else {
        header("Location: ".$_SERVER["HTTP_REFERER"]);
    }

    die();
}
add_action("wp_ajax_my_user_vote", "my_user_vote");



// Not logged in user
function my_must_login()
{
    echo "You must log in to vote";
    die();
}
add_action("wp_ajax_nopriv_my_user_vote", "my_must_login");



// Enqueue javascript
function my_script_enqueuer()
{
    wp_register_script("my_voter_script", get_template_directory_uri() . '/includes/js/ajax.js', array('jquery'));
    wp_localize_script('my_voter_script', 'myAjax', array( 'ajaxurl' => admin_url('admin-ajax.php')));

    wp_enqueue_script('jquery');
    wp_enqueue_script('my_voter_script');
}
add_action('init', 'my_script_enqueuer');
