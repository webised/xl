<?php
/**
 * Template Name: One Page
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

get_header();

$menu_items = wp_get_nav_menu_items('top-menu');

if ($menu_items) {
    $page_id = array();
    foreach ($menu_items as $menu_item) {
        $page_id[] = $menu_item->object_id;
    }

    global $wp_query;
    $wp_query = new WP_Query(array('post_type' => 'page', 'post__in' => $page_id, 'orderby' => array('menu_order' => 'DESC')));

    if ($wp_query->have_posts()) {

        while ($wp_query->have_posts()) {
            ?>
          <section id="section-<?php the_ID(); ?>">
              <?php
              $wp_query->the_post();
              get_template_part('template-parts/content/content', 'page');
              ?>
          </section>
            <?php
        }

        /* Restore original Post Data */
        wp_reset_postdata();
    }
};
get_footer();