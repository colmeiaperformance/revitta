<footer class="container">
  <div class="py-5">
    <div class="row">
      <div class="col-lg-4">
         <?php
            wp_nav_menu(array(
                'theme_location' => 'footer-menu',
                'container' => false,
                'menu_class' => '',
                'fallback_cb' => '__return_false',
                'items_wrap' => '<ul id="%1$s" class="nav flex-column %2$s">%3$s</ul>',
                'depth' => 2,
                'walker' => new bootstrap_5_wp_nav_menu_walker()
            ));
            ?>
      </div>

      <div class="col-lg-4">
        <p>Want to know more?</p>
        <p><strong>Follow us on social media!</strong></p>
        <ul class="list-unstyled d-flex">
          <li class="ms-3"><a class="link-dark" href="#"><i class="bi bi-facebook"></i></a></li>
          <li class="ms-3"><a class="link-dark" href="#"><i class="bi bi-instagram"></i></a></li>
        </ul>
        <p>Powered by</p>  <img class="d-block mx-auto mb-4" src="<?php echo get_template_directory_uri() . '/images/logo-colmeia.svg' ?>" alt="Colmeia" >
      </div>

      <div class="col-lg-4">
        <img class="d-block mx-auto mb-4" src="<?php echo get_template_directory_uri() . '/images/logo-footer.svg' ?>" alt="Logo" >
        <ul>
          <li>1290 Weston Road, Suit 310, Weston, FL 33326</li>
          <li>333-333-3333</li>
          <li>contact@revitta.com</li>
        </ul>
      </div>
    </div>

    <div class="d-flex justify-content-between border-top text-center">
      <p>© 2022 revitta medical & aesthetic. All Rights Reserved.</p>
    </div>
   <p class="float-end"><a href="#">Back to top</a></p>
  </div>
</footer>
<?php wp_footer(); ?>
<script src="js/main.js"></script>
</body>
</html>