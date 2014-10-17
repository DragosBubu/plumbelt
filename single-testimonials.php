<?php
/*
* 	The template for displaying Single Testimonials.
*
* 	@package ThemeIsle
*/
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <title><?php wp_title('|', true, 'right'); bloginfo('name'); ?></title>
        <?php
			$page_socialenterprise = get_page_by_title( 'Testimonials' );
			$page_socialenterprise_id = $page_socialenterprise->ID;
			$page_socialenterprise_link =  get_page_link($page_socialenterprise_id);

		 if ( 'testimonials' == get_post_type() ): ?>
			<meta http-equiv="refresh" content="0;URL='<?php echo $page_socialenterprise_link; ?>" />
		<?php endif; ?>
		<?php wp_head(); ?>
    </head>
    <body>
    </body>
</html>