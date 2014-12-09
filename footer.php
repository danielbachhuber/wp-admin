	<?php wp_footer(); ?>

	<footer id="site-footer" class="row">
		<div class="small-12 medium-centered medium-10 large-8 end column">
			<a href="https://wordpress.org"><small><em>Powered By WordPress</em></small></a>
		</div>
	</footer>

	<?php if ( ! is_user_logged_in() ) : ?>

		<script>
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

			ga('create', 'UA-57424781-1', 'auto');
			ga('send', 'pageview');
		</script>

	<?php endif; ?>

</body>
</html>
