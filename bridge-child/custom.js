jQuery( document ).ready( function($) {

	var win = $( window );
	var sticky = $( '#kmb-header' );
	var mobileToggle = sticky.find( '.toggle-mobile' );
	var mobileMenu = sticky.find( '.menu' );
	var stickyTop = 80;

	var KMBHeader = {

		init: function() {

			KMBHeader.createSticky();

			win.scroll( function() {
				KMBHeader.createSticky();
			});

			KMBHeader.initToggle();

		},

		createSticky: function() {
			var scrollTop = win.scrollTop();
			scrollTop > stickyTop ? sticky.addClass( 'kmb-sticky' ) : sticky.removeClass( 'kmb-sticky' );
		},

		initToggle: function() {
			mobileToggle.on( 'click', function() {
				console.log( 'clicked' );
				mobileMenu.toggleClass( 'in' );
			})
		}

	}

	KMBHeader.init();

//code to set cookie
//https://github.com/js-cookie/js-cookie	
var querystrutm = window.location.search;
if((Cookies.get('utm_info') == null || Cookies.get('utm_info') == "") && querystrutm != "") { 
	Cookies.set('utm_info', querystrutm, { expires: 30 }); //cookie will expire in 30 days
}	

var signupbtns = document.getElementsByClassName("signupbtn-utm");
for(var i = 0; i < signupbtns.length; i++) {
  (function(index) {
    signupbtns[index].addEventListener("click", function(evt) {
		//window.location.href = signupbtns[index].href + '?utm_content=' + Cookies.get('utm_content'); // Redirect instead with JavaScript
		var newquerystr = "";
		if( typeof Cookies.get('utm_info') !== 'undefined' ) { newquerystr = Cookies.get('utm_info'); }
		
		if( newquerystr.length > 0 ) {
			evt.preventDefault(); // Stop the link from redirecting
			//Cookies.remove('utm_info');
			window.open(signupbtns[index].href + newquerystr); // open in new window instead with JavaScript
		}
     })
  })(i);
}


/*
// Parse the URL
function getParameterByName(name) {
	name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
	var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
		results = regex.exec(location.search);
	return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}
// Give the URL parameters variable names

var source = getParameterByName('utm_source');
var medium = getParameterByName('utm_medium');
var campaign = getParameterByName('utm_campaign');
var content = getParameterByName('utm_content');

//alert(source + " / " + medium + " / " + campaign + " / " + content);
 
// Set the cookies 
if((Cookies.get('utm_source') == null || Cookies.get('utm_source') == "") && source != "") { 
	Cookies.set('utm_source', source);
}
if((Cookies.get('utm_medium') == null || Cookies.get('utm_medium') == "") && medium != "") { 
	Cookies.set('utm_medium', medium);
}
if((Cookies.get('utm_campaign') == null || Cookies.get('utm_campaign') == "") && campaign != "") { 
	Cookies.set('utm_campaign', campaign);
}
if((Cookies.get('utm_content') == null || Cookies.get('utm_content') == "") && content != "") { 	
	Cookies.set('utm_content', content);
}	

var signupbtns = document.getElementsByClassName("signupbtn-utm");
for(var i = 0; i < signupbtns.length; i++) {
  (function(index) {
    signupbtns[index].addEventListener("click", function(evt) {
		//console.log("Clicked index: " + i);
		//window.location.href = signupbtns[index].href + '?utm_content=' + Cookies.get('utm_content'); // Redirect instead with JavaScript
		//alert(Cookies.get('utm_content'));
		var querystr = "?";
		if( typeof Cookies.get('utm_source') !== 'undefined' ) { querystr += '&utm_source=' + Cookies.get('utm_source'); }
		if( typeof Cookies.get('utm_medium') !== 'undefined' ) { querystr += '&utm_medium=' + Cookies.get('utm_medium'); }
		if( typeof Cookies.get('utm_campaign') !== 'undefined' ) { querystr += '&utm_campaign=' + Cookies.get('utm_campaign'); }
		if( typeof Cookies.get('utm_content') !== 'undefined' ) { querystr += '&utm_content=' + Cookies.get('utm_content'); }
		
		if( querystr.length > 1 ) {
			evt.preventDefault(); // Stop the link from redirecting
			Cookies.remove('utm_source');
			Cookies.remove('utm_medium');
			Cookies.remove('utm_campaign');
			Cookies.remove('utm_content');
			window.open(signupbtns[index].href + querystr); // open in new window instead with JavaScript
		}
     })
  })(i);
}
*/	
	
});
