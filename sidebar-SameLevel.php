<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>

    <?php //wp_nav_menu( array( 'theme_location' => 'side-navi' ) ); ?>


    <!-- <h2>Menü</h2> -->
    <?php getNavigationSideMenu('Module'); ?>

 
<?php endif; ?>