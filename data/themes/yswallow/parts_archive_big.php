<div class="archives-list big-list cf">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post-list cf'); ?> role="article">
<header class="article-header">

<h1 class="entry-title single-title" itemprop="headline" rel="bookmark"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
<div class="byline entry-meta vcard cf">
<time class="date gf entry-date updated"<?php if ( get_the_date('Ymd') >= get_the_modified_date('Ymd') ) : ?>  datetime="<?php echo get_the_date('Y-m-d') ?>"<?php endif; ?>><?php echo get_the_date(); ?></time>
<?php if ( get_the_date('Ymd') < get_the_modified_date('Ymd') ) : ?><time class="date gf entry-date undo updated" datetime="<?php echo get_the_modified_date( 'Y-m-d' ) ?>"><?php echo get_the_modified_date() ?></time><?php endif; ?>
<?php if(get_option('post_options_authordisplay','author_off') == 'author_on'): ?><span class="writer name author"><?php echo get_avatar(get_the_author_meta('ID'), 30); ?><span class="fn"><?php the_author(); ?></span></span><?php endif; ?>
</div>

<?php if ( has_post_thumbnail() ) :?>
<figure class="eyecatch">
<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
<?php
	the_post_thumbnail();
	 if($pt_caption = get_post(get_post_thumbnail_id())->post_excerpt) {//caption
		 echo '<figcaption class="eyecatch-caption-text">'.$pt_caption.'</figcaption>';
	 }
?>
</a>
<?php archivecatname(); ?>
</figure>
<?php endif; ?>
</header>

<section class="entry-content cf">
<div class="description"><?php the_excerpt(); ?></div>
<div class="btn-wrap big maru aligncenter readmore"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><span>続きを読む</span></a></div>
</section>
</article>
<?php endwhile; ?>
<?php else : ?>
<article id="post-not-found" class="cf">
<header class="article-header">
<h1>まだ投稿がありません。</h1>
</header>
<section class="entry-content">
<p>表示する記事がみつかりませんでした。</p>
</section>
</article>
<?php endif; ?>
</div>