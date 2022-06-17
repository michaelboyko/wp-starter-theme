const common = (($) => {
	"use strict";

	const ready = () => {

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
		});

		// Fix For AOS
		setInterval(oneSecondFunction, 1000);
		function oneSecondFunction() {
			AOS.refresh();
			a2a.init_all();
		}

		// Custom Formidable Checkboxes
		$('.frm_checkbox label').append('<span class="checkmark"></span>');

		// Trigger Close On Fancy Menu
		$(".fancy-menu-header-close button").click(function(event) {
			$("#menu-toggle-close").trigger("click");
		});

	};

	return {
		ready: ready,
	};
})(jQuery);

jQuery(common.ready);