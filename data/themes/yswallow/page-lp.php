<?php
/*
Template Name:ランディングページ
Template Post Type: page
*/
?>
<?php get_header(); ?>
<div id="content" class="lp">
<div id="inner-content" class="wrap animated anidelayS fadeIn cf">

<?php if( has_post_thumbnail() ):?>
<header class="article-header entry-header">
<figure class="eyecatch">
<?php the_post_thumbnail(); ?>
</figure>
</header>
<?php endif; ?>
<main id="main" class="cf" role="main">

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article">

<section class="entry-content cf">
<?php the_content(); ?>
</section>

</article>
<?php endwhile; endif; ?>
</main>
</div>
</div>
<?php get_footer(); ?>