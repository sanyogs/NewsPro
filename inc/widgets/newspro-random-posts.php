<?php


// Extend WP_Widget with our widget.
class newspro_random_post_widgets extends WP_Widget {
/*	Widget Setup
*/
	
	function __construct() {
		// Widget setup
		$widget_ops = array('classname' => 'newspro_random_post_widgets', 'description' => 'Displays random post with thumbnail' );
		// Widget UI
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'newspro_random_post_widgets' );
		// Widget name and description
		parent::__construct('newspro_random_post_widgets', 'newspro: Random Post', $widget_ops);
	}
	
/*	Widget Settings
*/
	function form($instance) {
	/* Default Widget Settings */
	$defaults = array(
		'title' => 'Random Posts',
		'number' => '5'
	);
    $instance = wp_parse_args( (array) $instance, $defaults );
	
    /* Variable Widget Settings */
	$title = $instance['title']; 
	$number = $instance['number']; ?>
	
	<p>
		<label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:', 'newspro'); ?> </label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
	</p>
	<p>
		<label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php esc_html_e('Post Count:', 'newspro'); ?> </label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="text" value="<?php echo esc_attr($number); ?>" />
	</p>
	
	<?php
	}
  
/*	Update The Widget With New Options
*/
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = sanitize_text_field( $new_instance['title'] );
		$instance['number'] = absint( $new_instance['number'] );
		return $instance;
	}
	
/*	Display The Widget To The Front End
*/
	function widget($args, $instance) {
		extract($args, EXTR_SKIP);
 			
		//Widget title, entered in the widget settings
		//$title = empty($instance['title']) ? ' ' : apply_filters('widget_title widget-title', $instance['title']);
		
 $title = apply_filters( 'widget_title widget-title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
		/* Custom Options */
		$number = $instance['number'];
		
		// Before widget - as defined in your specific theme. */
		echo $before_widget;
		
		/* Display The Widget */
		// Widget code goes here (Edit if you want)
		if (!empty($title))
		
		echo $before_title . $title . $after_title;
				
		/* Create a new post query */
		//$query = new WP_Query( array( 
			//'posts_per_page' => $number, 
			//'orderby' => 'rand', 
		//));
		$query = "showposts=3&orderby=rand&cat=";


		foreach((get_the_category()) as $category)
{ 
    $query .= $category->cat_ID .","; 
}
$featured = new WP_Query( $query );

?>

<ul>
    <?php while ($featured -> have_posts()) : $featured -> the_post(); ?>
    <li>
    
                         <div class="catleft-1 pqrs"> 
                          <a href="<?php the_permalink(); ?>">
               <?php if ( has_post_thumbnail() ) { ?>
                  <?php the_post_thumbnail(); ?>
              <?php } else { ?>
                             <img src="<?php echo esc_attr(get_template_directory_uri()); ?>/images/img404.jpg" alt="" />
                            <?php } ?>
                              <div class="slider-title1">
                                <h3><span><?php the_title(); ?></span></h3>

   <span class="cm1"><?php echo the_date(); ?> </span>                               
                             

                              </div>
                           
                          </a>
                          
                         </div>
                     

	
    </li>

<?php endwhile; ?>       

</ul>
<?php
wp_reset_postdata();
		/* After widget - as defined in your specific theme. */
		echo $after_widget;
	}
 }

