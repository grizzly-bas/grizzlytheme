<?php
  
function gm_default_widget_demo() {  
    
    $active_widgets = get_option( 'sidebars_widgets' ); 

    // CHECK IF WIDGETS ARE EMPTY
    if ( !empty ( $active_widgets[ 'widget_header_top' ] ) || !empty ( $active_widgets[ 'widget_header_top' ] ) ) { 
        return; 
    } 

    $counter = 1;  
    
    $active_widgets[ 'widget_header_top' ][0] = 'gm_demo_widget-' . $counter;  
    $demo_widget_content[ $counter ] = array ( 'text' => "This works!\n\nAmazing!" );  
    
    $counter++;  
    
    $active_widgets[ 'widget_header_top' ][] = 'rss-' . $counter;  
    $rss_content[ $counter ] = array (  
        'title'        => 'WordPress Stack Exchange',  
        'url'          => 'http://wordpress.stackexchange.com/feeds',  
        'link'         => 'http://wordpress.stackexchange.com/questions',  
        'items'        => 15,  
        'show_summary' => 0,  
        'show_author'  => 1,  
        'show_date'    => 1,  
    );  
    update_option( 'widget_rss', $rss_content );  
    
    $counter++;  
    
    $active_widgets[ $sidebars['widget_header_middle'] ][] = 'gm_demo_widget-' . $counter;  
    $demo_widget_content[ $counter ] = array ( 'text' => 'The second instance of our amazing demo widget.' );  
    update_option( 'widget_gm_demo_widget', $demo_widget_content );  
    
    update_option( 'sidebars_widgets', $active_widgets );  

}  
gm_default_widget_demo();