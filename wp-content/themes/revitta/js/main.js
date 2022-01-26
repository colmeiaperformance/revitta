(function () {
  'use strict'
  
  document.querySelector('#navbarSideCollapse').addEventListener('click', function () {
    document.querySelector('.offcanvas-collapse').classList.toggle('open')
  })
})()

//Menu scrolling class
jQuery(document).ready(function () {
  jQuery(".topbar")[
    jQuery(window).scrollTop() >= 50 ? "addClass" : "removeClass"
  ]("d-none");
  
  jQuery(window).scroll(function (e) {
    jQuery(".topbar")[
      jQuery(window).scrollTop() >= 50 ? "addClass" : "removeClass"
    ]("d-none");
  });
  
  jQuery(".navbar")[
    jQuery(window).scrollTop() >= 50 ? "removeClass" : "addClass"
  ]("navbar-margin");
  
  jQuery(window).scroll(function (e) {
    jQuery(".navbar")[
      jQuery(window).scrollTop() >= 50 ? "removeClass" : "addClass"
    ]("navbar-margin");
  });
  
  jQuery(".navbar")[
    jQuery(window).scrollTop() >= 50 ? "addClass" : "removeClass"
  ]("background-green-dark");
  
  jQuery(window).scroll(function (e) {
    jQuery(".navbar")[
      jQuery(window).scrollTop() >= 50 ? "addClass" : "removeClass"
    ]("background-green-dark");
  });
  //
  jQuery(".offcanvas-collapse.open")[
    jQuery(window).scrollTop() >= 50 ? "addClass" : "removeClass"
  ]("offcanvas-collapse-margin");
  
  jQuery(window).scroll(function (e) {
    jQuery(".offcanvas-collapse.open")[
      jQuery(window).scrollTop() >= 50 ? "addClass" : "removeClass"
    ]("offcanvas-collapse-margin");
  });
});
