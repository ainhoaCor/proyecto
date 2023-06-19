<?php

$password = $_GET['password'];
$pass=(md5($password));
$email=$_GET['email'];

$db = new PDO('mysql:host=localhost; dbname=am', "root");
$consul = $db->prepare("SELECT * FROM clients WHERE email=:email AND password=:password");
$consul->bindParam(':email', $email);
$consul->bindParam(':password', $pass);
$consul->execute();
$colum = $consul->fetchColumn();

if ($colum > 0) {  
    session_start();
    $_SESSION['email'] = $email;
    echo"OK";


} else {
    echo "ERROR";
    
}
