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
              /*if ( function_exists( 'jetpack_the_site_logo' ) ) {
                  jetpack_the_site_logo();
              }

              if ( is_front_page() && is_home() ) : ?>
                  <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
              <?php else : ?>
                  <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
              <?php endif;                    

              $description = get_bloginfo( 'description', 'display' );
              if ( $description || is_customize_preview() ) : ?>
                  <p class="site-description"><?php echo esc_attr ($description); ?></p>
              <?php endif;*/
            ?>
            <div class="unfiltered-wit-text">An Unfiltered <span class="orange-text">Wit</span></div>
          </div><!-- end navigation section -->
        </div>
      </div>

        <div id="header-inside" class="container">

              <!-- hero tagline section -->
                 <div class="hero-section">
                    <div class="hero-inside">
                        <div class="entry-header">
                         <?php
                          if( is_home() && get_option('page_for_posts') ) {
                          $blog_page_id = get_option('page_for_posts');
                          echo '<h1 class="entry-title">'.get_page($blog_page_id)->post_title.'</h1>';

                        } elseif ( is_page_template('404.php') ) {
                          echo '<h1 class="entry-title">Oops! That page cant be found.</h1>';

                        } else {

                          the_title( '<h1 class="entry-title">', '</h1>' );

                        }
                        ?>


                       <?php if ( is_home() ) {
                        // Determine context
                        $page_id = ( 'page' == get_option( 'show_on_front' ) ? get_option( 'page_for_posts' ) : 'get_the_ID' );
                        // Echo post meta for $page_id
                        echo '<div class="tagline">';
                        echo get_post_meta( $page_id, 'excerpt', true ); 
                        echo '</div>';
                        }
                      ?>
                        
                      <?php if (get_post_meta($post->ID, 'excerpt')) {
                              echo '<div class="tagline">';
                              echo get_post_meta($post->ID, 'excerpt', true);
                              echo '</div>';

                            } else {
                              false;
                          }
                        ?>
                        
                      </div>
                    </div>
                 </div>
            </div><!--end header inside-->
            
            <!-- background cover image -->
            <div class="site-header-bg-wrap">
             <?php if( is_home() && get_option('page_for_posts') ) {
                $image = wp_get_attachment_image_src(get_post_thumbnail_id(get_option('page_for_posts')),'full');
                echo ' <div class="background-cover-image" style="background-image: url('.$image[0].')" ></div>';

               } if( is_404() ) {
                $image = wp_get_attachment_image_src(get_post_thumbnail_id(),'full');
                echo ' <div class="background-cover-image" style="background-image: url('.$image[0].')" ></div>';

              } elseif ( is_page_template() ) {
                $image = wp_get_attachment_image_src(get_post_thumbnail_id(),'full');
                echo ' <div class="background-cover-image" style="background-image: url('.$image[0].')" ></div>';
              }

           ?>

            </div>
            </header>
            <!-- #masthead -->