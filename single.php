	<?php
	/*
	* 	The template for displaying Single.
	*
	* 	@package ThemeIsle
	*/
	get_header();
	?>
	<section class="content">
		<div class="container">
			<div class="main-wrapper">
				<h1>
					<?php _e( 'Our Blog', 'ti' ); ?>
				</h1>

				<?php
				if ( have_posts() ) {
					while ( have_posts() ) {
						the_post();
						$featured_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>

						<article>
							<?php
							if ( $featured_image ) { ?>
								<div class="featured-image">
									<img src="<?php echo $featured_image[0]; ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
								</div><!--/.featured-image-->
							<?php }
							?>
							<h2><?php the_title(); ?></h2>
							<span class="posted">
								<?php _e( 'Posted by', 'ti' ); ?> <?php the_author_posts_link(); ?> <?php _e( 'in', 'ti' ); ?> <?php the_category( ', ' ); ?>, <?php _e( 'on', 'ti' ); ?> <?php echo the_time( get_option( 'date_format' ) ); ?>
							</span><!--/.posted-->
							<hr />
							<?php the_content(); ?>
							<?php
								wp_link_pages( array(
									'before'      => '<div class="post-links"><span class="post-links-title">' . __( 'Pages:', 'ti' ) . '</span>',
									'after'       => '</div>',
									'link_before' => '<span>',
									'link_after'  => '</span>',
								) );
							?>
							<div class="meta-tags">
								<?php the_tags('Tags: ', ', '); ?>
							</div><!--/.meta-tags-->
							<?php comments_template(); ?>
						</article>

						<?php }
				} else {
					echo '<p>No posts found.</p>';
				}
				?>

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