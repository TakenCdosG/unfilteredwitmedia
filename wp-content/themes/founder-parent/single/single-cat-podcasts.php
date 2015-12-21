<?php
/**
 * @package Founder Parent
 */

get_header( 'podcast' ); ?>

<main id="main" class="site-main" role="main">
	<div class="container">
			<div class="main-blog-column">

<?php while ( have_posts() ) : the_post(); ?>

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

	<?php endwhile; ?>


</article><!-- #post-## -->
</div>

	  	<!-- .meta-sidebar -->
	  	<?php get_template_part( 'content', 'meta-single' ); ?> 
	  	<!-- .meta-sidebar -->

	</div>
</main><!-- #main -->

<?php get_footer(); ?>


