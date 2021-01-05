// Permet d'attendre que la page soit chargée avant d'exécuter le code JS
jQuery(function($) {

    // document.querySelectorAll('#distribution')
    $('#distribution').slick({
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1
    });
});