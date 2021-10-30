<?php
session_start();
if (isset($_COOKIE['nombre']) && isset($_COOKIE['expdoc']) && isset($_COOKIE['usuario']) && isset($_COOKIE['nombreAbrev']) && isset($_COOKIE['pantallaBloqueo'])) {
    if (isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok") {
        // Creo las cookie´s correspondientes al nombre, usuario y estado de la pantalla de bloqueo cada una caduca en un año
        setcookie('nombre', $_COOKIE['nombre'] = $_SESSION["nombre"], time() + (365 * 24 * 60 * 60), "/");
        setcookie('expdoc', $_COOKIE['expdoc'] = $_SESSION["expdoc"], time() + (365 * 24 * 60 * 60), "/");
        setcookie('usuario', $_COOKIE['usuario'] = $_SESSION["usuario"], time() + (365 * 24 * 60 * 60), "/");
        setcookie('nombreAbrev', $_COOKIE['nombreAbrev'] = $_SESSION["nombreAbrev"], time() + (365 * 24 * 60 * 60), "/");
        setcookie('pantallaBloqueo', $_COOKIE['pantallaBloqueo'] = $_SESSION["pantallaBloqueo"], time() + (365 * 24 * 60 * 60), "/");
        // setcookie('intentos', $_COOKIE['intentos'] = 0, time() + (365 * 24 * 60 * 60), "/");
    }
} else {
    if (!isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] != "ok") {
        // Creo las cookie´s correspondientes al nombre, apellido, usuario y estado de la pantalla de bloqueo cada una caduca en un año
        setcookie('nombre', "nombre", time() + (365 * 24 * 60 * 60), "/");
        setcookie('expdoc', "expdoc", time() + (365 * 24 * 60 * 60), "/");
        setcookie('usuario', "usuario", time() + (365 * 24 * 60 * 60), "/");
        setcookie('nombreAbrev', "nombreAbrev", time() + (365 * 24 * 60 * 60), "/");
        setcookie('pantallaBloqueo', "false", time() + (365 * 24 * 60 * 60), "/");
    }
}