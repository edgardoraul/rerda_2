<?php
/**
 * Template Name: CartPage
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
?>

<?php while ( have_posts() ) : the_post(); ?>
    <?php get_template_part( 'loop-templates/content', 'cart' ); ?> 
<?php endwhile; // end of the loop. ?>

<?php
get_footer();
