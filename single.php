<?php 
use WP_Admin\Objects\Post;

get_header(); ?>

	<section id="site-body" class="row">

	<?php if ( have_posts() ) : ?>

		<?php while( have_posts() ) : the_post();
			$obj = new Post( get_post() );
		?>
			<article id="post-<?php echo (int) $obj->get_id(); ?>" class="column small-8 small-centered end">

				<h2><?php $obj->the_title(); ?></h2>

				<?php $obj->the_content(); ?>

			</article>

		<?php endwhile; ?>

	<?php endif; ?>

	</section>

<?php get_footer(); ?>
