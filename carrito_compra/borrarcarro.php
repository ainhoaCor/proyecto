<?php session_start(); 
header("Location: merchandising.php");
unset($_SESSION['carrito']);
