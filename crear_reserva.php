<?php
try{
    $db = new PDO('mysql:host=localhost; dbname=am', "root");
    
    $nom=$_GET['nombre'];
    $tlf=$_GET['telefono'];
    $per=$_GET['persona'];
    $fecha=$_GET['fecha'];
    $hora=$_GET['hora'];

    $consul = $db->prepare("INSERT INTO bookings VALUES(:nom, :tlf, :per, :fecha, :hora)");
    $consul->bindParam(':nom', $nom);
    $consul->bindParam(':tlf', $tlf);
    $consul->bindParam(':per', $per);
    $consul->bindParam(':fecha', $fecha);
    $consul->bindParam(':hora', $hora);
    if ($consul->execute()) { 
        echo "Reserva realizada!";
    }else{
        echo "Error";

    }
} catch (PDOException $e) { ?>
    <p> Ya existe una reserva hecha con estos datos</p> <?php


}