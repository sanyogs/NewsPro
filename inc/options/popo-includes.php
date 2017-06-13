<?php
/*	@ newspro Includes Function
*/
function newspro_includes($type, $data = '', $add = 'true'){
	switch ( $type ) :
		case "post-thumbnail": 
			echo newspro_post_thubmnail($data, $add);
		break;
		case "related-post":
			echo newspro_related_post();
		break;
		case "post-navigation":
			echo newspro_post_navigation();
		break;
	endswitch;

} ?>