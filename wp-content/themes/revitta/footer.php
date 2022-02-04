<hr class="m-0">
<footer>
  <div class="container text-center text-lg-start text-black"> 
    <div class="py-4 py-lg-5">
      <div class="row">
        <div class="col-lg-4 d-none d-lg-block order-0 menu">
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

        <div class="col-lg-4 order-2 order-lg-1 social">
          <p class="mb-0">Want to know more?</p>
          <p class=""><strong>Follow us on social media!</strong></p>
          <ul class="list-unstyled d-flex">
            <li><a href="#">      
                <img src="<?php echo get_template_directory_uri() . '/images/icon-facebook.svg' ?>" alt="Logo Facebook">
            </a></li>
             <li class="ms-3"><a href="#">      
                <img src="<?php echo get_template_directory_uri() . '/images/icon-instagram.png' ?>" alt="Logo Instagram">
            </a></li>
          </ul>
          <div class="colmeia d-flex align-items-center">
            <p>Powered by</p>  <a href=""><img src="<?php echo get_template_directory_uri() . '/images/logo-colmeia.svg' ?>" alt="Logo Colmeia"></a>
          </div>
        </div>

        <div class="col-lg-4 order-1 order-lg-2 infos">
          <img class="d-block mx-auto mb-3 mb-lg-4" src="<?php echo get_template_directory_uri() . '/images/logo-footer.svg' ?>" alt="Logo" >
          <ul class="list-unstyled">
            <li><p><i class="bi bi-geo-alt-fill"></i>  1290 Weston Road, Suit 310, Weston, FL 33326</p></li>
            <li><p><i class="bi bi-telephone-fill"></i> 333-333-3333</p></li>
            <li><p><i class="bi bi-envelope-fill"></i> contact@revitta.com</p></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="copyright"> 
    <div class="text-center text-uppercase">
        <p>© 2022 revitta medical & aesthetic. All Rights Reserved.</p>
        <p class="float-end">
          <a href="#">
            <i class="bi bi-chevron-up"></i>
          </a>
         </p> 
    </div>
    </div>


</footer>
<?php wp_footer(); ?>
<script src="js/main.js"></script>
</body>
</html>