<?php
/*	ColourLine: Related Post
*/
function newspro_related_post(){ 
	global $post;
	$orig_post = $post;
	$related_query = 'tag';	
	$related_Args = array(
		'post__not_in' => array($post->ID),
		'posts_per_page'=> 3, // Number of related posts that will be shown. . "&orderby=rand"
		'ignore_sticky_posts'=> 1,
	);
				
	$my_query = new WP_Query( $related_Args );
	if( $my_query->have_posts() ) { ?>
		<div id="related-posts" class="single-box">
			<h2 class="share-title"><?php esc_html_e('Related Posts', 'newspro'); ?></h2>

			<ul><?php 
			while( $my_query->have_posts() ) {
			$my_query->the_post();?>
				<li class="col-sm-4">
					<div class="related-thumb">
						<?php echo newspro_thumbnail('related'); ?>
					</div>
					<div class="related-content">
						<h3 >
							<a href="<?php the_permalink()?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title();?></a>
						</h3>
					<?php the_time('M j, Y') ?>
					</div>
				</li><?php
			} ?>
			
			</ul>
		</div>
	<?php } else { echo '<span class="related-message">' . esc_html_e('There are no Related Post in Query', 'newspro') . '</span>'; }
	//$post = $orig_post;
	wp_reset_postdata();
?>
<div class="clearfix"></div>
<?php
}
?>