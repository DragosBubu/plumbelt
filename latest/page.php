	<?php
	/*
	* 	The template for displaying Page.
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
				if ( have_posts() ) {
					while ( have_posts() ) {
						the_post(); ?>

						<article>
							<?php the_content(); ?>
							<?php
								wp_link_pages( array(
									'before'      => '<div class="post-links"><span class="post-links-title">' . __( 'Pages:', 'ti' ) . '</span>',
									'after'       => '</div>',
									'link_before' => '<span>',
									'link_after'  => '</span>',
								) );
							?>
							<?php comments_template(); ?>
						</article>

						<?php }
				} else {
					echo '<p>No posts found.</p>';
				}
				?>
			</div><!--/.main-wrapper-->

			<?php get_sidebar(); ?>

			<div class="clear"></div>
		</div><!--/.container-->
	</section><!--/.content-->
	<?php get_footer(); ?>