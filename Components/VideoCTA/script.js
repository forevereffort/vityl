import $ from 'jquery'
import { disableBodyScroll, enableBodyScroll } from 'body-scroll-lock'

$(function () {
  $('#js-vityl-video-cta-popup-wrapper iframe').on('load', function () {
    $('#js-vityl-video-cta-popup-wrapper .vityl-video-loader').addClass('hide')
  })

  $('.vityl-video-cta__video-btn').on('click', function () {
    const $videoIframe = $('#js-vityl-video-cta-popup-wrapper iframe')
    $('#js-vityl-video-cta-popup-wrapper .vityl-video-loader').removeClass('hide')
    disableBodyScroll(document.querySelector('#js-vityl-video-cta-popup-wrapper'))
    $('#js-vityl-video-cta-popup-wrapper').removeClass('hide')
    $videoIframe.attr('src', $videoIframe.attr('data-src'))
  })

  $('#js-vityl-video-cta-popup__close-btn').on('click', function () {
    $('#js-vityl-video-cta-popup-wrapper iframe').attr('src', '')
    enableBodyScroll(document.querySelector('#js-vityl-video-cta-popup-wrapper'))
    $('#js-vityl-video-cta-popup-wrapper').addClass('hide')
  })

  $('#js-vityl-video-cta-popup-wrapper').on('click', function () {
    $('#js-vityl-video-cta-popup-wrapper iframe').attr('src', '')
    enableBodyScroll(document.querySelector('#js-vityl-video-cta-popup-wrapper'))
    $('#js-vityl-video-cta-popup-wrapper').addClass('hide')
  })
})
