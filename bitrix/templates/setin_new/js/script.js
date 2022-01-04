// const isMobile = {
//    Android: function () {
//       return navigator.userAgent.match(/Android/i);
//    },
//    BlackBerry: function () {
//       return navigator.userAgent.match(/BlackBerry/i);
//    },
//    iOS: function () {
//       return navigator.userAgent.match(/iPhone|iPad|iPod/i);
//    },
//    Opera: function () {
//       return navigator.userAgent.match(/Opera Mini/i);
//    },
//    Windows: function () {
//       return navigator.userAgent.match(/IEMobile/i);
//    },
//    any: function () {
//       return (
//          isMobile.Android() ||
//          isMobile.BlackBerry() ||
//          isMobile.iOS() ||
//          isMobile.Opera() ||
//          isMobile.Windows());
//    }
// };
// if (isMobile.any()) {
//    document.body.classList.add('touch');
//
// } else {
//    document.body.classList.add('pc');
// }
//
// /* for modal window */
// const myModal = new HystModal({
//    linkAttributeName: "data-hystmodal",
//    catchFocus: true,
//    waitTransitions: true,
//    closeOnEsc: true,
// });

/* for header fixed */

window.addEventListener('scroll', function () {
   let modalWin = this.document.querySelector(".hystmodal--active");
   let header = document.querySelector('.header');
   header.classList.toggle("sticky", window.pageYOffset > 0 || modalWin);
});


/* 

*/
/* for search */
window.onload = function () {
   let searchOpen = document.querySelector(".icon-search-main");
   let searchForm = document.querySelector(".search-form");
   let searchClose = document.querySelector(".search-form__close");

   searchOpen.addEventListener("click", function (e) {
      setTimeout(function () {
         searchForm.classList.add("active");
      });
   });

   searchClose.addEventListener("click", function (e) {
      setTimeout(function () {
         searchForm.classList.remove("active");
      });
   });

   document.addEventListener('click', function (e) {
      let target = e.target;
      let targetSearchForm = target == searchForm || searchForm.contains(target);

      if (!targetSearchForm) {
         searchForm.classList.remove("active");
      }
   });
}
/* for portfolio */

let portfolio = document.querySelector('.examples__tabs');
if (portfolio) {
   portfolio.addEventListener("click", function (e) {
      portfolio.classList.toggle("active");

      let portfolioLis = document.querySelectorAll('.tabs__btn');
      if (portfolioLis.length > 0) {
         for (let index = 0; index < portfolioLis.length; index++) {
            const portfolioLi = portfolioLis[index];
            portfolioLi.addEventListener("click", function (e) {
               portfolioLi.classList.add("active");
               portfolio.classList.remove("active");
            });
         };
      };


   });
   document.addEventListener('click', function (e) {
      let target = e.target;
      let targetPortfolio = target == portfolio || portfolio.contains(target);

      if (!targetPortfolio) {
         portfolio.classList.remove("active");
      }
   });

};

/* for menu btn */
if (document.documentElement.clientWidth < 1480) {
   let menuBtn = document.querySelector('.navigation__btn');
   if (menuBtn) {
      menuBtn.addEventListener("click", function (e) {

         menuBtn.classList.toggle("active");

      });
      document.addEventListener('click', function (e) {
         let target = e.target;
         let targetmenuBtn = target == menuBtn || menuBtn.contains(target);

         if (!targetmenuBtn) {
            menuBtn.classList.remove("active");

         }
      });
   };
};

/* for more btn */
if (document.documentElement.clientWidth < 1480) {
   let moreBtn = document.querySelector('.more');
   if (moreBtn) {
      moreBtn.addEventListener("click", function (e) {

         moreBtn.classList.toggle("active");

      });
      document.addEventListener('click', function (e) {
         let target = e.target;
         let targetmoreBtn = target == moreBtn || moreBtn.contains(target);

         if (!targetmoreBtn) {
            moreBtn.classList.remove("active");

         }
      });
   };
};


