
<html>



<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      INICIO
      
      <small>Panel de Control</small>
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Tablero</li>
    
    </ol>

  </section>
<div style="background-image:url('../vistas/img/plantilla/fondo.jpg')"></div>
  <section class="content">

    <div class="row">
      
    <?php

    if($_SESSION["perfil"] =="Administrador"){

      include "inicio/cajas_inicio.php";

    }


if($_SESSION["perfil"] =="Especial"){

 include "inicio/cajas_inicio_clientes.php";

}


    ?>

    </div> 

     

     </div>
     




  </section>
 
</div>

  </html>