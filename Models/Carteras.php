<?php
require_once "conexion.php";
class ModeloCarteras {

  /**Agregar carteras de años anteriores*/
  public static function mdlAddCartera($tabla, $datos) {
    $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(anio, descripcion, valor) VALUES (:anio, :descripcion, :valorCartera)");
    $stmt->bindParam(":anio", $datos["anio"], PDO::PARAM_STR);
    $stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
    $stmt->bindParam(":valorCartera", $datos["valorCartera"], PDO::PARAM_STR);
    if ($stmt->execute()) return "ok";
    else return "error";
    $stmt->close();
    $stmt = null;
  }
  /**Ver carteras de años anteriores*/
  public static function mdlVerCarteras($tabla, $item, $valor) {
    if ($item != null) {
      $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    }else {
      $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
      $stmt->execute();
      return $stmt->fetchAll();
    }
    $stmt->close();
    $stmt = null;
  }
  /**Editar cartera de años anteriores*/
  public static function mdlEditarCartera($tabla, $datos) {
    $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET anio = :anio, descripcion = :descripcion, valor = :valorCartera WHERE id = :id");
    $stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
    $stmt->bindParam(":anio", $datos["anio"], PDO::PARAM_STR);
    $stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
    $stmt->bindParam(":valorCartera", $datos["valorCartera"], PDO::PARAM_STR);
    if ($stmt->execute()) return "ok";
    else return "error";
    $stmt->close();
    $stmt = null;
  }
  /**Eliminar carteras de años anteriores*/
  public static function mdlEliminarCartera($tabla, $datos) {
    $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");
    $stmt->bindParam(":id", $datos, PDO::PARAM_INT);
    if ($stmt->execute()) return "ok";
    else return "error";
    $stmt->close();
    $stmt = null;
    }
}
