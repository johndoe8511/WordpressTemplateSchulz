<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>
<?php wp_nav_menu( array( 'theme_location' => 'side-navi' ) ); ?>

<h2>Suche</h2>
<p>
<form method="get" id="searchform" action="<?php echo $_SERVER['PHP_SELF']; ?>">
   <input type="text" value="<?php echo wp_specialchars($s, 1); ?>" name="s" id="s" />
   <input type="submit" id="search_submit" value="Suchen" />
</form>
</p>
 
<h2>Kategorien</h2>
<?php
$thisCat = get_category(get_query_var('cat'));
echo '<pre>';
//print_r($thisCat);
echo '</pre>';
if(!empty($thisCat->term_id))
{
    $term_args=array(
      'parent' => $thisCat->term_id,
      'hide_empty' => true,
      'depth' => 3,
      'title_li' => '',
      'show_option_none' => '',
    );
    echo '<pre>';
   // print_r($term_args);
    echo '</pre>';


    $terms = wp_list_categories($term_args);
    if ($terms) {
      foreach( $terms as $term ) {
        echo '<p><a href="' . get_category_link( $term->term_id ) . '" title="' . sprintf( __( "View all posts in %s" ), $term->name ) . '" ' . '>' . $term->name.' ('.$term->count.')</a></p> ';
      }
    }
}
?>
 
<h2>Archiv</h2>
<ul>
   <?php wp_get_archives('type=monthly'); ?>
</ul>
 
<h2>Seiten</h2>
<ul>
   <?php wp_list_pages(); ?>
</ul>
 
<h2>Blogroll</h2>
<ul>
   <?php wp_list_bookmarks(); ?>
</ul>
 
<?php endif; ?>