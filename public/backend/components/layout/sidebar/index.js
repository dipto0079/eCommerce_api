/////////////////////////////////////////////////////////////////////////////////////////
// "vb-menu-right" module scripts
; (function ($) {
  'use strict'
  $(function () {
    /////////////////////////////////////////////////////////////////////////////////////////
    // hide non top menu related settings
    if ($('.vb__menuTop').length) {
      $('.hideIfMenuTop').css({
        pointerEvents: 'none',
        opacity: 0.4,
      })
    }

    /////////////////////////////////////////////////////////////////////////////////////////
    // toggle
    $('.vb__sidebar__actionToggle').on('click', function () {
      $('body').toggleClass('vb__sidebar--toggled')
    })

    /////////////////////////////////////////////////////////////////////////////////////////
    // toggle theme
    $('.vb__sidebar__actionToggleTheme').on('click', function () {
      var theme = document.querySelector('html').getAttribute('data-vb-theme')
      if (theme === 'dark') {
        document.querySelector('html').setAttribute('data-vb-theme', 'default')
        $('body').removeClass(
          'vb__dark vb__menuLeft--gray vb__menuTop--gray vb__menuLeft--dark vb__menuTop--dark',
        )
      }
      if (theme === 'default') {
        document.querySelector('html').setAttribute('data-vb-theme', 'dark')
        $('body').removeClass(
          'vb__menuLeft--gray vb__menuTop--gray vb__menuLeft--dark vb__menuTop--dark',
        )
        $('body').addClass('vb__menuLeft--dark vb__menuTop--dark')
      }
    })

    /////////////////////////////////////////////////////////////////////////////////////////
    // app name
    function updateName(name) {
      window.localStorage.setItem('appName', name)
      var el = $('.vb__menuLeft').length
        ? $('.vb__menuLeft__logo__name')
        : $('.vb__menuTop__logo__name')
      var descr = $('.vb__menuLeft').length
        ? $('.vb__menuLeft__logo__descr')
        : $('.vb__menuTop__logo__descr')
      el.html(name)
    }
    $('#appName').on('keyup', function (e) {
      var value = e.target.value
      updateName(value)
    })
    var appName = window.localStorage.getItem('appName')
    if (appName) {
      updateName(appName)
      $('#appName').val(appName)
    }

    /////////////////////////////////////////////////////////////////////////////////////////
    // set primary color
    function setPrimaryColor(color) {
      function setColor(_color) {
        window.localStorage.setItem('kit.primary', _color)
        var tag = '<style />'
        var css = `:root { --vb-color-primary: ${_color};}`
        $(tag)
          .attr('id', 'primaryColor')
          .text(css)
          .prependTo('body')
      }
      var style = $('#primaryColor')
      style ? (style.remove(), setColor(color)) : setColor(color)
    }
    var color = window.localStorage.getItem('kit.primary')
    if (color) {
      $('#colorPicker').val(color)
      setPrimaryColor(color)
      $('#resetColor')
        .parent()
        .removeClass('reset')
    }
    $('#colorPicker').on('change', function () {
      var value = $(this).val()
      setPrimaryColor(value)
      $('#resetColor')
        .parent()
        .removeClass('reset')
    })
    $('#resetColor').on('click', function () {
      window.localStorage.removeItem('kit.primary')
      $('#primaryColor').remove()
      $('#resetColor')
        .parent()
        .addClass('reset')
    })

    /////////////////////////////////////////////////////////////////////////////////////////
    // switch
    $('.vb__sidebar__switch input').on('change', function () {
      var el = $(this)
      var checked = el.is(':checked')
      var to = el.attr('to')
      var setting = el.attr('setting')
      if (checked) {
        $(to).addClass(setting)
      } else {
        $(to).removeClass(setting)
      }
    })

    $('.vb__sidebar__switch input').each(function () {
      var el = $(this)
      var to = el.attr('to')
      var setting = el.attr('setting')
      if ($(to).hasClass(setting)) {
        el.attr('checked', true)
      }
    })

    /////////////////////////////////////////////////////////////////////////////////////////
    // colors
    $('.vb__sidebar__select__item').on('click', function () {
      var el = $(this)
      var parent = el.parent()
      var to = parent.attr('to')
      var setting = el.attr('setting')
      var items = parent.find('> div')
      var classList = ''
      items.each(function () {
        var setting = $(this).attr('setting')
        if (setting) {
          classList = classList + ' ' + setting
        }
      })
      items.removeClass('vb__sidebar__select__item--active')
      el.addClass('vb__sidebar__select__item--active')
      $(to).removeClass(classList)
      $(to).addClass(setting)
    })

    $('.vb__sidebar__select__item').each(function () {
      var el = $(this)
      var parent = el.parent()
      var to = parent.attr('to')
      var setting = el.attr('setting')
      var items = parent.find('> div')
      if ($(to).hasClass(setting)) {
        items.removeClass('vb__sidebar__select__item--active')
        el.addClass('vb__sidebar__select__item--active')
      }
    })

    /////////////////////////////////////////////////////////////////////////////////////////
    // type
    $('.vb__sidebar__type__items input').on('change', function () {
      var el = $(this)
      var checked = el.is(':checked')
      var to = el.attr('to')
      var setting = el.attr('setting')
      $('body').removeClass('vb__menu--compact vb__menu--flyout vb__menu--nomenu')
      if (checked) {
        $(to).addClass(setting)
      } else {
        $(to).removeClass(setting)
      }
    })

    $('.vb__sidebar__type__items input').each(function () {
      var el = $(this)
      var to = el.attr('to')
      var setting = el.attr('setting')
      if ($(to).hasClass(setting)) {
        el.attr('checked', true)
      }
    })
  })
})(jQuery)
