<?php
/*
* 	The template for displaying Page Testimonials.
*
* 	@package ThemeIsle
*
*	Template Name: Testimonials
*/
get_header();
?>
<section class="content">
	<div class="container">

		<div id="testimonials" class="cf">
				<h2><?php the_title(); ?></h2>

				<?php

				$args = array (
					'post_type'              => 'testimonials',
					'posts_per_page'         => '16',
				);

				$wp_query = new WP_Query( $args );

				if ( $wp_query->have_posts() ) {
					while ( $wp_query->have_posts() ) {
						$wp_query->the_post();
						$featured_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>

						<div class="testimonial">
							<?php
							if ( $featured_image ) { ?>
								<div class="img" style="background-image: url('<?php echo $featured_image[0]; ?>')"></div>
							<?php }
							?>
							<h4><?php the_title(); ?></h4>
							<div class="testimonial-content">
								<?php echo excerpt_limit_length(get_the_excerpt(), '25'); ?>
							</div><!--/.testimonial-content-->
						</div><!--/.testimonial-->

					<?php }
				} else {
					echo __( 'No posts found', 'ti' );
				}

				wp_reset_postdata();
				?>

			</div><!--/#testimonials-->

	</div><!--/.container-->
</section><!--/.content-->
<?php get_footer(); ?>