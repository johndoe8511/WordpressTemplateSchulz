<?php 
/*
Template Name: Seite - Dozent Referenz
*/

?>
<?php get_header(); ?>
             
<div class="container-fluid">    
    <div id="main">       
         <div id="content" >
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <h2><?php the_title(); ?></h2>
                    <div class="entry">
                        <?php the_content(); ?>
                    </div>
                <?php endwhile; endif; ?>
         </div><!-- content -->         
        <?php 
        $query = new WP_Query(array(
            'post_type' => 'firmenReferenz',
            'post_status' => 'publish',
            'orderby' => 'menu_order',
            'order'   => 'ASC',
        )); ?>
        <div id="contentFirmenReferenz" >
            <h2>Firmen Referenzen</h2>      
        </div><!-- content -->        
        <?php $i = 0;
        while ( $query->have_posts() ) :$query->the_post(); 
            if($i == 0)
            {
                ?><div class="row"><?php 
            } ?>
            <div id="contentLinks" class="col-xs-6 col-sm-6 col-md-3 col-lg-3" >
                <div class="thumbnail" id="entryLinks">
                    <?php
                        //get thumbnail frompost
                        $image_id = get_post_thumbnail_id();
                        $imagesize="thumbnail";
                        $image_url = wp_get_attachment_image_src($image_id, $imagesize, true);
                        //get custom fields from post
                        $custom_fields = get_post_custom($post->ID);
                    ?>
                    <img src="<?php echo $image_url[0];?>" alt="...">
                    <div class="caption">
                        <h3><strong><?php echo $post->post_title;?></strong></h3>
                        <p><?php echo $custom_fields["kurzbeschreibung"][0];?></p>
                        <p>
                             <?php if(!empty($custom_fields["url"][0]))
                            { ?>
                                <a href="<?php echo $custom_fields["url"][0];?>" class="btn btn-primary" role="button" target="_blank">Website</a> 
                            <?php } 
                            if(!empty($custom_fields["email"][0]))
                            { ?>
                                <a href="mailto:<?php echo $custom_fields["email"][0]?>" class="btn btn-default" role="button">E-Mail</a>
                        </p><?php } ?>
                    </div><!-- caption --> 
                </div><!-- thumbnail --> 
            </div><!--contentLinks -->
        <?php 
        $i++;
        if($i == 4)
        {
            $i = 0;
            ?></div><!--row--><?php
        }
        endwhile;
        if($i != 4 && $i != 0)
        {
            $i = 0;
            ?></div><!--row--><?php
        }
        wp_reset_query(); ?>
         
        <?php 
        $query = new WP_Query(array(
            'post_type' => 'dokumentReferenz',
            'post_status' => 'publish',
            'orderby' => 'menu_order',
            'order'   => 'ASC',
        )); ?>
        <div id="contentDokumentReferenz" >
            <h2>Dokument Referenzen</h2>      
        </div><!-- content -->         
        <?php $i = 0;
        while ( $query->have_posts() ) :$query->the_post(); 
            if($i == 0)
            {
                ?><div class="row"><?php 
            } ?>
            <div id="contentLinks" class="col-xs-6 col-sm-6 col-md-3 col-lg-3" >
                <div class="thumbnail" id="entryLinks">
                    <?php
                        //get thumbnail frompost
                        $image_id = get_post_thumbnail_id();
                        $imagesize="thumbnail";
                        $image_url = wp_get_attachment_image_src($image_id, $imagesize, true);
                        //get custom fields from post
                        $custom_fields = get_post_custom($post->ID);
                    ?>
                    <img src="<?php echo $image_url[0];?>" alt="...">
                    <div class="caption">
                        <h3><strong><?php echo $post->post_title;?></strong></h3>
                        <p><?php echo $custom_fields["kurzbeschreibung"][0];?></p>
                        <p>
                            <a href="<?php echo $custom_fields["url"][0];?>" class="btn btn-primary" role="button" target="_blank">Download</a> 
                            <?php if(!empty($custom_fields["email"][0]))
                            { ?>
                                <a href="mailto:<?php echo $custom_fields["email"][0]?>" class="btn btn-default" role="button">E-Mail</a>
                        </p><?php } ?>
                    </div><!-- caption --> 
                </div><!-- thumbnail --> 
            </div><!--contentLinks -->
        <?php 
        $i++;
        if($i == 4)
        {
            $i = 0;
            ?></div><!--row--><?php
        }
        endwhile;
        if($i != 4 && $i != 0)
        {
            $i = 0;
            ?></div><!--row--><?php
        }
        wp_reset_query(); ?>
       
    </div><!-- main --> 
</div><!-- container-fluid --> 
 
<?php get_footer(); ?>
