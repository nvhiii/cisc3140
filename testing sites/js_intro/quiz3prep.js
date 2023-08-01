function replaceText() {
	
	document.getElementById("1st").innerHTML = "Nahi is cool";
	
}

function combineText() {
	
	var x = "Barack";
	var y = "Obama";
	
	document.getElementById("2nd").innerHTML = x + " " + y;
	
}

function alertSmth() {
	
	var x = Math.round(Math.random() * 100);
	
	window.alert(x); // must be lower-case W
	
}

function lengthFxn() {
	
	var x = document.getElementById("4th").innerHTML;
	document.getElementById("4th").innerHTML = x.length;
	
}

function slicer() {
	
	var x = document.getElementById("5th").innerHTML;
	// document.getElementById("5th").innerHTML = "The total length is ";
	
	var slice_str = x.slice(0,6);
	var string_substring = x.substring(7, 14);
	var string_substr = x.substr(0,6); // substr method starts counting from 1 at the start index
	
	window.alert(slice_str);
	window.alert(string_substring);
	window.alert(string_substr);

}

function rplce() {
	
	var x = document.getElementById("6th").innerHTML;
	document.getElementById("6th").innerHTML = x.replace("Replace", "cisc 3140");

}

function caseLU() {
	
	var x = document.getElementById("7th").innerHTML;
	var upper = x.toUpperCase();
	var lower = x.toLowerCase();
	
	window.alert(upper);
	window.alert(lower);
	
}

function charConcat() {
	
	var first = "Nahi";
	var second = "Solace";
	
	var x = document.getElementById("8th").innerHTML;
	
	document.getElementById("8th").innerHTML = "Concatenation: " + first.concat(second);
	// document.getElementById("8th").innerHTML = "Char at index 6: " + x.charAt(6);
	
}

function precision() {
	
	var x = 15.69420;
	
	window.alert(x.toFixed(2));
	window.alert(x.toPrecision(5));

}

function conversion() {
	
	var x = "420.69";
	
	y = parseInt(x);
	z = parseFloat(x);
	zz = Number(x);
	
	window.alert(y);
	window.alert(z);
	window.alert(zz);

}

function arrayStuff() {
	
	var num_array = ["apple", "banana", "citrus", "duck"];
	
	var y = num_array.length; // function
	var z = num_array.sort(); // method
	num_array.push("cinnamon"); // method
	num_array.pop(); // removes last Element
	num_array.shift(); // removes first element
	
	num_array.unshift("fire", "water", "doodoo"); // add n elements to front of array
	
	window.alert(num_array);
}

function numArray() {
	
	var nums = [1, 2, 3, 4, 5, 6, 7];
	
	window.alert(nums.sort(function(a, b) {return a-b})); // compare function, like a bubble sort
	
}

function calculator() {
	
	var x = parseInt(document.getElementById("num1").value);
	var y = parseInt(document.getElementById("num2").value);
	
	window.alert(x + y);
	
}

