<?php 
	$slider_display =  get_theme_mod( 'newspro_display_slider_setting', 0);
	$slider_cat = get_theme_mod( 'newspro_slide_category_setting');
 
	//query posts
	$args =	array(
		'offset'           => 0,
		'posts_per_page'   => 10,
		'category_name'    => $slider_cat,
		'orderby'          => 'post_date',
		'order'            => 'DESC',
		'post_type'        => 'post',
		'post_status'      => 'publish',
		'suppress_filters' => true
	);

	$counter = 1;
	$the_query = new WP_Query( $args );
?>
<section id="home-slider">
	<?php if($slider_display == 1){ ?> 
        <?php if ($the_query->have_posts()) : ?>    	
                
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
    
            <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <?php while ($the_query->have_posts()) : $the_query->the_post(); ?> 
                        
                        <?php
                    
                        if ( has_post_format( 'video' )) {?>
                            <div class="item bg">
                                <?php echo wp_oembed_get(rock_n_rolla_catch_first_video());?>
                            </div>
                        <?php }else{
                            
                        if ( has_post_thumbnail() ) { 
                        $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
                        $post_permalink = get_the_permalink();
                        ?>
                        <?php if($counter < 6){?> 
                        <a href="<?php echo esc_url($post_permalink); ?>">
                        <div class="item bg bg<?php echo $counter; ?> <?php if($counter == 1) {echo "active";} ?>">    	
                            <div class="carousel-content-bg">
                            	<?php the_post_thumbnail( 'full', array( 'class' => 'full-slide' ) ); ?>
                           
                                
                                <div class="slider-title">
                                        <span class="cat-links" ><?php the_category(); ?></span>
                                        <a href="<?php echo esc_url($post_permalink); ?>">
                                  <h3 class="entry-title"> <?php the_title(); ?></h3>

                              <div class="slider-content">
                                <div class="entry-meta">
                           
                              
                             <span>  <?php echo get_the_date(); ?></span>
                                <span class="entry-comm"><?php comments_number(); ?></span>
                              
                          </div>
                              
                          </div></a>
                      </div>

                            </div>
                        </div>
                    </a>
                         <?php $counter = $counter + 1; ?>
                         <?php } ?>
                        <?php } 
                        }
                        
                    ?>
                    <?php endwhile; ?> 
                    
                    
                </div>
    
                <a class="left carousel-control" href="#myCarousel" data-slide="prev"><i class="fa fa-angle-left fa-2x"></i></a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next"><i class="fa fa-angle-right fa-2x"></i></a>
            </div>
       
        <?php endif; ?> 
    <?php } ?> 
 </section>
<?php wp_reset_postdata(); ?>