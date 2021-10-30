<?php
require_once "Conexion.php";
class ModeloInformeER {
  /**Informe: ESTADO DE RESULTADOS INTEGRAL (GYP) */
  /**INGRESOS */
  /**CUOTAS DE SOSTENIMIENTO ASCUN NACIONAL */
  public static function mdlCuotaSostenimientoASCUN_N($tabla, $item, $valor) {
    if ($item != null) {
      $stmt = Conexion::conectar()->prepare("SELECT SUM(movimiento_credito) - SUM(movimiento_debito) AS Suma FROM $tabla WHERE $item = :$item AND codigo_centro_costo = '1-1' AND codigo_cuenta_contable LIKE '41%'");
      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    }
    $stmt->close();
    $stmt = null;
  }
  /**PROGRAMAS */
  public static function mdlProgramas($tabla, $item, $valor) {
    if ($item != null) {
      $stmt = Conexion::conectar()->prepare("SELECT SUM(movimiento_credito) - SUM(movimiento_debito) AS Suma FROM $tabla WHERE  $item = :$item AND codigo_centro_costo LIKE '2-%' AND codigo_cuenta_contable LIKE '41%'");
      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    }
    $stmt->close();
    $stmt = null;
  }
  /**PROGRAMAS FONDOS*/
  public static function mdlProgramasFondos($tabla, $item, $valor) {
        if ($item != null) {
      $stmt = Conexion::conectar()->prepare("SELECT SUM(movimiento_credito) - SUM(movimiento_debito) AS Suma FROM $tabla WHERE  $item = :$item AND CHARACTER_LENGTH(codigo_centro_costo)>4 AND ( codigo_centro_costo LIKE '5%' OR codigo_centro_costo LIKE '6%') AND codigo_cuenta_contable LIKE '41%'");
      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    }
    $stmt->close();
    $stmt = null;
  }
  /**PROYECTOS INTERNACIONALES*/
  public static function mdlproyectosInternacionales($tabla, $item, $valor) {
    if ($item != null) {
      $stmt = Conexion::conectar()->prepare("SELECT SUM(movimiento_credito) - SUM(movimiento_debito) AS Suma FROM $tabla WHERE  $item = :$item AND CHARACTER_LENGTH(codigo_centro_costo)=4 AND ( codigo_centro_costo LIKE '4-8%' OR codigo_centro_costo LIKE '4-90%') AND codigo_cuenta_contable LIKE '41%'");
      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    }
    $stmt->close();
    $stmt = null;
  }
  /**GERENCIA Y ADMINISTRACIÓN DE PROYECTOS*/
  public static function mdlGerenciaAdministracionProyectos($tabla, $item, $valor) {
    if ($item != null) {
      $stmt = Conexion::conectar()->prepare("SELECT SUM(movimiento_credito) - SUM(movimiento_debito) AS Suma FROM $tabla WHERE  $item = :$item AND codigo_cuenta_contable LIKE '416091%' OR codigo_cuenta_contable LIKE '41750508%'");
      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    }
    $stmt->close();
    $stmt = null;
  }
  /**CONTRATOS NACIONALES*/
  public static function mdlContratosNacionales($tabla, $item, $valor) {
    if ($item != null) {
      $stmt = Conexion::conectar()->prepare("SELECT SUM(movimiento_credito) - SUM(movimiento_debito) AS Suma FROM $tabla WHERE  $item = :$item AND codigo_cuenta_contable LIKE'4180%' AND codigo_centro_costo LIKE '4-%'");
      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    }
    $stmt->close();
    $stmt = null;
  }
  /**PROGRAMAS RETOS*/
  public static function mdlProgramasRetos($tabla, $item, $valor) {
    if ($item != null) {
      $stmt = Conexion::conectar()->prepare("SELECT SUM(movimiento_credito) - SUM(movimiento_debito) AS Suma FROM $tabla WHERE  $item = :$item AND codigo_centro_costo LIKE '15-%' AND (codigo_cuenta_contable LIKE '41704001%' or codigo_cuenta_contable LIKE '41750504%')");
      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    }
    $stmt->close();
    $stmt = null;
  }
  /**CUOTAS DE SOSTENIMIENTO ASCUN BIENESTAR*/
  public static function mdlCuotaSostenimientoASCUNbienestar($tabla, $item, $valor) {
    if ($item != null) {
      $stmt = Conexion::conectar()->prepare("SELECT SUM(movimiento_credito) - SUM(movimiento_debito) AS Suma FROM $tabla WHERE  $item = :$item AND (codigo_centro_costo='40-1' OR codigo_centro_costo='50-1' OR codigo_centro_costo='60-1' OR codigo_centro_costo='70-1' OR codigo_centro_costo='80-1' OR codigo_centro_costo='90-1') AND (codigo_cuenta_contable LIKE '416041%' OR codigo_cuenta_contable LIKE '41750510%')");
      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    }
    $stmt->close();
    $stmt = null;
  }
  /**PROGRAMAS Y PROYECTOS ASCUN BIENESTAR*/
  public static function mdlProgramasProyectosASCUNbienestar($tabla, $item, $valor) {
    if ($item != null) {
      $stmt = Conexion::conectar()->prepare("SELECT SUM(movimiento_credito) - SUM(movimiento_debito) AS Suma FROM $tabla WHERE  $item = :$item AND (codigo_centro_costo='50-2' OR codigo_centro_costo='50-3' OR codigo_centro_costo='50-4' OR codigo_centro_costo='50-5' OR codigo_centro_costo='40-2' OR codigo_centro_costo='40-3' OR codigo_centro_costo='40-4' OR codigo_centro_costo='40-5' OR codigo_centro_costo='60-2' OR codigo_centro_costo='60-3' OR codigo_centro_costo='60-4' OR codigo_centro_costo='60-5' OR codigo_centro_costo='70-2' OR codigo_centro_costo='70-3' OR codigo_centro_costo='70-4' OR codigo_centro_costo='70-5' OR codigo_centro_costo='80-2' OR codigo_centro_costo='80-3' OR codigo_centro_costo='80-4' OR codigo_centro_costo='80-5' OR codigo_centro_costo='90-2' OR codigo_centro_costo='90-3' OR codigo_centro_costo='90-4' OR codigo_centro_costo='90-5') AND (codigo_cuenta_contable='41720101' OR codigo_cuenta_contable='41750503')");
      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    }
    $stmt->close();
    $stmt = null;
  }
  // NO OPERACIONALES
  /**FINANCIEROS1*/
  public static function mdlFinancieros1($tabla, $item, $valor) {
    if ($item != null) {
      $stmt = Conexion::conectar()->prepare("SELECT SUM(movimiento_credito) - SUM(movimiento_debito) AS Suma FROM $tabla WHERE  $item = :$item AND codigo_cuenta_contable LIKE '4210%'");
      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    }
    $stmt->close();
    $stmt = null;
  }
  /**FINANCIEROS2*/
  public static function mdlFinancieros2($tabla, $item, $valor) {
    if ($item != null) {
      $stmt = Conexion::conectar()->prepare("SELECT SUM(movimiento_credito) - SUM(movimiento_debito) AS Suma FROM $tabla WHERE  $item = :$item AND codigo_cuenta_contable LIKE '4245%'");
      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    }
    $stmt->close();
    $stmt = null;
  }
  /**INDEMNIZACIONES*/
  public static function mdlIndemnizaciones($tabla, $item, $valor) {
    if ($item != null) {
      $stmt = Conexion::conectar()->prepare("SELECT SUM(movimiento_credito) - SUM(movimiento_debito) AS Suma FROM $tabla WHERE  $item = :$item AND codigo_cuenta_contable LIKE '4255%'");
      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    }
    $stmt->close();
    $stmt = null;
  }
  /**DIVERSOS*/
  public static function mdlDiversos($tabla, $item, $valor) {
    if ($item != null) {
      $stmt = Conexion::conectar()->prepare("SELECT SUM(movimiento_credito) - SUM(movimiento_debito) AS Suma FROM $tabla WHERE  $item = :$item AND codigo_cuenta_contable LIKE '4295%'");
      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    }
    $stmt->close();
    $stmt = null;
  }
  /**GYP EGRESOS */
  /**ADMINISTRACIÓN Y SOSTENIMIENTO*/
  public static function mdlAdministracionSostenimiento($tabla, $item, $valor) {
    if ($item != null) {
      $stmt = Conexion::conectar()->prepare("SELECT SUM(movimiento_debito) - SUM(movimiento_credito) AS Suma FROM $tabla WHERE  $item = :$item AND codigo_centro_costo LIKE'1-%' AND (codigo_cuenta_contable LIKE '51%' AND codigo_cuenta_contable<>'5199')");
      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    }
    $stmt->close();
    $stmt = null;
  }
  /**DETERIORO DE CARTERA*/
  public static function mdlDeterioroCartera($tabla, $item, $valor) {
    if ($item != null) {
      $stmt = Conexion::conectar()->prepare("SELECT SUM(movimiento_debito) - SUM(movimiento_credito) AS Suma FROM $tabla WHERE  $item = :$item AND ((CHARACTER_LENGTH(codigo_centro_costo)=5 AND ( codigo_centro_costo LIKE '5%' OR codigo_centro_costo LIKE '6%')) OR (codigo_centro_costo LIKE '1-%' OR codigo_centro_costo LIKE '2-%' OR codigo_centro_costo LIKE '15-%' OR codigo_centro_costo LIKE '4-%'))  AND (codigo_cuenta_contable='519910')");
      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    }
    $stmt->close();
    $stmt = null;
  }
  /**PROGRAMAS EGRESOS*/
  public static function mdlProgramasEgresos($tabla, $item, $valor) {
    if ($item != null) {
      $stmt = Conexion::conectar()->prepare("SELECT SUM(movimiento_debito) - SUM(movimiento_credito) AS Suma FROM $tabla WHERE  $item = :$item AND (codigo_centro_costo LIKE '2-%') AND codigo_cuenta_contable LIKE '51%'");
      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    }
    $stmt->close();
    $stmt = null;
  }
  /**PROGRAMAS FONDOS EGRESOS*/
  public static function mdlProgramasFondosEgresos($tabla, $item, $valor) {
    if ($item != null) {
      $stmt = Conexion::conectar()->prepare("SELECT SUM(movimiento_debito) - SUM(movimiento_credito) AS Suma FROM $tabla WHERE  $item = :$item AND CHARACTER_LENGTH(codigo_centro_costo)=5 AND ( codigo_centro_costo LIKE '5%' OR codigo_centro_costo LIKE '6%') AND codigo_cuenta_contable LIKE '51%'");
      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    }
    $stmt->close();
    $stmt = null;
  }
  /**PROYECTOS INTERNACIONALES EGRESOS*/
  public static function mdlProyectosInternacionalesEgresos($tabla, $item, $valor) {
    if ($item != null) {
      $stmt = Conexion::conectar()->prepare("SELECT SUM(movimiento_debito) - SUM(movimiento_credito) AS Suma FROM $tabla WHERE  $item = :$item AND CHARACTER_LENGTH(codigo_centro_costo)<5 AND ( codigo_centro_costo LIKE '4-1%' OR codigo_centro_costo LIKE '4-90%'OR codigo_centro_costo LIKE '4-2%' OR codigo_centro_costo LIKE '4-3%' OR codigo_centro_costo LIKE '4-4%' OR codigo_centro_costo LIKE '4-5%' OR codigo_centro_costo LIKE '4-6%' OR codigo_centro_costo LIKE '4-7%' OR codigo_centro_costo LIKE '4-8%') AND codigo_cuenta_contable LIKE '51%'");
      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    }
    $stmt->close();
    $stmt = null;
  }
  
