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

            <?php if (get_grizzly_option('headermobilebottombar')) :?>
                <div id="mobile-menu-content" class="mobile-menu-to-top">
                    <?php wp_nav_menu( array('menu' => '1', 'after' => '<div class="sub-menu-items-button"></div>')); ?>
                </div>
            <?php endif; ?>
        </header>

        

        <?php if (is_active_sidebar( 'widget_mobile_menu' )) :?>
            <div id="mobile-menu">
                <?php if (!get_grizzly_option('headermobilebottombar')) :?>
                    <div id="mobile-menu-content">
                        <?php wp_nav_menu( array('menu' => '1', 'after' => '<div class="sub-menu-items-button"></div>')); ?>
                    </div>
                <?php endif; ?>
                <div id="mobile-menu-bar">
                    <?php dynamic_sidebar( 'widget_mobile_menu' ); ?>
                </div>
            </div>
        <?php endif; ?>

        <main>