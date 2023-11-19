<?php

// is_mobile
function is_mobile(){
$useragents = array(
'iPhone',
'iPod',
'Android.*Mobile',
'Windows.*Phone',
'dream',
'CUPCAKE',
'blackberry9500',
'blackberry9530',
'blackberry9520',
'blackberry9550',
'blackberry9800',
'webOS',
'incognito',
'webmate'
);
$pattern = '/'.implode('|', $useragents).'/i';
return preg_match($pattern, $_SERVER['HTTP_USER_AGENT']);
}
// IE11判定
function is_ie() {
	$ua = $_SERVER['HTTP_USER_AGENT'];
    if (strstr($ua, 'Trident') || strstr($ua, 'MSIE')) {
        $is_ie = true;
    } else {
        $is_ie = false;
    }
    return $is_ie;
}

// title tags
function setup_theme() {
   add_theme_support( 'title-tag' );
}
add_action( 'after_setup_theme', 'setup_theme' );


function opencage_rss_version() {
	return '';
}
add_filter( 'the_generator', 'opencage_rss_version' );


function opencage_remove_wp_widget_recent_comments_style() {
	if ( has_filter( 'wp_head', 'wp_widget_recent_comments_style' ) ) {
		remove_filter( 'wp_head', 'wp_widget_recent_comments_style' );
	}
}
add_filter( 'wp_head', 'opencage_remove_wp_widget_recent_comments_style', 1 );


function opencage_remove_recent_comments_style() {
	global $wp_widget_factory;
	if (isset($wp_widget_factory->widgets['WP_Widget_Recent_Comments'])) {
		remove_action( 'wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style') );
	}
}
add_action( 'wp_head', 'opencage_remove_recent_comments_style', 1 );



// include SCRIPTS
if (!is_admin()) {
	function register_script(){
		wp_deregister_script( 'jquery' );
		wp_register_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js', array(), '1.12.2' );
		wp_register_script( 'slick', get_theme_file_uri('/library/js/slick.min.js'), array('jquery'), '1.5.9', true );
		wp_register_script( 'remodal', get_theme_file_uri('/library/js/remodal.js'), array('jquery'), '1.0.0', true );
		wp_register_script( 'css-modernizr', get_theme_file_uri('/library/js/modernizr.custom.min.js'), array(), '2.5.3', true );
		wp_register_script( 'wow', get_theme_file_uri('/library/js/wow.min.js'), array('jquery'), '', true );
		wp_register_script( 'main-js', get_theme_file_uri('/library/js/scripts.js'), array( 'jquery' ), '', true );
	}
	function add_script() {
		register_script();
			wp_enqueue_script('jquery');
			wp_enqueue_script( 'remodal' );
			wp_enqueue_script( 'main-js' );
			wp_enqueue_script( 'css-modernizr' );
		if(!wp_is_mobile() && !strstr($_SERVER['HTTP_USER_AGENT'], 'Trident') && !strstr($_SERVER['HTTP_USER_AGENT'], 'MSIE') && (get_option('side_options_animatenone') == "ani_on")){
			wp_enqueue_script( 'wow' );
		}
		if(is_front_page() || is_home()) {
			wp_enqueue_script( 'slick' );
		}
	}
	add_action('wp_enqueue_scripts', 'add_script');
}


// include CSS
function register_style() {
	wp_register_style('style', get_bloginfo('template_directory').'/style.css');
	wp_register_style('fontawesome', get_theme_file_uri('/library/css/font-awesome.min.css'));
	wp_register_style('gf_Notojp', 'https://fonts.googleapis.com/css?family=Noto+Sans+JP&display=swap');
	wp_register_style('slick', get_theme_file_uri('/library/css/slick.css'));
	wp_register_style('remodal', get_theme_file_uri('/library/css/remodal.css'));
	wp_register_style('animate', get_theme_file_uri('/library/css/animate.min.css'));
}
	function add_stylesheet() {
		register_style();
			wp_enqueue_style('style');
			if((get_option('side_options_gfnotojp', 'notojp_on') == 'notojp_on')){
				wp_enqueue_style('gf_Notojp');
			}
			wp_enqueue_style('fontawesome');
			if((get_option('side_options_animatenone', 'ani_on') == "ani_on")){
				wp_enqueue_style('animate');
			}
			if(is_front_page() || is_home()){
				wp_enqueue_style('slick');
			}
			wp_enqueue_style('remodal');
	}
add_action('wp_enqueue_scripts', 'add_stylesheet');


