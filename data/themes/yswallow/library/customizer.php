<?php

// サイト基本設定・ロゴ画像
function opencage_logo_theme_customizer( $wp_customize ) {
    $wp_customize->add_section( 'title_tagline', array(
    'title' => __( '> サイト基本設定・ロゴ画像', 'opencage' ),
    'priority' => 10,
    'description' => 'サイトの基本的な設定が可能です。ロゴ画像やファビコン（サイトアイコン）はこちらのページからアップロード可能。',
    ));

    $wp_customize->add_setting('side_options_description', array(
	   'type'  => 'option',
	   'default' => 'sitedes_on',
	));
	$wp_customize->add_control( 'side_options_description', array(
	    'label' =>'キャッチフレーズを表示する',
		'description' => '<span style="font-size:10px; opacity:0.7;">サイトタイトル下に「キャッチフレーズ」を表示するかどうか。</span>',
	    'settings' => 'side_options_description',
	    'section' => 'title_tagline',
	    'type' => 'radio',
	    'choices' => array(
            'sitedes_on' => '表示する',
            'sitedes_off' => '表示しない',
        ),
	));

    $wp_customize->add_setting('opencage_logo_size', array(
	   'type'  => 'option',
	   'default' => 'fs_m',
	));
	$wp_customize->add_control( 'opencage_logo_size', array(
	    'settings' => 'opencage_logo_size',
	    'label' =>'ロゴサイズ変更',
		'description' => '<span style="font-size:10px; opacity:0.7;">ロゴのフォントサイズを変更できます。</span>',
	    'section' => 'title_tagline',
	    'type' => 'radio',
	    'choices' => array(
            'fs_s' => '小さめ',
            'fs_m' => '標準',
            'fs_l' => '大きめ',
            'fs_ll' => '特大',
        ),
	));

	$wp_customize->add_setting( 'opencage_logo' );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'opencage_logo', array(
		'label'        => __( 'ロゴ画像をアップロード', 'opencage_logo' ),
		'description' => '<span style="font-size:10px; opacity:0.7;">ロゴ画像を利用する場合はこちらからアップロードしてください。</span>',
		'section'    => 'title_tagline',
		'settings'   => 'opencage_logo',
	) ) );
	
}
add_action('customize_register', 'opencage_logo_theme_customizer');


