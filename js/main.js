// All custom JS for the October Morning theme
// jQuery is in noconflict mode!
jQuery( document ).ready( function( $ ){
	//console.log('main.js loaded');
	//when the page scrolls, do stuff
	$( window ).scroll( function(){
		//make the header drift up and fade out
		var scrollAmount = $( window ).scrollTop();
		

		$( '.header .wrapper' ).css({
			'opacity' : 1 - ( scrollAmount/200 ),
			//'transform' : 'rotate(' + scrollAmount + 'deg)'
			//transform: rotate(180deg);
			'position' : 'relative',
			'bottom' : scrollAmount / 2
		});

		$( '.header' ).css({
			'background-position-y': - scrollAmount / 4
		});
	} );

	//Smooth Scrolling
	// Select all links with hashes
	$('a[href*="#"]')
  // Remove links that don't actually link to anything
  .not('[href="#"]')
  .not('[href="#0"]')
  .click(function(event) {

    // On-page links
    if (
    	location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') 
    	&& 
    	location.hostname == this.hostname
    	) {
      // Figure out element to scroll to
  var target = $(this.hash);

  target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
      // Does a scroll target exist?
      if (target.length) {
        // Only prevent default if animation is actually gonna happen
        event.preventDefault();

        $('html, body').animate({
        	scrollTop: target.offset().top
        }, 1000, function() {

          // Callback after animation
          // Must change focus!
          var $target = $(target);

          $target.focus();
          if ($target.is(":focus")) { // Checking if the target was focused
          	return false;
          } else {
            $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
            $target.focus(); // Set focus again
        };
    });
    }
}
});
} );