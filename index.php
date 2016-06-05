
<?php get_header(); ?>
	
   <div id="sidebar">
      <?php get_sidebar(); ?>
   </div><!-- sidebar -->
	
   <div id="main">
   
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <h2> <?php the_title(); ?> </h2>
	<div class="entry">
            <?php the_content(); ?>
         </div>
      <?php endwhile; ?>
 
         <p align="center"><?php next_posts_link('&laquo; &Auml;ltere Eintr&auml;ge') ?> | <?php previous_posts_link('Neuere Eintr&auml;ge &raquo;') ?></p>
 
    <?php endif; ?>
   
   </div><!-- main -->
 
<?php get_footer(); ?>