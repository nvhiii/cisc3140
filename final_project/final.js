window.onscroll = function() {stickyNav()};

var navbar = document.getElementById("navbar");
var sticky = navbar.offsetTop; // returns the top value in pixels relative to navbar

function stickyNav() {
	
	if (window.pageYOffset >= sticky) { // pageYOffset returns the pixels a document has scrolled from upper left corner of window
		
		navbar.classList.add("sticky");
		
	} else {
		
		navbar.classList.remove("sticky");
		
	}
	
}

function liveTime() {
	
	document.getElementById("lt").innerHTML = new Date();
	
	setTimeout("liveTime()", 1000);
	
}

function login(a) {
	
	

}