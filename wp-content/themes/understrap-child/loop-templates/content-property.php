<?php
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class('col-6'); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header">

		<?php
		the_title(
			sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
			'</a></h2>'
		);
		?>

		<?php if ( 'post' === get_post_type() ) : ?>

			<div class="entry-meta">
				<?php understrap_posted_on(); ?>
			</div><!-- .entry-meta -->

		<?php endif; ?>

	</header><!-- .entry-header -->

	<?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>

	<div class="entry-content">
        <ul>
	        <?php if( get_field('square') ):?><li>Площадь: <?php the_field('square');?> м2</li><?php endif;?>
	        <?php if( get_field('price') ):?><li>Стоимость: <?php the_field('price');?> руб</li><?php endif;?>
	        <?php if( get_field('address') ):?><li>Адрес: <?php the_field('address');?></li><?php endif;?>
	        <?php if( get_field('living_area') ):?><li>Жилая площадь: <?php the_field('living_area');?> м2</li><?php endif;?>
	        <?php if( get_field('floor') ):?><li>Этаж: <?php the_field('floor');?></li><?php endif;?>

        </ul>


		<?php

		understrap_link_pages();
		?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">

		<?php understrap_entry_footer(); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->