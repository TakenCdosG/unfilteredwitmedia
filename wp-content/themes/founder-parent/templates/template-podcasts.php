<?php
/*
Template Name: Podcast Template
*/

get_header('blog'); ?>

<main id="main" class="site-main" role="main">
  <div class="container">
    <div class="main-column">
       <?php if ( have_posts() ) : ?>

      <?php /* Start the Loop */ ?>
      <?php while ( have_posts() ) : the_post(); ?>

        <?php the_content(); ?>

      <?php endwhile; ?>

    <?php endif; ?>

    <div class="podcast-items">
    <ul id="masonry" class="js-masonry" data-masonry-options='{ "itemSelector": ".masonry-3-cols" }'>
      <?php 

$querymasonry = new WP_Query(array(
  'category_name' => 'podcasts', 
  'posts_per_page' => -1
 )
);

if ( $querymasonry->have_posts() ) : while ( $querymasonry->have_posts() ) : $querymasonry->the_post(); ?>
         <li class="masonry-3-cols">
              <a href="<?php the_permalink(); ?>">
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
    </div><!--end .content-->
  </main><!--end #main-content.row-->
 
<?php get_footer(); ?>