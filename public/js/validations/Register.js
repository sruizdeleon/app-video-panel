$(document).ready(function() {

		$("#registerForm").validate({
			rules: {
				name: {
					required: true,
					minlength: 2,
					maxlength: 80,
				},
				surname: {
					required: true,
					minlength: 2,
					maxlength: 160,
				},
				email: {
					required: true,
					email: true,
					minlength: 5,
					maxlength: 80,
				},
				password: {
					required: true,
					minlength: 6,
					maxlength: 20,
				},
				password_confirmation: {
					required: true,
					minlength: 6,
					maxlength: 20,
					equalTo: "#password",
				},
				avatar: {
					required: true,
					minlength: 5,
					maxlength: 255,
				},
			},
			messages: {
				name: {
					required: "Please enter your name",
					minlength: "Name must be at least 3 characters",
					maxlength: "Name must be maximum 80 characters",
				},
				surname: {
					required: "Please enter your surname",
					minlength: "Surname must be at least 3 characters",
					maxlength: "Surname must be maximum 160 characters",
				},
				email: {
					required: "Please enter your email",
					email: "Please enter a valid email",
					minlength: "Email must be at least 3 characters",
					maxlength: "Email must be maximum 80 characters",
				},
				password: {
					required: "Please enter your password",
					minlength: "Password must be at least 6 characters",
					maxlength: "Password must be maximum 20 characters",
					strongPassword:
						'Password must contain at least 1 uppercase, 1 lowercase, 1 number and 1 special character (!@#$%^&*(),.?":{}|<>)',
				},
				password_confirmation: {
					required: "Please enter your password confirmation",
					equalTo: "Password confirmation must match password",
					minlength: "Password must be at least 6 characters",
					maxlength: "Password must be maximum 20 characters",
				},
				avatar: {
					required: "Please enter your url avatar",
					minlength: "Avatar url must be at least 3 characters",
					maxlength: "Avatar url must be maximum 255 characters",
				},
			},
		});
});