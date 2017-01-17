//var screenSM = 640;
var screenMD = 1024;


// Add a top margin to the content wrapper the height of the fixed header
var fixedTopHeight = jQuery(".fixed-top").height();
function window_resize(){
  if (window.matchMedia("(min-width: "+ screenMD +"px)").matches) {
    jQuery(".articles-wrapper").css({"margin-top": fixedTopHeight}); }
}
widthMdCheck = window.matchMedia("(min-width: " + screenMD + "px)"),
widthMdCheck.addListener(window_resize);

window.addEventListener("DOMContentLoaded", window_resize, false);


// Use jQuery UI accordion for menu sub-items
jQuery( ".menu-main-container ul li.menu-item-has-children" ).accordion({ 
  animate: 200,
  icons: false,
  heightStyle: "content",
  collapsible: true,
  active: false
});  


// Add 'open' classes when mobile menu is open
jQuery("#open").click( function() {
  jQuery("#mobile-menu").addClass('menu-open');
  jQuery("body").addClass('mobile-menu-open');
});

// Remove 'open' classes when user clicks close or outside of menu
jQuery("#close, #mobile-menu-filter").click( function() {
  jQuery("#mobile-menu").removeClass('menu-open');
  jQuery("body").removeClass('mobile-menu-open');
});


// Open search bar
jQuery("#search-open").click( function() {
  jQuery("#search").addClass('search-is-open');
});

// Close search bar
jQuery("#search-close").click( function() {
  jQuery("#search").removeClass('search-is-open');
});


// Stick menu bar to top when mobile menu is present
function sticky_header(){
  if (window.matchMedia("(min-width: "+ screenMD +"px)").matches) {
    
  } else {
    var topHeader = jQuery(".top-header").height();
    var bottomHeader = jQuery(".bottom-header").outerHeight();

    jQuery(window).scroll(function() {    
       var scroll = jQuery(window).scrollTop();
          if (scroll >= topHeader) {
             jQuery(".bottom-header").css({"position": "fixed", "top": "0", "display": "flex"});
             jQuery("main").css("margin-top", bottomHeader);
           } else {
             jQuery(".bottom-header").removeAttr('style');
             jQuery("main").css("margin-top", "0");
           }
    });
  }
}
widthMdCheck = window.matchMedia("(min-width: " + screenMD + "px)"),
widthMdCheck.addListener(sticky_header);

window.addEventListener("DOMContentLoaded", sticky_header, false);



// Adds a class to #masthead on desktop
function header_class(){
  if (window.matchMedia("(min-width: "+ screenMD +"px)").matches) {
    jQuery("#masthead").addClass("sidebar-header");
  } else {
    jQuery("#masthead").removeClass("sidebar-header");
  }
}
widthMdCheck = window.matchMedia("(min-width: " + screenMD + "px)"),
widthMdCheck.addListener(header_class);

window.addEventListener("DOMContentLoaded", header_class, false);


// Add bottom margin to #primary for footer reveal effect
var footerHeight = jQuery(".site-footer").outerHeight();

// Set bottom margin on main content
jQuery("#primary").css("margin-bottom", footerHeight);
