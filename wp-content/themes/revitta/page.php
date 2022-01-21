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
        <!-- <svg class="bd-placeholder-img" width="100%" height="100vh" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" 
        preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#20585E"></rect></svg> -->
        <div class="container">
          <div class="carousel-caption text-center">
            <h1>We're here to help you find your most precious gift: yourself!</h1>
            <p>The union of medicine and cosmetics. Our professionals have a goal: take care of our patients, inside and out, with excellence.</p>
            <p><a class="btn btn-lg btn-primary" href="#">Book your consultation</a></p>
          </div>
        </div>
      </div>

      <div class="carousel-item active">
        <svg class="bd-placeholder-img" width="100%" height="100vh" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#20585E"></rect></svg>
        <div class="container">
          <div class="carousel-caption text-center">
            <h1>We're here to help you find your most precious gift: yourself!</h1>
            <p>The union of medicine and cosmetics. Our professionals have a goal: take care of our patients, inside and out, with excellence.</p>
            <p><a class="btn btn-lg btn-primary" href="#">Book your consultation</a></p>
          </div>
        </div>
      </div>

      <div class="carousel-item">
        <svg class="bd-placeholder-img" width="100%" height="100vh" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#20585E"></rect></svg>
        <div class="container">
          <div class="carousel-caption text-center">
            <h1>We're here to help you find your most precious gift: yourself!</h1>
            <p>The union of medicine and cosmetics. Our professionals have a goal: take care of our patients, inside and out, with excellence.</p>
            <p><a class="btn btn-lg btn-primary" href="#">Book your consultation</a></p>
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

<section class="container mt-5 pt-4">
        <article class="blog-post">
            <p>Microneedling is one of the best techniques when it comes to skin benefits, it is a cosmetic procedure that uses tiny automated needles to create controlled microlesions on the skin of the face and body and on the scalp too. Our ability to produce collagen declines with age, eventually slowing down to a trickle in our 30s, and 40s, which means it can’t replace collagen as quickly as the body is losing it. As a result, skin loses its plumpness and begins to sag, wrinkles start to appear, and pores become more noticeable. To erase these signs of aging, you need to turn the collagen faucet back on. Microneedling stimulates the body to produce these cells by inflicting controlled micro wounds on the skin’s epidermis or beyond. These superficial wounds kick off a cascade of cellular activity that tells the body to rally its growth factors and other healing cytokines to the site of the injury to repair the microchanneled area This regenerative process heals the broken skin barrier with newly formed collagen, elastin and skin cells. In addition to restoring the epidermis so it can continue to perform its protective role, it firms the skin, improves texture and diffuses discoloration. In other words, the skin returns to a younger, more youthful, looking state.</p>
            <img class="img-fluid" src="<?php echo get_template_directory_uri() . '/images/services.svg' ?>" alt="Services">
        </article>
    </section>
</main>
<?php get_footer() ?>