(function ($) {
  //console.log(drupalSettings.sinceago);
      //$.extend($.timeago.settings, drupalSettings.sinceago);
      //$('abbr.timeago, span.timeago, time.timeago, span.field--type-created').timeago();
      //timeago().render($('span.field--type-created'));
      //$('span.field--type-created').css('border', '1px solid red');
  Drupal.behaviors.timeago = {
    attach: function (context) {
	  $.extend($.timeago.settings, drupalSettings.sinceago);	 
	  //$('abbr.timeago, span.timeago, time.timeago, span.field--type-created').timeago();	            
      // $('span.field--type-created').timeago();
      // timeago().render($('span.field--type-created'));
      // $('span.field--type-created').css('border', '1px solid red');
    }
  };
})(jQuery);
