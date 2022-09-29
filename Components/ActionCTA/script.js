import $ from 'jquery'
import { disableBodyScroll, enableBodyScroll } from 'body-scroll-lock'

$(function () {
  $('#js-action-cta-btn').on('click', function () {
    disableBodyScroll(document.querySelector('#js-vityl-action-cta-popup-wrapper'))
    $('#js-vityl-action-cta-popup-wrapper').removeClass('hide')
  })

  $('#js-vityl-action-cta-popup__close-btn').on('click', function () {
    enableBodyScroll(document.querySelector('#js-vityl-action-cta-popup-wrapper'))
    $('#js-vityl-action-cta-popup-wrapper').addClass('hide')
  })

  $('#js-vityl-action-cta-popup-wrapper').on('click', function () {
    enableBodyScroll(document.querySelector('#js-vityl-action-cta-popup-wrapper'))
    $('#js-vityl-action-cta-popup-wrapper').addClass('hide')
  })

  $('#js-vityl-action-cta-popup').on('click', function (event) {
    event.stopPropagation()
  })
})
