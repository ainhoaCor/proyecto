<?php
session_start();

try {
    $db = new PDO('mysql:host=localhost; dbname=am', "root");
    $Sphone = $_SESSION['phone'];
    $Sdate = $_SESSION['date'] = $_REQUEST['date'];

    $consul = $db->prepare("DELETE FROM bookings WHERE Phone = :tlf  AND Date = :fecha");
    $consul->bindParam(':tlf', $Sphone);
    $consul->bindParam(':fecha', $Sdate);

    if ($consul->execute()) {
        echo "Reserva eliminada";
    } else {
        echo "Error";
    }
} catch (PDOException $e) { ?>
    <p> No se ha podido eliminar la reserva</p> <?php
}
