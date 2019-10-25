//event listner to add event listner into button
window.addEventListener("load", start, false );

function insert(){
	alert('test click')
	//get country list element
	var target = document.getElementById('country');
	//create new node
	var newNode = document.createElement("li");
 	nodeId = "item4";
 	//set id attribute into new node
 	newNode.setAttribute("id",nodeId);
	text = "USA"
	//append child
	target.appendChild(newNode);
	//set text into element
	document.getElementById('item4').innerHTML = text;
}


function start(){
alert('test load')
//add event listener into action button
document.getElementById( "action").addEventListener(
	 "click", insert, false );
}