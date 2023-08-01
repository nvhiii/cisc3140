function dtFunction() {
	
	var d = new Date();
	document.getElementById("dt").innerHTML = d;
	var c = 12741.132423
	
	window.alert(d.getMinutes()); // getDay return 0-6 value starting from sunday

}

function liveClock() {
	
	document.getElementById("lt").innerHTML = new Date();
	
	setTimeout("liveClock()", 1000);
	
}

function randomRange() {
	
	var x = Math.round((Math.random() * (100-1)) + 1);
	
	window.alert(x);
	
}

function numArraySort() {
	
	var num = [11, 22, 33, 44, 55, 66, 77];
	
	window.alert(num.sort(function(a, b) { return a-b; }));

}