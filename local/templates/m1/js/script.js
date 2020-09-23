$(document).ready(function() {
  // якоря и переход на  другие страницы в нужно месте
  $("a[href*='#']").mPageScroll2id();

  // шапка фиксированая
  $(window).on('scroll', function() {
    if ($(window).scrollTop() > 10) {
      $('body').addClass('header-fixed')
    }
    if ($(window).scrollTop() < 10) {
      $('body').removeClass('header-fixed')
    }

  } )


//модалка
//открытие
  $('.js-popup').on( 'click', function (e) {
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
  $('.modal').click( function(e) {
    if (e.target === this) {
      e.stopPropagation()
      e.preventDefault()
      $('body').removeClass('modal-active')
    }
  })
  //конец модалки



  //меню раскрывающиеся
  $('#hamburger').on('click', navStatus);
  $('.js-link').on('click', navStatus);
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


