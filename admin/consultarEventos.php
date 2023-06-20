<?php
$db = new PDO('mysql:host=localhost; dbname=am', "root", "");
$consulta = $db->prepare("SELECT * FROM events");
$consulta->execute();
$resul = $consulta->fetchAll(PDO::FETCH_ASSOC); ?>

<div class="container-fluid p-2">
    <h2>Eventos:</h2>
    <br>
    <table class="responsive-table">
        <tr>
            <th scope="row" style="vertical-align: middle;">Codigo de evento</th>
            <th scope="row" style="vertical-align: middle;"> Nombre</th>
            <th scope="row" style="vertical-align: middle;"> Fecha evento </th>
            <th scope="row" style="vertical-align: middle;"> Hora</th>
            <th scope="row" style="vertical-align: middle;"> Colaborador </th>


        </tr>
        <?php
        foreach ($resul as $r) {
            echo "         
        <tr>
            <td style='vertical-align: middle;'>{$r['CodEvent']}</td>
            <td style='vertical-align: middle;'>{$r['Name']}</td>
            <td style='vertical-align: middle;'>{$r['Date']}</td>
            <td style='vertical-align: middle;'>{$r['Time']}</td>
            <td style='vertical-align: middle;'>{$r['Colab']}</td>
          
        </tr>
    ";
        }
        ?>
    </table>
</div>