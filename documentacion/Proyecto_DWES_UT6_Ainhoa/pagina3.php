<?php
session_start();
//TABLA DATOS DE LA CIUDAD
    $ciudad=$_REQUEST['ciudad'];
    $pais=$_SESSION['pais2valor'];
    $db=new PDO('mysql:host=localhost; dbname=world', "root", "");
    $consulta=$db->prepare("SELECT * FROM city INNER JOIN country ON CountryCode=Code WHERE Country.Name='{$pais}' AND city.Name='{$ciudad}'");

    $consulta->execute();
    $resul=$consulta->fetchAll(PDO::FETCH_ASSOC);     
    foreach($resul as $r){
        echo"<br><br><br>";
        echo "<h2>Datos Ciudad:</h2>
        <table border='1px black solid'>              
        <tr><th>ID</th>
            <th>Name</th>
            <th>Country Code:</th>
            <th>Dstrict:</th>
            <th>Population:</th> 
        </tr>
        <tr>
            <td>{$r['ID']}</td>
            <td>{$r['Name']}</td>
            <td>{$r['CountryCode']}</td>
            <td>{$r['District']}</td>
            <td>{$r['Population']}</td>
           
        </tr>
    </table> ";
    
    }