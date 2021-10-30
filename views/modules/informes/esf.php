<?php
require_once '../../../Models/Validaciones.php';
require_once '../../../Models/InformeSF.php';
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
/**Total Patrimonio */
$totalPatrimonio = $fondoPatrimonial['Suma']+$excedentesDeAsignacion['Suma'];
/**TOTAL PASIVO Y PATRIMONIO */
$totalPasivoPatrimonio = $totalPasivo+$totalPatrimonio;
require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\SpreadSheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;
$ruta = "ESF.xlsx";
$spreadsheet = IOFactory::load($ruta);
$creator = 'WIS';

// $spreadsheet = new SpreadSheet();
$spreadsheet->getProperties()->SetCreator($creator)->setTitle('ESTADO DE SITUACIÓN FINANCIERA '.$fecha_corte);

$spreadsheet->setActiveSheetIndex(0);
$hojaActiva = $spreadsheet->getActiveSheet();


$hojaActiva->setCellValue('B4','ESTADO DE SITUACIÓN FINANCIERA a '.$fecha_corte);

/**ESTADO DE SITUACIÓN FINANCIERA */

/**ACTIVO */
$hojaActiva->setCellValue('C8',$fecha_corte);
$hojaActiva->setCellValue('E11',$efectivoOequivalenteAefectivo);
$hojaActiva->setCellValue('C12',$disponibleASCUNNAC['Suma']);
$hojaActiva->setCellValue('C13',$disponibleASCUNBIE['Suma']);
$hojaActiva->setCellValue('C14',$inversionesFiduciarias['Suma']);
$hojaActiva->setCellValue('E16',$cuentasComercialesPorCobrar);
$hojaActiva->setCellValue('C17',$anticiposAvances['Suma']);
$hojaActiva->setCellValue('C18',$anticiposImpuestos['Suma']);
$hojaActiva->setCellValue('C19',$deudoresCuotaASCUNNAC['Suma']);
$hojaActiva->setCellValue('C20',$deudoresCuotaASCUNBIE['Suma']);
$hojaActiva->setCellValue('C21',$programasProyectosASCUNNAC['Suma']);
$hojaActiva->setCellValue('C22',$programasASCUNBIE['Suma']);
$hojaActiva->setCellValue('C23',$conveniosInternacionales['Suma']);
$hojaActiva->setCellValue('C24',$deudoresFondosUniversidades['Suma']);
$hojaActiva->setCellValue('C25',$provisionDeudores['Suma']);
$hojaActiva->setCellValue('C26',$cuentasPorCobrarEmpleados['Suma']);
$hojaActiva->setCellValue('C27',$deudoresContratosConvenios['Suma']);
$hojaActiva->setCellValue('E29',$totalActivoCorriente);
$hojaActiva->setCellValue('E32',$propiedadPlantaEquipo);
$hojaActiva->setCellValue('C33',$construccionesEdificaciones['Suma']);
$hojaActiva->setCellValue('C34',$equipoDeOficina['Suma']);
$hojaActiva->setCellValue('C35',$equipoDeComputacionComunicacion['Suma']);
$hojaActiva->setCellValue('C36',$flotaEquipoDeTransporte['Suma']);
$hojaActiva->setCellValue('E45',$totalActivoNoCorriente);
$hojaActiva->setCellValue('E51',$activoTotal);

/**PASIVO */
$hojaActiva->setCellValue('H8',$fecha_corte);
$hojaActiva->setCellValue('J11',$cuentasComercialesPorPagar);
$hojaActiva->setCellValue('H12',$obligacionesFinancieras['Suma']);
$hojaActiva->setCellValue('H13',$costosGastosPorPagar['Suma']);
$hojaActiva->setCellValue('H14',$contratosEnEjecucion['Suma']);
$hojaActiva->setCellValue('J16',$pasivosPorImpuestoCorriente);
$hojaActiva->setCellValue('H17',$impuestoDeIndustriaComercio['Suma']);
$hojaActiva->setCellValue('H18',$impuestoSobrelasVentas['Suma']);
$hojaActiva->setCellValue('H19',$retencionEnLaFuente['Suma']);
$hojaActiva->setCellValue('J22',$beneficiosEmpleados);
$hojaActiva->setCellValue('H23',$obligacionesLaborales['Suma']);
$hojaActiva->setCellValue('J26',$otrosPasivosCortoPlazo);
$hojaActiva->setCellValue('H27',$pasivosEstimadosProvisionales['Suma']);
$hojaActiva->setCellValue('H28',$anticiposAvances['Suma']);
$hojaActiva->setCellValue('J30',$totalPasivoCorriente);
$hojaActiva->setCellValue('J33',$otrosPasivosNoCorrientes);
$hojaActiva->setCellValue('H34',$ingresosRecividosPorAnticipado['Suma']);
$hojaActiva->setCellValue('H35',$fondosUniversidades['Suma']);
$hojaActiva->setCellValue('H36',$fondoConDestinacioEspecifica['Suma']);
$hojaActiva->setCellValue('J38',$otrosPasivosNoCorrientes);
$hojaActiva->setCellValue('J41',$totalPasivo);
$hojaActiva->setCellValue('H45',$fondoPatrimonial['Suma']);
$hojaActiva->setCellValue('H46',$excedentesDeAsignacion['Suma']);
$hojaActiva->setCellValue('J49',$totalPatrimonio);
$hojaActiva->setCellValue('J51',$totalPasivoPatrimonio);

/**guardar informe:ESTADO DE SITUACIÓN FINANCIERA */
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="ESTADO DE SITUACIÓN FINANCIERA '.$fecha_corte.'.xlsx"');
header('Cache-Control: max-age=0');
$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');