function opencage_customize_register($wp_customize) {
    $wp_customize->add_section( 'colors', array(
    'title' => __( '> サイトカラー設定', 'opencage' ),
    'priority' => 30,
    'description' => 'サイトの色変更が可能です。<br>※「背景色」を適用させたい場合は、【カスタマイズ > 背景画像】から背景画像を削除しておく必要があります。',
    ));

	$wp_customize->add_setting( 'opencage_color_maintext', array( 'default' => '#3E3E3E', ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'opencage_color_maintext', array(
    'label' => __( 'メインテキスト', 'opencage' ),
    'section' => 'colors',
    'settings' => 'opencage_color_maintext',
    )));

	$wp_customize->add_setting( 'opencage_color_mainlink', array( 'default' => '#57a1d8', ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'opencage_color_mainlink', array(
    'label' => __( 'リンク色', 'opencage' ),
    'section' => 'colors',
    'settings' => 'opencage_color_mainlink',
    ) ) );

	$wp_customize->add_setting( 'opencage_color_mainlink_hover', array( 'default' => '#9eccef', ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'opencage_color_mainlink_hover', array(
    'label' => __( 'リンク色（hover）', 'opencage' ),
    'section' => 'colors',
    'settings' => 'opencage_color_mainlink_hover',
    ) ) );
	  
	$wp_customize->add_setting( 'opencage_color_headerbg', array( 'default' => '#264b67', ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'opencage_color_headerbg', array(
    'label' => __( 'ヘッダー背景', 'opencage' ),
    'section' => 'colors',
    'settings' => 'opencage_color_headerbg',
    ) ) );

	$wp_customize->add_setting( 'opencage_color_headertext', array( 'default' => '#ffffff', ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'opencage_color_headertext', array(
    'label' => __( 'ヘッダーテキスト', 'opencage' ),
    'section' => 'colors',
    'settings' => 'opencage_color_headertext',
    ) ) );

	$wp_customize->add_setting( 'opencage_color_headerlogo', array( 'default' => '#ecf6ff', ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'opencage_color_headerlogo', array(
    'label' => __( 'ヘッダーロゴ', 'opencage' ),
    'section' => 'colors',
    'settings' => 'opencage_color_headerlogo',
    ) ) );

    $wp_customize->add_setting( 'opencage_color_ttlbg', array( 'default' => '#d35d5e', ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'opencage_color_ttlbg', array(
    'label' => __( '記事ページ見出し(H2)背景', 'opencage' ),
    'section' => 'colors',
    'settings' => 'opencage_color_ttlbg',
    ) ) );

    $wp_customize->add_setting( 'opencage_color_ttltext', array( 'default' => '#ffffff', ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'opencage_color_ttltext', array(
    'label' => __( '記事ページ見出し(H2)文字色', 'opencage' ),
    'section' => 'colors',
    'settings' => 'opencage_color_ttltext',
    ) ) );

	$wp_customize->add_setting( 'opencage_color_formbg', array( 'default' => '#ffffff', ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'opencage_color_formbg', array(
    'label' => __( '入力フォーム背景', 'opencage' ),
    'section' => 'colors',
    'settings' => 'opencage_color_formbg',
    ) ) );
    

	$wp_customize->add_setting( 'opencage_color_footerbg', array( 'default' => '#2e3a44', ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'opencage_color_footerbg', array(
    'label' => __( 'フッター背景', 'opencage' ),
    'section' => 'colors',
    'settings' => 'opencage_color_footerbg',
    ) ) );

	$wp_customize->add_setting( 'opencage_color_footertext', array( 'default' => '#ffffff', ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'opencage_color_footertext', array(
    'label' => __( 'フッターテキスト', 'opencage' ),
    'section' => 'colors',
    'settings' => 'opencage_color_footertext',
    ) ) );
	  
         }
    add_action('customize_register', 'opencage_customize_register');
    
    function opencage_customize_css()
    {
    //初期カラー
    $bodybg = get_theme_mod( 'background_color', '#ffffff');
    $maintext = get_theme_mod( 'opencage_color_maintext', '#3E3E3E');
    $mainlink = get_theme_mod( 'opencage_color_mainlink', '#57a1d8');
    $mainlinkhover = get_theme_mod( 'opencage_color_mainlink_hover', '#9eccef');
    $mainformbg = get_theme_mod( 'opencage_color_formbg', '#ffffff');
    $mainttlbg = get_theme_mod( 'opencage_color_ttlbg', '#d35d5e');
    $mainttltext = get_theme_mod( 'opencage_color_ttltext', '#ffffff');
    $headerbg = get_theme_mod( 'opencage_color_headerbg', '#264b67');
    $headertext = get_theme_mod( 'opencage_color_headertext', '#ffffff');
    $headerlogo = get_theme_mod( 'opencage_color_headerlogo', '#ecf6ff');
    $footerbg = get_theme_mod( 'opencage_color_footerbg', '#2e3a44');
    $footertext = get_theme_mod( 'opencage_color_footertext', '#ffffff');
    ?>
<style type="text/css">
body, #breadcrumb li a::after{ color: <?php echo $maintext; ?>;}
a, #breadcrumb li a i, .authorbox .author_sns li a::before,.widget li a:after{ color: <?php echo $mainlink; ?>;}
a:hover{ color: <?php echo $mainlinkhover; ?>;}
.article-footer .post-categories li a,.article-footer .tags a{ background: <?php echo $mainlink; ?>; border-color:<?php echo $mainlink; ?>;}
.article-footer .tags a{ color:<?php echo $mainlink; ?>; background: none;}
.article-footer .post-categories li a:hover,.article-footer .tags a:hover{ background:<?php echo $mainlinkhover; ?>;  border-color:<?php echo $mainlinkhover; ?>;}
input[type="text"],input[type="password"],input[type="datetime"],input[type="datetime-local"],input[type="date"],input[type="month"],input[type="time"],input[type="week"],input[type="number"],input[type="email"],input[type="url"],input[type="search"],input[type="tel"],input[type="color"],select,textarea,.field { background-color: <?php echo $mainformbg; ?>;}
#header{ color: <?php echo $headertext; ?>; background: <?php echo $headerbg; ?>;}
#logo a{ color: <?php echo $headerlogo; ?>;}
@media only screen and (min-width: 768px) {
	#g_nav .nav > li::after{ background: <?php echo $headerlogo; ?>;}
	#g_nav .nav li ul.sub-menu, #g_nav .nav li ul.children{ background: <?php echo $footerbg; ?>;color: <?php echo $footertext; ?>;}
	.archives-list .post-list a .eyecatch::after{ background: <?php echo $mainlink; ?>;}
}

.slick-prev:before, .slick-next:before, .accordionBtn, #submit, button, html input[type="button"], input[type="reset"], input[type="submit"], .pagination a:hover, .pagination a:focus,.page-links a:hover, .page-links a:focus { background-color: <?php echo $mainlink; ?>;}
.accordionBtn.active, #submit:hover, #submit:focus{ background-color: <?php echo $mainlinkhover; ?>;}
.entry-content h2, .homeadd_wrap .widgettitle, .widgettitle, .eyecatch .cat-name, ul.wpp-list li a:before, .cat_postlist .catttl span::before, .cat_postlist .catttl span::after, .accordion::before{ background: <?php echo $mainttlbg; ?>; color: <?php echo $mainttltext; ?>;}
.entry-content h3,.entry-content h4{ border-color: <?php echo $mainttlbg; ?>;}
.h_balloon .entry-content h2:after{ border-top-color: <?php echo $mainttlbg; ?>;}
.entry-content ol li:before{ background: <?php echo $mainttlbg; ?>; border-color: <?php echo $mainttlbg; ?>;  color: <?php echo $mainttltext; ?>;}
.entry-content ol li ol li:before{ color: <?php echo $mainttlbg; ?>;}
.entry-content ul li:before{ color: <?php echo $mainttlbg; ?>;}
.entry-content blockquote::before,.entry-content blockquote::after{color: <?php echo $mainttlbg; ?>;}

.btn-wrap a{background: <?php echo $mainlink; ?>;border: 1px solid <?php echo $mainlink; ?>;}
.btn-wrap a:hover,.widget .btn-wrap:not(.simple) a:hover{color: <?php echo $mainlink; ?>;border-color: <?php echo $mainlink; ?>;}
.btn-wrap.simple a, .pagination a, .pagination span,.page-links a{border-color: <?php echo $mainlink; ?>; color: <?php echo $mainlink; ?>;}
.btn-wrap.simple a:hover, .pagination .current,.pagination .current:hover,.page-links ul > li > span{background-color: <?php echo $mainlink; ?>;}

#footer-top::before{background-color: <?php echo $mainttlbg; ?>;}
#footer,.cta-inner{background-color: <?php echo $footerbg; ?>; color: <?php echo $footertext; ?>;}

</style>
<?php
    }
    add_action( 'wp_head', 'opencage_customize_css');


