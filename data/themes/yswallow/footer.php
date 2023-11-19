<?php if(!is_page_template( 'page-lp.php' ) && !is_singular( 'post_lp' )): ?>
<?php
	if(get_option('side_options_pannavi', 'pannavi_on') == 'pannavi_on_bottom'){
		breadcrumb();
	}
?>
<div id="footer-top" class="footer-top wow animated fadeIn">
	<div class="wrap cf">
		<div class="inner">
	<?php if ( !is_mobile()) : ?>
		<?php if ( is_active_sidebar( 'footwidget1' )) : ?>
			<div class="footcolumn"><?php dynamic_sidebar( 'footwidget1' ); ?></div>
		<?php endif; ?>
		<?php if ( is_active_sidebar( 'footwidget2' )) : ?>
			<div class="footcolumn"><?php dynamic_sidebar( 'footwidget2' ); ?></div>
		<?php endif; ?>
	<?php endif; ?>

	<?php if ( is_active_sidebar( 'footwidget-sp' ) && is_mobile() ) : ?>
		<div class="footcolumn"><?php dynamic_sidebar( 'footwidget-sp' ); ?></div>
	<?php endif; ?>

		</div>
	</div>
</div>
<?php endif; ?>

<footer id="footer" class="footer wow animated fadeIn" role="contentinfo">

	<div id="inner-footer" class="inner wrap cf">
		<nav role="navigation">
			<?php wp_nav_menu(array(
			'container' => 'div',
			'container_class' => 'footer-links cf',
			'menu' => __( 'Footer Links' ),
			'menu_class' => 'footer-nav cf',
			'theme_location' => 'footer-links',
			'before' => '',
			'after' => '',
			'link_before' => '',
			'link_after' => '',
			'depth' => 0,
			'fallback_cb' => ''
			)); ?>
		</nav>
		<p class="source-org copyright">&copy;Copyright<?php echo date('Y'); ?> <a href="<?php echo esc_url(home_url()); ?>" rel="nofollow"><?php bloginfo( 'name' ); ?></a>.All Rights Reserved.</p>
	</div>
</footer>
</div>
<?php wp_footer(); ?>
</body>
</html>