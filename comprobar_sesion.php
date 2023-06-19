<?php

$email = $_GET['email'];
$password = $_GET['password'];
$pass=md5($password);

$db = new PDO('mysql:host=localhost; dbname=am', "root");
$consul = $db->prepare("SELECT * FROM employees WHERE email=:email AND password=:password AND position='Gerente'");
$consul->bindParam(':email', $email);
$consul->bindParam(':password', $pass);
$consul->execute();
$colum = $consul->fetchColumn();

if ($colum > 0) {  
    echo "Admin";

} else {
    echo "ERROR";
    
}