// editor custom styles
function stk_customize_css_admin() {
	$maintext = get_theme_mod( 'opencage_color_maintext', '#3E3E3E');
    $mainlink = get_theme_mod( 'opencage_color_mainlink', '#1bb4d3');
    $mainttlbg = get_theme_mod( 'opencage_color_ttlbg', '#1bb4d3');
    $mainttltext = get_theme_mod( 'opencage_color_ttltext', '#ffffff');
    ?>
<style type="text/css">
.mce-content-body.editor-area a,
.wp-block-heading a{
	color: <?php echo $mainlink; ?>;
}
.mce-content-body.editor-area h2,
.editor-styles-wrapper h2{
	background: <?php echo $mainttlbg; ?>!important;
	color: <?php echo $mainttltext; ?>!important;
}
blockquote.wp-block-quote::before,
blockquote.wp-block-quote::after{color: <?php echo $mainttlbg; ?>!important;}
.mce-content-body.editor-area h3,
.editor-styles-wrapper h3,
.mce-content-body.editor-area h4,
.editor-styles-wrapper h4 {
	border-color: <?php echo $mainttlbg; ?>;
}
.editor-styles-wrapper .btn-wrap:not([class*="rich_"]) a,
.wp-block-button.is-style-normal .wp-block-button__link{ background: <?php echo $mainlink; ?>!important; border-color: <?php echo $mainlink; ?>!important; }
.editor-styles-wrapper .btn-wrap.simple a,
.wp-block-button.is-style-simple .wp-block-button__link{ border-color: <?php echo $mainlink; ?>!important; color: <?php echo $mainlink; ?>!important; }

.editor-styles-wrapper .block-library-list ol li:before,
.editor-styles-wrapper .wp-block-freeform ol li:before{ background: <?php echo $mainttlbg; ?>; border-color: <?php echo $mainttlbg; ?>; color: <?php echo $mainttltext; ?>;}
.editor-styles-wrapper .block-library-list ol li li:before,
.editor-styles-wrapper .wp-block-freeform ol li li:before{ color: <?php echo $mainttlbg; ?>;}
.editor-styles-wrapper .block-library-list ul li:before,
.editor-styles-wrapper .wp-block-freeform ul li:before{ color: <?php echo $mainttlbg; ?>;}

</style>
<?php
    }
add_action('admin_print_styles', 'stk_customize_css_admin');

function wpdocs_theme_editor_dynamic_styles( $mceInit ) {
    $styles = '.mce-content-body.editor-area a { color: ' . get_theme_mod( 'opencage_color_mainlink', '#1bb4d3') . '}';
    $styles .= '.mce-content-body.editor-area h2,.mce-content-body.editor-area ol li:before { background-color: ' . get_theme_mod( 'opencage_color_ttlbg', '#1bb4d3') . '}';
    $styles .= '.mce-content-body.editor-area ol li:before { border-color: ' . get_theme_mod( 'opencage_color_ttlbg', '#1bb4d3') . '}';
    $styles .= '.mce-content-body.editor-area h2,.mce-content-body.editor-area ol li:before { color: ' . get_theme_mod( 'opencage_color_ttltext', '#ffffff') . '}';
    $styles .= '.mce-content-body.editor-area h3,.mce-content-body.editor-area h4 { border-color: ' . get_theme_mod( 'opencage_color_ttlbg', '#1bb4d3') . '}';
    $styles .= '.mce-content-body.editor-area ul li:before { color: ' . get_theme_mod( 'opencage_color_ttlbg', '#1bb4d3') . '}';
    $styles .= '.mce-content-body.editor-area .btn-wrap:not(.simple):not(.rich_yellow):not(.rich_pink):not(.rich_orange):not(.rich_green):not(.rich_blue) a { background-color: ' . get_theme_mod( 'opencage_color_mainlink', '#1bb4d3') . '}';
    $styles .= '.mce-content-body.editor-area .btn-wrap:not(.rich_yellow):not(.rich_pink):not(.rich_orange):not(.rich_green):not(.rich_blue) a, .mce-content-body.editor-area .btn-wrap.simple { border-color: ' . get_theme_mod( 'opencage_color_mainlink', '#1bb4d3') . '}';
    if ( isset( $mceInit['content_style'] ) ) {
        $mceInit['content_style'] .= ' ' . $styles . ' ';
    } else {
        $mceInit['content_style'] = $styles . ' ';
    }
    return $mceInit;
}
add_filter('tiny_mce_before_init','wpdocs_theme_editor_dynamic_styles');

