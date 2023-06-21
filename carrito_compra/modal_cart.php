<!-- MODAL CARRITO -->
<div class="modal fade" id="modal_cart" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Mi carrito</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">

				<div class="p-2">
					<ul class="list-group mb-3">
						<?php
						if (isset($_SESSION['carrito'])) {
							$total = 0;
							for ($i = 0; $i <= count($miCarro) - 1; $i++) {
								if (isset($miCarro[$i])) {
									if ($miCarro[$i] != NULL) { ?>
										<li class="list-group-item d-flex justify-content-between lh-condensed">
											<div class="row col-12">
												<div class="col-6 p-0" style="text-align: left; color: #000000;">
													<h6 class="my-0">Cantidad: <?php echo $miCarro[$i]['Ud'] ?> :
														<?php echo $miCarro[$i]['NameProd'];

														?></h6>
												</div>
												<div class="col-6 p-0" style="text-align: right; color: #000000;">
													<span class="text-muted" style="text-align: right; color: #000000;">
														<?php echo $miCarro[$i]['Price'] * $miCarro[$i]['Ud'];    ?> €
													</span>
												</div>
											</div>
										</li>
						<?php
										$total = $total + ($miCarro[$i]['Price'] * $miCarro[$i]['Ud']);
									}
								}
							}
						}
						?>
						<li class="list-group-item d-flex justify-content-between">
							<span style="text-align: left; color: #000000;">Total (EUR)</span>
							<strong style="text-align: left; color: #000000;">
								<?php
								if (isset($_SESSION['carrito'])) {
									$total = 0;

									// for para suma total del carrito
									for ($i = 0; $i <= count($miCarro) - 1; $i++) {
										if (isset($miCarro[$i])) {
											if ($miCarro[$i] != NULL) {
												$total = $total + ($miCarro[$i]['Price'] * $miCarro[$i]['Ud']);
											}
										}
									}
								}
								if (!isset($total)) {
									$total = '0';
								} else {
									$total = $total;
								}
								echo $total; ?> €</strong>
						</li>
					</ul>
				</div>

			</div>

			<?php if ($total != 0) { ?>
				<div class="modal-footer">
					<button type="button" class="btn" style="background-color:#c93af5" data-bs-dismiss="modal">Cerrar</button>
					<a type="button" class="btn" style="background-color:#c93af5" href="borrarcarro.php">Vaciar carrito</a>
					<a type="button" class="btn" style="background-color:#c93af5" href="mi_pedido.php">Continuar pedido</a>
				</div><?php
					} else { ?>
				<div class="modal-footer">
					<button type="button" class="btn" style="background-color:#c93af5" data-bs-dismiss="modal">Cerrar</button>
				</div><?php
					} ?>
		</div>
	</div>
</div>
