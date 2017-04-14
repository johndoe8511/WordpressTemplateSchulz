<?php 
/*
Template Name: Seite - Kontakt
*/
?>
<?php get_header(); ?>
 
<div class="container-fluid">
    <div id="main" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
       <div id="contantContact" >

            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div class="row">
                <div class="contentHead col-xs-12 col-sm-12 col-md-12 col-lg-12">
                     <h2><?php the_title(); ?></h2>
                </div>
            </div>
            <div class="row White borderRadiusBottom">
                <div class="col-xs-1 col-sm-1 col-md-6 col-lg-6 " id="entryContact">
                    <?php the_content(); ?>
                </div>

                <div class="col-xs-11 col-sm-11 col-md-6 col-lg-6 " id="contentContactMap">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2432.9583008126824!2d13.470191315988025!3d52.42555325097639!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47a845dd991a039b%3A0x4ef540a29b91bfda!2sJ%C3%BCrgen+Schulz!5e0!3m2!1sde!2sde!4v1460315141258" width="100%" height="500px" frameborder="0" style="border:0" allowfullscreen></iframe> 
                </div><!--contentContaktMap --> 
            </div>
            <?php endwhile; endif; ?>
        </div><!-- main --> 
    </div>
</div><!-- content --> 
<?php get_footer(); ?>
