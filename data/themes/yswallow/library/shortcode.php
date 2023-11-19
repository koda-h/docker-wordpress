<?php

function shortcode_empty_paragraph_fix($content) {
    $array = array (
        '<p>[' => '[',
        ']</p>' => ']',
        ']<br />' => ']'
    );
 
    $content = strtr($content, $array);
    return $content;
}
add_filter('the_content', 'shortcode_empty_paragraph_fix');



// 関連記事を呼び出す
function kanrenFunc($atts , $content = null) {

	$postid = (isset($atts['postid'])) ? esc_attr($atts['postid']) : null;
	$pageid = (isset($atts['pageid'])) ? esc_attr($atts['pageid']) : null;

	if($postid || $pageid) {
		
		$postids = (explode(',',$postid));
		$datenone = (isset($atts['date'])) ? esc_attr($atts['date']) : null;
		$order = (isset($atts['order'])) ? esc_attr($atts['order']) : "DESC";
		$orderby = (isset($atts['orderby'])) ? esc_attr($atts['orderby']) : "post_date";
		$labelclass = isset($atts['label']) ? ' labelnone' : "";
		$target = isset($atts['target']) ? ' target="_blank"' : "";
		
		$echo ="";
	
		$args = array(
			"post_type" => array('post','page'),
		    'posts_per_page' => -1,
			'post__in' => $postids,
			'page_id' => $pageid,
		    'orderby' => $orderby,
		    'order' => $order,
		    'post_status' => 'publish',
		    'suppress_filters' => true,
		    'ignore_sticky_posts' => true,
		    'no_found_rows' => true
		);
	
		$the_query = new WP_Query( $args );
		
		if ( $the_query->have_posts() ) {
			while ( $the_query->have_posts() ) {
				$the_query->the_post();

				$post_id ="";
				
				$url = esc_url(get_permalink());
				if(has_post_thumbnail()){ $postimg = '<figure class="eyecatch thum">' .get_the_post_thumbnail($post_id, 'home-thum'). '</figure>';} else { $postimg = ""; }
				if(!$datenone && !$pageid){ $postdate = '<span class="date gf">' . get_the_date() . '</span>';} else { $postdate = null; }
	
				$postttl = '<p class="ttl">' . esc_attr(get_the_title()) . '</p>';
					
				$echo .= '<div class="related_article cf' . $labelclass . '"><a href="' . $url . '"' . $target .'>' .$postimg. '<div class="meta inbox">' . $postttl . $postdate . '</div></a></div>';
			} // LOOP END
			wp_reset_postdata();
		}
	
		return $echo;

	} else {
		return null;
	}

}
add_shortcode('kanren','kanrenFunc');


// 関連記事を呼び出す（ラベル無し）
function kanren2Func($atts , $content = null) {

	$postid = (isset($atts['postid'])) ? esc_attr($atts['postid']) : null;
	$pageid = (isset($atts['pageid'])) ? esc_attr($atts['pageid']) : null;

	if($postid || $pageid) {
		
		$postids = (explode(',',$postid));
		$datenone = (isset($atts['date'])) ? esc_attr($atts['date']) : null;
		$order = (isset($atts['order'])) ? esc_attr($atts['order']) : "DESC";
		$orderby = (isset($atts['orderby'])) ? esc_attr($atts['orderby']) : "post_date";
		$target = isset($atts['target']) ? ' target="_blank"' : "";
		
		$echo ="";
	
		$args = array(
			"post_type" => array('post','page'),
		    'posts_per_page' => -1,
			'post__in' => $postids,
			'page_id' => $pageid,
		    'orderby' => $orderby,
		    'order' => $order,
		    'post_status' => 'publish',
		    'suppress_filters' => true,
		    'ignore_sticky_posts' => true,
		    'no_found_rows' => true
		);
	
		$the_query = new WP_Query( $args );
		
		if ( $the_query->have_posts() ) {
			while ( $the_query->have_posts() ) {
				$the_query->the_post();

				$post_id ="";

				$url = esc_url(get_permalink());
				if(has_post_thumbnail()){ $postimg = '<figure class="eyecatch thum">' .get_the_post_thumbnail($post_id, 'home-thum'). '</figure>';} else { $postimg = ""; }
				if(!$datenone && !$pageid){ $postdate = '<span class="date gf">' . get_the_date() . '</span>';} else { $postdate = null; }
	
				$postttl = '<p class="ttl">' . esc_attr(get_the_title()) . '</p>';
					
				$echo .= '<div class="related_article cf labelnone"><a href="' . $url . '"' . $target .'>' .$postimg. '<div class="meta inbox">' . $postttl . $postdate . '</div></a></div>';
			} // LOOP END
			wp_reset_postdata();
		}
	
		return $echo;

	} else {
		return null;
	}
	
}
add_shortcode('kanren2','kanren2Func');


