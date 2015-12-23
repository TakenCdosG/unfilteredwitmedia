<?php if ( is_active_sidebar( 'page-sidebar' ) ) { ?>
<div class="sidebar-column">
	<div class="meta-page-sidebar">
		<div class="meta-page-content">
			<?php include('subscribe.php') ?>
		<?php dynamic_sidebar( 'page-sidebar' ); ?>
		</div>
	</div>
</div>
<?php } ?>
