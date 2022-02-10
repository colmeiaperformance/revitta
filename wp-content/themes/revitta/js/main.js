(function () {
  'use strict'
  document.querySelector('#navbarSideCollapse').addEventListener('click', function () {
    document.querySelector('.offcanvas-collapse').classList.toggle('open')
  })
})()

//Menu scrolling classjQuery
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

  jQuery(".offcanvas-collapse.open")[
    jQuery(window).scrollTop() >= 50 ? "addClass" : "removeClass"
  ]("offcanvas-collapse-margin");
  
  jQuery(window).scroll(function (e) {
    jQuery(".offcanvas-collapse.open")[
      jQuery(window).scrollTop() >= 50 ? "addClass" : "removeClass"
    ]("offcanvas-collapse-margin");
  });
});


//Show more button
const loadmore = document.querySelector('#loadmore');
    let currentItems = 4;
    loadmore.addEventListener('click', (e) => {
        const elementList = [...document.querySelectorAll('.services-list .col-service')];
        for (let i = currentItems; i < currentItems + 4; i++) {
            if (elementList[i]) {
                elementList[i].style.display = 'flex';
            }
        }
        currentItems += 4;

        // Load more button will be hidden after list fully loaded
        if (currentItems >= elementList.length) {
            event.target.style.display = 'none';
            document.getElementById("btn-services").classList.toggle('d-inline-block');
        }
    })