<?php
/**
 * @package Founder Parent
 */

get_header( 'sub' ); ?>

 	<div class="sidebar-podcast">
		<div class="meta-podcast">
 	<?php
			if (get_post_meta($post->ID, 'audio')) {
				echo '<div class="entry-audio">';
				echo get_post_meta($post->ID, 'audio', true);
				echo '</div>';
				}
					else {
			} 
		?>
		</div>
	</div>
    
    </div>
</div>
<!--end header inside-->

<!-- background cover image -->
<div class="site-header-bg-wrap">
<?php if (has_post_thumbnail( $post->ID ) && ( $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), '') ) && isset( $image[0] ) ) { ?>
 <div class="background-cover-image" style="background-image: url('<?php echo esc_url ( $image[0] ); ?>')" ></div>
 <?php }
 ?>
</div>
</header>
<!-- #masthead -->

<main id="main" class="site-main" role="main">
	<div class="container">
			<div class="main-blog-column">

					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<div class="entry-content">
						<?php the_content(); ?>
						<?php
							wp_link_pages( array(
								'before' => '<div class="page-links">' . __( 'Pages:', 'founder-parent' ),
								'after'  => '</div>',
							) );
						?>
					</div><!-- .entry-content -->

				</article><!-- #post-## -->
				</div>

	  	<!-- .meta-sidebar -->
	  	<?php get_template_part( 'content', 'meta-single' ); ?> 
	  	<!-- .meta-sidebar -->

</div>
		</main><!-- #main -->

<?php get_footer(); ?>


