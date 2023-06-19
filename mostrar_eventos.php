<?php

$db = new PDO('mysql:host=localhost; dbname=am', "root", "");
$consulta = $db->prepare("SELECT * FROM events");
$consulta->execute();
$resul = $consulta->fetchAll(PDO::FETCH_ASSOC); ?>

    <table class="responsive-table">
        <tr>
            <th scope="row" style="vertical-align: middle;"> Evento </th>
            <th scope="row" style="vertical-align: middle;"> Fecha </th>
            <th scope="row" style="vertical-align: middle;"> Hora </th>
            <th scope="row" style="vertical-align: middle;"> Colaboracion</th>
        </tr>
        <?php
        foreach ($resul as $r) {
            echo "         
        <tr>
            <td style='vertical-align: middle;'>{$r['Name']}</td>
            <td style='vertical-align: middle;'>{$r['Date']}</td>
            <td style='vertical-align: middle;'>{$r['Time']}</td>
            <td style='vertical-align: middle;'>{$r['Colab']}</td>
        </tr>
    ";
        }
        ?>
    </table>
