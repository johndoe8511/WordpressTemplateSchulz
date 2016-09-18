<?php 
/*
Template Name: Seite - Kontakt
*/
?>
<?php get_header(); ?>
 
<div class="container-fluid">
    <div class="row">
        <div id="main">
            <div id="content" class="col-xs-12 col-sm-12 col-md-12">
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <h2><?php the_title(); ?></h2>
                <div class="col-xs-12 col-sm-12 col-md-6 entry" id="entryContact">
                      <div class="imageSchulzWappenContact">
                     <?php the_content(); ?>
                    
                     </div><!-- image wappen -->
                </div>
                <?php endwhile; endif; ?>
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <div  id="contentContaktMap" >
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2432.9583008126824!2d13.470191315988025!3d52.42555325097639!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47a845dd991a039b%3A0x4ef540a29b91bfda!2sJ%C3%BCrgen+Schulz!5e0!3m2!1sde!2sde!4v1460315141258" width="100%" height="400px" frameborder="0" style="border:0" allowfullscreen></iframe> 
                    </div><!-- content --> 
                </div><!-- content --> 
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
