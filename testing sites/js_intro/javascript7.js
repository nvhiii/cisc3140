function clck() {
	
	var now = new Date().getTime(); // getTime gets the millseconds
	var target = new Date("Aug 16 2023 18:00");
	document.write(now);
	document.write(target);
	
	var diff = target - now; // gives diff of now time to target in milliseconds
	
	var sec = Math.floor((diff % (1000 * 60))/1000); // include 60 because it resets every 60s
	var minute = Math.floor((diff % (1000 * 60 * 60))/(1000 * 60));
	var hour = Math.floor((diff % (1000 * 60 * 60 * 24))/(1000 * 60 * 60));
	var days = Math.floor(diff/(1000*60*60*24));
	
	
	document.getElementById("dt").innerHTML = days + "days " + hour + " hours " + min + " minutes " + sec + " seconds";
	
	setTimeout("clck()", 1000);
	


}