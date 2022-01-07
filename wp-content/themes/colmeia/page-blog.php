<?php get_header(); ?>
<?php get_template_part('template-parts/header-home'); ?>

<main>
<section>
  <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light">
    <div class="col-md-5 p-lg-5 mx-auto my-5">
      <h1 class="display-4 fw-normal">Blog</h1>
    </div>
  </div>
</section>

<section class="container blog mt-5 pt-3">
  <h2>Notícia destaque</h2>
   <?php $catquery = new WP_Query( 'cat=11&posts_per_page=1' ); ?>
    <?php while($catquery->have_posts()) : $catquery->the_post(); ?>
    <div class="row featurette">
      <div class="col-md-7 order-md-2">
        <h1 class="featurette-heading"><?php the_title(); ?></h1>
        <p class="lead"><?php the_excerpt(); ?></p>
        <a href="<?php the_permalink(); ?>" class="btn btn-primary my-2">Leia Mais</a>
      </div>
      <div class="col-md-5 order-md-1">
        <div class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto"
        style="height:400px;width:100vw;background-image:url('<?php 
            if ( has_post_thumbnail() ) { 
                echo the_post_thumbnail_url();
            }
            else { 
                echo get_template_directory_uri() . '/images/blog-media.jpg';
                } ?>');background-position: center;background-attachment: scroll;background-repeat: no-repeat;background-size: cover;">
        </div>
      </div>
     </div>
        </div>
    </div>
     <?php endwhile;  wp_reset_postdata(); ?>
    <hr>
</section>

<section class="container border-bottom">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 mb-2">
      <?php
      //Protect against arbitrary paged values
      $paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
      $args = array(
          'posts_per_page' => 6,
          'paged' => $paged,
          'category__not_in' => array(11),
      );
       $wp_query = new WP_Query( $args );   
      if ( $wp_query->have_posts() ) : ?>
      <!-- Add the pagination functions here. -->
      <!-- Start of the main loop. -->
    <?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
      <div class="col">
        <div class="card shadow-smard">
          <div class="card-img-top bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" style="height:225px;width:100%;background-image:url('<?php 
            if ( has_post_thumbnail() ) { 
                echo the_post_thumbnail_url();
            }
            else { 
                echo get_template_directory_uri() . '/images/blog-media.jpg';
                } ?>');background-position: center;background-attachment: scroll;background-repeat: no-repeat;background-size: cover;">
         </div>
          <div class="card-body">
            <h5 class="card-title"><?php if (strlen($post->post_title) > 60) {echo substr(the_title($before = '', $after = '', FALSE), 0, 60) . '[...]'; } else {the_title();} ?></h5>
            <p class="card-text"><?php the_excerpt(); ?></p>
            <a href="<?php the_permalink(); ?>" class="btn btn-primary">Leia mais</a>
          </div>
        </div>
      </div>
    <?php endwhile; ?>
    <!-- End of the main loop -->
    </div> 

    <!-- Add the pagination functions here. -->
    <?php  wp_boostrap_4_pagination();?>
    <?php
      wp_reset_postdata(); 
      else: ?>
    <?php _e( 'Sorry, no posts matched your criteria.' ); ?>
    <?php endif; ?>
  </section>
</main>
<?php get_footer() ?>