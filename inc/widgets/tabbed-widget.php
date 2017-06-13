<?php
/**
 * Category_Posts widget class
 *
 * Displays posts from a selected category
 *
 * @since 1.0.0
*/


function newspro_register_Tabbed_widgets() {
    register_widget('newspro_Tabbed_widget');
}
add_action('widgets_init', 'newspro_register_Tabbed_widgets');


class newspro_Tabbed_widget extends WP_Widget 
{

   function __construct() 
    {   
        $widget_ops = array('classname' => 'tabbed_widget clearfix', 'description' => __( 'Tabbed widget', 'newspro') );
       parent::__construct('tabbed_widget', __('newspro: Tabbed', 'newspro'), $widget_ops);
        $this->alt_option_name = 'tabbed_widget';

    }

function widget( $args, $instance ){
$title = apply_filters('widget_title', empty($instance['title']) ? '' : $instance['title'], $instance, $this->id_base);
        ob_start();
        ?>
        <?php

          echo '<div class="tab-section">';
          echo '<div class="nav nav-pills tabs">';
          echo '<div class="">';
          

          echo '<div class="">';
                     echo '<ul class="menu-tab pop_post_header-tab" role="tablist">';
         
               
          foreach($instance as $key=>$value)
          {   
             
              if ($value){
                 
                         
                 echo '<li class="active"><a href="#'.get_category_link( $key ).'" role="tab" data-toggle="tab">' . $category_array[]=$key . '</a></li>';

              } 
             
          }
          echo '</ul>';
        echo '</div>';
        echo '<div class="mopos">';
        echo '</div>';
        echo '</div>';           
        echo '<div class="content-tab">';
                //$instance = get_categories($args);
                    foreach($instance as $key=>$value) { 
                         if ($value){
                        echo '<div class="content" id="' . $category_array[]=$key .'">';
                        $the_query = new WP_Query(array(
                            'post_type' => 'post',
                            'posts_per_page' => 3,
                            'category_name' => $category_array[]=$key
                        ));
                    
                        $counter = 1;
                        $count = 0;
                        while ( $the_query->have_posts() ) : 
                        $the_query->the_post();
                            
                           
                                if($count == 0){
                                    echo '<div class="cat-3-col catwrapslider ">';
                                    echo  '<a href="'.esc_url(get_permalink()).'" >';
                                        echo '<div class="cat-slide slidesection">';
                                        
                                         
                                               if ( has_post_thumbnail() ) { 
                                                   the_post_thumbnail();
                                                 } else { 
                                                echo '<img src="'.esc_attr(get_template_directory_uri()).'/images/img404.jpg" alt="" />';
                                                } 
                                                 echo '<div class="slider-title2">';
                                                 echo '<h3 class="title">'.the_title().'</h3>';
                                                  echo '</div>';
                                                  echo '<div class="cm-comm">
                                                 <div class="col-sm-6 col-xs-6">';
                                                 echo '<span class="cm1 pull-left">'.comments_number().' </span>
                                                 </div>
                                                 <div class="col-sm-6 col-xs-6">';
                                                 echo '<span class="pull-right">'.the_date().'</span>
                                                 </div>
                                                
                                                 </div>


                                                
                                             
                                        </div>';
                                          echo '</a>';
                                        
                                    echo '</div>';

                                    }   
                                    else{
                                        echo '<div class="cat-6-col">';
                                        echo '<a href="'.esc_url(get_permalink()).'">';
                                            echo '<div class="catleft-1 catleft-2">';
                                                  
                                                   if ( has_post_thumbnail() ) { 
                                                       the_post_thumbnail();
                                                     } else { 
                                                    echo '<img src="'.esc_attr(get_template_directory_uri()).'/images/img404.jpg" alt="" />';
                                                    } 
                                                    echo '<div class="slider-title3">';
                                                    echo '<h3 class="title">'.the_title().'</h3>';
                                                    echo '</div>';
                                                    echo '<div class="cm-comm">
                                                    <div class="col-sm-6 col-xs-12">';
                                                    echo '<span class="cm1">'.comments_number().' </span>
                                                    </div>
                                                    <div class="col-sm-6 col-xs-12">';
                                                    echo '<span class="pull-right">'.the_date().'</span>
                                                    </div>
                                                    </div>
                                                    
                                                    </div>';
                                                    echo '</a>';
                                                    echo '</div>';
                                         }

                                         $count++;
                        endwhile; 
                        
                  echo '</div>';
            }   
    } 
    wp_reset_postdata();
    echo '</div>';

            echo '</div>';
            echo '</div>';
    

       
    }


 function update( $new_instance, $old_instance ) 
    {
       $args = array(
       
        //your selections here.
    ); 
    $categories = get_categories( $args );   // returns an array of category objects
    $arrlength=count($categories);

    for($x=0;$x<$arrlength;$x++){
        $tempArray[$categories[$x]->slug] = '';  
    }
    $instance = $old_instance;       
    $new_instance = wp_parse_args( (array) $new_instance, $tempArray );

    for($x=0;$x<$arrlength;$x++){

        $instance[$categories[$x]->slug] = $new_instance[$categories[$x]->slug] ? 1 : 0;
    }
    return $instance;
    }

     function form( $instance ) 
    {

        echo '<p>Choose your categories of interest. Multiple selections are fine.</p>';

    $args = array(
       
         //your selections here.  Use same args as update function, duh.
    ); 
    
    $categories = get_categories( $args );   // returns an array of category objects
    $arrlength= count($categories);

    for($x=0;$x<$arrlength;$x++){

        $tempArray[$this->get_field_id($categories[$x]->slug)] = 'off';
    }
    $instance = wp_parse_args( (array) $instance, $tempArray );

    for($x=0;$x<$arrlength;$x++){
                                                                                       
        $tempCheckFlag[$categories[$x]->slug] = isset($instance[$categories[$x]->slug]) ? checked( (bool)$instance[$categories[$x]->slug], true, false) : false;
        // could also use 'checked()' function    
        // Yup, this could be combined with the for loop below, 
        // listed here seperately to enhance understanding of what's going on.
    }

    for($x=0;$x<$arrlength;$x++)
    {
        echo '<p><input class="checkbox" type="checkbox" value="1" id="'.esc_attr($this->get_field_id($categories[$x]->slug)).'" name="'.esc_attr($this->get_field_name($categories[$x]->slug)).'"'.$tempCheckFlag[$categories[$x]->slug].'>'.$categories[$x]->name.'  </p>';  
        //echo '<p><input class ="checkbox" type="checkbox" value="1" id="'.$this->get_field_id($categories[$x]->slug).'" name="'.$this->get_field_name($categories[$x]->slug).'"'.$tempCheckFlag[$categories[$x]->slug].'>'.$categories[$x]->name.'  (Category # '.$categories[$x]->term_id.' )</p>';
    }

}
 function flush_widget_cache() 
    {
        wp_cache_delete('tabbed_widget', 'widget');
    }
}

