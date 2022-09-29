import Lottie from 'lottie-web'
import $ from 'jquery'

$(function () {
  if ($('#vityl-cases__icon-2').length > 0) {
    Lottie.loadAnimation({
      container: document.getElementById('vityl-cases__icon-2'),
      path: window.FlyntData.templateDirectoryUri + '/Components/Cases/Assets/network.json',
      renderer: 'svg',
      loop: true,
      autoplay: true
    })
  }

  if ($('#vityl-cases__icon-3').length > 0) {
    Lottie.loadAnimation({
      container: document.getElementById('vityl-cases__icon-3'),
      path: window.FlyntData.templateDirectoryUri + '/Components/Cases/Assets/immerse.json',
      renderer: 'svg',
      loop: true,
      autoplay: true
    })
  }

  if ($('#vityl-cases__icon-2-mobile').length > 0) {
    Lottie.loadAnimation({
      container: document.getElementById('vityl-cases__icon-2-mobile'),
      path: window.FlyntData.templateDirectoryUri + '/Components/Cases/Assets/network.json',
      renderer: 'svg',
      loop: true,
      autoplay: true
    })
  }

  if ($('#vityl-cases__icon-3-mobile').length > 0) {
    Lottie.loadAnimation({
      container: document.getElementById('vityl-cases__icon-3-mobile'),
      path: window.FlyntData.templateDirectoryUri + '/Components/Cases/Assets/immerse.json',
      renderer: 'svg',
      loop: true,
      autoplay: true
    })
  }
})
