<?php
require_once "Conexion.php";
class ModeloInformeRDS {
  /**Informe: EJECUCIÓN PRESUPUESTAL (REDES) */
  
  /**CARGAR CENTROS DE COSTOS */
  public static function mdlCargarCentrosDeCostos($tabla) {
    $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
    $stmt->execute();
    return $stmt->fetchAll();
    $stmt->close();
    $stmt = null;
  }
  /**Traer el centro de costos */
  public static function mdlTraerCentroDeCostos($tabla, $item, $valor) {
    if ($item != null) {
      $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    }
    $stmt->close();
    $stmt = null;
  }
  /**RESUMEN */
  // -> /**DETALLE */

  /**SALDO AÑOS ANTERIORES */
  public static function mdlSaldoAniosAnteriores($tabla, $item, $valor, $codigo_centro_decostos) {
    if ($item != null) {
      $stmt = Conexion::conectar()->prepare("SELECT -SUM(saldo_final) AS Suma FROM $tabla WHERE $item = :$item AND (codigo_cuenta_contable LIKE '2895%') AND (codigo_centro_costo = '".$codigo_centro_decostos."')");
      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    }
    $stmt->close();
    $stmt = null;
  }
  /**ANTICIPOS POR LEGALIZAR */
  public static function mdlAnticiposPorLegalizar($tabla, $item, $valor, $codigo_centro_decostos) {
    if ($item != null) {
      $stmt = Conexion::conectar()->prepare("SELECT SUM(saldo_final) AS Suma FROM $tabla WHERE $item = :$item AND (codigo_cuenta_contable LIKE '1330%') AND (codigo_centro_costo = '".$codigo_centro_decostos."')");
      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    }
    $stmt->close();
    $stmt = null;
  }

  // -> /**DISPONIBLE */

  /**CARTERA POR COBRAR */
  public static function mdlCarteraPorCobrar($tabla, $item, $valor, $codigo_centro_decostos) {
    if ($item != null) {
      $stmt = Conexion::conectar()->prepare("SELECT SUM(saldo_final) AS Suma FROM $tabla WHERE $item = :$item AND (codigo_cuenta_contable LIKE '1305%') AND (codigo_centro_costo = '".$codigo_centro_decostos."')");
      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    }
    $stmt->close();
    $stmt = null;
  }

  /**INFORMACIÓN DETALLADA */
  // ->INGRESOS

