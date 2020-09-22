$(document).ready(function() {
  // //раскрытие ответов на вопросы в соотв. блоке
  // const questionBlock = $('.qna__question-block');
  // console.log(questionBlock)
  // questionBlock.each(function() {
  //   let questionToggle = $(this).children('.qna__question-toggle');
  //
  //   questionToggle.on('click', function() {
  //     $(this).parent().toggleClass('qna__question-block--open');
  //     $(this).next('p').slideToggle(500);
  //   });
  // })

  // //калькулятор
  // const result = document.querySelector('.calculator__form-value');
  // const basePrice = Number(result.textContent);
  //
  // function render() {
  //   let experience = document.querySelectorAll("input[name=CALC_Q1]:checked")[0]
  //       ? document.querySelectorAll("input[name=CALC_Q1]:checked")[0].value
  //       : 1;
  //   let language = document.querySelectorAll("input[name=CALC_Q2]:checked")[0]
  //       ? document.querySelectorAll("input[name=CALC_Q2]:checked")[0].value
  //       : 1;
  //   let hours = document.querySelectorAll("input[name=CALC_Q3]:checked")[0]
  //       ? document.querySelectorAll("input[name=CALC_Q3]:checked")[0].value
  //       : 1;
  //   result.innerHTML = basePrice * experience * language * hours
  // }
  //
  // $('.calculator').click(function(e){
  //       e.stopPropagation()
  //       render()
  //   });
  //
  // //Слайдер баннера
  // $('.banner-slider').slick({
  //   infinite: true,
  //   speed: 300,
  //   slidesToShow: 1,
  //   dots: true,
  //   dotsClass: 'slick-dots',
  //   nextArrow: '<button class="slick__arrows nextArrow "></button>',
  //   prevArrow: '<button class="slick__arrows prevArrow "></button>',
  //   responsive: [
  //     {
  //       breakpoint: 767,
  //       settings: {
  //         arrows: false
  //       }
  //     },
  //   ]
  // });
  //
  // //Слайдер интерьеров
  // $('.interiors-slider').slick({
  //   infinite: true,
  //   speed: 300,
  //   slidesToShow: 1,
  //   dots: true,
  //   dotsClass: 'slick-dots',
  //   nextArrow: '<button class="slick__arrows nextArrow "></button>',
  //   prevArrow: '<button class="slick__arrows prevArrow "></button>',
  // });
  //
  // //Слайдер преимуществ
  // $('.advantages-slider').slick({
  //   infinite: true,
  //   speed: 300,
  //   slidesToShow: 1,
  //   nextArrow: '<button class="slick__arrows nextArrow advantages-arrows"></button>',
  //   prevArrow: '<button class="slick__arrows prevArrow advantages-arrows"></button>',
  // });

  // // скрипт для скролла якорей.
  // const anchors = document.querySelectorAll('a[href*="#"]')
  // for (let anchor of anchors) {
  //
  //   // вешаем слушателей для всех якорей
  //   anchor.addEventListener('click', function (e) {
  //
  //     const blockID = anchor.getAttribute('href').substr(1)
  //     const headerFixedHeight = 53;
  //
  //     //при клике скролл до верха элемента с учетом фиксированного хедера
  //     const topOfElement = document.getElementById(blockID).offsetTop - headerFixedHeight;
  //     window.scroll({top: topOfElement, behavior: "smooth"});
  //
  //   })
  // }

  $("a[href*='#']").mPageScroll2id();

  //модалка
  //открытие
  $('.js-popup').click( function (e) {
    e.preventDefault()
    $('body').addClass('modal-active')
  })

  // закриытие модалки
  $('.modal__close-btn').click( function(e) {
      e.preventDefault()
      $('body').removeClass('modal-active')
    })

  $('.slam-easyform').click( function(e) {
    if (e.target === this) {
      e.stopPropagation()
      e.preventDefault()
      $('body').removeClass('modal-active')
    }
  })
  //конец модалки



  //меню раскрывающиеся
  $('#hamburger').on('click', navStatus);
});

function navStatus() {
  if (document.body.classList.contains('hamburger-active')) {
    navClose();
  }
  else {
    navOpen();
  }
}

function navClose() {
  document.body.classList.remove('hamburger-active');
  $('.header__nav').slideUp()
}

function navOpen() {
  document.body.classList.add('hamburger-active');
  $('.header__nav').slideDown()
}