//グリッド　wrap
function colwrapFunc( $atts, $content = null ) {
	extract( shortcode_atts( array(
        'class' => '',
    ), $atts ) );
    
    return '<div class="column-wrap cf ' . $class . '">' . do_shortcode($content) . '</div>';
}
add_shortcode('colwrap', 'colwrapFunc');

//グリッド　デスクトップ・ダブレット2カラム 以下1カラム
function col2Func( $atts, $content = null ) {
	extract( shortcode_atts( array(
        'class' => '',
    ), $atts ) );
    
    return '<div class="col2' . $class . '">' . do_shortcode($content) . '</div>';
}
add_shortcode('col2', 'col2Func');

//グリッド
function col3Func( $atts, $content = null ) {
    return '<div class="col3">' . do_shortcode($content) . '</div>';
}
add_shortcode('col3', 'col3Func');


// CTA
function ctainnerFunc( $atts, $content = null ) {
    return '<div class="cta-inner"><div class="inner cf">' . do_shortcode($content) . '</div></div>';
}
add_shortcode('cta_in', 'ctainnerFunc');

//CTA COPYWRITING
function ctacopyFunc( $atts, $content = null ) {
    extract( shortcode_atts( array(
        'class' => '',
    ), $atts ) );
     
    return '<h2 class="cta_ttl"><span>' . $content . '</span></h2>';
}
add_shortcode('cta_ttl', 'ctacopyFunc');


// CTAボタン
function ctabtnFunc( $atts, $content = null ) {
    extract( shortcode_atts( array(
        'link' => '',
    ), $atts ) );
     
    return '<div class="btn-wrap aligncenter big lightning cta_btn"><a href="' . $link . '">' . $content . '</a></div>';
}
add_shortcode('cta_btn', 'ctabtnFunc');

// 補足説明・注意
function asideFunc( $atts, $content = null ) {
    extract( shortcode_atts( array(
        'type' => '',
    ), $atts ) );
     
    return '<div class="supplement '. $type . '">' . do_shortcode($content) . '</div>';
}
add_shortcode('aside', 'asideFunc');


// ボタン
function btnFunc( $atts, $content = null ) {
	$class = (isset($atts['class'])) ? esc_attr($atts['class']) : null;
    
    return '<div class="btn-wrap aligncenter ' . $class. '">' . $content . '</div>';
}
add_shortcode('btn', 'btnFunc');

//吹き出し
function voiceFunc( $atts, $content = null ) {
    extract( shortcode_atts( array(
        'icon' => '',
        'type' => '',
        'name' => '',
    ), $atts ) );
     
    return '<div class="voice cf ' .$type. '"><figure class="icon"><img src="' . $icon . '"><figcaption class="name">' . $name . '</figcaption></figure><div class="voicecomment">' . do_shortcode($content) . '</div></div>';
}
add_shortcode('voice', 'voiceFunc');

// コンテンツボックス
function contentboxFunc($atts , $content = null) {
	if($atts && $content) {
		$class = (isset($atts['class'])) ? esc_attr($atts['class']) : null;
		$title = (isset($atts['title'])) ? esc_attr($atts['title']) : null;
		if(!$title && $class) {
			return '<div class="c_box ' . $class . '">' . do_shortcode($content) . '</div>';

		} elseif($title && $class) {
			return '<div class="c_box intitle ' . $class . '"><div class="box_title"><span>' . $title . '</span></div>'. do_shortcode($content) .'</div>';
		}
	}
}
add_shortcode('box','contentboxFunc');

// アコーディオン
function accordionFunc($atts, $content = null) {
	$title = isset($atts['title']) ? $atts['title'] : null;
	$type = isset($atts['type']) ? ' type_'.$atts['type'] : null;
	$randid = uniqid('input');
	if ($title) {
		$output = '<div class="accordion' . $type . '"><input type="checkbox" id="' . $randid . '" class="accordion_check" /><label for="' . $randid . '" class="accordion_label">' . $title . '</label><div class="accordion_content">' . do_shortcode($content) . '</div></div>';
		return $output;
	} else {
		return null;
	}
}
add_shortcode('open','accordionFunc');

