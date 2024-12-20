(function ($) {
  'use strict';

  // Dropdown on mouse hover
  $(document).ready(function () {
    function toggleNavbarMethod() {
      if ($(window).width() > 992) {
        $('.navbar .dropdown')
          .on('mouseover', function () {
            $('.dropdown-toggle', this).trigger('click');
          })
          .on('mouseout', function () {
            $('.dropdown-toggle', this).trigger('click').blur();
          });
      } else {
        $('.navbar .dropdown').off('mouseover').off('mouseout');
      }
    }
    toggleNavbarMethod();
    $(window).resize(toggleNavbarMethod);
  });

  // Testimonials carousel
  $('.testimonial-carousel').owlCarousel({
    autoplay: true,
    smartSpeed: 1500,
    margin: 45,
    dots: true,
    loop: true,
    center: true,
    responsive: {
      0: {
        items: 1
      },
      576: {
        items: 1
      },
      768: {
        items: 2
      },
      992: {
        items: 3
      }
    }
  });
})(jQuery);
