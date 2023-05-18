<!-- si el usuario es gerente podrá acceder a las opciones que puede hacer el admin como eliminar o consultar pedidos a proveedor, consultar stock, añadir eventos   -->
<?php
$email = $_GET['email'];
$pass = $_GET['password'];

$db = new PDO('mysql:host=localhost; dbname=am', "root");
$consul = $db->prepare("SELECT * FROM employees WHERE email='$email' AND password='$pass' AND position='Gerente'");
$consul->bindParam(':email', $email);
$consul->bindParam(':password', $pass);
$consul->execute();
$colum = $consul->fetchColumn();
if ($colum > 0) {
    echo "Admin";

} else {
    echo "ERROR";
    
}

?>