import $ from 'jquery';
import './slick/slick.min';

$(document).ready(function (){

    $('.skills__item').slick({
        prevArrow: "<a href='' class='slick-arrow slick-arrow-prev'><box-icon name='left-arrow-alt'></box-icon></a>",
        nextArrow: "<a href='' class='slick-arrow slick-arrow-next'><box-icon name='right-arrow-alt'></box-icon></a>"
    });
});
