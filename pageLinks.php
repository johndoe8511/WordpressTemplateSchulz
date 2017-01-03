<?php 
/*
Template Name: Seite - Links
*/

$query = new WP_Query(array(
    'post_type' => 'links',
    'post_status' => 'publish',
    'orderby' => 'menu_order',
    'order'   => 'ASC',
    'posts_per_page'   => '100',
));
?>
<?php get_header(); ?>

<div class="container-fluid">    
    <div id="main">
        <?php 
        $i = 0;
        while ( $query->have_posts() ) :$query->the_post(); 
            if($i == 0)
            {
                ?><div class="row"><?php 
            } ?>
            <div id="contentLinks" class="col-xs-12 col-sm-12 col-md-3 col-lg-3" >
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
                            <a href="<?php echo $custom_fields["url"][0];?>" class="btn btn-primary" role="button" target="_blank">Website</a> 
                            <?php if(!empty($custom_fields["email"][0]))
                            { ?>
                                <a href="mailto:<?php echo $custom_fields["email"][0]?>" class="btn btn-default" role="button">E-Mail</a>
                            <?php } ?>
                        </p>
                    </div><!-- caption --> 
                </div><!-- thumbnail --> 
                    <?php                  
                    /*
                    echo '<pre>';
                    print_r($custom_fields);
                    echo '</pre>';
                        echo '<pre>';
                        print_r($post);
                        echo '</pre>';

                        $post_id = get_the_ID();
                        echo $post_id;
                        echo "<br>";
*/
                         /*  echo '<pre>';
                        print_r($image_url);
                        echo '</pre>';*/
                        //do something

                    ?>
            </div><!--contentLinks -->
        <?php 
        $i++;
        if($i == 4)
        {
            $i = 0;
            ?></div><!--row--><?php
        }
        endwhile;

        wp_reset_query(); ?>
        <?php
           /*
            * Kommentare sind auf Seiten deaktiviert.
            * Möchtest du die Kommentarfunktion auf Seiten aktivieren, entferne einfach die beiden "//"-Zeichen vor "comments_template();"
            */

           //comments_template();
        ?>
    </div><!-- main --> 
</div><!-- container-fluid --> 
 
<?php get_footer(); ?>
