<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package Founder Parent
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function founder_parent_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	return $classes;
}
add_filter( 'body_class', 'founder_parent_body_classes' );

if ( version_compare( $GLOBALS['wp_version'], '4.1', '<' ) ) :
	/**
	 * Filters wp_title to print a neat <title> tag based on what is being viewed.
	 *
	 * @param string $title Default title text for current view.
	 * @param string $sep Optional separator.
	 * @return string The filtered title.
	 */
	function founder_parent_wp_title( $title, $sep ) {
		if ( is_feed() ) {
			return $title;
		}

		global $page, $paged;

		// Add the blog name
		$title .= get_bloginfo( 'name', 'display' );

		// Add the blog description for the home/front page.
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) ) {
			$title .= " $sep $site_description";
		}

		// Add a page number if necessary:
		if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
			$title .= " $sep " . sprintf( __( 'Page %s', 'founder-parent' ), max( $paged, $page ) );
		}

		return $title;
	}
	add_filter( 'wp_title', 'founder_parent_wp_title', 10, 2 );

	/**
	 * Title shim for sites older than WordPress 4.1.
	 *
	 * @link https://make.wordpress.org/core/2014/10/29/title-tags-in-4-1/
	 * @todo Remove this function when WordPress 4.3 is released.
	 */
	function founder_parent_render_title() {
		?>
		<title><?php wp_title( '|', true, 'right' ); ?></title>
		<?php
	}
	add_action( 'wp_head', 'founder_parent_render_title' );
endif;

	/**
	 * Custom Comments.
	*/

	function founder_parent_comment( $comment, $args, $depth ) {
		$GLOBALS['comment'] = $comment; 
		?>
		<?php if ( $comment->comment_approved == '1' ): ?>	
		
			<li id="comment-<?php comment_ID() ?>">
				<div class="comment-thumb">
				<?php echo get_avatar( $comment ); ?>
				</div>
				
				<div class="comment-author">
				<cite class="author-name"><?php comment_author_link() ?></cite>
				<a class="comment-time" href="#comment-<?php comment_ID() ?>"><?php comment_date() ?> at <?php comment_time() ?></a>
				</div>
				
				<div class="comment-text">
				<?php comment_text() ?>
				
				<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
				</div>
	
		<?php endif;
	}
 
/**
* Initialise Flexslider Slideshows
*/

	function founder_parent_slider_start() { ?>
	<script type="text/javascript">
	jQuery(function($) {
		"use strict";
		$(window).load(function() {
		  $('#main-slider').flexslider({
		      animation: "slide",
		      controlNav: false,
		      directionNav: true,
		      randomize: false,
		      touch: true
		  });

		   $('#quotes-slider').flexslider({
		   	  animation: "slide",
		      directionNav: true,
		      controlNav: false,
		      touch: true,
		      animationSpeed: 600,
		      randomize: false
	      });
		  });
	});
	</script>
	<?php }
	
add_action( 'wp_head', 'founder_parent_slider_start' );

// Create Slider

// Native Gallery Slideshows

if ( !function_exists( 'founder_parent_gallery' ) ) {
    function founder_parent_gallery($postid, $imagesize) { ?>
       <script type="text/javascript">
		jQuery(function($) {
			"use strict";
		$(window).load(function() {
		  $('.flexslider').flexslider({
		      animation: "slide",
		      controlNav: false,
		      directionNav: true,
		      randomize: false,
		      touch: true
		  });
	      });
	});
	</script>
    <?php 
        $thumbid = 0;
    
        // get the featured image for the post
        if( has_post_thumbnail($postid) ) {
            $thumbid = get_post_thumbnail_id($postid);
        }
        echo "<!-- BEGIN #slider-$postid -->\n<div id='slider-$postid' class='flexslider'>";
        
        $posttitle = the_title_attribute( array( 'echo' => 0 ) );
        
        // get all of the attachments for the post
        $args = array(
            'orderby' => 'menu_order',
            'order' => 'ASC',
            'post_type' => 'attachment',
            'post_parent' => $postid,
            'post_mime_type' => 'image',
            'post_status' => null,
            'numberposts' => -1,
        );

        $attachments = get_posts($args);
        if( !empty($attachments) ) {
            echo '<ul class="slides">';
            $i = 0;
            foreach( $attachments as $attachment ) {
                if( $attachment->ID == $thumbid ) continue;
                $src = wp_get_attachment_image_src( $attachment->ID, $imagesize );
                $caption = $attachment->post_excerpt;
                $caption = ($caption) ? $caption : $posttitle;
                $alt = ( !empty($attachment->post_content) ) ? $attachment->post_content : $attachment->post_title;
                echo "<li><img height='$src[2]' width='$src[1]' src='$src[0]' alt='$alt' title='$caption' class='slider-border' /></li>";
                $i++;
            }
            echo '</ul>';
        }
        echo "<!-- END #slider-$postid -->\n</div>";
    }
}

/** 
* Create Testimonials Slider
*/

if ( !function_exists( 'founder_parent_testimonials' ) ) {
function founder_parent_testimonials() {
 
     // Query Arguments
        $args = array(
            'post_type' => 'jetpack-testimonial',
            'posts_per_page' => -1
        );  
 
        // The Query
        $the_query = new WP_Query( $args );
	
        // Check if the Query returns any posts
        if ( $the_query->have_posts() ) { ?>
    
	<div id="quotes-slider" class="flexslider">
		<ul class="slides">
		<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
       <li id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  
  	<div class="testimonial-box">

	   <header class="entry-testimonial">
	   		<?php the_content(); ?>
	    	<span class="testimonial-line"></span>
	    </header>

    <div class="testimonial-thumb"><?php the_post_thumbnail(); ?></div>
	    <div class="blog-content">
	      <?php the_title( '<p class="entry-blog-title">', '</p>' ); ?>
	    </div>
    </div>
  </li>

  <?php endwhile; ?>
    </ul>
</div>

	  <?php }
        wp_reset_postdata();
    }
  }


