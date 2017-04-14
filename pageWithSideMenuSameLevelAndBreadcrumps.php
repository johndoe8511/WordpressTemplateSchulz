<?php 
/*
Template Name: Seite mit Seitenmenü gleichen Levels
*/
?>

<?php get_header(); ?>
   
<div class="container-fluid">
    <div class="row">
         <?php if (function_exists('nav_breadcrumb')) nav_breadcrumb(); ?> <!-- breadcrums -->
    </div>
    <div class="row">
      
        <div id="sidebar" class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
           <?php get_sidebar("SameLevel"); ?>
        </div><!-- sidebar --> 

        <div id="main" class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
            <div id="contentTest" >
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <div class="contentHead">
                     <h2><?php the_title(); ?></h2>
                </div>
               
                <div id="entry">
                    <?php the_content(); ?>
                </div>
                <div class="contentFooter">
                    <a href="<?php echo get_home_url();?>/kontakt/" >Kontakt</a>
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