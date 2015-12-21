<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Founder Parent
 */

get_header('blog'); ?>

<main id="main" class="site-main" role="main">
		<div class="container">
			<div class="main-blog-column">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', 'page' ); ?>
			</div>
		
		
	  	<!-- .meta-sidebar -->
	  	<?php get_template_part( 'content', 'meta-page' ); ?> 
	  	<!-- .meta-sidebar -->
		
		</div>

<div class="block-comments">
		<div class="container">

				<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				?>

			<?php endwhile; // end of the loop. ?>

		</div>
	</div>

</main><!-- #main -->

<?php get_footer(); ?>
