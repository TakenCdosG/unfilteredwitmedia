<?php
/*
Template Name: EDD Store Template
*/

get_header('blog'); ?>

<main id="main" class="site-main" role="main">
  <div class="container">
     <div class="download-items">
    <ul id="masonry-store" class="js-masonry" data-masonry-options='{ "itemSelector": ".masonry-3-cols" }'>
    <?php 

$productargs = new WP_Query(array(
  'post_type' => 'download', 
  'posts_per_page' => -1
 )
);

if ( $productargs->have_posts() ) : while ( $productargs->have_posts() ) : $productargs->the_post(); ?>
            <li class="masonry-3-cols">
                 <a href="<?php esc_url (the_permalink('caption-overlay')); ?>">
                   <?php if (has_post_thumbnail( $post->ID ) ): ?>
                    <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), '' );
                       ?>
                    <?php endif; ?>
                  <div id="download-cover-image" style="background-image: url('<?php echo esc_url ( $image[0] ); ?>')" >
                    <div id="overlay"></div>
                     <figcaption>
                      <div class="download-title">
                        <h3><span><?php the_title(); ?></span></h3>
                          <span class="download-line"></span>
                             <div class="download-meta-date"><?php the_terms( $post->ID, 'download_category', '', ', ', '' ); ?></div>
                      </div>
                  </figcaption>
                  </div>
                </a>

              <div class="store-masonry-meta">
                <div class="store-meta">
                  
                 <?php if(function_exists('edd_price')) { ?>
                
                <div class="product-price">
                  <?php 
                    if(edd_has_variable_prices(get_the_ID())) {
                    // if the download has variable prices, show the first one as a starting price
                      echo 'Starting at: '; edd_price(get_the_ID());
                        } else {
                          edd_price(get_the_ID()); 
                        }
                      ?>
                </div><!--end .product-price-->
                <?php } ?>

                <?php if(function_exists('edd_price')) { ?>
                <div class="product-meta-buttons">
                  <?php if(!edd_has_variable_prices(get_the_ID())) { ?>
                    <?php echo edd_get_purchase_link(array( 'price' => false )); ?>
                      <?php } ?>
                </div><!--end .product-buttons-->
              <?php } ?>
                </div>
              </div>
            </li>
       <?php endwhile; ?>

<?php endif; ?>
      </ul>

    </div><!--end .content-->
  </div><!--end #main-content.row-->
</main>
 
<?php get_footer(); ?>