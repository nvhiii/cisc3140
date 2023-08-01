function giveDate() {
	
	var x = new Date();
	document.getElementById("dt").innerHTML = x;
	setTimeout("giveDate()", 1000); // optimized recursive call

}

/* function refresh() {
	
	setTimeout("giveDate()", 1000); // specifies function to callout
	giveDate();

}

*/