<?php 
/*
Template Name: Seite - Beruflicher Werdegang
*/

$query = new WP_Query(array(
    'post_type' => 'beruflicherWerdegang',
    'post_status' => 'publish',
    'orderby' => 'menu_order',
    'order'   => 'ASC',
    'posts_per_page'   => '100',
));
?>
<?php get_header(); ?>

<div class="container-fluid">    
    <div id="main">
        <div class="row">
            <?php if (function_exists('nav_breadcrumb')) nav_breadcrumb(); ?>
        </div><!-- row -->   
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"  id="entryTimeframe">
                <h2><?php echo $post->post_title ?></h2>
            </div><!-- entryTimeframe --> 
        </div><!-- row -->   
        <?php 
        while ( $query->have_posts() ) :$query->the_post(); ?>
            <div id="contentCuriculum" class="row White">
                <div class="col-xs-11 col-sm-11 col-md-2 col-lg-2"  id="entryTimeframe">
                    <h4><strong><?php echo $post->post_title;?></strong></h4>
                </div><!-- entryTimeframe --> 
                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"  >
                    <p></p>
                </div><!-- entryTimeframe --> 
                <div  class="col-xs-12 col-sm-12 col-md-9 col-lg-9" id="entryText">
                        <p><?php echo the_content();?></p>
                </div><!-- entryText --> 
                <?php                  
                /*
                echo '<pre>';
                print_r($custom_fields);
                echo '</pre>';
                    echo '<pre>';
                    print_r($post);
                    echo '</pre>';

                    $post_id = get_the_ID();
                    echo $post_id;
                    echo "<br>";
*/
                     /*  echo '<pre>';
                    print_r($image_url);
                    echo '</pre>';*/
                    //do something

                ?>
        </div><!--row -->
        <?php
        endwhile;
        wp_reset_query(); ?>
        <?php
           /*
            * Kommentare sind auf Seiten deaktiviert.
            * Möchtest du die Kommentarfunktion auf Seiten aktivieren, entferne einfach die beiden "//"-Zeichen vor "comments_template();"
            */

           //comments_template();
        ?>
    </div><!-- main --> 
</div><!-- container-fluid --> 
 
<?php get_footer(); ?>
