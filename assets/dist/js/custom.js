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


    $('.frm_checkbox label').append('<span class="checkmark"></span>');
  };

  return {
    ready: ready
  };
}(jQuery);

jQuery(common.ready);