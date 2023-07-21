<?php

if($_SESSION["perfil"] == "Especial"){

  echo '<script>

    window.location = "inicio";

  </script>';

  return;

}

?>

<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar cobros
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar cobros</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
  
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCobro">
          
          Agregar cobro

        </button>

      </div>

    </div>
    </section>

<!--=================================================================================
MODAL BUSCAR CLIENTE
====================================================================================-->

<div id="modalBuscarCliente" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Registro de cobro</h4>

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
MODAL AGREGAR COBRO
===========================================================================================-->

<div id="modalAgregarCobro" class="modal fade" role="dialog">
  
  <div class="modal-dialog modal-lg">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar cobro</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

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

                <button class="btn btn-success" data-toggle="modal" data-target="#modalBuscarCliente" data-dismiss="modal">
            
                  Buscar
                

                </button>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>             


   