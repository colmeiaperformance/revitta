<?php get_header(); ?>
<?php get_template_part('template-parts/header-home'); ?>
<main>
    <section class="container error text-center pt-5 mt-5">
			<h1>
				404
			</h1>
			<h2>
				<?php _e( 'Page not found', 'revitta-domain'); ?> :(
			</h2>
			<p>
				<?php _e( 'Sorry, the page you are looking for doesn\'t exist.', 'revitta-domain'); ?>
			</p>
			<a href="<?php echo home_url(); ?>" class="btn btn-primary btn-lg">
				<?php _e( 'Back to home', 'revitta-domain' ); ?>
			</a>
	</section>
</main>