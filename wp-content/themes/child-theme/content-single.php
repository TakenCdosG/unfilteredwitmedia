<?php
/**
 * @package Founder Parent
 */
get_header( 'sub' ); ?>


<?php if ( is_active_sidebar( 'subscribe' ) ) : ?>
  <div class="sidebar-mailchimp">
    <div class="meta-podcast">
      <?php dynamic_sidebar( 'subscribe' ); ?>
    </div>
  </div>
<?php endif; ?>

  </div><!--hero-section-->
</div><!--end header inside-->
    

<!-- background cover image -->
<!--<div class="site-header-bg-wrap">
 <?php /*if (has_post_thumbnail( $post->ID ) && ( $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), '') ) && isset( $image[0] ) ) { */?>
 <div class="background-cover-image" style="background-image: url('<?php /*echo esc_attr ( $image[0] ); */?>')" ></div>
 <?php /*}
 */?>
</div>-->
</header>
<!-- #masthead -->

<main id="main" class="site-main" role="main">
	<div class="container">
		<div class="main-blog-column">
         <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="entry-content">
            	<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                <?php the_content(); ?>

                <?php
                  wp_link_pages( array(
                    'before' => '<div class="page-links">' . __( 'Pages:', 'founder-parent' ),
                    'after'  => '</div>',
                  ) );
                ?>
            </div><!-- .entry-content -->
          </article><!-- #post-## -->





