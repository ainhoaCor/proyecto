<?php session_start(); 
header("Location: /proyectofinaldaw_ainhoacorralrojo/carrito_compra/merchandising.php");
unset($_SESSION['email']);
unset($_SESSION['carrito']);
