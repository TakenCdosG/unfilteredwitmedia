<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package Founder Parent
 */

?>

<?php if( get_theme_mod( 'sidebar_background_image' ) != '') {
      $founder_parent_sidebar_bg = get_theme_mod('sidebar)background_image');
    } 
?>

<?php $founder_parent_sidebar_color_option = get_option( 'founder_parent_sidebar_color' ); ?>
<!-- #hidden sidebar section -->
      <div id="sidebar" class="container <?php echo esc_attr($founder_parent_sidebar_color_option); ?>" style="background-image:url('<?php echo get_theme_mod( 'sidebar_background_image'); ?>');">
          <!-- logo section -->
          <div id="about" class="widget">
               <!-- widget sections starts -->
              <?php dynamic_sidebar( 'sidebar-1' ); ?>


              <?php 

              $args = array(
                  'post_type' => 'download',
                  'meta_key' => 'edd_feature_download',
              );

              $featured_downloads = new WP_Query( $args );

              if( $featured_downloads->have_posts() ) : ?>

                  <ul>
                      <?php while( $featured_downloads->have_posts() ) : $featured_downloads->the_post(); ?>
                      <li>
                        <a href="<?php esc_url( the_permalink() ); ?>">
                        <?php the_post_thumbnail(); ?>
                
                              <h4 class="tagline"><?php the_title(); ?></h4>
                              <?php the_excerpt(); ?>

                       </a>
                      </li>
                   
                      <?php endwhile; ?>
                  </ul>

              <?php endif; wp_reset_postdata(); ?>

          </div><!-- #logo section -->
    </div><!-- #hidden sidebar section -->
