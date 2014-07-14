<?php
/*
* 	The template for displaying Header.
*
* 	@package ThemeIsle
*/
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=devide-width, initial-scale=1.0, maximum-scale=2.0" />
	<title><?php wp_title('|', true, 'right'); bloginfo('name'); ?></title>
	<!--[if lt IE 9]>
		<script src="<?php echo get_template_directory_uri(); ?>/js/html5shiv.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
</head>
<?php
if ( is_front_page() ) {
	$body_class = 'frontpage';
} else {
	$body_class = 'blog';
}
?>
<body <?php body_class( $body_class ); ?>>

	<header id="header">
		<div class="container">
			<?php
			if ( get_theme_mod( 'ti_header_contact_telephone' ) ) {
				echo '<div id="call_me_now">';
			}
			?>
				<?php
				if ( get_theme_mod( 'ti_header_contact_telephone' ) ) {

					if ( get_theme_mod( 'ti_header_contact_title' ) ) {
						echo get_theme_mod( 'ti_header_contact_title' );
					} else {
						echo __( 'Call me now: ', 'ti' );
					}

					if ( get_theme_mod( 'ti_header_contact_telephone' ) ) {
						echo '<a href="tel:'. get_theme_mod( 'ti_header_contact_telephone' ) .'">'. get_theme_mod( 'ti_header_contact_telephone' ) .'</a>';
					} else {
						echo '<a href="tel:40749555777">(+4) 0749.555.777</a>';
					}

				}
				?>
			<?php
			if ( get_theme_mod( 'ti_header_contact_telephone' ) ) {
				echo '</div>';
			}
			?>
			<a id="logo" href="<?php echo home_url(); ?>" title="<?php bloginfo( 'title' ); ?>">
				<?php
				if ( get_theme_mod( 'ti_header_logo' ) ) {
					echo '<img src="'. get_theme_mod( 'ti_header_logo' ) .'">';
				} else {
					echo '<img src="'. get_template_directory_uri() .'/images/logo.png">';
				}
				?>
			</a><!--/#logo-->
		</div><!--/.container-->
	</header><!--/#header-->

	<div id="main-menu">
		<div class="container">
			<div class="openresponsivemenu">
				<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="32" height="32" viewBox="0 0 32 32">
					<path d="M8 20.8h-1.6c-0.883 0-1.6 0.715-1.6 1.6s0.717 1.6 1.6 1.6h1.6c0.883 0 1.6-0.715 1.6-1.6s-0.717-1.6-1.6-1.6zM8 14.4h-1.6c-0.883 0-1.6 0.717-1.6 1.6s0.717 1.6 1.6 1.6h1.6c0.883 0 1.6-0.717 1.6-1.6s-0.717-1.6-1.6-1.6zM8 8h-1.6c-0.883 0-1.6 0.717-1.6 1.6s0.717 1.6 1.6 1.6h1.6c0.883 0 1.6-0.717 1.6-1.6s-0.717-1.6-1.6-1.6zM14.4 11.2h11.2c0.885 0 1.6-0.717 1.6-1.6s-0.715-1.6-1.6-1.6h-11.2c-0.883 0-1.6 0.717-1.6 1.6s0.717 1.6 1.6 1.6zM25.6 14.4h-11.2c-0.883 0-1.6 0.717-1.6 1.6s0.717 1.6 1.6 1.6h11.2c0.885 0 1.6-0.717 1.6-1.6s-0.715-1.6-1.6-1.6zM25.6 20.8h-11.2c-0.883 0-1.6 0.715-1.6 1.6s0.717 1.6 1.6 1.6h11.2c0.885 0 1.6-0.715 1.6-1.6s-0.715-1.6-1.6-1.6z"></path>
				</svg>
			</div><!--/.openresponsivemenu-->
			<nav class="">
			<?php
			wp_nav_menu( array(
					'theme_location' => 'header-menu'
				)
			);
			?>
			</nav><!--/.cf-->

			<?php
			if ( !is_front_page() ) { ?>
				<div class="social-media">
					<?php
					if ( get_theme_mod( 'ti_header_facebook_link' ) ) {
						echo '<a href="'. get_theme_mod( 'ti_header_facebook_link' ) .'" target="_blank"><img src="'. get_template_directory_uri() .'/images/facebook.png" alt="facebook"></a>';
					}

					if ( get_theme_mod( 'ti_header_twitter_link' ) ) {
						echo '<a href="'. get_theme_mod( 'ti_header_twitter_link' ) .'" target="_blank"><img src="'. get_template_directory_uri() .'/images/twitter.png" alt="twitter"></a>';
					}

					if ( get_theme_mod( 'ti_header_youtube_link' ) ) {
						echo '<a href="'. get_theme_mod( 'ti_header_twitter_link' ) .'" target="_blank"><img src="'. get_template_directory_uri() .'/images/youtube.png" alt="youtube"></a>';
					}
					?>
				</div>
			<?php }
			?>
		</div><!--/.container-->
	</div><!--/#main-menu-->