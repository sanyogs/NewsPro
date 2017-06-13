<?php

/***** Register Widgets *****/

function newspro_register_ad_widgets() {
	register_widget('newspro_ad_widget');
}
add_action('widgets_init', 'newspro_register_ad_widgets');

class newspro_ad_widget extends WP_Widget {
    function __construct() {
        $widget_ops = array('classname' => 'pop_ad', 'description' => __('Ad', 'newspro'));
        parent::__construct('newspro-ad', __('Ad', 'newspro'), $widget_ops);
    }
    function widget($args, $instance) {
        extract($args);
        $title = apply_filters('widget_title', empty($instance['title']) ? '' : $instance['title'], $instance, $this->id_base);
        $ad_image = isset($instance['ad_image']) ? $instance['ad_image'] : '';
        $ad_link = isset($instance['ad_link']) ? $instance['ad_link'] : '';

		echo '<div class="widget pop_widget pop-advertise">';
        echo $before_widget;
	        if (!empty( $title)) {  echo ''.$before_title . esc_attr($title) . $after_title.''; 
			} ?>
        	<?php
        		if(strlen($ad_image) > 3):
        	
        	?>
				<div class="pop_ad_image">
					
					<a href="<?php echo esc_url($ad_link);?>"><img src="<?php echo esc_attr($ad_image);?>" alt="" /></a>
				</div>
				<?php endif; ?>   
        <?php
        echo $after_widget;
        echo '</div>';
    }
    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = sanitize_text_field($new_instance['title']);
        $instance['ad_image'] = esc_url_raw($new_instance['ad_image']);
        $instance['ad_link'] = sanitize_text_field($new_instance['ad_link']);
     
        return $instance;
    }
    function form($instance) {
        $defaults = array('title' => '', 'ad_image' => '', 'ad_link' => '');
        $instance = wp_parse_args((array) $instance, $defaults); ?>

        <p>
        	<label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:', 'newspro'); ?></label>
			<input class="widefat" type="text" value="<?php echo esc_attr($instance['title']); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" id="<?php echo esc_attr($this->get_field_id('title')); ?>" />
        </p>
        
            <p>
        	<label for="<?php echo esc_attr($this->get_field_id('ad_image')); ?>"><?php esc_html_e('Ad Image:', 'newspro'); ?></label>
			<input class="widefat" type="text" value="<?php echo esc_attr($instance['ad_image']); ?>" name="<?php echo esc_attr($this->get_field_name('ad_image')); ?>" id="<?php echo esc_attr($this->get_field_id('ad_image')); ?>" />
			<?php esc_html_e('Upload your ad image in media and past image url here', 'newspro'); ?>
        </p>
        
            <p>
        	<label for="<?php echo esc_attr($this->get_field_id('ad_link')); ?>"><?php esc_html_e('Ad Link:', 'newspro'); ?></label>
			<input class="widefat" type="text" value="<?php echo esc_attr($instance['ad_link']); ?>" name="<?php echo esc_attr($this->get_field_name('ad_link')); ?>" id="<?php echo esc_attr($this->get_field_id('ad_link')); ?>" />
        </p>
       
    	<?php
    }
}