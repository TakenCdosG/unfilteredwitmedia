<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Founder Parent
 */

get_header('archive'); ?>

<main id="main" class="site-main" role="main">
	<div class="container">
		<div class="main-blog-column">

		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					if(!get_post_format()) {
						get_template_part('content');
					} else {
					 	get_template_part('content', get_post_format());
					};
				?>

			<?php endwhile; ?>

			<?php founder_parent_posts_navigation(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>
	</div>

  	<!-- .meta-sidebar -->
  	<?php get_template_part( 'content', 'meta-page' ); ?> 
  	<!-- .meta-sidebar -->
  	
</div>

</main><!-- #main -->

<?php get_footer(); ?>
