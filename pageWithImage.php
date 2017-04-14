<?php 
/*
Template Name: Seite mit Beitragsbild
*/
?>
<?php get_header(); ?>
<div class="container-fluid">
    <div class="row">
         <?php if (function_exists('nav_breadcrumb')) nav_breadcrumb(); ?> <!-- breadcrums -->
    </div>
    <div class="row">
        <div id="sidebar" class="col-xs-12 col-sm-12 col-md-3">
            <?php get_sidebar(); ?>
        </div><!-- sidebar --> 
        <div id="main" class="col-xs-12 col-sm-12 col-md-9">
            <div id="contentTest" >
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <div class="contentHead">
                         <h2><?php the_title(); ?></h2>
                    </div>
                
                    <?php
                        //get thumbnail frompost
                        $image_id = get_post_thumbnail_id();
                        $imagesize="custom-small";
                        $image_url = wp_get_attachment_image_src($image_id, $imagesize); 
                    ?>
                    <div class="pull-right img-responsive img-thumbnail" style="margin: 15px 15px 5px 5px;">
                        <img src="<?php echo $image_url[0];?>" width="<?php echo $image_attributes[1]; ?>" height="<?php echo $image_attributes[2]; ?>">
                    </div >
                
                    <div id="entry">
                        <?php the_content(); ?>
                    </div>
               
                <?php endwhile; endif; ?>
                <?php $InfoFooter = get_post_meta($post->ID, 'InfoText', TRUE);
                if( !empty($InfoFooter))
                    { ?>
                        <div id="footerInfo" class="contentFooterInfo">
                        <table>
                            <tbody>
                                <tr>
                                    <td> 
                                        <span class="glyphicon glyphicon-info-sign"></span>
                                    </td>
                                    <td>
                                        <?php echo $InfoFooter; ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>   
                    </div><!-- main --> 
                <?php } ?>
            </div><!-- contentTest --> 
        </div><!-- main --> 
    </div><!-- row --> 
</div><!-- content --> 
<?php get_footer(); ?>