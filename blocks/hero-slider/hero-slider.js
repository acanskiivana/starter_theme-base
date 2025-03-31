jQuery(document).ready(function($) {
    $('.hero-slider-slick').slick({
        centerMode: true,
        centerPadding: '300px',
        slidesToShow: 1,
        prevArrow: $('.hero-slider .slick-arrow__prev'),
        nextArrow: $('.hero-slider .slick-arrow__next'),
        responsive: [
            {
                breakpoint: 1900,
                settings: {
                    centerPadding: '300px',
                }
              },
              {
                breakpoint: 1600,
                settings: {
                    centerPadding: '12rem',
                }
              },
              {
                breakpoint: 480,
                settings: {
                    centerPadding: '30px',
                }
              }
          ]
    });
});
    
