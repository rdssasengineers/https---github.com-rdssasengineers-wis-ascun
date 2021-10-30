<?php
require_once "Conexion.php";
class ModeloInformeRC {
  /**Informe: RESUMEN DE CARTERA */
  /**CARTERA NODOS RED DE BIENETAR UNIVERSITARIO */
  /**REGIONAL: ANTIOQUIA */
  /**CARTERA PROGRAMAS */
  public static function mdlCarteraProgramasAntioquia($tabla, $item, $valor) {
    if ($item != null) {
      $stmt = Conexion::conectar()->prepare("SELECT SUM(saldo_final) AS Suma FROM $tabla WHERE $item = :$item AND codigo_cuenta_contable LIKE '13050501%' AND (codigo_centro_costo='60-2' OR codigo_centro_costo='60-3' OR codigo_centro_costo='60-4' OR codigo_centro_costo='60-5')");
      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    }
    $stmt->close();
    $stmt = null;
  }
  /**CARTERA APORTE ADMINISTRATIVO */
  public static function mdlCarteraAporteAdministrativoAntioquia($tabla, $item, $valor) {
    if ($item != null) {
      $stmt = Conexion::conectar()->prepare("SELECT SUM(saldo_final) AS Suma FROM $tabla WHERE $item = :$item AND codigo_cuenta_contable LIKE '13050501%' AND (codigo_centro_costo='60-1')");
      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    }
    $stmt->close();
    $stmt = null;
  }
  /**REGIONAL: BOGOTA */
  /**CARTERA PROGRAMAS */
  public static function mdlCarteraProgramasBogota($tabla, $item, $valor) {
    if ($item != null) {
      $stmt = Conexion::conectar()->prepare("SELECT SUM(saldo_final) AS Suma FROM $tabla WHERE $item = :$item AND codigo_cuenta_contable LIKE '13050501%' AND (codigo_centro_costo='50-2' OR codigo_centro_costo='50-3' OR codigo_centro_costo='50-4' OR codigo_centro_costo='50-5')");
      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    }
    $stmt->close();
    $stmt = null;
  }
  /**CARTERA APORTE ADMINISTRATIVO */
  public static function mdlCarteraAporteAdministrativoBogota($tabla, $item, $valor) {
    if ($item != null) {
      $stmt = Conexion::conectar()->prepare("SELECT SUM(saldo_final) AS Suma FROM $tabla WHERE $item = :$item AND codigo_cuenta_contable LIKE '13050501%' AND (codigo_centro_costo='50-1')");
      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    }
    $stmt->close();
    $stmt = null;
  }
  /**REGIONAL: CENTRO */
  /**CARTERA PROGRAMAS */
  public static function mdlCarteraProgramasCentro($tabla, $item, $valor) {
    if ($item != null) {
      $stmt = Conexion::conectar()->prepare("SELECT SUM(saldo_final) AS Suma FROM $tabla WHERE $item = :$item AND codigo_cuenta_contable LIKE '13050501%' AND  (codigo_centro_costo='90-2' OR codigo_centro_costo='90-3' OR codigo_centro_costo='90-4' OR codigo_centro_costo='90-5 ')");
      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    }
    $stmt->close();
    $stmt = null;
  }
  /**CARTERA APORTE ADMINISTRATIVO */
  public static function mdlCarteraAporteAdministrativoCentro($tabla, $item, $valor) {
    if ($item != null) {
      $stmt = Conexion::conectar()->prepare("SELECT SUM(saldo_final) AS Suma FROM $tabla WHERE $item = :$item AND codigo_cuenta_contable LIKE '13050501%' AND (codigo_centro_costo='90-1')");
      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    }
    $stmt->close();
    $stmt = null;
  }
  /**REGIONAL: SUROCCIDENTE */
  /**CARTERA PROGRAMAS */
  public static function mdlCarteraProgramasSuroccidente($tabla, $item, $valor) {
    if ($item != null) {
      $stmt = Conexion::conectar()->prepare("SELECT SUM(saldo_final) AS Suma FROM $tabla WHERE $item = :$item AND codigo_cuenta_contable LIKE '13050501%' AND (codigo_centro_costo='80-2' OR codigo_centro_costo='80-3' OR codigo_centro_costo='80-4' OR codigo_centro_costo='80-5 ')");
      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    }
    $stmt->close();
    $stmt = null;
  }
  /**CARTERA APORTE ADMINISTRATIVO */
  public static function mdlCarteraAporteAdministrativoSuroccidente($tabla, $item, $valor) {
    if ($item != null) {
      $stmt = Conexion::conectar()->prepare("SELECT SUM(saldo_final) AS Suma FROM $tabla WHERE $item = :$item AND codigo_cuenta_contable LIKE '13050501%' AND (codigo_centro_costo='80-1')");
      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    }
    $stmt->close();
    $stmt = null;
  }
  /**REGIONAL: ORIENTE */
  /**CARTERA PROGRAMAS */
  public static function mdlCarteraProgramasOriente($tabla, $item, $valor) {
    if ($item != null) {
      $stmt = Conexion::conectar()->prepare("SELECT SUM(saldo_final) AS Suma FROM $tabla WHERE $item = :$item AND codigo_cuenta_contable LIKE '13050501%' AND (codigo_centro_costo='40-2' OR codigo_centro_costo='40-3' OR codigo_centro_costo='40-4' OR codigo_centro_costo='40-5 ')");
      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    }
    $stmt->close();
    $stmt = null;
  }
  /**CARTERA APORTE ADMINISTRATIVO */
  public static function mdlCarteraAporteAdministrativoOriente($tabla, $item, $valor) {
    if ($item != null) {
      $stmt = Conexion::conectar()->prepare("SELECT SUM(saldo_final) AS Suma FROM $tabla WHERE $item = :$item AND codigo_cuenta_contable LIKE '13050501%' AND (codigo_centro_costo='40-1')");
      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    }
    $stmt->close();
    $stmt = null;
  }
  /**REGIONAL: COSTA */
  /**CARTERA PROGRAMAS */
  public static function mdlCarteraProgramasCosta($tabla, $item, $valor) {
    if ($item != null) {
      $stmt = Conexion::conectar()->prepare("SELECT SUM(saldo_final) AS Suma FROM $tabla WHERE $item = :$item AND codigo_cuenta_contable LIKE '13050501%' AND (codigo_centro_costo='70-2' OR codigo_centro_costo='70-3' OR codigo_centro_costo='70-4' OR codigo_centro_costo='70-5 ')");
      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    }
    $stmt->close();
    $stmt = null;
  }
  /**CARTERA APORTE ADMINISTRATIVO */
  public static function mdlCarteraAporteAdministrativoCosta($tabla, $item, $valor) {
    if ($item != null) {
      $stmt = Conexion::conectar()->prepare("SELECT SUM(saldo_final) AS Suma FROM $tabla WHERE $item = :$item AND codigo_cuenta_contable LIKE '13050501%' AND (codigo_centro_costo='70-1')");
      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    }
    $stmt->close();
    $stmt = null;
  }

