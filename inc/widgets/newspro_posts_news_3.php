<?php

/***** Register Widgets *****/

function newspro_register_posts_news_3_widgets() {
	register_widget('newspro_posts_news_3_widget');
}
add_action('widgets_init', 'newspro_register_posts_news_3_widgets');

class newspro_posts_news_3_widget extends WP_Widget {
    function __construct() {
        $widget_ops = array('classname' => 'pop_news_block_3', 'description' => __('Posts News block 3', 'newspro'));
        parent::__construct('newspro-posts-news-3', __('Posts News 3', 'newspro'), $widget_ops);
    }
    function widget($args, $instance) {
        extract($args);
        $title = apply_filters('widget_title', empty($instance['title']) ? '' : $instance['title'], $instance, $this->id_base);
        $category = isset($instance['category']) ? $instance['category'] : '';
        $tags = empty($instance['tags']) ? '' : $instance['tags'];
        $postcount = empty($instance['postcount']) ? '3' : $instance['postcount'];
        $offset = empty($instance['offset']) ? '' : $instance['offset'];
        $sticky = isset($instance['sticky']) ? $instance['sticky'] : 0;
        $show_cat = isset($instance['show_cat']) ? $instance['show_cat'] : 0;
        $show_date = isset($instance['show_date']) ? $instance['show_date'] : 1;

        if ($category) {
        	$cat_url = get_category_link($category);
	        $before_title = $before_title . '<a href="' . esc_url($cat_url) . '" class="widget-title-link">';
	        $after_title = '</a>' . $after_title;
        }

        echo $before_widget;
        if (!empty( $title)) {  echo '<div class="pop_post_news_header pop_post_header">
			<div class="news_heading catbx3">'.$before_title . esc_attr($title) . $after_title.'   </div>
			<div class="clearfix"></div>
			</div>'; 
		} ?>
        <?php
		$args = array('posts_per_page' => $postcount, 'offset' => $offset, 'cat' => $category, 'tag' => $tags, 'ignore_sticky_posts' => $sticky);
		$counter = 1;
		$the_query = new WP_Query($args);
		if($the_query->have_posts()): 
		
		$count = 1;
		$remaining_posts = '';
		$first_news_post='';
		while ( $the_query->have_posts() ) : $the_query->the_post(); 
			
			$post_id = get_the_ID();
			   $post_title = get_the_title();
          $comments = get_comments_number();
          $date_cat = get_the_date();
			$img_src= '';
			if ( has_post_thumbnail($post_id ) ) {
				$post_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'large' );
				$img_src = $post_image[0];
			}
			
			$post_categories = wp_get_post_categories( $post_id );
			$cat_html = '';
			if(!empty($post_categories)){
				foreach($post_categories as $post_category){
					$cat = get_category( $post_category );
					
					
					$cat_html .= '<li class="cat"><a href="'.esc_url(get_category_link($cat->term_id)).'">'.$cat->name.'</a></li>';
				}
			}
			if($show_cat != 1 ) $cat_html ='';
			$date_li='';
			if($show_date == 1) $date_li = '<span class="date">'.get_the_date().'</span>';
			
			
			
			$first_news_post .= '
   <div class="col-sm-4 col-md-4 pop_news_large">
   <a href="'.esc_url(get_permalink()).'">
          <div class="pop_post_news pop_small_news " style="background-image: url('.$img_src.')">
          <div class="overlay">
				<div class="pop_post_data">
                                               
								<span class="p_title">'.esc_attr($post_title).'</span>
								
								<div class="pop_post_block_meta row">
								<div class="col-sm-6 col-xs-6">'.esc_attr($comments).' Comments</div>
								<div class="col-sm-6 col-xs-6">'.esc_attr($date_cat).'</div></div>									
								
							</div><!-- .pop_post_data -->

							</div>
							
					
			</div> <!-- pop_large_news -->
			</a>
					</div> <!-- pop_news_news -->
';

	if($count % 3 == 0) $first_news_post .= '<div class="clearfix"></div>';
			

		$count++;
		
	endwhile; 
	wp_reset_postdata();
	?> 	<div class="row">
		<div class="pop_posts_block_wrapper">
      <div class="pop_posts_block pop_posts_block_3">
         <?php echo $first_news_post; ?>
         
