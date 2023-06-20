<?php
$conexion = mysqli_connect("localhost", "root", "", "am");

if (isset($_REQUEST["modificar"])) {
    $tel = $_REQUEST["Phone"][$_REQUEST['selec']];
    mysqli_begin_transaction($conexion);
    $sql = "UPDATE bookings SET Name= ?, NumPeople = ?, Date = ?, Time= ? WHERE Phone = ? ";
    if ($stmt = mysqli_prepare($conexion, $sql)) {
        if (mysqli_stmt_bind_param(
            $stmt,
            "sisss",
            $_REQUEST["Name"][$_REQUEST["selec"]],
            $_REQUEST["NumPeople"][$_REQUEST["selec"]],
            $_REQUEST["Date"][$_REQUEST["selec"]],
            $_REQUEST["Time"][$_REQUEST["selec"]],
            $_REQUEST["Phone"][$_REQUEST['selec']]
        )) {
            if (mysqli_stmt_execute($stmt)) {
                mysqli_commit($conexion);
                header("Location: pagina_admin.php");
            } else {
                echo "Fallo en la modificacion";
                mysqli_rollback($conexion);
            }
            mysqli_stmt_close($stmt);
        }
    }
} else { ?>
    <h2>Modificar reservas:</h2>
    <br>
    <form method="get" action="modificarReserva.php">
        <table class="responsive-table">
            <?php
            $consulta = mysqli_query($conexion, "SELECT * FROM bookings");
            $cont = 0;
            while ($campos = mysqli_fetch_row($consulta)) {
            ?>
                <tr>
                    <td id="tab"><b>Nombre</b><input type="text" name="Name[]" value="<?= $campos[0] ?>"></td>
                    <td id="tab"><b>Telefono</b><input type="text" name="Phone[]" value="<?= $campos[1] ?>" readonly></td>
                    <td id="tab"><b>Nº de personas</b><input type="number" name="NumPeople[]" value="<?= $campos[2] ?>"></td>
                    <td id="tab"><b>Fecha</b><input type="text" name="Date[]" value="<?= $campos[3] ?>" readonly></td>
                    <td id="tab"><b>Hora</b><input type="text" name="Time[]" value="<?= $campos[4] ?>"></td>
                    <td>Seleccionar:<input type="radio" name="selec" value="<?= $cont ?>" required></td>
                </tr>
            <?php $cont++;
            } ?>
        </table>
        <br>
        <button type="submit" name="modificar" style="width:70px; height:30px; font-size:15px;">Modificar</button>
    </form>
<?php
}
mysqli_close($conexion);
