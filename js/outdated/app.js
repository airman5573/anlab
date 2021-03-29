
gsap.registerPlugin(ScrollTrigger, ScrollToPlugin);

const scroller = document.querySelector('.js-scroll');
// const burger = document.querySelector('.burger');
// const panel = document.querySelector('.hamburger-panel');
// const loader = document.querySelector('.loader');
// const loaderTitle = document.querySelector('.loader .loader_title');
// const splitLoaderTitle = new SplitText(loaderTitle,{type:"chars"});
let bodyScrollBar;



jQuery(function($) {
    if (!!window.MSInputMethodContext && !!document.documentMode) {
        console.log('IE');
    }
    else{
        // init();
        toggleHamburgerScreen();
    }
    

/*init***********************************/

    function init(){
        barba.hooks.beforeEnter((data) => {

            initSmoothScroll();
            
            document.querySelector('body').classList.remove('is-loading');
        });

        barba.hooks.afterEnter((data) => {
            initCorrectMarkers();     
        });

        barba.hooks.after(() => {
            document.querySelector('html').classList.remove('is-transitioning');
            document.querySelector('body').classList.remove('is-loading');
        });
    
        barba.hooks.enter((data) => {
            document.querySelector('html').classList.add('is-transitioning');
            // wpNavClass(data);
            wpBodyClass(data);
            
        });
    
        barba.init({
            views:[{
                namespace:'home',
                beforeEnter(data){
                    pageEnterHome(); 
                }
            }],
            transitions: [{
                once(data) { 
                    disableCurrentLink();
                    initHeader(); //once
                    initHamburgerPanel(); //once
                    initFont(); //once
                    initContent(); //직접 접속한 경우
                },
                async leave({current}) {
                    await pageLeave(current);
                },
                enter({next}) {
                    pageEnter(next);
                    bodyScrollBar.setPosition(0, 0);
                }
            }]
        });
    }


 /*Function_PageTransition***************/

    function pageEnterHome(){
        let panel = document.querySelector('.opening');
        let maskTop = document.querySelector('.mask-top');
        let maskBottom = document.querySelector('.mask-bottom');
        let openingTitle = document.querySelector('.opening_title');
        let splitOpeningTitle = new SplitText(openingTitle,{type:"chars"});
        gsap.set(panel,{autoAlpha:1})

        var tl = gsap.timeline({defaults:{
            ease: "power4.inOut"
        }})
            .from(splitOpeningTitle.chars,{opacity:0, x:-20, stagger:0.01})
            .to(splitOpeningTitle.chars,{autoAlpha:0, duration:1}, '+=0.5')
            .to(maskTop,{yPercent:-100, duration:1.5},'-=0.5')
            .to(maskBottom,{yPercent:100, duration:1.5},'<')
            .to(panel,{autoAlpha:0, duration:0.1})
        tl.delay(0.5);
    }
    function pageLeave({container}) {
        const tl = gsap.timeline({
            onComplete : closeHamburgerPanel(),
            duration:0.05,
            defaults:{
                ease: "power4.inOut"
            },
        });
        tl

            .to(container, {y:-100})
            .to(loader,{autoAlpha:1},'<')
            // .from(splitLoaderTitle.chars,{autoAlpha:0, x:-20, stagger:0.01})
        return tl;
    }

    function pageEnter({container}) {
        const tl = gsap.timeline({
            onComplete:initContent(),
            duration:0.05,
        });
        tl

            .from(container, {y:-50})
            .to(loader, {autoAlpha:0},0)
        tl.delay(0)
        return tl;
    }

    /*Init***************************/

    function initContent() {
        fadeItem();
        countFund()
        toggleTeam()
        toggleText()
        bgImgScale()
    }




}); // End jQuery


// export { scroller, burger, panel, loader, loaderTitle, splitLoaderTitle, bodyScrollBar}