/** for burger menu **/
let unlock = true;
let iconMenu = document.querySelector('.icon-menu');
if (iconMenu != null) {
   let delay = 500;
   let menuBody = document.querySelector('.header__second-navigation');
   iconMenu.addEventListener('click', function (e) {
      if (unlock) {
         iconMenu.classList.toggle('active');
         menuBody.classList.toggle("active");
         document.body.classList.toggle('lock');
      }
   });
};

/** for burger menu **/
let clickZones = document.querySelectorAll('.header__second-menu li a');
if (clickZones.length > 0) {
   for (let index = 0; index < clickZones.length; index++) {
      let clickZone = clickZones[index];
      let clickZoneMenu = clickZone.nextElementSibling;
      clickZone.addEventListener('click', function (e) {
         clickZone.classList.toggle("active");
         clickZoneMenu.classList.toggle("active");

         document.addEventListener('click', function (e) {
            const target = e.target;
            const its_clickZone = target == clickZone;
            const its_subMenu = target == clickZoneMenu || clickZoneMenu.contains(target);
            if (!its_clickZone && !its_subMenu) {
               clickZone.classList.remove("active");
               clickZoneMenu.classList.remove("active");
            }
         });
      });
   }
}
/** for phone icon **/
let phoneIcon = document.querySelector('.icon-phone');
if (phoneIcon) {

   let phoneIconInfo = phoneIcon.nextElementSibling;
   phoneIcon.addEventListener('click', function (e) {
      phoneIcon.classList.toggle("active");
      phoneIconInfo.classList.toggle("active");

      document.addEventListener('click', function (e) {
         const target = e.target;
         const its_phoneIcon = target == phoneIcon;
         const its_phoneIconInfo = target == phoneIconInfo || phoneIconInfo.contains(target);
         if (!its_phoneIcon && !its_phoneIconInfo) {
            phoneIcon.classList.remove("active");
            phoneIconInfo.classList.remove("active");
         }
      });
   });
}


/* for counter */

(function () {
   let counter = document.querySelectorAll('.counter');
   let limit = 0; // Переменная, чтобы останавливать функцию, когда всё запустится.
   window.addEventListener('scroll', function () {
      if (limit == counter.length) { return; }

      for (let i = 0; i < counter.length; i++) {
         let pos = counter[i].getBoundingClientRect().top; //Позиция блока, считая сверху окна
         let win = window.innerHeight - 40; // изначально было значение (-40), на 40 пикселей меньше, чем высота окна
         if (pos < win && counter[i].dataset.stop === "0") {
            counter[i].dataset.stop = 1; // Останавливаем перезапуск счета в этом блоке
            let x = 0;
            limit++; // Счетчик будет запущен, увеличиваем переменную на 1
            let int = setInterval(function () {
               // Раз в 120 миллисекунд будет прибавляться 50-я часть нужного числа, чтобы крутилось быстрее уменьшаем значение со 120 до 60 и т.д.
               x = x + Math.ceil(counter[i].dataset.to / 20);
               counter[i].innerText = x;
               if (x > counter[i].dataset.to) {
                  //Как только досчитали - стираем интервал.
                  counter[i].innerText = counter[i].dataset.to;
                  clearInterval(int);
               }
            }, 120);
         }
      }
   });
})();


/** for animation **/

// document.addEventListener('DOMContentLoaded', function () {
//    let animImg = document.querySelector('.fullscreen__img');
//    let animText = document.querySelector('.fullscreen__info');
//    if (animImg, animText) {
//       animImg.classList.toggle('active');
//       animText.classList.toggle('active');
//    };
//
// });


