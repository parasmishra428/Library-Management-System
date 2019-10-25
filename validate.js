  function validation(){
  	alert('hello');

 var bid = document.submit.bid.value;
var name = document.submit.name.value;
var password = document.submit.authors.value;
var edition = document.submit.edition.value;
var status = document.submit.status.value;
var quantity = document.submit.quantity.value;
var department = document.submit.department.value;
var msg='';

if (bid.trim() == '') {
alert('Enter bid');
document.submit.bid.focus();
return false;

}  else {
msg += 'bid is ' + bid + '<br>';
}
}

function openNav() {
  document.getElementById("mySidenav").style.width = "300px";
  document.getElementById("main").style.marginLeft = "300px";
  document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
  document.body.style.backgroundColor = "#024629";
}