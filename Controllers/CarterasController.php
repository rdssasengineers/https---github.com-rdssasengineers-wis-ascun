<?php
class CarteasController {
  /**agregar Cartera de años anteriores */
  public static function ctrAddCartera() {
    if (isset($_POST["anio"])) {
      if (preg_match('/^[()\-0-9 ]+$/', $_POST["anio"]) && preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["descripcion"]) && preg_match('/^[()\-0-9 ]+$/', $_POST["valorCartera"])) {
        $tabla = "carteras";
        $datos = array("anio" => $_POST["anio"],"descripcion" => $_POST["descripcion"],"valorCartera" => $_POST["valorCartera"]);
        $respuesta = ModeloCarteras::mdlAddCartera($tabla, $datos);
        if ($respuesta == "ok") {
          echo 
          '<script>
            console.log("Todos los datos se guardaron de manera exitosa.");
            window.location = "vcc";
          </script>';
        }else {
          echo 
          '<script>
            console.log("Error");
          </script>';
        }
      }else {
        echo
        '<script>
          console.log("¡Todos los campos son requeridos, no pueden ir vacía o llevar caracteres especiales!");
          window.location = "vcc";
        </script>';

      }
    }
  }
  /**Ver Carteras de años anteriores */
  public static function ctrVerCarteras($item, $valor) {
    $tabla = "carteras";
    $respuesta = ModeloCarteras::mdlVerCarteras($tabla, $item, $valor);
    return $respuesta;
  }
  /** Editar Cartera de años anteriores*/
  public static function ctrEditarCartera() {
    if (isset($_POST["anio"])) {
      if (preg_match('/^[()\-0-9 ]+$/', $_POST["anio"]) && preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["descripcion"]) && preg_match('/^[()\-0-9 ]+$/', $_POST["valorCartera"])) {
        $tabla = "carteras";
        $datos = array("id" => $_POST["idCartera"], "anio" => $_POST["anio"],"descripcion" => $_POST["descripcion"],"valorCartera" => $_POST["valorCartera"]);
        $respuesta = ModeloCarteras::mdlEditarCartera($tabla, $datos);
        if ($respuesta == "ok") {
          echo 
          '<script>
            guardadoExitos()
            window.location = "vcc";
          </script>';
        }else {
          echo 
          '<script>
            error()
          </script>';
        }
      }else {
        echo
        '<script>
          console.log("¡Todos los campos son requeridos, no pueden ir vacía o llevar caracteres especiales!");
          window.location = "vcc";
        </script>';

      }
    }
  }
  /**Eliminar Cartera de años anteriores */
  public static function ctrEliminarCartera() {
    if (isset($_POST["idCartera"])) {
      $tablas = "carteras";
      $datos = $_GET["idCartera"];
      $respuesta = ModeloCarteras::mdlEliminarCartera($tablas, $datos);
      if ($respuesta == "ok") {
        echo 
        '<script>
          console.log("La cartera se eliminó de manera exitosa.");
          window.location = "vcc";
        </script>';
      }else {
        echo 
        '<script>
          console.log("Error");
        </script>';
      }
    }
  }
    
}