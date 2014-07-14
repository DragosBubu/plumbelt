<?php
/*
* 	The template for displaying Sidebar.
*
* 	@package ThemeIsle
*/
?>
<div class="sidebar-wrapper">
<?php
	if ( is_active_sidebar( 'general_sidebar' ) ) {
		dynamic_sidebar( 'general_sidebar' );
	} else {
		echo 'The sidebar is not active.';
	}
?>
</div><!--/.sidebar-wrapper-->