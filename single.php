<?php get_header(); ?>
	<div class="container">
		<p>&laquo; <a href="<?php echo get_post_type_archive_link( 'post' ); ?>">Back to the Posts</a></p>
		<?php if(have_posts()): while(have_posts()) : the_post(); ?>
			<?php the_title('<h1>', '</h1>'); ?>
			<?php the_content() ?>
		<?php endwhile; endif; ?>
	</div>
<?php get_footer(); ?>