<?php if ( !is_mobile() && is_active_sidebar( 'sidebar-pc' )) : ?>
<div id="sidebar" class="sidebar cf animated fadeIn" role="complementary">
	<?php dynamic_sidebar( 'sidebar-pc' ); ?>
</div>
<?php endif; ?>
