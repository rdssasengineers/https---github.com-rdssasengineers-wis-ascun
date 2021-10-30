<?php
require_once "Conexion.php";
class ModeloInformeSF {
  /**Informe: ESTADO DE SITUACIÓN FINANCIERA */
  /**ACTIVO */
  /**DISPONIBLE ASCUN NACIONAL */
  public static function mdlDisponibleASCUNNAC($tabla, $item, $valor) {
    if ($item != null) {
      $stmt = Conexion::conectar()->prepare("SELECT SUM(saldo_inicial) + SUM(movimiento_debito) - SUM(movimiento_credito) AS Suma FROM $tabla WHERE $item = :$item AND ((CHARACTER_LENGTH(codigo_centro_costo)>4 AND (codigo_centro_costo LIKE '5%' OR (codigo_centro_costo LIKE '6%')) OR codigo_centro_costo LIKE '1-%'  OR codigo_centro_costo LIKE'2-%'  OR codigo_centro_costo LIKE '3-%'  OR codigo_centro_costo LIKE '4-%'  OR codigo_centro_costo LIKE '12-%'  OR codigo_centro_costo LIKE '13-%'  OR codigo_centro_costo LIKE '14-%'  OR codigo_centro_costo LIKE '15-%'  OR codigo_centro_costo LIKE '16-%')) AND (codigo_cuenta_contable LIKE '11%')");
      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    }
    $stmt->close();
    $stmt = null;
  }
  /**DISPONIBLE ASCUN BIENESTAR */
  public static function mdlDisponibleASCUNBIE($tabla, $item, $valor) {
    if ($item != null) {
      $stmt = Conexion::conectar()->prepare("SELECT SUM(saldo_inicial) + SUM(movimiento_debito) - SUM(movimiento_credito) AS Suma FROM $tabla WHERE $item = :$item AND (codigo_cuenta_contable LIKE '11%')AND (codigo_centro_costo='50-2' OR codigo_centro_costo='50-3' OR codigo_centro_costo='50-4' OR codigo_centro_costo='50-5' OR codigo_centro_costo='40-2' OR codigo_centro_costo='40-3' OR codigo_centro_costo='40-4' OR codigo_centro_costo='40-5' OR codigo_centro_costo='60-2' OR codigo_centro_costo='60-3' OR codigo_centro_costo='60-4' OR codigo_centro_costo='60-5' OR codigo_centro_costo='70-2' OR codigo_centro_costo='70-3' OR codigo_centro_costo='70-4' OR codigo_centro_costo='70-5' OR codigo_centro_costo='80-2' OR codigo_centro_costo='80-3' OR codigo_centro_costo='80-4' OR codigo_centro_costo='80-5' OR codigo_centro_costo='90-2' OR codigo_centro_costo='90-3' OR codigo_centro_costo='90-4' OR codigo_centro_costo='90-5' OR codigo_centro_costo='50-1' OR codigo_centro_costo='60-1' OR codigo_centro_costo='70-1' OR codigo_centro_costo='80-1' OR codigo_centro_costo='90-1' OR codigo_centro_costo='40-1')");
      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    }
    $stmt->close();
    $stmt = null;
  }
  /**INVERSIONES FIDUCIARIAS */
  public static function mdlInversionesFiduciarias($tabla, $item, $valor) {
    if ($item != null) {
      $stmt = Conexion::conectar()->prepare("SELECT SUM(saldo_inicial) + SUM(movimiento_debito) - SUM(movimiento_credito) AS Suma FROM $tabla WHERE $item = :$item AND (codigo_cuenta_contable LIKE '12%')");
      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    }
    $stmt->close();
    $stmt = null;
  }
  /**ANTICIPOS Y AVANCES */
  public static function mdlAnticiposAvances($tabla, $item, $valor) {
    if ($item != null) {
      $stmt = Conexion::conectar()->prepare("SELECT SUM(saldo_inicial) + SUM(movimiento_debito) - SUM(movimiento_credito) AS Suma FROM $tabla WHERE $item = :$item AND (codigo_cuenta_contable='13300501')");
      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    }
    $stmt->close();
    $stmt = null;
  }
  /**ANTICIPO DE IMPUESTOS */
  public static function mdlAnticiposImpuestos($tabla, $item, $valor) {
    if ($item != null) {
      $stmt = Conexion::conectar()->prepare("SELECT SUM(saldo_inicial) + SUM(movimiento_debito) - SUM(movimiento_credito) AS Suma FROM $tabla WHERE $item = :$item AND (codigo_cuenta_contable LIKE '1355%')");
      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    }
    $stmt->close();
    $stmt = null;
  }
  /**DEUDORES CUOTAS ASCUN NACIONAL */
  public static function mdlDeudoresCuotaASCUNNAC($tabla, $item, $valor) {
    if ($item != null) {
      $stmt = Conexion::conectar()->prepare("SELECT SUM(saldo_inicial) + SUM(movimiento_debito) - SUM(movimiento_credito) AS Suma FROM $tabla WHERE $item = :$item AND (codigo_cuenta_contable ='13050501') AND (codigo_centro_costo LIKE '1-1%')");
      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    }
    $stmt->close();
    $stmt = null;
  }
  /**DEUDORES CUOTAS ASCUN BIENESTAR */
  public static function mdlDeudoresCuotaASCUNBIE($tabla, $item, $valor) {
    if ($item != null) {
      $stmt = Conexion::conectar()->prepare("SELECT SUM(saldo_inicial) + SUM(movimiento_debito) - SUM(movimiento_credito) AS Suma FROM $tabla WHERE $item = :$item AND (codigo_centro_costo='40-1' OR codigo_centro_costo='50-1' OR codigo_centro_costo='60-1' OR codigo_centro_costo='70-1' OR codigo_centro_costo='80-1' OR codigo_centro_costo='90-1') AND (codigo_cuenta_contable='13050501')");
      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    }
    $stmt->close();
    $stmt = null;
  }
  /**PROGRAMAS Y PROYECTOS  ASCUN NACIONAL */
  public static function mdlProgramasProyectosASCUNNAC($tabla, $item, $valor) {
    if ($item != null) {
      $stmt = Conexion::conectar()->prepare("SELECT SUM(saldo_inicial) + SUM(movimiento_debito) - SUM(movimiento_credito) AS Suma FROM $tabla WHERE $item = :$item AND (codigo_cuenta_contable='13050501') AND (codigo_centro_costo LIKE '1-2%' OR codigo_centro_costo  LIKE '1-3%' OR codigo_centro_costo  LIKE '1-4%' OR codigo_centro_costo  LIKE '1-5%' OR codigo_centro_costo  LIKE '1-6%' OR codigo_centro_costo  LIKE '1-7%' OR codigo_centro_costo  LIKE '1-8%' OR codigo_centro_costo  LIKE '1-9%' OR codigo_centro_costo  LIKE '1-10%' OR codigo_centro_costo LIKE '2-%' OR codigo_centro_costo LIKE '3-%' OR codigo_centro_costo LIKE '15-%')");
      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    }
    $stmt->close();
    $stmt = null;
  }
  /**PROGRAMAS ASCUN BIENESTAR */
  public static function mdlProgramasASCUNBIE($tabla, $item, $valor) {
    if ($item != null) {
      $stmt = Conexion::conectar()->prepare("SELECT SUM(saldo_inicial) + SUM(movimiento_debito) - SUM(movimiento_credito) AS Suma FROM $tabla WHERE $item = :$item AND (codigo_cuenta_contable='13050501')AND (codigo_centro_costo='50-2' OR codigo_centro_costo='50-3' OR codigo_centro_costo='50-4' OR codigo_centro_costo='50-5' OR codigo_centro_costo='40-2' OR codigo_centro_costo='40-3' OR codigo_centro_costo='40-4' OR codigo_centro_costo='40-5' OR codigo_centro_costo='60-2' OR codigo_centro_costo='60-3' OR codigo_centro_costo='60-4' OR codigo_centro_costo='60-5' OR codigo_centro_costo='70-2' OR codigo_centro_costo='70-3' OR codigo_centro_costo='70-4' OR codigo_centro_costo='70-5' OR codigo_centro_costo='80-2' OR codigo_centro_costo='80-3' OR codigo_centro_costo='80-4' OR codigo_centro_costo='80-5' OR codigo_centro_costo='90-2' OR codigo_centro_costo='90-3' OR codigo_centro_costo='90-4' OR codigo_centro_costo='90-5')");
      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    }
    $stmt->close();
    $stmt = null;
  }
  /**CONVENIOS INTERNACIONALES */
  public static function mdlConveniosInternacionales($tabla, $item, $valor) {
    if ($item != null) {
      $stmt = Conexion::conectar()->prepare("SELECT SUM(saldo_inicial) + SUM(movimiento_debito) - SUM(movimiento_credito) AS Suma FROM $tabla WHERE $item = :$item AND (codigo_cuenta_contable='13050501')AND (CHARACTER_LENGTH(codigo_centro_costo)=4 AND ( codigo_centro_costo LIKE '4-8%' OR codigo_centro_costo LIKE '4-90%'))");
      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    }
    $stmt->close();
    $stmt = null;
  }
  /**DEUDORES FONDOS UNIVERSIDADES */
  public static function mdlDeudoresFondosUniversidades($tabla, $item, $valor) {
    if ($item != null) {
      $stmt = Conexion::conectar()->prepare("SELECT SUM(saldo_inicial) + SUM(movimiento_debito) - SUM(movimiento_credito) AS Suma FROM $tabla WHERE $item = :$item AND (codigo_cuenta_contable='13050501') AND (CHARACTER_LENGTH(codigo_centro_costo)>4 AND ( codigo_centro_costo LIKE '5%' OR (codigo_centro_costo LIKE '6%')))");
      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    }
    $stmt->close();
    $stmt = null;
  }
  /**PROVISION DEUDORES */
  public static function mdlProvisionDeudores($tabla, $item, $valor) {
    if ($item != null) {
      $stmt = Conexion::conectar()->prepare("SELECT SUM(saldo_inicial) + SUM(movimiento_debito) - SUM(movimiento_credito) AS Suma FROM $tabla WHERE $item = :$item AND (codigo_cuenta_contable='13990501')");
      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    }
    $stmt->close();
    $stmt = null;
  }
  /**CUENTAS POR COBRAR EMPLEADOS */
  public static function mdlCuentasPorCobrarEmpleados($tabla, $item, $valor) {
    if ($item != null) {

      $stmt = Conexion::conectar()->prepare("SELECT SUM(saldo_inicial) + SUM(movimiento_debito) - SUM(movimiento_credito) AS Suma FROM $tabla WHERE $item = :$item AND (codigo_cuenta_contable LIKE '133015%' OR codigo_cuenta_contable LIKE '1365%')");
      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    }
    $stmt->close();
    $stmt = null;
  }
  /**DEUDORES CONTRATOS Y CONVENIOS */
  public static function mdlDeudoresContratosConvenios($tabla, $item, $valor) {
    if ($item != null) {

      $stmt = Conexion::conectar()->prepare("SELECT SUM(saldo_inicial) + SUM(movimiento_debito) - SUM(movimiento_credito) AS Suma FROM $tabla WHERE $item = :$item AND (codigo_cuenta_contable LIKE '13050501%') AND (codigo_centro_costo LIKE '4-1%' OR codigo_centro_costo LIKE '4-2%' OR codigo_centro_costo LIKE '4-3%' OR codigo_centro_costo LIKE '4-4%' OR codigo_centro_costo LIKE '4-5%' OR codigo_centro_costo LIKE '4-6%' OR codigo_centro_costo LIKE '4-7%' OR codigo_centro_costo LIKE '4-80%')");
      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    }
    $stmt->close();
    $stmt = null;
  }
  /**CONSTRUCCIONES Y EDIFICACIONES */
  public static function mdlConstruccionesEdificaciones($tabla, $item, $valor) {
    if ($item != null) {

      $stmt = Conexion::conectar()->prepare("SELECT SUM(saldo_inicial) + SUM(movimiento_debito) - SUM(movimiento_credito) AS Suma FROM $tabla WHERE $item = :$item AND (codigo_cuenta_contable LIKE '1516%' OR codigo_cuenta_contable= '15920501')");
      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    }
    $stmt->close();
    $stmt = null;
  }
  /**EQUIPO DE OFICINA */
  public static function mdlEquipoDeOficina($tabla, $item, $valor) {
    if ($item != null) {
      // SELECT SUM(saldo_inicial) + SUM(movimiento_debito) - SUM(movimiento_credito) FROM bppcc WHERE transaccional='si' AND (codigo_cuenta_contable LIKE '1524%' OR codigo_cuenta_contable LIKE  '159215%');
      $stmt = Conexion::conectar()->prepare("SELECT SUM(saldo_inicial) + SUM(movimiento_debito) - SUM(movimiento_credito) AS Suma FROM $tabla WHERE $item = :$item AND (codigo_cuenta_contable LIKE '1524%' OR codigo_cuenta_contable LIKE  '159215%')");
      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    }
    $stmt->close();
    $stmt = null;
  }
  /**EQUIPO DE COMPUTACION Y COMUNICACION */
  public static function mdlEquipoDeComputacionComunicacion($tabla, $item, $valor) {
    if ($item != null) {
      // SELECT SUM(saldo_final) AS Suma FROM bppcc WHERE  transaccional='si' AND (codigo_cuenta_contable LIKE '1528%' OR codigo_cuenta_contable LIKE '159220%')
      $stmt = Conexion::conectar()->prepare("SELECT SUM(saldo_inicial) + SUM(movimiento_debito) - SUM(movimiento_credito) AS Suma FROM $tabla WHERE $item = :$item AND (codigo_cuenta_contable LIKE '1528%' OR codigo_cuenta_contable LIKE '159220%')");
      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    }
    $stmt->close();
    $stmt = null;
  }
  /**FLOTA Y EQUIPO DE TRANSPORTE */
  public static function mdlFlotaEquipoDeTransporte($tabla, $item, $valor) {
    if ($item != null) {
      $stmt = Conexion::conectar()->prepare("SELECT SUM(saldo_inicial) + SUM(movimiento_debito) - SUM(movimiento_credito) AS Suma FROM $tabla WHERE $item = :$item AND (codigo_cuenta_contable LIKE '1540%' OR codigo_cuenta_contable= '159235')");
      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    }
    $stmt->close();
    $stmt = null;
  }
  /**PASIVO */
  /**OBLIGACIONES FINANCIERAS */
  public static function mdlObligacionesFinancieras($tabla, $item, $valor) {
    if ($item != null) {
      $stmt = Conexion::conectar()->prepare("SELECT -SUM(saldo_inicial) +  SUM(movimiento_credito) - SUM(movimiento_debito) AS Suma FROM $tabla WHERE $item = :$item AND (codigo_cuenta_contable LIKE '210515%')");
      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    }
    $stmt->close();
    $stmt = null;
  }
  /**COSTOS Y GASTOS POR PAGAR */
  public static function mdlCostosGastosPorPagar($tabla, $item, $valor) {
    if ($item != null) {
      $stmt = Conexion::conectar()->prepare("SELECT -SUM(saldo_inicial) +  SUM(movimiento_credito) - SUM(movimiento_debito) AS Suma FROM $tabla WHERE $item = :$item AND (codigo_cuenta_contable LIKE '23359501%')");
      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    }
    $stmt->close();
    $stmt = null;
  }
  /**CONTRATOS EN EJECUCION */
  public static function mdlContratosEnEjecucion($tabla, $item, $valor) {
    if ($item != null) {
      $stmt = Conexion::conectar()->prepare("SELECT -SUM(saldo_inicial) +  SUM(movimiento_credito) - SUM(movimiento_debito) AS Suma FROM $tabla WHERE $item = :$item AND (codigo_cuenta_contable LIKE '2815%' )");
      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    }
    $stmt->close();
    $stmt = null;
  }
  /**IMPUESTO DE INDUSTRIA Y COMERCIO RETENIDO */
  public static function mdlImpuestoDeIndustriaComercio($tabla, $item, $valor) {
    if ($item != null) {
      $stmt = Conexion::conectar()->prepare("SELECT -SUM(saldo_inicial) +  SUM(movimiento_credito) - SUM(movimiento_debito) AS Suma FROM $tabla WHERE $item = :$item AND (codigo_cuenta_contable LIKE '2368%' OR codigo_cuenta_contable LIKE '241205%')");
      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    }
    $stmt->close();
    $stmt = null;
  }
  /**IMPUESTO SOBRE LAS VENTAS POR PAGAR */
  public static function mdlImpuestoSobrelasVentas($tabla, $item, $valor) {
    if ($item != null) {
      $stmt = Conexion::conectar()->prepare("SELECT -SUM(saldo_inicial) +  SUM(movimiento_credito) - SUM(movimiento_debito) AS Suma FROM $tabla WHERE $item = :$item AND (codigo_cuenta_contable LIKE '2408%' )");
      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    }
    $stmt->close();
    $stmt = null;
  }
  /**RETENCION EN LA FUENTE */
  public static function mdlRetencionEnLaFuente($tabla, $item, $valor) {
    if ($item != null) {
      $stmt = Conexion::conectar()->prepare("SELECT -SUM(saldo_inicial) +  SUM(movimiento_credito) - SUM(movimiento_debito) AS Suma FROM $tabla WHERE $item = :$item AND (codigo_cuenta_contable LIKE '2365%' OR codigo_cuenta_contable LIKE '2367%')");
      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    }
    $stmt->close();
    $stmt = null;
  }
  /**OBLIGACIONES LABORALES */
  public static function mdlObligacionesLaborales($tabla, $item, $valor) {
    if ($item != null) {
      // SELECT -SUM(saldo_final) FROM bppcc WHERE  transaccional='si' AND (codigo_cuenta_contable LIKE '25%' OR codigo_cuenta_contable LIKE '2370%' OR codigo_cuenta_contable LIKE '238030%')
      $stmt = Conexion::conectar()->prepare("SELECT -SUM(saldo_final) AS Suma FROM $tabla WHERE $item = :$item AND (codigo_cuenta_contable LIKE '25%' OR codigo_cuenta_contable LIKE '2370%' OR codigo_cuenta_contable LIKE '238030%')");
      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    }
    $stmt->close();
    $stmt = null;
  }
  /**PASIVOS ESTIMADOS Y PROVISIONES */
  public static function mdlPasivosEstimadosProvisionales($tabla, $item, $valor) {
    if ($item != null) {
      $stmt = Conexion::conectar()->prepare("SELECT -SUM(saldo_inicial) +  SUM(movimiento_credito) - SUM(movimiento_debito) AS Suma FROM $tabla WHERE $item = :$item AND (codigo_cuenta_contable LIKE '26%')");
      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    }
    $stmt->close();
    $stmt = null;
  }
  /**ANTICIPOS Y AVANCES RECIBIDOS */
  public static function mdlAnticiposAvancesRecibidos($tabla, $item, $valor) {
    if ($item != null) {
      // SELECT -SUM(saldo_final)  FROM bppcc WHERE  transaccional='si' AND (codigo_cuenta_contable LIKE '2805%')
      $stmt = Conexion::conectar()->prepare("SELECT -SUM(saldo_final) AS Suma  FROM $tabla WHERE  $item = :$item AND (codigo_cuenta_contable LIKE '2805%')");
      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    }
    $stmt->close();
    $stmt = null;
  }
  /**INGRESOS RECIBIDOS POR ANTICIPADO */
  public static function mdlIngresosRecividosPorAnticipado($tabla, $item, $valor) {
    if ($item != null) {
      $stmt = Conexion::conectar()->prepare("SELECT -SUM(saldo_inicial) +  SUM(movimiento_credito) - SUM(movimiento_debito) AS Suma FROM $tabla WHERE $item = :$item AND (codigo_cuenta_contable LIKE '27%')");
      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    }
    $stmt->close();
    $stmt = null;
  }
  /**FONDOS UNIVERSIDADES */
  public static function mdlFondosUniversidades($tabla, $item, $valor) {
    if ($item != null) {
      $stmt = Conexion::conectar()->prepare("SELECT -SUM(saldo_inicial) +  SUM(movimiento_credito) - SUM(movimiento_debito) AS Suma FROM $tabla WHERE $item = :$item AND (codigo_cuenta_contable LIKE '2895%')");
      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    }
    $stmt->close();
    $stmt = null;
  }
  /**FONDO CON DESTINACION ESPECIFICA */
  public static function mdlFondoConDestinacioEspecifica($tabla, $item, $valor) {
    if ($item != null) {
      $stmt = Conexion::conectar()->prepare("SELECT -SUM(saldo_inicial) +  SUM(movimiento_credito) - SUM(movimiento_debito) AS Suma FROM $tabla WHERE $item = :$item AND (codigo_cuenta_contable LIKE '2810%')");
      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    }
    $stmt->close();
    $stmt = null;
  }
  /**FONDO PATRIMONIAL */
  public static function mdlFondoPatrimonial($tabla, $item, $valor) {
    if ($item != null) {
      $stmt = Conexion::conectar()->prepare("SELECT -SUM(saldo_inicial) +  SUM(movimiento_credito) - SUM(movimiento_debito) AS Suma FROM $tabla WHERE $item = :$item AND (codigo_cuenta_contable LIKE '33%' OR codigo_cuenta_contable LIKE '34%' OR codigo_cuenta_contable LIKE '36%' OR codigo_cuenta_contable LIKE '37%' OR codigo_cuenta_contable LIKE '38%')");
      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    }
    $stmt->close();
    $stmt = null;
  }
  /**EXCEDENTES DE ASIGNACION DEL PRESENTE EJERCICIO */
  public static function mdlExcedentesDeAsignacion($tabla, $item, $valor) {
    if ($item != null) {
      $stmt = Conexion::conectar()->prepare("SELECT -SUM(saldo_inicial) +  SUM(movimiento_credito) - SUM(movimiento_debito) AS Suma FROM $tabla WHERE $item = :$item AND (codigo_cuenta_contable LIKE '41%' OR codigo_cuenta_contable LIKE '42%' OR codigo_cuenta_contable LIKE '51%' OR codigo_cuenta_contable LIKE '53%' OR codigo_cuenta_contable LIKE '71%' OR codigo_cuenta_contable LIKE '73%')");
      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    }
    $stmt->close();
    $stmt = null;
  }
  
}