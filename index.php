<?php

require_once "controladores/plantilla.controlador.php";
require_once "controladores/usuarios.controlador.php";

require_once "controladores/zonas.controlador.php";

require_once "controladores/clientes.controlador.php";

require_once "controladores/cobros.controlador.php";
require_once "controladores/tarifas.controlador.php";


require_once "modelos/usuarios.modelo.php";

require_once "modelos/zonas.modelo.php";
require_once "modelos/cobros.modelo.php";
require_once "modelos/tarifas.modelo.php";

require_once "modelos/clientes.modelo.php";

require_once "extensiones/vendor/autoload.php";

$plantilla = new ControladorPlantilla();
$plantilla -> ctrPlantilla();