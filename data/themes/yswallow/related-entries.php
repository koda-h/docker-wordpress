<?php

$categories = get_the_category($post->ID);
$category_ID = array();
foreach($categories as $category):
  array_push( $category_ID, $category -> cat_ID);
endforeach ;
$args = array(
  'post__not_in' => array($post -> ID),
  'posts_per_page'=> 8,
  'category__in' => $category_ID,
  'orderby' => 'rand',
);
$query = new WP_Query($args); ?>
  <?php if( $query -> have_posts() ): ?>
<div class="related-box original-related wow animated fadeIn cf">
    <div class="inbox">
	    <h2 class="related-h h_ttl"><span class="gf">RECOMMEND</span></h2>
		    <div class="related-post">
				<ul class="related-list cf">

  <?php while ($query -> have_posts()) : $query -> the_post(); ?>
	        <li rel="bookmark" title="<?php the_title_attribute(); ?>">
		        <a href="<?php the_permalink(); ?>" rel=\"bookmark" title="<?php the_title_attribute(); ?>" class="title">
					<figure class="eyecatch<?php if (!has_post_thumbnail()):?> noimg<?php endif;?>">
					<?php the_post_thumbnail('post-thum'); ?>
					</figure>
					<time class="date gf"><?php echo get_the_date(); ?></time>
					<h3 class="ttl">
						<?php if(mb_strlen($post->post_title)>38) { $title= mb_substr($post->post_title,0,36) ; echo $title. "…" ;
						} else {echo $post->post_title;}?>
					</h3>
				</a>
	        </li>
  <?php endwhile;?>

  			</ul>
	    </div>
    </div>
</div>
  <?php else:?>
<div class="related-box cf">
    <div class="inbox">
	    <h2 class="related-h h_ttl"><span class="gf">RECOMMEND</span></h2>
	    <p class="related-none-h txt_c">関連記事は見つかりませんでした。</p>
	</div>
</div>
  <?php
endif;
wp_reset_postdata();
?>