// [beta] add class lozad
if (get_option('advanced_lozad_js', 'off') == 'on' && !is_admin() && !is_ie()) {

	function add_image_loadinglazy( $the_content ) {
	    if(is_feed() || is_preview())
	        return $the_content;
	
	    if ( false !== strpos( $the_content, 'loading' ) )
	        return $the_content;
	
	    
	    $the_content = preg_replace(
	        '#<img([^>]+?)src=[\'"]?([^\'"\s>]+)[\'"]?([^>]*)>#',
	        '<img${1}src="${2}"${3} loading="lazy"><noscript><img${1}src="${2}"${3} ></noscript>',
	        $the_content );
	
	    return $the_content;
	}
	add_filter( 'the_content', 'add_image_loadinglazy', 99 );
	add_filter( 'post_thumbnail_html', 'add_image_loadinglazy', 11 );
	add_filter( 'get_avatar', 'add_image_loadinglazy', 11 );
	add_filter('widget_text', 'add_image_loadinglazy', 11 );

}

// CategoryLabel（post）
if (!function_exists('postcatname')) {
	function postcatname() {
		if(get_option('post_options_label', 'catlabeloff') == 'catlabelon' || is_singular('post')){
	
			$cat = get_the_category();
			$cat = $cat[0];
			$catid = $cat->cat_ID;
			$catname = $cat->name;
			echo '<span class="cat-name cat-id-' . $catid . '">' . $catname . '</span>';
	
		}
	}
}

// CategoryLabel（archive）
if (!function_exists('archivecatname')) {
	function archivecatname() {
		if(get_option('post_options_label', 'catlabeloff') == 'catlabelon' || is_archive()){
			if(get_post_type() == 'post'){
				$cat = get_the_category();
				$cat = $cat[0];
				$catid = $cat->cat_ID;
				$catname = $cat->name;
				echo '<span class="osusume-label cat-name cat-id-' . $catid . '">' . $catname . '</span>';
			} else {
				echo '<span class="osusume-label cat-name cat-id-page"></span>';
			}
		}
	}
}

// breadcrumb
function stk_itemprop_position($position){
	return '<meta itemprop="position" content="'. $position .'" />';
}