// post list (category & new post list)
function postlistFunc($atts , $content = null) {
	$catid = (isset($atts['catid'])) ? esc_attr($atts['catid']) : null;
	$show = (isset($atts['show'])) ? esc_attr($atts['show']) : 5;
	$dateon = (isset($atts['date'])) ? esc_attr($atts['date']) : null;
	$type = (isset($atts['type'])) ? ' type'.esc_attr($atts['type']) : " typesimple";

	$order = (isset($atts['order'])) ? esc_attr($atts['order']) : "DESC";
	$orderby = (isset($atts['orderby'])) ? esc_attr($atts['orderby']) : "post_date";
	
	$echo = "";
	
	if( empty( $catid )){
		$args = array(
		    'posts_per_page' => $show,
		    'offset' => 0,
		    'orderby' => $orderby,
		    'order' => $order,
		    'post_type' => array('post'),
		    'post_status' => 'publish',
		    'suppress_filters' => true,
		    'ignore_sticky_posts' => true,
		    'no_found_rows' => true
		);
		
		$the_query = new WP_Query( $args );
		if ( $the_query->have_posts() ) {

			$btntext = (isset($atts['btntext'])) ? esc_attr($atts['btntext']) : null;
			$ttl = (isset($atts['ttl'])) ? '<dt class="catttl">' . esc_attr($atts['ttl']) . '</dt>' : '<dt class="catttl"><span>新着記事</span></dt>';
			$ttlimg = (isset($atts['ttlimg'])) ? '<dt class="catttl ttlimg"><img src="' . esc_attr($atts['ttlimg']) . '"></dt>' : $ttl;

			$echo .= '<dl class="cat_postlist new_postlist' . $type . '">' . $ttlimg . '<dd><ul>';

			while ( $the_query->have_posts() ) {
			$the_query->the_post();

				if(has_post_thumbnail()){
					$post_id = "";
					$postimg = '<figure class="eyecatch">' .get_the_post_thumbnail($post_id, 'home-thum'). '</figure>';
				} else {
					$postimg = '<figure class="eyecatch noimg"></figure>';
				}
				$postttl = '<div class="ttl">' . get_the_title() . '</div>';
				
				if($dateon !== 'off'){ $postdate = '<span class="date gf">' . get_the_date() . '</span>';} else { $postdate = null;}
				
				$postlinkbefore = '<a href="'. get_permalink() .'">';
				
				$echo .= '<li>'. $postlinkbefore . $postimg . '<div class="postbody">' . $postttl . $postdate . '</div></a></li>';
			
			}
			wp_reset_postdata();
			
			$echo .= '</ul>';
			$btnlink = (isset($atts['btnlink'])) ? esc_attr($atts['btnlink']) : null;
			if(!$btntext == null && !$btnlink == null) {
				$echo .= '<div class="btn-wrap simple arrow"><a href="'. $btnlink .'">'. $btntext .'</a></div>';
			}
			$echo .= '</dd></dl>';
		
		}

	} else {

		$args = array(
			'type'                     => 'post',
			'child_of'                 => 0,
			'parent'                   => '',
			'orderby'                  => 'none',
			'order'                    => 'ASC',
			'hide_empty'               => 1,
			'hierarchical'             => 1,
			'exclude'                  => '',
			'include'                  => $catid,
			'number'                   => '',
			'taxonomy'                 => 'category',
			'pad_counts'               => false 
		); 
		
		$categories = get_categories( $args );
	
		foreach($categories as $category) :
		

			$args = array(
				'cat'=> $category->cat_ID,
				'posts_per_page' => $show
			);
	
			
			$the_query = new WP_Query( $args );
			if ( $the_query->have_posts() ) {
			
				$btntext = (isset($atts['btntext'])) ? esc_attr($atts['btntext']) : null;
				$ttl = (isset($atts['ttl'])) ? '<dt class="catttl">' . esc_attr($atts['ttl']) . '</dt>' : '<dt class="catttl"><span>' . $category->cat_name . '</span></dt>';
				$ttlimg = (isset($atts['ttlimg'])) ? '<dt class="catttl ttlimg"><img src="' . esc_attr($atts['ttlimg']) . '"></dt>' :  $ttl;
				
				$echo .= '<dl class="cat_postlist' . $type . '">' . $ttlimg . '<dd><ul>';
							
				while ( $the_query->have_posts() ) {
				$the_query->the_post();
					
					if(has_post_thumbnail()){
						$post_id = "";
						$postimg = '<figure class="eyecatch">' .get_the_post_thumbnail($post_id, 'home-thum'). '</figure>';
					} else {
						$postimg = '<figure class="eyecatch noimg"></figure>';
					}
					$postttl = '<p class="ttl">' . get_the_title() . '</p>';
					
					if($dateon !== 'off'){ $postdate = '<span class="date gf">' . get_the_date() . '</span>';} else { $postdate = null;}
					
					$postlinkbefore = '<a href="'. get_permalink() .'">';
					
					$echo .= '<li>'. $postlinkbefore . $postimg . '<div class="postbody">' . $postttl . $postdate . '</div></a></li>';
					
				}
				wp_reset_postdata();
			
				$echo .= '</ul>';
				if(!$btntext == null) {
					$echo .= '<div class="btn-wrap simple arrow"><a href="'.get_category_link( $category->term_id ).'">'. $btntext .'</a></div>';
				}
				$echo .= '</dd></dl>';
			}
		endforeach;

	}	
	return $echo;
}
add_shortcode('postlist','postlistFunc');