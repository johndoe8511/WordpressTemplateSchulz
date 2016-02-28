                <div id="footer">
                    <footer class="footer">
                        <div id="container">
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
                                    <a class="navbar-brand" href="<?php echo get_home_url(); ?>">LOGO</a>
                                </div>
                                
                                <!-- Collect the nav links, forms, and other content for toggling -->
                                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                     <ul class="nav navbar-nav navbar-left">
                                        <li> <a  href="#">Copyright 2016 &#169;</a></li>
                                        <?php
                                        wp_nav_menu(array(
                                            'menu' => 'footer-menu',
                                            'container_class' => 'nav-collapse collapse',
                                            'theme_location' => 'footer-menu',
                                            'depth' => 2,
                                            'container' => false,
                                            'menu_class' => 'nav navbar-nav',
                                             'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                                            'walker'            => new wp_bootstrap_navwalker())
                                        );
                                        ?>
                                    </ul>
                                    <ul class="nav navbar-nav navbar-right">
                                        <li> <a  href="#top">nach oben</a></li>
                                    </ul>
                                </div><!-- /.navbar-collapse -->
                            </div><!-- /.container-fluid -->
                        </nav>


                            <div id="debug">
                                <div id="container">
                                    <?php 
                                        /*global $post;
                                        global $get;
                                        echo '<pre>';
                                        echo 'GET: ';
                                        print_r($get);
                                        echo '</pre>';
                                        echo '<pre>';
                                        echo 'POST: ';
                                        print_r($post);
                                        echo '</pre>';*/
                                    ?>
                                </div>
                            </div>
                        </div>
                    </footer>
                </div>
                <?php wp_footer(); ?>
<!-- Statistik/Analyse-Tool einbauen -->
            </div><!-- contentWrapper -->
        </div><!-- wrapper -->
    </body>
</html>

<script>
//set sticky footer with and height
$( document ).ready(function(){
    var footerWidth = $("#footer").width(); // don't need to use 'px'
    var containerHeight = $("#container").height(); // don't need to use 'px'
    jQuery("footer").css({
                  width: footerWidth, 
                  height: containerHeight+'px',
                  display: 'block',
                  left: '-' + (230+footerWidth)
            }); // don't need escaping
 }); 
</script>