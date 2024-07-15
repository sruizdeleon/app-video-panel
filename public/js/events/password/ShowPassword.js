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

});
