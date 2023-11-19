<?php
if( is_front_page() && !is_paged() && get_option('opencage_toppage_header', 'toppage_header_on') !== "toppage_header_off" ):
	if(get_option('opencage_toppage_headertext_l') || get_option('opencage_toppage_headertext_s')):?>

<div id="custom_header" class="<?php echo esc_html(get_option('opencage_toppage_bgoverlay')); ?>" style="color:<?php echo get_theme_mod('opencage_toppage_textcolor');?>; background-image: url(<?php if ( get_theme_mod('opencage_toppage_headerimgsp') && is_mobile()):?><?php echo get_theme_mod('opencage_toppage_headerimgsp');?><?php else:?><?php echo get_theme_mod('opencage_toppage_headerimg');?><?php endif;?>);">

	<div class="wrap cf">
		<div class="header-text">
			<?php if ( get_option( 'opencage_toppage_headertext_l' )) : ?>
			<h2 class="sitecopy animated fadeInDown"><?php echo get_option( 'opencage_toppage_headertext_l' ); ?></h2>
			<?php endif; ?>
			<?php if ( get_option( 'opencage_toppage_headertext_s' )) : ?>
			<div class="sub_sitecopy animated fadeInUp"><?php echo get_option( 'opencage_toppage_headertext_s' ); ?></div>
			<?php endif; ?>
			<?php if ( get_option( 'opencage_toppage_headerlink' )) : ?>
			<div class="btn-wrap maru animated fadeInUpBig anidelayM"><a style="color:<?php echo get_theme_mod( 'opencage_toppage_btncolor' ); ?>;background:<?php echo get_theme_mod( 'opencage_toppage_btnbgcolor' ); ?>;" href="<?php echo get_option( 'opencage_toppage_headerlink' ); ?>"><?php if ( get_option( 'opencage_toppage_headerlinktext' )) : ?><?php echo get_option( 'opencage_toppage_headerlinktext' ); ?><?php else:?>詳しくはこちら<?php endif;?></a></div>
			<?php endif; ?>
		</div>
	</div>

</div>
	<?php elseif( get_theme_mod('opencage_toppage_headerimgsp') || get_theme_mod('opencage_toppage_headerimg') ) :?>
	<div id="custom_header_img" class="cf"><?php if ( get_option( 'opencage_toppage_headerlink' )) : ?><a href="<?php echo get_option( 'opencage_toppage_headerlink' ); ?>"><?php endif;?><img src="<?php if ( get_theme_mod('opencage_toppage_headerimgsp') && is_mobile()):?><?php echo get_theme_mod('opencage_toppage_headerimgsp');?><?php else:?><?php echo get_theme_mod('opencage_toppage_headerimg');?><?php endif;?>"><?php if ( get_option( 'opencage_toppage_headerlink' )) : ?></a><?php endif;?></div>
<?php
	endif;
endif; ?>