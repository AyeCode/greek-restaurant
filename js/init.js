jQuery(window).load(function () {
    jQuery('.site-loader').fadeOut('slow');
});
function greek_restaurant_responsive_menu_add() {
    jQuery('#kt-navigation').slicknav({
        label: ''
    });
}
function greek_restaurant_same_height() {
    jQuery('.matchHeight').matchHeight();
}
function greek_restaurant_add_lightbox_to_galleries() {
    jQuery('.gallery').magnificPopup({
        delegate: '.gallery-item > div > a',
        type: 'image',
        gallery: {
            enabled: true
        }
    });
}
jQuery(document).ready(function ($) {

    'use-strict';
    greek_restaurant_responsive_menu_add();
    greek_restaurant_same_height();
    greek_restaurant_add_lightbox_to_galleries();

});