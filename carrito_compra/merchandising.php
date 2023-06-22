<?php
	include("header.php");
	include("modal_cart.php");?>
	<!-- CONTAINER-->
	<div class="container">
		<p style="font-weight: bold; color: #c93af5; font-size: 26px; margin-left:10px">Merchandising</p>
		<?php
		$conexion = mysqli_connect("localhost", "root", "", "am");
		$busqueda = mysqli_query($conexion, "SELECT * FROM stock ");
		$numero = mysqli_num_rows($busqueda); ?>

		<h5 class="card-tittle">Resultados (<?php echo $numero; ?>)</h5>
		<div class="row">
			<div class="row d-flex h-100 justify-content-center align-items-center">
				<?php while ($resultado = mysqli_fetch_assoc($busqueda)) {

				?>
					<div class="col-md-6 text-center">
						<form id="formulario" name="formulario" method="post" action="cart.php">
							<div class="blog-post">
								<img class="zoom" src="img/<?php echo $resultado["NameProd"]; ?>.png">

								<a class="category">
									<?php echo $resultado["Price"]; ?>€
								</a>
								<div class="text-content">
									<input name="CodProd" type="hidden" id="CodProd" value="<?php echo $resultado["CodProd"]; ?>" />
									<input name="Price" type="hidden" id="Price" value="<?php echo $resultado["Price"]; ?>" />
									<input name="NameProd" type="hidden" id="NameProd" value="<?php echo $resultado["NameProd"]; ?>" />
									<input name="Ud" type="hidden" id="Ud" value="1" class="pl-2" />
									<div class="card-body">
										<h5 class="card-title"><?php echo $resultado["NameProd"]; ?></h5>
										<p><?php echo $resultado["Description"]; ?></p>
										<button class="btn btn-dark" type="submit"><i class="fas fa-shopping-cart"></i> Añadir al carrito</button>
									</div>
								</div>
							</div>
						</form>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>

	
<?php include('../footer.html') ?>
	