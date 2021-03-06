	<?php
	/*
	* 	The template for displaying Page Blog.
	*
	* 	@package ThemeIsle
	*/
	get_header();
	?>
	<section class="content">
		<div class="container">
			<div class="main-wrapper">
				<h1>
					<?php the_title(); ?>
				</h1>

				<?php
				$args = array (
					'post_type'     => 'post',
					'paged' 		=> $paged
				);

				$wp_query = new WP_Query( $args );

				if ( have_posts() ) {
					while ( have_posts() ) {
						the_post();
						$featured_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>

						<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
							<?php
							if ( $featured_image ) { ?>
								<div class="featured-image">
									<img src="<?php echo $featured_image[0]; ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
								</div><!--/.featured-image-->
							<?php }
							?>
							<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
							<span class="posted">
								<?php _e( 'Posted by', 'ti' ); ?> <?php the_author_posts_link(); ?> <?php _e( 'in', 'ti' ); ?> <?php the_category( ', ' ); ?>, <?php _e( 'on', 'ti' ); ?> <?php echo the_time( get_option( 'date_format' ) ); ?>
							</span><!--/.posted-->
							<hr />
							<?php the_excerpt(); ?>
							<div class="buttons">
								<a href="<?php the_permalink(); ?>#comments" title="<?php comments_number( 'No Comments', 'One Comment', '% Comments' ); ?>" class="comments highlighted">
									<?php comments_number( 'No Comments', 'One Comment', '% Comments' ); ?>
								</a><!--/a-->
								<a href="<?php the_permalink(); ?>" class="read-more"><?php _e( 'Read more...', 'ti' ); ?></a>
							</div><!--/.buttons-->
						</article>

						<?php }
				} else {
					echo '<p>No posts found.</p>';
				}
				wp_reset_postdata();
				?>

				<hr />

				<?php
				if (function_exists("pagination")) {
	    			pagination();
				}
				?>
			</div><!--/.main-wrapper-->

			<?php get_sidebar(); ?>

			<div class="clear"></div>
		</div><!--/.container-->
	</section><!--/.content-->
	<?php get_footer(); ?>