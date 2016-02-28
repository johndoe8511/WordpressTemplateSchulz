<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//DE" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="de">
<head profile="http://gmpg.org/xfn/11">
   
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

    <title><?php wp_title(' - ', true, 'right'); ?> <?php bloginfo('name'); ?></title>
   
    <!-- Bootstrap -->
    <link href="<?php echo get_stylesheet_directory_uri() ?>/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">

    <link href="<?php echo get_stylesheet_directory_uri() ?>/css/normalize.css" rel="stylesheet" type="text/css">
    
    <!-- Custom styles for this template -->
    <link href="<?php echo get_stylesheet_directory_uri() ?>/css/sticky-footer.css" rel="stylesheet" type="text/css">
        
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
    <link href="<?php echo get_stylesheet_directory_uri() ?>/style.css" rel="stylesheet" type="text/css">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo get_stylesheet_directory_uri() ?>/bootstrap/js/bootstrap.min.js"></script>
    <?php wp_head(); ?>
 
</head>
   
    <body <?php body_class(); ?>  data-spy="scroll" data-target=".bs-docs-sidebar" data-offset="10">
        
        <div id="wrapper" >
            <div id="contentWrapper" class="container">
                <a name="top"></a>
                <div id="header" >
                    <nav class="navbar navbar-default">
                        <div class="container-fluid">
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <a class="navbar-brand" href="<?php echo get_home_url(); ?>">Brand</a>
                            </div>

                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                <ul class="nav navbar-nav">
                                    <?php
                                    wp_nav_menu(array(
                                        'menu' => 'main-menu',
                                        'container_class' => 'nav-collapse collapse',
                                        'theme_location' => 'main-menu',
                                        'depth' => 2,
                                        'container' => false,
                                        'menu_class' => 'nav navbar-nav',
                                         'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                                        'walker'            => new wp_bootstrap_navwalker())
                                    );
                                    ?>
                                </ul>
                             
                                
                                <form class="navbar-form navbar-right" role="search" method="get" id="searchform" class="searchform" action="<?php echo site_url(); ?>">
                                    <div class="form-group">
                                        <input type="text"  value="" name="s" id="s" class="form-control" placeholder="Search">
              
                                    </div>
                                    <button type="submit" id="searchsubmit" class="btn btn-default">Submit</button>
                                </form>
                            </div><!-- /.navbar-collapse -->
                        </div><!-- /.container-fluid -->
                    </nav>
                    
                    
                </div><!-- header -->
    
    <!-- 
    <h1><a href="<?php //bloginfo('url'); ?>"><?php //bloginfo('name'); ?></a></h1>
    <h3><?php //bloginfo('description'); ?></h3>
    -->