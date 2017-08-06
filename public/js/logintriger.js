$(document).ready(function () {
					 "use strict";	
$(".signUpClick").on('click' , function() {  
			$('.login-1').css("display","none");
			$('.login-3').css("display","none");
			
			$('.login-2').css("display","block");
		 });
		$(".signInClick").on('click' , function() {  
			$('.login-1').css("display","block");
			$('.login-2').css("display","none");
			
			$('.login-2').css("display","none");
		 });
		$(".forgetPasswordClick").on('click' , function() { 
			$('.login-1').css("display","none");
			
			$('.login-2').css("display","none");
			$('.login-3').css("display","block");

		 });
		$(".cancelClick").on('click' , function() { 
			$('.login-1').css("display","block");
			
			$('.login-2').css("display","none");
			$('.login-3').css("display","none");

		 });
		 
});			 