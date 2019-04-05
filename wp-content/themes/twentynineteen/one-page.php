<?php
/**
 * Template Name: One Page
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

get_header();
?>
    <section id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		if ( have_posts() ) {

			// Load posts loop.
			while ( have_posts() ) {
				the_post();
				get_template_part( 'template-parts/content/content' );
			}

			// Previous/next page navigation.
			twentynineteen_the_posts_navigation();

		} else {

			// If no content, include the "No posts found" template.
			get_template_part( 'template-parts/content/content', 'none' );

		}
		?>

		</main><!-- .site-main -->
	</section><!-- .content-area -->
<?php	
$menu_items = wp_get_nav_menu_items('top-menu');

if ($menu_items) {
    $page_id = array();
    foreach ($menu_items as $menu_item) {
        $page_id[] = $menu_item->object_id;
    }
 
    global $wp_query;
    $wp_query = new WP_Query(array('post_type' => 'page', 'post__in' => $page_id, 'orderby' => array('menu_order' => 'DESC')));

    if ($wp_query->have_posts()) {
        $i = 1;
        while ($wp_query->have_posts()) {
			$wp_query->the_post();
		    $title = get_the_title();
            ?>
          <section id="<?php echo sanitize_title($title); ?>">
              <?php
              
              if( get_the_ID() == 11 ) {
				  get_template_part( 'template-parts/content/content-img' );
				} else {
				  get_template_part( 'template-parts/content/content' );
				}	
              ?>
          </section>
            <?php
			$i++;
        }

        /* Restore original Post Data */
        wp_reset_postdata();
    }
};
get_footer();