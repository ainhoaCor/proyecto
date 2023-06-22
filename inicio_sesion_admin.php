<?php include('header.php'); ?>

	<!-- SECTION -->
	<section class="container wrapper">
		<div class="d-flex justify-content-center">
			<form id="formAdmin">
				<div class="mb-3 w-70">
					<h3><label for="exampleInputEmail1" class="form-label">Inicio sesión Admin</label></h3>
					<label for="exampleInputEmail1" class="form-label">Email</label>
					<input type="text" class="form-control" id="email" required>
				</div>
				<div class="mb-3">
					<label for="password" class="form-label">Password</label>
					<input type="password" class="form-control" id="password" required>
				</div>

				<br>
				<button type="button" id="botonAdmin" class="btn btn-dark" onclick="confirmar()">Aceptar</button>
				<br>
				<br>
				<div class="alert alert-danger" style="display:none" id="error" role="alert">
					Error de autenticación
				</div>
			</form>
		</div>

		<script>
			function confirmar() {
				var email = document.getElementById("email").value;
				var password = document.getElementById("password").value;

				const xhttp = new XMLHttpRequest();
				xhttp.onreadystatechange = function () {
					if (this.readyState == 4 && this.status == 200) {
						var response = xhttp.responseText;
						// console.log(response);
						if (response == 'Admin') {
							window.location.href = "admin/pagina_admin.php";
						} else {
							document.getElementById('error').style.display = "block";


						}
					}
				};

				xhttp.open("GET", "comprobar_sesion.php?email=" + email + "&password=" + password, true);
				xhttp.send();

			}

		</script>
	</section>

	<?php include('footer.html'); ?>