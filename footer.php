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
                                            <li> <a id="copyright">Copyright &#169; <?php echo date('Y'); ?> J&uuml;rgen Schulz </a></li>
                                            <?php
                                            wp_nav_menu(array(
                                                'menu' => 'footer-menu',
                                                'container_class' => 'nav-collapse collapse',
                                                'theme_location' => 'footer-menu',
                                                'depth' => 2,
                                                'container' => false,
                                                'menu_class' => 'nav navbar-nav',
                                                'fallback_cb' => 'wp_bootstrap_navwalker::fallback',
                                                'walker' => new wp_bootstrap_navwalker())
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
 
            
            </div><!-- contentWrapper -->
        </div><!-- wrapper -->
    </body>
</html>
 <!-- menu highlighting -->
<script>
    $('.navbar-collapse li a.selected').parents('li').addClass('parent');
</script>
 <!-- Statistik/Analyse-Tool -->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-96240831-1', 'auto');
  //ga(’set‘, ‚anonymizeIp‘, true);
  ga('send', 'pageview');

</script>