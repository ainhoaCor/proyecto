<?php
session_start();
//SELECT DE CIUDADES POR NOMBRE
   $pais2valor=$_REQUEST['pais2valor'];
   $_SESSION['pais2valor']=$_REQUEST['pais2valor'];  
    $db=new PDO('mysql:host=localhost; dbname=world', "root", "");
    $consulta=$db->prepare("SELECT city.Name FROM city INNER JOIN country ON CountryCode=Code WHERE Country.Name='{$pais2valor}'");
    $consulta->execute(); ?>
    <select id="ciudad" onchange="datosCiudad()">
    <option selected>Selecciona una ciudad</option><?php
    while($resul=$consulta->fetch(PDO::FETCH_ASSOC)){ ?>
      <option><?=$resul['Name']?></option>
    <?php
    }?>
   </select>