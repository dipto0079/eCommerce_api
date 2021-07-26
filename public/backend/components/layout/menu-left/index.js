/////////////////////////////////////////////////////////////////////////////////////////
// "vb-menu-right" module scripts

; (function ($) {
  'use strict'
  $(function () {
    if ($('body').find('.vb__menuLeft').length < 1) {
      return
    }

    /////////////////////////////////////////////////////////////////////////////////////////
    // set active menu item on load

    var url = window.location.href
    var page = url.substr(url.lastIndexOf('/') + 1)
    var currentItem = $('.vb__menuLeft').find('a[href="' + page + '"]')

    currentItem
      .addClass('vb__menuLeft__item--active')
      .closest('.vb__menuLeft__submenu')
      .addClass('vb__menuLeft__submenu--toggled')
      .find('> .vb__menuLeft__navigation')
      .show()

      /////////////////////////////////////////////////////////////////////////////////////////
      // toggle on resize
      ; (function () {
        var isTabletView = false
        function toggleMenu() {
          if (!isTabletView) {
            $('body').addClass('vb__menuLeft--toggled')
          }
        }
        if ($(window).innerWidth() <= 992) {
          toggleMenu()
          isTabletView = true
        }
        $(window).on('resize', function () {
          if ($(window).innerWidth() <= 992) {
            toggleMenu()
            isTabletView = true
          } else {
            isTabletView = false
          }
        })
      })()

    /////////////////////////////////////////////////////////////////////////////////////////
    // toggle

    $('.vb__menuLeft__trigger').on('click', function () {
      $('body').toggleClass('vb__menuLeft--toggled')
    })

    /////////////////////////////////////////////////////////////////////////////////////////
    // mobile toggle

    $('.vb__menuLeft__backdrop, .vb__menuLeft__mobileTrigger').on('click', function () {
      $('body').toggleClass('vb__menuLeft--mobileToggled')
    })

    /////////////////////////////////////////////////////////////////////////////////////////
    // mobile toggle slide

    var touchStartPrev = 0
    var touchStartLocked = false

    const unify = e => {
      return e.changedTouches ? e.changedTouches[0] : e
    }
    document.addEventListener(
      'touchstart',
      e => {
        const x = unify(e).clientX
        touchStartPrev = x
        touchStartLocked = x > 70
      },
      { passive: false },
    )
    document.addEventListener(
      'touchmove',
      e => {
        const x = unify(e).clientX
        const prev = touchStartPrev
        if (x - prev > 50 && !touchStartLocked) {
          $('body').toggleClass('vb__menuLeft--mobileToggled')
          touchStartLocked = true
        }
      },
      { passive: false },
    )

    /////////////////////////////////////////////////////////////////////////////////////////
    // submenu

    $('.vb__menuLeft__submenu > .vb__menuLeft__item__link').on('click', function () {
      var el = $(this).closest('.vb__menuLeft__submenu'),
        opened = $('.vb__menuLeft__submenu--toggled')

      if (
        !el.hasClass('vb__menuLeft__submenu--toggled') &&
        !el.parent().closest('.vb__menuLeft__submenu').length
      )
        opened
          .removeClass('vb__menuLeft__submenu--toggled')
          .find('> .vb__menuLeft__navigation')
          .slideUp(200)

      el.toggleClass('vb__menuLeft__submenu--toggled')
      var item = el.find('> .vb__menuLeft__navigation')
      if (item.is(':visible')) {
        item.slideUp(200)
      } else {
        item.slideDown(200)
      }
    })
  })
})(jQuery)
