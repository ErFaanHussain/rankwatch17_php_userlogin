$(document).ready(function(){
	// validation START
	$.validator.addMethod("pwcheck", function(value) {
  	   return /^[A-Za-z0-9\d=!\-@._*]*$/.test(value) // only these
       // && /[a-z]/.test(value) // has a lowercase letter
       // && /\d/.test(value) // has a digit
	});
  	var validator1 = $( "#loginForm" ).validate( {
				rules: {
					username: {
						required: true,
						email: true,
						maxlength: 40
					},
					password: {
						required: true,
						rangelength: [5,20],
						nowhitespace: true,
						pwcheck: true
					}
				},
				messages: {
					username: {
						required: "Please enter your email address",
						email: "Please enter a valid email address",
						maxlength: "Email must be less than 40 characters"
					},
					password: {
						required: "Please provide your password",
						rangelength: "Password must be 5-20 characters long",
						nowhitespace: "No white spaces allowed",
						pwcheck: "Password contains only A-Z, a-z, 0-9 and =!-@._*"
					}
				},
				errorElement: "small",
				errorPlacement: function ( error, element ) {
					error.addClass( "form-control-feedback" );
					error.insertAfter( element );
				},
				success: function ( label, element ) {
					$( element ).addClass("form-control-success");
				},
				highlight: function ( element, errorClass, validClass ) {
					$( element ).parents(".form-group").addClass("has-danger").removeClass("has-success");
					$( element ).addClass( "form-control-danger" ).removeClass( "form-control-success" );
				},
				unhighlight: function ( element, errorClass, validClass ) {
					$( element ).parents( ".form-group" ).addClass( "has-success" ).removeClass( "has-danger" );
					$( element ).next( "span" ).addClass( "form-control-success" ).removeClass( "form-control-danger" );
				}
			});
  	   $.validator.addMethod("nameCheck",function(value){
  	   	return /^[a-zA-Z\s]*$/.test(value)
  	   });
  	var validator2 = $( "#signUpForm" ).validate( {
				rules: {
					name: {
						required: true,
						nameCheck: true,
						rangelength: [5,50]
					},
					email: {
						required: true,
						email: true,
						maxlength: 40
					},
					password: {
						required: true,
						rangelength: [5,20],
						nowhitespace: true,
						pwcheck: true
					},
					mobile: {
						required: true,
						nowhitespace: true,
						digits: true,
						rangelength: [10,10]
					},
					age: {
						required: true,
						nowhitespace: true,
						digits: true,
						maxlength: 3
					},
					gender: {
						required: true
					},
					address: {
						required: true,
						rangelength: [20,150]
					},
					country: {
						required: true
					},
					state: {
						required: true
					}
				},
				messages: {
					name: {
						required: "Please enter your name",
						nameCheck: "Only Characters and White spaces are allowed",
						rangelength: "Name must be 5-50 characters long"
					},
					email: {
						required: "Please enter your Email address",
						email: "Please enter a valid email address",
						maxlength: "Email must be less than 40 characters"
					},
					password: {
						required: "Please provide your password",
						rangelength: "Password must be 5-20 characters long",
						nowhitespace: "No white spaces allowed",
						pwcheck: "Password must contain only A-Z, a-z, 0-9 and =!-@._*"
					},
					mobile: {
						required: "Please enter your mobile number",
						nowhitespace: "No white spaces allowed",
						digits: "Mobile numbers are usually numeric",
						rangelength: "Accepted length is 10 digits"
					},
					age: {
						required: "Please enter your age",
						nowhitespace: "No white spaces allowed",
						digits: "only numeric value",
						maxlength: "No one lived for 4-digit years"
					},
					gender: {
						required: "Please select your gender"
					},
					address: {
						required: "Address can't be empty",
						rangelength: "Address must be 10-150 characters long"
					},
					country: {
						required: "Please select your Country"
					},
					state: {
						required: "Please select your State"
					}
				},
				errorElement: "small",
				errorPlacement: function ( error, element ) {
					error.addClass( "form-control-feedback" );
					error.insertAfter( element );
				},
				success: function ( label, element ) {
					$( element ).addClass("form-control-success");
				},
				highlight: function ( element, errorClass, validClass ) {
					$( element ).parents(".form-group").addClass("has-danger").removeClass("has-success");
					$( element ).addClass( "form-control-danger" ).removeClass( "form-control-success" );
				},
				unhighlight: function ( element, errorClass, validClass ) {
					$( element ).parents( ".form-group" ).addClass( "has-success" ).removeClass( "has-danger" );
					$( element ).next( "span" ).addClass( "form-control-success" ).removeClass( "form-control-danger" );
				}
			});
  // validation END
  $( '#resetFormLogin').on('click', function(){
  	validator1.resetForm();
  	resetValidation('login');
  });
   $( '#resetFormSignUp').on('click', function(){
  	validator2.resetForm();
  	resetValidation('signup');
  });
  function resetValidation(context){
  	if(context === 'login'){
  		$( '#uid' ).parents('.form-group').removeClass("has-success has-danger");
  		$( '#pwd' ).parents('.form-group').removeClass("has-success has-danger");
  	}else{
  		$( '#name' ).parents('.form-group').removeClass("has-success has-danger");
  		$( '#regNo' ).parents('.form-group').removeClass("has-success has-danger");
  		$( '#rollNo' ).parents('.form-group').removeClass("has-success has-danger");
  		$( '#mobile' ).parents('.form-group').removeClass("has-success has-danger");
  		$( '#email' ).parents('.form-group').removeClass("has-success has-danger");
  		$( '#depttSelect' ).parents('.form-group').removeClass("has-success has-danger");
  		$( '#courseSelect' ).parents('.form-group').removeClass("has-success has-danger");
  		$( '#uid1' ).parents('.form-group').removeClass("has-success has-danger");
  		$( '#pwd1' ).parents('.form-group').removeClass("has-success has-danger");
  	}
  }
});
function fillState(){
  var country_id = $('#countrySelect').val();
  $.post("stateAdd.php",{ country_id : country_id },
        function(data,status){
          if(status == 'success'){
            if(data[0] === 'success'){
              var select = $('#stateSelect');
              select.html('<option selected value="">--Select State--</option>').removeClass("form-control-danger").parent().removeClass("has-danger");
              $('#stateStatus').text('');
                for (var i=1; i<data.length; i++) {
                   select.append('<option value="' + data[i].state_id + '">' + data[i].state_name + '</option>');
                }
                select.focus();
            }
          }
          else{
            console.log('XHR failed');
          }

    }, "json");
}
