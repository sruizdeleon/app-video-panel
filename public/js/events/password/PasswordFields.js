window.addEventListener("load", function () {
	// Show password icon


	// Ocultar el botón de Remove al cargar
	document.getElementById("buttonRemovePassword").style.display = "none";

	// Script para añadir la porción de código HTML
	document.getElementById("buttonEditPassword").addEventListener("click", function () {
		const passwordHtml = `
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" autocomplete="new-password">
            <span id="btn-password" class="fa fa-fw fa-eye password-icon show-password"></span>
        </div>
        <div class="form-group">
            <label for="password_confirmation">Confirm your password</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" autocomplete="new-password">
            <span id="btn-password-confirmation" class="fa fa-fw fa-eye password-icon show-password"></span>
        </div>
    `;

		// Añade el HTML al final de un contenedor, por ejemplo, un div con ID 'passwordContainer'
		document.getElementById("passwordContainer").insertAdjacentHTML("beforeend", passwordHtml);

		// Mostrar el botón de Remove
		document.getElementById("buttonRemovePassword").style.display = "block";

		document.getElementById("buttonEditPassword").style.display = "none";


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

	// Script para eliminar la porción de código HTML
	document.getElementById("buttonRemovePassword").addEventListener("click", function () {
		const passwordContainer = document.getElementById("passwordContainer");

		// Elimina todos los elementos hijos del contenedor
		while (passwordContainer.firstChild) {
			passwordContainer.removeChild(passwordContainer.firstChild);
		}

		// Ocultar el botón de Remove
		document.getElementById("buttonRemovePassword").style.display = "none";
		document.getElementById("buttonEditPassword").style.display = "block";
	});
});
