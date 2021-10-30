<?php

class UsuariosController {
  /**login de usuario */
  public static function ctrLogin() {
    if (isset($_POST["numdoc"])) {
      if (preg_match('/^[0-9]+$/', $_POST["numdoc"]) &&
      /*preg_match('/^[0-9][-]+$/', $_POST["expdoc"]) &&*/
      preg_match('/^[a-zA-Z0-9]+$/', $_POST["password"])) {
        // $encriptar = crypt($_POST["password"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
        // $contador = 0;
        $tabla = "usuarios";
        $item  = "numdoc";
        $valor = $_POST["numdoc"];
        $respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla, $item, $valor);
        if ($respuesta["numdoc"] == $_POST["numdoc"] && $respuesta["expdoc"] == $_POST["expdoc"] && $respuesta["password"] == $_POST  ["password"]/**$encriptar*/) {
          if ($respuesta["estado"] == 1) {

            $_SESSION["iniciarSesion"] = "ok";
            $_SESSION["pantallaBloqueo"] = "false";
            $_SESSION["id"] = $respuesta["id"];
            $_SESSION["nombre"] = $respuesta["nombre"]." ".$respuesta["apellido"];
            $nombreAbreviado = substr($respuesta["nombre"],0,1)."".substr($respuesta["apellido"],0,1);
            var_dump($nombreAbreviado);
            $_SESSION["nombreAbrev"] = $nombreAbreviado;
            $_SESSION["usuario"] = $respuesta["numdoc"];
            $_SESSION["expdoc"] = $respuesta["expdoc"];
            $_SESSION["perfil"] = $respuesta["perfil"];
            $_SESSION["ultimo_login"]  = $respuesta["ultimo_login"];
    
            if(isset($_COOKIE['nombre']) && isset($_COOKIE['expdoc']) && isset($_COOKIE['usuario']) && isset($_COOKIE['nombreAbrev']) && isset($_COOKIE['pantallaBloqueo'])) {
              // Creo las cookie´s correspondientes al nombre, usuario y estado de la pantalla de bloqueo cada una caduca en un día 
              setcookie('nombre', $_COOKIE['nombre'] = $_SESSION["nombre"], time() + (365 * 24 * 60 * 60), "/");
              setcookie('usuario', $_COOKIE['usuario'] = $_SESSION["usuario"], time() + (365 * 24 * 60 * 60), "/");
              setcookie('nombreAbrev', $_COOKIE['nombreAbrev'] = $_SESSION["nombreAbrev"], time() + (365 * 24 * 60 * 60), "/");
              setcookie('expdoc', $_COOKIE['expdoc'] = $_SESSION["expdoc"], time() + (365 * 24 * 60 * 60), "/");
              setcookie('pantallaBloqueo', $_COOKIE['pantallaBloqueo'] = $_SESSION["pantallaBloqueo"], time() + (365 * 24 * 60 * 60), "/");
            }
            else {
               // Creo las cookie´s correspondientes al nombre, usuario y estado de la pantalla de bloqueo cada una caduca en un día 
               setcookie('nombre', $_COOKIE['nombre'] = $_SESSION["nombre"], time() + (365 * 24 * 60 * 60), "/");
               setcookie('usuario', $_COOKIE['usuario'] = $_SESSION["usuario"], time() + (365 * 24 * 60 * 60), "/");
               setcookie('nombreAbrev', "nombreAbrev", time() + (365 * 24 * 60 * 60), "/");
               setcookie('expdoc', $_COOKIE['expdoc'] = $_SESSION["expdoc"], time() + (365 * 24 * 60 * 60), "/");
               setcookie('pantallaBloqueo', $_COOKIE['pantallaBloqueo'] = $_SESSION["pantallaBloqueo"], time() + (365 * 24 * 60 * 60), "/");
             }
             /**Registrar fecha y hora del último login del usuario */
             date_default_timezone_set('America/Bogota');
             $fecha = date('Y-m-d');
             $hora  = date('H:i:s');
             $fechaActual = $fecha . ' ' . $hora;
             $item1  = "ultimo_login";
             $valor1 = $fechaActual;
             $item2  = "id";
             $valor2 = $respuesta["id"];
             $ultimoLogin = ModeloUsuarios::mdlActualizarUsuario($tabla, $item1, $valor1, $item2, $valor2);
             if ($ultimoLogin == "ok") {
               echo '<script> window.location = "inicio" </script>';
            }
          } else {echo "<script>md.usuarioInactivo('bottom','left')</script>";}

        } else {
          echo "<script>md.errorAutenticacion('bottom','left')</script>";
          // var_dump($_COOKIE['intentos']);
          // $_COOKIE['intentos'] = $_COOKIE['intentos'] + 1;
          //  $intentos = $_COOKIE['intentos'];
          // // $intentos = $contador + $intentos;
          // var_dump($intentos);
          // var_dump($_COOKIE['intentos']);
        }
      }
    }
  }

  /**Mostrar usuarios del sistema */
  public static function ctrMostrarUsuarios($item, $valor) {
    $tabla = "usuarios";
    $respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla, $item, $valor);
    return $respuesta;
  }
}