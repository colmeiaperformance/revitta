<?php get_header(); ?>
<?php get_template_part('template-parts/header-home'); ?>

<main>
<section class="container mt-5 pt-4">
  <?php $catquery = new WP_Query( 'cat=11&posts_per_page=1' ); ?>
    <?php while($catquery->have_posts()) : $catquery->the_post(); ?>
    <h2>Notícia destaque</h2>
  <div class="p-4 p-md-5 mb-4 text-white rounded bg-dark" style="height:400px;background-image:url('<?php 
            if ( has_post_thumbnail() ) { 
                echo the_post_thumbnail_url();
            }
            else { 
                echo get_template_directory_uri() . '/images/blog-media.jpg';
                } ?>');background-position: center;background-attachment: scroll;background-repeat: no-repeat;background-size: cover;">
    <div class="col-md-6 text-white">
      <h1 class="display-4 fst-italic"><?php the_title(); ?></h1>
      <p class="lead my-3"><?php the_excerpt(); ?></p>
      <p class="lead mb-0"><a href="<?php the_permalink() ?>" class="text-white fw-bold">Leia mais...</a></p>
    </div>
    </div>
    <?php endwhile;  wp_reset_postdata(); ?>
</section>

<section class="mt-5 pt-2">
  <div class="container">
    <?php the_breadcrumb(); ?>
   </div>  
</section>

<section class="container">
    <div class="row g-5">   
        <div class="col-md-8">
        <?php 
        if ( have_posts() ) : 
        while ( have_posts() ) : the_post();  ?>
        <?php endwhile; ?>
        <article class="blog-post">
            <h2 class="blog-post-title"><?php the_title(); ?></h2>
            <p class="blog-post-meta"><a href="<?php echo get_day_link(get_post_time('Y'), get_post_time('m'), get_post_time('d'));  ?>"><?php the_time('j') ?> de <?php the_time('F') ?>, <?php the_time('Y') ?></a> por <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php the_author(); ?></a> em <?php the_category(', '); ?>
            <div class="featurette-image img-fluid mx-auto overflow-hidden">
                <?php the_post_thumbnail(); ?>
            </div>
            <?php the_content('Leia mais'); ?>      
        </article>

        <!-- Add the pagination functions here. -->
        <div class="blog-pagination" aria-label="Pagination">
           <?php next_post_link( '%link', 'Próximo Artigo' ); ?>
           <?php previous_post_link( '%link', 'Artigo Anterior'); ?>
        </div>

        <?php else: ?>
        <?php _e( 'Sorry, no posts matched your criteria.' ); ?>
        <?php 
        wp_reset_postdata();     
        endif; 
        ?>
        </div>

        <?php get_template_part( '/template-parts/aside-blog' ) ?>
    </div>
</section>

<section class="container related mt-2">
<div class="row mb-2">
  <h2>Notícias relacionadas</h2>
  <?php $related = get_posts( array( 'category__in' => wp_get_post_categories($post->ID), 'numberposts' => 2, 'post__not_in' => array($post->ID) ) );
  if( $related ) foreach( $related as $post ) { setup_postdata($post); ?>
    <div class="col-md-6">
      <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
          <strong class="d-inline-block mb-2 text-success"><?php
            $category = get_the_category(); 
            echo $category[0]->cat_name;
            ?>
            </strong>
          <h3 class="mb-0"><?php the_title(); ?></h3>
          <div class="mb-1 text-muted"><a href="<?php echo get_day_link(get_post_time('Y'), get_post_time('m'), get_post_time('d'));  ?>"><?php the_time('M') ?> <?php the_time('d') ?></a></div>
          <p class="mb-auto"><?php the_excerpt(); ?></p>
          <a href="<?php the_permalink() ?>" class="stretched-link">Leia mais...</a>
        </div>
        <div class="col-auto d-none d-lg-block"style="height:250px;width:200px;background-image:url('<?php 
            if ( has_post_thumbnail() ) { 
                echo the_post_thumbnail_url();
            }
            else { 
                echo get_template_directory_uri() . '/images/blog-media.jpg';
                } ?>');background-position: center;background-attachment: scroll;background-repeat: no-repeat;background-size: cover;">
        </div>
      </div>
    </div>
    <?php }
  wp_reset_postdata(); ?>
  </div>
      </section>
</main>
<?php get_footer() ?>