import { $storage } from "@/plugins/storage";

export function initSidebar() {
    $("#menu").metisMenu();
    const qs = new PerfectScrollbar('.deznav-scroll');

    $('.metismenu > .mm-active ').each(function(){
        if(!$(this).children('ul').length > 0) {
            $(this).addClass('active-no-child');
        }
    });	

    $("ul#menu>li").on('click', function() {
        if ($('body').attr('data-sidebar-style') === 'mini') {
            console.log($(this).find('ul'))
            $(this).find('ul').stop()
        }
    })	
}

export function fullScreen() {
	if(document.fullscreenElement||document.webkitFullscreenElement||document.mozFullScreenElement||document.msFullscreenElement) { 
        /* Enter fullscreen */
        if(document.exitFullscreen) {
            document.exitFullscreen();
        } else if(document.msExitFullscreen) {
            document.msExitFullscreen(); /* IE/Edge */
        } else if(document.mozCancelFullScreen) {
            document.mozCancelFullScreen(); /* Firefox */
        } else if(document.webkitExitFullscreen) {
            document.webkitExitFullscreen(); /* Chrome, Safari & Opera */
        }
    } else { 
        /* exit fullscreen */
        if(document.documentElement.requestFullscreen) {
            document.documentElement.requestFullscreen();
        } else if(document.documentElement.webkitRequestFullscreen) {
            document.documentElement.webkitRequestFullscreen();
        } else if(document.documentElement.mozRequestFullScreen) {
            document.documentElement.mozRequestFullScreen();
        } else if(document.documentElement.msRequestFullscreen) {
            document.documentElement.msRequestFullscreen();
        }
    }
}

export function toggleMenu() {
    $('#main-wrapper').toggleClass("menu-toggle");
    $(".hamburger").toggleClass("is-active");
}

export function contentBodyHeight() {
    var win_h = window.outerHeight;
    var win_h = window.outerHeight;
    if (win_h > 0 ? win_h : screen.height) {
        $(".content-body").css("min-height", (win_h + 60) + "px");
    };
}

export function initTemplate(options = {}) {
    const dezSettingsOptions = {
        typography: "poppins",
        version: $storage.cookie.get('color-mode') || 'light',
        layout: "Vertical",
        headerBg: "color_1",
        navheaderBg: "color_1",
        sidebarBg: "color_1",
        sidebarStyle: "full",
        sidebarPosition: "fixed",
        headerPosition: "fixed",
        containerLayout: "full",
        direction: 'ltr',
    };
    const settings = {
        ...dezSettingsOptions,
        ...options,
    };

    new dezSettings(settings); 

    $(window).on('resize',function(){
	    new dezSettings(settings); 
    });
}

export function switchColorMode() {
    const mode = $storage.cookie.get('color-mode') || 'light'
    if (mode == 'light') {
        $storage.cookie.set('color-mode', 'dark');
        $('.dz-theme-mode').addClass('active')
    } else {
        $storage.cookie.set('color-mode', 'light');
        $('.dz-theme-mode').removeClass('active')
    }
    
    $('body').attr('data-theme-version', mode == 'light' ? 'dark' : 'light');
}