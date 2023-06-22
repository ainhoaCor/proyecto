<?php include('header.php'); ?>

	<!-- CONTAINER-->
	<div class="texto">
		<p>En AM, siempre tenemos eventos especiales y DJ invitados, por lo que cada noche es una experiencia única.
			Desde fiestas temáticas hasta actuaciones en vivo, siempre tenemos algo emocionante para ofrecer.
			La seguridad es nuestra máxima prioridad, por lo que contamos con un equipo de seguridad altamente
			capacitado y medidas de seguridad en todo momento para garantizar que todos los que visitan nuestra
			discoteca tengan una experiencia segura y agradable.
			¡Ven y únete, te esperamos!</p>
	</div>
	<br>
	
	<!-- CARRUSEL CON IMAGENES -->
	<section class="container wrapper">
		<div class="row">
			<div class="col-md-6">
				<div id="carouselExample" class="carousel slide w-100">
					<div class="carousel-indicators">
						<button type="button" data-bs-target="#carouselExample" data-bs-slide-to="0" class="active"
							aria-current="true" aria-label="Slide 1"></button>
						<button type="button" data-bs-target="#carouselExample" data-bs-slide-to="1"
							aria-label="Slide 2"></button>
						<button type="button" data-bs-target="#carouselExample" data-bs-slide-to="2"
							aria-label="Slide 3"></button>
						<button type="button" data-bs-target="#carouselExample" data-bs-slide-to="3"
							aria-label="Slide 4"></button>
						<button type="button" data-bs-target="#carouselExample" data-bs-slide-to="3"
							aria-label="Slide 5"></button>
					</div>

					<div class="carousel-inner">
						<div class="carousel-item active">
							<img class="d-block" src="4.2.jpg" alt="Primera Imagen">
						</div>
						<div class="carousel-item">
							<img class="d-block" src="1.2.jpg" alt="Segunda Imagen">
						</div>
						<div class="carousel-item">
							<img class="d-block" src="3.2.jpg" alt="Tercera Imagen">
						</div>
						<div class="carousel-item">
							<img class="d-block" src="2.png" alt="Cuarta Imagen">
						</div>
					</div>
					<button class="carousel-control-prev" type="button" data-bs-target="#carouselExample"
						data-bs-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="visually-hidden"></span>
					</button>
					<button class="carousel-control-next" type="button" data-bs-target="#carouselExample"
						data-bs-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="visually-hidden"></span>
					</button>
				</div>
			</div>

			<div class="col-md-6">
				<div id="tabla">
					
				</div>
				<script>
					const xhttp = new XMLHttpRequest();
					xhttp.onreadystatechange = function () {
						if (this.readyState == 4 && this.status == 200) {
							var res = xhttp.responseText;
							document.getElementById("tabla").innerHTML = res;

						}
					};

					xhttp.open("GET", "mostrar_eventos.php", true);
					xhttp.send();

				</script>
			</div>
		</div>
	</section>

<?php include('footer.html'); ?>