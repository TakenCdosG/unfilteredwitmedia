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
  <header id="masthead" class="site-header" role="banner">
    
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
              <?php endif; ?>
            
            </div>

          </div><!-- end navigation section -->

           </div>

        <div id="header-inside" class="container">
              <!-- hero tagline section -->
                 <div class="hero-section-left">
                    <div class="hero-inside">
                      <!--BEGIN #tagline options-->
                      <?php if ( get_theme_mod( 'homepage_intro_text' ) ) : ?>
                       <h1 class="hero-title"><?php echo get_theme_mod( 'homepage_intro_text', '' ); ?></h1>
                      <?php endif; ?>
                       <!--END #tagline options-->

                        <!--BEGIN #tagline options-->
                      <?php if ( get_theme_mod( 'homepage_text' ) ) : ?>
                        <p class="hero-text"><?php echo get_theme_mod( 'homepage_text', '' ); ?></p>
                      <?php endif; ?>
                       <!--END #tagline options-->
                    </div>
                 
                 </div>

                  <div class="hero-section-right">
                    <div class="hero-inside">
                       <div class="home-mailchimp">
                         <?php if ( is_active_sidebar( 'landing-page' ) ) : ?>
                              <!-- mailform signup widget -->
                               <?php dynamic_sidebar( 'landing-page' ); ?>
                         <?php endif; ?>

                    </div>
                  </div>
                </div>
              </div>

  <!-- background cover image -->
<!--  <div class="site-header-bg-wrap">
      <div class="site-header-bg-image background-cover-image"></div>
    </div>-->

  </header><!-- #masthead -->		