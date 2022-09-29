import $ from 'jquery'

import Swiper, { Navigation, A11y, Autoplay, EffectFade } from 'swiper/swiper.esm'
import 'swiper/swiper-bundle.css'

Swiper.use([Navigation, A11y, Autoplay, EffectFade])

class VitylPlatformList extends window.HTMLDivElement {
  constructor (...args) {
    const self = super(...args)
    self.init()
    return self
  }

  init () {
    this.$ = $(this)
    this.resolveElements()
  }

  resolveElements () {
    this.$slider = $('.swiper-container', this)
    this.$buttonPrev = $('.vityl-platform-slider__btn--prev', this)
    this.$buttonNext = $('.vityl-platform-slider__btn--next', this)
  }

  connectedCallback () {
    this.initSlider()
    this.initTab()
  }

  initSlider () {
    const config = {
      slidesPerView: 1,
      spaceBetween: 0,
      effect: 'fade',
      // autoplay: {
      //   delay: 300,
      // },
      loop: true,
      navigation: {
        prevEl: this.$buttonPrev.get(0),
        nextEl: this.$buttonNext.get(0)
      }
    }

    this.slider = new Swiper(this.$slider.get(0), config)

    const that = this

    this.slider.on('slideChange', function (elem) {
      $('.vityl-platform__list-text-item', that).removeClass('active')
      $('.vityl-platform__list-text-item[data-index=' + (elem.realIndex + 1) + ']', that).addClass('active')
    })
  }

  initTab () {
    const that = this

    $('.vityl-platform__list-text-item', that).on('click', function () {
      if (!$(this).hasClass('active')) {
        const itemIndex = $(this).attr('data-index')

        $('.vityl-platform__list-text-item', that).removeClass('active')
        $(this).addClass('active')

        that.slider.slideTo(itemIndex)
      }
    })
  }
}

window.customElements.define('vityl-platform-list', VitylPlatformList, { extends: 'div' })
