<?php
/*
 * Template Name: Home Page
 *
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );

?>

	<div class="wrapper" id="page-wrapper">

		<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

			<div class="row">

				<!-- Do the left sidebar check -->
				<?php get_template_part( 'global-templates/left-sidebar-check' ); ?>

				<main class="site-main" id="main">
                    <?php
		            the_content();
                    ?>

                    <section class="section-property">
                        <div class="row">
                            <div class="col-12">
                                <h2>Вся недвижимость</h2>
                            </div>
                        </div>
                        <div class="row">
		                    <?php
		                    $args = array(
			                    'post_type' => 'property',
			                    'order' => 'ASC',
			                    'posts_per_page' => 3,
		                    );
		                    $properties = new WP_Query($args);

		                    if ($properties->have_posts()):
			                    while ( $properties->have_posts() ) :
				                    $properties->the_post();
				                    get_template_part( 'loop-templates/content', 'property' );
			                    endwhile;
			                    wp_reset_postdata();

		                    endif;
		                    ?>
                        </div>
                    </section>



                    <section class="section-city">
                        <div class="row">
                            <div class="col-12">
                                <h2>Города</h2>
                            </div>
                        </div>
                        <div class="row">
							<?php
							$args = array(
								'post_type' => 'city',
								'order' => 'ASC',
								'posts_per_page' => 3,
							);
							$cities = new WP_Query($args);

							if ($cities->have_posts()):
								while ( $cities->have_posts() ) :
									$cities->the_post();
									get_template_part( 'loop-templates/content', 'city' );
								endwhile;
								wp_reset_postdata();

							endif;
							?>
                        </div>
                    </section>



				</main><!-- #main -->

				<!-- Do the right sidebar check -->
				<?php get_template_part( 'global-templates/right-sidebar-check' ); ?>

			</div><!-- .row -->

		</div><!-- #content -->

	</div><!-- #page-wrapper -->

<?php
get_footer();