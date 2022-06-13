"use strict";

var common = function ($) {
  "use strict";

  var ready = function ready() {
    // Animate On Scroll
    if (window.matchMedia('(max-width: 1000px)').matches) {
      var aos_offset = 120;
    } else {
      var aos_offset = 200;
    } // if


    AOS.init({
      disable: 'mobile',
      offset: aos_offset,
      mirror: false,
      easing: 'ease-out',
      duration: 800,
      anchorPlacement: 'top-bottom',
      once: true
    }); // Fix For AOS

    setInterval(oneSecondFunction, 1000);

    function oneSecondFunction() {
      AOS.refresh();
      a2a.init_all();
    } // Custom Formidable Checkboxes


    $('.frm_checkbox label').append('<span class="checkmark"></span>'); // Trigger Close On Fancy Menu

    $(".fancy-menu-header-close button").click(function (event) {
      $("#menu-toggle-close").trigger("click");
    }); // Product Progress Slider

    $(".product-carousel").each(function (index) {
      var $slider = $(this).find('.products');
      var $progressBar = $(this).find('.progress');
      var $progressBarLabel = $(this).find('.slider__label');
      $slider.on('beforeChange', function (event, slick, currentSlide, nextSlide) {
        var calc = (nextSlide + (slick.options.slidesToShow - 1)) / (slick.slideCount - 1) * 100;
        $progressBar.css('background-size', calc + '% 100%').attr('aria-valuenow', calc);
        $progressBarLabel.text(calc + '% completed');
      });
      $slider.on('init', function (event, slick, currentSlide, nextSlide) {
        var calc = (slick.options.slidesToShow - 1) / (slick.slideCount - 1) * 100;
        $progressBar.css('background-size', calc + '% 100%').attr('aria-valuenow', calc);
        $progressBarLabel.text(calc + '% completed');
      });
      $(".product-carousel .products a").removeAttr("href");
      /*
      $slider.on('wheel', (function(e) {
      	e.preventDefault();
      	if (e.originalEvent.deltaY < 0) {
      		$(this).slick('slickNext');
      	} else {
      		$(this).slick('slickPrev');
      	} // if
      }));
      */
    }); // Modal Close Button

    $(".become-a-member-modal-popup .modal-close-btn").insertBefore($(".become-a-member-modal-popup .uael-content"));
    $(".become-a-member-modal-popup .uael-content").wrapInner('<div class="uael-content-container"></div>');
    $(".modal-close-btn button").click(function (event) {
      $(".become-a-member-modal-popup .uael-modal-close").trigger("click");
    });
  };

  return {
    ready: ready
  };
}(jQuery);

jQuery(common.ready);