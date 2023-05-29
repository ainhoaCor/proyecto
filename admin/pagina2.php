<?php
$conexion = mysqli_connect("localhost", "root", "", "am");

if (!empty($_REQUEST["modificar"])) {
    mysqli_begin_transaction($conexion);
    $sql = "UPDATE stock SET SalesPrice= ?, SupplierPrice = ?, Ud = ?";
    if ($stmt = mysqli_prepare($conexion, $sql)) {
        if (mysqli_stmt_bind_param(
            $stmt,
            "ddi",
            $_REQUEST["SalesPrice"][$_REQUEST["selec"]],
            $_REQUEST["SupplierPrice"][$_REQUEST["selec"]],
            $_REQUEST["Ud"][$_REQUEST["selec"]]
        )) {
            if (mysqli_stmt_execute($stmt)) {
                echo "Se han modificado " . mysqli_affected_rows($conexion) . " " . "lineas";
                mysqli_commit($conexion);
            } else {
                echo "error";
                mysqli_rollback($conexion);
            }
            mysqli_stmt_close($stmt);
        }
    }
} else { ?>
    <h2>Modificar Stock:</h2>
    <br>
    <?php

    $consulta = mysqli_query($conexion, "SELECT * FROM stock");
    while ($campos = mysqli_fetch_row($consulta)) {
        $cont = 0;    ?>

        <table table border="1" bordercolor="666633" cellpadding="2" cellspacing="2">
            <tr>
                <form method="get" action="pagina2.php">
                    <td id="tab"><b>Product Code</b><input type="number" name="CodProd[]" value="<?= $campos[0] ?>" readonly></td>
                    <td id="tab"><b>Name</b><input type="text" name="NameProd[]" value="<?= $campos[1] ?>" readonly></td>
                    <td id="tab"><b>Supplier</b><input type="text" name="Supplier[]" value="<?= $campos[2] ?>" readonly></td>
                    <td id="tab"><b>Description</b><input type="text" name="Description[]" value="<?= $campos[3] ?>" readonly></td>
                    <td id="tab"><b>Sales Price</b><input type="number" name="SalesPrice[]" value="<?= $campos[4] ?>"></td>
                    <td id="tab"><b>Supplier Price</b><input type="number" name="supplierPrice[]" value="<?= $campos[5] ?>"></td>
                    <td id="tab"><b>Ud:</b><input type="number" name="Ud[]" value="<?= $campos[6] ?>"></td>


                    <td>Seleccionar:<input type="radio" name="selec" value="<?= $cont ?>" required></td>
            </tr>
        <?php $cont++;
    } ?>
        </table>
        <br>
        <input type="submit" name="modificar" value="Modificar">
        </form>
    <?php
}
