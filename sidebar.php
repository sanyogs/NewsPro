<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package newspro
 */

if ( ! is_active_sidebar( 'newspro-homepage-sidebar' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area" role="complementary">
		
	<?php dynamic_sidebar('newspro-homepage-sidebar'); ?>
	
</aside><!-- #secondary -->
