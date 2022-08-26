<?php
/**
 * Single post partial template
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header">

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>


	</header><!-- .entry-header -->



	<div class="entry-content">

		<?php

		$args = array(
			'post_type' => 'property',
			'posts_per_page' => 10,
			'tax_query' => array(
				array(
					'taxonomy' => 'property_city',
					'field'    => 'name',
					'terms'    => get_the_title(),
				),
			),
		);
		$properties = new WP_Query( $args );

		if ($properties->have_posts()){
			while ( $properties->have_posts() ) :?>
            <div class="row">
                <div class="col-12">
                    <?php $properties->the_post();
                    get_template_part( 'loop-templates/content', 'property' );
                    endwhile;
                    wp_reset_postdata();?>

                </div>
            </div>
		<?php
		} else {
			get_template_part( 'loop-templates/content', 'none' );
		}
		?>



	</div><!-- .entry-content -->

	<footer class="entry-footer">

		<?php understrap_entry_footer(); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