/** for tabs **/
document.addEventListener('DOMContentLoaded', () => {
   const tabs = document.querySelector('.tabs');
   const tabsBtn = document.querySelectorAll('.tabs__btn');
   const tabsContent = document.querySelectorAll('.tabs__content');

   if (tabs) {
      tabs.addEventListener('click', (e) => {
         if (e.target.classList.contains('tabs__btn')) {
            const tabsPath = e.target.dataset.tabsPath;
            tabsBtn.forEach(el => { el.classList.remove('tabs__btn-active') });
            document.querySelector(`[data-tabs-path="${tabsPath}"]`).classList.add('tabs__btn-active');
            tabsHandler(tabsPath);
         }

         if (e.target.classList.contains('tabs__arrow--prev')) {
            let activeBtn = document.querySelector('.tabs__btn-active');
            let activeParent = activeBtn.closest('.tabs__item');
            let previousParent = activeParent.previousElementSibling;

            if (previousParent) {
               let prevActive = previousParent.querySelector('.tabs__btn')
               tabsBtn.forEach(el => { el.classList.remove('tabs__btn-active') });
               prevActive.classList.add('tabs__btn-active');
               let path = prevActive.dataset.tabsPath;
               tabsHandler(path);
            }
         }
         if (e.target.classList.contains('tabs__arrow--next')) {
            let activeBtn = document.querySelector('.tabs__btn-active');
            let activeParent = activeBtn.closest('.tabs__item');
            let nextParent = activeParent.nextElementSibling;
            if (nextParent) {
               let nextActive = nextParent.querySelector('.tabs__btn');
               tabsBtn.forEach(el => { el.classList.remove('tabs__btn-active') });
               nextActive.classList.add('tabs__btn-active');
               let path = nextActive.dataset.tabsPath;
               tabsHandler(path);
            }
         }
      });
   }

   const tabsHandler = (path) => {
      tabsContent.forEach(el => { el.classList.remove('tabs__content-active') });
      document.querySelector(`[data-tabs-target="${path}"]`).classList.add('tabs__content-active');
   };
});

/*for clients*/

let clients = Array.from(document.querySelectorAll('.clients__slider-img'));
if (clients) {
   const handleClick = (e) => {
      e.preventDefault();
      clients.forEach(node => {
         node.classList.remove('active');
      });
      e.currentTarget.classList.add('active');
   }
   clients.forEach(node => {
      node.addEventListener('click', handleClick)
   });
}


/*for map*/

let body = document.querySelector("body");
if (body.classList.contains("touch")) {

   let mapBtns = document.querySelectorAll('.map__item');
   if (mapBtns.length > 0) {
      for (let index = 0; index < mapBtns.length; index++) {
         let mapBtn = mapBtns[index];
         let consultation = document.querySelector(".consultation");
         mapBtn.addEventListener("click", function (e) {
            mapBtn.classList.add("active");
         });
         document.addEventListener('click', function (e) {
            let target = e.target;
            let targetmapBtn = target == mapBtn || mapBtn.contains(target);
            if (!targetmapBtn) {
               mapBtn.classList.remove("active");
            }
         });
         /*
         if (mapBtn.classList.contains("active")) {
            consultation.classList.add("active");
         } else {
            consultation.classList.remove("active");
         };
         */
      }
   };
};







/*for anchor*/
let anchor = document.querySelectorAll('.sidebar__menu li a');
if (anchor) {
   document.querySelectorAll('.sidebar__menu li a').forEach(scroll => {
      scroll.addEventListener('click', function (e) {
         e.preventDefault()

         const href = this.getAttribute('href').substring(1)

         const scrollTarget = document.getElementById(href)

         const topOffset = 104  //это если нужная секция подводится под самый верх страницы
         // const topOffset = document.querySelector('.header').offsetHeight;  это если нужно подвести секциюпод верх страницы но оставить место на высоту шапки, если шапка фиксированная
         const elementPosition = scrollTarget.getBoundingClientRect().top
         const offsetPosition = elementPosition - topOffset

         window.scrollBy({
            top: offsetPosition,
            behavior: 'smooth',
         })
      })
   })
}


