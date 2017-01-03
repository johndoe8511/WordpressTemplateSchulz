<?php 
/*
Template Name: Seite ohne Seitenmenü und ohne Seitennachvervolgung
*/
?>
<?php get_header(); ?>
<div class="container-fluid">
    <div class="row">
        
        <div id="main" class="col-xs-12 col-sm-12 col-md-12">
             
            <div id="content" >
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <h2><?php the_title(); ?></h2>
                    <div class="entry">
                        <?php the_content(); ?>
                    </div>
                <?php endwhile; endif; ?>

                <?php
                   /*
                    * Kommentare sind auf Seiten deaktiviert.
                    * Möchtest du die Kommentarfunktion auf Seiten aktivieren, entferne einfach die beiden "//"-Zeichen vor "comments_template();"
                    */

                   //comments_template();
                ?>
            </div><!-- content --> 
        </div><!-- main --> 
    </div>
</div><!-- content --> 
 
<?php get_footer(); ?>