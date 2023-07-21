<?php



unset($_SESSION["carrito"]);
$_SESSION["carrito"] = [];
unset($_SESSION["carrito1"]);
$_SESSION["carrito1"] = [];


header("Location: ./vistas/modulos/generarcuenta.php?status=2");
?>