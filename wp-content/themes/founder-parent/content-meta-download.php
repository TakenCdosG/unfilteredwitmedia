<div class="product-column">
<div class="meta-content">
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



<?php get_template_part( 'content', 'meta-edd' ); ?>

