<?php
if(!isset($_GET["indice"])) return;
$indice = $_GET["indice"];

session_start();
array_splice($_SESSION["carrito"], $indice, 1);
array_splice($_SESSION["carrito1"], $indice, 1);
header("Location: ./vistas/modulos/generarcuenta.php?status=3");
?>