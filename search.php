<?php get_header(); ?>
<?php
global $wp_query;
$total_results = $wp_query->found_posts;
?>
<div class="container-fluid">
    <div class="row">
         <?php if (have_posts()) : ?>
            <div id="main" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">            
                <div id="searchparameter" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <p class="label label-success"><?php echo $total_results;?> Suchergebnisse f&uuml;r: <strong><?php echo $s ?></strong></p>
                </div><!-- searchparameter --> 
                <?php while (have_posts()) : the_post(); ?>
                    <div id="mainSearch" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div id="contentTest" >
                            <div class="contentHead">
                                  <h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
                             </div>
                             <div id="entry">
                                 <?php the_content(); ?>
                             </div>
                         </div>
                   </div><!-- mainSearch -->
                <?php endwhile; ?>
                <!-- previous / next page link -->   
                <?php if($total_results > 10) : ?>
                    <p align="center" text-align="center"><?php previous_posts_link('&laquo; Vorherige Seiter') ?> | <?php next_posts_link('N&auml;chste Seite &raquo;') ?></p>
                <?php endif; ?>
            </div>
        <?php else : ?>
            <div id="main" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                     
                <div id="searchparameter" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <p class="label label-danger">Keine Suchergebnisse f&uuml;r: <strong><?php echo $s ?></strong></p>
                </div><!-- searchparameter --> 
                <div id="mainSearch" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div id="contentTest" >
                        <div id="entry">
                              <h2>Keine Inhate gefunden!</h2>
                         </div>
                     </div>
                </div><!-- mainSearch -->
            </div>
        <?php endif; ?>
    </div><!-- row -->
</div><!-- container-fluid -->
<?php get_footer();