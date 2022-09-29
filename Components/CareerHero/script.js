import Lottie from 'lottie-web'
import $ from 'jquery'

$(function () {
  if ($('#vityl-belong-hero__circle--middle').length > 0) {
    Lottie.loadAnimation({
      container: document.getElementById('vityl-belong-hero__circle--middle'),
      path: window.FlyntData.templateDirectoryUri + '/Components/BelongingHero/Assets/happy-team-v2.json',
      renderer: 'svg',
      loop: true,
      autoplay: true
    })
  }

  $('.vityl-career-hero__next-btn').on('click', function () {
    $('html, body').animate({
      scrollTop: $(this).parent().next().offset().top
    }, 1000)
  })
})