         <div class="clearfix"></div>
      </div> <!-- pop_posts_block -->
   </div>  
   </div>   
     <?php endif; ?>   
        <?php
        echo $after_widget;
    }
    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = sanitize_text_field($new_instance['title']);
        $instance['category'] = absint($new_instance['category']);
        $instance['postcount'] = absint($new_instance['postcount']);
        $instance['offset'] = absint($new_instance['offset']);
        $instance['tags'] = sanitize_text_field($new_instance['tags']);
        $instance['sticky'] = isset($new_instance['sticky']) ? strip_tags($new_instance['sticky']) : '';
        $instance['show_cat'] = isset($new_instance['show_cat']) ? strip_tags($new_instance['show_cat']) : '';
        
        $instance['show_date'] = isset($new_instance['show_date']) ? strip_tags($new_instance['show_date']) : '';
     
        return $instance;
    }
    function form($instance) {
        $defaults = array('title' => '', 'category' => '', 'tags' => '','sticky' => 0, 'postcount'=>3, 'offset' => 0, 'show_cat' => 1, 'show_date'=>1);
        $instance = wp_parse_args((array) $instance, $defaults); ?>

        <p>
        	<label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:', 'newspro'); ?></label>
			<input class="widefat" type="text" value="<?php echo esc_attr($instance['title']); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" id="<?php echo esc_attr($this->get_field_id('title')); ?>" />
        </p>
        <p>
			<label for="<?php echo esc_attr($this->get_field_id('category')); ?>"><?php esc_html_e('Select a Category:', 'newspro'); ?></label>
			<select id="<?php echo esc_attr($this->get_field_id('category')); ?>" class="widefat" name="<?php echo esc_attr($this->get_field_name('category')); ?>">
				<option value="0" <?php if (!$instance['category']) echo 'selected="selected"'; ?>><?php esc_html_e('All', 'newspro'); ?></option>
				<?php
				$categories = get_categories(array('type' => 'post'));
				foreach($categories as $cat) {
					echo '<option value="' . $cat->cat_ID . '"';
					if ($cat->cat_ID == $instance['category']) { echo ' selected="selected"'; }
					echo '>' . $cat->cat_name . ' (' . $cat->category_count . ')';
					echo '</option>';
				}
				?>
			</select>
		</p>
		<p>
        	<label for="<?php echo esc_attr($this->get_field_id('tags')); ?>"><?php esc_html_e('Filter Posts by Tags (e.g. lifestyle):', 'newspro'); ?></label>
			<input class="widefat" type="text" value="<?php echo esc_attr($instance['tags']); ?>" name="<?php echo $this->get_field_name('tags'); ?>" id="<?php echo esc_attr($this->get_field_id('tags')); ?>" />
	    </p>
    
	    <p>
        	<label for="<?php echo esc_attr($this->get_field_id('offset')); ?>"><?php esc_html_e('Skip:', 'newspro'); ?></label>
			<input type="text" size="2" value="<?php echo esc_attr($instance['offset']); ?>" name="<?php echo esc_attr($this->get_field_name('offset')); ?>" id="<?php echo esc_attr($this->get_field_id('offset')); ?>" /> <?php esc_html_e('Posts', 'newspro'); ?>
	    </p>
	    
	    <p>
        	
			<input type="text" size="2" value="<?php echo esc_attr($instance['postcount']); ?>" name="<?php echo $this->get_field_name('postcount'); ?>" id="<?php echo esc_attr($this->get_field_id('postcount')); ?>" /> <?php esc_html_e('Number of Posts', 'newspro'); ?>
	    </p>
	    
        <p>
      		<input id="<?php echo esc_attr($this->get_field_id('sticky')); ?>" name="<?php echo esc_attr($this->get_field_name('sticky')); ?>" type="checkbox" value="1" <?php checked('1', $instance['sticky']); ?>/>
	  		<label for="<?php echo esc_attr($this->get_field_id('sticky')); ?>"><?php esc_html_e('Ignore Sticky Posts', 'newspro'); ?></label>
    	</p>
    	 <p>
      		<input id="<?php echo esc_attr($this->get_field_id('show_cat')); ?>" name="<?php echo esc_attr($this->get_field_name('show_cat')); ?>" type="checkbox" value="1" <?php checked('1', $instance['show_cat']); ?>/>
	  		<label for="<?php echo esc_attr($this->get_field_id('show_cat')); ?>"><?php esc_html_e('Show category name', 'newspro'); ?></label>
    	</p>
    	
    	 <p>
      		<input id="<?php echo esc_attr($this->get_field_id('show_date')); ?>" name="<?php echo esc_attr($this->get_field_name('show_date')); ?>" type="checkbox" value="1" <?php checked('1', $instance['show_date']); ?>/>
	  		<label for="<?php echo esc_attr($this->get_field_id('show_date')); ?>"><?php esc_html_e('Show date', 'newspro'); ?></label>
    	</p>
    	<?php
    }
}