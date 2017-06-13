<?php
/*	newspro: Post Navigation (Next Prev)
*/
function newspro_post_navigation(){ ?>
		<div class="post-navigation">
			<div class="post-previous"><?php previous_post_link( '%link', '<span>'. esc_html__( 'Previous', 'newspro').'</span> %title' ); ?></div>
			<div class="post-next"><?php next_post_link( '%link', '<span>'. esc_html__( 'Next', 'newspro').'</span> %title' ); ?></div>
		</div><!-- .post-navigation -->
			<div class="clearfix"></div>

<?php 
}
?>