  /** -- */

  /**CARTERA ASCUN NACIONAL */
  /**TOTAL CUOTAS ASCUN NAL */
  public static function mdlTotalCuotasASCUNNAL($tabla, $item, $valor) {
    if ($item != null) {
      $stmt = Conexion::conectar()->prepare("SELECT SUM(saldo_final) AS Suma FROM $tabla WHERE $item = :$item AND codigo_cuenta_contable LIKE '13050501%' AND (codigo_centro_costo='1-1')");
      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    }
    $stmt->close();
    $stmt = null;
  }
  /**CARTERA FONDOS */
  public static function mdlCarteraFondos($tabla, $item, $valor) {
    if ($item != null) {
      $stmt = Conexion::conectar()->prepare("SELECT SUM(saldo_final) AS Suma FROM $tabla WHERE $item = :$item AND CHARACTER_LENGTH(codigo_centro_costo)=5 AND ( codigo_centro_costo LIKE '5%' OR codigo_centro_costo LIKE '6%' OR codigo_centro_costo LIKE '7%') AND codigo_cuenta_contable LIKE '13050501%'");
      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    }
    $stmt->close();
    $stmt = null;
  }
  /**PROGRAMAS Y PROYECTOS */
  /**PROGRAMA RETOS */
  public static function mdlProgramasRetos($tabla, $item, $valor) {
    if ($item != null) {
      $stmt = Conexion::conectar()->prepare("SELECT SUM(saldo_final) AS Suma FROM $tabla WHERE $item = :$item AND codigo_cuenta_contable LIKE '13050501%' AND (codigo_centro_costo LIKE '15-%')");
      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    }
    $stmt->close();
    $stmt = null;
  }
  /**EVENTOS ASCUN */
  public static function mdlEventosSACUN($tabla, $item, $valor) {
    if ($item != null) {
      $stmt = Conexion::conectar()->prepare("SELECT SUM(saldo_final) AS Suma FROM $tabla WHERE $item = :$item AND codigo_cuenta_contable LIKE '13050501%' AND codigo_centro_costo LIKE '2-%' AND ((codigo_centro_costo !='2-2') AND (codigo_centro_costo !='2-12') AND (codigo_centro_costo !='2-13'))");
      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    }
    $stmt->close();
    $stmt = null;
  }
  /**ADMINISTRATIVO */
  public static function mdlAdministrativo($tabla, $item, $valor) {
    if ($item != null) {
      $stmt = Conexion::conectar()->prepare("SELECT SUM(saldo_final) AS Suma FROM $tabla WHERE $item = :$item AND codigo_cuenta_contable LIKE '13050501%' AND (codigo_centro_costo LIKE '1-%' AND codigo_centro_costo != '1-1')");
      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    }
    $stmt->close();
    $stmt = null;
  }
  /**PLENO */
  public static function mdlPleno($tabla, $item, $valor) {
    if ($item != null) {
      $stmt = Conexion::conectar()->prepare("SELECT SUM(saldo_final) AS Suma FROM $tabla WHERE $item = :$item AND codigo_cuenta_contable LIKE '13050501%' AND ((codigo_centro_costo ='2-2') OR (codigo_centro_costo ='2-12') OR (codigo_centro_costo ='2-13'))");
      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    }
    $stmt->close();
    $stmt = null;
  }
  /**PROYECTOS */
  public static function mdlProyectos($tabla, $item, $valor) {
    if ($item != null) {
      $stmt = Conexion::conectar()->prepare("SELECT SUM(saldo_final) AS Suma FROM $tabla WHERE $item = :$item AND codigo_centro_costo LIKE '4-%' AND codigo_cuenta_contable LIKE '13050501%'");
      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    }
    $stmt->close();
    $stmt = null;
  }