function opencage_global_customizer($wp_customize) {
    $wp_customize->add_section( 'global_section', array(
        'title'          =>'> 全ページ共通設定',
        'priority'       => 30,
    ));

    $wp_customize->add_setting('other_options_headerundertext', array(
	   'type'  => 'option',
	));
	$wp_customize->add_control( 'other_options_headerundertext', array(
	    'label' =>'ヘッダー下お知らせテキスト',
		'description' => '<span style="font-size:10px; opacity:0.7;">ヘッダー下にお知らせを表示できます。イベントの告知や読んで欲しい記事などへのリンクを設置したりと、使い方は様々！※下の「<b>ヘッダー下お知らせリンク</b>」を設定しないと表示されません</span>',
	    'settings' => 'other_options_headerundertext',
	    'section' => 'global_section',
	));

    $wp_customize->add_setting('other_options_headerunderlink', array(
	   'type'  => 'option',
	));
	$wp_customize->add_control( 'other_options_headerunderlink', array(
	    'label' =>'ヘッダー下お知らせリンク',
		'description' => '<span style="font-size:10px; opacity:0.7;">ヘッダー下のお知らせにリンクを設置可能です。<br>例）https://open-cage.com</span>',
	    'settings' => 'other_options_headerunderlink',
	    'section' => 'global_section',
	));	
	$wp_customize->add_setting( 'other_options_headerunderlink_bgcolor', array(
		'default' => '#dc5454', 
	));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'other_options_headerunderlink_bgcolor', array(
	    'label' => __( 'お知らせ背景色', 'opencage' ),
	    'section' => 'global_section',
	    'settings' => 'other_options_headerunderlink_bgcolor',
    )));

    $wp_customize->add_setting('other_options_headerunderlink_target', array(
	   'type'  => 'option',
	));
	$wp_customize->add_control( 'other_options_headerunderlink_target', array(
	    'label' =>'リンクを別タブで開く（_target設定）',
		'description' => '<span style="font-size:10px; opacity:0.7;">上で設定したお知らせリンクを別タブで開きたい場合にチェック<br><br></span>',
	    'settings' => 'other_options_headerunderlink_target',
	    'section' => 'global_section',
	    'type' => 'checkbox',
	));



    $wp_customize->add_setting('side_options_header_search', array(
	   'type'  => 'option',
	   'default' => 'search_off',
	));
	$wp_customize->add_control( 'side_options_header_search', array(
	    'settings' => 'side_options_header_search',
	    'label' =>'[ヘッダー]サイト内検索ボタン',
	    'section' => 'global_section',
	    'type' => 'radio',
	    'choices' => array(
            'search_on' => '検索ボタンを表示する',
            'search_off' => '検索ボタンを表示しない',
        ),
	));

    $wp_customize->add_setting('side_options_animatenone', array(
	   'type'  => 'option',
	   'default' => 'ani_on',
	));
	$wp_customize->add_control( 'side_options_animatenone', array(
	    'settings' => 'side_options_animatenone',
	    'label' =>'[全体]アニメーション機能',
		'description' => '<span style="font-size:10px; opacity:0.7;">サイト全体のアニメーション機能を切り替えることができます。※トップページのみ適用するなどの機能はありません。</span>',
	    'section' => 'global_section',
	    'type' => 'radio',
	    'choices' => array(
            'ani_on' => 'アニメーションON',
            'ani_off' => 'アニメーションOFF',
        ),
	));

    $wp_customize->add_setting('side_options_pannavi', array(
	   'type'  => 'option',
	   'default' => 'pannavi_on',
	));
	$wp_customize->add_control( 'side_options_pannavi', array(
	    'settings' => 'side_options_pannavi',
	    'label' =>'パンくずナビ表示設定',
		'description' => '<span style="font-size:10px; opacity:0.7;">パンくずナビの表示位置のコントロールができます。</span>',
	    'section' => 'global_section',
	    'type' => 'radio',
	    'choices' => array(
            'pannavi_on' => 'パンくずナビを「サイト上部」に表示する',
            'pannavi_on_bottom' => 'パンくずナビを「サイト下部」に表示する',
            'pannavi_off' => 'パンくずナビを表示しない',
        ),
	));

    $wp_customize->add_setting('side_options_gfnotojp', array(
	   'type'  => 'option',
	   'default' => 'notojp_on',
	));
	$wp_customize->add_control( 'side_options_gfnotojp', array(
	    'settings' => 'side_options_gfnotojp',
	    'label' =>'[全体]Googleフォント（NOTO_JP）の利用設定',
		'description' => '<span style="font-size:10px; opacity:0.7;">Googleフォント「NotoSansJapanese」を読み込まないようにすることができます。フォントデザインよりもサイト速度を気にされる方向け。</span>',
	    'section' => 'global_section',
	    'type' => 'radio',
	    'choices' => array(
            'notojp_on' => '読み込む',
            'notojp_off' => '読み込まない',
        ),
	));

    $wp_customize->add_setting('post_options_label', array(
	   'type'  => 'option',
	   'default' => 'catlabeloff',
	));
	$wp_customize->add_control( 'post_options_label', array(
	    'settings' => 'post_options_label',
	    'label' =>'カテゴリーラベルの表示設定',
		'description' => '<span style="font-size:10px; opacity:0.7;">アイキャッチ画像の右上に表示されるカテゴリーラベルの表示非表示を設定できます。</span>',
	    'section' => 'global_section',
	    'type' => 'radio',
	    'choices' => array(
            'catlabelon' => 'ラベルを表示する',
            'catlabeloff' => 'ラベルを表示しない',
        ),
	));

    $wp_customize->add_setting('advanced_lozad_js', array(
	   'type'  => 'option',
	   'default' => 'off',
	));
	$wp_customize->add_control( 'advanced_lozad_js', array(
	    'label' =>'画像の遅延読み込み',
		'description' => '<span style="font-size:11px;">画像にloading="lazy"を付与して遅延読み込みを行います。</span>',
	    'settings' => 'advanced_lozad_js',
	    'section' => 'global_section',
	    'type' => 'radio',
	    'choices' => array(
            'on' => '遅延読み込みする',
            'off' => '遅延読み込みしない',
        ),
	));

    $wp_customize->add_setting('side_options_cataccordion', array(
	   'type'  => 'option',
	   'default' => 'accordion_on',
	));
	$wp_customize->add_control( 'side_options_cataccordion', array(
	    'settings' => 'side_options_cataccordion',
	    'label' =>'[ウィジェット]サブカテゴリー階層化',
		'description' => '<span style="font-size:10px; opacity:0.7;">カテゴリーウィジェットのサブカテゴリーを隠しておいて、ボタンで表示させることができます。</span>',
	    'section' => 'global_section',
	    'type' => 'radio',
	    'choices' => array(
            'accordion_on' => 'サブカテゴリーを折りたたむ（+ボタンで表示できるようになります）',
            'accordion_off' => 'サブカテゴリーを全て表示',
        ),
	));
}
add_action( 'customize_register', 'opencage_global_customizer' );



