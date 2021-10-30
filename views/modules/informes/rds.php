<?php
require_once '../../../Models/Validaciones.php';
require_once '../../../Models/InformeRDS.php';
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

/**Traer centro de costos */
$tabla = "centrosdecostos";
$item  = "centro_decostos";
$valor = $_GET["centroDecostos"];
$centro_decostos = ModeloInformeRDS::mdlTraerCentroDeCostos($tabla, $item, $valor);

$tabla = "bppcc";
$item  = 'transaccional';
$valor = 'sí';
$codigo_centro_decostos = $_GET["centroDecostos"];
/**RESUMEN */
// -> /**DETALLE */
/**SALDO AÑOS ANTERIORES */
$saldoAniosAnteriores = ModeloInformeRDS::mdlSaldoAniosAnteriores($tabla, $item, $valor, $codigo_centro_decostos);


// /**ANTICIPOS POR LEGALIZAR */
$anticiposPorLegalizar = ModeloInformeRDS::mdlAnticiposPorLegalizar($tabla, $item, $valor, $codigo_centro_decostos);


// -> /**DISPONIBLE */
/**CARTERA POR COBRAR */
$carteraPorCobrar = ModeloInformeRDS::mdlCarteraPorCobrar($tabla, $item, $valor, $codigo_centro_decostos);
/**TOTAL DISPONIBLE */
$totalDisponible = $carteraPorCobrar['Suma'];

 /**INFORMACIÓN DETALLADA */

// ->INGRESOS

/**INGRESOS FONDO */
$ingresoFondo = ModeloInformeRDS::mdlIngresoFondo($tabla, $item, $valor, $codigo_centro_decostos);
/**INGRESOS NO OPERACIONALES */
$ingresosNoOperacionales = ModeloInformeRDS::mdlIngresosNoOperacionales($tabla, $item, $valor, $codigo_centro_decostos);
/**DEVOLUCIONES */
$devoluciones = ModeloInformeRDS::mdlDevoluciones($tabla, $item, $valor, $codigo_centro_decostos);
/**TOTAL INGRESOS */
$totalIngresos = $ingresoFondo['Suma'] + $ingresosNoOperacionales['Suma'] + $devoluciones['Suma'];

/**... */
$honorariosEJE = ModeloInformeRDS::mdlHonorariosEJE($tabla, $item, $valor, $codigo_centro_decostos);
$iVADescontable_1EJE = ModeloInformeRDS::mdlIVADescontable_1EJE($tabla, $item, $valor, $codigo_centro_decostos);
$iVADescontable_2EJE = ModeloInformeRDS::mdlIVADescontable_2EJE($tabla, $item, $valor, $codigo_centro_decostos);
$iVADescontable_3EJE = ModeloInformeRDS::mdlIVADescontable_3EJE($tabla, $item, $valor, $codigo_centro_decostos);
$impoconsumoEJE = ModeloInformeRDS::mdlImpoconsumoEJE($tabla, $item, $valor, $codigo_centro_decostos);
$alquileresEJE = ModeloInformeRDS::mdlAlquileresEJE($tabla, $item, $valor, $codigo_centro_decostos);
$licenciasEJE = ModeloInformeRDS::mdlLicenciasEJE($tabla, $item, $valor, $codigo_centro_decostos);
$segurosYPolizasEJE = ModeloInformeRDS::mdlSegurosYPolizasEJE($tabla, $item, $valor, $codigo_centro_decostos);

$asistenciaTecnica = ModeloInformeRDS::mdlAsistenciaTecnica($tabla, $item, $valor, $codigo_centro_decostos);
$celularRecargas = ModeloInformeRDS::mdlCelularRecargas($tabla, $item, $valor, $codigo_centro_decostos);
$internetYPaginaWeb = ModeloInformeRDS::mdlInternetYPaginaWeb($tabla, $item, $valor, $codigo_centro_decostos);
$correoPortesYTelegramas = ModeloInformeRDS::mdlCorreoPortesYTelegramas($tabla, $item, $valor, $codigo_centro_decostos);
$trasporteFletesYAcarreos = ModeloInformeRDS::mdlTrasporteFletesYAcarreos($tabla, $item, $valor, $codigo_centro_decostos);
$impresos = ModeloInformeRDS::mdlImpresos($tabla, $item, $valor, $codigo_centro_decostos);
$gastosLegales = ModeloInformeRDS::mdlGastosLegales($tabla, $item, $valor, $codigo_centro_decostos);
$alojamientoYManutencion = ModeloInformeRDS::mdlAlojamientoYManutencion($tabla, $item, $valor, $codigo_centro_decostos);

