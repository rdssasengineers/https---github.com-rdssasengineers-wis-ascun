<?php
include "modules/plugins/cookie_session.php"
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <link rel="apple-touch-icon" sizes="76x76" href="./views/assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="./views/assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>WIS - Web Information System</title>
  <?php
	include "modules/plugins/styles.php";
	include "modules/plugins/scripts.php";
	?>
</head>
<!-- /**Cuerpo del WIS*/ -->
<body class="">
  <?php
    if (isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok") {
      echo'<div class="wrapper">';
			  /**Menu */
        include "modules/menu.php";
			  echo'<div class="main-panel">';
          /**Cabezera (Header) */
          include "modules/cabezera.php";
          echo'<div class="content">';
            echo'<div class="container-fluid">';
              /**views */
              if (isset($_GET["ruta"])) {
                if (
                  $_GET["ruta"] == "inicio"
                  /**informes Contables */
                  // Estado de Resultados
                  || $_GET["ruta"] == "er"
                  // Situación Financiara
                  || $_GET["ruta"] == "sf"
                  // Resumen de Cartera
                  || $_GET["ruta"] == "vcc"
                  || $_GET["ruta"] == "upc"
                  || $_GET["ruta"] == "rc"
                  // Redes
                  || $_GET["ruta"] == "rds"
                  /**Fin informes */
                  /**Administrador de usuarios */
                  || $_GET["ruta"] == "users"
                  || $_GET["ruta"] == "users-add"
                  /**Fin Administrador de usuarios */
                  || $_GET["ruta"] == "salir"
                  || $_GET["ruta"] == "403"
                  || $_GET["ruta"] == "bloquear") {
                  include "modules/" . $_GET["ruta"] . ".php";
                }
                else {
                  if ($_GET["ruta"]=="bppcc") {
                    include "modules/bppcc/" . $_GET["ruta"] . ".php";
                  }else{include "modules/404.php";}
                }
              }
              else { include "modules/inicio.php"; }
            echo'</div">';
          echo'</div>';
          echo "</div>";
          /**footer */
		      include "modules/footer.php";
		  echo "</div>";
    }
		elseif (isset($_GET["ruta"]) && $_GET["ruta"] == "bloqueado") {
			$_COOKIE['pantallaBloqueo'] = "true";
			include "modules/lock.php";
		}
		elseif ($_COOKIE['pantallaBloqueo'] != "true") {
			include "modules/login.php";
		} else {
			include "modules/lock.php";
		}
  ?>
</body>
</html>