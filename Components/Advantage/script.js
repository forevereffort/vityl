import Lottie from 'lottie-web'
import $ from 'jquery'

$(function () {
  if ($('#vityl-advantage__icon-1').length > 0) {
    Lottie.loadAnimation({
      container: document.getElementById('vityl-advantage__icon-1'),
      path: window.FlyntData.templateDirectoryUri + '/Components/Advantage/Assets/rooted-icon.json',
      renderer: 'svg',
      loop: true,
      autoplay: true
    })
  }

  if ($('#vityl-advantage__icon-2').length > 0) {
    Lottie.loadAnimation({
      container: document.getElementById('vityl-advantage__icon-2'),
      path: window.FlyntData.templateDirectoryUri + '/Components/Advantage/Assets/light-lift.json',
      renderer: 'svg',
      loop: true,
      autoplay: true
    })
  }

  if ($('#vityl-advantage__icon-3').length > 0) {
    Lottie.loadAnimation({
      container: document.getElementById('vityl-advantage__icon-3'),
      path: window.FlyntData.templateDirectoryUri + '/Components/Advantage/Assets/epic.json',
      renderer: 'svg',
      loop: true,
      autoplay: true
    })
  }

  if ($('#vityl-advantage__icon-1-mobile').length > 0) {
    Lottie.loadAnimation({
      container: document.getElementById('vityl-advantage__icon-1-mobile'),
      path: window.FlyntData.templateDirectoryUri + '/Components/Advantage/Assets/rooted-icon.json',
      renderer: 'svg',
      loop: true,
      autoplay: true
    })
  }

  if ($('#vityl-advantage__icon-2-mobile').length > 0) {
    Lottie.loadAnimation({
      container: document.getElementById('vityl-advantage__icon-2-mobile'),
      path: window.FlyntData.templateDirectoryUri + '/Components/Advantage/Assets/light-lift.json',
      renderer: 'svg',
      loop: true,
      autoplay: true
    })
  }

  if ($('#vityl-advantage__icon-3-mobile').length > 0) {
    Lottie.loadAnimation({
      container: document.getElementById('vityl-advantage__icon-3-mobile'),
      path: window.FlyntData.templateDirectoryUri + '/Components/Advantage/Assets/epic.json',
      renderer: 'svg',
      loop: true,
      autoplay: true
    })
  }
})
