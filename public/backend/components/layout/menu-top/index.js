/////////////////////////////////////////////////////////////////////////////////////////
// "vb-menu-right" module scripts

; (function ($) {
  'use strict'
  $(function () {
    if ($('body').find('.vb__menuTop').length < 1) {
      return
    }

    /////////////////////////////////////////////////////////////////////////////////////////
    // set active menu item on load

    var url = window.location.href
    var page = url.substr(url.lastIndexOf('/') + 1)
    var currentItem = $('.vb__menuTop').find('a[href="' + page + '"]')

    console.log(page)
    currentItem
      .addClass('vb__menuTop__item--active')
      .parents('.vb__menuTop__submenu')
      .addClass('vb__menuTop__submenu--toggled')
      .find('> .vb__menuTop__navigation')
      .show()

    /////////////////////////////////////////////////////////////////////////////////////////
    // mobile toggle

    $('.vb__menuTop__backdrop, .vb__menuTop__mobileTrigger').on('click', function () {
      $('body').toggleClass('vb__menuTop--mobileToggled')
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
          $('body').toggleClass('vb__menuTop--mobileToggled')
          touchStartLocked = true
        }
      },
      { passive: false },
    )

    $('.vb__menuTop__submenu > .vb__menuTop__item__link').on('click', function () {
      if ($(window).innerWidth() < 768) {
        var el = $(this).closest('.vb__menuTop__submenu'),
          opened = $('.vb__menuTop__submenu--toggled')

        if (
          !el.hasClass('vb__menuTop__submenu--toggled') &&
          !el.parent().closest('.vb__menuTop__submenu').length
        )
          opened
            .removeClass('vb__menuTop__submenu--toggled')
            .find('> .vb__menuTop__navigation')
            .slideUp(200)

        el.toggleClass('vb__menuTop__submenu--toggled')
        var item = el.find('> .vb__menuTop__navigation')
        if (item.is(':visible')) {
          item.slideUp(200)
        } else {
          item.slideDown(200)
        }
      }
    })

    // /////////////////////////////////////////////////////////////////////////////////////////
    // // set active menu item
    // var url = window.location.href
    // var page = url.substr(url.lastIndexOf('/') + 1)
    // var currentItem = $('.vb-menu-top-list-root').find('a[href="' + page + '"]')
    // currentItem.parent().toggleClass('vb-menu-top-item-active')
    // /////////////////////////////////////////////////////////////////////////////////////////
    // // add backdrop
    // $('.vb-menu-top').after('<div class="vb-menu-top-backdrop"><!-- --></div>')
    // /////////////////////////////////////////////////////////////////////////////////////////
    // // menu logic
    // $('.vb-menu-top-trigger-action').on('click', function() {
    //   $('body').toggleClass('vb-menu-top-toggled')
    // })
    // var isTabletView = false
    // function toggleMenu() {
    //   if (!isTabletView) {
    //     $('body').addClass('vb-menu-top-toggled')
    //   }
    // }
    // if ($(window).innerWidth() <= 992) {
    //   toggleMenu()
    //   isTabletView = true
    // }
    // $(window).on('resize', function() {
    //   if ($(window).innerWidth() <= 992) {
    //     toggleMenu()
    //     isTabletView = true
    //   } else {
    //     isTabletView = false
    //   }
    // })
    // $('.vb-menu-top-handler, .vb-menu-top-backdrop').on('click', function() {
    //   $('body').toggleClass('vb-menu-top-toggled-mobile')
    // })
    // /////////////////////////////////////////////////////////////////////////////////////////
    // // submenu
    // $('.vb-menu-top-submenu > a').on('click', function() {
    //   if ($('body').find('.vb-menu-top').length && $(window).innerWidth() < 768) {
    //     var parent = $(this).parent(),
    //       opened = $('.vb-menu-top-submenu-toggled')
    //     if (
    //       !parent.hasClass('vb-menu-top-submenu-toggled') &&
    //       !parent.parent().closest('.vb-menu-top-submenu').length
    //     )
    //       opened
    //         .removeClass('vb-menu-top-submenu-toggled')
    //         .find('> .vb-menu-top-list')
    //         .slideUp(200)
    //     parent.toggleClass('vb-menu-top-submenu-toggled')
    //     var item = parent.find('> .vb-menu-top-list')
    //     if (item.is(':visible')) {
    //       item.slideUp(200)
    //     } else {
    //       item.slideDown(200)
    //     }
    //   }
    // })
  })
})(jQuery)
