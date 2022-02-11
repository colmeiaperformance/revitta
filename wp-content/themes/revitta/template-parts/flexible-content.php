<?php
if( have_rows('content') ):
  while ( have_rows('content') ) : the_row();

    // Section about
    if( get_row_layout() == 'about_us' ):
      $au_hightlight_image = get_sub_field('au_hightlight_image');
      $au_title = get_sub_field('au_title');
      $au_description = get_sub_field('au_description');
      $au_colors = get_sub_field('au_colors');
      ?>

<!-- Section About -->
<section id="about-us" class="about"
  style="background-color:<?php if ( $au_colors['au_bg_color'] ) { echo $au_colors['au_bg_color']; } else { echo 'transparent'; }  ?>;">
  <div class="container px-4 py-5 my-5 text-center">
    <div class="row">
      <div class="col d-none d-xl-block">
        <img class="d-block mx-auto mb-4"
          src="<?php if ($au_hightlight_image) { echo $au_hightlight_image; } else { echo get_template_directory_uri() . '/images/about.svg'; } ?>"
          alt="About us">
      </div>
      <div class="content col-xl-6 mx-auto mt-auto mb-auto text-center text-xl-start ">
        <?php if ($au_title) { ?>
        <h2 class="d-xl-none pt-4 pb-3 mt-1 text-uppercase text-center"
          style="<?php if ($au_colors['au_highlight_color']) : $au_colors['au_highlight_color']; endif; ?>">
          <?php echo $au_title; ?>
        </h2>
        <?php } else { echo ''; } ?>
        <?php if ($au_description) { echo $au_description; } else { echo ''; } ?>
      </div>
    </div>
  </div>
</section>


<?php
        // Section Our Services
        elseif( get_row_layout() == 'our_services' ): 
          $os_title = get_sub_field('os_title');
          $os_description = get_sub_field('os_description');
          $os_service = get_sub_field('os_service');
          $os_button_text = get_sub_field('os_button_text');
          $os_button_url = get_sub_field('os_button_url');
          $os_colors = get_sub_field('os_colors'); ?>

<section id="our-services" class="services"
  style="background-color:<?php if ( $os_colors['os_bg_color'] ) { echo $os_colors['os_bg_color']; } else { echo 'transparent'; }  ?>;">
  <div class="container pt-lg-5 pb-5">
    <?php if ($os_title) : ?>
    <h2 class="pt-4 pb-3 mt-1 text-uppercase text-center"><?php echo $os_title; ?></h2>
    <?php endif; ?>

    <?php if ($os_description) : ?>
    <p class="text-black text-center my-0 mx-auto"><?php echo $os_description; ?></p>
    <?php endif; ?>

    <div class="row services-list g-4 g-lg-5 py-5 row-cols-1 row-cols-lg-3">

      <?php
      foreach ($os_service as $os_s) { ?>

      <div class="col col-service">
        <div class="icon-square flex-shrink-0 me-3 rounded-circle border-5">
          <a href="<?php if ($os_s['os_service_url']) { echo $os_s['os_service_url']; } ?>">
            <img class="bi rounded-circle"
              src="<?php if ( $os_s['os_service_image'] ) { echo $os_s['os_service_image']; } else { echo get_template_directory_uri() . '/images/service.svg'; } ?>"
              alt="service">
          </a>
        </div>
        <div>
          <p class="text-black w-auto mb-2">
            <?php if ($os_s['os_service_description']) { echo $os_s['os_service_description']; } ?></p>
          <h4 class="text-uppercase"><?php if ($os_s['os_service_title']) { echo $os_s['os_service_title']; } ?></h4>
          <a href="<?php if ($os_s['os_service_url']) { echo $os_s['os_service_url']; } ?>"
            class="btn text-uppercase border-1 mb-2">
            + Read more
          </a>
        </div>
      </div>

      <?php }
      ?>
    </div>

    <?php if( $os_button_text ) { ?>
    <div class="text-center mb-3">
      <a href="<?php echo $os_button_url; ?>" id="btn-services" class="btn text-uppercase"><?php echo $os_button_text; ?></a>
    </div>
    <?php }
    ?>
  </div>
  <button id="loadmore"><i>+</i> Show<br> More</button>
</section>

<?php
        // Section More About Candela
        elseif( get_row_layout() == 'more_about_candela' ): 
          $mac_title = get_sub_field('mac_title');
          $mac_description = get_sub_field('mac_description');
          $mac_candela_solution = get_sub_field('mac_candela_solution');
          
          ?>

