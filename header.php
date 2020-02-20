<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=5.0'/>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <?php 
        wp_head(); 
        if (get_grizzly_option('headerhtml')) {echo stripslashes(get_grizzly_option('headerhtml'));}
    ?>
</head>

<body <?php body_class(); ?>>
    <?php if (get_grizzly_option('bodyhtml')) {echo stripslashes(get_grizzly_option('bodyhtml'));} ?>
    
    <div id="page-container">
        <header data-scroll="add-class" <?php if(get_grizzly_option('headerfixed')){echo 'class="fixed"';} ?>>
            <?php if ( is_active_sidebar( 'widget_header_top' ) ) : ?>
                <div id="header-top">
                    <div class="et_pb_row<?php if(get_grizzly_option('headerfullwidth')){echo '_fluid';} ?>">
                        <?php dynamic_sidebar( 'widget_header_top' ); ?>
                    </div>
                </div>
            <?php endif; ?>

            <?php if ( is_active_sidebar( 'widget_header_middle' ) ) : ?>
                <div id="header-middle">
                    <div class="et_pb_row<?php if(get_grizzly_option('headerfullwidth')){echo '_fluid';} ?>">
                        <?php dynamic_sidebar( 'widget_header_middle' ); ?>
                    </div>
                </div>
            <?php endif; ?>

            <?php if ( is_active_sidebar( 'widget_header_bottom' ) ) : ?>
                <div id="header-bottom">
                    <div class="et_pb_row<?php if(get_grizzly_option('headerfullwidth')){echo '_fluid';} ?>">
                        <?php dynamic_sidebar( 'widget_header_bottom' ); ?>
                    </div>
                </div>
            <?php endif; ?>

            <div id="menu-items-wrap"><ul></ul></div>
        </header>

        <?php if ( is_active_sidebar( 'widget_mobile_menu' ) && !get_grizzly_option('headermobilebottombar')) :?>
            <div id="mobile-menu">
                <div id="mobile-menu-content">
                    <?php wp_nav_menu( array('menu' => '1', 'after' => '<div class="sub-menu-items-button"></div>')); ?>
                </div>
                
                <div id="mobile-menu-bar">
                    <?php dynamic_sidebar( 'widget_mobile_menu' ); ?>
                </div>
            </div>
        <?php endif; ?>

        <main>
            <?php
                // if(!empty(get_grizzly_option('headerglobal'))) {
                //     if (!is_admin() && ( is_search() || is_404() )) {
                //         echo '<div class="globalheader"></div>';
                //     }
                // }
            ?>

            <div class="gnm-global-header">
                <div class="et_pb_row">
                    <div class="et_pb_column et_pb_column_4_4">
                        <h1><?php echo do_shortcode('[page-title]'); ?></h1>
                        <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );} ?>
                    </div>
                </div>
            </div>