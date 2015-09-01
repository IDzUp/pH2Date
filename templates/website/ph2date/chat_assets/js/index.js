function createCookie(name,value,days) {
	if (days) {
		var date = new Date();
		date.setTime(date.getTime() + (days * 24 * 60 * 60));
		var expires = "; expires=" + date.toGMTString();
	}
	else {
		var expires = "";
	}
	document.cookie = name+"="+value+expires+"; path=/";
}

function readCookie(name) {
	var nameEQ = name + "=";
	var ca = document.cookie.split(';');
	for(var i=0;i < ca.length;i++) {
		var c = ca[i];
		while (c.charAt(0)===' '){ c = c.substring(1,c.length); }
		if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
	}
	return null;
}

function eraseCookie(name) {
	createCookie(name,"",-1);
}

	var startingSlide = 0;
	// If we find a cookie with the name that we previously saved, use it.
	if(readCookie('ineCurrentSlide')){
		// This overrides the default value of 0 if we find a cookie.
		startingSlide = readCookie('ineCurrentSlide');
	}

	var myDeck = $('.slidedeck').slidedeck({
		speed: 250,
		start: startingSlide, // tell the Deck where to start
		complete: function(deck){
			// Here we will set a cookie for one week.
			// This cookie will store the deck.current value.
			//createCookie(name,value,days)
			createCookie('ineCurrentSlide',deck.current,7)
		}
	});

//$ ( '.slidedeck' ).css ( { width: '914px', height: '300px' } );

$ ( '.learn-more' ).hover ( function() {
	$ ( this ).attr ( 'src', '/assets/img/slidedeck/learn-more-hover.png' );
}, function() {
	$ ( this ).attr ( 'src', '/assets/img/slidedeck/learn-more-std.png' );
} );

$ ( '.rs_slide_steps_list li' ).hover (

		function() {
			if ( !$ ( this ).hasClass ( 'selected-element' ) )
			{
				$ ( this ).removeClass ( 'inactive' );
				$ ( this ).addClass ( 'active' );
			}
			else {
				$ ( this ).addClass ( 'selected-element' );
			}

		},
		function() {
			if ( !$ ( this ).hasClass ( 'selected-element' ) )
			{
				$ ( this ).removeClass ( 'active' );
				$ ( this ).addClass ( 'inactive' );
			}
		}
		);

$ ( '#rs-slide-1' ).click ( function() {
	$ ( '#rs2' ).hide ();
	$ ( '#rs3' ).hide ();
	$ ( '#rs1' ).fadeIn ( 'slow', function() {
		$ ( '.rs_slide_steps_list li' ).removeClass ( 'active' );
		$ ( '.rs_slide_steps_list li' ).removeClass ( 'inactive' );
		$ ( '.rs_slide_steps_list li' ).removeClass ( 'selected-element' );
		$ ( '#rs-slide-1' ).addClass ( 'active' );
		$ ( '#rs-slide-1' ).addClass ( 'selected-element' );
		$ ( '#rs-slide-2' ).addClass ( 'inactive' );
		$ ( '#rs-slide-3' ).addClass ( 'inactive' );
	} );
} );

$ ( '#rs-slide-2' ).click ( function() {
	$ ( '#rs1' ).hide ();
	$ ( '#rs3' ).hide ();
	$ ( '#rs2' ).fadeIn ( 'slow', function() {
		$ ( '.rs_slide_steps_list li' ).removeClass ( 'active' );
		$ ( '.rs_slide_steps_list li' ).removeClass ( 'inactive' );
		$ ( '.rs_slide_steps_list li' ).removeClass ( 'selected-element' );
		$ ( '#rs-slide-2' ).addClass ( 'active' );
		$ ( '#rs-slide-2' ).addClass ( 'selected-element' );
		$ ( '#rs-slide-1' ).addClass ( 'inactive' );
		$ ( '#rs-slide-3' ).addClass ( 'inactive' );
	} );
} );

$ ( '#rs-slide-3' ).click ( function() {
	$ ( '#rs1' ).hide ();
	$ ( '#rs2' ).hide ();
	$ ( '#rs3' ).fadeIn ( 'slow', function() {
		$ ( '.rs_slide_steps_list li' ).removeClass ( 'active' );
		$ ( '.rs_slide_steps_list li' ).removeClass ( 'inactive' );
		$ ( '.rs_slide_steps_list li' ).removeClass ( 'selected-element' );
		$ ( '#rs-slide-3' ).addClass ( 'active' );
		$ ( '#rs-slide-3' ).addClass ( 'selected-element' );
		$ ( '#rs-slide-1' ).addClass ( 'inactive' );
		$ ( '#rs-slide-2' ).addClass ( 'inactive' );
	} );
} );