$pasajesAereos = ModeloInformeRDS::mdlPasajesAereos($tabla, $item, $valor, $codigo_centro_decostos);
$pasajesTerrestres = ModeloInformeRDS::mdlPasajesTerrestres($tabla, $item, $valor, $codigo_centro_decostos);
$elementosDeAseoYCafeteria = ModeloInformeRDS::mdlElementosDeAseoYCafeteria($tabla, $item, $valor, $codigo_centro_decostos);
$utilesPapeleriaYFotocopias = ModeloInformeRDS::mdlUtilesPapeleriaYFotocopias($tabla, $item, $valor, $codigo_centro_decostos);
$combustiblesYLubricantes = ModeloInformeRDS::mdlCombustiblesYLubricantes($tabla, $item, $valor, $codigo_centro_decostos);
$taxisYBuses = ModeloInformeRDS::mdlTaxisYBuses($tabla, $item, $valor, $codigo_centro_decostos);
$casinoYRestaurante = ModeloInformeRDS::mdlCasinoYRestaurante($tabla, $item, $valor, $codigo_centro_decostos);
$parqueaderosYPeajes = ModeloInformeRDS::mdlParqueaderosYPeajes($tabla, $item, $valor, $codigo_centro_decostos);

$almuerzosYRefrigerios = ModeloInformeRDS::mdlAlmuerzosYRefrigerios($tabla, $item, $valor, $codigo_centro_decostos);
$apoyosEInscripciones = ModeloInformeRDS::mdlApoyosEInscripciones($tabla, $item, $valor, $codigo_centro_decostos);
$gastosVarios = ModeloInformeRDS::mdlGastosVarios($tabla, $item, $valor, $codigo_centro_decostos);
$gastosFinancieros = ModeloInformeRDS::mdlGastosFinancieros($tabla, $item, $valor, $codigo_centro_decostos);


/**... */

/**INGRESOS DEL PERIODO */
$ingresosDelPeriodo = $totalIngresos;
/**GASTOS DEL PERIODO */
$gastosDelPeriodo = $honorariosEJE['Suma'] + $iVADescontable_1EJE['Suma'] + $iVADescontable_2EJE['Suma'] + $iVADescontable_3EJE['Suma'] + $impoconsumoEJE['Suma'] + $alquileresEJE['Suma'] + $licenciasEJE['Suma'] + $segurosYPolizasEJE['Suma'] + $asistenciaTecnica['Suma'] + $celularRecargas['Suma'] + $internetYPaginaWeb['Suma'] + $correoPortesYTelegramas['Suma'] + $trasporteFletesYAcarreos['Suma'] + $impresos['Suma'] + $gastosLegales['Suma'] + $alojamientoYManutencion['Suma'] + $pasajesAereos['Suma'] + $pasajesTerrestres['Suma'] + $elementosDeAseoYCafeteria['Suma'] + $utilesPapeleriaYFotocopias['Suma'] + $combustiblesYLubricantes['Suma'] + $taxisYBuses['Suma'] + $casinoYRestaurante['Suma'] + $parqueaderosYPeajes['Suma'] + $almuerzosYRefrigerios['Suma'] + $apoyosEInscripciones['Suma'] + $gastosVarios['Suma'] + $gastosFinancieros['Suma'];

/**TOTAL EGRESOS */
$totalEgresos = $gastosDelPeriodo;

/**RESULTADO DEL EJERCICIO */
$resultadoDelEjercicio = $saldoAniosAnteriores['Suma'] + $ingresosDelPeriodo + $gastosDelPeriodo + $anticiposPorLegalizar['Suma'];


require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\SpreadSheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;
$ruta = "RDS.xlsx";
$spreadsheet = IOFactory::load($ruta);
$creator = 'WIS';

// $spreadsheet = new SpreadSheet();
$spreadsheet->getProperties()->SetCreator($creator)->setTitle('INOFORME DE EJECUCIÓN PRESUPUESTAL '.$fecha_corte);

$spreadsheet->setActiveSheetIndex(0);
$hojaActiva = $spreadsheet->getActiveSheet();


$hojaActiva->setCellValue('C5','Informe a '.$fecha_corte);
$hojaActiva->setCellValue('C7',$centro_decostos['nombre_sbcdc']);

