function liveTime() {
	
	document.getElementById("lt").innerHTML = new Date().toLocaleTimeString();
	
	setTimeout("liveTime()", 1000);
	
}

// script.js

function openNav() {
    document.querySelector(".sidenav").style.width = "450px";
}

function closeNav() {
    document.querySelector(".sidenav").style.width = "0";
}