  /**GERENCIA Y ADMINISTRACIÓN DE PROYECTOS EGRESOS*/
  public static function mdlGerenciaAdministracionProyectosEgresos($tabla, $item, $valor) {
    if ($item != null) {
      $stmt = Conexion::conectar()->prepare("SELECT SUM(movimiento_debito) - SUM(movimiento_credito) AS Suma FROM $tabla WHERE  $item = :$item AND (codigo_centro_costo='4-94') AND codigo_cuenta_contable LIKE '51%'");
      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    }
    $stmt->close();
    $stmt = null;
  }
  /**CONTRATOS NACIONALES EGRESOS*/
  public static function mdlContratosNacionalesEgresos($tabla, $item, $valor) {
    if ($item != null) {
      $stmt = Conexion::conectar()->prepare("SELECT SUM(movimiento_debito) - SUM(movimiento_credito) AS Suma FROM $tabla WHERE  $item = :$item AND (codigo_centro_costo LIKE '4-1%' OR codigo_centro_costo LIKE '4-2%' OR codigo_centro_costo LIKE '4-3%' OR codigo_centro_costo LIKE '4-4%' OR codigo_centro_costo LIKE '4-5%' OR codigo_centro_costo LIKE '4-6%' OR codigo_centro_costo LIKE '4-7%' OR codigo_centro_costo LIKE '4-80%') AND codigo_cuenta_contable LIKE '51%'");
      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    }
    $stmt->close();
    $stmt = null;
  }
  /**PROGRAMAS RETOS EGRESOS*/
  public static function mdlProgramasRetosEgresos($tabla, $item, $valor) {
    if ($item != null) {
      $stmt = Conexion::conectar()->prepare("SELECT SUM(movimiento_debito) - SUM(movimiento_credito) AS Suma FROM $tabla WHERE  $item = :$item AND (codigo_centro_costo LIKE '15-%') AND codigo_cuenta_contable LIKE '51%'");
      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    }
    $stmt->close();
    $stmt = null;
  }
  /**INVERSION Y EQUIPO TECNICO*/
  public static function mdlInversionEquiposTecnico($tabla, $item, $valor) {
    if ($item != null) {
      $stmt = Conexion::conectar()->prepare("SELECT SUM(movimiento_debito) - SUM(movimiento_credito) AS Suma FROM $tabla WHERE  $item = :$item AND (codigo_centro_costo LIKE '13-%') AND codigo_cuenta_contable LIKE '51%'");
      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    }
    $stmt->close();
    $stmt = null;
  }
  /**SISTEMA INTEGRADO DE GESTIÓN*/
  public static function mdlSistemaIntegradoGestion($tabla, $item, $valor) {
    if ($item != null) {
      $stmt = Conexion::conectar()->prepare("SELECT SUM(movimiento_debito) - SUM(movimiento_credito) AS Suma FROM $tabla WHERE  $item = :$item AND (codigo_centro_costo LIKE '16-%') AND codigo_cuenta_contable LIKE '51%'");
      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    }
    $stmt->close();
    $stmt = null;
  }
  /**ADMINISTRACIÓN Y SOSTENIMIENTO ASCUN BIENESTAR*/
  public static function mdlAdministracionSostenimientoASCUNbienestar($tabla, $item, $valor) {
    if ($item != null) {
      $stmt = Conexion::conectar()->prepare("SELECT SUM(movimiento_debito) - SUM(movimiento_credito) AS Suma FROM $tabla WHERE  $item = :$item AND (codigo_cuenta_contable LIKE '51%' AND codigo_cuenta_contable<>'519910') AND (codigo_centro_costo='40-1' OR codigo_centro_costo='50-1' OR codigo_centro_costo='60-1' OR codigo_centro_costo='70-1' OR codigo_centro_costo='80-1' OR codigo_centro_costo='90-1')");
      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    }
    $stmt->close();
    $stmt = null;
  }
  /**PROGRAMAS  ASCUN BIENESTAR*/
  public static function mdlProgramasASCUNbienestar($tabla, $item, $valor) {
    if ($item != null) {
      $stmt = Conexion::conectar()->prepare("SELECT SUM(movimiento_debito) - SUM(movimiento_credito) AS Suma FROM $tabla WHERE  $item = :$item AND (codigo_cuenta_contable LIKE '51%' AND codigo_cuenta_contable<>'519910') AND (codigo_centro_costo='50-2' OR codigo_centro_costo='50-3' OR codigo_centro_costo='50-4' OR codigo_centro_costo='50-5' OR codigo_centro_costo='40-2' OR codigo_centro_costo='40-3' OR codigo_centro_costo='40-4' OR codigo_centro_costo='40-5' OR codigo_centro_costo='60-2' OR codigo_centro_costo='60-3' OR codigo_centro_costo='60-4' OR codigo_centro_costo='60-5' OR codigo_centro_costo='70-2' OR codigo_centro_costo='70-3' OR codigo_centro_costo='70-4' OR codigo_centro_costo='70-5' OR codigo_centro_costo='80-2' OR codigo_centro_costo='80-3' OR codigo_centro_costo='80-4' OR codigo_centro_costo='80-5' OR codigo_centro_costo='90-2' OR codigo_centro_costo='90-3' OR codigo_centro_costo='90-4' OR codigo_centro_costo='90-5')");
      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    }
    $stmt->close();
    $stmt = null;
  }
  /**DETERIORO DE CARTERA*/
  public static function mdlDeterioroDeCartera($tabla, $item, $valor) {
    if ($item != null) {
      $stmt = Conexion::conectar()->prepare("SELECT SUM(movimiento_debito) - SUM(movimiento_credito) AS Suma FROM $tabla WHERE  $item = :$item AND (codigo_cuenta_contable='519910') AND (codigo_centro_costo LIKE'40-%' OR codigo_centro_costo LIKE'50-%' OR codigo_centro_costo LIKE'60-%' OR codigo_centro_costo LIKE'70-%' OR codigo_centro_costo LIKE'80-%' OR codigo_centro_costo LIKE'90-%')");
      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    }
    $stmt->close();
    $stmt = null;
  }
  /**NO OPERACIONALES */
  /**FINANCIEROS EGRESOS*/
  public static function mdlFinancierosEgresos($tabla, $item, $valor) {
    if ($item != null) {
      $stmt = Conexion::conectar()->prepare("SELECT SUM(movimiento_debito) - SUM(movimiento_credito) AS Suma FROM $tabla WHERE  $item = :$item AND codigo_cuenta_contable LIKE '5305%'");
      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    }
    $stmt->close();
    $stmt = null;
  }
  /**GASTOS EXTRAORDINARIOS*/
  public static function mdlGastosExtraordinarios($tabla, $item, $valor) {
    if ($item != null) {
      $stmt = Conexion::conectar()->prepare("SELECT SUM(movimiento_debito) - SUM(movimiento_credito) AS Suma FROM $tabla WHERE  $item = :$item AND codigo_cuenta_contable LIKE '5315%'");
      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    }
    $stmt->close();
    $stmt = null;
  }
  /**GASTOS DIVERSOS*/
  public static function mdlGastosDiversos($tabla, $item, $valor) {
    if ($item != null) {

      $stmt = Conexion::conectar()->prepare("SELECT SUM(movimiento_debito) - SUM(movimiento_credito) AS Suma FROM $tabla WHERE  $item = :$item AND codigo_cuenta_contable LIKE '5395%'");
      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    }
    $stmt->close();
    $stmt = null;
  }

}