  /** -- */
  
  /**CARTERA EN RIESGO MAYOR A UN AÑO */
  /**REGIONAL: ANTIOQUIA */
  /**CARTERA PROGRAMAS */
  public static function mdl_CRR_CarteraProgramasAntioquia($tabla, $item, $valor) {
    if ($item != null) {
      $stmt = Conexion::conectar()->prepare("SELECT SUM(saldo_final) AS Suma FROM $tabla WHERE $item = :$item AND codigo_cuenta_contable LIKE '139905%' AND (codigo_centro_costo='60-2' OR codigo_centro_costo='60-3' OR codigo_centro_costo='60-4' OR codigo_centro_costo='60-5')");
      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    }
    $stmt->close();
    $stmt = null;
  }
  /**CARTERA CUOTRAS */
  public static function mdlCarteraCuotasAntioquia($tabla, $item, $valor) {
    if ($item != null) {
      $stmt = Conexion::conectar()->prepare("SELECT SUM(saldo_final) AS Suma FROM $tabla WHERE $item = :$item AND codigo_cuenta_contable LIKE '139905%' AND (codigo_centro_costo='60-1')");
      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    }
    $stmt->close();
    $stmt = null;
  }
  /**REGIONAL: BOGOTA */
  /**CARTERA PROGRAMAS */
  public static function mdl_CRR_CarteraProgramasBogota($tabla, $item, $valor) {
    if ($item != null) {
      $stmt = Conexion::conectar()->prepare("SELECT SUM(saldo_final) AS Suma FROM $tabla WHERE $item = :$item AND codigo_cuenta_contable LIKE '139905%' AND (codigo_centro_costo='50-2' OR codigo_centro_costo='50-3' OR codigo_centro_costo='50-4' OR codigo_centro_costo='50-5')");
      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    }
    $stmt->close();
    $stmt = null;
  }
  /**CARTERA CUOTRAS */
  public static function mdlCarteraCuotasBogota($tabla, $item, $valor) {
    if ($item != null) {
      $stmt = Conexion::conectar()->prepare("SELECT SUM(saldo_final) AS Suma FROM $tabla WHERE $item = :$item AND codigo_cuenta_contable LIKE '139905%' AND (codigo_centro_costo='50-1')");
      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    }
    $stmt->close();
    $stmt = null;
  }
  /**REGIONAL: CENTRO */
  /**CARTERA PROGRAMAS */
  public static function mdl_CRR_CarteraProgramasCentro($tabla, $item, $valor) {
    if ($item != null) {
      $stmt = Conexion::conectar()->prepare("SELECT SUM(saldo_final) AS Suma FROM $tabla WHERE $item = :$item AND codigo_cuenta_contable LIKE '139905%' AND (codigo_centro_costo='90-2' OR codigo_centro_costo='90-3' OR codigo_centro_costo='90-4' OR codigo_centro_costo='90-5')");
      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    }
    $stmt->close();
    $stmt = null;
  }
  /**CARTERA CUOTRAS */
  public static function mdlCarteraCuotasCentro($tabla, $item, $valor) {
    if ($item != null) {
      $stmt = Conexion::conectar()->prepare("SELECT SUM(saldo_final) AS Suma FROM $tabla WHERE $item = :$item AND codigo_cuenta_contable LIKE '139905%' AND (codigo_centro_costo='90-1')");
      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    }
    $stmt->close();
    $stmt = null;
  }
  /**REGIONAL: SUROCCIDENTE */
  /**CARTERA PROGRAMAS */
  public static function mdl_CRR_CarteraProgramasSuroccidente($tabla, $item, $valor) {
    if ($item != null) {
      $stmt = Conexion::conectar()->prepare("SELECT SUM(saldo_final) AS Suma FROM $tabla WHERE $item = :$item AND codigo_cuenta_contable LIKE '139905%' AND (codigo_centro_costo='80-2' OR codigo_centro_costo='80-3' OR codigo_centro_costo='80-4' OR codigo_centro_costo='80-5')");
      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    }
    $stmt->close();
    $stmt = null;
  }
  /**CARTERA CUOTRAS */
  public static function mdlCarteraCuotasSuroccidente($tabla, $item, $valor) {
    if ($item != null) {
      $stmt = Conexion::conectar()->prepare("SELECT SUM(saldo_final) AS Suma FROM $tabla WHERE $item = :$item AND codigo_cuenta_contable LIKE '139905%' AND (codigo_centro_costo='80-1')");
      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    }
    $stmt->close();
    $stmt = null;
  }
  /**REGIONAL: ORIENTE */
  /**CARTERA PROGRAMAS */
  public static function mdl_CRR_CarteraProgramasOriente($tabla, $item, $valor) {
    if ($item != null) {
      $stmt = Conexion::conectar()->prepare("SELECT SUM(saldo_final) AS Suma FROM $tabla WHERE $item = :$item AND codigo_cuenta_contable LIKE '139905%' AND (codigo_centro_costo='40-2' OR codigo_centro_costo='40-3' OR codigo_centro_costo='40-4' OR codigo_centro_costo='40-5')");
      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    }
    $stmt->close();
    $stmt = null;
  }
  /**CARTERA CUOTRAS */
  public static function mdlCarteraCuotasOriente($tabla, $item, $valor) {
    if ($item != null) {
      $stmt = Conexion::conectar()->prepare("SELECT SUM(saldo_final) AS Suma FROM $tabla WHERE $item = :$item AND codigo_cuenta_contable LIKE '139905%' AND (codigo_centro_costo='40-1')");
      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    }
    $stmt->close();
    $stmt = null;
  }
  /**REGIONAL: COSTA */
  /**CARTERA PROGRAMAS */
  public static function mdl_CRR_CarteraProgramasCosta($tabla, $item, $valor) {
    if ($item != null) {
      $stmt = Conexion::conectar()->prepare("SELECT SUM(saldo_final) AS Suma FROM $tabla WHERE $item = :$item AND codigo_cuenta_contable LIKE '139905%' AND (codigo_centro_costo='70-2' OR codigo_centro_costo='70-3' OR codigo_centro_costo='70-4' OR codigo_centro_costo='70-5')");
      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    }
    $stmt->close();
    $stmt = null;
  }
  /**CARTERA CUOTRAS */
  public static function mdlCarteraCuotasCosta($tabla, $item, $valor) {
    if ($item != null) {
      $stmt = Conexion::conectar()->prepare("SELECT SUM(saldo_final) AS Suma FROM $tabla WHERE $item = :$item AND codigo_cuenta_contable LIKE '139905%' AND (codigo_centro_costo='70-1')");
      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    }
    $stmt->close();
    $stmt = null;
  }
  /**FONDOS */
  /**CARTERA PROGRAMAS */
  public static function mdl_CRR_CarteraProgramasFondos($tabla, $item, $valor) {
    if ($item != null) {
      $stmt = Conexion::conectar()->prepare("SELECT SUM(saldo_final) AS Suma FROM $tabla WHERE $item = :$item AND codigo_cuenta_contable LIKE '139905%' AND ((codigo_centro_costo LIKE '1-%' AND codigo_centro_costo != '1-1') OR  (codigo_centro_costo LIKE '70-%') OR (codigo_centro_costo LIKE '15-%'))");
      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    }
    $stmt->close();
    $stmt = null;
  }
  /**ASCUN NACIONAL */
  /**CARTERA PROGRAMAS */
  public static function mdl_CRR_CarteraProgramasASCUNNACINAL($tabla, $item, $valor) {
    if ($item != null) {
      $stmt = Conexion::conectar()->prepare("SELECT SUM(saldo_final) AS Suma FROM $tabla WHERE $item = :$item AND codigo_cuenta_contable LIKE '139905%' AND ((codigo_centro_costo LIKE '1-%' AND codigo_centro_costo != '1-1' ) OR  (codigo_centro_costo LIKE '70-%') OR (codigo_centro_costo LIKE '15-%'))");
      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    }
    $stmt->close();
    $stmt = null;
  }
  /**CARTERA CUOTRAS */
  public static function mdlCarteraCuotasASCUNNACINAL($tabla, $item, $valor) {
    if ($item != null) {
      $stmt = Conexion::conectar()->prepare("SELECT SUM(saldo_final) AS Suma FROM $tabla WHERE $item = :$item AND codigo_cuenta_contable LIKE '139905%' AND (codigo_centro_costo='1-1')");
      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    }
    $stmt->close();
    $stmt = null;
  }

}