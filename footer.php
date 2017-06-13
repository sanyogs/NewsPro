<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package newspro
 */

?>

	</div><!-- #content -->
</div>
<div class="footer-site">
	<div class="container">
	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-footer col-sm-12">
		  
			<div class="col-sm-4">
				<?php dynamic_sidebar('newspro-footer-1'); ?>
			</div><!-- col-main -->
			<div class="col-sm-4">
				<?php dynamic_sidebar('newspro-footer-2'); ?>
			</div><!-- col-main -->
			<div class="col-sm-4">
				<?php dynamic_sidebar('newspro-footer-3'); ?>
			</div><!-- col-main -->
			<div class="clearfix"></div>
		</div>
		
		
	
		<div class="col-sm-5">
			<div class="logo">
			
				<?php
				$logo = esc_url(get_theme_mod("logo-upload"));
				
				?>
				<a href="<?php echo  esc_url( home_url( '/' ) ); ?>">
				<?php echo (strlen($logo) > 0)?  '<img src="'.$logo.'" alt="" />' :  get_bloginfo('name'); ?>
				</a>

			</div>
		</div>
		

		<div class="col-sm-7 footer-tops">
			<div class="footer-top">
			 <nav class="top_nav">
				      

			       <?php 
						 	$arg = array(
							'theme_location'  => 'footer',
							'container_class' => 'menu-footer',
							'container_id'    => '',
							'menu_class'      => '',
							'menu_id'         => 'footer-menu',
                                                        'fallback_cb' => false
						);
						
						wp_nav_menu( $arg ); 
					?>
			       </nav>
			   </div>
			   <div class="clearfix"></div>
			   <div class="footer-bottom">
			       <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'newspro' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'newspro' ), 'WordPress' ); ?></a>
			       <span class="sep"> | </span>
			      
			        <a href="<?php echo esc_url( __( 'https://www.sanyog.in/', 'newspro' ) ); ?>"><?php printf( esc_html__( 'Designed with love by: %1$s.', 'newspro' ), 'Sanyog Shelar' ); ?></a>
		
		</div>
			

</div><!-- #page -->

	</footer><!-- #colophon -->
</div>
</div>


		
	
<?php wp_footer(); ?>

</body>
</html>