//トップページ
function opencage_toppage_theme_customizer( $wp_customize ) {
    $wp_customize->add_section( 'opencage_toppage_section' , array(
	    'title'       => __( '> トップページ設定', 'opencage_toppage' ),
	    'priority'    => 30,
	    'description' => 'トップページの設定全般。ヘッダー画像やリンクの設置などができます。<a href="//open-cage.com/swallow/document/toppage/#i-4" target="_blank">→トップページヘッダーの使い方</a>',
	) );

    $wp_customize->add_setting('opencage_toppage_header', array(
	   'type'  => 'option',
	   'default' => 'toppage_header_on',
	));
	$wp_customize->add_control( 'opencage_toppage_header', array(
	    'settings' => 'opencage_toppage_header',
	    'label' =>'トップページヘッダー表示設定',
		'description' => '<span style="font-size:10px; opacity:0.7;">設定に関わらず<b>トップページヘッダーを非表示</b>にします。</span>',
	    'section' => 'opencage_toppage_section',
	    'type' => 'radio',
	    'choices' => array(
            'toppage_header_on' => '表示する',
            'toppage_header_off' => '表示しない',
        ),
	));
	
	$wp_customize->add_setting( 'opencage_toppage_headerimg' );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'opencage_toppage_headerimg', array(
		'label'        => __( 'ヘッダーイメージ', 'opencage_toppage_headerimg' ),
		'description' => '<span style="font-size:10px; opacity:0.7;"><span style="color:red;">画像を設定するとトップページに表示されます。</span>画像の上にテキストやボタンを配置したい場合は、下の「ヘッダーテキスト」の設定をしてください。</span>',
		'section'    => 'opencage_toppage_section',
		'settings'   => 'opencage_toppage_headerimg',
	)));

	$wp_customize->add_setting( 'opencage_toppage_headerimgsp' );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'opencage_toppage_headerimgsp', array(
		'label'        => __( 'ヘッダーイメージ（SP用）', 'opencage_toppage_headerimgsp' ),
		'description' => '<span style="font-size:10px; opacity:0.7;">スマートフォン用のヘッダー背景画像を設定できます。※設定しなかった場合は上の「ヘッダーイメージ」が表示されます。</span>',
		'section'    => 'opencage_toppage_section',
		'settings'   => 'opencage_toppage_headerimgsp',
	) ) );

	$wp_customize->add_setting('opencage_toppage_headertext_l', array(
	   'type'  => 'option',
	));
	$wp_customize->add_control( 'opencage_toppage_headertext_l', array(
	    'label' =>'ヘッダーテキスト（大）',
		'description' => '<span style="font-size:10px; opacity:0.7;"><span style="color:red;">入力すると画像の上にテキストが表示されます。</span>大きな文字が表示されるので短いインパクトの有るキャッチコピー等を入力してください。</span>',
	    'section' => 'opencage_toppage_section',
	    'settings' => 'opencage_toppage_headertext_l',
	));
    $wp_customize->add_setting('opencage_toppage_headertext_s', array(
	   'type'  => 'option',
	));
	$wp_customize->add_control( 'opencage_toppage_headertext_s', array(
	    'label' =>'ヘッダーテキスト（小）',
		'description' => '<span style="font-size:10px; opacity:0.7;"><span style="color:red;">入力すると画像の上にテキストが表示されます。</span>小さな文字で補足テキストが入ります。</span>',
	    'section' => 'opencage_toppage_section',
	    'type' => 'textarea',
	    'settings' => 'opencage_toppage_headertext_s',
	));
	$wp_customize->add_setting( 'opencage_toppage_textcolor', array(
		'default' => '#ffffff', 
	));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'opencage_toppage_textcolor', array(
	    'label' => __( 'ヘッダーテキスト色', 'opencage' ),
	    'section' => 'opencage_toppage_section',
	    'settings' => 'opencage_toppage_textcolor',
    )));

    $wp_customize->add_setting('opencage_toppage_bgoverlay', array(
	   'type'  => 'option',
	   'default' => '半透明（黒）',
	));
	$wp_customize->add_control( 'opencage_toppage_bgoverlay', array(
	    'settings' => 'opencage_toppage_bgoverlay',
	    'label' =>'ヘッダーイメージにオーバーレイカラー',
		'description' => '「ヘッダーイメージ」にうっすらと色をのせて文字を見やすくできます（※上の「テキスト」を設定していない場合は適用されません。）</span>',
	    'section' => 'opencage_toppage_section',
	    'type' => 'radio',
	    'choices' => array(
            'overlay overlay_bk' => '半透明（黒）',
            'overlay overlay_wh' => '半透明（白）',
            'overlaynone' => 'オーバーレイしない',
        ),
	));

    $wp_customize->add_setting('opencage_toppage_headerlink', array(
	   'type'  => 'option',
	));
	$wp_customize->add_control( 'opencage_toppage_headerlink', array(
	    'label' =>'ヘッダーイメージURL',
		'description' => '<span style="font-size:10px; opacity:0.7;">リンクさせたいページやサイトのURLを入力すると、リンクが設置されます。</span>',
	    'section' => 'opencage_toppage_section',
	    'settings' => 'opencage_toppage_headerlink',
	));
    $wp_customize->add_setting('opencage_toppage_headerlinktext', array(
	   'type'  => 'option',
	));
	$wp_customize->add_control( 'opencage_toppage_headerlinktext', array(
	    'label' =>'ヘッダーボタンテキスト',
		'description' => '<span style="font-size:10px; opacity:0.7;">ここに入力した文字で置き換えます。※上の項目の「ヘッダーボタンURL」を設定していない場合は表示されません。</span>',
	    'section' => 'opencage_toppage_section',
	    'settings' => 'opencage_toppage_headerlinktext',
	));
	$wp_customize->add_setting( 'opencage_toppage_btncolor', array(
		'default' => '#ffffff', 
	));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'opencage_toppage_btncolor', array(
	    'label' => __( 'ヘッダーボタンテキスト色', 'opencage' ),
	    'section' => 'opencage_toppage_section',
	    'settings' => 'opencage_toppage_btncolor',
    )));
	$wp_customize->add_setting( 'opencage_toppage_btnbgcolor', array(
		'default' => '#d34e4e', 
	));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'opencage_toppage_btnbgcolor', array(
	    'label' => __( 'ヘッダーボタン背景色', 'opencage' ),
	    'section' => 'opencage_toppage_section',
	    'settings' => 'opencage_toppage_btnbgcolor',
    )));
}
add_action('customize_register', 'opencage_toppage_theme_customizer');

