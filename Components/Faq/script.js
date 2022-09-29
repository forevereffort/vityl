import $ from 'jquery'

$(function () {
  $('.vityl-faq__cat-inner').on('click', function () {
    const index = $(this).attr('data-index')

    $('.vityl-faq__cat-inner').removeClass('active')
    $(this).addClass('active')

    if (index === '0') {
      $('.vityl-faq__info-inner').removeClass('hide')
    } else {
      $('.vityl-faq__info-inner').addClass('hide')
      $('.vityl-faq__info-inner[data-index=' + index + ']').removeClass('hide')
    }
  })

  $('.vityl-faq__info-title').on('click', function () {
    if ($(this).hasClass('close')) {
      $(this).removeClass('close')
      $('.vityl-faq__info-content', $(this).parent()).slideDown()
    } else {
      $(this).addClass('close')
      $('.vityl-faq__info-content', $(this).parent()).slideUp()
    }
  })
})
