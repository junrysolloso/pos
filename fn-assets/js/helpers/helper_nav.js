(function($){
  'use strict';

  $(function() {
    
    // Set nav menu active when in the specified page
    if ($('.sidebar').length) {
      
      // Add active to selected nav link
      var navItem = document.getElementsByClassName('nav-item'), i;
      var urlKey = $(location).attr('href').split("/").splice(0, 5);
      
      for (i = 1; i < navItem.length; i++) {
        navItem[i].getAttribute('id') == urlKey[4] ? navItem[i].classList.add('active') : false;
      }

      $('#sidebar >.nav > li:not(.not-navigation-link) a').each(function () {
        if (! $('#sidebar').hasClass("dynamic-active-class-disabled")) {
          var http = $(location).attr('href').split('http:');
          if ( $(this).attr('href') == http[1] ) {
  
            $(this).parents('.nav-item').last().addClass('active');
            if ($(this).parents('.sub-menu').length) {
              $(this).addClass('active');
            }
           
            $(this).parents('.nav-item').last().find(".nav-link").attr("aria-expanded", "true");
            if ($(this).parents('.sub-menu').length) {
              $(this).closest('.collapse').addClass('show');
            }
          }
        }
      });
    }
  });

  $(function() {
    $('[data-toggle="offcanvas"]').on("click", function() {
      $('.sidebar-offcanvas').toggleClass('active')
    });
  });

  //Open submenu on hover in compact sidebar mode and horizontal menu mode
  $(document).on('mouseenter mouseleave', '.sidebar .nav-item', function (ev) {
    var body = $('body');
    var sidebarIconOnly = body.hasClass("sidebar-icon-only");
    var horizontalMenu = body.hasClass("horizontal-menu");
    var sidebarFixed = body.hasClass("sidebar-fixed");
    var $menuItem = $(this);
    if (!('ontouchstart' in document.documentElement)) {
      if (sidebarIconOnly || horizontalMenu) {
        if (sidebarFixed) {
          if (ev.type === 'mouseenter') {
            body.removeClass('sidebar-icon-only');
          }
        } else {
          if (ev.type === 'mouseenter') {
            $menuItem.addClass('hover-open')
          } else {
            $menuItem.removeClass('hover-open')
          }
        }
      }
    } else {
      if (sidebarIconOnly || horizontalMenu) {
        if (ev.type === 'mouseenter') {
          $menuItem.addClass('hover-open')
        } else {
          $menuItem.removeClass('hover-open')
        }
      }
    }
  });

  // Horizontal menu toggle fuction for mobile
  $(".navbar.horizontal-layout .navbar-menu-wrapper .navbar-toggler").on("click", function () {
    $(".navbar.horizontal-layout").toggleClass("header-toggled");
  });

  $(function () {
    var body = $('body');
    
    //Close other submenu in sidebar on opening any
    $("#sidebar > .nav > .nav-item > a[data-toggle='collapse']").on("click", function () {
      $("#sidebar > .nav > .nav-item").find('.collapse.show').collapse('hide');
    });

    //Change sidebar and content-wrapper height
    applyStyles();

    function applyStyles() {
      //Applying perfect scrollbar
      if (!body.hasClass("rtl")) {
        if ($('.settings-panel .tab-content .tab-pane.scroll-wrapper').length) {
          const settingsPanelScroll = new PerfectScrollbar('.settings-panel .tab-content .tab-pane.scroll-wrapper');
        }
        if ($('.chats').length) {
          const chatsScroll = new PerfectScrollbar('.chats');
        }
        if ($('.scroll-container').length) {
          const ScrollContainer = new PerfectScrollbar('.scroll-container');
        }
        if (body.hasClass("sidebar-fixed")) {
          var fixedSidebarScroll = new PerfectScrollbar('#sidebar .nav');
        }
        if ($('.ps-enabled').length) {
          const psEnabled = new PerfectScrollbar('.ps-enabled');
        }
      }
    }

    $('[data-toggle="minimize"]').on("click", function () {
      if ((body.hasClass('sidebar-toggle-display')) || (body.hasClass('sidebar-absolute'))) {
        body.toggleClass('sidebar-hidden');
      } else {
        body.toggleClass('sidebar-icon-only');
      }
    });

    //checkbox and radios
    $(".form-check label,.form-radio label").append('<i class="input-helper"></i>');
  });

  $('[data-toggle="tooltip"]').tooltip();

  $(".sidebar .sidebar-inner > .nav > .nav-item").not(".brand-logo").attr('toggle-status', 'closed');
  $(".sidebar .sidebar-inner > .nav > .nav-item").on('click', function () {
    $(".sidebar .sidebar-inner > .nav > .nav-item").removeClass("active");
    $(this).addClass("active");
    $(".sidebar .sidebar-inner > .nav > .nav-item").find(".submenu").removeClass("open");
    $(".sidebar .sidebar-inner > .nav > .nav-item").not(this).attr('toggle-status', 'closed');
    var toggleStatus = $(this).attr('toggle-status');
    if (toggleStatus == 'closed') {
      $(this).find(".submenu").addClass("open");
      $(this).attr('toggle-status', 'open');
    } else {
      $(this).find(".submenu").removeClass("open");
      $(this).not(".brand-logo").attr('toggle-status', 'closed');
    }
  });

})(jQuery);