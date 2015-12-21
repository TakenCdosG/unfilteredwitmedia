<?php
/**
 * @package Founder Parent
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('blog-post'); ?>>
	<div class="media">
     <a href="<?php esc_url( the_permalink() ); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark"><?php the_post_thumbnail(); ?></a>
    </div>
	<div class="box">

	 <header class="entry-header">
        <a href="<?php esc_url( the_permalink() ); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark"><?php the_title( '<h2 class="entry-blog-title">', '</h2>' ); ?></a>
         <span class="line"></span>
    </header>

     <div class="blog-meta">
      <span class="meta-date"><i class="fa fa-clock-o"></i><?php the_time('M j, Y'); ?></span> 
    </div>

    <div class="blog-content">
    <?php
          /* translators: %s: Name of current post */
          the_content( sprintf(
            __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'founder-parent' ),
            the_title( '<span class="screen-reader-text">"', '"</span>', false )
          ) );
        ?>
    
    <?php
      wp_link_pages( array(
        'before' => '<div class="page-links">' . __( 'Pages:', 'founder-parent' ),
        'after'  => '</div>',
      ) );
    ?>

  </div><!-- .blog-content -->
</div>

</article><!-- #post-## -->