/**INOFORME DE EJECUCIÓN PRESUPUESTAL */

/**RESUMEN */
// -> /**DETALLE */
if($saldoAniosAnteriores['Suma']!=null){
	$hojaActiva->setCellValue('D11',$saldoAniosAnteriores['Suma']);
}
else{
	$hojaActiva->setCellValue('D11',0);
}

if($ingresosDelPeriodo!=null){
	$hojaActiva->setCellValue('D12',$ingresosDelPeriodo);
}
else{
	$hojaActiva->setCellValue('D12',0);
}

if($gastosDelPeriodo!=null){
	$hojaActiva->setCellValue('D13',$gastosDelPeriodo);
}
else{
	$hojaActiva->setCellValue('D13',0);
}

if($anticiposPorLegalizar['Suma']!=null){
	$hojaActiva->setCellValue('D14',$anticiposPorLegalizar['Suma']);
}
else{
	$hojaActiva->setCellValue('D14',0);
}

if($resultadoDelEjercicio!=null){
	$hojaActiva->setCellValue('D15',$resultadoDelEjercicio);
}
else{
	$hojaActiva->setCellValue('D15',0);
}


if($carteraPorCobrar['Suma']!=null){
	$hojaActiva->setCellValue('D19',$carteraPorCobrar['Suma']);
}
else{
	$hojaActiva->setCellValue('D19',0);
}

if($totalDisponible!=null){
	$hojaActiva->setCellValue('D20',$totalDisponible);
}
else{
	$hojaActiva->setCellValue('D20',0);
}

if($ingresoFondo['Suma']!=null){
	$hojaActiva->setCellValue('D26',$ingresoFondo['Suma']);
}
else{
	$hojaActiva->setCellValue('D26',0);
}

if($ingresosNoOperacionales['Suma']!=null){
	$hojaActiva->setCellValue('D27',$ingresosNoOperacionales['Suma']);
}
else{
	$hojaActiva->setCellValue('D27',0);
}

if($devoluciones['Suma']!=null){
	$hojaActiva->setCellValue('D28',$devoluciones['Suma']);
}
else{
	$hojaActiva->setCellValue('D28',0);
}

if($totalIngresos!=null){
	$hojaActiva->setCellValue('D29',$totalIngresos);
}
else{
	$hojaActiva->setCellValue('D29',0);
}

/** */

if($honorariosEJE['Suma']!=null){
	$hojaActiva->setCellValue('D32',$honorariosEJE['Suma']);
}
else{
	$hojaActiva->setCellValue('D32',0);
}
if($iVADescontable_1EJE['Suma']!=null){
	$hojaActiva->setCellValue('D33',$iVADescontable_1EJE['Suma']);
}
else{
	$hojaActiva->setCellValue('D33',0);
}
if($iVADescontable_2EJE['Suma']!=null){
	$hojaActiva->setCellValue('D34',$iVADescontable_2EJE['Suma']);
}
else{
	$hojaActiva->setCellValue('D34',0);
}
if($iVADescontable_3EJE['Suma']!=null){
	$hojaActiva->setCellValue('D35',$iVADescontable_3EJE['Suma']);
}
else{
	$hojaActiva->setCellValue('D35',0);
}
if($impoconsumoEJE['Suma']!=null){
	$hojaActiva->setCellValue('D36',$impoconsumoEJE['Suma']);
}
else{
	$hojaActiva->setCellValue('D36',0);
}
if($alquileresEJE['Suma']!=null){
	$hojaActiva->setCellValue('D37',$alquileresEJE['Suma']);
}
else{
	$hojaActiva->setCellValue('D37',0);
}
if($licenciasEJE['Suma']!=null){
	$hojaActiva->setCellValue('D38',$licenciasEJE['Suma']);
}
else{
	$hojaActiva->setCellValue('D38',0);
}
if($segurosYPolizasEJE['Suma']!=null){
	$hojaActiva->setCellValue('D39',$segurosYPolizasEJE['Suma']);
}
else{
	$hojaActiva->setCellValue('D39',0);
}
if($asistenciaTecnica['Suma']!=null){
	$hojaActiva->setCellValue('D40',$asistenciaTecnica['Suma']);
}
else{
	$hojaActiva->setCellValue('D40',0);
}
if($celularRecargas['Suma']!=null){
	$hojaActiva->setCellValue('D41',$celularRecargas['Suma']);
}
else{
	$hojaActiva->setCellValue('D41',0);
}

