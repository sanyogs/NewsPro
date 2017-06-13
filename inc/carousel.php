<?php
/**
 * Carousel template
 *
 * @package newspro
 */

	/*Scripts*/
	function newspro_carousel_scripts() {
		wp_enqueue_script( 'newspro-owl-script', get_template_directory_uri() .  '/assets/js/owl.carousel.min.js', array( 'jquery' ), true );			
	}
	add_action( 'wp_enqueue_scripts', 'newspro_carousel_scripts' );

	/*Template*/
	if ( ! function_exists( 'newspro_carousel' ) ) {
		function newspro_carousel() {
		    if ( ( get_theme_mod('carousel_display_front', '1') && is_front_page() ) || ( get_theme_mod('carousel_display_archives', '1') && ( is_home() || is_archive() ) ) || ( ( get_theme_mod('carousel_display_singular') && is_singular() ) ) ) {

		       	/*Get the user choices*/
		        $number     = get_theme_mod('carousel_number');
		        $cat        = get_theme_mod('carousel_cat');
		        $speed 		= get_theme_mod('carousel_speed');
		        $number     = ( ! empty( $number ) ) ? intval( $number ) : 6;
		        $cat        = ( ! empty( $cat ) ) ? intval( $cat ) : '';
		        $speed 		= ( ! empty( $speed ) ) ? absint( $speed ) : '4000';

				$args = array(
					'posts_per_page'		=> $number,
					'post_status'   		=> 'publish',
		            'cat'                   => $cat,
		            'ignore_sticky_posts'   => true			
				);
				$query = new WP_Query( $args );	
				if ( $query->have_posts() ) {
				?>
				<div class="roll-posts-carousel12 catwrapslider col-md-12" data-items="3" data-auto="true" data-speed="<?php echo absint($speed); ?>">
					<div class="owl-carousel12">
						<?php while ( $query->have_posts() ) : $query->the_post(); ?>
						
							    <div class="item slidesection">
							    	<a href="<?php esc_url(get_permalink()); ?>" class="">
									<?php if ( has_post_thumbnail() ) : ?>
										<?php the_post_thumbnail('newspro-carousel-thumb'); ?>
									<?php else : ?>
										<?php echo '<img src="' . get_stylesheet_directory_uri() . '/images/placeholder.png"/>'; ?>
									<?php endif; ?>
									
								    <div class="text-over overlayp">
								    	<?php the_category(); ?>
								    	
										<?php the_title( sprintf( '<h4 class="carousel-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h4>' ); ?>
									
									<div class="sli-date">
	                             		<h5><?php echo get_the_date(); ?></h5>
	                              	</div>			
										
									</div>
									</a>
							    </div>
							


						<?php endwhile; ?>
					</div>
				</div>

				<?php }
				wp_reset_postdata();
			}
		}
	}