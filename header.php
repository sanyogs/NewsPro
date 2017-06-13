<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package newspro
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">


<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> data-spy="scroll" data-target=".navbar-fixed-top">
  <header class="main-header">
	   <div class="top_header">
           <div class="container">
			  <div class="top_bar">
			       <nav class="top_nav col-sm-8">
				      
						       <?php 
									 	$arg = array(
										'theme_location'  => 'top',
										'container_class' => 'menu-top',
										'container_id'    => '',
										'menu_class'      => '',
										'menu_id'         => 'top-menu',
                                                                                'fallback_cb' => false
									);
									
									wp_nav_menu( $arg ); 
								?>
			       </nav>
			       <nav class="social col-sm-4">
			          <ul>
			          	<?php
						$facebook_link = esc_url(get_theme_mod("facebook_link"));
						$twitter_link = esc_url(get_theme_mod("twitter_link"));
	                                        $pinterest_link = esc_url(get_theme_mod("pinterest_link"));

						$g_link = esc_url(get_theme_mod("googleplus_link"));
	                                        $vimeo_link = esc_url(get_theme_mod("vimeo_link"));
						$youtube_link = esc_url(get_theme_mod("youtube_link"));
						$linkedin_link = esc_url(get_theme_mod("linkedin_link"));
	                                        $rss_link = esc_url(get_theme_mod("rss_link"));
						
						
			             if(strlen($facebook_link) > 0) echo '<li class="facebook"><a href="'.$facebook_link.'"><i class="fa fa-facebook"></i></a></li>';
			             if(strlen($twitter_link) > 0) echo '<li class="twitter"><a href="'.$twitter_link.'"><i class="fa fa-twitter"></i></a></li>';
	                             if(strlen($pinterest_link) > 0) echo '<li class="pinterest"><a href="'.$pinterest_link.'"><i class="fa fa-pinterest-p"></i></a></li>';
			             if(strlen($g_link) > 0) echo '<li class="gplus"><a href="'.$g_link.'"><i class="fa fa-google-plus"></i></a></li>';
	                             if(strlen($vimeo_link) > 0) echo '<li class="vimeo"><a href="'.$vimeo_link.'"><i class="fa fa-vimeo-square"></i></a></li>';
			             if(strlen($youtube_link) > 0) echo '<li class="youtube"><a href="'.$youtube_link.'"><i class="fa fa-youtube"></i></a></li>';
			             if(strlen($linkedin_link) > 0) echo '<li class="linkedin"><a href="'.$linkedin_link.'"><i class="fa fa-linkedin"></i></a></li>';
	                               if(strlen($rss_link) > 0) echo '<li class="rss"><a href="'.$rss_link.'"><i class="fa fa-rss"></i></a></li>';
			            
			             ?>
			          </ul>
			       </nav>
		       		<div class="clearfix"></div>
		       </div> <!-- top_bar -->
		    </div><!-- container -->
    	</div> <!-- top-header -->
		<div class="clearfix"></div>
	<div class="header-site">
		
				<div class="container">
					<div class="col-sm-4">
						<div class="logo">
							<div class="site-branding">



	<?php
     newspro_the_custom_logo();
 
 
               
   if ( is_front_page() && is_home() ) : ?>
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php else : ?>
						<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					<?php endif;

					$description = get_bloginfo( 'description', 'display' );
					if ( $description || is_customize_preview() ) : ?>
						<p class="site-description"><?php echo $description; ?></p>
					<?php endif; 
               
 ?>


					
				</div><!-- .site-branding -->
						</div>
					</div>
					<div class="col-sm-8">
						<div class="header-up">
							<?php if ( get_header_image() ) : ?>
    <div id="site-header">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
            <img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
        </a>
    </div>
<?php endif; ?>
						</div>
					</div>
				</div><!-- container -->
		
	</div><!-- header-site -->
<div id="navbar"> 
<nav  class="navbar navbar-inverse " role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="container">
        <div class="navbar-header">
    		     <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
			     <span class="sr-only"> <?php esc_html_e('Toggle navigation', 'newspro'); ?></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
 
      
        </div>
<?php  wp_nav_menu( array(


	'theme_location'    => 'primary',
                'depth'             => 12,
       			'menu_class'        => 'nav navbar-nav collapse navbar-collapse',
                'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                'walker'            => new wp_bootstrap_navwalker())

               
            );
        ?>
 		 
</nav>

</div>

	
							
   </header>
  	
		
		
	<div class="breaking-news">
		<div class="container clearfix">
			<div class="col-sm-2 col-xs-4">
				   <p> <?php esc_html_e('BREAKING NEWS', 'newspro'); ?></p>
			</div>
			<div class="col-sm-10 col-xs-8">
						<?php	
							$args = array( 'numberposts' => 2, 'post_status'=>"publish",'post_type'=>"post",'orderby'=>"post_date");
							$postslist = get_posts( $args );
						?>
						<marquee><ul class="list-inline" >
							<?php
							 foreach ($postslist as $post) :  setup_postdata($post); ?> 
								<li class="break_title"><strong><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute();?>"> <?php the_title(); ?></a></strong>  <span class="break_date"><?php the_time( get_option( 'date_format' ) ); ?></span></li>
							<?php endforeach; ?>
				 		</ul></marquee>
		 	</div>
		</div>
	</div>
 <?php if(is_home() || is_front_page()){ 
		get_template_part( 'template-parts/slider' ) ;
		
    } ?>
 	<div class="container content-wrapper" id="content_wrapper">
		   		<div class="content_border">
		   		
 
		   			
