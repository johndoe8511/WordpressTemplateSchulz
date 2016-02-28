<?php 
/*
Template Name: Seite ohne Seitenmenü
*/
?>
<?php get_header(); ?>
<div class="container-fluid">
    <div class="row">
        <div id="main" class="col-md-12">
        <?php if (function_exists('nav_breadcrumb')) nav_breadcrumb(); ?>
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
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
        </div>
    </div>
</div><!-- main --> 
 
<?php get_footer(); ?>