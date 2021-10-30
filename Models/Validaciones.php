<?php
require_once "Conexion.php";
class ModeloValidaciones {
  /**consultar si la tabla esta vacia */
  public static function mdlTablaVacia($tabla, $item) {
    /** */
    if ($item != null) {
      $stmt = Conexion::conectar()->prepare("SELECT COUNT($item) AS Total FROM $tabla");
      $stmt->execute();
      return $stmt->fetch();
    }
    else {
      $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
      $stmt->execute();
      return $stmt->fetchAll();
    }
    $stmt->close();
    $stmt = null;
  }
  /**consultar la fecha de subida del archivo base BPPCC */
  public static function mdlFecha_upload($tabla, $item, $valor) {
    /** */
    if ($item != null) {
      $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = $valor");
      $stmt->execute();
      return $stmt->fetchAll();
    }
    else {
      $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
      $stmt->execute();
      return $stmt->fetchAll();
    }
    $stmt->close();
    $stmt = null;
  }
  /**traducirMes */
  public static function traducirMes($mes) {
    /**January: Enero February: Febrero March: Marzo April: Abril May: Mayo June: Junio July: Julio August: Agosto September: Septiembre October: Octubre November: Noviembre December: Diciembre */
    switch ($mes) {
      case 'January':
        return 'Enero';
      break;
      case 'February':
        return 'Febrero';
      break;
      case 'March':
        return 'Marzo';
      break;
      case 'April':
        return 'Abril';
      break;
      case 'May':
        return 'Mayo';
      break;
      case 'June':
        return 'Junio';
      break;
      case 'July':
        return 'Julio';
      break;
      case 'August':
        return 'Agosto';
      break;
      case 'September':
        return 'Septiembre';
      break;
      case 'October':
        return 'Octubre';
      break;
      case 'November':
        return 'Noviembre';
      break;
      case 'December':
        return 'Diciembre';
      break;
      
    }
  }
}