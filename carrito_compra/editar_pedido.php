<?php 
include('header.php');
include("modal_cart.php");
?>
    <!-- CONTAINER-->
    <div class="center mt-5">
        <div class="card pt-3">
            <p style="font-weight: bold; color:  #c93af5; font-size: 22px;">Mi pedido</p>
            <div class="container-fluid p-2">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Imagen</th>
                            <th scope="col">Cantidad</th>
                            <th scope="col">Artículo</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <div class="container_card">

                            <?php
                            if (isset($_SESSION['carrito'])) {
                                $total = 0;
                                for ($i = 0; $i <= count($miCarro) - 1; $i++) {
                                    if (isset($miCarro[$i])) {
                                        if ($miCarro[$i] != NULL) {   
                                            if ($miCarro[$i]['CodProd'] != 'portes') { ?>
                                                <tr>
                                                    <th scope="row" style="vertical-align: middle;"><?php echo $i; ?></th>
                                                    <td>
                                                        <img src="img/<?php echo $miCarro[$i]['NameProd'] ?>.jpg" height="200px" width="250px">
                                                    </td>
                                                    <td style="vertical-align: middle;"><?php echo $miCarro[$i]['Ud'] ?></td>
                                                    <td style="vertical-align: middle;"><?php echo $miCarro[$i]['NameProd'] ?></td>
                                                    <td style="vertical-align: middle;"><?php echo $miCarro[$i]['Price'] ?>€</td>
                                                    <td style="vertical-align: middle;"><?php echo $miCarro[$i]['Price'] * $miCarro[$i]['Ud']; ?>€</td>
                                                    <td style="vertical-align: middle;">
                                                        <form id="form3" name="form2" method="post" action="cart.php">
                                                            <input name="id2" type="hidden" id="id2" value="<?php print $i;   ?>" />
                                                            <button type="image" name="imageField3" class="btn-lg bg-danger text-white " style="border:0px;" data-toggle="tooltip" data-placement="top" title="Remove item"><i class="fas fa-trash-alt"></i> Borrar
                                                            </button>
                                                        </form>
                                                </tr>
                                            <?php } ?>
                                     <?php
                                            $total = $total + ($miCarro[$i]['Price'] * $miCarro[$i]['Ud']);
                                        }
                                    }
                                }
                            }
                            ?>

                    </tbody>
                </table>


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
                        if (!isset($total)) $total = '0';
                        else $total = $total;
                        echo number_format($total, 3, ',', '.');  ?> €</strong>
                </li>

                <a type="button" class="btn btn-dark my-4" href="../Carrito de compra paso 3/index.php">Continuar pedido</a>

            </div>
        </div>

    </div>
    </div>

<?php include('../footer.html') ?>