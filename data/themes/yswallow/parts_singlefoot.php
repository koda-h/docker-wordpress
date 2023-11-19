<?php if ( !get_option( 'sns_options_hide' ) ) : ?>
<div class="sharewrap wow animated fadeIn" data-wow-delay="0.5s">
<?php if (get_option('sns_options_text')) {echo '<h3>'.get_option( 'sns_options_text' ).'</h3>';}?>
<?php get_template_part( 'parts_sns' ); ?>
</div>
<?php endif; ?>


<?php if ( get_option( 'fbbox_options_url' ) || get_option( 'twbox_options_url' ) || get_option( 'feedlybox_options' , 'feedly_off') == 'feedly_on' ) : ?>
<div class="fb-likebtn wow animated fadeIn cf" data-wow-delay="0.5s" style="background-image: url(<?php the_post_thumbnail_url();?>);">

<div class="inner">
	<div class="like_text"><p>FOLLOW</p></div>
<?php if ( get_option( 'fbbox_options_url' ) ) : ?>
<?php $fburl = get_option( 'fbbox_options_url' );?>
<div id="fb-root"></div>
<script>(function(d, s, id) {
var js, fjs = d.getElementsByTagName(s)[0];
if (d.getElementById(id)) return;
js = d.createElement(s); js.id = id;
js.src = "//connect.facebook.net/ja_JP/sdk.js#xfbml=1&version=v2.4";
fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
	<div class="fb-like fb-button" data-href="<?php echo $fburl;?>" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div>
	<?php endif; ?>

	<?php if ( get_option( 'twbox_options_url' ) ) : ?>
	<?php $twurl = get_option( 'twbox_options_url' );?>
	<a class="followbtn btn_twitter" href="<?php echo $twurl;?>" target="_blank">Twitter</a>
	<?php endif; ?>
	
	<?php $feedlybox = get_option('feedlybox_options'); if ( $feedlybox == "feedly_on" ) : ?>
	<a class="followbtn btn_feedly" href="https://feedly.com/i/subscription/feed/<?php echo urlencode(bloginfo('rss2_url')) ;?>"  target="blank">Feedly</a>
	<?php endif; ?>	

</div>
</div>
<?php endif; ?>



<?php if ( is_active_sidebar( 'cta' ) ) : ?>
<div class="cta-wrap wow animated fadeIn" data-wow-delay="0.7s">
<?php dynamic_sidebar( 'cta' ); ?>
</div>
<?php endif; ?>


<?php comments_template(); ?>


<?php if(function_exists('related_posts')): ?>
<?php related_posts(); ?>
<?php else :?>
<?php get_template_part( 'related-entries' ); ?>
<?php endif;?>


<?php if(get_the_author_meta('description') && !get_option('post_options_authorbox')) : ?>
<div class="authorbox wow animated fadeIn" data-wow-delay="0.5s">
<div class="inbox">
	<h2 class="h_ttl"><span class="gf">ABOUT US</span></h2>
<div class="profile cf">
<div class="profile_img">
	<?php echo get_avatar(get_the_author_meta('ID'), 150); ?>
</div>
<div class="profile_description">
<div class="profile_name"><?php the_author_posts_link(); ?>
<?php if(get_the_author_meta('userposition')) : ?><span class="userposition"><?php the_author_meta( 'userposition' ); ?></span><?php endif ;?>
</div>
<?php the_author_meta("description" ); ?>
</div>
</div>
<div class="author_sns">
<ul>
<?php if(get_the_author_meta('user_url')) : ?>
<li class="author-site"><a href="<?php the_author_meta( 'user_url' ); ?>" target="_blank">WebSite</a></li>
<?php endif ;?>
<?php if(get_the_author_meta('twitter')) : ?>
<li class="author-twitter"><a href="<?php the_author_meta( 'twitter' ); ?>" rel="nofollow" target="_blank">Twitter</a></li>
<?php endif ;?>
<?php if(get_the_author_meta('facebook')) : ?>
<li class="author-facebook"><a href="<?php the_author_meta( 'facebook' ); ?>" rel="nofollow" target="_blank">Facebook</a></li>
<?php endif ;?>
<?php if(get_the_author_meta('googleplus')) : ?>
<li class="author-google"><a href="<?php the_author_meta( 'googleplus' ); ?>" rel="nofollow" target="_blank">Google+</a></li>
<?php endif ;?>
<?php if(get_the_author_meta('instagram')) : ?>
<li class="author-instagram"><a href="<?php the_author_meta( 'instagram' ); ?>" rel="nofollow" target="_blank">Instagram</a></li>
<?php endif ;?>
<?php if(get_the_author_meta('youtube')) : ?>
<li class="author-youtube"><a href="<?php the_author_meta( 'youtube' ); ?>" rel="nofollow" target="_blank">YouTube</a></li>
<?php endif ;?>

</ul>
</div>
</div>
</div>
<?php endif ;?>