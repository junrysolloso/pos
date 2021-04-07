(function($){
  'use strict';

  /**
   * Desktop notification
   */
  const desktop_notify = function(text) {
    
    var options = {
      title: "Notification",
      config: {
        body: text,
        icon:  $('#base_url').val() + "bh-uploads/dinagat-coders-icon.png",
        lang: 'en-US',
        onClose: "",
        onClick: openURL,
        onError: ""
      }
    };
    
    if (Notification.permission === "granted") {

      var notification = new Notification(options.title, options.config);

      notification.onclose = function() {
        if (typeof options.config.onClose === 'function') {
          options.config.onClose();
        }
      };

      notification.onclick = function() {
        if (typeof options.config.onClick === 'function') {
          options.config.onClick();
        }
      };

      notification.onerror = function() {
        if (typeof options.config.onError === 'function') {
          options.config.onError();
        }
      };

    } else if (Notification.permission !== 'denied') {
      Notification.requestPermission(function(permission) {
        if (permission === "granted") {
          notify.init();
        }
      });
    }
  }

})(jQuery);