if($internetYPaginaWeb['Suma']!=null){
	$hojaActiva->setCellValue('D42',$internetYPaginaWeb['Suma']);
}
else{
	$hojaActiva->setCellValue('D42',0);
}
if($correoPortesYTelegramas['Suma']!=null){
	$hojaActiva->setCellValue('D43',$correoPortesYTelegramas['Suma']);
}
else{
	$hojaActiva->setCellValue('D43',0);
}
if($trasporteFletesYAcarreos['Suma']!=null){
	$hojaActiva->setCellValue('D44',$trasporteFletesYAcarreos['Suma']);
}
else{
	$hojaActiva->setCellValue('D44',0);
}
if($impresos['Suma']!=null){
	$hojaActiva->setCellValue('D45',$impresos['Suma']);
}
else{
	$hojaActiva->setCellValue('D45',0);
}
if($gastosLegales['Suma']!=null){
	$hojaActiva->setCellValue('D46',$gastosLegales['Suma']);
}
else{
	$hojaActiva->setCellValue('D46',0);
}
if($alojamientoYManutencion['Suma']!=null){
	$hojaActiva->setCellValue('D47',$alojamientoYManutencion['Suma']);
}
else{
	$hojaActiva->setCellValue('D47',0);
}
if($pasajesAereos['Suma']!=null){
	$hojaActiva->setCellValue('D48',$pasajesAereos['Suma']);
}
else{
	$hojaActiva->setCellValue('D48',0);
}
if($pasajesTerrestres['Suma']!=null){
	$hojaActiva->setCellValue('D49',$pasajesTerrestres['Suma']);
}
else{
	$hojaActiva->setCellValue('D49',0);
}
if($elementosDeAseoYCafeteria['Suma']!=null){
	$hojaActiva->setCellValue('D50',$elementosDeAseoYCafeteria['Suma']);
}
else{
	$hojaActiva->setCellValue('D50',0);
}
if($utilesPapeleriaYFotocopias['Suma']!=null){
	$hojaActiva->setCellValue('D51',$utilesPapeleriaYFotocopias['Suma']);
}
else{
	$hojaActiva->setCellValue('D51',0);
}

if($combustiblesYLubricantes['Suma']!=null){
	$hojaActiva->setCellValue('D52',$combustiblesYLubricantes['Suma']);
}
else{
	$hojaActiva->setCellValue('D52',0);
}
if($taxisYBuses['Suma']!=null){
	$hojaActiva->setCellValue('D53',$taxisYBuses['Suma']);
}
else{
	$hojaActiva->setCellValue('D53',0);
}
if($casinoYRestaurante['Suma']!=null){
	$hojaActiva->setCellValue('D54',$casinoYRestaurante['Suma']);
}
else{
	$hojaActiva->setCellValue('D54',0);
}
if($parqueaderosYPeajes['Suma']!=null){
	$hojaActiva->setCellValue('D55',$parqueaderosYPeajes['Suma']);
}
else{
	$hojaActiva->setCellValue('D55',0);
}
if($almuerzosYRefrigerios['Suma']!=null){
	$hojaActiva->setCellValue('D56',$almuerzosYRefrigerios['Suma']);
}
else{
	$hojaActiva->setCellValue('D56',0);
}
if($apoyosEInscripciones['Suma']!=null){
	$hojaActiva->setCellValue('D57',$apoyosEInscripciones['Suma']);
}
else{
	$hojaActiva->setCellValue('D57',0);
}
if($gastosVarios['Suma']!=null){
	$hojaActiva->setCellValue('D58',$gastosVarios['Suma']);
}
else{
	$hojaActiva->setCellValue('D58',0);
}
if($gastosFinancieros['Suma']!=null){
	$hojaActiva->setCellValue('D59',$gastosFinancieros['Suma']);
}
else{
	$hojaActiva->setCellValue('D59',0);
}
if($totalEgresos!=null){
	$hojaActiva->setCellValue('D60',$totalEgresos);
}
else{
	$hojaActiva->setCellValue('D60',0);
}

/** */

/**guardar informe:INOFORME DE EJECUCIÓN PRESUPUESTAL */
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="INOFORME DE EJECUCIÓN PRESUPUESTAL '.$fecha_corte.'.xlsx"');
header('Cache-Control: max-age=0');
$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');