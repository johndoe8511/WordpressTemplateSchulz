<?php

add_theme_support( 'post-thumbnails' );

// To get the thumbnail in your post, you add the following inside the loop:
if ( has_post_thumbnail() ) 
{
    set_post_thumbnail_size( 400, 150 ); # width, height #
    the_post_thumbnail();
}


// Register Custom Navigation Walker
require_once('include/nav_walker/wp_bootstrap_navwalker.php');

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
function getChildNavigationSideMenu()
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
       
        createHTMLPageSideMenuChildNavigaion($currentPageChildrenArray);

        // echo what we get back from WP to the browser
        //echo '<pre>' . print_r( $currentPageChildrenArray, true ) . '</pre>';
        
    }
}
//sidemenü
/**
 * get same page html sidemenü navigation
 */
function getNavigationSideMenu()
{
    if(is_page())
    {
        global $post;
        
        $args = array(
            'sort_order' => 'asc',
            'sort_column' => 'post_title',
            'parent' => $post->post_parent,
            'post_type' => 'page',
            'post_status' => 'publish'
        ); 
   
        $currentPageChildrenArray = get_pages($args); 

        createHTMLPageSideMenuNavigaion($currentPageChildrenArray);

        // echo what we get back from WP to the browser
        //echo '<pre>' . print_r( $currentPageChildrenArray, true ) . '</pre>';
        
    }
}
/**
 * create sidbar navigation HTML div element
 * @global type $post
 * @param type $pageChildrenArray
 */
function createHTMLPageSideMenuNavigaion($pageChildrenArray)
{
    global $post;
    if(!empty($pageChildrenArray))
    {
        ?>
            <div class="list-group">
                <a href="#" class="list-group-item sidebarHead">Module</a>
        <?php
        
        foreach ($pageChildrenArray as $child) 
        {
            if($child->post_parent == $post->post_parent)
            { ?>
                <a href="<?php echo get_permalink($child); ?>" class="list-group-item <?php echo ($child->ID == $post->ID ? "sidebarHighlightFocus": "" ); ?>"><?php echo $child->post_title?></a>
            <?php }
        }
        ?>
            </div>
        <?php
    }
}

/**
 * create sidbar navigation HTML div element
 * @global type $post
 * @param type $pageChildrenArray
 */
function createHTMLPageSideMenuChildNavigaion($pageChildrenArray)
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
}
/**
 * get wordpress breadcrumps
 * @global type $post
 * @global type $wp_query
 */
