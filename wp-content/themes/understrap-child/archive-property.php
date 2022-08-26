<?php

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );
?>

<?php if ( is_front_page() && is_home() ) : ?>
	<?php get_template_part( 'global-templates/hero' ); ?>
<?php endif; ?>

	<div class="wrapper" id="index-wrapper">

		<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

			<div class="row">


				<main class="site-main" id="main">
                    <section class="section-property">
                        <div class="row">
                            <div class="col-12">
                                <h2>Вся недвижимость</h2>
                            </div>
                        </div>
                        <div class="row">

					<?php
					if ( have_posts() ) {
						// Start the Loop.
						while ( have_posts() ) {
							the_post();

							/*
							 * Include the Post-Format-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
							 */
							get_template_part( 'loop-templates/content', 'property' );
						}
					} else {
						get_template_part( 'loop-templates/content', 'none' );
					}
					?>
                        </div>
                    </section>

				</main><!-- #main -->

				<!-- The pagination component -->
				<?php understrap_pagination(); ?>


			</div><!-- .row -->

		</div><!-- #content -->

	</div><!-- #index-wrapper -->

<?php
get_footer();
