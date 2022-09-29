import Lottie from 'lottie-web'
import $ from 'jquery'

$(function () {
  if ($('#vityl-our-story-hero__circle--middle').length > 0) {
    Lottie.loadAnimation({
      container: document.getElementById('vityl-our-story-hero__circle--middle'),
      path: window.FlyntData.templateDirectoryUri + '/Components/OurStoryHero/Assets/let-s-meet.json',
      renderer: 'svg',
      loop: true,
      autoplay: true
    })
  }
})
