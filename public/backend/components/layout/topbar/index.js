/////////////////////////////////////////////////////////////////////////////////////////
// "vb-topbar" module scripts

; (function ($) {
  'use strict'
  $(function () {
    $('.vb__topbar__actionsDropdown .dropdown-menu').on('click', function () {
      $('.vb__topbar__actionsDropdown').on('hide.bs.dropdown', function (event) {
        event.preventDefault() // stop hiding dropdown on click

        $('.vb__topbar__actionsDropdown .nav-link').on('shown.bs.tab', function (e) {
          $('.vb__topbar__actionsDropdown .dropdown-toggle').dropdown('update')
        })
      })
    })

    $(document, '.vb__topbar__actionsDropdown .dropdown-toggle').mouseup(function (e) {
      var dropdown = $('.vb__topbar__actionsDropdown')
      var dropdownMenu = $('.vb__topbar__actionsDropdownMenu')

      if (
        !dropdownMenu.is(e.target) &&
        dropdownMenu.has(e.target).length === 0 &&
        dropdown.hasClass('show')
      ) {
        dropdown.removeClass('show')
        dropdownMenu.removeClass('show')
      }
    })

    ///////////////////////////////////////////////////////////
    // livesearch scripts

    var livesearch = $('.vb__topbar__livesearch')
    var close = $('.vb__topbar__livesearch__close')
    var visibleClass = 'vb__topbar__livesearch__visible'
    var input = $('#livesearch__input')
    var inputInner = $('#livesearch__input__inner')

    function setHidden() {
      livesearch.removeClass(visibleClass)
    }
    function handleKeyDown(e) {
      const key = event.keyCode.toString()
      if (key === '27') {
        setHidden()
      }
    }
    input.on('focus', function () {
      livesearch.addClass(visibleClass)
      setTimeout(function () {
        inputInner.focus()
      }, 200)
    })
    close.on('click', setHidden)
    document.addEventListener('keydown', handleKeyDown, false)
  })
})(jQuery)
