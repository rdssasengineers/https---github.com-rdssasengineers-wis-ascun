<div class="col-md-12">
  <?php
    // consultar fecha_upload
    date_default_timezone_set('America/Bogota');
    $tabla = "logs";
    $item  = "id";
    $valor = 1;
    $fecha_upload = ModeloValidaciones::mdlFecha_upload($tabla, $item, $valor);
    foreach ($fecha_upload as $key =>	$value) {
      $fecha = $value["fecha_corte"];
    }
    $dateTime = new DateTime($fecha);
    $d = date_format($dateTime,"d");
    $m = date_format($dateTime,"F");
    $a = date_format($dateTime,"Y");
    $mes = ModeloValidaciones::traducirMes($m);
    $fecha_corte = $d." de ".$mes." ".$a;

    $tabla = "bppcc";
    $item  = 'transaccional';
    $valor = 'sí';
    /**ESTADO DE SITUACIÓN FINANCIERA */

    /**ACTIVO */
    /**DISPONIBLE ASCUN NACIONAL */
    $disponibleASCUNNAC = ModeloInformeSF::mdlDisponibleASCUNNAC($tabla, $item, $valor);
    /**DISPONIBLE ASCUN BIENESTAR */
    $disponibleASCUNBIE = ModeloInformeSF::mdlDisponibleASCUNBIE($tabla, $item, $valor);
    /**INVERSIONES FIDUCIARIAS */
    $inversionesFiduciarias = ModeloInformeSF::mdlInversionesFiduciarias($tabla, $item, $valor);
    /**EFECTIVO O EQUIVALENTE A EFECTIVO */
    $efectivoOequivalenteAefectivo = $disponibleASCUNNAC['Suma']+$disponibleASCUNBIE['Suma']+$inversionesFiduciarias['Suma'];
    /**ANTICIPOS Y AVANCES */
    $anticiposAvances = ModeloInformeSF::mdlAnticiposAvances($tabla, $item, $valor);
    /**ANTICIPO DE IMPUESTOS */
    $anticiposImpuestos = ModeloInformeSF::mdlAnticiposImpuestos($tabla, $item, $valor);
    /**DEUDORES CUOTAS ASCUN NACIONAL */
    $deudoresCuotaASCUNNAC = ModeloInformeSF::mdlDeudoresCuotaASCUNNAC($tabla, $item, $valor);
    /**DEUDORES CUOTAS ASCUN BIENESTAR */
    $deudoresCuotaASCUNBIE = ModeloInformeSF::mdlDeudoresCuotaASCUNBIE($tabla, $item, $valor);
    /**PROGRAMAS Y PROYECTOS  ASCUN NACIONAL */
    $programasProyectosASCUNNAC = ModeloInformeSF::mdlProgramasProyectosASCUNNAC($tabla, $item, $valor);
    /**PROGRAMAS ASCUN BIENESTAR */
    $programasASCUNBIE = ModeloInformeSF::mdlProgramasASCUNBIE($tabla, $item, $valor);
    /**CONVENIOS INTERNACIONALES */
    $conveniosInternacionales = ModeloInformeSF::mdlConveniosInternacionales($tabla, $item, $valor);
    /**DEUDORES FONDOS UNIVERSIDADES */
    $deudoresFondosUniversidades = ModeloInformeSF::mdlDeudoresFondosUniversidades($tabla, $item, $valor);
    /**PROVISION DEUDORES */
    $provisionDeudores = ModeloInformeSF::mdlProvisionDeudores($tabla, $item, $valor);
    /**CUENTAS POR COBRAR EMPLEADOS */
    $cuentasPorCobrarEmpleados = ModeloInformeSF::mdlCuentasPorCobrarEmpleados($tabla, $item, $valor);
    /**DEUDORES CONTRATOS Y CONVENIOS */
    $deudoresContratosConvenios = ModeloInformeSF::mdlDeudoresContratosConvenios($tabla, $item, $valor);
    /**CUENTAS COMERCIALES POR COBRAR */
    $cuentasComercialesPorCobrar = $anticiposAvances['Suma']+$anticiposImpuestos['Suma']+$deudoresCuotaASCUNNAC['Suma']+$deudoresCuotaASCUNBIE['Suma']+$programasProyectosASCUNNAC['Suma']+$programasASCUNBIE['Suma']+$conveniosInternacionales['Suma']+$deudoresFondosUniversidades['Suma']+$provisionDeudores['Suma']+$cuentasPorCobrarEmpleados['Suma']+$deudoresContratosConvenios['Suma'];
    /**TOTAL ACTIVO CORRIENTE */
    $totalActivoCorriente = $efectivoOequivalenteAefectivo+$cuentasComercialesPorCobrar;
    /**Activo No Corriente */
    /**CONSTRUCCIONES Y EDIFICACIONES */
    $construccionesEdificaciones = ModeloInformeSF::mdlConstruccionesEdificaciones($tabla, $item, $valor);
    /**EQUIPO DE OFICINA */
    $equipoDeOficina = ModeloInformeSF::mdlEquipoDeOficina($tabla, $item, $valor);
    /**EQUIPO DE COMPUTACION Y COMUNICACION */
    $equipoDeComputacionComunicacion = ModeloInformeSF::mdlEquipoDeComputacionComunicacion($tabla, $item, $valor);
    /**FLOTA Y EQUIPO DE TRANSPORTE */
    $flotaEquipoDeTransporte = ModeloInformeSF::mdlFlotaEquipoDeTransporte($tabla, $item, $valor);
    /**PROPIEDAD PLANTA Y EQUIPO */
    $propiedadPlantaEquipo = $construccionesEdificaciones['Suma']+
    $equipoDeOficina['Suma']+$equipoDeComputacionComunicacion['Suma']+$flotaEquipoDeTransporte['Suma'];
    /**TOTAL ACTIVO NO CORRIENTE */
    $totalActivoNoCorriente = $construccionesEdificaciones['Suma']+
    $equipoDeOficina['Suma']+$equipoDeComputacionComunicacion['Suma']+$flotaEquipoDeTransporte['Suma'];
    /**TOTAL ACTIVO */
    $activoTotal = $totalActivoCorriente+
    $totalActivoNoCorriente;

    /**PASIVO */
    /**OBLIGACIONES FINANCIERAS */
    $obligacionesFinancieras = ModeloInformeSF::mdlObligacionesFinancieras($tabla, $item, $valor);
    /**COSTOS Y GASTOS POR PAGAR */
    $costosGastosPorPagar = ModeloInformeSF::mdlCostosGastosPorPagar($tabla, $item, $valor);
    /**CONTRATOS EN EJECUCION */
    $contratosEnEjecucion = ModeloInformeSF::mdlContratosEnEjecucion($tabla, $item, $valor);
    /**CUENTAS COMERCIALES POR PAGAR */
    $cuentasComercialesPorPagar = $obligacionesFinancieras['Suma']+$costosGastosPorPagar['Suma']+$contratosEnEjecucion['Suma'];
    /**IMPUESTO DE INDUSTRIA Y COMERCIO RETENIDO */
    $impuestoDeIndustriaComercio = ModeloInformeSF::mdlImpuestoDeIndustriaComercio($tabla, $item, $valor);
    /**IMPUESTO SOBRE LAS VENTAS POR PAGAR */
    $impuestoSobrelasVentas = ModeloInformeSF::mdlImpuestoSobrelasVentas($tabla, $item, $valor);
    /**RETENCION EN LA FUENTE */
    $retencionEnLaFuente = ModeloInformeSF::mdlRetencionEnLaFuente($tabla, $item, $valor);
    /**PASIVOS POR IMPUESTOS CORRIENTES */
    $pasivosPorImpuestoCorriente = $impuestoDeIndustriaComercio['Suma']+$impuestoSobrelasVentas['Suma']+$retencionEnLaFuente['Suma'];
    /**OBLIGACIONES LABORALES */
    $obligacionesLaborales = ModeloInformeSF::mdlObligacionesLaborales($tabla, $item, $valor);
    /**BENEFICIOS  EMPLEADOS */
    $beneficiosEmpleados = $obligacionesLaborales['Suma'];
    /**PASIVOS ESTIMADOS Y PROVISIONES */
    $pasivosEstimadosProvisionales = ModeloInformeSF::mdlPasivosEstimadosProvisionales($tabla, $item, $valor);
    /**ANTICIPOS Y AVANCES RECIBIDOS */
    $anticiposAvancesRecibidos = ModeloInformeSF::mdlAnticiposAvancesRecibidos($tabla, $item, $valor);
    /**OTROS PASIVOS A CORTO PLAZO */
    $otrosPasivosCortoPlazo = $pasivosEstimadosProvisionales['Suma']+$anticiposAvancesRecibidos['Suma'];
    /**Total Pasivo Corriente */
    $totalPasivoCorriente = $cuentasComercialesPorPagar+$pasivosPorImpuestoCorriente+$beneficiosEmpleados+$otrosPasivosCortoPlazo;
    /**INGRESOS RECIBIDOS POR ANTICIPADO */
    $ingresosRecividosPorAnticipado = ModeloInformeSF::mdlIngresosRecividosPorAnticipado($tabla, $item, $valor);
    /**FONDOS UNIVERSIDADES */
    $fondosUniversidades = ModeloInformeSF::mdlFondosUniversidades($tabla, $item, $valor);
    /**FONDO CON DESTINACION ESPECIFICA */
    $fondoConDestinacioEspecifica = ModeloInformeSF::mdlFondoConDestinacioEspecifica($tabla, $item, $valor);
    /**OTROS PASIVOS NO CORRIENTES */
    $otrosPasivosNoCorrientes = $ingresosRecividosPorAnticipado['Suma']+
    $fondosUniversidades['Suma']+
    $fondoConDestinacioEspecifica['Suma'];
    /**TOTAL PASIVO NO CORRIENTE */
    // =OtrosPasivosNoCorrientes
    /**TOTAL PASIVO */
    $totalPasivo = $totalPasivoCorriente+$otrosPasivosNoCorrientes;
    /**FONDO PATRIMONIAL */
    $fondoPatrimonial = ModeloInformeSF::mdlFondoPatrimonial($tabla, $item, $valor);
    /**EXCEDENTES DE ASIGNACION DEL PRESENTE EJERCICIO */
    $excedentesDeAsignacion = ModeloInformeSF::mdlExcedentesDeAsignacion($tabla, $item, $valor);
    /**Total Patrimonio */$totalPatrimonio = $fondoPatrimonial['Suma']+$excedentesDeAsignacion['Suma'];
    /**TOTAL PASIVO Y PATRIMONIO */
    $totalPasivoPatrimonio = $totalPasivo+$totalPatrimonio;
    /**Balanace Total */
    $balanaceTotal = $activoTotal - $totalPasivoPatrimonio;
    if (number_format($balanaceTotal,0, ",", ".") == 0) {
      echo 
      '
      <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <i class="material-icons">close</i>
        </button>
        <span>
        <b> BALANCE CUADRADO!!! - </b> Para el Estado de Situación Financiera con corte a ' .$fecha_corte.'</span>
      </div>
      ';
    }
    else {
      echo 
      '
      <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <i class="material-icons">close</i>
        </button>
        <span>
        <b> BALANCE DESCUADRADO!!! - </b> Para el Estado de Situación Financiera con corte a ' .$fecha_corte.' <strong>la diferencia es: $ '.number_format($balanaceTotal,0, ",", ".").'</strang></span>
      </div>
      ';
    }
  ?>
</div>