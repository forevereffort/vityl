import $ from 'jquery'
import { disableBodyScroll } from 'body-scroll-lock'

$(function () {
  $('.vityl-price-hero__plan-col').on('mouseenter', function () {
    $('.vityl-price-hero__plan-col').removeClass('vityl-price-hero__plan-col--active')
    $(this).addClass('vityl-price-hero__plan-col--active')
  })

  $('.vityl-price-hero__join-btn').on('click', function () {
    disableBodyScroll(document.querySelector('#js-vityl-waitlist-popup-wrapper'))
    $('#js-vityl-waitlist-popup-wrapper').removeClass('hide')
  })
})
