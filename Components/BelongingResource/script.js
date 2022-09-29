import $ from 'jquery'

$(function () {
  $('#js-vityl-belonging-resource__btn').on('click', function () {
    $('#js-vityl-resource-loader').removeClass('hide')

    $.ajax({
      type: 'post',
      dataType: 'json',
      url: window.FlyntData.ajaxurl,
      data: {
        action: 'get_featured_resources'
      },
      success: function (response) {
        $('#js-vityl-resource-loader').addClass('hide')
        $('.vityl-belonging-resource__link').addClass('hide')
        $('#js-vityl-belonging-resource__row').html(response.resources_html)
      }
    })
  })
})
