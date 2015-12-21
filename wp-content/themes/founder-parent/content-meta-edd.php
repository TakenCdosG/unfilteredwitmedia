<div class="sidebar-column">
	<div class="meta-content">
		
		Date <p class="meta"><i class="fa fa-clock-o"></i> <?php the_time('M j, Y'); ?></p>
		Author <p class="meta"><span><i class="fa fa-user"></i> <?php the_author_posts_link(); ?></span></p>

		<?php
		$taxonomy = 'download_category'; // EDD's taxonomy for categories
		$terms = get_terms( $taxonomy ); // get the terms from EDD's download_category taxonomy
		$separator = ', ';
		$output = 'Category <p class="meta"><i class="fa fa-folder"></i> ';
		if($terms){
			foreach ( $terms as $term ) {
				$output .= '<a href="'.get_term_link( $term, $taxonomy ).'" title="' . esc_attr( sprintf( __( "View all posts in %s",'founder-parent'  ), $term->name ) ) . '">'.$term->name.'</a>'.$separator;
			}
		echo trim($output, $separator);
		}
		?>

		<?php
		if(get_the_tag_list()) {
		    echo get_the_tag_list('<p class="meta"><span>Tags</span>',', ', '</p>');
		}
		?>

		<?php next_post_link( '<p class="meta"><span>Next Post</span>  %link <i class="fa fa-long-arrow-right"></i></p>' ); ?>
		<?php previous_post_link( '<p class="meta"><span>Previous Post</span><i class="fa fa-long-arrow-left"></i> %link</p>' ); ?>
		                

		<div class="page-links">	   
		<?php wp_link_pages('before=<div class="meta-box">&after=</div>'); ?>
		</div>
	
	</div>
</div>