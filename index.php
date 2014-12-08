<?php
use WP_Admin\Objects\Post;

get_header(); ?>

	<section id="site-body" class="row">

	<?php if ( have_posts() ) : ?>

		<?php while( have_posts() ) : the_post();
			$obj = new Post( get_post() );
		?>
			<article id="post-<?php echo (int) $obj->get_id(); ?>">

				<h3><a href="<?php $obj->the_permalink(); ?>"><?php $obj->the_title(); ?></a></h3>

				<?php $obj->the_excerpt(); ?>

			</article>

		<?php endwhile; ?>

	<?php endif; ?>

	</section>


<?php get_footer(); ?>
