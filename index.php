<?php
/**  Cotrollers*/
require_once 'Controllers/UsuariosController.php';
require_once 'Controllers/InformesController.php';
require_once 'Controllers/CarterasController.php';
require_once 'Controllers/WisController.php';
/**Models */
require_once 'Models/Usuarios.php';
require_once 'Models/Validaciones.php';
require_once 'Models/InformeER.php';
require_once 'Models/InformeSF.php';
require_once 'Models/InformeRC.php';
require_once 'Models/InformeRDS.php';
require_once 'Models/Carteras.php';
$wis = new WisController();
$wis->ctrWis(); //ctr:sigla para identificar un metodo de Controlador