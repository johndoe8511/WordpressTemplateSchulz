<?php get_header(); ?>

<div class="container-fluid">
    <div class="row">
        <div id="searchparameter" class="col-md-12">
            <nav class="breadcrumb">
                <a class="info">Deine Suchergebnisse f&uuml;r <strong><?php echo $s ?></strong></a>
            </nav>
        </div><!-- searchparameter --> 
        <div id="mainSearch" class="col-md-12">
            <div id="content"  >    
                <?php if (have_posts()) : ?>
                    <?php while (have_posts()) : the_post(); ?>
                        <h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
                        <div class="entry">
                           <?php the_content(); ?>
                        </div>
                    <?php endwhile; ?>

                    <p align="center"><?php next_posts_link('&laquo; &Auml;ltere Eintr&auml;ge') ?> | <?php previous_posts_link('Neuere Eintr&auml;ge &raquo;') ?></p>
                <?php else : ?>
                    <div class="entry">
                        <h2>Leider nichts gefunden</h2>
                    </div>
                <?php endif; ?>
            </div><!-- main -->
        </div><!-- main -->
    </div><!-- row -->
</div><!-- container-fluid -->
 
<?php get_footer(); ?>