if (!function_exists('breadcrumb')) {
	function breadcrumb($divOption = array("id" => "breadcrumb", "class" => "breadcrumb animated fadeIn cf")){
	    global $post;
	    $str ='';
	    if(get_option('side_options_pannavi', 'pannavi_on') !== 'pannavi_off'){
		    if(!is_home()&&!is_front_page()&&!is_admin() ){
		        $tagAttribute = '';
		        foreach($divOption as $attrName => $attrValue){
		            $tagAttribute .= sprintf(' %s="%s"', $attrName, $attrValue);
		        }
		        $i = 1;
		        $str.= '<div'. $tagAttribute .'>';
		        $str.= '<div class="wrap"><ul itemscope itemtype="http://schema.org/BreadcrumbList">';
		        $str.= '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="bc_homelink"><a itemprop="item" href="'. esc_url(home_url()) .'/"><span itemprop="name"> HOME</span></a>' . stk_itemprop_position($i) . '</li>';
		        $i++;

		        if(is_category()) {
		            $cat = get_queried_object();
		            if($cat -> parent != 0){
		                $ancestors = array_reverse(get_ancestors( $cat -> cat_ID, 'category' ));
		                foreach($ancestors as $ancestor){
		                    $str.='<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="'. get_category_link($ancestor) .'"><span itemprop="name">'. get_cat_name($ancestor) .'</span></a>' . stk_itemprop_position($i) . '</li>';
		                    $i++;
		                }
		            }
		            $str.='<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><span itemprop="name">'. $cat -> name . '</span>' . stk_itemprop_position($i) . '</li>';
		            
		        } elseif ( is_post_type_archive() ) {
			        $cpt = get_query_var( 'post_type' );
			        $str.= '<li>' . get_post_type_object( $cpt )->label . '</li>';
			        
			    } elseif ( is_tax() ) {
				    //taxonomy
				    $query_obj = get_queried_object();
					$post_types = get_taxonomy( $query_obj->taxonomy )->object_type;
					$cpt = $post_types[0];
					$str.= '<li><a href="'. get_post_type_archive_link( $cpt ) . '"><span>'. get_post_type_object( $cpt )->label .'</span></a></li>';
					$taxonomy = get_query_var( 'taxonomy' );
					$term = get_term_by( 'slug', get_query_var( 'term' ), $taxonomy );
					if ( is_taxonomy_hierarchical( $taxonomy ) && $term->parent != 0 ) {
						$ancestors = array_reverse( get_ancestors( $term->term_id, $taxonomy ) );
						foreach ( $ancestors as $ancestor_id ) {
							$ancestor = get_term( $ancestor_id, $taxonomy );
							$str.='<li><a href="'. get_term_link( $ancestor, $term->slug ) .'"><span>'. $ancestor->name .'</span></a></li>';
						}
					}
					$str.='<li>'. $term->name .'</li>';
					
		        } elseif(is_single()){
		            $post_type = get_post_type( $post->ID );
			        if ( $post_type == 'post' ) {
				        // normal post
			            $categories = get_the_category($post->ID);
			            $cat = $categories[0];
			            if($cat -> parent != 0){
			                $ancestors = array_reverse(get_ancestors( $cat -> cat_ID, 'category' ));
			                foreach($ancestors as $ancestor){
			                    $str.='<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="'. get_category_link($ancestor).'"><span itemprop="name">'. get_cat_name($ancestor). '</span></a>' . stk_itemprop_position($i) . '</li>';
								$i++;
			                }
			            }
			            $str.='<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="'. get_category_link($cat -> term_id). '"><span itemprop="name">'. $cat-> cat_name . '</span></a>' . stk_itemprop_position($i) . '</li>';
						$i++;
			            $str.= '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="bc_posttitle"><span itemprop="name">'. $post -> post_title .'</span>' . stk_itemprop_position($i) . '</li>';
			        } else {
						// custom post type
						$post_type_object = get_post_type_object( $post->post_type );
						if($post_type_object->has_archive !== false){
							$str.='<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="'. get_post_type_archive_link(get_post_type()) .'"><span itemprop="name">'. $post_type_object->labels->name .'</a></span>' . stk_itemprop_position($i) . '</li>';
						}
						$i++;
						$str.= '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="bc_posttitle"><span itemprop="name">'. $post -> post_title .'</span>' . stk_itemprop_position($i) . '</li>';
				    }
				    
		        } elseif(is_page()){
		            if($post -> post_parent != 0 ){
		                $ancestors = array_reverse(get_post_ancestors( $post->ID ));
		                foreach($ancestors as $ancestor){
		                    $str.='<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="'. get_permalink($ancestor).'"><span itemprop="name">'. get_the_title($ancestor) .'</span></a>' . stk_itemprop_position($i) . '</li>';
							$i++;
		                }
		            }
		            $str.= '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="bc_posttitle"><span itemprop="name">'. $post -> post_title .'' . stk_itemprop_position($i) . '</span></li>';
		            
		        } elseif(is_date()){
					if( is_year() ){
						$str.= '<li>' . get_the_time('Y') . '年</li>';
					} else if( is_month() ){
						$str.= '<li><a href="' . get_year_link(get_the_time('Y')) .'">' . get_the_time('Y') . '年</a></li>';
						$str.= '<li>' . get_the_time('n') . '月</li>';
					} else if( is_day() ){
						$str.= '<li><a href="' . get_year_link(get_the_time('Y')) .'">' . get_the_time('Y') . '年</a></li>';
						$str.= '<li><a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('n') . '月</a></li>';
						$str.= '<li>' . get_the_time('j') . '日</li>';
					}
					if(is_year() && is_month() && is_day() ){
						$str.= '<li>' . wp_title('', false) . '</li>';
					}
		        } elseif(is_search()) {
		            $str.='<li><span>「'. get_search_query() .'」で検索した結果</span></li>';
		        } elseif(is_author()){
		            $str .='<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><span itemprop="name">投稿者 : '. get_the_author_meta('display_name', get_query_var('author')).'</span>' . stk_itemprop_position($i) . '</li>';
		        } elseif(is_tag()){
		            $str.='<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><span itemprop="name">タグ : '. single_tag_title( '' , false ). '</span>' . stk_itemprop_position($i) . '</li>';
		        } elseif(is_attachment()){
		            $str.= '<li><span>'. $post -> post_title .'</span></li>';
		        } elseif(is_404()){
		            $str.='<li>ページがみつかりません。</li>';
		        } else{
		            $str.='';
		        }
		        $str.='</ul></div>';
		        $str.='</div>';
		    }
		}
	    echo $str;
	}
}

// pagination
if (!function_exists('pagination')) {
	function pagination($pages = '', $range = 2){
	     global $wp_query, $paged;
	
		$big = 999999999;
	
		echo "<nav class=\"pagination cf\">";
	 	echo paginate_links( array(
			'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
			'current' => max( 1, get_query_var('paged') ),
			'prev_text'    => __('<'),
			'next_text'    => __('>'),
			'type'    => 'list',
			'total' => $wp_query->max_num_pages
		) );
		echo "</nav>\n";
	}
}

