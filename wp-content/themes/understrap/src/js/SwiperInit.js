jQuery(document).ready(function($){


  if ($(".sl-ofertas")[0]){

    var mySwiper1 = new Swiper('.swiper.sl-ofertas', {
      // Optional parameters
      disableOnInteraction: true,
      speed: 700,
      loop: true,
      spaceBetween: 30,
      centeredSlides: true,
      centeredSlidesBounds: true,

        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        },

      breakpoints: {
          320: {
            slidesPerView: 'auto',
            spaceBetween: 0,
            centeredSlides: false,
            centeredSlidesBounds: false,
          },
          425: {
            slidesPerView: 'auto',
            spaceBetween: 0,
          },
          768: {
            slidesPerView: 2,
          },
          1024: {
            slidesPerView: 3,
            centeredSlides: true,
            centeredSlidesBounds: true,
          },
          1366: {
            slidesPerView: 4,
            centeredSlides: false,
            centeredSlidesBounds: false,
          },
          1440: {
            slidesPerView: 4,
            centeredSlides: false,
            centeredSlidesBounds: false,
          },
          1600: {
            slidesPerView: 5,
            centeredSlides: true,
            centeredSlidesBounds: true,
          }
        }


      });

  } else {
      // Do something if class does not exist
  }


  if ($(".sl-categorias")[0]){

    var mySwiper1 = new Swiper('.swiper.sl-categorias', {
      // Optional parameters
      disableOnInteraction: true,
      speed: 700,
      loop: true,
      spaceBetween: 25,


        pagination: {
          el: '.swiper-pagination',
          clickable: true,
          type: 'bullets',
        },  

        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        },

      breakpoints: {
          320: {
            slidesPerView: 2,
            slidesPerColumn: 9999,
            slidesPerColumnFill: 'row',
            loop: false,
            allowTouchMove: false,
          },
          1024: {
            slidesPerView: 3,
          },
          1366: {
            slidesPerView: 4,
          },
          1600: {
            slidesPerView: 5,
          }
        }


      });

  } else {
      // Do something if class does not exist
  }

  
if ($(".sl-releated")[0]){

  var mySwiper1 = new Swiper('.swiper.sl-releated', {
    // Optional parameters
    disableOnInteraction: true,
    speed: 700,
    loop: false,
    centeredSlides: true,
    centeredSlidesBounds: true,
    centerInsufficientSlides: true,

      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },

    breakpoints: {
        320: {
          slidesPerView: 2,
          spaceBetween: 30,
        },
        425: {
          slidesPerView: 2,
          spaceBetween: 10,
        },
        1024: {
          slidesPerView: 3,
          spaceBetween: 10,
        },
        1366: {
          slidesPerView: 4,
          spaceBetween: 10,
        },
        1600: {
          slidesPerView: 6,
          spaceBetween: 10,
        }
      }


    });

}

if ($(".sl-sucursales")[0]){

  var mySwiper1 = new Swiper('.swiper.sl-sucursales', {
    // Optional parameters
    disableOnInteraction: true,
    slidesPerView: 1,
    speed: 700,
    loop: true,

      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },

    });

}

if ($(".sl-news")[0]){

  var mySwiper1 = new Swiper('.swiper.sl-news', {
    // Optional parameters
    disableOnInteraction: true,
    slidesPerView: 1,
    speed: 700,
    loop: true,

    autoplay: {
      delay: 3000,
    },

    });

}

if ($(".sl-homemain")[0]){

  var mySwiper1 = new Swiper('.swiper.sl-homemain', {
    // Optional parameters
    effect: 'fade',
    disableOnInteraction: true,
    slidesPerView: 1,
    speed: 700,
    loop: true,
    threshold: 10,

    pagination: {
      el: '.swiper-pagination',
      type: 'bullets',
    },

    });

}







});

