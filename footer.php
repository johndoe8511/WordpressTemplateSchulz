                <div id="footer">
                   
                    <footer class="footer">
                        <div id="container">
                            <nav class="navbar navbar-default navbar-fixed-bottom">
                                <div class="container">
                                    <!-- Brand and toggle get grouped for better mobile display -->
                                    <div class="navbar-footer">
                                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2" aria-expanded="false">
                                            <span class="sr-only">Toggle navigation</span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                        </button>
                                    </div>

                                    <!-- Collect the nav links, forms, and other content for toggling -->
                                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
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
                                    </div><!-- /.navbar-collapse -->
                                </div><!-- /.container-fluid -->
                            </nav>
                            <!-- back to top button -->
                            <a href="#" class="back-to-top" style="display: none;">
                                <i class="fa fa-arrow-circle-up"></i> 
                            </a>
                            
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
