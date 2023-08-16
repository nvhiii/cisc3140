function liveTime() {
	
	document.getElementById("lt").innerHTML = new Date().toLocaleTimeString();
	
	setTimeout("liveTime()", 1000);
	
}


