<?php get_header(); ?>

<div class="container-fluid">
    <div class="row">
         <?php if (have_posts()) : ?>
            <div id="searchparameter" class="col-xs-12 col-sm-12 col-md-">
                <p class="label label-success">Suchergebnisse f&uuml;r: <strong><?php echo $s ?></strong></p>
            </div><!-- searchparameter --> 
            <?php while (have_posts()) : the_post(); ?>
                <div id="mainSearch" class="col-xs-12 col-sm-12 col-md-">
                    <div id="content"  >    
                        <h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
                        <div class="entry">
                           <?php the_content(); ?>
                        </div>
                    </div><!-- content -->
               </div><!-- mainSearch -->
            <?php endwhile; ?>
            <!-- previous / next page link -->        
            <p align="center"><?php previous_posts_link('&laquo; Vorherige Seiter') ?> | <?php next_posts_link('N&auml;chste Seite &raquo;') ?></p>
        <?php else : ?>
            <div id="searchparameter" class="col-xs-12 col-sm-12 col-md-">
                <p class="label label-danger">Suchergebnisse f&uuml;r: <strong><?php echo $s ?></strong></p>
            </div><!-- searchparameter --> 
            <div id="mainSearch" class="col-xs-12 col-sm-12 col-md-">
                <div id="content"> 
                    <h2>Keine Inhate gefunden!</h2>
                </div><!-- content -->
            </div><!-- mainSearch -->
        <?php endif; ?>
    </div><!-- row -->
</div><!-- container-fluid -->
 
<?php get_footer(); ?>