function nav_breadcrumb() 
{
    
    $delimiter = '&raquo;';
    $home = 'Start'; 
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

/**
 * check post parrents by post title name, recursive function call
 * @param type $postParentId parrent id of wordpress post
 * @param type $comparedPostName compared parent posts title name
 * @return boolean true/false
 */
function checkPostParrentsByPostTitle($postParentId, $comparedPostName = '' )
{
    $parentPost = array();
    if(!empty($postParentId))
    {
        $parentPost = get_post($postParentId);
    }
    
    if(!empty($parentPost))
    {
        //compare post title
        if($parentPost->post_title == $comparedPostName)
        {
            return true;
        }
        //recursive function call
        if(checkPostParrentsByPostTitle($parentPost->post_parent,$comparedPostName))
        {
            return true;
        }
    }
   
   return false;
}

/**
 * set dropdown navi link button to active background color when child post 
 * which listed in dropdown is viewed by user
 * @param string $comparedPostName
 */
function setBackgroundColorDropDownButton($comparedPostName = '')
{ 
    global $post;
    if(checkPostParrentsByPostTitle($post->post_parent, $comparedPostName))
    {
        ?>
            <script type="text/javascript">
                $('#NavLink_<?php echo $comparedPostName;?>').css({"background-color":"#23527c"});
            </script>
        <?php
    }
}

/**********************************************************************************
 * ********************************************************************************
 * ********************************************************************************
 * PostType: Link
 * ********************************************************************************
 * ********************************************************************************
 *********************************************************************************/

function cpt_links() 
{
    $labels = array
    (
        'name'                  => _x('Links','post type general name'),
        'singular_name'         => _x('Link','post type singular name'),
        'menu_name'             => 'Links',
        'name_admin_bar'        => 'Alle Links',
        'add_new'               => _x('Hinzufügen','Links'),
        'add_new_item'          => __('Neuen Link hinzufügen'),
        'edit_item'             => __('Link bearbeiten'),
        'new_item'              => __('Neuer Link'),
        'view_item'             => __('Link ansehen'),
        'search_items'          => __('Nach Link suchen'),
        'not_found'             => __('Kein Link gefunden'),
        'not_fount_in_trash'    => __('Neuen Link im Papierkorb'),
        'parrent_item_colon'    => ''
    );
    $supports = array( 'title'
                        //,'editor'
                        //,'author'
                        ,'thumbnail'
                        ,'post-thumbnails'
                        //,'excerpt' 
                        //,'trackbacks'
                        //,'custom-fields'
                        //,'comments' 
                        ,'revisions'
                        ,'page-attributes');
    $args = array(
     'lable'               => 'Alle Links',
     'labels'              => $labels,
     'public'              => true,
     'exclude_from_search' => true,
     'publicly_queryable'  => true,
     'show_ui'             => true,
     'show_in_nav_menus'   => true,
     'show_in_menu'        => true,
     'show_in_admin_bar'   => true,
     '_builtin'            => false,
     'menu_position'       => 20,
     'menu_icon'           => 'dashicons-admin-appearance',
     'capability_type'     => 'post',
     'hierarchical'        => false,
     'supports'            => $supports,
     'has_archive'         => true,
     'rewrite'             => array( 'slug' => 'links' ),
     'query_var'           => true,
        
         'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'has_archive' => true, 
    'hierarchical' => false,
    'menu_position' => null,
     ); 
    register_post_type( 'links', $args );
    // flush_rewrite_rules();
}

add_action( 'init', 'cpt_links', 0 );

add_action( 'admin_init', 'cpt_links_meta_boxen');
add_action( 'save_post', 'cpt_links_daten_speichern');

function cpt_links_meta_boxen()
{
    add_meta_box("url-meta", "URL", "cpt_links_feld_url","links","normal","high");
    add_meta_box("kurzbeschreibung-meta", "Kurzbeschreibung (max. 100 Zeichen)", "cpt_links_feld_kurzbeschreibung","links","normal","high");
    add_meta_box("email-meta", "E-Mail", "cpt_links_feld_email","links","normal","high");    
}


function cpt_links_feld_url()
{
    global $post;
    $custom = get_post_custom($post->ID);
    $url = $custom["url"][0];
    echo '<input name="url" value="'.$url.'"/>';
}
function cpt_links_feld_email()
{
    global $post;
    $custom = get_post_custom($post->ID);
    $email = $custom["email"][0];
    echo '<input name="email" value="'.$email.'"/>';
}

function cpt_links_feld_kurzbeschreibung()
{
    global $post;
    $custom = get_post_custom($post->ID);
    $kurzbeschreibung = $custom["kurzbeschreibung"][0];
    echo '<textarea maxlength="100" name="kurzbeschreibung">'.$kurzbeschreibung.'</textarea>';
}

function cpt_links_daten_speichern()
{
    global $post;
    update_post_meta($post->ID, "url", $_POST['url']);
    update_post_meta($post->ID, "email", $_POST['email']);
    update_post_meta($post->ID, "kurzbeschreibung", $_POST['kurzbeschreibung']);
}

// ADD NEW COLUMN
function cpt_links_columns_head($columns) 
{
     $columns = array(
                        "cb" => "<inpput type\"checkbox\" />",
                        "title" => "Titel",
                        "kurzbeschreibung" => "Kurzbeschreibung",
                        "url" => "URL",
                        "email" => "E-Mail",
                        "image" => __('Featured Image'),
                        "author" => "Author",
                        "date" => "Datum",
    );
    return $columns;
}
 
// SHOW THE FEATURED IMAGE
function cpt_links_columns_content($column_name, $post_ID) {
    global $post;
    switch($column_name)
    {
        case 'image':
            $post_thumbnail_id = get_post_thumbnail_id($post_ID);
            if ($post_thumbnail_id) 
            {
              $post_thumbnail_img = wp_get_attachment_image_src( $post_thumbnail_id, 'thumbnail' );
              echo '<img width="180" src="' . $post_thumbnail_img[0] . '" />';
            }
            break;
        case 'kurzbeschreibung':
            $custom = get_post_custom();
            echo $custom['kurzbeschreibung'][0];
            break;
        case 'url':
            $custom = get_post_custom();
            echo $custom['url'][0];
            break;
        case 'email':
            $custom = get_post_custom();
            echo $custom['email'][0];
            break;
    }
   
}
add_filter('manage_links_posts_columns', 'cpt_links_columns_head');
add_action('manage_links_posts_custom_column', 'cpt_links_columns_content', 10, 2);


/**********************************************************************************
 * ********************************************************************************
 * ********************************************************************************
 * PostType: Firmen Referenz
 * ********************************************************************************
 * ********************************************************************************
 *********************************************************************************/

function cpt_firmenReferenz() 
{
    $labels = array
    (
        'name'                  => _x('Firmen Referenzen','post type general name'),
        'singular_name'         => _x('Firmen Referenz','post type singular name'),
        'menu_name'             => 'Firmen Referenz',
        'name_admin_bar'        => 'Alle Firmen Referenzen',
        'add_new'               => _x('Hinzufügen','Links'),
        'add_new_item'          => __('Neue Firmen Referenz hinzufügen'),
        'edit_item'             => __('Firmen Referenz bearbeiten'),
        'new_item'              => __('Neue Firmen Referenz'),
        'view_item'             => __('Firmen Referenz ansehen'),
        'search_items'          => __('Nach Firmen Referenz suchen'),
        'not_found'             => __('Kein Firmen Referenz gefunden'),
        'not_fount_in_trash'    => __('Neue Firmen Referenz im Papierkorb'),
        'parrent_item_colon'    => ''
    );
    $supports = array( 'title'
                        //,'editor'
                        //,'author'
                        ,'thumbnail'
                        ,'post-thumbnails'
                        //,'excerpt' 
                        //,'trackbacks'
                        //,'custom-fields'
                        //,'comments' 
                        ,'revisions'
                        ,'page-attributes');
    $args = array(
     'lable'               => 'Alle Firmen Referenzen',
     'labels'              => $labels,
     'public'              => true,
     'exclude_from_search' => true,
     'publicly_queryable'  => true,
     'show_ui'             => true,
     'show_in_nav_menus'   => true,
     'show_in_menu'        => true,
     'show_in_admin_bar'   => true,
     '_builtin'            => false,
     'menu_position'       => 20,
     'menu_icon'           => 'dashicons-admin-appearance',
     'capability_type'     => 'post',
     'hierarchical'        => false,
     'supports'            => $supports,
     'has_archive'         => true,
     'rewrite'             => array( 'slug' => 'firmenreferenz' ),
     'query_var'           => true,
        
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'has_archive' => true, 
    'hierarchical' => false,
    'menu_position' => null,
     ); 
    register_post_type( 'firmenReferenz', $args );
    // flush_rewrite_rules();
}

add_action( 'init', 'cpt_firmenReferenz', 0 );

add_action( 'admin_init', 'cpt_firmenReferenz_meta_boxen');
add_action( 'save_post', 'cpt_firmenReferenz_daten_speichern');

function cpt_firmenReferenz_meta_boxen()
{
    add_meta_box("url-meta", "URL", "cpt_firmenReferenz_feld_url","firmenReferenz","normal","high");
    add_meta_box("kurzbeschreibung-meta", "Kurzbeschreibung (max. 100 Zeichen)", "cpt_firmenReferenz_feld_kurzbeschreibung","firmenReferenz","normal","high");
    add_meta_box("email-meta", "E-Mail", "cpt_firmenReferenz_feld_email","firmenReferenz","normal","high");    
}


function cpt_firmenReferenz_feld_url()
{
    global $post;
    $custom = get_post_custom($post->ID);
    $url = $custom["url"][0];
    echo '<input name="url" value="'.$url.'"/>';
}
function cpt_firmenReferenz_feld_email()
{
    global $post;
    $custom = get_post_custom($post->ID);
    $email = $custom["email"][0];
    echo '<input name="email" value="'.$email.'"/>';
}

function cpt_firmenReferenz_feld_kurzbeschreibung()
{
    global $post;
    $custom = get_post_custom($post->ID);
    $kurzbeschreibung = $custom["kurzbeschreibung"][0];
    echo '<textarea maxlength="100" name="kurzbeschreibung">'.$kurzbeschreibung.'</textarea>';
}

function cpt_firmenReferenz_daten_speichern()
{
    global $post;
    update_post_meta($post->ID, "url", $_POST['url']);
    update_post_meta($post->ID, "email", $_POST['email']);
    update_post_meta($post->ID, "kurzbeschreibung", $_POST['kurzbeschreibung']);
}

// ADD NEW COLUMN
function cpt_firmenReferenz_columns_head($columns) 
{
     $columns = array(
                        "cb" => "<inpput type\"checkbox\" />",
                        "title" => "Titel",
                        "kurzbeschreibung" => "Kurzbeschreibung",
                        "url" => "URL",
                        "email" => "E-Mail",
                        "image" => __('Featured Image'),
                        "author" => "Author",
                        "date" => "Datum",
    );
    return $columns;
}
 
// SHOW THE FEATURED IMAGE
function cpt_firmenReferenz_columns_content($column_name, $post_ID) {
    global $post;
    switch($column_name)
    {
        case 'image':
            $post_thumbnail_id = get_post_thumbnail_id($post_ID);
            if ($post_thumbnail_id) 
            {
              $post_thumbnail_img = wp_get_attachment_image_src( $post_thumbnail_id, 'thumbnail' );
              echo '<img width="180" src="' . $post_thumbnail_img[0] . '" />';
            }
            break;
        case 'kurzbeschreibung':
            $custom = get_post_custom();
            echo $custom['kurzbeschreibung'][0];
            break;
        case 'url':
            $custom = get_post_custom();
            echo $custom['url'][0];
            break;
        case 'email':
            $custom = get_post_custom();
            echo $custom['email'][0];
            break;
    }
   
}
add_filter('manage_firmenreferenz_posts_columns', 'cpt_firmenReferenz_columns_head');
add_action('manage_firmenreferenz_posts_custom_column', 'cpt_firmenReferenz_columns_content', 10, 2);


/**********************************************************************************
 * ********************************************************************************
 * ********************************************************************************
 * PostType: Dokument Referenz
 * ********************************************************************************
 * ********************************************************************************
 *********************************************************************************/

function cpt_dokumentReferenz() 
{
    $labels = array
    (
        'name'                  => _x('Dokument Referenzen','post type general name'),
        'singular_name'         => _x('Dokument Referenz','post type singular name'),
        'menu_name'             => 'Dokument Referenz',
        'name_admin_bar'        => 'Alle Dokument Referenzen',
        'add_new'               => _x('Hinzufügen','Links'),
        'add_new_item'          => __('Neue Dokument Referenz hinzufügen'),
        'edit_item'             => __('Dokument Referenz bearbeiten'),
        'new_item'              => __('Neue Dokument Referenz'),
        'view_item'             => __('Dokument Referenz ansehen'),
        'search_items'          => __('Nach Dokument Referenz suchen'),
        'not_found'             => __('Keine Dokument Referenz gefunden'),
        'not_fount_in_trash'    => __('Neue Dokument Referenz im Papierkorb'),
        'parrent_item_colon'    => ''
    );
    $supports = array( 'title'
                        //,'editor'
                        //,'author'
                        ,'thumbnail'
                        ,'post-thumbnails'
                        //,'excerpt' 
                        //,'trackbacks'
                        //,'custom-fields'
                        //,'comments' 
                        ,'revisions'
                        ,'page-attributes');
    $args = array(
     'lable'               => 'Alle Dokument Referenzen',
     'labels'              => $labels,
     'public'              => true,
     'exclude_from_search' => true,
     'publicly_queryable'  => true,
     'show_ui'             => true,
     'show_in_nav_menus'   => true,
     'show_in_menu'        => true,
     'show_in_admin_bar'   => true,
     '_builtin'            => false,
     'menu_position'       => 20,
     'menu_icon'           => 'dashicons-admin-appearance',
     'capability_type'     => 'post',
     'hierarchical'        => false,
     'supports'            => $supports,
     'has_archive'         => true,
     'rewrite'             => array( 'slug' => 'dokumentReferenz' ),
     'query_var'           => true,
        
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'has_archive' => true, 
    'hierarchical' => false,
    'menu_position' => null,
     ); 
    register_post_type( 'dokumentReferenz', $args );
    // flush_rewrite_rules();
}

add_action( 'init', 'cpt_dokumentReferenz', 0 );

add_action( 'admin_init', 'cpt_dokumentReferenz_meta_boxen');
add_action( 'save_post', 'cpt_dokumentReferenz_daten_speichern');

function cpt_dokumentReferenz_meta_boxen()
{
   add_meta_box("kurzbeschreibung-meta", "Kurzbeschreibung (max. 120 Zeichen)", "cpt_dokumentReferenz_feld_kurzbeschreibung","dokumentReferenz","normal","high");
}

function cpt_dokumentReferenz_feld_kurzbeschreibung()
{
    global $post;
    $custom = get_post_custom($post->ID);
    $kurzbeschreibung = $custom["kurzbeschreibung"][0];
    echo '<textarea maxlength="120" name="kurzbeschreibung">'.$kurzbeschreibung.'</textarea>';
}

function cpt_dokumentReferenz_daten_speichern()
{
    global $post;
    update_post_meta($post->ID, "kurzbeschreibung", $_POST['kurzbeschreibung']);
}

// ADD NEW COLUMN
function cpt_dokumentReferenz_columns_head($columns) 
{
     $columns = array(
                        "cb" => "<inpput type\"checkbox\" />",
                        "title" => "Titel",
                        "kurzbeschreibung" => "Kurzbeschreibung",
                        "image" => __('Featured Image'),
                        "author" => "Author",
                        "date" => "Datum",
    );
    return $columns;
}
 
// SHOW THE FEATURED IMAGE
function cpt_dokumentReferenz_columns_content($column_name, $post_ID) {
    global $post;
    switch($column_name)
    {
        case 'image':
            $post_thumbnail_id = get_post_thumbnail_id($post_ID);
            if ($post_thumbnail_id) 
            {
              $post_thumbnail_img = wp_get_attachment_image_src( $post_thumbnail_id, 'thumbnail' );
              echo '<img width="180" src="' . $post_thumbnail_img[0] . '" />';
            }
            break;
        case 'kurzbeschreibung':
            $custom = get_post_custom();
            echo $custom['kurzbeschreibung'][0];
            break;
    }
   
}
add_filter('manage_dokumentreferenz_posts_columns', 'cpt_dokumentReferenz_columns_head');
add_action('manage_dokumentreferenz_posts_custom_column', 'cpt_dokumentReferenz_columns_content', 10, 2);


/**********************************************************************************
 * ********************************************************************************
 * ********************************************************************************
 * PostType: Beruflicher Werdegang
 * ********************************************************************************
 * ********************************************************************************
 *********************************************************************************/

function cpt_beruflicherWerdegang() 
{
    $labels = array
    (
        'name'                  => _x('Beruflicher Werdegang','post type general name'),
        'singular_name'         => _x('Beruflicher Werdegang','post type singular name'),
        'menu_name'             => 'Beruflicher Werdegang',
        'name_admin_bar'        => 'Alle Daten des Beruflicher Werdegangs',
        'add_new'               => _x('Hinzufügen','Links'),
        'add_new_item'          => __('Neuer Beruflicher Werdegang hinzufügen'),
        'edit_item'             => __('Beruflicher Werdegang bearbeiten'),
        'new_item'              => __('Neuer Beruflicher Werdegang'),
        'view_item'             => __('Beruflicher Werdegang ansehen'),
        'search_items'          => __('Nach Beruflicher Werdegang suchen'),
        'not_found'             => __('Keine Beruflicher Werdegang gefunden'),
        'not_fount_in_trash'    => __('Neuer Beruflicher Werdegang im Papierkorb'),
        'parrent_item_colon'    => ''
    );
    $supports = array( 'title'
                        ,'editor'
                        //,'author'
                        //,'thumbnail'
                        //,'post-thumbnails'
                        //,'excerpt' 
                        //,'trackbacks'
                        //,'custom-fields'
                        //,'comments' 
                        ,'revisions'
                        ,'page-attributes');
    $args = array(
     'lable'               => 'Alle Daten des Beruflicher Werdegangs',
     'labels'              => $labels,
     'public'              => true,
     'exclude_from_search' => true,
     'publicly_queryable'  => true,
     'show_ui'             => true,
     'show_in_nav_menus'   => true,
     'show_in_menu'        => true,
     'show_in_admin_bar'   => true,
     '_builtin'            => false,
     'menu_position'       => 20,
     'menu_icon'           => 'dashicons-admin-appearance',
     'capability_type'     => 'post',
     'hierarchical'        => false,
     'supports'            => $supports,
     'has_archive'         => true,
     'rewrite'             => array( 'slug' => 'beruflicherWerdegang' ),
     'query_var'           => true,
        
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'has_archive' => true, 
    'hierarchical' => false,
    'menu_position' => null,
     ); 
    register_post_type( 'beruflicherWerdegang', $args );
    // flush_rewrite_rules();
}

add_action( 'init', 'cpt_beruflicherWerdegang', 0 );

// ADD NEW COLUMN
function cpt_beruflicherWerdegang_columns_head($columns) 
{
     $columns = array(
                        "cb" => "<inpput type\"checkbox\" />",
                        "title" => "Titel",
                        "author" => "Author",
                        "date" => "Datum",
    );
    return $columns;
}
add_filter('manage_beruflicherwerdegang_posts_columns', 'cpt_beruflicherWerdegang_columns_head');

/**
 * Kommentar Menupunkt im admin Bereich entfernen
 */
add_action( 'admin_menu', 'remove_admin_menus' );
function remove_admin_menus() 
{
    remove_menu_page( 'edit-comments.php' );
}

function testoo()
{
    return '#FFEF72';
}
?>
