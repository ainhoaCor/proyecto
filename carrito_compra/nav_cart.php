<?php
if (isset($_SESSION['carrito'])) {
  $miCarro = $_SESSION['carrito'];
}

// contamos nuestro carrito
if (isset($_SESSION['carrito'])) {
  for ($i = 0; $i <= count($miCarro) - 1; $i++) {
    if (isset($miCarro[$i])) {
      if ($miCarro[$i] != NULL) {
        if (!isset($miCarro['Ud'])) {
          $miCarro['Ud'] = '0';
        } else {
          $miCarro['Ud'] = $miCarro['Ud'];
        }
        $total_cantidad = $miCarro['Ud'];
        $total_cantidad++;
        if (!isset($totalcantidad)) {
          $totalcantidad = '0';
        } else {
          $totalcantidad = $totalcantidad;
        }
        $totalcantidad += $total_cantidad;
      }
    }
  }
}

//declaramos variables
if (!isset($totalcantidad)) {
  $totalcantidad = '';
} else {
  $totalcantidad = $totalcantidad;
}

?>

<!-- NAVBAR -->
<?php
if (isset($_SESSION['email'])) { ?>
  <nav class="navbar navbar-expand-lg" style="background-color:black; color:white;">
    <div class="container-fluid">
      <a class="navbar-brand" id="miCarrito" href="#"><?php echo $_SESSION['email'] ?></a>
      <a class="navbar-brand" id="logOut" href="borrarSession.php">Log Out</a>
      <a class="navbar-brand" id="miCarrito" href="#">Mi carrito -> </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" id="botonCarro" data-bs-toggle="modal" data-bs-target="#modal_cart" style="color: #c93af5; cursor:pointer;"><i class="fas fa-shopping-cart"></i> <?php echo $totalcantidad; ?></a>
          </li>
        </ul>
      </div>
    </div>
  </nav> <?php
} else { ?>
  <nav class="navbar navbar-expand-lg" style="background-color:black; color:white;">
    <div class="container-fluid">
      <a class="navbar-brand" id="miCarrito" href="SignUp.php">Sign up</a>
      <a class="navbar-brand" id="miCarrito" href="LogIn.php">Log in</a>
      <a class="navbar-brand" id="miCarrito" href="#">Mi carrito -> </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" id="botonCarro" data-bs-toggle="modal" data-bs-target="#modal_cart" style="color: #c93af5; cursor:pointer;"><i class="fas fa-shopping-cart"></i> <?php echo $totalcantidad; ?></a>
          </li>
        </ul>
      </div>
    </div>
  </nav> <?php
}

          