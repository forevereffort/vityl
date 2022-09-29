import $ from 'jquery'

$(function () {
  $('.vityl-platform-hero__next-btn').on('click', function () {
    $('html, body').animate({
      scrollTop: $(this).parent().next().offset().top
    }, 1000)
  })
})
