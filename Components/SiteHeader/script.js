import $ from 'jquery'
import { disableBodyScroll, enableBodyScroll } from 'body-scroll-lock'

$(function () {
  $('.site-header__mobile-btn').on('click', function () {
    if ($(this).hasClass('is-open')) {
      enableBodyScroll(document.querySelector('#js-site-header-menu'))
      $(this).removeClass('is-open')
      $('.site-header-menu').removeClass('is-open')
      $('.site-header').removeClass('is-open')
    } else {
      disableBodyScroll(document.querySelector('#js-site-header-menu'))
      $(this).addClass('is-open')
      $('.site-header-menu').addClass('is-open')
      $('#js-site-header-menu').innerHeight(window.innerHeight - 130)
      $('.site-header').addClass('is-open')
    }
  })

  $('#js-header-join-btn').on('click', function () {
    disableBodyScroll(document.querySelector('#js-vityl-waitlist-popup-wrapper'))
    $('#js-vityl-waitlist-popup-wrapper').removeClass('hide')
  })

  $('#js-vityl-waitlist-popup__close-btn').on('click', function () {
    enableBodyScroll(document.querySelector('#js-vityl-waitlist-popup-wrapper'))
    $('#js-vityl-waitlist-popup-wrapper').addClass('hide')
  })

  $('#js-vityl-waitlist-popup-wrapper').on('click', function () {
    enableBodyScroll(document.querySelector('#js-vityl-waitlist-popup-wrapper'))
    $('#js-vityl-waitlist-popup-wrapper').addClass('hide')
  })

  $('#js-vityl-waitlist-popup').on('click', function (event) {
    event.stopPropagation()
  })
})
