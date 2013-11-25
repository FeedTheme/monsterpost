<?php
/**
 * Misc
 *
 */

//Close
function shortcode_close_icon( $atts ) {
	extract(shortcode_atts(
			array(
				'dismiss' => 'alert'
			), $atts));
	$output = '<a class="close" href="#" data-dismiss="'.$dismiss.'">&times;</a>';

	return $output;
}
add_shortcode('close', 'shortcode_close_icon');

//Well
function shortcode_well( $atts, $content = null ) {
	extract(shortcode_atts(
			array(
				'size' => 'normal'
			), $atts));

	$output = '<div class="well '.$size.'">';
	$output .= do_shortcode($content);
	$output .= '</div>';

	return $output;
}
add_shortcode('well', 'shortcode_well');

//Small
function shortcode_small( $args, $content ) {
	return '<small>'.do_shortcode($content).'</small>';
}
add_shortcode('small', 'shortcode_small');

// Title Box
if (!function_exists('title_shortcode')) {
	function title_shortcode( $atts ) {
		extract(shortcode_atts(
			array(
				'title' => '',
				'subtitle' => '',
				'icon' => ''
			), $atts));

		// get site URL
		$home_url = home_url();
		$output =  '<hgroup class="title-box clearfix">';

		if ($icon!="") {
			$output .= '<span class="title-box_icon">';
			$output .= '<img src="' . $home_url . '/' . $icon .'" alt="" />';
			$output .= '</span>';
		}
		$output .= '<h2 class="title-box_primary">';
		$output .= $title;
		$output .= '</h2>';

		if ($subtitle!="") {
			$output .= '<h3 class="title-box_secondary">';
			$output .= $subtitle;
			$output .= '</h3>';
		}
		$output .= '</hgroup><!-- //.title-box -->';

		return $output;
	}
	add_shortcode('title_box', 'title_shortcode');
}

if (!function_exists('mfc_lightbox_shortcode')) {
	function mfc_lightbox_shortcode( $atts, $content ) {

		// Load script and stylesheet
		wp_register_script('magnific-popup', PARENT_URL.'/js/jquery.magnific-popup.min.js', array('jquery'), '0.9.3', true);
		wp_register_style('magnific', PARENT_URL.'/css/magnific-popup.css', false, '0.9.3', 'all');
		wp_enqueue_script('magnific-popup');
		wp_enqueue_style('magnific');

		$output = '<div class="thumbnail-wrap"><figure class="thumbnail">';
		$output .= do_shortcode($content);
		$output .= '<span class="zoom-icon"></span>';
		$output .= '</figure></div>';

		return $output;
	}
	add_shortcode('mfc_lightbox', 'mfc_lightbox_shortcode');
} ?>