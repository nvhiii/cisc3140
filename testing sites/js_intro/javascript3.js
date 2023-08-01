function srt() {
	
	var x = [12, 3, 59, 88, 104, 63, 68, 13, 79, 23, 25, 102];
	
	x.sort(function(a,b) {return(a-b)});
	// like bubble sort, compares side by side stuff
	
	
	/* 
	   Conversion, use Math."function name"
	
	   .ceil function = rounds up
	
	   .floor function = rounds down
	   
	   float to int = .parseInt()
	   
	   .round, rounds to closest
	   
	   .truncate gets rid of the decimal
	   
	*/
	
	document.getElementById("hp").innerHTML = x;
	
}
