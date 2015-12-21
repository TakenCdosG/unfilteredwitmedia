<?php
/*
Template Name: Full Width
*/

get_header('blog'); ?>

<main id="main" class="site-main" role="main">
	<div class="container">
		<div class="main-column">

		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php the_content(); ?>

			<?php endwhile; ?>

		<?php endif; ?>
	</div>

</div>

</main><!-- #main -->

<?php get_footer(); ?>