// 記事一覧
function opencage_layout_customizer($wp_customize) {
    $wp_customize->add_section( 'archiveslayout_section', array(
        'title'          =>'> 記事一覧ページ設定',
        'priority'       => 30,
	    'description' => '記事一覧ページ（トップページ・カテゴリー・タグのページ等）のレイアウトを変更可能です。',
    ));

    $wp_customize->add_setting('opencage_toppage_archivelayout', array(
	   'type'  => 'option',
	   'default' => 'toplayout-card',
	));
	$wp_customize->add_control( 'opencage_toppage_archivelayout', array(
	    'settings' => 'opencage_toppage_archivelayout',
	    'label' =>'[PC]トップページ記事レイアウト',
	    'section' => 'archiveslayout_section',
	    'type' => 'radio',
	    'choices' => array(
            'toplayout-simple' => 'シンプル',
            'toplayout-card' => 'カード型',
            'toplayout-big' => 'ビッグ',
        ),
	));

    $wp_customize->add_setting('opencage_toppage_sp_archivelayout', array(
	   'type'  => 'option',
	   'default' => 'toplayout-card',
	));
	$wp_customize->add_control( 'opencage_toppage_sp_archivelayout', array(
	    'settings' => 'opencage_toppage_sp_archivelayout',
	    'label' =>'[SP]トップページ記事レイアウト',
		'description' => '<span style="font-size:10px; opacity:0.7;">※PC画面では確認できません。実機にてご確認ください。</span>',
	    'section' => 'archiveslayout_section',
	    'type' => 'radio',
	    'choices' => array(
            'toplayout-simple' => 'シンプル',
            'toplayout-card' => 'カード型',
            'toplayout-big' => 'ビッグ',
        ),
	));

    $wp_customize->add_setting('opencage_archivelayout', array(
	   'type'  => 'option',
	   'default' => 'toplayout-simple',
	));
	$wp_customize->add_control( 'opencage_archivelayout', array(
	    'settings' => 'opencage_archivelayout',
	    'label' =>'[PC]その他一覧ページ記事レイアウト',
	    'section' => 'archiveslayout_section',
	    'type' => 'radio',
	    'choices' => array(
            'toplayout-simple' => 'シンプル',
            'toplayout-card' => 'カード型',
            'toplayout-big' => 'ビッグ',
        ),
	));

    $wp_customize->add_setting('opencage_sp_archivelayout', array(
	   'type'  => 'option',
	   'default' => 'toplayout-card',
	));
	$wp_customize->add_control( 'opencage_sp_archivelayout', array(
	    'settings' => 'opencage_sp_archivelayout',
	    'label' =>'[SP]その他一覧ページ記事レイアウト',
		'description' => '<span style="font-size:10px; opacity:0.7;">※PC画面では確認できません。実機にてご確認ください。</span>',
	    'section' => 'archiveslayout_section',
	    'type' => 'radio',
	    'choices' => array(
            'toplayout-simple' => 'シンプル',
            'toplayout-card' => 'カード型',
            'toplayout-big' => 'ビッグ',
        ),
	));
}
add_action( 'customize_register', 'opencage_layout_customizer' );


