/*
 * jQuery Ajax Sortable Plugin for creating sortable lists that saves the new order
 * Copyright (c) 2007-2000 Marmalade on Toast
 * Version: 0.22 (06/02/2009)
 * Dual licensed under the MIT and GPL licenses:
 * http://www.opensource.org/licenses/mit-license.php
 * http://www.gnu.org/licenses/gpl.html
 * Requires: jQuery v1.1.3.1 or later
 *
 */

(function($){
$.fn.ajaxSortable = function(options) {
  // define defaults and override with options, if available
  // by extending the default settings, we don't modify the argument
  // do the rest of the plugin, using url and settings
  
  
	  	var element = this;

		var options = jQuery.extend( {
		    accept: 'li', // background color for even rows
		    helperClass: 'helper', // background color for odd rows
			url: ''
		},options);


	  	$(element).Sortable( {
			accept: options.accept,
			opacity: .8,
			helperclass: options.helperClass,
			onChange: function(serialized) {
				data = {array: serialized[0].hash};
				$.ajax( 
				{
		       		url: options.url,
		       		type:'POST',
		       		data: data,
		       		success: function(result){
		       			options.result(result)
				   }
			    });
			}
		});
	
}
})(jQuery); 

  
 