<?php
/**
 * The template for displaying all single EDD posts.
 *
 * @package Founder Parent
 */

get_header( 'sub' ); ?>

<?php  if ( has_post_thumbnail() ) : ?>
 	<div class="sidebar-podcast">
		<div class="meta-podcast">
 			<div class="media"><?php the_post_thumbnail(); ?></div>
		</div>
	</div>
<?php endif; ?>
    
    </div>
</div>
<!--end header inside-->

<!-- background cover image -->
<div class="site-header-bg-wrap">
 <?php if (has_post_thumbnail( $post->ID ) && ( $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), '') ) && isset( $image[0] ) ) { ?>
 <<div class="background-cover-image" style="background-image: url('<?php echo esc_url ( $image[0] ); ?>')" ></div>
 <?php }
 ?>
</div>
</header>
<!-- #masthead -->

 <main id="main" class="site-main" role="main">
	<div class="container">
		
		<div class="main-blog-column">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', 'download' ); ?>
		</div>


		   	<?php get_template_part( 'content', 'meta-download' ); ?>	

			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			?>

		<?php endwhile; // end of the loop. ?>

	</div>
</main><!-- #main -->

<?php get_footer(); ?>
