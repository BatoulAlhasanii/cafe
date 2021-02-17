$(document).ready(function() {
    $('.open-mobile-nav').click(function() {
        $('.open-mobile-nav').toggleClass('active');
        $('.nav-mobile-container').toggleClass('speed-in');
        $('#shadow-layer').toggleClass('is-visible');
    });

    $('.opensearch').click(function() {
        $('.opensearch').toggleClass('active');
        $('.mobile-search').toggleClass('active');

    });
});
