<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package newspro
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	

	<div class="entry-content">
		<?php
		 the_post_thumbnail('large'); 
		
		?>
	</div><!-- .entry-content -->
<div class="top-entry-section">
<div class="entry-meta">
<?php the_category( ' ' ); ?>
</div><!-- .entry-meta -->
</div>
	<header class="entry-header b-detail">

		<?php
		if ( is_single() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h1 class="entry-title "><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );
		endif;

		if ( 'post' === get_post_type() ) : ?>
		<ul class="list-inline blog-info">
                       <li><?php the_time( get_option( 'date_format' ) ); ?></li>/
			<li><?php esc_html_e('By:', 'newspro'); ?><?php the_author_posts_link(); ?></li>/
			
			<li><a href="<?php comments_link(); ?>" rel="bookmark"><?php comments_number(); ?></a></li>
			
		</ul>
		
		<?php
		endif; ?>
	</header><!-- .entry-header -->
	<div class="entry-content">
		<?php 	the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'newspro' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'newspro' ),
				'after'  => '</div>',
			) );
			?>
	</div>

	<footer class="entry-footer">
		
		
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