  /**INGRESOS FONDO */
  public static function mdlIngresoFondo($tabla, $item, $valor, $codigo_centro_decostos) {
    if ($item != null) {
      $stmt = Conexion::conectar()->prepare("SELECT SUM(saldo_final) AS Suma FROM $tabla WHERE $item = :$item AND (codigo_cuenta_contable LIKE '41%') AND (codigo_centro_costo = '".$codigo_centro_decostos."')");
      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    }
    $stmt->close();
    $stmt = null;
  }
  /**INGRESOS NO OPERACIONALES */
  public static function mdlIngresosNoOperacionales($tabla, $item, $valor, $codigo_centro_decostos) {
    if ($item != null) {
      $stmt = Conexion::conectar()->prepare("SELECT SUM(saldo_final) AS Suma FROM $tabla WHERE $item = :$item AND (codigo_cuenta_contable LIKE '42%') AND (codigo_centro_costo = '".$codigo_centro_decostos."')");
      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    }
    $stmt->close();
    $stmt = null;
  }
  /**DEVOLUCIONES */
  public static function mdlDevoluciones($tabla, $item, $valor, $codigo_centro_decostos) {
    if ($item != null) {
      $stmt = Conexion::conectar()->prepare("SELECT SUM(saldo_final) AS Suma FROM $tabla WHERE $item = :$item AND (codigo_cuenta_contable LIKE '4175%') AND (codigo_centro_costo = '".$codigo_centro_decostos."')");
      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    }
    $stmt->close();
    $stmt = null;
  }
  /**EGRESOS - EJECUCIÓN */
  /**HONORARIOS */
  public static function mdlHonorariosEJE($tabla, $item, $valor, $codigo_centro_decostos) {
    if ($item != null) {
      $stmt = Conexion::conectar()->prepare("SELECT SUM(saldo_final) AS Suma FROM $tabla WHERE $item = :$item AND (codigo_cuenta_contable LIKE '511095') AND (codigo_centro_costo = '".$codigo_centro_decostos."')");
      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    }
    $stmt->close();
    $stmt = null;
  }
  /**IVA DESCONTABLE_1 */
  public static function mdlIVADescontable_1EJE($tabla, $item, $valor, $codigo_centro_decostos) {
    if ($item != null) {
      $stmt = Conexion::conectar()->prepare("SELECT SUM(saldo_final) AS Suma FROM $tabla WHERE $item = :$item AND (codigo_cuenta_contable LIKE '280810') AND (codigo_centro_costo = '".$codigo_centro_decostos."')");
      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    }
    $stmt->close();
    $stmt = null;
  }
  /**IVA DESCONTABLE_2 */
  public static function mdlIVADescontable_2EJE($tabla, $item, $valor, $codigo_centro_decostos) {
    if ($item != null) {
      $stmt = Conexion::conectar()->prepare("SELECT SUM(saldo_final) AS Suma FROM $tabla WHERE $item = :$item AND (codigo_cuenta_contable LIKE '280815') AND (codigo_centro_costo = '".$codigo_centro_decostos."')");
      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    }
    $stmt->close();
    $stmt = null;
  }
  /**IVA DESCONTABLE_3 */
  public static function mdlIVADescontable_3EJE($tabla, $item, $valor, $codigo_centro_decostos) {
    if ($item != null) {
      $stmt = Conexion::conectar()->prepare("SELECT SUM(saldo_final) AS Suma FROM $tabla WHERE $item = :$item AND (codigo_cuenta_contable LIKE '511570') AND (codigo_centro_costo = '".$codigo_centro_decostos."')");
      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    }
    $stmt->close();
    $stmt = null;
  }
  /**IMPOCONSUMO Y DESCUENTOS UNIVERSIDADES */
  public static function mdlImpoconsumoEJE($tabla, $item, $valor, $codigo_centro_decostos) {
    if ($item != null) {
      $stmt = Conexion::conectar()->prepare("SELECT SUM(saldo_final) AS Suma FROM $tabla WHERE $item = :$item AND (codigo_cuenta_contable LIKE '511595') AND (codigo_centro_costo = '".$codigo_centro_decostos."')");
      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    }
    $stmt->close();
    $stmt = null;
  }
  /**ALQUILERES (SONIDO, SILLAS, TARIMAS, OFICINA, ETC) */
  public static function mdlAlquileresEJE($tabla, $item, $valor, $codigo_centro_decostos) {
    if ($item != null) {
      $stmt = Conexion::conectar()->prepare("SELECT SUM(saldo_final) AS Suma FROM $tabla WHERE $item = :$item AND (codigo_cuenta_contable LIKE '5120') AND (codigo_centro_costo = '".$codigo_centro_decostos."')");
      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    }
    $stmt->close();
    $stmt = null;
  }
  /**LICENCIAS (SOFTWARE) */
  public static function mdlLicenciasEJE($tabla, $item, $valor, $codigo_centro_decostos) {
    if ($item != null) {
      $stmt = Conexion::conectar()->prepare("SELECT SUM(saldo_final) AS Suma FROM $tabla WHERE $item = :$item AND (codigo_cuenta_contable LIKE '5125') AND (codigo_centro_costo = '".$codigo_centro_decostos."')");
      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    }
    $stmt->close();
    $stmt = null;
  }
  /**SEGUROS Y POLIZAS */
  public static function mdlSegurosYPolizasEJE($tabla, $item, $valor, $codigo_centro_decostos) {
    if ($item != null) {
      $stmt = Conexion::conectar()->prepare("SELECT SUM(saldo_final) AS Suma FROM $tabla WHERE $item = :$item AND (codigo_cuenta_contable LIKE '5130') AND (codigo_centro_costo = '".$codigo_centro_decostos."')");
      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    }
    $stmt->close();
    $stmt = null;
  }
  /**ASISTENCIA TECNICA (APOYO LOGÍSTICO, TRADUCCIONES) */
  public static function mdlAsistenciaTecnica($tabla, $item, $valor, $codigo_centro_decostos) {
    if ($item != null) {
      $stmt = Conexion::conectar()->prepare("SELECT SUM(saldo_final) AS Suma FROM $tabla WHERE $item = :$item AND (codigo_cuenta_contable LIKE '513515') AND (codigo_centro_costo = '".$codigo_centro_decostos."')");
      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    }
    $stmt->close();
    $stmt = null;
  }
  /**CELULAR - RECARGAS */
  public static function mdlCelularRecargas($tabla, $item, $valor, $codigo_centro_decostos) {
    if ($item != null) {
      $stmt = Conexion::conectar()->prepare("SELECT SUM(saldo_final) AS Suma FROM $tabla WHERE $item = :$item AND (codigo_cuenta_contable LIKE '513535') AND (codigo_centro_costo = '".$codigo_centro_decostos."')");
      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    }
    $stmt->close();
    $stmt = null;
  }
  /**INTERNET Y PAGINA WEB */
  public static function mdlInternetYPaginaWeb($tabla, $item, $valor, $codigo_centro_decostos) {
    if ($item != null) {
      $stmt = Conexion::conectar()->prepare("SELECT SUM(saldo_final) AS Suma FROM $tabla WHERE $item = :$item AND (codigo_cuenta_contable LIKE '513536') AND (codigo_centro_costo = '".$codigo_centro_decostos."')");
      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    }
    $stmt->close();
    $stmt = null;
  }
  /**CORREO PORTES Y TELEGRAMAS */
  public static function mdlCorreoPortesYTelegramas($tabla, $item, $valor, $codigo_centro_decostos) {
    if ($item != null) {
      $stmt = Conexion::conectar()->prepare("SELECT SUM(saldo_final) AS Suma FROM $tabla WHERE $item = :$item AND (codigo_cuenta_contable LIKE '513540') AND (codigo_centro_costo = '".$codigo_centro_decostos."')");
      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    }
    $stmt->close();
    $stmt = null;
  }
  /**TRANSPORTE FLETES Y ACARREOS */
  public static function mdlTrasporteFletesYAcarreos($tabla, $item, $valor, $codigo_centro_decostos) {
    if ($item != null) {
      $stmt = Conexion::conectar()->prepare("SELECT SUM(saldo_final) AS Suma FROM $tabla WHERE $item = :$item AND (codigo_cuenta_contable LIKE '513550') AND (codigo_centro_costo = '".$codigo_centro_decostos."')");
      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    }
    $stmt->close();
    $stmt = null;
  }
  /**IMPRESOS  (ESCARAPELAS, TARJETAS, PENDONES,ETC) */
  public static function mdlImpresos($tabla, $item, $valor, $codigo_centro_decostos) {
    if ($item != null) {
      $stmt = Conexion::conectar()->prepare("SELECT SUM(saldo_final) AS Suma FROM $tabla WHERE $item = :$item AND (codigo_cuenta_contable LIKE '513590') AND (codigo_centro_costo = '".$codigo_centro_decostos."')");
      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    }
    $stmt->close();
    $stmt = null;
  }
  /**GASTOS LEGALES */
  public static function mdlGastosLegales($tabla, $item, $valor, $codigo_centro_decostos) {
    if ($item != null) {
      $stmt = Conexion::conectar()->prepare("SELECT SUM(saldo_final) AS Suma FROM $tabla WHERE $item = :$item AND (codigo_cuenta_contable LIKE '5140') AND (codigo_centro_costo = '".$codigo_centro_decostos."')");
      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    }
    $stmt->close();
    $stmt = null;
  }
  /**ALOJAMIENTO Y MANUTENCION */
  public static function mdlAlojamientoYManutencion($tabla, $item, $valor, $codigo_centro_decostos) {
    if ($item != null) {
      $stmt = Conexion::conectar()->prepare("SELECT SUM(saldo_final) AS Suma FROM $tabla WHERE $item = :$item AND (codigo_cuenta_contable LIKE '515505') AND (codigo_centro_costo = '".$codigo_centro_decostos."')");
      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    }
    $stmt->close();
    $stmt = null;
  }
  /**PASAJES AEREOS */
  public static function mdlPasajesAereos($tabla, $item, $valor, $codigo_centro_decostos) {
    if ($item != null) {
      $stmt = Conexion::conectar()->prepare("SELECT SUM(saldo_final) AS Suma FROM $tabla WHERE $item = :$item AND (codigo_cuenta_contable LIKE '515515') AND (codigo_centro_costo = '".$codigo_centro_decostos."')");
      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    }
    $stmt->close();
    $stmt = null;
  }
  /**PASAJES TERRESTRES O APOYO TRANSPORTE */
  public static function mdlPasajesTerrestres($tabla, $item, $valor, $codigo_centro_decostos) {
    if ($item != null) {
      $stmt = Conexion::conectar()->prepare("SELECT SUM(saldo_final) AS Suma FROM $tabla WHERE $item = :$item AND (codigo_cuenta_contable LIKE '515520') AND (codigo_centro_costo = '".$codigo_centro_decostos."')");
      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    }
    $stmt->close();
    $stmt = null;
  }
  /**ELEMENTOS DE ASEO Y CAFETERIA */
  public static function mdlElementosDeAseoYCafeteria($tabla, $item, $valor, $codigo_centro_decostos) {
    if ($item != null) {
      $stmt = Conexion::conectar()->prepare("SELECT SUM(saldo_final) AS Suma FROM $tabla WHERE $item = :$item AND (codigo_cuenta_contable LIKE '519525') AND (codigo_centro_costo = '".$codigo_centro_decostos."')");
      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    }
    $stmt->close();
    $stmt = null;
  }
  /**UTILES PAPELERIA Y FOTOCOPIAS */
  public static function mdlUtilesPapeleriaYFotocopias($tabla, $item, $valor, $codigo_centro_decostos) {
    if ($item != null) {
      $stmt = Conexion::conectar()->prepare("SELECT SUM(saldo_final) AS Suma FROM $tabla WHERE $item = :$item AND (codigo_cuenta_contable LIKE '519530') AND (codigo_centro_costo = '".$codigo_centro_decostos."')");
      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    }
    $stmt->close();
    $stmt = null;
  }
  /**COMBUSTIBLES Y LUBRICANTES */
  public static function mdlCombustiblesYLubricantes($tabla, $item, $valor, $codigo_centro_decostos) {
    if ($item != null) {
      $stmt = Conexion::conectar()->prepare("SELECT SUM(saldo_final) AS Suma FROM $tabla WHERE $item = :$item AND (codigo_cuenta_contable LIKE '519535') AND (codigo_centro_costo = '".$codigo_centro_decostos."')");
      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    }
    $stmt->close();
    $stmt = null;
  }
  /**TAXIS Y BUSES */
  public static function mdlTaxisYBuses($tabla, $item, $valor, $codigo_centro_decostos) {
    if ($item != null) {
      $stmt = Conexion::conectar()->prepare("SELECT SUM(saldo_final) AS Suma FROM $tabla WHERE $item = :$item AND (codigo_cuenta_contable LIKE '519545') AND (codigo_centro_costo = '".$codigo_centro_decostos."')");
      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    }
    $stmt->close();
    $stmt = null;
  }
  /**CASINO Y RESTAURANTE */
  public static function mdlCasinoYRestaurante($tabla, $item, $valor, $codigo_centro_decostos) {
    if ($item != null) {
      $stmt = Conexion::conectar()->prepare("SELECT SUM(saldo_final) AS Suma FROM $tabla WHERE $item = :$item AND (codigo_cuenta_contable LIKE '519560') AND (codigo_centro_costo = '".$codigo_centro_decostos."')");
      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    }
    $stmt->close();
    $stmt = null;
  }
  /**PARQUEADEROS Y PEAJES */
  public static function mdlParqueaderosYPeajes($tabla, $item, $valor, $codigo_centro_decostos) {
    if ($item != null) {
      $stmt = Conexion::conectar()->prepare("SELECT SUM(saldo_final) AS Suma FROM $tabla WHERE $item = :$item AND (codigo_cuenta_contable LIKE '519565') AND (codigo_centro_costo = '".$codigo_centro_decostos."')");
      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    }
    $stmt->close();
    $stmt = null;
  }
  /**ALMUERZOS Y REFRIGERIOS */
  public static function mdlAlmuerzosYRefrigerios($tabla, $item, $valor, $codigo_centro_decostos) {
    if ($item != null) {
      $stmt = Conexion::conectar()->prepare("SELECT SUM(saldo_final) AS Suma FROM $tabla WHERE $item = :$item AND (codigo_cuenta_contable LIKE '519592') AND (codigo_centro_costo = '".$codigo_centro_decostos."')");
      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    }
    $stmt->close();
    $stmt = null;
  }
  /**APOYOS E INSCRIPCIONES */
  public static function mdlApoyosEInscripciones($tabla, $item, $valor, $codigo_centro_decostos) {
    if ($item != null) {
      $stmt = Conexion::conectar()->prepare("SELECT SUM(saldo_final) AS Suma FROM $tabla WHERE $item = :$item AND (codigo_cuenta_contable LIKE '519595') AND (codigo_centro_costo = '".$codigo_centro_decostos."')");
      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    }
    $stmt->close();
    $stmt = null;
  }
  /**GASTOS VARIOS (ARREGLOS FLORALES, BONOS REGALO) */
  public static function mdlGastosVarios($tabla, $item, $valor, $codigo_centro_decostos) {
    if ($item != null) {
      $stmt = Conexion::conectar()->prepare("SELECT SUM(saldo_final) AS Suma FROM $tabla WHERE $item = :$item AND (codigo_cuenta_contable LIKE '519597') AND (codigo_centro_costo = '".$codigo_centro_decostos."')");
      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    }
    $stmt->close();
    $stmt = null;
  }
  /**GASTOS FINANCIEROS */
  public static function mdlGastosFinancieros($tabla, $item, $valor, $codigo_centro_decostos) {
    if ($item != null) {
      $stmt = Conexion::conectar()->prepare("SELECT SUM(saldo_final) AS Suma FROM $tabla WHERE $item = :$item AND (codigo_cuenta_contable LIKE '53') AND (codigo_centro_costo = '".$codigo_centro_decostos."')");
      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    }
    $stmt->close();
    $stmt = null;
  }
}