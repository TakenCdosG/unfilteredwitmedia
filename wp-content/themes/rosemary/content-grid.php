<li>
<article id="post-<?php the_ID(); ?>" <?php post_class('grid-item'); ?>>
	
	<?php if(has_post_thumbnail()) : ?>
	<div class="post-img">
        <?php
            $image = get_post_thumbnail_id();
            $the_image = wp_get_attachment_image_src( $image, 'misc-thumb' );
        ?>
		<a href="<?php echo get_permalink() ?>"><div class="post-img" style="background-image: url(<?php echo esc_url($the_image[0]); ?>); background-size: cover; width: 365px; height: 284px; margin: auto; background-position: center;"></div></a>
	</div>
	<?php endif; ?>
	
	<div class="post-header">
		
		<?php if(!get_theme_mod('sp_post_cat')) : ?>
		<span class="cat"><?php sp_category(' '); ?></span>
		<?php endif; ?>
		
		<?php if(is_single()) : ?>
			<h1><?php the_title(); ?></h1>
		<?php else : ?>
			<h2><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h2>
		<?php endif; ?>
		
	</div>
	
	<div class="post-entry">
						
		<p><?php echo sp_string_limit_words(get_the_excerpt(), 34); ?>&hellip;</p>
						
	</div>
	
	<div class="list-meta">
	<?php if(!get_theme_mod('sp_post_date')) : ?>
	<span class="date"><?php the_time( get_option('date_format') ); ?></span>
	<?php endif; ?>
	</div>
	
</article>
</li>