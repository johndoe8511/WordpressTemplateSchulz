<?php 
/*
Template Name: Seite mit Seitenmenü gleichen Levels
*/
?>

<?php get_header(); ?>
<div class="container-fluid">
    <div class="row">
    </div>
    <div class="row">
      
        <div id="sidebar" class="col-xs-12 col-sm-12 col-md-3">
           <?php get_sidebar("SameLevel"); ?>
        </div><!-- sidebar --> 

        <div id="main" class="col-xs-12 col-sm-12 col-md-9">
           
            <?php if (function_exists('nav_breadcrumb')) nav_breadcrumb(); ?> <!-- breadcrums -->
    
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
            </div><!-- main --> 
        </div>
    </div>
</div><!-- content --> 
 
<?php get_footer(); ?>