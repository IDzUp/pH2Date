/***************************/
//@Author: Girish 
//@website: www.freelance.com
//@email: jangid_girish@yahoo.co.in
//@license: Feel free to use it, but keep this credits please!
/***************************/

$(document).ready(function(){  
	//global vars
	var form = $("#customForm");
	var name = $("#name");
	var nameInfo = $("#nameInfo");
	var email = $("#email");
        var repeat_email = $("#repeat_email");
        var repeat_emailInfo = $("#repeat_emailInfo");
	var emailInfo = $("#emailInfo");
	var pass1 = $("#password1");
	var pass1Info = $("#pass1Info");
	var pass2 = $("#password2");
	var pass2Info = $("#pass2Info");
	var message = $("#message");
        var lname = $("#lname");
        var lnameInfo = $("#lnameInfo");
        var address = $("#address");
        var city = $("#city");
        var cityInfo = $('#cityInfo');
        var state = $("#state");
        var stateInfo = $('#stateInfo');
        //var zip_code = $("#zip_code");
        //var zip_codeInfo = $('#zip_codeInfo');
        var country = $("#country");
        var countryInfo = $("#countryInfo");
        var tel_no = $("#tel_no");
        var tel_noInfo = $("#tel_noInfo");
        //var client = $("#client");
        //var clientInfo = $("#clientInfo");
       /* var confirm = $("#confirm");
        var confirmInfo = $("#confirmInfo");*/
       // var service_provider = $("#service_provider");
        
	//On blur

        name.blur(validateName);
        lname.blur(validateName2);
        address.blur(validateAddress);
	email.blur(validateEmail);
	pass1.blur(validatePass1);
	pass2.blur(validatePass2);
        city.blur(validateCity);
        state.blur(validateState);
	//zip_code.blur(validateZip);
        country.blur(validateCountry);
        tel_no.blur(validateTelephone);
        message.blur(validateMessage);
        //On key press
	name.keyup(validateName);
        lname.keyup(validateName2);
        address.keyup(validateAddress)
	pass1.keyup(validatePass1);
	pass2.keyup(validatePass2);
        repeat_email.keyup(validateEmail2);
	city.keyup(validateCity);
        state.keyup(validateState);
        //zip_code.keyup(validateZip);
        country.keyup(validateCountry);
        tel_no.keyup(validateTelephone)
        message.keyup(validateMessage);
	//On Submitting

        form.submit(function(){
			if(validateName() & validateEmail() & validatePass1() & validatePass2() & validateName() & validateName2() & validateEmail2() & validateAddress() & validateCity() & validateState() & validateCountry() & validateTelephone() )
				return true;
			else{
				window.scroll(1, 1);
				return false;
			}
	});

	//validation functions
	function validateEmail(){
		//testing regular expression
		var a = $("#email").val();
		var filter = /^[a-zA-Z0-9]+[a-zA-Z0-9_.-]+[a-zA-Z0-9_-]+@[a-zA-Z0-9]+[a-zA-Z0-9.-]+[a-zA-Z0-9]+.[a-z]{2,4}$/;
		//if it's valid email
		if(filter.test(a)){
			email.removeClass("error");
			emailInfo.text("Correct");
			emailInfo.removeClass("error");
			return true;
		}
		//if it's NOT valid
		else{
			email.addClass("error");
			emailInfo.text("Type a valid e-mail please :P");
			emailInfo.addClass("error");
			return false;
		}
	}
	function validateName(){
		//if it's NOT valid
		if(name.val().length < 5){
			name.addClass("error");
			nameInfo.text("We want names with more than 5 letters!");
			nameInfo.addClass("error");
			return false;
		}
		//if it's valid
		else{
			name.removeClass("error");
			nameInfo.text("Correct");
			nameInfo.removeClass("error");
			return true;
		}
	}
        function validateName2(){
		//if it's NOT valid
		if(lname.val().length < 3){
			lname.addClass("error");
			lnameInfo.text("We want names with more than 3 letters!");
			lnameInfo.addClass("error");
			return false;
		}
		//if it's valid
		else{
			lname.removeClass("error");
			lnameInfo.text("Correct");
			lnameInfo.removeClass("error");
			return true;
		}
	}
        
        function validateEmail2(){
		var a = $("#email");
		var b = $("#repeat_email");
                var filter = /^[a-zA-Z0-9]+[a-zA-Z0-9_.-]+[a-zA-Z0-9_-]+@[a-zA-Z0-9]+[a-zA-Z0-9.-]+[a-zA-Z0-9]+.[a-z]{2,4}$/;
		//are NOT valid
		if( email.val() != repeat_email.val() || filter.test(repeat_email.val())!= 1){
			repeat_email.addClass("error");
			repeat_emailInfo.text("Email doesn't match!");
			repeat_emailInfo.addClass("error");
			return false;
		}
		//are valid
		else{
			repeat_email.removeClass("error");
			repeat_emailInfo.text("Confirm Email");
			repeat_emailInfo.removeClass("error");
			return true;
		}
	}
	function validatePass1(){
		var a = $("#password1");
		var b = $("#password2");

		//it's NOT valid
		if(pass1.val().length <5){
			pass1.addClass("error");
			pass1Info.text("Ey! Remember: At least 5 characters");
			pass1Info.addClass("error");
			return false;
		}
		//it's valid
		else{
			pass1.removeClass("error");
			pass1Info.text("Correct");
			pass1Info.removeClass("error");
			validatePass2();
			return true;
		}
	}
	function validatePass2(){
		var a = $("#password1");
		var b = $("#password2");
		//are NOT valid
		if( pass1.val() != pass2.val() ){
			pass2.addClass("error");
			pass2Info.text("Passwords doesn't match!");
			pass2Info.addClass("error");
			return false;
		}
		//are valid
		else{
			pass2.removeClass("error");
			pass2Info.text("Confirm password");
			pass2Info.removeClass("error");
			return true;
		}
	}
	function validateAddress(){
		//it's NOT valid
		if(address.val().length < 10 || address.val().length == null){
			address.addClass("error");
			return false;
		}
		//it's valid
		else{
			address.removeClass("error");
			return true;
		}
	}
        function validateCity(){
		//if it's NOT valid
		if(city.val().length < 3){
			city.addClass("error");
			cityInfo.text("We want city name with more than 3 letters!");
			cityInfo.addClass("error");
			return false;
		}
		//if it's valid
		else{
			city.removeClass("error");
			cityInfo.text("Correct");
			cityInfo.removeClass("error");
			return true;
		}
	}
        function validateState(){
		//if it's NOT valid
		if(state.val().length < 3){
			state.addClass("error");
			stateInfo.text("We want state name with more than 3 letters!");
			stateInfo.addClass("error");
			return false;
		}
		//if it's valid
		else{
			state.removeClass("error");
			stateInfo.text("Correct");
			stateInfo.removeClass("error");
			return true;
		}
	}
       /* function validateZip(){
		//if it's NOT valid
		var filter = /[a-zA-z]/;
                if(filter.test(zip_code.val()) == 1){
                        zip_code.addClass("error");
			zip_codeInfo.text("We want valid zip/postal code!");
			zip_codeInfo.addClass("error");
			return false;
                }
                else if(zip_code.val().length < 6){
			zip_code.addClass("error");
			zip_codeInfo.text("We want zip/postal code with more than 5 letters!");
			zip_codeInfo.addClass("error");
			return false;
		}else{
			zip_code.removeClass("error");
			zip_codeInfo.text("Correct");
			zip_codeInfo.removeClass("error");
			return true;
		}
	}*/
        function validateCountry(){
		//if it's NOT valid
		if(country.val() == ""){
			country.addClass("error");
			countryInfo.text("Please select your conutry!");
			countryInfo.addClass("error");
			return false;
		}
		//if it's valid
		else{
			country.removeClass("error");
			countryInfo.text("Correct");
			countryInfo.removeClass("error");
			return true;
		}
	}
        function validateTelephone(){
		//if it's NOT valid
                var filter = /[a-zA-z]/;
                if(filter.test(tel_no.val()) == 1){
                        tel_no.addClass("error");
			tel_noInfo.text("We want valid phone no!");
			tel_noInfo.addClass("error");
			return false;
                }else if(tel_no.val().length < 5){
			tel_no.addClass("error");
			tel_noInfo.text("We want phone no. with more than 5 letters!");
			tel_noInfo.addClass("error");
			return false;
		}else{
			tel_no.removeClass("error");
			tel_noInfo.text("Correct");
			tel_noInfo.removeClass("error");
			return true;
		}
	}
        /*function validateUser(){
           
            if(client.val() != "client" || client.val() != "service_provider"){

			client.addClass("error");
			clientInfo.text("Please select user type!");
			clientInfo.addClass("error");
		return false;
		}
                else{
                    client.removeClass("error");
                    clientInfo.removeClass("error");
                    return true;
                }
        }*/
       /* function validateConfirm(){
             
             if(document.getElementById("confirm").checked != 1){

			confirm.addClass("error");
			confirmInfo.text("Please select confirm!");
			confirmInfo.addClass("error");
		return false;
		}
                else{
                    confirm.removeClass("error");
                    confirmInfo.text("");
                    confirmInfo.removeClass("error");
                    return true;
                }
        }*/
        function validateMessage(){
            //it's NOT valid
		if(message.val().length < 10 || message.val().length == null){
			message.addClass("error");
			return false;
		}
		//it's valid
		else{
			message.removeClass("error");
			return true;
		}
        }
        
});
