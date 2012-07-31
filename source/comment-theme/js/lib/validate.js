// JavaScript Document
function CheckUserRegistration(forms)
{
	 var ck_name = /^[A-Za-z0-9-'., ]{3,70}$/;
	 var ck_address = /^[A-Za-z0-9-'.,#:)( ]{1,70}$/;
	 var ck_alphabet = /^[A-Za-z'., ]{1,70}$/;
	 var filter=/^.+@.+\..{2,3}$/;
	 var phone1 = /^\(\d{3}\)-\d{3}-\d{4}$/;
	 var phone2 = /^\(\d{3}\)\d{3}.\d{4}$/;
	 var phone3 = /^\d{3}-\d{3}-\d{4}$/;
	 var phone4 = /^\(\d{3}\)\d{3}-\d{4}$/;
	 var phone6 = /^\(\d{3}\)\s\d{3}-\d{4}$/;
	 var phone5 = /^1-\d{3}-\d{3}-\d{4}$/;
	 var phone7 = /^\d{10}$/;

 	 var firstname =  forms.firstname.value;
  	 var lastname =  forms.lastname.value;
     var email =  forms.email.value;
     var password =  forms.password.value;
     var address1 =  forms.address1.value;
     var city =  forms.city.value;
	 var zipcode =  forms.zipcode.value;
     var country = forms.country.value;
	 var state = forms.state.value;
 	 var phoneno =  forms.phoneno.value;
 

	 if (firstname == ""){
		alert("Please enter first name.");
		forms.firstname.value ='';
		forms.firstname.focus();
	  	return false;
	 } 
	if(!ck_alphabet.test(firstname)) {
	  	alert("Please enter only alphabets for first name.");
		forms.firstname.value ='';
		forms.firstname.focus();
  	    return false;
	 } 
	if(lastname == ""){
		alert("Please enter last name.");
		forms.lastname.value ='';
		forms.lastname.focus();
		return false;
	  } 
	if(!ck_alphabet.test(lastname)) {
	  	alert("Please enter only alphabets for last name.");
		forms.lastname.value ='';
		forms.lastname.focus();
  	    return false;
	  } 
	if (email == ""){
		alert("Please enter email address.");
		forms.email.value = '';
		forms.email.focus();
	  	return false;
	 } 
	if(!filter.test(email)){
		alert("Please enter valid email address.");
		forms.email.value = '';
		forms.email.focus();
	  	return false;		    
	 } 
	
	if (password == ""){
		alert("Please enter password.");
		forms.password.value = '';
		forms.password.focus();
	  	return false;
	 } 
	if(forms.password.value.length < 6){
		alert("Please enter password with minimum of 6 Characters.");
		forms.password.value = '';
		forms.password.focus();
	  	return false;		    
	 } 
	
	if (address1 == ""){
		alert("Please enter your address.");
		forms.address1.value = '';
		forms.address1.focus();
	  	return false;
	 } 
	if (!ck_address.test(address1)) {
	  	alert("Please enter only alphabets & numbers for your address.");
		forms.address1.value = '';
		forms.address1.focus();
  	    return false;
	  } 
	
	if (city == ""){
		alert("Please enter your city.");
		forms.city.value = '';
		forms.city.focus();
	  	return false;
	 } 
	if (!ck_alphabet.test(city)) {
	  	alert("Please enter only alphabets for city.");
		forms.city.value = '';
		forms.city.focus();
  	    return false;
	  } 
	if (zipcode == ""){
		alert("Please enter zip code.");
		forms.zipcode.value = '';
		forms.zipcode.focus();
	  	return false;
	 } 
	if (isNaN(zipcode) == true){
		alert("Please enter valid zip code.");
		forms.zipcode.value = '';
		forms.zipcode.focus();
		return false;		
	 } 
	if (zipcode != ""){
		  if (forms.country.value == "38") {// || 
			  if (forms.zipcode.value.length > 6 || forms.zipcode.value.length < 6) {
				alert("Please enter 6 numbers for zip code.");
				forms.zipcode.focus();
	  			return false;
			  }
		  } else if(forms.country.value == "246" ){
			  if (forms.zipcode.value.length > 5 || forms.zipcode.value.length < 5 ) {
				alert("Please enter only 5 numbers for zip code.");
				forms.zipcode.focus();
	  			return false;
			  }
		  }
	 } 
	 if (country == ""){
		alert("Please select country.");
		forms.country.focus();
	  	return false;
	 }
	 if (state == ""){
		alert("Please select a state.");
		forms.state.focus();
	  	return false;
	 }
	if (phoneno == ""){
		alert("Please enter your phone number.");
		forms.phoneno.value = '';
		forms.phoneno.focus();
	  	return false;
	 } 
	
	if (!(phone1.test(phoneno) || phone2.test(phoneno) || phone3.test(phoneno) || phone4.test(phoneno) || phone5.test(phoneno) || phone6.test(phoneno) || phone7.test(phoneno))){
		alert("Please Enter a Valid Phone Number")
		forms.phoneno.value = '';
		forms.phoneno.focus();
		return false;
	}
    return true;
}

function validateUsers(forms) {
	 var ck_name = /^[A-Za-z0-9-'., ]{3,70}$/;
	 var ck_address = /^[A-Za-z0-9-'.,#:)( ]{1,70}$/;
	 var ck_alphabet = /^[A-Za-z'., ]{1,70}$/;
	 var filter=/^.+@.+\..{2,3}$/;

 	 var mail = $jq.trim(forms.mail.value);
     var password = $jq.trim(forms.pass.value);
	 if (mail == ""){
		alert("Please Enter Email Address.");
		forms.mail.value = '';
		forms.mail.focus();
	  	return false;
	 } else if(!filter.test(mail)){
		alert("Please Enter Valid Email Address.");
		forms.mail.value = '';
		forms.mail.focus();
	  	return false;		    
	 } else if (password == ""){
		alert("Please Enter Your Password.");
		forms.pass.value = '';
		forms.pass.focus();
	  	return false;
	 } else {
	   return true;
	 }
}