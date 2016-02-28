<?php

// Register Custom Navigation Walker
require_once('nav_walker/wp_bootstrap_navwalker.php');

if ( function_exists('register_sidebar') )
{
    register_sidebar();
}

if ( function_exists('register_nav_menus') ) 
{
    register_nav_menus(array(
        'main-menu' => __( 'Hauptnavigation' ),
        'footer-menu' => __( 'Footernavigation' ),
    ));
}

//sidemenü
/**
 * get child page html sidemenü navigation
 */
function getChildNavigationSidemenü()
{
    if(is_page())
    {
        global $post;
        
        $args = array(
            'sort_order' => 'asc',
            'sort_column' => 'post_title',
            'parent' => $post->ID,
            'post_type' => 'page',
            'post_status' => 'publish'
        ); 
        $currentPageChildrenArray = get_pages($args); 
       
        createHTMLPageSidemenüNavigaion($currentPageChildrenArray);

        // echo what we get back from WP to the browser
        //echo '<pre>' . print_r( $currentPageChildrenArray, true ) . '</pre>';
        
    }
}

function createHTMLPageSidemenüNavigaion($pageChildrenArray)
{
    global $post;
    if(!empty($pageChildrenArray))
    {
        ?>
            <div class="list-group">
        <?php
        foreach ($pageChildrenArray as $child) 
        {
            if($child->post_parent == $post->ID)
            { ?>
                <a href="<?php echo get_permalink($child); ?>" class="list-group-item"><?php echo $child->post_title?></a>
            <?php }
        }
        ?>
            </div>
        <?php
    }
    else
    {
        echo "Keine Child Pages";
    }
}

/**
 * get wordpress breadcrumps
 * @global type $post
 * @global type $wp_query
 */
function nav_breadcrumb() 
{
    
    $delimiter = '&raquo;';
    $home = 'Home'; 
    $before = '<span class="current-page">'; 
    $after = '</span>'; 
 
    if ( !is_home() && !is_front_page() || is_paged() ) 
    {
 
        echo '<nav class="breadcrumb">';
 
        global $post;
        $homeLink = get_bloginfo('url');
        echo '<a href="' . $homeLink . '">' . $home . '</a> ' . $delimiter . ' ';

        if ( is_category()) 
        {
            global $wp_query;
            $cat_obj = $wp_query->get_queried_object();
            $thisCat = $cat_obj->term_id;
            $thisCat = get_category($thisCat);
            $parentCat = get_category($thisCat->parent);
            if ($thisCat->parent != 0) echo(get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
            echo $before . single_cat_title('', false) . $after;

        } 
        elseif ( is_day() ) 
        {
            echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
            echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
            echo $before . get_the_time('d') . $after;

        } 
        elseif ( is_month() ) 
        {
            echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
            echo $before . get_the_time('F') . $after;

        } 
        elseif ( is_year() ) 
        {
            echo $before . get_the_time('Y') . $after;

        } 
        elseif ( is_single() && !is_attachment() ) 
        {
            if ( get_post_type() != 'post' ) 
            {
                $post_type = get_post_type_object(get_post_type());
                $slug = $post_type->rewrite;
                echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a> ' . $delimiter . ' ';
                echo $before . get_the_title() . $after;
            } 
            else 
            {
                $cat = get_the_category(); $cat = $cat[0];
                echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
                echo $before . get_the_title() . $after;
            }

        } 
        elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) 
        {
            $post_type = get_post_type_object(get_post_type());
            echo $before . $post_type->labels->singular_name . $after;
            
        } 
        elseif ( is_attachment() ) 
        {
            $parent = get_post($post->post_parent);
            $cat = get_the_category($parent->ID); $cat = $cat[0];
            echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
            echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a> ' . $delimiter . ' ';
            echo $before . get_the_title() . $after;

        } 
        elseif ( is_page() && !$post->post_parent ) 
        {
            echo $before . get_the_title() . $after;

        } 
        elseif ( is_page() && $post->post_parent ) 
        {
            $parent_id = $post->post_parent;
            $breadcrumbs = array();
            while ($parent_id) 
            {
                $page = get_page($parent_id);
                $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
                $parent_id = $page->post_parent;
            }
            $breadcrumbs = array_reverse($breadcrumbs);
            foreach ($breadcrumbs as $crumb) echo $crumb . ' ' . $delimiter . ' ';
            echo $before . get_the_title() . $after;

        } 
        elseif ( is_search() ) 
        {
            echo $before . 'Ergebnisse für Ihre Suche nach "' . get_search_query() . '"' . $after;

        } 
        elseif ( is_tag() ) 
        {
            echo $before . 'Beiträge mit dem Schlagwort "' . single_tag_title('', false) . '"' . $after;

        } 
        elseif ( is_tag() ) 
        {
            echo $before . 'Beiträge mit dem Schlagwort "' . single_tag_title('', false) . '"' . $after;

        } 
        elseif ( is_404() ) 
        {
            echo $before . 'Fehler 404' . $after;
        }

        if ( get_query_var('paged') ) 
        {
            if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
            echo ': ' . __('Seite') . ' ' . get_query_var('paged');
            if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
        }

        echo '</nav>';
    } 
} 

?>

