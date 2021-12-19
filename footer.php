	<div class="container">
		<h3><?php esc_html_e( 'Get title by post ID' ) ?></h3>
		<form action="" id="get-post-title-by-id">
			<input type="text" name="post-id" placeholder="Enter post ID">
			<button class="btn" type="submit">Submit</button>
			<input type="hidden" name="action" value="getposttitle">
		</form>
		<div id="result"></div>
	</div>
	<?php wp_footer(); ?>
</body>
</html>