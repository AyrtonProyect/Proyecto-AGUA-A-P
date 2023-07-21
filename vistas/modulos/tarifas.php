<?php

if($_SESSION["perfil"] == "Vendedor"){

  echo '<script>

    window.location = "inicio";

  </script>';

  return;

}

?>

<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar Tarifas
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar Tarifas</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
  
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarTarifa">
          
          Agregar Tarifa

        </button>

        <button class="btn btn-success" onclick="location.href='./vistas/modulos/reportes/tarifas_reporte.php'" value="Generar Reporte">
          
          Generar Reporte

        </button>

      </div>

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
           <th>Descripcion</th>
           <th>Tarifas</th>
           <th>Acciones</th>

         </tr> 

        </thead>

        <tbody>

        <?php

          $item = null;
          $valor = null;

          $tarifas = ControladorTarifas::ctrMostrarTarifas($item, $valor);

          foreach ($tarifas as $key => $value) {
           
            echo ' <tr>

                    <td>'.($key+1).'</td>

                    <td class="text-uppercase">'.$value["descripcion"].'</td>

                    <td>'.$value["costo"].'</td>

                   

                    <td>

                      <div class="btn-group">
                          
                        <button class="btn btn-warning btnEditarTarifa" data-toggle="modal" data-target="#modalEditarTarifa" idTarifa="'.$value["id"].'"><i class="fa fa-pencil"></i></button>';

                        if($_SESSION["perfil"] == "Administrador"){

                          echo '<button class="btn btn-danger btnEliminarTarifa" idTarifa="'.$value["id"].'"><i class="fa fa-times"></i></button>';

                        }

                      echo '</div>  

                    </td>

                  </tr>';
          }

        ?>

        </tbody>

       </table>

      </div>

    </div>

  </section>

</div>

<!--=====================================
MODAL AGREGAR TARIFA
======================================-->

<div id="modalAgregarTarifa" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar tarifa</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA LA DESCRIPCION -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <input type="text" style="text-transform:uppercase;" class="form-control input-lg" name="descripcionTarifa" placeholder="Ingresar descripcion" required>

              </div>

            </div>

            <!-- ENTRADA PARA LA TARIFA -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <input type="text" class="form-control input-lg" name="costoTarifa" placeholder="Ingresar costo" required>

              </div>

            </div>
  
          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar tarifa</button>

        </div>

        <?php

          $crearTarifa = new ControladorTarifas();
          $crearTarifa -> ctrCrearTarifa();

        ?>

      </form>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR TARIFA
======================================-->

<div id="modalEditarTarifa" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar tarifa</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA LA DESCRIPCION-->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <input type="text" style="text-transform:uppercase;" class="form-control input-lg" name="editarTarifa" id="editarTarifa" required>

                 <input type="hidden"  name="idTarifa" id="idTarifa" required>

              </div>

            </div>

             <!-- ENTRADA PARA EL COSTO -->
            
             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <input type="text" class="form-control input-lg" name="editarCosto" id="editarCosto" required>

                 <input type="hidden"  name="idTarifas" id="idTarifas" required>

              </div>

            </div>
  
  
          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar cambios</button>

        </div>

      

      </form>
      <?php

          $editarTarifa = new ControladorTarifas();
          $editarTarifa -> ctrEditarTarifa();

        ?> 

    </div>

  </div>

</div>

<?php

  $borrarTarifa = new ControladorTarifas();
  $borrarTarifa -> ctrBorrarTarifa();

?>
