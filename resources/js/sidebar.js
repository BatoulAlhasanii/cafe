$(document).ready(function() {
    $('#admin-navbar-toggler').click(function() {
        $('#navbarNav').toggleClass('show');
    });

    window.$(document).click(function (event) {
        if (window.$(window).width() < 992 && window.$('#navbarNav').hasClass('show')) {
          if ((!(window.$(event.target).is('#admin-navbar-toggler') || window.$(event.target).closest('#admin-navbar-toggler').length) && !window.$(event.target).closest('#navbarNav').length) || window.$(event.target).is('.sidebar-nav-link') || window.$(event.target).closest('.sidebar-nav-link').length) {
                window.$('#navbarNav').removeClass('show');
          }
        }
    })
});
