<?php 
/*
Template Name: Seite - Beruflicher Werdegang
*/

$query = new WP_Query(array(
    'post_type' => 'beruflicherWerdegang',
    'post_status' => 'publish',
    'orderby' => 'menu_order',
    'order'   => 'DESC',
    'posts_per_page'   => '100',
));
?>
<?php get_header(); ?>

<div class="container-fluid">    
    <div id="main">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"  id="entryTitle">
                <h2><?php echo $post->post_title ?></h2>
            </div><!-- entryTimeframe --> 
        </div><!-- row -->   
        <?php 
        while ( $query->have_posts() ) :$query->the_post(); ?>
            <div class="row">
                <div id="contentCuriculum" class="row White">
                    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 entryTimeframe">
                        <h4><strong><?php echo $post->post_title;?></strong></h4>
                    </div><!-- entryTimeframe --> 

                    <div  class="col-xs-10 col-sm-10 col-md-10 col-lg-10 entryText">
                        <p><?php echo the_content();?></p>
                    </div><!-- entryText --> 
                </div><!--contentCuriculum -->
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
