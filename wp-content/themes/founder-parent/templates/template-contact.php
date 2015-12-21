<?php
/*
Template Name: Contact
*/

get_header('blog'); ?>

<main id="main" class="site-main" role="main">
	<div class="container">
		<div class="main-blog-column">

			<article id="post-<?php the_ID(); ?>" <?php post_class('blog-post'); ?>>
				<div class="media"><?php the_post_thumbnail(); ?></div>
					<div class="box">
    					<div class="blog-content">

							<?php if ( have_posts() ) : ?>

								<?php /* Start the Loop */ ?>
								<?php while ( have_posts() ) : the_post(); ?>

									<?php the_content(); ?>

								<?php endwhile; ?>

							<?php endif; ?>
						</div>
					</div>
				</article>
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
