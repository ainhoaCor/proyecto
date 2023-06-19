<?php
$db = new PDO('mysql:host=localhost; dbname=am', "root", "");
$consulta = $db->prepare("SELECT * FROM bookings");
$consulta->execute();
$resul = $consulta->fetchAll(PDO::FETCH_ASSOC); ?>

<div class="container-fluid p-2">
    <h2>Registro de reservas:</h2>
    <br>
    <table class="responsive-table">
        <tr>
            <th scope="row" style="vertical-align: middle;"> Nombre</th>
            <th scope="row" style="vertical-align: middle;"> Telefono </th>
            <th scope="row" style="vertical-align: middle;"> Nº Personas </th>
            <th scope="row" style="vertical-align: middle;"> Fecha Reserva </th>
            <th scope="row" style="vertical-align: middle;"> Hora</th>

        </tr>
        <?php
        foreach ($resul as $r) {
            echo "         
        <tr>
            <td style='vertical-align: middle;'>{$r['Name']}</td>
            <td style='vertical-align: middle;'>{$r['Phone']}</td>
            <td style='vertical-align: middle;'>{$r['NumPeople']}</td>
            <td style='vertical-align: middle;'>{$r['Date']}</td>
            <td style='vertical-align: middle;'>{$r['Time']}</td>
        </tr>
    ";
        }
        ?>
    </table> 
</div>