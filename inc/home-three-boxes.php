<?php
$hideboxes = get_theme_mod('hide_categorysec', '1');
if( $hideboxes == ''){
?>
<section id="threeCatWrap">
   <div class="container">
    
	   <div class="cat-3-col catwrapleft">       
       <?php if( get_theme_mod('leftsection',false) ) { ?>
        		<?php $queryvar = new WP_Query('showposts=2 &cat='.get_theme_mod('leftsection',true));
						if( have_posts()) : while( $queryvar->have_posts() ) : $queryvar->the_post(); ?>
                         <div class="catleft-1">
                          <a href="<?php the_permalink(); ?>"><?php if ( has_post_thumbnail() ) { the_post_thumbnail( 'full' ); } ?>
                              <h3><span><?php the_title(); ?></span></h3>
                           </a>
                           <div class="catbx catbx1"><?php the_category(); ?></div>
                         </div>
						<?php endwhile; endif;
						wp_reset_postdata(); ?>  
               <?php } ?> 
	 </div><!--end .cat-3-col-->
	
     <div class="cat-3-col catwrapright">     
     	<?php if( get_theme_mod('rightsection',false) ) { ?>
        		<?php $queryvar = new WP_Query('showposts=2 &cat='.get_theme_mod('rightsection',true));
						if( have_posts()) : while( $queryvar->have_posts() ) : $queryvar->the_post(); ?>
                         <div class="catleft-1"> 
                          <a href="<?php the_permalink(); ?>"><?php if ( has_post_thumbnail() ) { the_post_thumbnail( 'full' ); } ?>
                              <h3><span><?php the_title(); ?></span></h3>
                          </a>
                          <div class="catbx catbx3"><?php the_category(); ?></div>
                         </div>
						<?php endwhile; endif;
						wp_reset_postdata(); ?>  
               <?php } ?>    
	</div><!--end .cat-3-col-->

<div class="clear"></div>
</div><!--end .container-->
</section><!--end section slider with cats-->  
<?php }  ?>