<section id="about-candela" class="about-candela">
  <div class="container pt-lg-5 pb-5">
    <?php
    if ($mac_title) { ?>
    <h2 class="pt-4 pb-3 mt-1 text-uppercase text-center"><?php echo $mac_title; ?></h2>
    <?php } ?>

    <?php
    if ($mac_description) { ?>
    <p class="text-black text-center my-0 mx-auto"><?php echo $mac_description; ?></p>
    <?php } ?>

    <div class="row row-cols-1 row-cols-lg-3 mb-3 g-3 g-lg-4 py-5">
      <?php
    foreach ($mac_candela_solution as $mac_cs) { ?>

      <div class="col">
        <div class="card border-0 p-0 bg-transparent">
          <div class="card-thumb">
            <img class="card-img-top"
              src="<?php if ( $mac_cs['mac_solution_image'] ) { echo $mac_cs['mac_solution_image']; } else { echo ''; } ?>"
              alt="Candela">
            <?php if ( $mac_cs['mac_solution_title'] ) { ?>
            <h5 class="card-title text-uppercase text-start w-50"><?php echo $mac_cs['mac_solution_title']; ?></h5>
            <?php } else { echo ''; } ?>
          </div>
          <div class="card-body d-flex align-items-center justify-content-center">
            <!-- <a href="#" class="btn card-text text-black w-auto p-0 border-0 stretched-link"> -->
            <?php if ( $mac_cs['mac_solution_description'] ) { ?>
            <?php echo $mac_cs['mac_solution_description']; ?>
            <?php } else { echo ''; } ?>
            <!-- </a> -->

          </div>
        </div>
      </div>

      <?php } ?>
    </div>

  </div>
</section>

<?php
        // Section Clinical Solutions
        elseif( get_row_layout() == 'clinical_solutions' ): 
          $cs_title = get_sub_field('cs_title'); 
          $cs_image = get_sub_field('cs_image'); 
          $cs_description = get_sub_field('cs_description'); 
          $cs_pc_title = get_sub_field('cs_pc_title'); 
          $cs_procedures = get_sub_field('cs_procedures'); 
          $cs_conditions = get_sub_field('cs_conditions'); 
          $cs_colors = get_sub_field('cs_colors'); 
          
          ?>

<section id="clinical-solutions" class="clinical-solutions"
  style="background-color:<?php if ( $cs_colors['cs_bg_color'] ) { echo $cs_colors['cs_bg_color']; } else { echo 'transparent'; }  ?>;">
  <div class="container pt-lg-5 pb-5">
    <?php if ($cs_title) { ?>
    <h2 class="pt-5 pt-lg-2 pb-3 text-uppercase text-center" <?php if ($cs_colors['cs_title_color']) : ?>
      style="color:<?php echo $cs_colors['cs_title_color'].';'; ?>" <?php endif; ?>><?php echo $cs_title; ?></h2>
    <?php } ?>
    <div class="container">
      <div class="row align-items-lg-center justify-content-lg-center">
        <div class="col-lg-8">
          <div class="row align-items-lg-center justify-content-lg-center">
            <div class="col-lg-5">
              <div class="icon-square flex-shrink-0 me-3">
                <img class="d-block mx-auto mb-4 img-fluid"
                  src="<?php if ($cs_image) { echo $cs_image; } else {echo get_template_directory_uri() . '/images/dr-1.png';} ?>"
                  alt="About us">
              </div>
            </div>
            <div class="col-lg-7 ps-0">
              <?php if ($cs_description) { echo $cs_description; } ?>
            </div>
          </div>
        </div>
        <div class="col-lg-4 pe-lg-0">
          <?php
          if($cs_pc_title) { ?>
          <h3 class="text-uppercase text-center text-lg-start" <?php if ( $cs_colors['cs_highlights_color'] ) {
            echo 'style="color:' . $cs_colors['cs_highlights_color'] . '";';  
            } ?>><?php echo $cs_pc_title; ?></h3>
          <?php }
          ?>
          <div class="row">
            <div class="col">
              <ul class="list-unstyled">
                <?php
                foreach ($cs_procedures as $cs_p) { ?>
                <li <?php if ($cs_colors['cs_list_text_color']) : ?>
                  style="color:<?php echo $cs_colors['cs_list_text_color'].';'; ?>" <?php endif; ?>>
                  <?php echo $cs_p['cs_procedure_title']; ?></li>
                <?php }
                ?>
              </ul>
            </div>
            <div class="col">
              <ul class="list-unstyled">
                <?php
                foreach ($cs_conditions as $cs_c) { ?>
                <li <?php if ($cs_colors['cs_list_text_color']) : ?>
                  style="color:<?php echo $cs_colors['cs_list_text_color'].';'; ?>" <?php endif; ?>>
                  <?php echo $cs_c['cs_condition_title']; ?></li>
                <?php }
                ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
