<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Founder Parent
 */
?>

		<footer id="colophon" class="site-footer" role="contentinfo">
			<div class="container">
				<div class="subscribe-footer">
					<?php dynamic_sidebar( 'footer-widget-1' ); ?>
				</div>

				<div class="subscribe-footer-new">
					<?php dynamic_sidebar( 'footer-widget-2' ); ?>
				</div>

				<div class="subscribe-footer-new">
					<?php dynamic_sidebar( 'footer-widget-3' ); ?>
				</div>

				<div class="subscribe-footer-new">
					<?php dynamic_sidebar( 'footer-widget-4' ); ?>
				</div>
			
                <?php if ( get_theme_mod( 'footer_text' ) ) : ?>
                <div class="site-info">
                <div class="sub-footer-left">
                <?php echo get_theme_mod( 'footer_text', '' ); ?>
           		 </div>
                <?php endif; ?>

                <div class="sub-footer-right">
                	<?php if ( has_nav_menu( 'social' ) ) {
						wp_nav_menu(
							array(
								'theme_location'  => 'social',
								'container'       => 'div',
								'container_id'    => 'menu-social',
								'container_class' => 'menu',
								'menu_id'         => 'menu-social-items',
								'menu_class'      => 'menu-items',
								'depth'           => 1,
								'link_before'     => '<span class="screen-reader-text">',
								'link_after'      => '</span>',
								'fallback_cb'     => '',
							)
						);

					} ?>
                </div>
                <!--END #tagline options-->
			</div><!-- .site-info -->
		</div>

<?php 
    if( get_theme_mod( 'footer_background_image' ) != '') {
        $founder_parent_footer_bg = get_theme_mod('footer)background_image');
    } 
?>
		
		 <!-- background cover image -->
  		<div class="sitefooter-bg-wrap">
      		<div class="site-footer-bg-image background-footer-image" style="background-image:url('<?php echo get_theme_mod('footer_background_image'); ?>');"></div>
    	</div>

		
		</footer><!-- #colophon -->

	<?php wp_footer(); ?>

	</div><!-- #canvas -->
	</div>
</body>
</html>