/*for slider*/

var topSlider = new Swiper(".tabs__slider", {
   slidesPerView: 1,
   spaceBetween: 10,
   speed: 800,
   grabCursor: true,
   loop: true,
   spaceBetween: 20,

   navigation: {
      prevEl: ".tabs__slider-prev",
      nextEl: ".tabs__slider-next",
   },

});


var topSlider = new Swiper(".clients__slider", {
   speed: 800,
   grabCursor: true,
   loop: true,
   spaceBetween: 20,

   navigation: {
      prevEl: ".clients__slider-prev",
      nextEl: ".clients__slider-next",
   },

});


var gallery = new Swiper(".gallery__slider", {
   slidesPerView: 1,
   spaceBetween: 10,
   speed: 800,
   grabCursor: true,
   loop: true,
   autoplay: {
      delay: 2000,
      disableOnInteraction: false,
   },
   breakpoints: {
      480: {
         slidesPerView: 1,
         spaceBetween: 10,
      },
      576: {
         slidesPerView: "auto",
         spaceBetween: 10,
      },
      768: {
         slidesPerView: "auto",
         spaceBetween: 10,
      },
      992: {
         slidesPerView: "auto",
         spaceBetween: 10,
      },
   },
});

var galleryTwo = new Swiper(".gallery__slider-two", {
   slidesPerView: 1,
   spaceBetween: 10,
   speed: 800,
   grabCursor: true,
   loop: true,
   autoplay: {
      delay: 2000,
      disableOnInteraction: false,
   },
   breakpoints: {
      480: {
         slidesPerView: 1,
         spaceBetween: 10,
      },
      576: {
         slidesPerView: "auto",
         spaceBetween: 10,
      },
      768: {
         slidesPerView: "auto",
         spaceBetween: 10,
      },
      992: {

      },
   },
});


var articles = new Swiper(".articles__slider", {
   speed: 800,
   grabCursor: true,
   loop: true,
   navigation: {
      prevEl: ".articles__slider-prev",
      nextEl: ".articles__slider-next",
   },
   breakpoints: {
      480: {

      },
      576: {

      },
      768: {
         slidesPerView: 2,
         spaceBetween: 20,
      },

      992: {
         slidesPerView: 3,
         spaceBetween: 20,
      },
      1279: {
         slidesPerView: 3,
         spaceBetween: 20,
      },
      1480: {
         slidesPerView: 4,
         spaceBetween: 20,
      },
   },
});

var information = new Swiper(".services__slider", {
   speed: 800,
   grabCursor: true,
   loop: true,
   spaceBetween: 20,
   pagination: {
      el: ".services__slider-pagination",
      type: "fraction",
   },
   navigation: {
      prevEl: ".services__slider-prev",
      nextEl: ".services__slider-next",
   },

});


var portfolioSlider = new Swiper(".examples__slider", {
   speed: 800,
   grabCursor: true,
   loop: true,
   spaceBetween: 20,
   /*
    pagination: {
       el: ".examples__slider-pagination",
       type: 'custom',
       renderCustom: function (swiper, current, total) {
          return (current + '') + ' / ' + (total + '');
       }
    },
    paginationClickable: true,
    */
   navigation: {
      prevEl: ".examples__slider-prev",
      nextEl: ".examples__slider-next",
   },

});







let stripTitles = document.querySelectorAll('.title h2');
if (stripTitles.length > 0) {
   for (let index = 0; index < stripTitles.length; index++) {
      let stripTitle = stripTitles[index];
      if (stripTitle) {
         let strip = stripTitle.previousElementSibling;
         if (strip) {
            let stripTitleHeight = stripTitle.offsetHeight;
            strip.style.height = stripTitleHeight + "px";
            let stripTitleRect = stripTitle.getBoundingClientRect();
            console.log(stripTitleRect);
            strip.style.top = stripTitleRect.y + 'px';
         };

      }
   }
};