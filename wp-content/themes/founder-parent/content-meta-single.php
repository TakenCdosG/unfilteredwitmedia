<div class="sidebar-column">
	<div class="meta-content">
		
		Date <p class="meta"><i class="fa fa-clock-o"></i> <?php the_time('M j, Y'); ?></p>

		<?php
		$categories = get_the_category();
		$separator = ', ';
		$output = 'Category <p class="meta"><i class="fa fa-folder"></i> ';
		if($categories){
			foreach($categories as $category) {
				$output .= '<a href="'.get_category_link( $category->term_id ).'" title="' . esc_attr( sprintf( __( "View all posts in %s",'founder-parent'  ), $category->name ) ) . '">'.$category->cat_name.'</a>'.$separator;
			}
		echo trim($output, $separator);
		}
		?>

		<?php
		if(get_the_tag_list()) {
		    echo get_the_tag_list('<p class="meta"><span>Tags</span><i class="fa fa-tags"></i>', ', ' , '</p>');
		}
		?>

		<?php next_post_link( '<p class="meta"><span>Next Post</span><i class="fa fa-thumb-tack"></i> %link  <i class="fa fa-long-arrow-right"></i></p>' ); ?>
		<?php previous_post_link( '<p class="meta"><span>Previous Post</span><i class="fa fa-long-arrow-left"></i> %link</p>' ); ?>
		                

		<div class="page-links">	   
		<?php wp_link_pages('before=<div class="meta-box">&after=</div>'); ?>
		</div>
	
	</div>

</div>

<div class="sidebar-author">
<div class="meta-page-content">
	<?php echo get_avatar( get_the_author_meta('email'), '90' ); ?> 
	<div class="author-info">
		<h4 class="widget-title">About the author</h4>
		<p><?php the_author_posts_link(); ?></p>
		<p class="author-description"><?php the_author_meta('description'); ?></p>
	</div>

	<?php if ( is_active_sidebar( 'blog-sidebar' ) ) { ?>
	<?php dynamic_sidebar( 'blog-sidebar' ); ?>
	<?php } ?>
</div>
</div>
	