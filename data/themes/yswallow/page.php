<?php get_header(); ?>
<div id="content">
<div id="inner-content" class="wrap cf">

<div class="main-wrap">
<main id="main" class="animated anidelayS fadeIn cf" role="main">

<?php parts_add_top(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article">
<?php if(!is_front_page()):?>
<header class="article-header entry-header"<?php if ( get_option('post_options_postdesign') == "pd_viral") :?> style="background-image: url(<?php the_post_thumbnail_url('full'); ?>)"<?php endif;?>>
<div class="inner">
<h1 class="entry-title page-title" itemprop="headline" rel="bookmark"><?php the_title(); ?></h1>
<?php
	if ( get_option('post_options_postdesign') !== "pd_viral") : 
		if ( has_post_thumbnail() && !get_option( 'post_options_eyecatch' ) ) :?>
<figure class="eyecatch">
<?php
	the_post_thumbnail();
	 if($pt_caption = get_post(get_post_thumbnail_id())->post_excerpt) {//caption
		 echo '<figcaption class="eyecatch-caption-text">'.$pt_caption.'</figcaption>';
	 }
?>
</figure>
<?php endif;endif; ?>
</div>
</header>
<?php endif;?>
<?php if ( !get_option( 'sns_options_hide' ) && get_option( 'sns_options_page' )) : ?>
<?php get_template_part( 'parts_sns' ); ?>
<?php endif; ?>
<section class="entry-content cf">
<?php the_content(); ?>
</section>
<?php if ( !get_option( 'sns_options_hide' ) && get_option( 'sns_options_page' )) : ?>
<footer class="article-footer">
<div class="sharewrap wow animated fadeIn" data-wow-delay="0.5s">
<?php if ( get_option( 'sns_options_text' ) ) : ?>
<h3><?php echo get_option( 'sns_options_text' ); ?></h3>
<?php endif; ?>
<?php get_template_part( 'parts_sns' ); ?>
</div>
</footer>
<?php endif; ?>

<?php if ( is_active_sidebar( 'cta' ) && get_option( 'post_options_page_cta' )) : ?>
<div class="cta-wrap wow animated fadeIn" data-wow-delay="0.7s">
<?php dynamic_sidebar( 'cta' ); ?>
</div>
<?php endif; ?>

</article>
<?php endwhile; endif; ?>
<?php parts_add_bottom(); ?>
</main>
</div>

<?php if ( get_option('post_options_postdesign') !== "pd_viral" && get_option('post_options_postdesign') !== "pd_onecolumn" ) : ?>
<div class="side-wrap">
<?php get_sidebar(); ?>
</div>
<?php endif; ?>

</div>
</div>
<?php get_footer(); ?>