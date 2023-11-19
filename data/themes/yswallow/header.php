<!doctype html>
<html <?php language_attributes(); ?> class="no-js">

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="HandheldFriendly" content="True">
<meta name="MobileOptimized" content="320">
<meta name="viewport" content="width=device-width, initial-scale=1"/>

<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

<!--[if lt IE 9]>
<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<script src="//css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
<![endif]-->

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
<div id="container">

<?php if(!is_page_template( 'page-lp.php' ) && !is_singular( 'post_lp' )): ?>

<header id="header" class="header animated fadeIn">
<div id="inner-header" class="wrap cf">

<?php if (is_active_sidebar('sidebar-sp')):?>
<a href="#spnavi" data-remodal-target="spnavi" class="nav_btn"><span class="text">MENU</span></a>
<div class="remodal" data-remodal-id="spnavi" data-remodal-options="hashTracking:false">
<button data-remodal-action="close" class="remodal-close"><span class="text gf">CLOSE</span></button>
<?php dynamic_sidebar( 'sidebar-sp' ); ?>
<button data-remodal-action="close" class="remodal-close"><span class="text gf">CLOSE</span></button>
</div>
<?php endif; ?>

<?php if(get_option('side_options_header_search','search_off') == 'search_on'):?>
<div class="searchbox">
<form role="search" method="get" id="searchform" class="searchform cf" action="<?php echo esc_html(home_url( '/' )) ?>" >
<input type="search" placeholder="キーワードを入力" value="<?php get_search_query()?>" name="s" id="s" />
<span class="nav_btn search_btn"><span class="text">SEARCH</span></span>
</form>
</div>
<?php endif;?>

<div id="logo" class="<?php echo esc_html(get_option('opencage_logo_size'));?> <?php echo esc_html(get_option('side_options_description'));?>">
<?php if ( is_home() || is_front_page() ) : ?>
<?php if ( get_theme_mod( 'opencage_logo' ) ) : ?>
<h1 class="h1 img"><a href="<?php echo esc_url(home_url()); ?>" rel="nofollow"><img src="<?php echo get_theme_mod( 'opencage_logo' ); ?>" alt="<?php bloginfo('name'); ?>"></a></h1>
<?php else : ?>
<h1 class="h1 text"><a href="<?php echo esc_url(home_url()); ?>" rel="nofollow"><?php bloginfo('name'); ?></a></h1>
<?php endif; ?>
<?php else: ?>
<?php if ( get_theme_mod( 'opencage_logo' ) ) : ?>
<p class="h1 img"><a href="<?php echo esc_url(home_url()); ?>"><img src="<?php echo get_theme_mod( 'opencage_logo' ); ?>" alt="<?php bloginfo('name'); ?>"></a></p>
<?php else : ?>
<p class="h1 text"><a href="<?php echo esc_url(home_url()); ?>"><?php bloginfo('name'); ?></a></p>
<?php endif; ?>
<?php endif; ?>
<?php if ( get_option('side_options_description', 'sitedes_on') == "sitedes_on" ) : ?><p class="site_description"><?php bloginfo('description'); ?></p><?php endif; ?>
</div>

<?php if (has_nav_menu('main-nav-pc') && !is_mobile()):?>
<div id="g_nav" class="g_nav-sp animated anidelayS fadeIn">
<?php wp_nav_menu(array(
     'container' => 'nav',
     'container_class' => 'menu-sp cf',
     'menu' => __( 'グローバルナビ' ),
     'menu_class' => 'nav top-nav cf',
     'theme_location' => 'main-nav-pc',
     'before' => '',
     'after' => '',
     'link_before' => '',
     'link_after' => '',
     'depth' => 0,
     'fallback_cb' => ''
)); ?>
</div>
<?php endif;?>

<?php if (has_nav_menu('main-nav-sp') && is_mobile()):?>
<div id="g_nav" class="g_nav-sp mobileview animated anidelayS fadeIn">
<?php wp_nav_menu(array(
     'container' => 'nav',
     'container_class' => 'menu-sp cf',
     'menu' => __( 'グローバルナビ（スマートフォン）' ),
     'menu_class' => 'nav top-nav cf',
     'theme_location' => 'main-nav-sp',
     'before' => '',
     'after' => '',
     'link_before' => '',
     'link_after' => '',
     'depth' => 0,
     'fallback_cb' => ''
)); ?>
</div>
<?php endif;?>

</div>
</header>

<?php get_template_part( 'parts_homeheader' ); ?>


<?php if ( get_option('other_options_headerunderlink') && get_option('other_options_headerundertext') ) : ?>
<div class="header-info"><a<?php if(get_option('other_options_headerunderlink_target')):?> target="_blank"<?php endif;?> style="background-color: <?php echo get_theme_mod( 'other_options_headerunderlink_bgcolor'); ?>;" href="<?php echo esc_html(get_option('other_options_headerunderlink'));?>"><?php echo esc_html(get_option('other_options_headerundertext'));?></a></div>
<?php endif;?>

<?php get_template_part( 'parts_slider' ); ?>


<?php
	if(get_option('side_options_pannavi', 'pannavi_on') == 'pannavi_on'){
		breadcrumb();
	}
?>

<?php endif; ?>