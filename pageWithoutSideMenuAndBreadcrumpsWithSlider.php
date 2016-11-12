<?php 
/*
Template Name: Seite ohne Seitenmenü und ohne Seitennachvervolgung mit Bild Slider
*/
?>
<?php get_header(); ?>

<div class="container-fluid">
    <div class="row">
		<div id="mainImgGroup" style="max-height: 200px" class="">
			<div id="mainImg1" class="col-xs-12 col-sm-6 col-md-4">
				<img src="<?php bloginfo('template_directory');?>/img/speakers-414561_640.jpg" class="test img-circle img-responsive" alt="Responsive image">
			</div>
			<div id="mainImg2" class="col-xs-12 col-sm-6 col-md-4">
				<img src="<?php bloginfo('template_directory');?>/img/LehrerMaxMoritzTest.png" class="test img-circle img-responsive" alt="Responsive image">
			</div>
			<div id="mainImg3" class="col-xs-12 col-sm-6 col-md-4">
				<img src="<?php bloginfo('template_directory');?>/img/meeting-1219540_640.jpg" class="test img-circle img-responsive" alt="Responsive image">
			</div>
		</div>
	</div>
	<div class="row">
        <div id="main" class="col-xs-12 col-sm-12 col-md-12">
            <div id="contentSlider" >
            <?php if ( function_exists( 'soliloquy' ) ) { soliloquy( '735' ); } ?>
			 </div>
            </br>
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