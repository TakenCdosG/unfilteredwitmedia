<?php
/*
Template Name: Page: Right Sidebar
*/

get_header('blog'); ?>

<main id="main" class="site-main" role="main">
	<div class="container">
		<div class="main-blog-column">

		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php the_content(); ?>

			<?php endwhile; ?>

		<?php endif; ?>
	</div>

	<div class="sidebar-column">
	<div class="meta-page-sidebar">
		<div class="meta-page-content">
		<?php dynamic_sidebar( 'page-sidebar' ); ?>
		</div>
	</div>
</div>

</div>

</main><!-- #main -->

<?php get_footer(); ?>