// search form
if (!function_exists('my_search_form')) {
	function my_search_form( $form ) {
		$form = '<form role="search" method="get" id="searchform" class="searchform cf" action="' . esc_url(home_url( '/' )) . '" >
		<input type="search" placeholder="キーワードを入力" value="' . get_search_query() . '" name="s" id="s" />
		<button type="submit" id="searchsubmit"></button>
		</form>';
		return $form;
	}
	add_filter( 'get_search_form', 'my_search_form' );
}


// original thumbnails
if (!function_exists('add_mythumbnail_size')) {
	function add_mythumbnail_size() {
	add_theme_support('post-thumbnails');
	add_image_size( 'home-thum', 486, 290, true );
	add_image_size( 'post-thum', 300, 200, true );
	}
	add_action( 'after_setup_theme', 'add_mythumbnail_size' );
}

// Google Analytics
if ( get_option( 'other_options_ga' ) ) {
function meta_analytics() {

$analyticstag = get_option( 'other_options_ga' );
$headanalytics = <<<EOM
<script async src="https://www.googletagmanager.com/gtag/js?id={$analyticstag}"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', '{$analyticstag}');
</script>
EOM;
echo $headanalytics;
}
add_action( 'wp_head', 'meta_analytics', 999);
}

// head tags
add_action( 'wp_head', 'meta_headtags' );
function meta_headtags() {
	$output = get_option( 'other_options_headcode' );
	echo $output;
}

// wp_body_open hook
if ( ! function_exists( 'wp_body_open' ) ) {
    function wp_body_open() {
        do_action( 'wp_body_open' );
    }
}

// first of body
add_action( 'wp_body_open', 'meta_bodytags', 999);
function meta_bodytags() {
	$output = get_option( 'other_options_bodycode' );
	echo $output;
}

// foot tags
add_action( 'wp_footer', 'meta_foottags', 999);
function meta_foottags() {
	$output = get_option( 'other_options_footercode' );
	echo $output;
}

// page top button
add_action( 'wp_footer', 'pagetop' );
function pagetop() {
$pagetop = <<< EOM
<div id="page-top">
	<a href="#header" class="pt-button" title="ページトップへ"></a>
</div>
EOM;
echo $pagetop;
}


// Child Category Accordion
if (!function_exists('cat_accordion') && (get_option('side_options_cataccordion', 'accordion_on') == "accordion_on" )) {
add_action( 'wp_footer', 'cat_accordion' );
function cat_accordion() {
$cat_accordion = <<< EOM
<script>
$(function(){
	$(".widget_categories li, .widget_nav_menu li").has("ul").toggleClass("accordionMenu");
	$(".widget ul.children , .widget ul.sub-menu").after("<span class='accordionBtn'></span>");
	$(".widget ul.children , .widget ul.sub-menu").hide();
	$("ul .accordionBtn").on("click", function() {
		$(this).prev("ul").slideToggle();
		$(this).toggleClass("active");
	});
});
</script>
EOM;
echo $cat_accordion;
}
}


// page tags
function add_tag_to_page() {
 register_taxonomy_for_object_type('post_tag', 'page');
}
add_action('init', 'add_tag_to_page');

// category HTML tags
remove_filter( 'pre_term_description', 'wp_filter_kses' );

// Update date
function get_mtime($format) {
    $mtime = get_the_modified_time('Ymd');
    $ptime = get_the_time('Ymd');
    if ($ptime > $mtime) {
        return get_the_time($format);
    } elseif ($ptime === $mtime) {
        return null;
    } else {
        return get_the_modified_time($format);
    }
}

// embedded content size
if ( ! isset( $content_width ) ) {
	$content_width = 800;
}

//iframe setting
function wrap_iframe_in_div($the_content) {
if ( is_singular() ) {
//YouTube
$the_content = preg_replace('/<iframe[^>]+?youtube\.com[^<]+?<\/iframe>/is', '<div class="youtube-container">${0}</div>', $the_content);
}
return $the_content;
}
add_filter('the_content','wrap_iframe_in_div');



// user page description html
remove_filter('pre_user_description', 'wp_filter_kses');

