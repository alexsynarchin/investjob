$( document ).ready(function() {
    mobileMenu();
});

function mobileMenu() {
    var toggle = $('.mobile-nav-panel');
    var icon = $('.mobile-nav-panel__line');
    toggle.on('click', function () {
        icon.toggleClass("mobile-nav-panel__line--on");
    });
}
