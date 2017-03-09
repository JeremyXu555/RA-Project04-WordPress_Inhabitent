/*
	================================================================================
							CONTACT FORM VALIDATION
  ================================================================================
*/


function validateForm(){	
/* Validating name field */
var x=document.forms["contact-response-form"].name.value;
if (x==null || x=="")
 {
 alert("Name must be filled out");
 return false;
 }
/* Validating email field */
var x=document.forms["contact-response-form"].email.value;
var atpos=x.indexOf("@");
var dotpos=x.lastIndexOf(".");
if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
 {
 alert("Not a valid e-mail address");
 return false;
 }

/* Validating subject field */
var x=document.forms["contact-response-form"].subject.value;
if(x == null || x==""){
	alert("Subject must be filled out");
	return false;
}
document.getElementById("contact-response-form").submit();
}



$(document).ready(function () {

	$("#btnSubmit").click(validateForm);

});







