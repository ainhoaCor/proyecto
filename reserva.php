<?php include('header.php'); ?>

	<section class="container wrapper">
		<div class="d-flex justify-content-center">
			<form id="formu">
				<div class="mb-3 w-70">
					<h3><label for="name" class="form-label">Reserva de zona VIP</label></h3><br>
					<label for="name" class="form-label">Nombre y apellidos</label>
					<input type="text" id="nom" name="nom" class="form-control" required>
				</div>
				<div class="mb-3">
					<label for="contacto" class="form-label">Numero de contacto</label>
					<input type="number" id="tlf" name="tlf" max="9" class="form-control" required>
				</div>
				<div class="mb-3">
					<label for="personas" class="form-label">Numero de personas *maximo 20 personas*</label>
					<input type="number" id="per" name="per" class="form-control" min="1" max="20" required>
				</div>
				<div class="mb-3">
					<label for="personas" class="form-label">Fecha</label>
					<input type="date" id="fecha" name="fecha" class="form-control" required>
				</div>
				<div class="mb-3">
					<label for="disabledSelect" class="form-label">Hora</label>
					<select id="hora" name="hora" class="form-select" required>
						<option>Selecciona una hora</option>
						<option>23:00</option>
						<option>00:00</option>
						<option>01:00</option>
						<option>02:00</option>
						<option>03:00</option>
					</select>

					<br><button type="button" id="botonForm" class="btn btn-dark" onclick="confirmar()">Aceptar</button>
			</form>
			<br><br>

			<div class="" id="div">		
				<p id="p"></p>
			</div>

		</div>


		<script>
			function confirmar() {
				var nom = document.getElementById("nom").value;
				var tlf = document.getElementById("tlf").value;
				var per = document.getElementById("per").value;
				var hora = document.getElementById("hora").value;
				var fecha = document.getElementById("fecha").value;

				//asegurar que no se pueda elegir una fecha menor al dia actual
				var fechaActual = new Date();

				//formatear la fecha actual al formato AAAA-MM-DD
				var year = fechaActual.getFullYear();
				
				//los meses en js estan indexados desde 0, por lo que se le suma 1 al resultado para obtener el numero de mes real
				var mes = ('0' + (fechaActual.getMonth() + 1)).slice(-2);//slice(2) para que el mes tenga dos digitos
				var dia = ('0' + fechaActual.getDate()).slice(-2);
				var fechaActualFormateada = year + '-' + mes + '-' + dia;

				var error="";
				var p = document.getElementById("p");

				if (nom != "" && per != "" && per <= 20 && tlf.length == 9  && fecha >= fechaActualFormateada && hora !="Seleccione una fecha")  {
				
					const xhttp = new XMLHttpRequest();
					xhttp.onreadystatechange = function () {
						if (this.readyState == 4 && this.status == 200) {
							var response = xhttp.responseText;				
							if(response=="Reserva realizada!"){

								p.innerHTML = response;
								p.setAttribute("class", "alert alert-success");
								document.getElementById("div").appendChild(p);
								
							}else{
							
								p.innerHTML = response;
								p.setAttribute("class", "alert alert-danger");		
								document.getElementById("div").appendChild(p);
	
							}

						}
					};

					xhttp.open("GET", "crear_reserva.php?nombre=" + nom + "&telefono=" + tlf + "&persona=" + per + "&fecha=" + fecha + "&hora=" + hora, true);
					xhttp.send();

				} else {

					if(nom == ""){
						error += "El nombre no puede estar vacio - ";
					}
					if(per =="" || per== 0|| per > 20){
						error += "El nº de personas no puede estar vacio o ser superior a 20 - ";
					}
					if(tlf.length < 9){
						error += "El telefono esta vacio o no es un formato correcto - ";

					}if(fecha < fechaActualFormateada){
						error += "La fecha no puede ser anterior a la actual - ";

					}if(hora == "Selecciona una hora"){
						error += "Selecciona una hora";
					}
					
					p.innerHTML = error;
					p.setAttribute("class", "alert alert-danger");
					document.getElementById("div").appendChild(p);
					
				}

			}

		</script>


	</section>

<?php include('footer.html'); ?>