<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package newspro
 */

get_header(); ?>
<div class="container">

	
	<div id="primary" class="content-area row">
<div class="col-sm-8">
		<main id="main"  role="main">

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', get_post_format() );

?>

                 
			      

<?php

						newspro_includes('related-post');

?>

<?php
					
			newspro_includes('post-navigation');

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->
<div class="col-sm-4">
<div class="sidebar-main">
<?php
get_sidebar();
?>
</div>
</div>
	</div>

</div>

<?php
get_footer();
