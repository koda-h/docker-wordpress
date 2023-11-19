<div class="archives-list simple-list">

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>


<article <?php post_class('post-list animated fadeIn'); ?> role="article">
<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>" class="cf">
<figure class="eyecatch<?php if (!has_post_thumbnail()):?> noimg<?php endif;?>">
<?php the_post_thumbnail('home-thum'); ?>
<?php archivecatname(); ?>
</figure>

<section class="entry-content">
<h1 class="h2 entry-title"><?php the_title(); ?></h1>
<div class="byline entry-meta vcard">
<?php $post_options_date = get_option('post_options_date'); if ( $post_options_date !== "date_off" ) : ?><time class="date gf updated"><?php echo get_the_date(); ?></time><?php endif;?>
<?php if(get_option('post_options_authordisplay','author_off') == 'author_on'): ?><span class="writer name author"><?php echo get_avatar(get_the_author_meta('ID'), 30); ?><span class="fn"><?php the_author(); ?></span></span><?php endif; ?>
</div>
<div class="description"><?php the_excerpt(); ?></div>
</section>
</a>
</article>


<?php endwhile; ?>


<?php elseif(is_search()): ?>
<article id="post-not-found" class="cf">
<header class="article-header">
<h1>記事が見つかりませんでした。</h1>
</header>

<section class="entry-content">

<p>お探しのキーワードで記事が見つかりませんでした。別のキーワードで再度お探しいただくか、カテゴリ一覧からお探し下さい。</p>

<div class="search">
<h2>キーワード検索</h2>
<?php get_search_form(); ?>
</div>


<div class="cat-list cf">
<h2>カテゴリーから探す</h2>
<ul>
<?php $args = array(
'title_li' => '',
); ?>
<?php wp_list_categories($args); ?>
</ul>
</div>

</section>

</article>

<?php else : ?>

<article id="post-not-found" class="cf">
<header class="article-header">
<h1>まだ投稿がありません！</h1>
</header>
<section class="entry-content">
<p>表示する記事がまだありません。</p>
</section>
</article>

<?php endif; ?>
</div>