/**
 * @file
 * JS for Radix.
 */
(function ($, Drupal, window, document, undefined) {
  $(document).ready(function() {
    if( $(window).scrollTop() < 150 ) {
      $('.front nav.navbar-default').addClass( 'navbar-large' );
    }
  });

  $(window).scroll(function (event) {
    var scroll = $(window).scrollTop();
    var navbar = $( '.front nav.navbar-default' );

    if( scroll > 150 ) {
      navbar.removeClass( 'navbar-large' );
    } else {
      navbar.addClass( 'navbar-large' );
    }
  });
})(jQuery, Drupal, this, this.document);
