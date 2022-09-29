import $ from 'jquery'

$(function () {
  $('.site-footer__bottom-up-button').on('click', function () {
    $('html, body').animate({
      scrollTop: 0
    }, 1000)
  })
})