$ ( '#vo-slide-1' ).click ( function() {
	$ ( '#vo2' ).hide ();
	$ ( '#vo3' ).hide ();
	$ ( '#vo1' ).fadeIn ( 'slow', function() {
		$ ( '.vo_slide_steps_list li' ).removeClass ( 'active' );
		$ ( '.vo_slide_steps_list li' ).removeClass ( 'inactive' );
		$ ( '.vo_slide_steps_list li' ).removeClass ( 'selected-element' );
		$ ( '#vo-slide-1' ).addClass ( 'active' );
		$ ( '#vo-slide-1' ).addClass ( 'selected-element' );
		$ ( '#vo-slide-2' ).addClass ( 'inactive' );
		$ ( '#vo-slide-3' ).addClass ( 'inactive' );
	} );
} );

$ ( '#vo-slide-2' ).click ( function() {
	$ ( '#vo1' ).hide ();
	$ ( '#vo3' ).hide ();
	$ ( '#vo2' ).fadeIn ( 'slow', function() {
		$ ( '.vo_slide_steps_list li' ).removeClass ( 'active' );
		$ ( '.vo_slide_steps_list li' ).removeClass ( 'inactive' );
		$ ( '.vo_slide_steps_list li' ).removeClass ( 'selected-element' );
		$ ( '#vo-slide-2' ).addClass ( 'active' );
		$ ( '#vo-slide-2' ).addClass ( 'selected-element' );
		$ ( '#vo-slide-1' ).addClass ( 'inactive' );
		$ ( '#vo-slide-3' ).addClass ( 'inactive' );
	} );
} );

$ ( '#vo-slide-3' ).click ( function() {
	$ ( '#vo1' ).hide ();
	$ ( '#vo2' ).hide ();
	$ ( '#vo3' ).fadeIn ( 'slow', function() {
		$ ( '.vo_slide_steps_list li' ).removeClass ( 'active' );
		$ ( '.vo_slide_steps_list li' ).removeClass ( 'inactive' );
		$ ( '.vo_slide_steps_list li' ).removeClass ( 'selected-element' );
		$ ( '#vo-slide-3' ).addClass ( 'active' );
		$ ( '#vo-slide-3' ).addClass ( 'selected-element' );
		$ ( '#vo-slide-1' ).addClass ( 'inactive' );
		$ ( '#vo-slide-2' ).addClass ( 'inactive' );
	} );
} );

$ ( '.vo_slide_steps_list li' ).hover (
		function() {
			if ( !$ ( this ).hasClass ( 'selected-element' ) )
			{
				$ ( this ).removeClass ( 'inactive' );
				$ ( this ).addClass ( 'active' );
			}
			else {
				$ ( this ).addClass ( 'selected-element' );
			}

		},
		function() {
			if ( !$ ( this ).hasClass ( 'selected-element' ) )
			{
				$ ( this ).removeClass ( 'active' );
				$ ( this ).addClass ( 'inactive' );
			}
		}
		);

$ ( '#sc-slide-1' ).click ( function() {
	$ ( '#sc2' ).hide ();
	$ ( '#sc3' ).hide ();
	$ ( '#sc1' ).fadeIn ( 'slow', function() {
		$ ( '.sc_slide_steps_list li' ).removeClass ( 'active' );
		$ ( '.sc_slide_steps_list li' ).removeClass ( 'inactive' );
		$ ( '.sc_slide_steps_list li' ).removeClass ( 'selected-element' );
		$ ( '#sc-slide-1' ).addClass ( 'active' );
		$ ( '#sc-slide-1' ).addClass ( 'selected-element' );
		$ ( '#sc-slide-2' ).addClass ( 'inactive' );
		$ ( '#sc-slide-3' ).addClass ( 'inactive' );
	} );
} );

$ ( '#sc-slide-2' ).click ( function() {
	$ ( '#sc1' ).hide ();
	$ ( '#sc3' ).hide ();
	$ ( '#sc2' ).fadeIn ( 'slow', function() {
		$ ( '.sc_slide_steps_list li' ).removeClass ( 'active' );
		$ ( '.sc_slide_steps_list li' ).removeClass ( 'inactive' );
		$ ( '.sc_slide_steps_list li' ).removeClass ( 'selected-element' );
		$ ( '#sc-slide-2' ).addClass ( 'active' );
		$ ( '#sc-slide-2' ).addClass ( 'selected-element' );
		$ ( '#sc-slide-1' ).addClass ( 'inactive' );
		$ ( '#sc-slide-3' ).addClass ( 'inactive' );
	} );
} );

