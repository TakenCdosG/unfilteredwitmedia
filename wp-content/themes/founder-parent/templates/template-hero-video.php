<?php
/*
Template Name: Video Hero Homepage
*/

get_header('video'); ?>

<div id="content" class="site-content">
<!-- start featured blog posts -->
   <section class="featured-blog">
      <div class="container">
        <div class="blog-inside">
          <div class="blog-left">
            
            <?php 
            $cat_id = get_cat_ID('podcasts');
            $query_featured = new WP_Query(array(
              'category__not_in' => array($cat_id),
              'posts_per_page' => 1,
              'post__in'  => get_option( 'sticky_posts' ),
              'ignore_sticky_posts' => 1
              ) 
            );
    
              if ( $query_featured->have_posts() ) : while ( $query_featured->have_posts() ) : $query_featured->the_post(); ?>

               <h2><a href="<?php esc_url( the_permalink() ); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
                                   <span class="line"></span>
                   <div class="blog-left-date">
                      <i class="fa fa-clock-o"></i> <?php the_time('M j, Y'); ?>
                    </div>

                    <div class="blog-left-excerpt">
                      <?php the_content(); ?>
                    </div>
                  
            <?php endwhile; ?>
          <?php endif; ?>
        <?php wp_reset_postdata(); ?>
            </div>
          
        <div class="blog-right">
      <!-- start additional blog posts -->
         <?php 
         $cat_id = get_cat_ID('podcasts');
         $query_blog = new WP_Query( array(
         'category__not_in' => array($cat_id),
         'posts_per_page' => 3, 
         'offset' => 1, 
         'post__not_in' => get_option( 'sticky_posts')
          )
         ); 
            if ( $query_blog->have_posts() ) : while ( $query_blog->have_posts() ) : $query_blog->the_post(); ?>
              
              <div class="blog-left-date">
                <h3><a href="<?php esc_url( the_permalink() ); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
            
                <i class="fa fa-clock-o"></i> <?php the_time('M j, Y'); ?>
                <span class="line"></span>
                </div>

        <?php endwhile; wp_reset_postdata(); ?>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section><!-- end featured blog posts -->

<section class="featured-item">
<!-- start featured item section -->
<ul>
<?php 

$args = array(
    'post_type' => 'download',

);

$featured_downloads = new WP_Query( $args ); ?>

<?php if( $featured_downloads->have_posts() ) : while( $featured_downloads->have_posts() ) : $featured_downloads->the_post(); ?>

<li id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="post-thumb">
    <?php the_post_thumbnail(); ?>
  </div>

<div class="container">
  <div class="post-content">
    <h2><a href="<?php esc_url( the_permalink() ); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
    <span class="line"></span>

    <div class="post-excerpt">
    <?php the_excerpt(); ?>
    
    
      <?php if(function_exists('edd_price')) { ?>
        <div class="product-buttons">
          <?php if(!edd_has_variable_prices(get_the_ID())) { ?>
            <?php echo edd_get_purchase_link(array('price' => false, 'text' => 'Download' )); ?>
              <?php } ?>
        </div><!--end .product-buttons-->
      <?php } ?>
     </div>
  </div>
</div>
</li>
  <?php endwhile; ?>

<?php endif; wp_reset_postdata(); ?>

</ul>
</section><!-- end featured item section -->


<!-- start testimonial section -->
<?php $jetpack_options = get_theme_mod( 'jetpack_testimonials' ); ?>

<?php if ( isset( $jetpack_options['featured-image'] ) && '' != $jetpack_options['featured-image'] ) : ?>
<section class="testimonial-feature" style="background-image:url('<?php echo wp_get_attachment_url( (int)$jetpack_options['featured-image']); ?>');">
  <?php endif; ?>

    <div class="testimonial-items">
       <div class="testimonial-title">
            
             <h2>
             <?php if ( isset( $jetpack_options['page-title'] ) && '' != $jetpack_options['page-title'] ); ?>
             <?php echo esc_html( $jetpack_options['page-title'] ); ?>
             </h2>

              <span class="title-line"></span>

        </div>

        <div class="testimonial-content">

     <?php if ( isset( $jetpack_options['page-content'] ) && '' != $jetpack_options['page-content'] ) : ?>
      <?php echo convert_chars( convert_smilies( wptexturize( stripslashes( wp_filter_post_kses( addslashes( $jetpack_options['page-content'] ) ) ) ) ) ); ?>
         <?php endif; ?>

       </div>

      </div>

<?php founder_parent_testimonials(); ?>

</section>

<!-- start podcast section -->
<section class="masonry-items">
  <div class="container">
    <div class="podcast-content">
    <?php if ( get_theme_mod( 'podcast_title' ) ) : ?>
    <h2><?php echo get_theme_mod( 'podcast_title', 'founder-parent' ); ?></h2>
    <span class="title-line"></span>
     <?php endif; ?>
    <div class="podcast-excerpt">
      <?php if ( get_theme_mod( 'podcast_content' ) ) : ?>
     <p><?php echo get_theme_mod( 'podcast_content', 'founder-parent' ); ?></p>
      <?php endif; ?>
   </div>
 </div>
    
    <div class="podcast-items">
  
<ul id="masonry" class="js-masonry" data-masonry-options='{ "itemSelector": ".masonry-3-cols" }'>

<?php 

$querymasonry = new WP_Query(array(
  'category_name' => 'podcasts', 
  'posts_per_page' => -1,
 )
);

if ( $querymasonry->have_posts() ) : while ( $querymasonry->have_posts() ) : $querymasonry->the_post(); ?>

  <li class="masonry-3-cols">
    <a href="<?php esc_url (the_permalink('caption-overlay')); ?>">
             <figure>
              <?php the_post_thumbnail(); ?>
              <figcaption>
                <div class="podcast-title">
                <h3><span><?php the_title(); ?></span></h3>
                <span class="podcast-line"></span>
                 <div class="podcast-meta-date"><?php the_time('M j, Y'); ?></div>
               </div>
              </figcaption>
           </figure> 

    </a>
  </li>

  <?php endwhile; ?>

<?php endif; ?>

  </ul>
<?php wp_reset_postdata(); ?>

    </div>
  </div>
</section>
</div>

<!-- end podcast grid -->

<?php get_footer(); ?>
