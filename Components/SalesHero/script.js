import $ from 'jquery'
import { disableBodyScroll, enableBodyScroll } from 'body-scroll-lock'

$(function () {
  $('#js-vityl-sales-hero-popup-wrapper iframe').on('load', function () {
    $('#js-vityl-sales-hero-popup-wrapper .vityl-video-loader').addClass('hide')
  })

  $('.vityl-sales-hero__video-btn').on('click', function () {
    const $videoIframe = $('#js-vityl-sales-hero-popup-wrapper iframe')
    $('#js-vityl-sales-hero-popup-wrapper .vityl-video-loader').removeClass('hide')
    disableBodyScroll(document.querySelector('#js-vityl-sales-hero-popup-wrapper'))
    $('#js-vityl-sales-hero-popup-wrapper').removeClass('hide')
    $videoIframe.attr('src', $videoIframe.attr('data-src'))
  })

  $('#js-vityl-sales-hero-popup__close-btn').on('click', function () {
    $('#js-vityl-sales-hero-popup-wrapper iframe').attr('src', '')
    enableBodyScroll(document.querySelector('#js-vityl-sales-hero-popup-wrapper'))
    $('#js-vityl-sales-hero-popup-wrapper').addClass('hide')
  })

  $('#js-vityl-sales-hero-popup-wrapper').on('click', function () {
    $('#js-vityl-sales-hero-popup-wrapper iframe').attr('src', '')
    enableBodyScroll(document.querySelector('#js-vityl-sales-hero-popup-wrapper'))
    $('#js-vityl-sales-hero-popup-wrapper').addClass('hide')
  })
})
