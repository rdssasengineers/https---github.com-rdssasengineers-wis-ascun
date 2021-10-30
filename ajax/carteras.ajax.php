<?php
require_once "../Controllers/CarterasController.php";
require_once "../Models/Carteras.php";
class AjaxCarteras {

  /**Editar Carteras de años anteriores */
  public $idCartera;
  public function ajaxEditarCarteras() {
    $item = "id";
    $valor = $this->idCartera;
    $cartera = CarteasController::ctrVerCarteras($item, $valor);
    echo json_encode($cartera, JSON_UNESCAPED_UNICODE);
  }
}

/**
 *
 * Objetos
 *
 */

/**Editar Carteras de años anteriores */
if (isset($_POST["idCartera"])) {
  $editar  = new AjaxCarteras();
  $editar->idCartera = $_POST["idCartera"];
  $editar->ajaxEditarCarteras();
}