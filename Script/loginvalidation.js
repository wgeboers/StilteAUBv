function validate() {
	 var $valid =  true;
	 document.getElementById("email_info").innerHTML = "";
	 document.getElementById("psw_info").innerHTML = "";
	 
	 var email = document.getElementById("email").value;
	 var password = document.getElementById("psw").value;
	 
	 if(email == "") {
		 document.getElementById("email_info").innerHTML = "Please enter an email address.";
		 $valid = false;
	 } else if(password == "") {
		 document.getElementById("psw_info").innerHTML = "Please enter a password.";
		 $valid = false;
	 }
	 return $valid;
}