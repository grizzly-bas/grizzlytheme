        <?php if(get_grizzly_option('backtotop')){ echo '<button id="back-to-top" data-scroll="add-class"><i class="fas fa-arrow-up"></i></button>'; } ?>
    </main>
    <footer>
        <div id="footer-top">
            <div class="et_pb_row<?php if(get_grizzly_option('footerfullwidth')){echo '_fluid';} ?>">                  
                <?php if ( is_active_sidebar( 'widget_footer_1_5' ) ) : ?>
                    <div class="footer-top-1 et_pb_column <?php if(get_grizzly_option('footerblok1')){echo get_grizzly_option('footerblok1');} ?>">
                        <?php dynamic_sidebar( 'widget_footer_1_5' ); ?>
                    </div>
                <?php endif; ?>

                <?php if ( is_active_sidebar( 'widget_footer_2_5' ) ) : ?>
                    <div class="footer-top-2 et_pb_column <?php if(get_grizzly_option('footerblok1')){echo get_grizzly_option('footerblok2');} ?>">
                        <?php dynamic_sidebar( 'widget_footer_2_5' ); ?>
                    </div>
                <?php endif; ?>

                <?php if ( is_active_sidebar( 'widget_footer_3_5' ) ) : ?>
                    <div class="footer-top-3 et_pb_column <?php if(get_grizzly_option('footerblok1')){echo get_grizzly_option('footerblok3');} ?>">
                        <?php dynamic_sidebar( 'widget_footer_3_5' ); ?>
                    </div>
                <?php endif; ?>

                <?php if ( is_active_sidebar( 'widget_footer_4_5' ) ) : ?>
                    <div class="footer-top-4 et_pb_column <?php if(get_grizzly_option('footerblok1')){echo get_grizzly_option('footerblok4');} ?>">
                        <?php dynamic_sidebar( 'widget_footer_4_5' ); ?>
                    </div>
                <?php endif; ?>
                
                <?php if ( is_active_sidebar( 'widget_footer_5_5' ) ) : ?>
                    <div class="footer-top-5 et_pb_column <?php if(get_grizzly_option('footerblok1')){echo get_grizzly_option('footerblok5');} ?>">
                        <?php dynamic_sidebar( 'widget_footer_5_5' ); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <div id="footer-bottom">
            <div class="et_pb_row<?php if(get_option('grizzly_footer-fullwidth') == 0){echo '_fluid';} ?>">
                <?php if ( is_active_sidebar( 'widget_header_top' ) ) : 
                    dynamic_sidebar( 'widget_footer_bottom' );
                endif; ?>
            </div>
        </div>
    </footer>
    <?php 
        wp_footer();
        if (get_grizzly_option('footerhtml')) {echo stripslashes(get_grizzly_option('footerhtml'));}
    ?>
</div> <!-- /page-container -->
</body>
</html>