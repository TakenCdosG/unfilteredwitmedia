<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Founder Parent
 */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="wrapper" class="hfeed site">
  <a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'founder-parent' ); ?></a>

  <?php get_sidebar(); ?>

  <nav id="site-navigation" class="main-navigation" role="navigation">
                <div class="icon-nav">
                    <a class="nav-toggle"></a>
                </div>
    </nav>

  <div id="canvas">
  <header id="masthead" class="sub-header" role="banner">
          
           <!-- navigation section -->
          <div id="nav-home-container">
            <div class="container">

         <?php /*if ( founder_parent_edd_is_activated() ) : */?>
            <!--<div class="cart-menu">
              <a href="<?php echo edd_get_checkout_uri(); ?>" class="menu-item">
              <span class="edd-cart-quantity"><?php echo edd_get_cart_quantity(); ?></span>
            </a>
            </div>-->
             <?php /* endif; */?>

         <!--WordPress Nav Starts -->
            <?php
            wp_nav_menu(array(
              'theme_location' => 'primary',
              'menu' => '',
              'container' => 'false',
              'menu_id' => 'primary-menu',
              'menu_class' => 'nav sf-menu',
              'depth' => '0',
              'before' => '',
              'after' => '',
              'link_before' => '',
              'link_after' => '',
            ));
            ?>

            <!-- WordPress Nav Ends -->

            <!-- logo section -->
            <div class="logo logo-text">

              <!-- site title -->
           <?php
              if ( function_exists( 'jetpack_the_site_logo' ) ) {
                  jetpack_the_site_logo();
              }

              if ( is_front_page() && is_home() ) : ?>
                  <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
              <?php else : ?>
                  <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
              <?php endif;                    

              $description = get_bloginfo( 'description', 'display' );
              if ( $description || is_customize_preview() ) : ?>
                  <p class="site-description"><?php echo esc_attr ( $description ); ?></p>
              <?php endif;
            ?>
            
          </div><!-- end logo section -->
      </div>
    </div><!-- navigation section -->


        <div id="header-inside" class="container">
              <!-- hero tagline section -->
                 <div class="hero-section">
                    <div class="hero-inside">
                      <div class="entry-header">
                        <?php // the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                        
                        <?php if (get_post_meta($post->ID, 'excerpt')) {
                              echo '<div class="tagline">';
                              echo get_post_meta($post->ID, 'excerpt', true);
                              echo '</div>';

                          } elseif( $post->post_excerpt ) {
                              echo '<div class="tagline">', the_excerpt();
                              echo '</div>';
                          } else {
                              false;
                          }
                        ?>

                      </div>
                    </div>
                    
				<div class="unfiltered-wit-text">An <span class="orange-text">Un</span>filtered <span class="orange-text">Wit</span></div>