<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 */

get_header(); ?>

	<div id="primary" class="content-area">
	  <div class="col-sm-8 col-sm-offset-2">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found">
				<header class="page-header">
					<h3 class="page-404"><?php esc_html_e( '404 Error.', 'newspro' ); ?></h3>
					<h2 class="page-404-bold"><?php esc_html_e( 'Page Not Found.', 'newspro' ); ?></h2>
					
				</header><!-- .page-header -->

				<div class="page-content">
					<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'newspro' ); ?></p>
					<div class="form_bg col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3">
						<h4 class="page-404"><?php esc_html_e( 'Keyword Search.', 'newspro' ); ?></h4>
							
					<?php

						get_search_form();

						// Only show the widget if site has multiple categories.
						if ( newspro_categorized_blog() ) :
					
						endif;

						
					?>
				
			</div>

				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- .col-sm-12 -->
	</div><!-- #primary -->

<?php
get_footer();
