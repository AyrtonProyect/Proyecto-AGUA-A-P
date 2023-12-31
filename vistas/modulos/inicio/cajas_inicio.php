<?php

$item = null;
$valor = null;
$orden = "id";



$zonas = ControladorZonas::ctrMostrarZonas($item, $valor);
$totalZonas = count($zonas);

$tarifas = ControladorTarifas::ctrMostrarTarifas($item, $valor);
$totalTarifas = count($tarifas);


$clientes = ControladorClientes::ctrMostrarClientes($item, $valor);
$totalClientes = count($clientes);

$usuarios = ControladorUsuarios::ctrMostrarUsuarios($item, $valor, $orden);
$totalUsuarios = count($usuarios);

?>



<div class="col-lg-3 col-xs-6">

  <div class="small-box bg-blue">
    
    <div class="inner">
    
      <h3><?php echo number_format($totalZonas); ?></h3>

      <p>Zonas</p>
    
    </div>
    
    <div class="icon">
    
      <i class="ion ion-location"></i>
    
    </div>
    
    <a href="zonas" class="small-box-footer">
      
      Más info <i class="fa fa-arrow-circle-right"></i>
    
    </a>

  </div>

</div>
<div class="col-lg-3 col-xs-6">

  <div class="small-box bg-green">
    
    <div class="inner">
    
      <h3><?php echo number_format($totalTarifas); ?></h3>

      <p>Tarifas</p>
    
    </div>
    
    <div class="icon">
    
      <i class="ion ion-cash"></i>
    
    </div>
    
    <a href="zonas" class="small-box-footer">
      
      Más info <i class="fa fa-arrow-circle-right"></i>
    
    </a>

  </div>

</div>

<div class="col-lg-3 col-xs-6">

  <div class="small-box bg-yellow">
    
    <div class="inner">
    
      <h3><?php echo number_format($totalClientes); ?></h3>

      <p>Clientes</p>
  
    </div>
    
    <div class="icon">
    
      <i class="ion ion-person-add"></i>
    
    </div>
    
    <a href="clientes" class="small-box-footer">

      Más info <i class="fa fa-arrow-circle-right"></i>

    </a>

  </div>

</div>

<div class="col-lg-3 col-xs-6">

  <div class="small-box bg-red">
  
    <div class="inner">
    
      <h3><?php echo number_format($totalUsuarios); ?></h3>

      <p>Usuarios</p>
    
    </div>
    
    <div class="icon">
      
      <i class="ion ion-key"></i>
    
    </div>
    
    <a href="usuarios" class="small-box-footer">
      
      Más info <i class="fa fa-arrow-circle-right"></i>
    
    </a>

  </div>

</div>