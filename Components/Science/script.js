import Lottie from 'lottie-web'
import $ from 'jquery'

$(function () {
  if ($('#vityl-science__lottie').length > 0) {
    Lottie.loadAnimation({
      container: document.getElementById('vityl-science__lottie'),
      path: window.FlyntData.templateDirectoryUri + '/Components/Science/Assets/happy-team-v2.json',
      renderer: 'svg',
      loop: true,
      autoplay: true
    })
  }
})
