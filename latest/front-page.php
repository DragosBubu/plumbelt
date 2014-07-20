	<?php
	/*
	* 	The template for displaying Front Page.
	*
	* 	@package ThemeIsle
	*/
	get_header();

	get_template_part( 'includes/subheader' );

	if ( !dynamic_sidebar() ) {
		$content_style = 'style="position: relative";';
	}
	?>
	<section class="content" <?php echo $content_style; ?>>
		<div class="container">

			<div class="three-cols-content">
				<div class="col">
					<?php
					if ( get_theme_mod( 'ti_frontpage_boxone_title' ) ) {
						echo '<h3>'. get_theme_mod( 'ti_frontpage_boxone_title' ) .'</h3>';
					}

					if ( get_theme_mod( 'ti_frontpage_boxone_content' ) ) {
						echo '<p>'. get_theme_mod( 'ti_frontpage_boxone_content' ) .'</p>';
					} else {
						echo '<p>'. __( 'Go to Appearance - Customize, to add content.', 'ti' ) .'</p>';
					}
					?>
				</div><!--/.col-->
				<div class="col">
					<?php
					if ( get_theme_mod( 'ti_frontpage_boxtwo_title' ) ) {
						echo '<h3>'. get_theme_mod( 'ti_frontpage_boxtwo_title' ) .'</h3>';
					}

					if ( get_theme_mod( 'ti_frontpage_boxtwo_content' ) ) {
						echo '<p>'. get_theme_mod( 'ti_frontpage_boxtwo_content' ) .'</p>';
					} else {
						echo '<p>'. __( 'Go to Appearance - Customize, to add content.', 'ti' ) .'</p>';
					}
					?>
				</div><!--/.col-->
				<div class="col">
					<?php
					if ( get_theme_mod( 'ti_frontpage_boxthree_title' ) ) {
						echo '<h3>'. get_theme_mod( 'ti_frontpage_boxthree_title' ) .'</h3>';
					}

					if ( get_theme_mod( 'ti_frontpage_boxthree_content' ) ) {
						echo '<p>'. get_theme_mod( 'ti_frontpage_boxthree_content' ) .'</p>';
					} else {
						echo '<p>'. __( 'Go to Appearance - Customize, to add content.', 'ti' ) .'</p>';
					}
					?>
				</div><!--/.col-->
			</div><!--/.three-cols-content-->

			<hr class="separator" />

			<article class="big">
				<?php
				if ( get_theme_mod( 'ti_frontpage_article_image' ) ) {
					echo '<img src="'. get_theme_mod( 'ti_frontpage_article_image' ) .'" alt="" title="" />';
				} else {
					echo '<img src="'. get_template_directory_uri() .'/upload/article-1.jpg" alt="" title="">';
				}

				if ( get_theme_mod( 'ti_frontpage_article_title' ) ) {
					echo '<h2>'. get_theme_mod( 'ti_frontpage_article_title' ) .'</h2>';
				} else {
					echo '<h2>'. __( 'About our services', 'ti' ) .'</h2>';
				}

				if ( get_theme_mod( 'ti_frontpage_article_content' ) ) {
					echo get_theme_mod( 'ti_frontpage_article_content' );
				} else { ?>
					<p><?php _e( 'Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit.', 'ti' ); ?></p>
					<p><?php _e( 'Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris vitae erat consequat auctor eu in elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris in erat justo. Nullam ac urna eu felis dapibus condimentum sit amet a augue.', 'ti' ); ?></p>
					<p><?php _e( 'Sed non neque elit. Sed ut imperdiet nisi. Proin condimentum fermentum nunc. Etiam pharetra, erat sed fermentum feugiat, velit mauris egestas quam, ut aliquam massa nisl quis neque. Suspendisse in orci enim.', 'ti' ); ?></p>
					<p><?php _e( 'Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris vitae erat consequat auctor eu in elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris in erat justo. Nullam ac urna eu felis dapibus condimentum sit amet a augue. Sed non neque elit. Sed ut imperdiet nisi. Proin condimentum fermentum nunc. Etiam pharetra, erat sed fermentum feugiat, velit mauris egestas quam, ut aliquam massa nisl quis neque. Suspendisse in orci enim.', 'ti' ); ?></p>
				<?php }
				?>
				<span class="clear"></span>
			</article><!--/.big-->

			<hr class="separator" />

			<div id="testimonials" class="cf">
				<?php
				if ( get_theme_mod( 'ti_frontpage_testimonials_title' ) ) {
					echo '<h2>'. get_theme_mod( 'ti_frontpage_testimonials_title' ) .'</h2>';
				} else {
					echo '<h2>'. __( 'What our customers says', 'ti' ) .'</h2>';
				}
				?>

				<div class="testimonial-container">

					<?php

					$args = array (
						'post_type'              => 'testimonials',
						'posts_per_page'         => '4',
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
				</div><!--/.testimonial-container-->

			</div><!--/#testimonials-->

		</div><!--/.container-->
	</section><!--/.content-->
	<?php get_footer(); ?>