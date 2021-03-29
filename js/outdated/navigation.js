gsap.registerPlugin(ScrollTrigger);

var toggleHamburgerScreen= function(){
	$( document.body ).on( 'click', '.header-hamburger', function( event ) {

		event.preventDefault();
		var $el = $( this ),
		$screen = $( '#' + $el.data( 'target' ) );

		$screen.fadeToggle( function() {
			$( '.hamburger-menu', $screen ).addClass( 'active' );
		} );
		$screen.addClass( 'open' );



}).on( 'click', '#hamburger-fullscreen .button-close', function( event ) {
		event.stopPropagation();

		var $el = $( this ),
			$screen = $( '#hamburger-fullscreen' );

		$el.removeClass( 'active' );
		$screen.removeClass( 'open' );

		setTimeout( function() {
			$screen.fadeOut();
		}, 420 );
	} );

	// Init scrollbar for full screen menu.
	if ( typeof PerfectScrollbar !== 'undefined' ) {
		var $hamburgerScreen = $( '#hamburger-fullscreen' );

		if ( $hamburgerScreen.length ) {
			new PerfectScrollbar( $( '.hamburger-screen-content', $hamburgerScreen ).get( 0 ) );
		}
	}
};
function disableCurrentLink() {
	document.querySelector('a').addEventListener('click', function (e) {
		
		if (e.currentTarget.href == window.location.href) {
			e.preventDefault();
			e.stopPropagation();
		}
	})
}


function initCursor() {
	let mouseCursor = document.querySelector('.cursor');
	let navLinks = document.querySelectorAll('.menu li a');

	document.addEventListener('mousemove', cursor);

	function cursor(e) {
		mouseCursor.style.top = e.pageY + 'px';
		mouseCursor.style.left = e.pageX + 'px';
	}

	burger.addEventListener('mouseover', () => {
		mouseCursor.classList.add('link-grow');

	})
	burger.addEventListener('mouseleave', () => {
		mouseCursor.classList.remove('link-grow');
	})


	navLinks.forEach(link => {
		link.addEventListener('mouseover', () => {
			mouseCursor.classList.add('link-grow');
			link.classList.add('hovered-link');
		})
		link.addEventListener('mouseleave', () => {
			mouseCursor.classList.remove('link-grow');
			link.classList.remove('hovered-link');

		})

	});

}

function initHeader() {
	if (!document.querySelector('header')) {
		return;
	}

	var header = document.querySelector('header');
	var body = document.querySelector('body');
	var logo = document.querySelector('.logo');
	gsap.timeline({
		scrollTrigger: {
			trigger: header,
			// markers: true,
			start: '50px top',
			toggleActions: 'play none none reverse',
			onEnter: () => body.classList.add('is-scrolled'),
			onEnterBack: () => body.classList.remove('is-scrolled'),
		},
	})
}



function initHamburgerPanel() {
	if (!document.querySelector('.hamburger-panel')) {
		return;
	}
	var navItems = panel.querySelectorAll('.hamburger-panel a');

	navItems.forEach(link => {
		link.addEventListener('click', function (e) {
			if (e.currentTarget.href === window.location.href) {
				e.preventDefault();
				e.stopPropagation();
				closeHamburgerPanel();

			}
		})
	})

	burger.addEventListener('click', toggleMenu);

	function toggleMenu(e) {
		e.preventDefault();
		e.stopPropagation();
		if (!panel.classList.contains('open')) {
			openHamburgerPanel();
		} else {
			closeHamburgerPanel();
		}
	}
}

function openHamburgerPanel() {
	burger.querySelector('button').classList.add('open');
	panel.classList.add('open');
	gsap.timeline()
		.to(panel, {
			xPercent: -100,
		})
}

function closeHamburgerPanel() {
	burger.querySelector('button').classList.remove('open');
	panel.classList.remove('open');
	gsap.timeline()
		.to(panel, {
			xPercent: 0
		});
}