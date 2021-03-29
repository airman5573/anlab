    function wpBodyClass(data){
        var response = data.next.html.replace(/(<\/?)body( .+?)?>/gi, '$1notbody$2>', data.next.html);
        var bodyClasses = $(response).filter('notbody').attr('class');
        $('body').attr('class', bodyClasses);

        // Update admin bar
        // if($('body').hasClass('admin-bar')){
        //     $( "#wpadminbar" ).replaceWith( $(response).find('#wpadminbar'));
        //     $( "#wpadminbar a" ).each( function() {
        //         $( this ).attr( 'data-barba-prevent' , true );
        //     });
        // }
    }


    function wpNavClass(data){
        console.log('wpNavClass');
        if (!document.querySelector('.menu')) {
		    return;
	    }
        let menu = document.querySelector('.menu');
        let nextLink = menu.querySelector(`a[href="${data.next.url.href}"]`);
        let nextItem = nextLink.closest('li');

        if (menu.querySelector('.current-menu-item')) {
            menu.querySelector('.current-menu-item').classList.remove('current-menu-item');
        }

        if (menu.querySelector('.active-link')) {
            menu.querySelector('.active-link').classList.remove('active-link');
        }
        if(nextLink){
            nextLink.classList.add('active-link');
            nextItem.classList.add('current-menu-item');
        }
    }


    // export {wpBodyClass, wpNavClass}