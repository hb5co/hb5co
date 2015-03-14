/**
 * @file
 * JS for Radix.
 */
(function ($, Drupal, window, document, undefined) {
  $(document).ready(function() {
    var navbar = $('.front nav.navbar-default');
    // Assign .navbar-large to nav on front page if
    // current scroll is less than 150px.
    if( $(window).scrollTop() < 150 ) {
      navbar.addClass( 'navbar-large' );
    }

    // Wrap the body contents in .site-content and add a new div for menu.
    $('body').append('<div class="off-canvas"></div>');

    // Clone main menu and use as off canvas menu.
    $('ul#main-menu').clone().appendTo('.off-canvas').removeAttr('id').attr('id', 'off-canvas-menu');

    var siteContent = $('.site-content');
    var offCanvas = $('.off-canvas');
    iconBar1 = $('.navbar-default .navbar-toggle .icon-bar').get(0);
    iconBar2 = $('.navbar-default .navbar-toggle .icon-bar').get(1);
    iconBar3 = $('.navbar-default .navbar-toggle .icon-bar').get(2);
    toggleMenu = $('.navbar-default .navbar-toggle');

    toggleMenu.click( function(e) {
      if ( $('body').hasClass('off-canvas-open')) {
        e.preventDefault();
        $('body').removeClass('off-canvas-open');
        
        siteContent.velocity({
          'translateX':'0px'
        }, 'easeInSine');

        offCanvas.velocity({
          'translateX':'0px'
        }, 'easeInSine');

        // Animating mobile menu icon.
        $(iconBar1).velocity('reverse');
        $(iconBar2).velocity('reverse');
        $(iconBar3).velocity('fadeIn', { display: 'block', delay: '250'});
        toggleMenu.velocity('reverse');

        
      } else {
        e.preventDefault();
        $('body').addClass('off-canvas-open');

        siteContent.velocity({
          'translateX':'-280px'
        }, 'easeInSine');

        offCanvas.velocity({
          'translateX':'-280px'
        }, 'easeInSine');        

        // Animating mobile menu icon.
        $(iconBar1).velocity({ 'rotateZ':'405deg' });
        $(iconBar2).velocity({ 'rotateZ':'-405deg', 'translateY':'-4px', 'translateX':'4px;' });
        $(iconBar3).velocity( 'fadeOut' );
        toggleMenu.velocity({ 'translateY': '4px'});
      }
    });
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
