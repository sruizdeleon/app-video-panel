$(document).ready(function () {


    $.validator.addMethod(
			"checkRegex",
			function (value, element, params) {
				if (Array.isArray(params)) {
					for (let param of params) {
						if (!param.regex.test(value)) {
							$.validator.messages.checkRegex = param.msg;
							return false;
						}
					}
					return true;
				} else {
					return this.optional(element) || params.regex.test(value);
				}
			},
			function () {
				return $.validator.messages.checkRegex;
			}
		);

	$("#registerForm").validate({
		rules: {
			name: {
				required: true,
				minlength: 2,
				maxlength: 80,
				checkRegex: [
					{
						regex: /^[A-Za-z0-9-'ñÑ ]+$/,
						msg: "Name must contain only letters, numbers, hyphens, apostrophes and spaces.",
					},
				],
			},
			surname: {
				required: true,
				minlength: 2,
				maxlength: 160,
				checkRegex: [
					{
						regex: /^[A-Za-z0-9-'nñ ]+$/,
						msg: "Surname must contain only letters, numbers, hyphens, apostrophes and spaces.",
					},
				],
			},
			email: {
				required: true,
				email: true,
				minlength: 5,
				maxlength: 80,
			},
			password: {
				required: true,
				minlength: 8,
				maxlength: 20,
				checkRegex: [
					{
						regex: /[A-ZÑ]/,
						msg: "Password must contain at least one uppercase letter.",
					},
					{
						regex: /[a-zñ]/,
						msg: "Password must contain at least one lowercase letter.",
					},
					{
						regex: /\d/,
						msg: "Password must contain at least one number.",
					},
					{
						regex: /[*_,-.:;]/,
						msg: "Password must contain at least one special character: - _ * : ; , .",
					},
				],
			},
			password_confirmation: {
				required: true,
				minlength: 8,
				maxlength: 20,
				equalTo: "#password",
			},
			avatar: {
				required: true,
				minlength: 7,
				maxlength: 255,
				checkRegex: [
					{
						regex: /^(https?:\/\/)([a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)+.*)$/i,
						msg: "Avatar url must be a valid url.",
					},
					{
						regex: /^(https?:\/\/)([a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)+.*)+(?:jpg|png|webp)$/i,
						msg: "Avatar url must be a valid image url: .png .jpg .webp",
					},
				],
			},
			role: {
				checkRegex: [
					{
						regex: /^(admin|user)$/,
						msg: "Role must be admin or user.",
					},
				],
			},
			id: {
				checkRegex: [
					{
						regex: /^[1-9][0-9]*$/,
						msg: "Id must be a positive integer.",
					},
				],
			},
		},
		messages: {
			name: {
				required: "Please enter your name",
				minlength: "Name must be at least 2 characters",
				maxlength: "Name must be maximum 80 characters",
			},
			surname: {
				required: "Please enter your surname",
				minlength: "Surname must be at least 2 characters",
				maxlength: "Surname must be maximum 160 characters",
			},
			email: {
				required: "Please enter your email",
				email: "Please enter a valid email",
				minlength: "Email must be at least 5 characters",
				maxlength: "Email must be maximum 80 characters",
			},
			password: {
				required: "Please enter your password",
				minlength: "Password must be at least 8 characters",
				maxlength: "Password must be maximum 20 characters",
			},
			password_confirmation: {
				required: "Please enter your password confirmation",
				equalTo: "Password confirmation must match password",
				minlength: "Password must be at least 8 characters",
				maxlength: "Password must be maximum 20 characters",
			},
			avatar: {
				required: "Please enter your url avatar",
				minlength: "Avatar url must be at least 7 characters: https://...",
				maxlength: "Avatar url must be maximum 255 characters",
			},
		},
	});




	$("#loginForm").validate({
		rules: {
			email: {
				required: true,
				email: true,
				minlength: 5,
				maxlength: 80,
			},
			password: {
				required: true,
				maxlength: 20,
			},
		},
		messages: {
			email: {
				required: "Please enter your email",
				email: "Please enter a valid email",
				minlength: "Email must be at least 5 characters",
				maxlength: "Email must be maximum 80 characters",
			},
			password: {
				required: "Please enter your password",
				maxlength: "Password must be maximum 20 characters",
			},
		},
	});




	$("#editUserAdminForm").validate({
		rules: {
			name: {
				required: true,
				minlength: 2,
				maxlength: 80,
				checkRegex: [
					{
						regex: /^[A-Za-z0-9-'ñÑ ]+$/,
						msg: "Name must contain only letters, numbers, hyphens, apostrophes and spaces.",
					},
				],
			},
			surname: {
				required: true,
				minlength: 2,
				maxlength: 160,
				checkRegex: [
					{
						regex: /^[A-Za-z0-9-'nñ ]+$/,
						msg: "Surname must contain only letters, numbers, hyphens, apostrophes and spaces.",
					},
				],
			},
			email: {
				required: true,
				email: true,
				minlength: 5,
				maxlength: 80,
			},
			password: {
				required: false,
				minlength: 8,
				maxlength: 20,
				checkRegex: [
					{
						regex: /[A-ZÑ]/,
						msg: "Password must contain at least one uppercase letter.",
					},
					{
						regex: /[a-zñ]/,
						msg: "Password must contain at least one lowercase letter.",
					},
					{
						regex: /\d/,
						msg: "Password must contain at least one number.",
					},
					{
						regex: /[*_,-.:;]/,
						msg: "Password must contain at least one special character: - _ * : ; , .",
					},
				],
			},
			password_confirmation: {
				minlength: 8,
				maxlength: 20,
				equalTo: "#password",
			},
			avatar: {
				minlength: 7,
				maxlength: 255,
				checkRegex: [
					{
						regex: /^(https?:\/\/)([a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)+.*)$/i,
						msg: "Avatar url must be a valid url.",
					},
					{
						regex: /^(https?:\/\/)([a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)+.*)+(?:jpg|png|webp)$/i,
						msg: "Avatar url must be a valid image url: .png .jpg .webp",
					},
				],
			},
			role: {
				required: true,
				checkRegex: [
					{
						regex: /^(admin|user)$/,
						msg: "Role must be admin or user.",
					},
				],
			},
			id: {
				required: true,
				checkRegex: [
					{
						regex: /^[1-9][0-9]*$/,
						msg: "Id must be a positive integer.",
					},
				],
			},
		},
		messages: {
			name: {
				required: "Please enter your name",
				minlength: "Name must be at least 2 characters",
				maxlength: "Name must be maximum 80 characters",
			},
			surname: {
				required: "Please enter your surname",
				minlength: "Surname must be at least 2 characters",
				maxlength: "Surname must be maximum 160 characters",
			},
			email: {
				required: "Please enter your email",
				email: "Please enter a valid email",
				minlength: "Email must be at least 5 characters",
				maxlength: "Email must be maximum 80 characters",
			},
			password: {
				minlength: "Password must be at least 8 characters",
				maxlength: "Password must be maximum 20 characters",
			},
			password_confirmation: {
				equalTo: "Password confirmation must match password",
				minlength: "Password must be at least 8 characters",
				maxlength: "Password must be maximum 20 characters",
			},
			avatar: {
				required: "Please enter your url avatar",
				minlength: "Avatar url must be at least 7 characters: https://...",
				maxlength: "Avatar url must be maximum 255 characters",
			},
			role: {
				required: "Please enter your role",
			},
			id: {
				required: "Please enter your id",
			},
		},
	});




});