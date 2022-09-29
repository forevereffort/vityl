import Lottie from 'lottie-web'
import $ from 'jquery'

$(function () {
  if ($('#homepage-hero__circle--middle').length > 0) {
    Lottie.loadAnimation({
      container: document.getElementById('homepage-hero__circle--middle'),
      path: window.FlyntData.templateDirectoryUri + '/Components/HomepageHero/Assets/two-halves.json',
      renderer: 'svg',
      loop: true,
      autoplay: true
    })
  }

  $('.homepage-hero__next-btn').on('click', function () {
    $('html, body').animate({
      scrollTop: $(this).parent().next().offset().top
    }, 1000)
  })
})