// user item delete & plus
if (!function_exists('update_profile_fields')) {
	function update_profile_fields( $contactmethods ) {
	    //delete
	    unset($contactmethods['aim']);
	    unset($contactmethods['jabber']);
	    unset($contactmethods['yim']);
	    //plus
	    $contactmethods['twitter'] = 'Twitter';
	    $contactmethods['facebook'] = 'Facebook';
	    $contactmethods['googleplus'] = 'Google+';
	    $contactmethods['instagram'] = 'Instagram';
	    $contactmethods['youtube'] = 'YouTube';
	    $contactmethods['userposition'] = '肩書';
	     
	    return $contactmethods;
	}
	add_filter('user_contactmethods','update_profile_fields',10,1);
}

// Self pinback
function no_self_pingst( &$links ) {
    $home = home_url();
    foreach ( $links as $l => $link )
        if ( 0 === strpos( $link, $home ) )
            unset($links[$l]);
}
add_action( 'pre_ping', 'no_self_pingst' );


// archives ptags
function opencage_filter_ptags_on_images($content){
	return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}
add_filter( 'the_content', 'opencage_filter_ptags_on_images' );

// more
if (!function_exists('opencage_excerpt_more')) {
	function opencage_excerpt_more($more) {
		global $post;
		return '...';
	}
	add_filter( 'excerpt_more', 'opencage_excerpt_more' );
}

// Home Widget
if (!function_exists('parts_add_top')) {
	function parts_add_top(){
		if ( is_front_page()&&!is_admin()){
			if ( is_active_sidebar( 'home-top_mobile' ) && is_mobile() ){
				echo '<div class="homeadd_wrap homeaddtop mobile">';
				dynamic_sidebar( 'home-top_mobile' );
				echo '</div>';
			}
			if ( is_active_sidebar( 'home-top' ) && !is_mobile() ){
				echo '<div class="homeadd_wrap homeaddtop">';
				dynamic_sidebar( 'home-top' );
				echo '</div>';
			}
		}
	}
}

if (!function_exists('parts_add_bottom')) {
	function parts_add_bottom(){
		if ( is_front_page()&&!is_admin()){
			if ( is_active_sidebar( 'home-bottom_mobile' ) && is_mobile() ){
				echo '<div class="homeadd_wrap homeaddbottom mobile">';
				dynamic_sidebar( 'home-bottom_mobile' );
				echo '</div>';
			}
			if ( is_active_sidebar( 'home-bottom' ) && !is_mobile() ){
				echo '<div class="homeadd_wrap homeaddbottom">';
				dynamic_sidebar( 'home-bottom' );
				echo '</div>';
			}
		}
	}
}

// include functions file
require_once( 'library/customizer.php' );
require_once( 'library/shortcode.php' );
require_once( 'library/widget.php' );
require_once( 'library/admin.php' );
require_once( 'library/classic-style-select.php' );


//UPDATE CHECK
require 'library/theme-update-checker.php';
$example_update_checker = new ThemeUpdateChecker(
'yswallow',
'http://open-cage.com/theme-update/swallow/update-info.json'
);

// LP CUSTOM POST
if (!function_exists('custom_post_lp')) {
function custom_post_lp() { 
	register_post_type( 'post_lp',
		array( 'labels' => array(
			'name' => __( 'ランディングページ', 'opencagetheme' ),
			'singular_name' => __( 'ランディングページ', 'opencagetheme' ),
			'all_items' => __( 'すべてのランディングページ', 'opencagetheme' ),
			'add_new' => __( '新規作成', 'opencagetheme' ),
			'add_new_item' => __( 'ランディングページをつくる', 'opencagetheme' ),
			'edit' => __( '編集', 'opencagetheme' ),
			'edit_item' => __( 'ランディングページを編集', 'opencagetheme' ),
			'new_item' => __( 'New Post Type', 'opencagetheme' ),
			'view_item' => __( 'ランディングページを表示', 'opencagetheme' ),
			'search_items' => __( 'ランディングページを検索', 'opencagetheme' ),
			'not_found' =>  __( 'Nothing found in the Database.', 'opencagetheme' ),
			'not_found_in_trash' => __( 'Nothing found in Trash', 'opencagetheme' ),
			'parent_item_colon' => ''
			),
			'description' => __( 'ランディングページをつくれます。', 'opencagetheme' ),
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'show_in_rest' => true,
			'menu_position' => 8,
			'menu_icon' => get_theme_file_uri('/library/images/custom-post-icon.png'),
			'rewrite'	=> array( 'slug' => 'post_lp', 'with_front' => false ),
			'has_archive' => 'post_lp',
			'capability_type' => 'page',
			'hierarchical' => true,
			'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'page-attributes')
		)
	);
}
add_action( 'init', 'custom_post_lp');
}