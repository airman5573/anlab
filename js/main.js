$(document).ready(() => {

	let url = location.href.replace(/\/$/, "");
	console.log(location.hash)
	if (location.hash) {
		const hash = url.split("#");
		console.log(hash);
		$('#pills-tab a[href="#' + hash[1] + '"]').tab("show");
		url = location.href.replace(/\/#/, "#");
		history.replaceState(null, null, url);
		setTimeout(() => {
			$(window).scrollTop(0);
		}, 400);
	}

	$('a[data-toggle="pill"]').on("click", function () {
		let newUrl;
		const hash = $(this).attr("href");
		if (hash == "#pills-a1-tab") {
			newUrl = url.split("#")[0];
		} else {
			newUrl = url.split("#")[0] + hash;
		}
		newUrl += "/";
		history.replaceState(null, null, newUrl);
		console.log(newUrl)
	});

});


(function ($) {

	var header = $("header");
	var body = $("body");
	$(window).scroll(function() {
		var scroll = $(window).scrollTop();

		if (scroll >= 100) {
			body.addClass("is-scrolled");
		} else {
			body.removeClass("is-scrolled");
		}
	});







	$("a#gototop").click(function () {
		$('html, body').animate({scrollTop:0},10);
	});


	$("a#btn-godown").click(function () {
		if (location.pathname.replace(/^\//, "") == this.pathname.replace(/^\//, "") && location.hostname == this.hostname) {
			var e = $(this.hash);
			if ((e = e.length ? e : $("[name=" + this.hash.slice(1) + "]")).length) return $("html, body").animate({
				scrollTop: e.offset().top
			}, 1e3, "easeInOutExpo"), !1
		}
	});




	var memberCarousel = function() {
		$('.member-desc-list').slick({
			asNavFor: '.member-image-list',
			dots: true,
			arrows: false,
			infinite: true,

			// cssEase: 'linear',
			speed:1000,
			autoplay: true,
			autoplaySpeed: 5000,
			fade: true,
			customPaging: function(slider, i) { 
				// console.log($(slider.$slides[i]).attr('title'));
				return '<button class="tab">' + $(slider.$slides[i]).attr('title') + '</button>';
			},
		});
		$('.member-image-list').slick({
			asNavFor: '.member-desc-list',
			dots: false,
			arrows: false,
			infinite: true,
			// rtl: false,
			fade: true,
			cssEase: 'linear'

		});
	
	};

	memberCarousel();





	var HamburgerMenu = function () {
		$(document.body).on('click', '.header-hamburger', function (event) {
			event.preventDefault();
			var $el = $(this),
				$screen = $('#' + $el.data('target'));
			$screen.fadeToggle(function () {
				$('.hamburger-menu', $screen).addClass('active');
			});
			$screen.addClass('open');

		}).on('click', '#hamburger-fullscreen .button-close', function (event) {
			event.stopPropagation();

			var $el = $(this),
				$screen = $('#hamburger-fullscreen');

			$el.removeClass('active');
			$screen.removeClass('open');

			setTimeout(function () {
				$screen.fadeOut();
			}, 420);
		});

	};
	HamburgerMenu();


	var heroCarousel = function () {
		var $hero = $('#hero-carousel'),
			options = {
				prevArrow: '<span class="slick-prev slick-arrow svg-icon icon-left icon-small"><svg width="16" height="16"><use xlink:href="#left"><svg viewBox="0 0 16 16" id="left" xmlns="http://www.w3.org/2000/svg"><path fill="none" d="M0 0h16v16H0z"></path><path d="M8.394 13.941L4.073 8l4.321-5.941 1.212.882L5.927 8l3.679 5.059z"></path></svg></use></svg></span>',
				nextArrow: '<span class="slick-next slick-arrow svg-icon icon-right icon-small"><svg width="16" height="16"><use xlink:href="#right"><svg viewBox="0 0 16 16" id="right" xmlns="http://www.w3.org/2000/svg"><path fill="none" d="M0 0h16v16H0z"></path><path d="M7.606 13.941L11.927 8 7.606 2.059l-1.212.882L10.073 8l-3.679 5.059z"></path></svg></use></svg></span>',

				autoplay: true,
				autoplaySpeed: 3000,
				customPaging: function (slider, i) {
					return slider.slickCurrentSlide + '/' + (i + 1);
				}
			};

		if (!$hero.length) {
			return;
		}
		$hero.slick(options);
		gsap.fromTo(".hero-carousel .hero-item-image img", 10, {
			ease: Power2.easeOut,
			opacity: 1,
			scaleX: 1,
			scaleY: 1
		}, {
			opacity: 1,
			scaleX: 1.1,
			scaleY: 1.1

		});
	};
	heroCarousel();


	var mobileMenu = function () {
		var $mobileMenu = $('#mobile-menu');
		$mobileMenu.find('')


		$mobileMenu.find('.menu > .menu-item-has-children, .menu > li > ul > .menu-item-has-children').filter(function () {
			return $(this).hasClass('current-menu-item') || $(this).hasClass('current-menu-ancestor');
		}).addClass('open');

		$mobileMenu.on('click', '.menu-item-has-children > a', function (event) {
			var $li = $(this).parent();

			if ($li.hasClass('open') && $li.hasClass('clicked') && '#' !== $(this).attr('href')) {
				return true;
			}

			event.stopPropagation();
			event.preventDefault();

			$li.addClass('clicked');

			$li.toggleClass('open').children('ul').slideToggle();
			$li.siblings('.open').removeClass('open clicked').children('ul').slideUp();
		}).on('click', '.menu-item-has-children > .toggle', function (event) {
			event.stopPropagation();
			event.preventDefault();

			var $li = $(this).parent();

			$li.toggleClass('open').children('ul').slideToggle();
			$li.siblings('.open').removeClass('open').children('ul').slideUp();
		});


		$mobileMenu.on('click', '[data-toggle="off-canvas"], [data-toggle="modal"]', function () {
			if ('mobile-menu' !== $(this).data('target')) {
				closeModal();
				closeOffCanvas();
			}
		});
	};

	mobileMenu();


	/**
	 * Toggle off-screen panels
	 */
	var toggleOffCanvas = function () {
		$(document.body).on('click', '[data-toggle="off-canvas"]', function (event) {
			var target = '#' + $(this).data('target');
			console.log(target);

			if ($(target).hasClass('open')) {
				closeOffCanvas(target);
			} else if (openOffCanvas(target)) {
				event.preventDefault();
			}
		}).on('click', '.offscreen-panel .button-close, .offscreen-panel .backdrop', function (event) {
			event.preventDefault();

			closeOffCanvas(this);
		}).on('keyup', function (e) {
			if (e.keyCode === 27) {
				closeOffCanvas();
			}
		});
	};


	var openOffCanvas = function (target) {
		var $target = $(target);

		if (!$target.length) {
			return false;
		}

		$target.fadeIn();
		$target.addClass('open');

		$(document.body).addClass('offcanvas-opened ' + $target.attr('id') + '-opened').trigger('dbd_off_canvas_opened', [$target]);

		return true;
	}


	var closeOffCanvas = function (target) {
		if (!target) {
			$('.offscreen-panel').each(function () {
				var $panel = $(this);

				if (!$panel.hasClass('open')) {
					return;
				}

				$panel.removeClass('open').fadeOut();
				$(document.body).removeClass($panel.attr('id') + '-opened');
			});
		} else {
			target = $(target).closest('.offscreen-panel');
			target.removeClass('open').fadeOut();

			$(document.body).removeClass(target.attr('id') + '-opened');
		}

		$(document.body).removeClass('offcanvas-opened').trigger('dbd_off_canvas_closed', [target]);


	}
	toggleOffCanvas();

})(jQuery);