function opencage_postpage_customizer($wp_customize) {
    $wp_customize->add_section( 'postpage_section', array(
        'title'          =>'> 投稿・固定ページ設定',
        'priority'       => 30,
    ));

    $wp_customize->add_setting('post_options_postdesign', array(
	   'type'  => 'option',
	   'default' => 'pd_normal',
	));
	$wp_customize->add_control( 'post_options_postdesign', array(
	    'settings' => 'post_options_postdesign',
	    'label' =>'記事・固定ページレイアウト',
		'description' => '<span style="font-size:10px; opacity:0.7;">記事ページと固定ページのデザインを変更できます。※「ワンカラム」「バイラル風」を選択するとウィジェットの「PC:サイドバー」ウィジェットは表示されなくなります。</span>',
	    'section' => 'postpage_section',
	    'type' => 'radio',
	    'choices' => array(
            'pd_normal' => 'デフォルト（サイトバーあり）',
            'pd_onecolumn' => 'ワンカラム（サイドバーなし）',
            'pd_viral' => 'バイラル風（サイドバーなし）',
        ),
	));

    $wp_customize->add_setting('post_options_ttl', array(
	   'type'  => 'option',
	   'default' => 'h_default',
	));
	$wp_customize->add_control( 'post_options_ttl', array(
	    'settings' => 'post_options_ttl',
	    'label' =>'見出しデザイン',
		'description' => '<span style="font-size:10px; opacity:0.7;">見出しのデザインを変更することが可能です。</span>',
	    'section' => 'postpage_section',
	    'type' => 'radio',
	    'choices' => array(
            'h_default' => 'シンプル（デフォルト）',
            'h_stitch' => 'ステッチ風',
            'h_balloon' => '吹き出し風',
        ),
	));
    $wp_customize->add_setting('sns_options_text', array(
	   'type'  => 'option',
	));
	$wp_customize->add_control( 'sns_options_text', array(
	    'settings' => 'sns_options_text',
	    'label' =>'記事下のシェアタイトルを表示',
	    'section' => 'postpage_section',
	));
    $wp_customize->add_setting('sns_options_page', array(
	   'type'  => 'option',
	));
	$wp_customize->add_control( 'sns_options_page', array(
	    'settings' => 'sns_options_page',
	    'label' =>'固定ページでもSNSボタンを表示する',
		'description' => '<span style="font-size:10px; opacity:0.7;">固定ページにも独自のSNSボタンを表示させたい場合にチェック。※固定フロントページを利用している場合にはトップページでは表示されません。</span>',
	    'section' => 'postpage_section',
	    'type' => 'checkbox',
	));
    $wp_customize->add_setting('sns_options_hide', array(
	   'type'  => 'option',
	));
	$wp_customize->add_control( 'sns_options_hide', array(
	    'settings' => 'sns_options_hide',
	    'label' =>'SNSボタンを表示しない',
		'description' => '<span style="font-size:10px; opacity:0.7;">SNSボタンをプラグインなどで実装する場合に、チェックをいれればテーマ独自のSNSボタンが非表示になります。</span>',
	    'section' => 'postpage_section',
	    'type' => 'checkbox',
	));

    $wp_customize->add_setting('post_options_eyecatch', array(
	   'type'  => 'option',
	));
	$wp_customize->add_control( 'post_options_eyecatch', array(
	    'settings' => 'post_options_eyecatch',
	    'label' =>'記事・固定ページでアイキャッチ画像を非表示',
		'description' => '<span style="font-size:10px; opacity:0.7;">記事ページにてアイキャッチ画像が自動表示されなくなります。</span>',
	    'section' => 'postpage_section',
	    'type' => 'checkbox',
	));

    $wp_customize->add_setting('post_options_page_cta', array(
	   'type'  => 'option',
	));
	$wp_customize->add_control( 'post_options_page_cta', array(
	    'settings' => 'post_options_page_cta',
	    'label' =>'固定ページにもCTAウィジェットを表示する',
		'description' => '<span style="font-size:10px; opacity:0.7;">固定ページ下にもCTAウィジェットを表示させたい場合はチェックをいれてください。</span>',
	    'section' => 'postpage_section',
	    'type' => 'checkbox',
	));

    $wp_customize->add_setting('post_options_date', array(
	   'type'  => 'option',
	   'default' => 'date_on',
	));
	$wp_customize->add_control( 'post_options_date', array(
	    'settings' => 'post_options_date',
	    'label' =>'投稿日・更新日表示設定',
		'description' => '<span style="font-size:10px; opacity:0.7;">投稿日・更新日を非表示にすることができます。</span>',
	    'section' => 'postpage_section',
	    'type' => 'radio',
	    'choices' => array(
            'undo_off' => '投稿日のみ表示する',
            'date_on' => '投稿日・更新日を表示する',
            'date_off' => '投稿日・更新日を非表示にする',
        ),
	));

    $wp_customize->add_setting('post_options_authordisplay', array(
	   'type'  => 'option',
	   'default' => 'author_off',
	));
	$wp_customize->add_control( 'post_options_authordisplay', array(
	    'settings' => 'post_options_authordisplay',
	    'label' =>'投稿者名の表示設定',
		'description' => '<span style="font-size:10px; opacity:0.7;">記事ページ（記事タイトル下）、記事一覧ページにて投稿者名を表示します。</span>',
	    'section' => 'postpage_section',
	    'type' => 'radio',
	    'choices' => array(
            'author_off' => '投稿者名を表示しない（デフォルト）',
            'author_on' => '投稿者名を表示する',
        ),
	));

    $wp_customize->add_setting('post_options_authorbox', array(
	   'type'  => 'option',
	));
	$wp_customize->add_control( 'post_options_authorbox', array(
	    'settings' => 'post_options_authorbox',
	    'label' =>'記事下に投稿者情報を表示しない',
		'description' => '<span style="font-size:10px; opacity:0.7;">記事下の「この記事をかいた人」を出力したくない場合にチェックをいれてください。（プラグインを利用する場合などに）</span>',
	    'section' => 'postpage_section',
	    'type' => 'checkbox',
	));


    $wp_customize->add_setting('fbbox_options_url', array(
	   'type'  => 'option',
	));
	$wp_customize->add_control( 'fbbox_options_url', array(
	    'settings' => 'fbbox_options_url',
	    'label' =>'記事下にfacebookいいねボックスを表示',
		'description' => '<span style="font-size:10px; opacity:0.7;">facebookページのURLを入力 ※個人ページURLは使用できません。</span>',
	    'section' => 'postpage_section',
	));

    $wp_customize->add_setting('twbox_options_url', array(
	   'type'  => 'option',
	));
	$wp_customize->add_control( 'twbox_options_url', array(
	    'settings' => 'twbox_options_url',
	    'label' =>'記事下にTwitterボタンを表示',
		'description' => '<span style="font-size:10px; opacity:0.7;">リンクさせたいTwitterのURLを入力</span>',
	    'section' => 'postpage_section',
	));

    $wp_customize->add_setting('feedlybox_options', array(
	   'type'  => 'option',
	   'default' => 'feedly_off',
	));
	$wp_customize->add_control( 'feedlybox_options', array(
	    'settings' => 'feedlybox_options',
	    'label' =>'記事下にfeedlyボタンを表示',
		'description' => '<span style="font-size:10px; opacity:0.7;">Feedlyボタンを表示させたい場合はチェックを入れてください</span>',
	    'section' => 'postpage_section',
	    'type' => 'radio',
	    'choices' => array(
            'feedly_on' => '表示する',
            'feedly_off' => '表示しない',
        ),
	));

}
add_action( 'customize_register', 'opencage_postpage_customizer' );


