// import Lottie from 'lottie-web'
import $ from 'jquery'

$(function () {
  $('.vityl-work__tab-name-col').on('click', function () {
    const index = $(this).attr('data-index')

    $('.vityl-work__tab-name-col').removeClass('active')
    $(this).addClass('active')

    $('.vityl-work__tab-content').removeClass('active')
    $('.vityl-work__tab-content[data-index=' + index + ']').addClass('active')

    $('.vityl-work__tab-video').removeClass('active')
    $('.vityl-work__tab-video[data-index=' + index + ']').addClass('active')
  })

  function vitylWorkTriggerTab (direction) {
    let index = $('.vityl-work__tab-name-col.active').attr('data-index')

    if (direction === 'prev') {
      index--
    } else if (direction === 'next') {
      index++
    }

    if (index > 2) index = 0
    if (index < 0) index = 2

    $('.vityl-work__tab-name-col[data-index=' + index + ']').trigger('click')
  }

  $('.vityl-work__tab-right-nav-btn--prev').on('click', function () {
    vitylWorkTriggerTab('prev')
  })

  $('.vityl-work__tab-right-nav-btn--next').on('click', function () {
    vitylWorkTriggerTab('next')
  })

  // if ($('#vityl-work__tab-video-0').length > 0) {
  //   Lottie.loadAnimation({
  //     container: document.getElementById('vityl-work__tab-video-0'),
  //     path: window.FlyntData.templateDirectoryUri + '/Components/Work/Assets/surveys.json',
  //     renderer: 'svg',
  //     loop: true,
  //     autoplay: true
  //   })
  // }

  // if ($('#vityl-work__tab-video-1').length > 0) {
  //   Lottie.loadAnimation({
  //     container: document.getElementById('vityl-work__tab-video-1'),
  //     path: window.FlyntData.templateDirectoryUri + '/Components/Work/Assets/goals.json',
  //     renderer: 'svg',
  //     loop: true,
  //     autoplay: true
  //   })
  // }

  // if ($('#vityl-work__tab-video-2').length > 0) {
  //   Lottie.loadAnimation({
  //     container: document.getElementById('vityl-work__tab-video-2'),
  //     path: window.FlyntData.templateDirectoryUri + '/Components/Work/Assets/nudges.json',
  //     renderer: 'svg',
  //     loop: true,
  //     autoplay: true
  //   })
  // }
})
