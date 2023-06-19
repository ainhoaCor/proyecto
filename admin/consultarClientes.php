<?php
$db = new PDO('mysql:host=localhost; dbname=am', "root", "");
$consulta = $db->prepare("SELECT * FROM clients");
$consulta->execute();
$resul = $consulta->fetchAll(PDO::FETCH_ASSOC); ?>

<div class="container-fluid p-2">
    <h2>Lista de clientes:</h2>
    <br>
    <table class="responsive-table">
        <tr>
            <th scope="row" style="vertical-align: middle;"> Name </th>
            <th scope="row" style="vertical-align: middle;"> Last Name </th>
            <th scope="row" style="vertical-align: middle;"> Email </th>
            <th scope="row" style="vertical-align: middle;"> Phone </th>
            <th scope="row" style="vertical-align: middle;"> Address</th>
            <th scope="row" style="vertical-align: middle;"> Password</th>
        </tr>
        <?php
        foreach ($resul as $r) {
            echo "         
        <tr>
            <td style='vertical-align: middle;'>{$r['Name']}</td>
            <td style='vertical-align: middle;'>{$r['LastName']}</td>
            <td style='vertical-align: middle;'>{$r['Email']}</td>
            <td style='vertical-align: middle;'>{$r['Phone']}</td>
            <td style='vertical-align: middle;'>{$r['Address']}</td>
            <td style='vertical-align: middle;'>{$r['Password']}</td>
        </tr>
    ";
        }
        ?>
    </table>
</div>