<?php

require_once "../Controllers/UsuariosController.php";
require_once "../Models/Usuarios.php";

class AjaxUsuarios {

    /** Editar usuarios del sistema */
    public $idUsuario;
    public function ajaxEditarUsuario() {
        $item = "id";
        $valor = $this->idUsuario;
        $respuesta = UsuariosController::ctrMostrarUsuarios($item, $valor);
        echo json_encode($respuesta);
    }

    /** Activar usuarios del sistema */
    public $activarUsuario;
    public $activarId;
    public function ajaxActivarUsuario() {
        $tabla = "usuarios";
        $item1  = "estado";
        $valor1 = $this->activarUsuario;
        $item2  = "id";
        $valor2 = $this->activarId;
        $respuesta = ModeloUsuarios::mdlActualizarUsuario($tabla, $item1, $valor1, $item2, $valor2);
     }

    /** Validar si el usuarios ya existe en la base de datos */
    public $validarUsuario;
    public function ajaxValidarUsuario() {
        $item = "usuario";
        $valor = $this->validarUsuario;
        $respuesta = UsuariosController::ctrMostrarUsuarios($item, $valor);
        echo json_encode($respuesta);
    }
}

/**
 *
 * Objetos
 *
 */

/** Editar Usuarios del sistema */
if (isset($_POST["idUsuario"])) {
    $editar = new AjaxUsuarios();
    $editar->idUsuario = $_POST["idUsuario"];
    $editar->ajaxEditarUsuario();
}

/** Activar usuarios del sistema */
if (isset($_POST["activarUsuario"])) {
    $activarUsuario = new AjaxUsuarios();
    $activarUsuario->activarUsuario = $_POST["activarUsuario"];
    $activarUsuario->activarId = $_POST["activarId"];
    $activarUsuario->ajaxActivarUsuario();
}

/** Validar si el usuarios ya existe en la base de datos */
if (isset($_POST["validarUsuario"])) {
    $valUsuario = new AjaxUsuarios();
    $valUsuario->validarUsuario = $_POST["validarUsuario"];
    $valUsuario->ajaxValidarUsuario();
}