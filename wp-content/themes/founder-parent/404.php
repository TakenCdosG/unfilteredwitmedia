<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package Founder Parent
 */

get_header('blog'); ?>

<main id="main" class="site-main" role="main">
	<div class="container">
		<div class="main-blog-column">

			<section class="error-404 not-found">
				<header class="page-header">
					<p><?php _e( 'Something&rsquo;s not quite right, head back to the homepage and please try again.', 'founder-parent' ); ?></p>
				</header><!-- .page-header -->
			</section><!-- .error-404 -->

	</div>

  	<!-- .meta-sidebar -->
  	<?php get_template_part( 'content', 'meta-page' ); ?> 
  	<!-- .meta-sidebar -->
  	
</div>

</main><!-- #main -->

<?php get_footer(); ?>
