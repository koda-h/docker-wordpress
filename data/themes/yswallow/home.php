<?php get_header(); ?>
<div id="content">
<div id="inner-content" class="wrap cf">
<div class="main-wrap">
<main id="main" class="animated anidelayS fadeIn cf" role="main">

<?php parts_add_top(); ?>

<?php
	$toplayout = get_option('opencage_toppage_archivelayout');
	$toplayoutsp = get_option('opencage_toppage_sp_archivelayout');
?>
<?php if (is_mobile()) :?>
	<?php if ( $toplayoutsp == "toplayout-big" ) : ?>
	<?php get_template_part( 'parts_archive_big' ); ?>
	<?php elseif ( $toplayoutsp == 'toplayout-card' ) : ?>
	<?php get_template_part( 'parts_archive_card' ); ?>
	<?php else : ?>
	<?php get_template_part( 'parts_archive_simple' ); ?>
	<?php endif;?>
<?php else : ?>
	<?php if ( $toplayout == "toplayout-big" ) : ?>
	<?php get_template_part( 'parts_archive_big' ); ?>
	<?php elseif ( $toplayout == 'toplayout-card' ) : ?>
	<?php get_template_part( 'parts_archive_card' ); ?>
	<?php else : ?>
	<?php get_template_part( 'parts_archive_simple' ); ?>
	<?php endif;?>
<?php endif;?>

<?php pagination(); ?>

<?php parts_add_bottom(); ?>

</main>
</div>
<div class="side-wrap">
<?php get_sidebar(); ?>
</div>
</div>
</div>
<?php get_footer(); ?>