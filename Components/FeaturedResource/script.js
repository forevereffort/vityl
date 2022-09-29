import $ from 'jquery'

$(function () {
  $('#js-vityl-featured-resource__btn').on('click', function () {
    $('#js-vityl-article-loader').removeClass('hide')

    $.ajax({
      type: 'post',
      dataType: 'json',
      url: window.FlyntData.ajaxurl,
      data: {
        action: 'get_featured_articles'
      },
      success: function (response) {
        $('#js-vityl-article-loader').addClass('hide')
        $('.vityl-featured-resource__link').addClass('hide')
        $('#js-vityl-featured-resource__row').html(response.blogs_html)
      }
    })
  })
})
