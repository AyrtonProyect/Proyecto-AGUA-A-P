<?php

if (!isset($_POST["codigo"])) {
    return;
}

$codigo = $_POST["codigo"];
include_once "base_de_datos.php";

$sentencia = $base_de_datos->prepare("SELECT * FROM meses WHERE codigo = ? LIMIT 1;");
$sentencia->execute([$codigo]);
$meses = $sentencia->fetch(PDO::FETCH_OBJ);



# Si no existe, salimos y lo indicamos
if (!$meses) {
    header("Location: ./generarcuenta.php?status=4");
    exit;
}

session_start();
# Buscar meses dentro del cartito
$indice = false;
for ($i = 0; $i < count($_SESSION["carrito1"]); $i++) {
    if ($_SESSION["carrito1"][$i]->codigo == $codigo) {
        $indice = $i;
        
        break;
      
    }
}
# Si no existe, lo agregamos como nuevo
//require('C:\xampp\htdocs\ventas_pdo-master\conex.php');
$codigo1 = $_GET["idCliente"];
if ($indice === false) {
    include_once "base_de_datos.php";
   ///CREAR UNA VARIABLE DE CLIENTES PARA CONSULTA SQL
   
   $sentencia1 = $base_de_datos->prepare("SELECT c.id,c.id_tarifa,t.costo FROM clientes AS c INNER JOIN tarifas AS t ON c.id_tarifa= t.id WHERE c.id= '".$codigo1."' ");
$sentencia1->execute();
$costo = $sentencia1->fetch(PDO::FETCH_OBJ);
$costo->cantidad = 1;
$costo->total = $costo->costo;
 
array_push($_SESSION["carrito1"], $meses);
array_push($_SESSION["carrito"], $costo);   
    //$_SESSION["carrito"][$indice]->cantidad++;
    $_SESSION["carrito"][$indice]->total = $_SESSION["carrito"][$indice]->cantidad * $_SESSION["carrito"][$indice]->costo;

}

header("Location: ./vistas/modulos/generarcuenta.php");
