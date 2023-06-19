<?php
   session_start();
    $phone=$_SESSION['phone']=$_REQUEST['phone'];
      $db=new PDO('mysql:host=localhost; dbname=am', "root", "");
      $consulta=$db->prepare("SELECT Date FROM bookings WHERE Phone={$phone}");
      $consulta->execute();
      $resul = $consulta->fetchAll(PDO::FETCH_ASSOC);
      
      foreach ($resul as $r) {
        echo "{$r["Date"]}";
      }