$ ( '#sc-slide-3' ).click ( function() {
	$ ( '#sc1' ).hide ();
	$ ( '#sc2' ).hide ();
	$ ( '#sc3' ).fadeIn ( 'slow', function() {
		$ ( '.sc_slide_steps_list li' ).removeClass ( 'active' );
		$ ( '.sc_slide_steps_list li' ).removeClass ( 'inactive' );
		$ ( '.sc_slide_steps_list li' ).removeClass ( 'selected-element' );
		$ ( '#sc-slide-3' ).addClass ( 'active' );
		$ ( '#sc-slide-3' ).addClass ( 'selected-element' );
		$ ( '#sc-slide-1' ).addClass ( 'inactive' );
		$ ( '#sc-slide-2' ).addClass ( 'inactive' );
	} );
} );

$ ( '.sc_slide_steps_list li' ).hover (
		function() {
			if ( !$ ( this ).hasClass ( 'selected-element' ) )
			{
				$ ( this ).removeClass ( 'inactive' );
				$ ( this ).addClass ( 'active' );
			}
			else {
				$ ( this ).addClass ( 'selected-element' );
			}

		},
		function() {
			if ( !$ ( this ).hasClass ( 'selected-element' ) )
			{
				$ ( this ).removeClass ( 'active' );
				$ ( this ).addClass ( 'inactive' );
			}
		}
		);

$ ( '#sp-slide-1' ).click ( function() {
	$ ( '#sp2' ).hide ();
	$ ( '#sp3' ).hide ();
	$ ( '#sp1' ).fadeIn ( 'slow', function() {
		$ ( '.sp_slide_steps_list li' ).removeClass ( 'active' );
		$ ( '.sp_slide_steps_list li' ).removeClass ( 'inactive' );
		$ ( '.sp_slide_steps_list li' ).removeClass ( 'selected-element' );
		$ ( '#sp-slide-1' ).addClass ( 'active' );
		$ ( '#sp-slide-1' ).addClass ( 'selected-element' );
		$ ( '#sp-slide-2' ).addClass ( 'inactive' );
		$ ( '#sp-slide-3' ).addClass ( 'inactive' );
	} );
} );

$ ( '#sp-slide-2' ).click ( function() {
	$ ( '#sp1' ).hide ();
	$ ( '#sp3' ).hide ();
	$ ( '#sp2' ).fadeIn ( 'slow', function() {
		$ ( '.sp_slide_steps_list li' ).removeClass ( 'active' );
		$ ( '.sp_slide_steps_list li' ).removeClass ( 'inactive' );
		$ ( '.sp_slide_steps_list li' ).removeClass ( 'selected-element' );
		$ ( '#sp-slide-2' ).addClass ( 'active' );
		$ ( '#sp-slide-2' ).addClass ( 'selected-element' );
		$ ( '#sp-slide-1' ).addClass ( 'inactive' );
		$ ( '#sp-slide-3' ).addClass ( 'inactive' );
	} );
} );

$ ( '#sp-slide-3' ).click ( function() {
	$ ( '#sp1' ).hide ();
	$ ( '#sp2' ).hide ();
	$ ( '#sp3' ).fadeIn ( 'slow', function() {
		$ ( '.sp_slide_steps_list li' ).removeClass ( 'active' );
		$ ( '.sp_slide_steps_list li' ).removeClass ( 'inactive' );
		$ ( '.sp_slide_steps_list li' ).removeClass ( 'selected-element' );
		$ ( '#sp-slide-3' ).addClass ( 'active' );
		$ ( '#sp-slide-3' ).addClass ( 'selected-element' );
		$ ( '#sp-slide-1' ).addClass ( 'inactive' );
		$ ( '#sp-slide-2' ).addClass ( 'inactive' );
	} );
} );

$ ( '.sp_slide_steps_list li' ).hover (
		function() {
			if ( !$ ( this ).hasClass ( 'selected-element' ) )
			{
				$ ( this ).removeClass ( 'inactive' );
				$ ( this ).addClass ( 'active' );
			}
			else {
				$ ( this ).addClass ( 'selected-element' );
			}

		},
		function() {
			if ( !$ ( this ).hasClass ( 'selected-element' ) )
			{
				$ ( this ).removeClass ( 'active' );
				$ ( this ).addClass ( 'inactive' );
			}
		}
		);


(function( $ ) {
	var cache = [];
	// Arguments are image paths relative to the current page.
	$.preLoadImages = function() {
		var args_len = arguments.length;
		for ( var i = args_len; i--; ) {
			var cacheImage = document.createElement ( 'img' );
			cacheImage.src = arguments[i];
			cache.push ( cacheImage );
		}
	}
}) ( jQuery )

jQuery.preLoadImages ( "/assets/img/slidedeck/learn-more-hover.gif" );

/*$(document).ready(function(){
			$("#slider").easySlider({
				auto: true,
				continuous: true,
                prevText: '',
                nextText: '',
                speed: 800,
                pause: 7000
			});
		});	
*/