<?php session_start();

//aqui empieza el carrito
if (isset($_SESSION['carrito']) || isset($_POST['NameProd'])) {
	if (isset($_SESSION['carrito'])) {
		$miCarro = $_SESSION['carrito'];
		if (isset($_POST['NameProd'])) {
			$titulo = $_POST['NameProd'];
			$precio = $_POST['Price'];
			$cantidad = $_POST['Ud'];
			$ref = $_POST['CodProd'];
			$imagen = $_SESSION['image'];
			$index = -1; //indice en el que se encuentra el producto en el carrito


			for ($i = 0; $i <= count($miCarro) - 1; $i++) {
				//el producto ya esta en el carrito,
				// se actualiza la cantidad del producto sumandole el valor de $cantidad obtenido del formulario.
				if ($ref == $miCarro[$i]['CodProd']) {
					$index = $i;
				}
			}
			// el producto no esta en el carrito
			if ($index != -1) {
				$cantidad2 = $miCarro[$index]['Ud'] + $cantidad;
				//  Se agrega un nuevo elemento al carrito
				$miCarro[$index] = array("NameProd" => $titulo, "Price" => $precio, "Ud" => $cantidad2, "CodProd" => $ref, "image" => $imagen);
			} else {
				$miCarro[] = array("NameProd" => $titulo, "Price" => $precio, "Ud" => $cantidad, "CodProd" => $ref);
			}
		}
	} else {
		$titulo = $_POST['NameProd'];
		$precio = $_POST['Price'];
		$cantidad = $_POST['Ud'];
		$ref = $_POST['CodProd'];
		$miCarro[] = array("NameProd" => $titulo, "Price" => $precio, "Ud" => $cantidad, "CodProd" => $ref);
	}


	// Actualizar carrito mi_pedido.php
	if (isset($_POST['cantidad'])) {
		$id = $_POST['id'];
		$cuantos = $_POST['cantidad'];
		if ($cuantos < 1) {
			$miCarro[$id] = NULL;
		} else {
			$miCarro[$id]['Ud'] = $cuantos;
		}
	}
	//Borrar productos carrito
	if (isset($_POST['id2'])) {
		$id = $_POST['id2'];
		unset($miCarro[$id]);
		$miCarro = array_values($miCarro);
	}



	$_SESSION['carrito'] = $miCarro;
}




if (isset($_SESSION['carrito'])) {

	for ($i = 0; $i <= count($miCarro) - 1; $i++) {
		if ($miCarro[$i] != NULL) {
			$totalc = $miCarro['Ud'];
			$totalc++;
			$totalcantidad += $totalc;
		}
	}
}





header("Location: " . $_SERVER['HTTP_REFERER'] . "");
