<?php
$db = new PDO('mysql:host=localhost; dbname=am', "root", "");
$consulta = $db->prepare("SELECT * FROM stock");
$consulta->execute();
$resul = $consulta->fetchAll(PDO::FETCH_ASSOC); ?>

<div class="container-fluid p-2">
    <h2>Stock Actual:</h2>
    <br>
    <table class="responsive-table">
        <tr>
            <th scope="row" style="vertical-align: middle;"> Product Code </th>
            <th scope="row" style="vertical-align: middle;"> Name </th>
            <th scope="row" style="vertical-align: middle;"> Description </th>
            <th scope="row" style="vertical-align: middle;"> Price </th>
            <th scope="row" style="vertical-align: middle;"> Ud</th>
            <th scope="row" style="vertical-align: middle;"> Image</th>
        </tr>
        <?php
        foreach ($resul as $r) {
            echo "         
        <tr>
            <td style='vertical-align: middle;'>{$r['CodProd']}</td>
            <td style='vertical-align: middle;'>{$r['NameProd']}</td>
            <td style='vertical-align: middle;'>{$r['Description']}</td>
            <td style='vertical-align: middle;'>{$r['Price']}</td>
            <td style='vertical-align: middle;'>{$r['Ud']}</td>
            <td style='vertical-align: middle;'>{$r['image']}</td>
        </tr>
    ";
        }
        ?>
    </table>
</div>