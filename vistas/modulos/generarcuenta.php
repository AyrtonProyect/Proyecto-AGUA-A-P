<?php 
session_start();
  


if(!isset($_SESSION["carrito"])) $_SESSION["carrito"] = [];
if(!isset($_SESSION["carrito1"])) $_SESSION["carrito1"] = [];
$granTotal = 0;
?>
<div class="content-wrapper">

<section class="content-header">
  
  <h1>
	
	Administrar Cuentas
  
  </h1>
  

  <ol class="breadcrumb">
	
	<li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
	
	<li class="active">Generar Cuentas</li>
  
  </ol>

<!--=================================================================================
MODAL BUSCAR CLIENTE
====================================================================================-->

<div id="modalBuscarCliente" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form  method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Registro de Clientes</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">
            
            <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
              
            <thead>
              
              <tr>
                
                <th style="width:10px">#</th>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Acciones</th>
                
    
              </tr> 
    
            </thead>
    
            <tbody>
    
            <?php
    
              $item = null;
              $valor = null;
    
              $clientes = ControladorClientes::ctrMostrarClientes($item, $valor);
    
              foreach ($clientes as $key => $value) {
                
    
                echo '<tr>
    
                        <td>'.($key+1).'</td>

                        <td>'.$value["id"].'</td>
    
                        <td>'.$value["nombre"].'</td>
    
                        <td>'.$value["apellido"].'</td>

                      
                        <td>
    
                          <div class="btn-group">

                <div class="row">    
                            <button  class="btn btn-warning btnEditarCliente" data-toggle="modal" idCliente="'.$value["id"].'"  data-target="#modalAgregarCobro" data-dismiss="modal"><i class="fa fa-check" ></i>  </button>';
                            
                          echo '</div>  
    
                        </td>
    
                      </tr>';
              
                }
    
            ?>
        
              
            </tbody>
    
            </table>
    
          </div>
        </div>

        

      </form>

      <?php



      
      ?>

    </div>

  </div>

</div>





<!--=======================================================================================
FORM AGREGAR CLIENTE
===========================================================================================-->


      <form method="post">

        <!--=====================================
        CUERPO DEL FORM
        ======================================-->

        <div class="modal-body">

          <div class="box-body">
          <label >Seleccionar Cliente:</label> 
          

            <!-- ENTRADA PARA EL ID Y NOMBRE -->
            
            <div class="form-group">
              
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-list-ol"></i></span> 
                <input size="5" float="left" type="text" class="form-control input-lg" name="idCliente" id="idCliente" placeholder="ID" required>
                <input type="hidden" id="idCliente" name="idCliente">
               
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 
                <input float="left"  type="text" class="form-control input-lg" name="editarCliente" id="editarCliente"  placeholder="Nombre" required>
                <input type="hidden" id="nombreCliente" name="nombreCliente">


                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input float="right" type="text" class="form-control input-lg" name="editarApellido" id="editarApellido"  placeholder="Apellido" required>
                <input type="hidden" id="idApellido" name="idApellido">
<!---------------FORMULARIO GENERAR COBRO----------------->
                
                
                
              </div>
            </div>
            
            
            <div class="form-group">
              
              <div class="input-group">

                <button class="btn btn-info" data-toggle="modal" data-target="#modalBuscarCliente" data-dismiss="modal">
            
                  Buscar
                

                </button>
              </div>
            </div>
          </div>
        </div>
      </form>
   
           

  
</section>
	<div class="col-xs-10">
		
		<?php
			if(isset($_GET["status"])){
				if($_GET["status"] == "1"){
					?>
						<div class="alert alert-success">
							<strong>¡Correcto!</strong> Cuenta generada correctamente
						</div>
					<?php
				}else if($_GET["status"] === "2"){
					?>
					<div class="alert alert-info">
							<strong>Generacion de Cuenta cancelada</strong>
						</div>
					<?php
				}else if($_GET["status"] === "3"){
					?>
					<div class="alert alert-info">
							<strong>Ok</strong> Cuenta quitado de la lista
						</div>
					<?php
				}else if($_GET["status"] === "4"){
					?>
					<div class="alert alert-warning">
							<strong>Error:</strong> El mes que buscas no existe
						</div>
					<?php
				}else{
					?>
					<div class="alert alert-danger">
							<strong>Error:</strong> Algo salió mal mientras se realizaba la cuenta
						</div>
					<?php
				}
			}
		?>
		<br>
		<form method="post" action="./agregarcuenta.php">
		
            
			<label for="codigo">Código del mes:</label> &nbsp;&nbsp<button href="./agregarcuenta.php" class="btn btn-warning">Añadir</button>
			 <br>
      <input autocomplete="off" autofocus class="form-control" name="codigo" required type="text" id="codigo" placeholder="Escribe el código">
     
    </form>
		<br><br>
		<html>
		<table class=" table-striped dt-responsive table-bordered" heigth="50%" style="float: left;" width="20%">
			<thead>
				<tr heigth="50" width="50">
					<th>Código</th>
					<th>Descripción</th>
					
				</tr>
			</thead>
			<tbody>
				<?php foreach($_SESSION["carrito1"] as $indice => $meses){ 
						
					?>
				<tr>
					<td><?php echo $meses->codigo ?></td>
					<td><?php echo $meses->mes ?></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
<!--/////////////////////////////TABLA TOTAL//////////////-->
<table class="table-striped dt-responsive table-bordered" heigth="50%" width="50%">
			<thead>
				<tr>
					<th>Total</th>
					<th>Quitar</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($_SESSION["carrito"] as $indice => $costo){ 
						$granTotal += $costo->total;
					?>
				<tr>
					
					<td><?php echo $costo->total ?></td>
					<td><a class="fa fa-check red-color"  href="<?php echo "quitarcuenta.php?indice=" . $indice?>"></a></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
</html>
		
		<h3>Total: <?php echo $granTotal; ?></h3>
		<form action="./terminarVenta.php" method="POST">
			<input name="total" type="hidden" value="<?php echo $granTotal;?>">
			<button type="submit" class="btn btn-success">Guardar Cuenta</button>
			<a href="./cancelarcuenta.php" class="btn btn-danger">Cancelar Cuenta</a>
		</form>
	</div>
				</div>
        </div>
