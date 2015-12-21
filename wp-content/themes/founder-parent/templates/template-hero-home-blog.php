<?php
/*
Template Name: Hero Blog Homepage
*/

get_header(); ?>

<?php
/* Get all Sticky Posts */
$sticky = get_option( 'sticky_posts' );

/* Sort Sticky Posts, newest at the top */
rsort( $sticky );

/* Query Sticky Posts */
$query = new WP_Query( array( 'post__in' => $sticky, 'ignore_sticky_posts' => 1 ) );
?>

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