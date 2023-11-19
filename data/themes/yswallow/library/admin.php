<?php

// Remove Admin Bar
// if(is_mobile()){
// add_filter( 'show_admin_bar', '__return_false' );
// }

// Remove .hentry
add_filter('post_class', 'remove_hentry');
function remove_hentry( $classes ) {
    if (!is_single()) $classes = array_diff($classes, array('hentry'));
    return $classes;
}

// Add Class post_class
add_filter('post_class', 'add_class_article');
function add_class_article( $classes ) {
    $classes[] = 'article cf';
    return $classes;
}

// Add Class body
add_filter( 'body_class', 'oc_custom_class' );
function oc_custom_class( $classes ) {
	if (!is_active_sidebar('sidebar-pc') && !is_singular() && !is_mobile()){
		$classes[] = 'sidebar_none';
	}
	if(!is_page_template( 'page-lp.php' ) && !is_singular( 'post_lp' )){
		$classes[] = get_option('post_options_postdesign','pd_normal');
	}
	$classes[] = get_option('post_options_ttl','h_default');
	$classes[] = get_option('post_options_date','date_on');
	$classes[] = get_option('post_options_label', 'catlabeloff');
	$classes[] = get_option('side_options_pannavi', 'pannavi_on');
	return $classes;		
}

// Remove Version
if (!function_exists('vc_remove_wp_ver_css_js')) {
	function vc_remove_wp_ver_css_js( $src ) {
	    if ( strpos( $src, 'ver=' ) )
	        $src = remove_query_arg( 'ver', $src );
	    return $src;
	}
	add_filter( 'style_loader_src', 'vc_remove_wp_ver_css_js', 9999 );
	add_filter( 'script_loader_src', 'vc_remove_wp_ver_css_js', 9999 );
}


// Classic editor body class
function stk_classic_editor_body_class( $initArray ){
    $initArray['body_class'] = 'editor-area';
    return $initArray;
}
add_filter( 'tiny_mce_before_init', 'stk_classic_editor_body_class' );

// include editor css
function stk_custom_editor_style() {
    add_theme_support( 'editor-styles' );
    add_editor_style( 'library/css/editor-style.css' );
}
add_action( 'after_setup_theme', 'stk_custom_editor_style' );


// Gutenberg support
add_action( 'after_setup_theme', 'lp_setup_theme' );
function lp_setup_theme() {
    add_theme_support( 'align-wide' );
}