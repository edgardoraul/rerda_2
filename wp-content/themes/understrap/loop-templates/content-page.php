<?php
/**
 * Partial template for content in page.php
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">


<section id="cat-head" style="background-image: url('<?php echo get_home_url(); ?>/wp-content/uploads/2021/05/Componente-1-–-1.jpg')">
    <div class="container">
        <div class="row">
            <div class="col-1 empty"></div>
            <div class="col-10">
                <?php if (is_tax()): ?>
                    <h1><?php single_term_title(); ?></h1>
                <?php else: ?>
                    <h1><?php echo get_the_title(); ?></h1>
                <?php endif; ?>
            </div>
            <div class="col-1 empty"></div>
        </div>
    </div>
</section>

	<div class="entry-content">

		<?php the_content(); ?>

		<?php
		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
				'after'  => '</div>',
			)
		);
		?>

	</div><!-- .entry-content -->

</article><!-- #post-## -->
