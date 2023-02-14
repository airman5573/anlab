gsap.registerPlugin(ScrollTrigger, ScrollToPlugin);

// const scroller = document.querySelector('.js-scroll');

if (!!window.MSInputMethodContext && !!document.documentMode) {
    (function(x){
        console.log('IE');

    })();
}
else{
    
    // initSmoothScroll();
    // initCorrectMarkers();    
    // bgImgScale();
    // splitText();
    // toggleText();
   
    // bgParallax();
    fadeItem();
    // initHeader();
    // initScrollTo();
    homeHero();
}

function homeHero(){
   
    if (!document.querySelector('.home')) {
        return;
    }
	let title = document.querySelector('.hero .title')
    let content = document.querySelector('.hero .content')
	let splitTitle = new SplitText(title,{type:"chars"});
    let chars = splitTitle.chars;
    let tl = gsap.timeline()
	gsap.set(chars,{opacity:0, x:-15, y:100})
    gsap.set(content,{opacity:0})
	tl
        .to(chars,{
        opacity:1, 
        x:0, 
        // ease:"back",
        duration:1, 
        stagger:{
            from:"start",
            each:0.075
        }})
        .to(chars,{y:0})
        .to(content,{opacity:1})
}

function initScrollTo(){
    gsap.utils.toArray('.scrollTo').forEach(link => {
        console.log(link);
        const target = link.getAttribute('href');

        link.addEventListener('click', (e) => {
        e.preventDefault();
        console.log(document.querySelector(target));
        bodyScrollBar.scrollIntoView(document.querySelector(target), {damping: 0.15, offsetTop: 0});
        });
    });
}


function initHeader() {
	if (!document.querySelector('header')) {
		return;
	}

	var header = document.querySelector('header');
	var body = document.querySelector('body');
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

function bgParallax(){
    if (!document.querySelector('.bg-parallax')) {
		return;
	}
    let section = document.querySelector('.bg-parallax');
    let bg = section.querySelector('.bg-parallax .bg');
    bg.style.backgroundPosition = '50% 100%';

    gsap.to(bg, {
        backgroundPosition: '50% 0',
        ease: "none",
        markers:true,
        scrollTrigger: {
          trigger: section,
          start: "top 50%", 
          end: "bottom top",
          scrub: true
        }
      });
}

function bgImgScale(){
	if (!document.querySelector('.bg-media')) {
		return;
	}
	let bgImg = document.querySelector('.bg-media img')
	gsap.timeline({})
		.fromTo(bgImg,
            {scaleX:1.3, scaleY:1.3},
            {scaleX:1.0, scaleY:1.0,duration:1.0}
            )
}


function fadeItem(delayTime = 0.3){
	if (!document.querySelector('.fade-item')) {
        return;
    }
	let items= document.querySelectorAll('.fade-item');
	items.forEach(item =>{
		let tl = gsap.timeline({
			delay:delayTime,
			scrollTrigger:{
				trigger:item,
				// markers:true,
				start : 'top bottom',
			}
		});
		tl.fromTo(item,{autoAlpha:'0', y:'40'},{autoAlpha:'1', y:'0',duration:'0.5', ease:Power4.inOut})
			
	})
}



function splitText(){
    if (!document.querySelector('.split-text')) {
        return;
    }

    let textLeft = document.querySelector('.text-left')
    let textRight = document.querySelector('.text-right')

    // gsap.set(textLeft,{opacity:0})
    // gsap.set(textRight,{opacity:0})
    gsap.from(textLeft, 1, {x:-50, opacity:0})
    gsap.from(textRight, 1, {x:50, opacity:0})
    // let tl = gsap.timeline()
    //     .from(textLeft,{opacity:0,  x:-100})
    //     .to(textLeft,{opacity:1,  x:0})
        
    //     .from(textRight,{opacity:0,  x:100})
    //     .to(textRight,{opacity:1,  x:500})
    // return tl
}


function toggleText(){
    if (!document.querySelector('.toggle-text')) {
        return;
    }

    let textIn = document.querySelector('.text-in')
    let textOut = document.querySelector('.text-out')
    
    let splitTextIn = new SplitText(textIn,{type:"chars"});
    let splitTextOut = new SplitText(textOut,{type:"chars"});

    let tl = gsap.timeline({repeat:-1})
        .from(splitTextIn.chars,{opacity:0, stagger:0.03, y:+10})
        .to(splitTextIn.chars,{opacity:0, stagger:0.03, y:+10},'+=3')
        .from(splitTextOut.chars,{opacity:0, stagger:0.03, y:+10},'-=0.5')
        .to(splitTextOut.chars,{opacity:0, stagger:0.03, y:+10},'+=3')
    tl.delay(0)
    return tl
}



function initImageMask() {
    if (!document.querySelector('.image-mask-container')) {
        return;
    }

    gsap.set('figure', {
        xPercent: -100
    })
    gsap.set('figure .mask', {
        xPercent: 100
    })

    const sections = document.querySelectorAll('.image-mask-container');

    sections.forEach(section => {
        let figure = section.querySelector('figure');
        let mask = section.querySelector('.mask');
        gsap.timeline({
                scrollTrigger: {
                    trigger: section,
                    // markers: true,
                    start: 'top bottom-=25%',
                    end: 'bottom top',
                    // toggleActions: 'play reverse play reverse',
                }
            })
            .to(figure, {
                xPercent: 0
            })
            .to(mask, {
                xPercent: 0
            }, 0)
    })
}


function initSmoothScroll() {
    bodyScrollBar = Scrollbar.init(scroller, {
        damping: 0.04,
        thumbMinSize:20,
        continuousScrolling:true,

    });
    bodyScrollBar.track.xAxis.element.remove();
    ScrollTrigger.scrollerProxy(".js-scroll", {
        scrollTop(value) {
            if (arguments.length) {
                bodyScrollBar.scrollTop = value;
            }
            return bodyScrollBar.scrollTop;
        }
    });
    bodyScrollBar.addListener(ScrollTrigger.update);
    ScrollTrigger.defaults({
        scroller: scroller
    });
}


function initCorrectMarkers() {
    if (document.querySelector('.gsap-marker-scroller-start')) {
        const gsapMarkers = gsap.utils.toArray('[class *= "gsap-marker"]');
        bodyScrollBar.addListener(({
            offset
        }) => {
            gsap.set(gsapMarkers, {
                marginTop: -offset.y
            })
        });
    }
}


