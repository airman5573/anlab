if (!!window.MSInputMethodContext && !!document.documentMode) {

(function(x){

    document.querySelector('body').classList.remove('is-loading');
    cssVars({});
    toggleTeam();
    initFont();
    initHamburgerPanel();

    "use strict";
    var panel = document.querySelector('.hamburger-panel');
    var navItems = document.querySelectorAll('.hamburger-panel a');
    var burger = document.querySelector('.burger');
    function initHamburgerPanel() {
        if (!document.querySelector('.hamburger-panel')) {
            return;
        }
        var burger = document.querySelector('.burger');
        burger.addEventListener('click', function (e) {
    
            e.preventDefault();
            e.stopPropagation();
    
            if (!panel.classList.contains('open')) {
                openHamburgerPanel();
            } else {
                closeHamburgerPanel();
            }
        });
    }
    function openHamburgerPanel() {
        burger.querySelector('button').classList.add('open');
        panel.classList.add('open');
        gsap.timeline().to(panel, {
            xPercent: -100
        });
    }
    
    function closeHamburgerPanel() {
        burger.querySelector('button').classList.remove('open');
        panel.classList.remove('open');
        gsap.timeline().to(panel, {
            xPercent: 0
        });
    }


    function initFont(){
        (function(d) {
            var config = {
              kitId: 'waf0oub',
              scriptTimeout: 3000,
              async: true
            },
            h=d.documentElement,t=setTimeout(function(){h.className=h.className.replace(/\bwf-loading\b/g,"")+" wf-inactive";},config.scriptTimeout),tk=d.createElement("script"),f=false,s=d.getElementsByTagName("script")[0],a;h.className+=" wf-loading";tk.src='https://use.typekit.net/'+config.kitId+'.js';tk.async=true;tk.onload=tk.onreadystatechange=function(){a=this.readyState;if(f||a&&a!="complete"&&a!="loaded")return;f=true;clearTimeout(t);try{Typekit.load(config)}catch(e){}};s.parentNode.insertBefore(tk,s)
          })(document);
        
    }

    function toggleTeam() {
        var navItems = $('.team-list .nav-item');
        var contents =  $('.team-list .team-content');
        navItems.on("click", function(){
            var item = $(this);
            var targetLink = item.data("name");
            
            if(item.hasClass('active')){
                item.removeClass('active');
                contents.removeClass('active');
            }else{
                navItems.removeClass('active');
                contents.removeClass('active');
                
                setTimeout(function(){
                    var target = $(targetLink);
                    target.addClass('active');
                },500)

            }
        })
      }

})();
}
