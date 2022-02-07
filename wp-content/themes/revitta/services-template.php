<?php
  /*
  Template Name: Template - Services
  */
  
  ?>
<?php get_header(); ?>
<?php get_template_part('template-parts/header-home'); ?>
<main>
  
<section class="header">
  <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
    <!-- <div class="carousel-indicators">
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2" class="active" aria-current="true"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div> -->
    <div class="carousel-inner">

      <div class="carousel-item">
        <img class="bd-placeholder-img" src="<?php echo get_template_directory_uri() . '/images/header.svg' ?>" alt="Logo">
        <div class="container">
          <div class="carousel-caption text-center">
            <h1>We're here to <span>help you</span> find your most precious gift: <strong>yourself</strong>!</h1>
            <p>The union of medicine and cosmetics. Our professionals have a goal: take care of our patients, inside and out, with excellence.</p>
            <p><a class="btn btn-lg text-uppercase background-mustard-dark " href="#">Book your consultation</a></p>
          </div>
        </div>
      </div>

      <div class="carousel-item active">
        <img class="bd-placeholder-img" src="<?php echo get_template_directory_uri() . '/images/header.svg' ?>" alt="Logo">
        <div class="container">
          <div class="carousel-caption text-center">
            <h1>We're here to <span>help you</span> find your most precious gift: <strong>yourself</strong>!</h1>
            <p>The union of medicine and cosmetics. Our professionals have a goal: take care of our patients, inside and out, with excellence.</p>
            <p><a class="btn btn-lg text-uppercase background-mustard-dark " href="#">Book your consultation</a></p>
          </div>
        </div>
      </div>

      <div class="carousel-item">
        <img class="bd-placeholder-img" src="<?php echo get_template_directory_uri() . '/images/header.svg' ?>" alt="Logo">
        <div class="container">
          <div class="carousel-caption text-center">
            <h1>We're here to <span>help you</span> find your most precious gift: <strong>yourself</strong>!</h1>
            <p>The union of medicine and cosmetics. Our professionals have a goal: take care of our patients, inside and out, with excellence.</p>
            <p><a class="btn btn-lg text-uppercase background-mustard-dark " href="#">Book your consultation</a></p>
          </div>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
</section>

  aaa
  
<?php get_footer() ?>