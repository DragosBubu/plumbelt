	<section id="featured">
		<div class="container">
			<img id="man" src="<?php echo get_template_directory_uri(); ?>/images/man.png" alt="<?php bloginfo( 'title' ); ?>">
			<div class="three-cols">
				<div class="two-cols frontpage-content">
					<?php
					if ( get_theme_mod( 'ti_subheader_title' ) ) {
						echo '<h2>'. get_theme_mod( 'ti_subheader_title' ) .'</h2>';
					} else {
						echo '<h2>'. __( 'This is a nice headline to get my attention', 'ti' ) .'</h2>';
					}

					if ( get_theme_mod( 'ti_subheader_content' ) ) {
						echo '<p>'. get_theme_mod( 'ti_subheader_content' ) .'</p>';
					} else {
						echo '<p>'. __( 'Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi', 'ti' ) .'</p>';
					}
					?>
				</div>
			</div>
			<?php
			if ( is_front_page() ) {

				if ( get_theme_mod( 'ti_subheader_contact_form_shortcode' ) ) {
					echo '<div class="widget cf">';
					echo do_shortcode( get_theme_mod( 'ti_subheader_contact_form_shortcode' ) );
					echo '</div>';
				}

			}
			?>
		</div><!--/.container-->
	</section><!--/#featured-->