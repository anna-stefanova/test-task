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

		<div class="entry-meta">

			<?php understrap_posted_on(); ?>

		</div><!-- .entry-meta -->

	</header><!-- .entry-header -->

	<?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>

	<div class="entry-content">

        <div class="row">
            <div class="col-12">
	            <?php
	            the_content();
	            understrap_link_pages();
	            ?>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <h3>Характеристики объекта недвижимости</h3>
                <ul>
		            <?php if( get_field('square') ):?><li>Площадь: <?php the_field('square');?> м2</li><?php endif;?>
		            <?php if( get_field('price') ):?><li>Стоимость: <?php the_field('price');?> руб</li><?php endif;?>
		            <?php if( get_field('address') ):?><li>Адрес: <?php the_field('address');?></li><?php endif;?>
		            <?php if( get_field('living_area') ):?><li>Жилая площадь: <?php the_field('living_area');?> м2</li><?php endif;?>
		            <?php if( get_field('floor') ):?><li>Этаж: <?php the_field('floor');?></li><?php endif;?>

                </ul>
            </div>
        </div>

	</div><!-- .entry-content -->

	<footer class="entry-footer">

		<?php understrap_entry_footer(); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
