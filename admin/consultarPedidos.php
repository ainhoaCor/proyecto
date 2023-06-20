<?php

$db = new PDO('mysql:host=localhost; dbname=am', "root", "");
$consulta = $db->prepare("SELECT * FROM orders");
$consulta->execute();
$resul = $consulta->fetchAll(PDO::FETCH_ASSOC); ?>

<div class="container-fluid p-2">
    <h2>Registro de pedidos:</h2>
    <br>
    <table class="responsive-table">
        <tr>
            <th scope="row" style="vertical-align: middle;"> Order Code</th>
            <th scope="row" style="vertical-align: middle;"> Email </th>
            <th scope="row" style="vertical-align: middle;"> Date </th>
            <th scope="row" style="vertical-align: middle;"> Total Price</th>

        </tr>
        <?php
        foreach ($resul as $r) {
            echo "         
        <tr>
            <td style='vertical-align: middle;'>{$r['CodOrder']}</td>
            <td style='vertical-align: middle;'>{$r['EmailClient']}</td>
            <td style='vertical-align: middle;'>{$r['Date']}</td>
            <td style='vertical-align: middle;'>{$r['TotalPrice']}</td>
        </tr>
    ";
        }
        ?>
    </table>
</div>