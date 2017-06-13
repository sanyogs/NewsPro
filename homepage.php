<?php
/**
 * Template Name: Homepage
 */

get_header(); 

  if ( 'posts' == get_option( 'show_on_front' ) ) {
    get_template_part( 'index' );
} else {
?>
<section id="threeCatWrap">

   
     <div class="col-sm-12 cat-4-col catwrapleft">  

       <?php if( get_theme_mod('leftsection',false) ) { ?>
<div class="entry-title">
<h3 class="title"><?php echo  $leftsection = get_theme_mod("leftsection_textbox"); ?></h3>
</div>
            <?php $queryvar = new WP_Query('showposts=3 &cat='.get_theme_mod('leftsection',true));
            ?>
            
       <div class="row">
          
              <?php
            if( have_posts()) : while( $queryvar->have_posts() ) : $queryvar->the_post(); ?>
        <a href="<?php the_permalink(); ?>">
                 <div class="col-sm-4">

                    <div class="catleft-1 pqrs">
                          
                           <?php if ( has_post_thumbnail() ) { ?>
                              <?php the_post_thumbnail(); ?>
                          <?php } else { ?>
                             <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/img404.jpg"  alt="" />
                            <?php } ?>
                            
                             
                              <div class="slider-title1">
                                <div class="sli-title">
                              <h5><?php the_category(); ?></h5>
                               </div>
                                <a href="<?php the_permalink(); ?>">
                                <div class="entry-title">
                                <h3><span><?php the_title(); ?></span></h3>
                              </div>
                              <div class="sli-date">
                             <h5><?php echo get_the_date(); ?></h5>
                              </div></a>
                              
                                
                              </div></a>
                               
                           
                          
                          
                         </div> </div> </a>
            <?php endwhile; endif;?>
              </div>
            <?php
            wp_reset_postdata(); ?>  
               <?php } ?> 
   </div><!--end .cat-3-col-->

     <div class="col-sm-12 cat-4-col catwrapright">  
     
      <?php if( get_theme_mod('rightsection',false) ) { ?>
<div class="entry-title">
<h3 class="title">
<?php
            echo  $rightsection = get_theme_mod("rightsection_textbox");
              ?></h3></div>
            <?php $queryvar = new WP_Query('showposts=3 &cat='.get_theme_mod('rightsection',true));
            ?>

             <div class="row">

              <?php
            if( have_posts()) : while( $queryvar->have_posts() ) : $queryvar->the_post(); ?>
          
            <div class="col-sm-4">
               <a href="<?php the_permalink(); ?>">
                         <div class="catleft-1 pqrs"> 
                          
               <?php if ( has_post_thumbnail() ) { ?>
                  <?php the_post_thumbnail(); ?>
              <?php } else { ?>
                       
                             <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/img404.jpg" alt="" /></a>
                            <?php } ?>
                             <div class="slider-title1">
                                <div class="sli-title">
                              <h5><?php the_category(); ?></h5>
                               </div>
                               <a href="<?php the_permalink(); ?>">
                                <div class="entry-title">
                                <h3><span><?php the_title(); ?></span></h3>
                              </div>
                              <div class="sli-date">
                             <h5><?php echo get_the_date(); ?></h5>
                              </div></a>
                              
                                
                              </div>
                            
                              

                          
                          
                         </div></a>
                       </div>
                    
            <?php endwhile; endif;?>
             </div>
             <?php
            wp_reset_postdata(); ?>  
               <?php } ?>    
  </div><!--end .cat-3-col-->

<div class="clear"></div>

</section>
<?php
}
?>

  <div class="col-xs-12 col-md-12 col-lg-12 col-sm-12">


    <?php dynamic_sidebar('newspro-homepage-main'); ?>
                <?php if (is_active_sidebar('home-3') || is_active_sidebar('home-4')) : ?>
        <div class="popo-home-columns clearfix">
          <?php if (is_active_sidebar('home-3')) { ?>
              <div class="popo-widget-col-1 popo-sidebar popo-home-sidebar popo-home-area-3">
                <?php dynamic_sidebar('home-3'); ?>
            </div>
          <?php } elseif (is_active_sidebar('home-4')) { ?>
            <div class="popo-widget-col-1 popo-sidebar popo-home-sidebar popo-home-area-3">
              <div class="popo-widget popo-home-3 popo-sidebar-empty">
                <h4 class="popo-widget-title">
                  <span class="popo-widget-title-inner">
                    <?php printf(esc_html_x('Home %d - 1/3 Width', 'widget area name', 'newspro'), 3); ?>
                  </span>
                </h4>
                <div class="textwidget">
                  <?php printf(esc_html_e('Please navigate to %1$1s in your WordPress dashboard and add some widgets into the %2$1s widget area.', 'newspro'), '<strong>' . __('Appearance &#8594; Widgets', 'newspro') . '</strong>', '<em>' . sprintf(esc_html_x('Home %d - 1/3 Width', 'widget area name', 'newspro'), 3) . '</em>'); ?>
                </div>
              </div>
            </div>
          <?php } ?>
          <?php if (is_active_sidebar('home-4')) { ?>
              <div class="popo-widget-col-1 popo-sidebar popo-home-sidebar popo-margin-left popo-home-area-4">
                <?php dynamic_sidebar('home-4'); ?>
            </div>
          <?php } elseif (is_active_sidebar('home-3')) { ?>
            <div class="popo-widget-col-1 popo-sidebar popo-home-sidebar popo-margin-left popo-home-area-4">
              <div class="popo-widget popo-home-4 popo-sidebar-empty">
                <h4 class="popo-widget-title">
                  <span class="popo-widget-title-inner">
                    <?php printf(esc_html_x('Home %d - 1/3 Width', 'widget area name', 'newspro'), 4); ?>
                  </span>
                </h4>
                <div class="textwidget">
                  <?php printf(esc_html_e('Please navigate to %1$1s in your WordPress dashboard and add some widgets into the %2$1s widget area.', 'newspro'), '<strong>' . __('Appearance &#8594; Widgets', 'newspro') . '</strong>', '<em>' . sprintf(esc_html_x('Home %d - 1/3 Width', 'widget area name', 'newspro'), 4) . '</em>'); ?>
                </div>
              </div>
            </div>
          <?php } ?>
        </div>
      <?php endif; ?>
      <?php dynamic_sidebar('newspro-homepage-main-2'); ?>
  </div><!-- col-main -->
<!-- sidebar -->
  
  <div class="clearfix"></div>
  <div class="content-wrapper">
      
<?php echo newspro_carousel(); ?>

</div>
  <div id="primary" class="content-area col-sm-12">
    <main id="main" class="site-main" role="main">

      <?php while ( have_posts() ) : the_post(); ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
          <div class="entry-content">
            <?php the_content(); ?>
      
          </div><!-- .entry-content -->
  
        </article><!-- #post-## -->

      <?php endwhile; // End of the loop. ?>

    </main><!-- #main -->
  </div><!-- #primary -->
<div class="clearfix"></div>


<?php get_footer(); ?>