add_action( 'customize_register', 'theme_customize_register' );
function theme_customize_register($wp_customize) {
    $wp_customize->add_section( 'option_section', array(
        'title'          =>'> アクセス解析コード・head',
        'priority'       => 30,
    ));
    $wp_customize->add_setting('other_options_ga', array(
	   'type'  => 'option',
	));
	$wp_customize->add_control( 'other_options_ga', array(
	    'label' =>'GoogleAnalytics',
		'description' => '<span style="font-size:10px; opacity:0.7;">入力例：「UA-xxxxxxxx-xx」<br>※プラグインなどで設定している場合は設定しないようご注意ください。2重でカウントとなる可能性があります。</span>',
	    'settings' => 'other_options_ga',
	    'section' => 'option_section',
	));

    $wp_customize->add_setting('other_options_headcode', array(
	   'type'  => 'option',
	));
	$wp_customize->add_control( 'other_options_headcode', array(
	    'label' =>'headタグ',
		'description' => '<span style="font-size:10px; opacity:0.7;"><head>タグ内に解析コードなどを入力したい場合はご記入いただけます。※PHPなどのプログラムファイルは動作しません。</span>',
	    'settings' => 'other_options_headcode',
	    'type' => 'textarea',
	    'section' => 'option_section',
	));
	
		$wp_customize->add_setting('other_options_bodycode', array(
	   'type'  => 'option',
	));
	$wp_customize->add_control( 'other_options_bodycode', array(
	    'label' =>'＜body＞タグの後ろ',
		'description' => '<span style="font-size:10px;">＜body＞タグの直後にscriptタグなどを設置する場合にここにコードを入力していただけます。 ※PHPなどのプログラムファイルは動作しません。</span>',
	    'settings' => 'other_options_bodycode',
	    'type' => 'textarea',
	    'section' => 'option_section',
	));


    $wp_customize->add_setting('other_options_footercode', array(
	   'type'  => 'option',
	));
	$wp_customize->add_control( 'other_options_footercode', array(
	    'label' =>'＜/body＞の前',
		'description' => '<span style="font-size:10px;">/bodyタグの直前に解析コードなどを入力したい場合はご記入いただけます。※PHPなどのプログラムファイルは動作しません。</span>',
	    'settings' => 'other_options_footercode',
	    'type' => 'textarea',
	    'section' => 'option_section',
	));
}
add_action( 'customize_register', 'theme_customize_register' );






add_theme_support( 'post-thumbnails' );
add_theme_support( 'custom-background',
    array(
    'default-color' => 'ffffff',
    'wp-head-callback' => '_custom_background_cb',
    'admin-head-callback' => '',
    'admin-preview-callback' => ''
    )
);
add_theme_support('automatic-feed-links');
add_theme_support( 'menus' );
register_nav_menus(
	array(
		'main-nav-pc' => __( 'グローバルナビ' ),
		'main-nav-sp' => __( 'グローバルナビ（スマートフォン）' ),
		'footer-links' => __( 'フッターナビ' )
	)
);

// Enable support for HTML5 markup.
add_theme_support( 'html5', array(
	'comment-list',
	'search-form',
	'comment-form'
) );