</section>


<?php
          // Section Testimonials
        elseif( get_row_layout() == 'testimonials' ): 
          $t_testimonial = get_sub_field('t_testimonial');
          $t_colors = get_sub_field('t_colors');
          //initial t_value
          $t_value = 0;
          ?>

<section id="reviews" class="testmonials"
  <?php if ($t_colors['t_bg_color']) { echo 'style="background-color:' . $t_colors['t_bg_color'] . '";'; } ?>>
  <div class="container">
    <div id="testmonials" class="carousel slide py-4" data-bs-ride="carousel">
      <div class="carousel-indicators">

        <?php
          foreach ($t_testimonial as $t_t) { ?>
        <button type="button" data-bs-target="#testmonials" data-bs-slide-to="<?php echo $t_value; ?>"
          <?php if($t_value == 0) { echo 'class="active" aria-current="true"';} ?>
          aria-label="Slide <?php echo $t_value + 1; ?>"></button>
        <?php 
        $t_value++;
        }
        //resetting t_value to be used below in the next foreach
        $t_value = 0;
          ?>

      </div>
      <div class="carousel-inner container py-lg-5 px-lg-0">

        <?php
          foreach ($t_testimonial as $t_t) { ?>
        <div class="carousel-item text-center position-relative p-4 <?php if ($t_value == 0 ) { echo 'active';} ?>">
          <img class="" src="<?php echo get_template_directory_uri() . '/images/quote.svg' ?>" alt="Quote">
          <?php
          $t_testimonial_text_color = $t_colors['t_testimonial_text_color'] ? 'style="color:' . $t_colors['t_testimonial_text_color'] . ';"' : '';
          if ($t_t['t_testimonial_text']) { echo '<p ' . $t_testimonial_text_color . '>' . $t_t['t_testimonial_text'] . '</p>'; } ?>
          <?php 
          $t_name_color = $t_colors['t_name_color'] ? 'style="color:' . $t_colors['t_name_color'] . ';"' : '';
          if ($t_t['t_costumer_name']) { echo '<h3 ' . $t_name_color . '>' . $t_t['t_costumer_name'] . '</h3>'; } ?>
        </div>

        <?php 
        $t_value++;
        }
          ?>

      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#testmonials" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden"><?php _e( 'Previous', 'revitta-domain'); ?></span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#testmonials" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden"><?php _e( 'Next', 'revitta-domain'); ?></span>
      </button>
    </div>
  </div>
</section>

<?php
        // Service Section - Service Description
        elseif( get_row_layout() == 'service_description' ): 
          $sd_service_description = get_sub_field('sd_service_description');
          
          if ( $sd_service_description ) : ?>
<section class="container my-5 py-4">
  <article class="blog-post text-center">
    <div class="container">
      <?php echo $sd_service_description; ?>
    </div>
  </article>
</section>
<?php 
        endif; 


        // Service Section - Candela CTA
        elseif( get_row_layout() == 'candela_cta' ): 
          $ccta_title = get_sub_field('ccta_title');
          $ccta_description = get_sub_field('ccta_description');
          $ccta_image = get_sub_field('ccta_image');
     ?>
<section id="about-candela" class="about-candela">
  <div class="card border-0 p-0 bg-transparent">

    <img class="card-img-top"
      src="<?php if ( $ccta_image['url'] ) { echo $ccta_image['url']; } else { echo get_template_directory_uri() . '/images/services.svg'; } ?>"
      alt="Services">
    <div class="container">
      <div class="card-infos">
        <?php if ( $ccta_title ) { ?>
        <h5 class="card-title text-uppercase text-start"><?php echo $ccta_title; ?></h5>
        <?php } ?>
        <?php echo $ccta_description; ?>
      </div>
    </div>
  </div>
</section>


<?php
      endif;

    // End loop.
    endwhile;

// No value.
else :
    // Do something...
endif;
