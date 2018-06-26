<?php
/*
 
* Plugin Name: UCI Mind Carousel Slider
 
* Description: Creates a simple slider that pull post from a specific category. The post on the slider will dissapear
* 				after a specified month. (attributes are category and expiration)
* Version: 1.0
 
* Author: Chan Sy
 
*/

/*================================ Custom Post Metabox  ================================*/
// All the metabox functions are within this commented block
add_action("admin_init", "custom_metabox");

function custom_metabox(){
	add_meta_box("custom_metabox_01", "Carousel Metabox", "custom_metabox_field", "post", "normal", "low");

}
// Creates the metaboxes where users can enter the details of the image url, date, and source
function custom_metabox_field(){
	global $post;
	$data = get_post_custom($post->ID);
	$img_val = isset($data['carousel_image']) ? esc_attr($data['carousel_image'][0]):'';
	$txt_val = isset($data['carousel_text']) ? esc_attr($data['carousel_text'][0]):'';
	$date_val = isset($data['carousel_date']) ? esc_attr($data['carousel_date'][0]):'';


	echo "<strong>Carousel Image</strong> <input type='text' name='carousel_image' id='carousel_image' value='".$img_val."' style='width:100%;box-sizing:border-box;padding: 12px 20px;margin: 8px 0;' />";

	echo "<strong>Carousel Text</strong> <input type='text' name='carousel_text' id='carousel_text' value='".$txt_val."' style='width:100%;box-sizing:border-box;padding: 12px 20px;margin: 8px 0;' />";

	echo "<strong>Carousel Date</strong> <input type='text' name='carousel_date' id='carousel_date' value='".$date_val."' style='width:100%;box-sizing:border-box;padding: 12px 20px;margin: 8px 0;' />";

	echo "<br><br><strong>NOTE:</strong> If the Carousel Date is left empty it will use the publish date of the post as the date on the carousel slider. If this is for an event make sure to set the expire date.";
}

// Saves the values you entered in the metaboxes when you enter a value and update the post
add_action("save_post", "save_detail");
function save_detail(){
	global $post;
	if(define("DOING_AUTOSAVE") && DOING_AUTOSAVE){
		return $post->ID;
	}

	update_post_meta($post->ID, "carousel_image", $_POST["carousel_image"]);
	update_post_meta($post->ID, "carousel_text", $_POST["carousel_text"]);
	update_post_meta($post->ID, "carousel_date", $_POST["carousel_date"]);


}

/*==================================================================================*/


/*================================ Carousel Slider ================================*/

function expirePost($atts){	
	$atts = shortcode_atts(
		array(
			'category' => 'News Slider',
			'expiration' => '6', 
		), $atts
	);

	$cutOffDate = date("Y/m/d", strtotime("-".$atts['expiration']." months"));
	$year = date('Y', strtotime($cutOffDate));
	$month = date('m', strtotime($cutOffDate));
	$day = date('d', strtotime($cutOffDate));
	$args = array(
		'date_query'     => array(
				array(
					'after'    =>array(
						'year' => $year,
						'month'=> $month,
						'day'  => $day,
					),
					'inclusive'=> true,
				),
		),
        'post_type'      => 'post', // set your custom post type
        'post_status'    => 'publish',
        'category_name'  => $atts['category'], 
        'posts_per_page' => -1,
    );

    $posts = new WP_Query($args);
	$results = "<div class='owl-carousel owl-theme'>";
	

    if($posts->have_posts()){
    	while($posts->have_posts()){
			$posts->the_post();
            // Retrieve the data from the post, such as date, title, metadata, etc. 
            // $post_date = get_the_date("Y/m/d", get_the_ID());
            $post_title = get_the_title();
            $post_date = get_post_meta(get_the_ID(), "carousel_date")[0];
            $post_meta = get_post_meta(get_the_ID(), "carousel_text")[0];
            $post_image = get_post_meta(get_the_ID(), "carousel_image")[0];
            $post_permalink = get_permalink(get_the_ID());


            if($post_date == ''){
            	$post_date = get_the_date("Y/m/d", get_the_ID());
            	$post_date = date("F jS, Y", strtotime($post_date));
            }
          
            

            // Creating each slider item, filling it with the data to be populated
            $results .= "<div class='item' align='center' style='padding-left:10px;padding-right:10px;'>";
            $results .= "<a href='".$post_permalink."' target='_blank'>";
            $results .= "<img src='".$post_image."' style='width:378px;height:328px;' />"; // Change the width and height to resize the carasoel image
            $results .= "</a>";
            $results .= "<a href='".$post_permalink."' target='_blank'>"."<strong>".$post_title."</strong>"."</a>";
            $results .= "<p>".$post_date."<br>";
            $results .= $post_meta."</p>";
            $results .= "</div>";

    	}
    }
    wp_reset_postdata();
	$results .= "</div>";

    return $results;
}

add_shortcode('carousel_slider', expirePost);
?>

