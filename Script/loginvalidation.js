function validate() {
	 var $valid =  true;
	 document.getElementById("email_info").innerHTML = "";
	 document.getElementById("psw_info").innerHTML = "";
	 
	 var email = document.getElementById("email").value;
	 var password = document.getElementById("psw").value;
	 
	 if(email == "") {
		 document.getElementById("email_info").innerHTML = "Required";
		 $valid = false;
	 }
	 if(password == "") {
		 document.getElementById("psw").innerHTML = "Required";
		 $valid = false;
	 }
	 return $valid;
}