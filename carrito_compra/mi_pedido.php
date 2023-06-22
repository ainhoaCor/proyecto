<?php
include("header.php");
include("modal_cart.php"); ?>
    <!-- CONTAINER-->

    <!-- TABLA DE RESUMEN PEDIDO MODIFICABLE -->
    <div class="row d-flex h-100 justify-content-center align-items-center">
        <div class="col">
            <div class="table-responsive">
                <table class="table">
                    <h3 style="color:  #c93af5; text-align:center;">Resumen pedido</h3>
                    <br>
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Imagen</th>
                            <th scope="col">Cantidad</th>
                            <th scope="col">Artículo</th>
                            <th scope="col">Precio Unidad</th>
                            <th scope="col">Total</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        if (isset($_SESSION['carrito'])) {
                            $total = 0;
                            for ($i = 0; $i <= count($miCarro) - 1; $i++) {
                                if (isset($miCarro[$i])) {
                                    if ($miCarro[$i] != NULL) { ?>
                                        <?php if ($miCarro[$i]['CodProd'] != 'portes') { ?>
                                            <tr>
                                                <th scope="row" style="vertical-align: middle;"><?php echo $i; ?></th>
                                                <td>
                                                    <img src="img/<?php echo $miCarro[$i]['NameProd'] ?>.png" height="100px" width="110px">
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <form id="form2" name="form1" method="post" action="cart.php">
                                                        <input name="id" type="hidden" id="id" value="<?php print $i; ?>" class="align-middle" />
                                                        <input name="cantidad" type="number" id="cantidad" style="width:50px;" class="align-middle text-center" value="<?php print $miCarro[$i]['Ud']; ?>" size="1" min="0" max="4" />
                                                        <input type="image" name="imageField3" src="img/actualiza.png" value="" class="btn btn-sm btn-primary btn-rounded" />
                                                    </form>
                                                </td>
                                                <td style="vertical-align: middle;"><?php echo $miCarro[$i]['NameProd'] ?></td>
                                                <td style="vertical-align: middle;"><?php echo $miCarro[$i]['Price'] ?>€</td>
                                                <td style="vertical-align: middle;"><?php echo $miCarro[$i]['Price'] * $miCarro[$i]['Ud']; ?>€</td>
                                                <td>
                                                    <form id="form3" name="form2" method="post" action="cart.php">
                                                        <input name="id2" type="hidden" id="id2" value="<?php print $i;   ?>" />
                                                        <button type="image" name="imageField3" class="btn-lg bg-danger text-white" style="border:3px; margin-top:50px;" data-toggle="tooltip" data-placement="top" title="Remove item"><i class="fas fa-trash-alt"></i> Borrar
                                                        </button>
                                                </td>
                                                </form>
                                            </tr>
                                        <?php } 
                                        $total = $total + ($miCarro[$i]['Price'] * $miCarro[$i]['Ud']);
                                    }
                                }
                            }
                        }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- PRECIO TOTAL QUE CAMBIA SI SE MODIFICA LAS CANTIDADES -->
    <ul class="list-group">
        <li class="list-group-item d-flex justify-content-between">
            <span style="text-align: left; color: #000000;"><strong>Total (EUR)</strong></span>
            <strong style="text-align: left; color: #000000;">
                <?php
                if (isset($_SESSION['carrito'])) {
                    $total = 0;
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
                echo number_format($total, 2, ',', '.');  ?> €</strong>
        </li>


        <hr>

        <?php

        // DATOS DE ENVIO 
        if (isset($_SESSION['email']) && !empty($_SESSION['carrito'] && $_SESSION['carrito'] != NULL)) {
            // Obtener los datos de envio de la base de datos utilizando $_SESSION['email']
            $db = new PDO('mysql:host=localhost; dbname=am', "root");
            $consulta = $db->prepare("SELECT * FROM clients WHERE email=:email");
            $consulta->bindParam(':email', $_SESSION['email']);
            $consulta->execute();
            $cliente = $consulta->fetch(PDO::FETCH_ASSOC);
            

        ?>
            <!-- datos cliente -->
            <div class="container pt-3">
                <form class="row g-3 needs-validation" action="finalizar_pedido.php" method="POST" novalidate>
                    <p style="font-weight: bold; color: #c93af5; font-size: 22px;">Datos de envío</p>

                    <input type="hidden" name="dato" value="insertar">
                    <div class="col-md-6">
                        <label for="validationCustom01" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="validationCustom01" name="nombre" value="<?php echo $cliente["Name"]; ?>" required>
                    </div>
                    <div class="col-md-6">
                        <label for="validationCustom02" class="form-label">Apellidos</label>
                        <input type="text" class="form-control" id="validationCustom02" name="apellidos" value="<?php echo $cliente["LastName"]; ?>" required>
                    </div>

                    <div class="col-md-6">
                        <label for="validationCustom03" class="form-label">Direccion</label>
                        <input type="text" class="form-control" id="validationCustom03" name="direccion" value="<?php echo $cliente["Address"]; ?>" required>

                    </div>
                    <div class="col-md-6">
                        <label for="validationCustom04" class="form-label">Teléfono</label>
                        <input type="text" class="form-control" id="validationCustom04" name="telefono" value="<?php echo $cliente["Phone"]; ?>" required>

                    </div>


                    <button class="btn btn-success mb-4" type="submit">Pagar y finalizar</button>

                </form>
            </div> <?php

                } else { ?>
            <!-- La sesión no esta iniciada -->
            <div class="alert alert-warning d-flex align-items-center" role="alert">
                <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Warning:" style="font-size: smaller;">
                    <use xlink:href="#exclamation-triangle-fill" />
                </svg>
                <div>
                    Es necesario iniciar sesión para finalizar el pedido ->
                    <a class="navbar-brand" href="SignUp.php">Sign up </a>
                    <a class="navbar-brand" href="LogIn.php"> / Log in</a><br>
                    Compruebe que su carrito no esté vacío 
                </div>

            </div>
        <?php
                } ?>




<?php include('../footer.html') ?>