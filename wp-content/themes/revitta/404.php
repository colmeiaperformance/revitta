<?php get_header(); ?>
<?php get_template_part('template-parts/header-home'); ?>
<main>
    <section class="container error text-center pt-5 mt-5">
			<h1>
				404
			</h1>
			<h2>
				Página não encontrada :(
			</h2>
			<p>
				Desculpe, a página que você está procurando não existe.
			</p>
			<a href="<?php echo home_url(); ?>" class="btn btn-primary btn-lg">
				Voltar ao início
			</a>
	</section>
</main>