<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Founder Parent
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?>>

    <?php the_content(); ?>
    
    <?php
      wp_link_pages( array(
        'before' => '<div class="page-links">' . __( 'Pages:', 'founder-parent' ),
        'after'  => '</div>',
      ) );
    ?>

</article><!-- #post-## -->