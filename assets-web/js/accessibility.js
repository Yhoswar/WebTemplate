/*accesibilidad menu desplegable*/


(function() {

	$( '.AccessibilityLinkFirstLevelWithMenu' ).focus(function() {
	  $(".AccessibilityDropDownMenu").attr('aria-expanded', false);
	  $( this ).next( ".AccessibilityDropDownMenu" ).attr('aria-expanded', true);
	});

	$( '.AccessibilityLinkFirstLevelWithMenu' ).parent().find("li").last().children("a").focusout(function() {
	  $(".AccessibilityDropDownMenu").attr('aria-expanded', false);
	});

  	$( '.AccessibilityLinkFirstLevelWithoutMenu' ).focus(function() {
	  $(".AccessibilityDropDownMenu").attr('aria-expanded', false);
	});
  	
  	$(document).on('keydown', function(event) {
        if (event.key == "Escape") {
        	
        	if ($(".AccessibilityLinkFirstLevelWithMenu").is(":focus")) {
        		$( ".AccessibilityDropDownMenu" ).attr('aria-expanded', false);
        	}
        	
        	if ($(".AccessibilityDropDownMenu li a").is(":focus"))  {
        		$( ".AccessibilityDropDownMenu" ).attr('aria-expanded', false);
        	}        	
        }
    });

})();
