<?php get_header(); ?>
<div id="content">
<div id="inner-content" class="wrap cf">

<div class="main-wrap">
<main id="main" class="animated anidelayS fadeIn cf" role="main">

<div class="archivettl">
<?php if (is_category()) { ?>
<h1 class="archive-title h2">
<?php single_cat_title(); ?>
</h1>
<?php } elseif (is_tag()) { ?>
<h1 class="archive-title h2">
<?php single_tag_title(); ?>
</h1>
<?php } elseif (is_search()) { ?>
<h1 class="archive-title h2">
<?php echo esc_attr(get_search_query()); ?>
</h1>
<?php } elseif (is_author()) {
global $post;
$author_id = $post->post_author;
?>
<h1 class="archive-title h2">
<span class="author-icon"><?php echo get_avatar(get_the_author_meta('ID') , 150); ?></span>
「<?php the_author_meta('display_name', $author_id); ?>」の記事
</h1>
<?php } elseif (is_day()) { ?>
<h1 class="archive-title h2"><?php the_time('Y年n月j日'); ?></h1>
<?php } elseif (is_month()) { ?>
<h1 class="archive-title h2"><?php the_time('Y年n月'); ?></h1>
<?php } elseif (is_year()) { ?>
<h1 class="archive-title h2"><?php the_time('Y年'); ?></h1>
<?php } ?>
</div>
<?php if (category_description() && !is_paged()) : ?>
<div class="taxonomy-description entry-content"><?php echo category_description(); ?></div>
<?php endif; ?>

<?php
	$toplayout = get_option('opencage_archivelayout');
	$toplayoutsp = get_option('opencage_sp_archivelayout');
?>
<?php if (is_mobile()) :?>
	<?php if ( $toplayoutsp == "toplayout-big" ) : ?>
	<?php get_template_part( 'parts_archive_big' ); ?>
	<?php elseif ( $toplayoutsp == 'toplayout-simple' ) : ?>
	<?php get_template_part( 'parts_archive_simple' ); ?>
	<?php else : ?>
	<?php get_template_part( 'parts_archive_card' ); ?>
	<?php endif;?>
<?php else : ?>
	<?php if ( $toplayout == "toplayout-big" ) : ?>
	<?php get_template_part( 'parts_archive_big' ); ?>
	<?php elseif ( $toplayout == 'toplayout-simple' ) : ?>
	<?php get_template_part( 'parts_archive_simple' ); ?>
	<?php else : ?>
	<?php get_template_part( 'parts_archive_card' ); ?>
	<?php endif;?>
<?php endif;?>

<?php pagination(); ?>

</main>
</div>
<div class="side-wrap">
<?php get_sidebar(); ?>
</div>
</div>
</div>
<?php get_footer(); ?>