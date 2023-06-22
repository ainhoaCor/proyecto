<?php
	include("header.php");?>

    <!-- SECTION -->
    <section class="container wrapper">

        
        <div class="d-flex justify-content-center">			
			<form id="formu">
				<div class="mb-3 w-70">
					<h3><label for="exampleInputEmail1" class="form-label">Registrarse</label></h3>

					<label for="exampleInputEmail1" class="form-label">Nombre</label>
					<input type="text" name="nombre" id="nombre" class="form-control" required>
				</div>
				<div class="mb-3">
					<label for="apellidos" class="form-label">Apellido</label>
					<input type="text" name="apellido" class="form-control" id="apellido">
				</div>
				<div class="mb-3">
					<label for="email" class="form-label">Email</label>
					<input type="text" name="email" class="form-control" id="email">
				</div>
				<div class="mb-3">
					<label for="telefono" class="form-label">Telefono</label>
					<input type="text" name="telefono" class="form-control" id="telefono" min="1" max="9">
				</div>
				<div class="mb-3">
					<label for="disabledSelect" class="form-label">Direccion (Calle nombre numero, CP Ciudad)</label>
                    <input type="text" name="direccion" class="form-control" id="direccion">
                </div>
                <div class="mb-3">
					<label for="disabledSelect" class="form-label">Password (mínimo una mayúscula, un carácter especial y un número)</label>
                    <input type="password" name="password" class="form-control" id="password">
                </div>

					<br><button type="button" id="botonForm" class="btn btn-dark" onclick="confirmar()">Aceptar</button>
                       <a href="LogIn.php">¿Ya estas registrado? Log in</a>
                <br><br>
                <div id="div" class="">
                    <p id="p"></p>
                </div>
                </form>
		</div>


        

        <script>
            function confirmar() {
                var nombre=document.getElementById("nombre").value;
                var ape=document.getElementById("apellido").value;
                var telf=document.getElementById("telefono").value;
                var dir=document.getElementById("direccion").value;
                var email = document.getElementById("email").value;
                var pass = document.getElementById("password").value;
             

                var telfExp=/^\d{9}$/;
                var emailExp=/^[a-zA-Z0-9_.+-]+@(gmail|hotmail|yahoo)\.(es|com)$/;
                var dirExp=/^[A-Za-záéíóúü\s]+ \d{1,3}, \d{5} [A-Za-záéíóúü\s]+$/;
                var passExp=/^(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*()])[A-Za-z\d!@#$%^&*()]{8,}$/;
                var error="";

                var p=document.getElementById("p");
                var div=document.getElementById("div");
                if(telfExp.test(telf) && emailExp.test(email) && dirExp.test(dir)  && nombre !== '' && ape !== '' && pass !==''){
                    const xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            var response = xhttp.responseText;
                                p.innerHTML = response;
                                div.setAttribute("class", "alert alert-success"); 
                                div.appendChild(p);
                            
                        }
                    };

                    xhttp.open("GET", "registroCliente.php?email=" + email + "&password=" + pass + "&nombre=" + nombre + 
                    "&apellido=" + ape + "&telefono=" + telf + "&direccion=" + dir, true);
                    xhttp.send();
                    
                }else{
                    if(nombre == ""){
                        error += "El nombre no puede estar vacio -";
                    }

                    }if(ape == ""){
                        error += "El apellido no puede estar vacio -";
                    }
                    if(!telfExp.test(telf)){
                        error +="Formato de telefono incorrecto -";
                    }
                    if(!emailExp.test(email)){
                        error +="Formato de email incorrecto -";

                    }
                    if(!dirExp.test(dir)){
                        error +="Formato de email incorrecto -";

                    }
                    if(!passExp.test(pass)){
                        error +="La password tiene que tener una letra mayúscula, al menos un número y al menos un carácter especial -";

                    }
                   
                    div.setAttribute("class", "alert alert-danger"); 
                    p.innerHTML=error;
                }
                

        </script>




    </section>

    <?php include('../footer.html') ?>