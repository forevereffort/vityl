import Lottie from 'lottie-web'
import $ from 'jquery'
import { disableBodyScroll, enableBodyScroll } from 'body-scroll-lock'

$(function () {
  if ($('#vityl-career-hero__circle--middle').length > 0) {
    Lottie.loadAnimation({
      container: document.getElementById('vityl-career-hero__circle--middle'),
      path: window.FlyntData.templateDirectoryUri + '/Components/BelongingHero/Assets/happy-team-v2.json',
      renderer: 'svg',
      loop: true,
      autoplay: true
    })
  }

  $('.vityl-belong-hero__next-btn').on('click', function () {
    $('html, body').animate({
      scrollTop: $(this).parent().next().offset().top
    }, 1000)
  })

  $('#js-belonging-hero-btn').on('click', function () {
    disableBodyScroll(document.querySelector('#js-vityl-belonging-hero-popup-wrapper'))
    $('#js-vityl-belonging-hero-popup-wrapper').removeClass('hide')
  })

  $('#js-vityl-belonging-hero-popup__close-btn').on('click', function () {
    enableBodyScroll(document.querySelector('#js-vityl-belonging-hero-popup-wrapper'))
    $('#js-vityl-belonging-hero-popup-wrapper').addClass('hide')
  })

  $('#js-vityl-belonging-hero-popup-wrapper').on('click', function () {
    enableBodyScroll(document.querySelector('#js-vityl-belonging-hero-popup-wrapper'))
    $('#js-vityl-belonging-hero-popup-wrapper').addClass('hide')
  })

  $('#js-vityl-belonging-hero-popup').on('click', function (event) {
    event.stopPropagation()
  })
})
