/////////////////////////////////////////////////////////////////////////////////////////
// "core" module scripts

;(function($) {
  'use strict'
  $(function() {
    /////////////////////////////////////////////////////////////////////////////////////////
    // custom scroll

    if ($('.vb__customScroll').length) {
      if (!/Mobi/.test(navigator.userAgent) && jQuery().perfectScrollbar) {
        $('.vb__customScroll').perfectScrollbar({
          theme: 'kit',
        })
      }
    }

    /////////////////////////////////////////////////////////////////////////////////////////
    // tooltips & popovers
    $('[data-toggle=tooltip]').tooltip()
    $('[data-toggle=popover]').popover()
  })
})(jQuery)
