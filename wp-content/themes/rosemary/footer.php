	
		<!-- END CONTENT -->
		</div>
		
	<!-- END CONTAINER -->
	</div>
	
	<div id="instagram-footer">
		
		<?php	/* Widgetised Area */	if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Instagram Footer') ) ?>
		
	</div>
	
	<div id="footer">
		
		<div class="container">
			
			<p class="copyright left"><?php echo wp_kses_post(get_theme_mod('sp_footer_copyright_left')); ?></p>
			<p class="copyright right"><?php echo wp_kses_post(get_theme_mod('sp_footer_copyright_right')); ?></p>
			
		</div>
		
	</div>
        <script>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

            ga('create', 'UA-81736444-1', 'auto');
            ga('send', 'pageview');

        </script>
	<?php wp_footer(); ?>
	
</body>

</html>