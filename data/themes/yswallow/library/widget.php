<?php
function theme_register_sidebars() {
	register_sidebar(array(
		'id' => 'sidebar-pc',
		'name' => __( '【PC用】サイドバー', 'octheme' ),
		'description' => __( 'PC表示の際のみに表示されるサイドバーです。※スマホでは表示されません。', 'octheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle"><span>',
		'after_title' => '</span></h4>',
	));


	register_sidebar(array(
		'id' => 'sidebar-sp',
		'name' => __( '【共通】ハンバーガーメニュー', 'octheme' ),
		'description' => __( '左上のハンバーガーボタン（menu）を押したときに表示されるウィジェット。PC、タブレット、スマートフォンと全ての端末で表示されます。', 'octheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle"><span>',
		'after_title' => '</span></h4>',
	));
	

	register_sidebar(array(
		'id' => 'addbanner-sp-titleunder',
		'name' => __( '【スマホ用】記事タイトル下', 'octheme' ),
		'description' => __( '【スマートフォン用】記事タイトル下にAdsenseなどの広告を表示します。カスタムHTMLウィジェット等を追加して広告コードを貼り付けて下さい。', 'octheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle"><span>',
		'after_title' => '</span></h4>',
	));


	register_sidebar(array(
		'id' => 'addbanner-pc-titleunder',
		'name' => __( '【PC用】記事タイトル下', 'octheme' ),
		'description' => __( '【PC用】記事タイトル下にAdsenseなどの広告を表示します。カスタムHTMLウィジェット等を追加して広告コードを貼り付けて下さい。', 'octheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle"><span>',
		'after_title' => '</span></h4>',
	));

	register_sidebar(array(
		'id' => 'addbanner-sp-contentfoot',
		'name' => __( '【スマホ用】記事コンテンツ下', 'octheme' ),
		'description' => __( '【スマートフォン用】記事コンテンツ下にAdsenseなどの広告を表示します。カスタムHTMLウィジェット等を追加して広告コードを貼り付けて下さい。', 'octheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="widgettitle"><span>',
		'after_title' => '</span></h2>',
	));


	register_sidebar(array(
		'id' => 'addbanner-pc-contentfoot',
		'name' => __( '【PC用】記事コンテンツ下', 'octheme' ),
		'description' => __( '【PC用】記事コンテンツ下にAdsenseなどの広告を表示します。カスタムHTMLウィジェット等を追加して広告コードを貼り付けて下さい。', 'octheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="widgettitle"><span>',
		'after_title' => '</span></h2>',
	));

	register_sidebar(array(
		'id' => 'home-top',
		'name' => __( '【PC用】トップページ上部', 'octheme' ),
		'description' => __( 'トップページ（PC/Tablet）のヘッダー下', 'octheme' ),
		'before_widget' => '<div id="%1$s" class="widget homewidget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="widgettitle">',
		'after_title' => '</h2>',
	));
	register_sidebar(array(
		'id' => 'home-top_mobile',
		'name' => __( '【スマホ用】トップページ上部', 'octheme' ),
		'description' => __( 'トップページ（スマートフォン）のヘッダー下', 'octheme' ),
		'before_widget' => '<div id="%1$s" class="widget homewidget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="widgettitle">',
		'after_title' => '</h2>',
	));

	register_sidebar(array(
		'id' => 'home-bottom',
		'name' => __( '【PC用】トップページ下部', 'octheme' ),
		'description' => __( 'トップページ（PC/Tablet）のフッター上', 'octheme' ),
		'before_widget' => '<div id="%1$s" class="widget homewidget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="widgettitle">',
		'after_title' => '</h2>',
	));
	register_sidebar(array(
		'id' => 'home-bottom_mobile',
		'name' => __( '【スマホ用】トップページ下部', 'octheme' ),
		'description' => __( 'トップページ（スマートフォン）の記事一覧下', 'octheme' ),
		'before_widget' => '<div id="%1$s" class="widget homewidget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="widgettitle">',
		'after_title' => '</h2>',
	));


	register_sidebar(array(
		'id' => 'footwidget1',
		'name' => __( '【PC用】フッター上部①', 'octheme' ),
		'description' => __( 'メイン領域の下、フッターの上の領域です。※スマホでは表示されません。', 'octheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle"><span>',
		'after_title' => '</span></h4>',
	));

	register_sidebar(array(
		'id' => 'footwidget2',
		'name' => __( '【PC用】フッター上部②', 'octheme' ),
		'description' => __( 'メイン領域の下、フッターの上の領域です。※スマホでは表示されません。', 'octheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle"><span>',
		'after_title' => '</span></h4>',
	));

	register_sidebar(array(
		'id' => 'footwidget-sp',
		'name' => __( '【スマホ用】フッター上部', 'octheme' ),
		'description' => __( '【スマホ用】メイン領域の下、フッターの上の領域です。※PC・タブレットでは表示されません。', 'octheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle"><span>',
		'after_title' => '</span></h4>',
	));


	register_sidebar(array(
		'id' => 'cta',
		'name' => __( '【共通】CTA設定', 'octheme' ),
		'description' => __( '記事（single）の一番下にColl To Actionを設置できます。「カスタムHTML」や「テキスト」を追加してテキストやコードを貼りつけてください。※固定ページには表示されません。', 'octheme' ),
		'before_widget' => '<div id="%1$s" class="widget ctawidget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));
}
add_action( 'widgets_init', 'theme_register_sidebars' );

//ウィジェット内でショートコードを使用可能に
add_filter('widget_text', 'do_shortcode');


// カテゴリの投稿数をaタグの中に
add_filter( 'wp_list_categories', 'my_list_categories', 10, 2 );
function my_list_categories( $output, $args ) {
  $output = preg_replace('/<\/a>\s*\((\b\d{1,3}(,\d{3})*\b)\)/',' <span class="countpost">$1</span></a>',$output);
  return $output;
}

// アーカイブの投稿数をaタグの中に
add_filter( 'get_archives_link', 'my_archives_link' );
function my_archives_link( $output ) {
  $output = preg_replace('/<\/a>\s*(&nbsp;)\((\d+)\)/',' <span class="countpost">$2</span></a>',$output);
  return $output;
}

// 新着記事のフォーマットを変更
class My_Recent_Posts_Widget extends WP_Widget_Recent_Posts {
	function widget($args, $instance) {
		$show_date = isset( $instance['show_date'] ) ? (bool) $instance['show_date'] : false;
		extract( $args );
		$title = apply_filters('widget_title', empty($instance['title']) ? __('Recent Posts') : $instance['title'], $instance, $this->id_base);
		if( empty( $instance['number'] ) || ! $number = absint( $instance['number'] ) )
			$number = 10;
		$r = new WP_Query( apply_filters( 'widget_posts_args', array( 'posts_per_page' => $number, 'no_found_rows' => true, 'post_status' => 'publish', 'ignore_sticky_posts' => true ) ) );
		if( $r->have_posts() ) :
			echo $before_widget;
			if( $title ) echo $before_title . $title . $after_title; ?>
			<ul>
				<?php while( $r->have_posts() ) : $r->the_post(); ?>				
				<li><a class="cf" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
					<p class="title"><?php the_title(); ?></p>
					<?php if ( $show_date ) : ?><span class="date gf"><?php echo get_the_date(); ?></span><?php endif; ?>
				</a></li>
				<?php endwhile; ?>
			</ul>
			<?php
			echo $after_widget;
		wp_reset_postdata();
		endif;
	}
}
function my_recent_widget_registration() {
  unregister_widget('WP_Widget_Recent_Posts');
  register_widget('My_Recent_Posts_Widget');
}
add_action('widgets_init', 'my_recent_widget_registration');


//画像付き新着記事ウィジェット追加
///////////////////////////////////
class NewEntryImageWidget extends WP_Widget {
    public function __construct() {
        parent::__construct(
			false,
			$name = '[画像付き] 最新の投稿'
        );
    }
    function widget($args, $instance) {
        extract( $args );
        $title_new = apply_filters( 'widget_title_new', empty($instance['title_new']) ? "" : $instance['title_new'] );
        $entry_count = apply_filters( 'widget_entry_count', empty($instance['entry_count']) ? "" : $instance['entry_count'] );
        global $g_entry_count; 
        $g_entry_count = 5;
        if ($entry_count) {
          $g_entry_count = $entry_count;
        }
        ?>
        <?php echo $args['before_widget']; ?>
            <?php 
	            if ($title_new) {
	            	echo $args['before_title'] . $title_new . $args['after_title'];
            	}
            ?>
			<ul>
			<?php global $g_entry_count; ?>
			<?php query_posts('posts_per_page='.$g_entry_count); ?>
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<li>
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
			<figure class="eyecatch<?php if (!has_post_thumbnail()):?> noimg<?php endif;?>">
			<?php the_post_thumbnail('home-thum'); ?>
			</figure>
			<div class="ttl">
				<p class="title"><?php the_title(); ?></p>
				<?php if ( get_option('post_options_date') !== "date_off" ) : ?><span class="date gf"><?php echo get_the_date(); ?></span><?php endif;?>
			</div>
			</a>
			</li>
			<?php endwhile; 
			else :
			  echo '<p>新着記事はありません。</p>';
			endif; ?>
			<?php wp_reset_query(); ?>
			</ul>
		<?php echo $args['after_widget']; ?>
        <?php
    }
    public function update($new_instance, $old_instance) {
     $instance = $old_instance;
     $instance['title_new'] = sanitize_text_field($new_instance['title_new']);
     $instance['entry_count'] = strip_tags($new_instance['entry_count']);
        return $instance;
    }

    public function form($instance) {
        $title_new = esc_attr( empty($instance['title_new']) ? "" : $instance['title_new'] );
        $entry_count = esc_attr( empty($instance['entry_count']) ? 5 : $instance['entry_count'] );
        ?>
        <p>
          <label for="<?php echo $this->get_field_id('title_new'); ?>">
          <?php _e( 'Title:' ); ?>
          </label>
          <input class="widefat" id="<?php echo $this->get_field_id('title_new'); ?>" name="<?php echo $this->get_field_name('title_new'); ?>" type="text" value="<?php echo $title_new; ?>" />
        </p>
        <p>
          <label for="<?php echo $this->get_field_id('entry_count'); ?>">
          <?php _e( 'Number of posts to show:' ); ?>
          </label>
          <input class="tiny-text" id="<?php echo $this->get_field_id('entry_count'); ?>" name="<?php echo $this->get_field_name('entry_count'); ?>" type="number" value="<?php echo $entry_count; ?>" />
        </p>
        <?php
    }
}
add_action('widgets_init', function(){register_widget('NewEntryImageWidget' );});