<?php
/**
 * The template for displaying all single posts.
 *
 * @package Founder Parent
 */
?>

	<?php while ( have_posts() ) : the_post(); ?>

			<?php
			
			if(!get_post_format()) {
				get_template_part('content', 'single');
					} else {
					 get_template_part('single/content-single', get_post_format());
					};
			?>

		<?php endwhile; ?>

	      </div>

      <!-- .meta-sidebar -->
      <?php get_template_part( 'content', 'meta-single' ); ?> 
      <!-- .meta-sidebar -->

  </div>
</main><!-- #main -->


  <div class="block-comments">
    <div class="container">
        <?php
          // If comments are open or we have at least one comment, load up the comment template
          if ( comments_open() || get_comments_number() ) :
            comments_template();
          endif;
        ?>
    </div>
  </div>


<?php get_footer(); ?>
