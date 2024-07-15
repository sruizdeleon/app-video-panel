window.addEventListener("load", function () {
	// Show password icon
	showPassword = document.querySelector("#btn-password");

	showPassword.addEventListener("click", () => {
				password1 = document.querySelector("#password");

				if (password1.type === "text") {
					password1.type = "password";
					showPassword.classList.remove("fa-eye-slash");
				} else {
					password1.type = "text";
					showPassword.classList.toggle("fa-eye-slash");
				}
	});

	// Show password confirmation icon

	showPasswordConfirmation = document.querySelector("#btn-password-confirmation");

	showPasswordConfirmation.addEventListener("click", () => {
		password2 = document.querySelector("#password_confirmation");

		if (password2.type === "text") {
			password2.type = "password";
			showPasswordConfirmation.classList.remove("fa-eye-slash");
		} else {
			password2.type = "text";
			showPasswordConfirmation.classList.toggle("fa-eye-slash");
		}
	});

});
