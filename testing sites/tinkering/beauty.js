window.onscroll = function() {myFunction()};

/* window is obj containing Document Object Model, DOM */
/* onscroll is an event */

var navbar = document.getElementById("navbar");
var sticky = navbar.offsetTop;

function myFunction() {
	
  if (window.pageYOffset >= sticky) {
	
    navbar.classList.add("sticky")
	
  } else {
	  
    navbar.classList.remove("sticky");
	
  }
}