        <div id="footer"></div><!-- footer -->
 
 
        <?php wp_footer(); ?>
        
        <div id="debug">
            <div id="container">
                <?php 
                    global $post;
                    global $get;
                    echo '<pre>';
                    echo 'GET: ';
                    print_r($get);
                    echo '</pre>';
                    echo '<pre>';
                    echo 'POST: ';
                    print_r($post);
                    echo '</pre>';
                ?>
            </div>
            
        </div>
        </div>
<!-- Statistik/Analyse-Tool einbauen -->
    </body>
</html>