<?php
session_start();

$password = $_GET['password'];
$pass=(md5($password));
$email=$_GET['email'];
$telf=$_GET['telefono'];
$dir=$_GET['direccion'];
$nom=$_GET['nombre'];
$ape=$_GET['apellido'];

$db = new PDO('mysql:host=localhost; dbname=am', "root");
$consul = $db->prepare("INSERT INTO clients VALUES(:nombre, :apellido, :email, :telefono, :direccion, :pass)");
$consul->bindParam(':nombre', $nom);
$consul->bindParam(':apellido', $ape);
$consul->bindParam(':email', $email);
$consul->bindParam(':telefono', $telf);
$consul->bindParam(':direccion', $dir);
$consul->bindParam(':pass', $pass);

if($consul->execute()){
     $_SESSION['email'] = $email;
    echo "Se ha registrado correctamente";
}else{
    // Ocurrió un error al ejecutar la consulta
    echo "Error al registrar";
}
?>







<!-- // $colum = $consul->fetchColumn();
    
// if ($colum > 0) {  
//     session_start();
//     $_SESSION['email'] = $email;
//     echo"OK";


// } else {
//     echo "ERROR";
    
// }

?> -->