import $ from 'jquery';
//pour régler le message d'erreur dans la console pour slick
window.$ = window.jQuery = $;

import 'slick-carousel'
import ('./style.scss');
import('bootstrap');
import('slick-carousel');

// Permet d'attendre que la page soit chargée avant d'exécuter le code JS
$(function() {

    // document.querySelectorAll('#distribution')
    $('#distribution').slick({
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1
    });

    $('#producer-carrousel').slick({
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1
    });

});



