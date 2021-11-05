<?php
require_once '../../../Controllers/CarterasController.php';
require_once '../../../Models/Carteras.php';

require_once '../../../Models/Validaciones.php';
require_once '../../../Models/InformeRC.php';
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

/**Consultas SQL para obtener los datos del informe */

/**CARTERA NODOS RED DE BIENETAR UNIVERSITARIO */
/**REGIONAL: ANTIOQUIA */
/**CARTERA PROGRAMAS */
$carteraProgramasAntioquia = ModeloInformeRC::mdlCarteraProgramasAntioquia($tabla, $item, $valor);
/**CARTERA APORTE ADMINISTRATIVO */
$carteraAporteAdministrativoAntioquia = ModeloInformeRC::mdlCarteraAporteAdministrativoAntioquia($tabla, $item, $valor);
/**CARTERA TOTAL */
$carteraTotalAntioquia = $carteraProgramasAntioquia['Suma'] + $carteraAporteAdministrativoAntioquia['Suma'];

/**REGIONAL: BOGOTA */
/**CARTERA PROGRAMAS */
$carteraProgramasBogota = ModeloInformeRC::mdlCarteraProgramasBogota($tabla, $item, $valor);
/**CARTERA APORTE ADMINISTRATIVO */
$carteraAporteAdministrativoBogota = ModeloInformeRC::mdlCarteraAporteAdministrativoBogota($tabla, $item, $valor);
/**CARTERA TOTAL */
$carteraTotalBogota = $carteraProgramasBogota['Suma'] + $carteraAporteAdministrativoBogota['Suma'];

/**REGIONAL: CENTRO */
/**CARTERA PROGRAMAS */
$carteraProgramasCentro = ModeloInformeRC::mdlCarteraProgramasCentro($tabla, $item, $valor);
/**CARTERA APORTE ADMINISTRATIVO */
$carteraAporteAdministrativoCentro = ModeloInformeRC::mdlCarteraAporteAdministrativoCentro($tabla, $item, $valor);
/**CARTERA TOTAL */
$carteraTotalCentro = $carteraProgramasCentro['Suma'] + $carteraAporteAdministrativoCentro['Suma'];

/**REGIONAL: SUROCCIDENTE */
/**CARTERA PROGRAMAS */
$carteraProgramasSuroccidente = ModeloInformeRC::mdlCarteraProgramasSuroccidente($tabla, $item, $valor);
/**CARTERA APORTE ADMINISTRATIVO */
$carteraAporteAdministrativoSuroccidente = ModeloInformeRC::mdlCarteraAporteAdministrativoSuroccidente($tabla, $item, $valor);
/**CARTERA TOTAL */
$carteraTotalSuroccidente = $carteraProgramasSuroccidente['Suma'] + $carteraAporteAdministrativoSuroccidente['Suma'];
/**REGIONAL: ORIENTE */
/**CARTERA PROGRAMAS */
$carteraProgramasOriente = ModeloInformeRC::mdlCarteraProgramasOriente($tabla, $item, $valor);
/**CARTERA APORTE ADMINISTRATIVO */
$carteraAporteAdministrativoOriente = ModeloInformeRC::mdlCarteraAporteAdministrativoOriente($tabla, $item, $valor);
/**CARTERA TOTAL */
$carteraTotalOriente = $carteraProgramasOriente['Suma'] + $carteraAporteAdministrativoOriente['Suma'];
/**REGIONAL: COSTA */
/**CARTERA PROGRAMAS */
$carteraProgramasCosta = ModeloInformeRC::mdlCarteraProgramasCosta($tabla, $item, $valor);
/**CARTERA APORTE ADMINISTRATIVO */
$carteraAporteAdministrativoCosta = ModeloInformeRC::mdlCarteraAporteAdministrativoCosta($tabla, $item, $valor);
/**CARTERA TOTAL */
$carteraTotalCosta = $carteraProgramasCosta['Suma'] + $carteraAporteAdministrativoCosta['Suma'];

/**TOTALES */
/**CARTERA PROGRAMAS */
$carteraProgramas = $carteraProgramasAntioquia['Suma'] + $carteraProgramasBogota['Suma'] + $carteraProgramasCentro['Suma'] + $carteraProgramasSuroccidente['Suma'] + $carteraProgramasOriente['Suma'] + $carteraProgramasCosta['Suma'];
/**CARTERA APORTE ADMINISTRATIVO */
$carteraAporteAdministrativo = $carteraAporteAdministrativoAntioquia['Suma'] + $carteraAporteAdministrativoBogota['Suma'] + $carteraAporteAdministrativoCentro['Suma'] + $carteraAporteAdministrativoSuroccidente['Suma'] + $carteraAporteAdministrativoOriente['Suma'] + $carteraAporteAdministrativoCosta['Suma'];
/**CARTERA TOTAL */
$carteraTotal = $carteraProgramas + $carteraAporteAdministrativo;

/** -- */

/**CARTERA ASCUN NACIONAL */
/**TOTAL CUOTAS ASCUN NAL */
$totalCuotasASCUNNAL = ModeloInformeRC::mdlTotalCuotasASCUNNAL($tabla, $item, $valor);
// var_dump($totalCuotasASCUNNAL);
/**CARTERA FONDOS */
$carteraFondos = ModeloInformeRC::mdlCarteraFondos($tabla, $item, $valor);
/**PROGRAMAS Y PROYECTOS */
/**PROGRAMA RETOS */
$programasRetos = ModeloInformeRC::mdlProgramasRetos($tabla, $item, $valor);
/**EVENTOS ASCUN */
$eventosSACUN = ModeloInformeRC::mdlEventosSACUN($tabla, $item, $valor);
/**ADMINISTRATIVO */
$administrativo = ModeloInformeRC::mdlAdministrativo($tabla, $item, $valor);
/**PLENO */
$pleno = ModeloInformeRC::mdlPleno($tabla, $item, $valor);
/**CARTERA PROGRAMAS */
$carteraProgramas = $programasRetos['Suma'] +
$eventosSACUN['Suma'] +
$administrativo['Suma'] +
$pleno['Suma'];
/**PROYECTOS */
$proyectos = ModeloInformeRC::mdlProyectos($tabla, $item, $valor);

/** -- */

/**CARTERA EN RIESGO MAYOR A UN AÑO */
/**REGIONAL: ANTIOQUIA */
/**CARTERA PROGRAMAS */
$CRR_CarteraProgramasAntioquia = ModeloInformeRC::mdl_CRR_CarteraProgramasAntioquia($tabla, $item, $valor);
/**CARTERA CUOTRAS */
$carteraCuotasAntioquia = ModeloInformeRC::mdlCarteraCuotasAntioquia($tabla, $item, $valor);
/**CARTERA TOTAL */
$CRR_carteraTotalAntioquia = $CRR_CarteraProgramasAntioquia['Suma'] + $carteraCuotasAntioquia['Suma'];

/**REGIONAL: BOGOTA */
/**CARTERA PROGRAMAS */
$CRR_CarteraProgramasBogota = ModeloInformeRC::mdl_CRR_CarteraProgramasBogota($tabla, $item, $valor);
/**CARTERA CUOTRAS */
$carteraCuotasBogota = ModeloInformeRC::mdlCarteraCuotasBogota($tabla, $item, $valor);
/**CARTERA TOTAL */
$CRR_carteraTotalBogota = $CRR_CarteraProgramasBogota['Suma'] + $carteraCuotasBogota['Suma'];

/**REGIONAL: CENTRO */
/**CARTERA PROGRAMAS */
$CRR_CarteraProgramasCentro = ModeloInformeRC::mdl_CRR_CarteraProgramasCentro($tabla, $item, $valor);
/**CARTERA CUOTRAS */
$carteraCuotasCentro = ModeloInformeRC::mdlCarteraCuotasCentro($tabla, $item, $valor);
/**CARTERA TOTAL */
$CRR_carteraTotalCentro = $CRR_CarteraProgramasCentro['Suma'] + $carteraCuotasCentro['Suma'];

/**REGIONAL: SUROCCIDENTE */
/**CARTERA PROGRAMAS */
$CRR_CarteraProgramasSuroccidente = ModeloInformeRC::mdl_CRR_CarteraProgramasSuroccidente($tabla, $item, $valor);
/**CARTERA CUOTRAS */
$carteraCuotasSuroccidente = ModeloInformeRC::mdlCarteraCuotasSuroccidente($tabla, $item, $valor);
/**CARTERA TOTAL */
$CRR_carteraTotalSuroccidente = $CRR_CarteraProgramasSuroccidente['Suma'] + $carteraCuotasSuroccidente['Suma'];

/**REGIONAL: ORIENTE */
/**CARTERA PROGRAMAS */
$CRR_CarteraProgramasOriente = ModeloInformeRC::mdl_CRR_CarteraProgramasOriente($tabla, $item, $valor);
/**CARTERA CUOTRAS */
$carteraCuotasOriente = ModeloInformeRC::mdlCarteraCuotasOriente($tabla, $item, $valor);
/**CARTERA TOTAL */
$CRR_carteraTotalOriente = $CRR_CarteraProgramasOriente['Suma'] + $carteraCuotasOriente['Suma'];

/**REGIONAL: COSTA */
/**CARTERA PROGRAMAS */
$CRR_CarteraProgramasCosta = ModeloInformeRC::mdl_CRR_CarteraProgramasCosta($tabla, $item, $valor);
/**CARTERA CARTERA CUOTRAS */
$carteraCuotasCosta = ModeloInformeRC::mdlCarteraCuotasCosta($tabla, $item, $valor);
/**CARTERA TOTAL */
$CRR_carteraTotalCosta = $CRR_CarteraProgramasCosta['Suma'] + $carteraCuotasCosta['Suma'];

/**FONDOS */
/**CARTERA PROGRAMAS */
$CRR_CarteraProgramasFondos = ModeloInformeRC::mdl_CRR_CarteraProgramasFondos($tabla, $item, $valor);
/**CARTERA CUOTRAS */
$carteraCuotasFondos = 0;
/**CARTERA TOTAL */
$CRR_carteraTotalFondos = $CRR_CarteraProgramasFondos['Suma'] + $carteraCuotasFondos;

/**ASCUN NACIONAL */
/**CARTERA PROGRAMAS */
$CRR_CarteraProgramasASCUNNACINAL = ModeloInformeRC::mdl_CRR_CarteraProgramasASCUNNACINAL($tabla, $item, $valor);
/**CARTERA CUOTRAS */
$carteraCuotasASCUNNACINAL = ModeloInformeRC::mdlCarteraCuotasASCUNNACINAL($tabla, $item, $valor);
/**CARTERA TOTAL */
$CRR_carteraTotalASCUNNACINAL = $CRR_CarteraProgramasASCUNNACINAL['Suma'] + $carteraCuotasASCUNNACINAL['Suma'];

/**CARTERA EN RIESTO MAYOR A 1 AÑO */
/**CARTERA TOTAL */
$CRR_carteraTotal = $CRR_carteraTotalAntioquia + $CRR_carteraTotalBogota + $CRR_carteraTotalCentro + $CRR_carteraTotalSuroccidente + $CRR_carteraTotalOriente + $CRR_carteraTotalCosta + $CRR_carteraTotalFondos + $CRR_carteraTotalASCUNNACINAL;
/**CARTERA PROGRAMAS */
$CRR_CarteraProgramas = $CRR_CarteraProgramasAntioquia['Suma'] + $CRR_CarteraProgramasBogota['Suma'] + $CRR_CarteraProgramasCentro['Suma'] + $CRR_CarteraProgramasSuroccidente['Suma'] + $CRR_CarteraProgramasOriente['Suma'] + $CRR_CarteraProgramasCosta['Suma'] + $CRR_CarteraProgramasFondos['Suma'] + $CRR_CarteraProgramasASCUNNACINAL['Suma'];
/**CARTERA CUOTRAS */
$carteraCuotas = $carteraCuotasAntioquia['Suma'] + $carteraCuotasBogota['Suma'] + $carteraCuotasCentro['Suma'] + $carteraCuotasSuroccidente['Suma'] + $carteraCuotasOriente['Suma'] + $carteraCuotasCosta['Suma'] + $carteraCuotasFondos+ $carteraCuotasASCUNNACINAL['Suma'];

/**Generar informe en Excel */
require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\SpreadSheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;
$ruta = "RC.xlsx";
$spreadsheet = IOFactory::load($ruta);
$creator = 'WIS';

// $spreadsheet = new SpreadSheet();
$spreadsheet->getProperties()->SetCreator($creator)->setTitle('RESÚMEN DE CARTERA '.$fecha_corte);

$spreadsheet->setActiveSheetIndex(0);
$hojaActiva = $spreadsheet->getActiveSheet();


$hojaActiva->setCellValue('A4','RESÚMEN DE CARTERA A '.$fecha_corte);

/**RESÚMEN DE CARTERA */

/**REGIONAL: ANTIOQUIA */
if ($carteraTotalAntioquia!=0) {
	$hojaActiva->setCellValue('C9',$carteraTotalAntioquia);
}else{$hojaActiva->setCellValue('C9',0);}
if ($carteraProgramasAntioquia['Suma']!=0) {
	$hojaActiva->setCellValue('E9',$carteraProgramasAntioquia['Suma']);
}else{$hojaActiva->setCellValue('E9',0);}
if ($carteraAporteAdministrativoAntioquia['Suma']!=0) {
	$hojaActiva->setCellValue('F9',$carteraAporteAdministrativoAntioquia['Suma']);
}else{$hojaActiva->setCellValue('F9',0);}

/**REGIONAL: BOGOTA */
if ($carteraTotalBogota!=0) {
	$hojaActiva->setCellValue('C10',$carteraTotalBogota);
}else{$hojaActiva->setCellValue('C10',0);}
if ($carteraProgramasBogota['Suma']!=0) {
	$hojaActiva->setCellValue('E10',$carteraProgramasBogota['Suma']);
}else{$hojaActiva->setCellValue('E10',0);}
if ($carteraAporteAdministrativoBogota['Suma']!=0) {
	$hojaActiva->setCellValue('F10',$carteraAporteAdministrativoBogota['Suma']);
}else{$hojaActiva->setCellValue('F10',0);}

/**REGIONAL: CENTRO */
if ($carteraTotalCentro!=0) {
	$hojaActiva->setCellValue('C11',$carteraTotalCentro);
}else{$hojaActiva->setCellValue('C11',0);}
if ($carteraProgramasCentro['Suma']!=0) {
	$hojaActiva->setCellValue('E11',$carteraProgramasCentro['Suma']);
}else{$hojaActiva->setCellValue('E11',0);}
if ($carteraAporteAdministrativoCentro['Suma']!=0) {
	$hojaActiva->setCellValue('F11',$carteraAporteAdministrativoCentro['Suma']);
}else{$hojaActiva->setCellValue('F11',0);}

/**REGIONAL: SUROCCIDENTE */
if ($carteraTotalSuroccidente!=0) {
	$hojaActiva->setCellValue('C12',$carteraTotalSuroccidente);
}else{$hojaActiva->setCellValue('C12',0);}
if ($carteraProgramasSuroccidente['Suma']!=0) {
	$hojaActiva->setCellValue('E12',$carteraProgramasSuroccidente['Suma']);
}else{$hojaActiva->setCellValue('E12',0);}
if ($carteraAporteAdministrativoSuroccidente['Suma']!=0) {
	$hojaActiva->setCellValue('F12',$carteraAporteAdministrativoSuroccidente['Suma']);
}else{$hojaActiva->setCellValue('F12',0);}

/**REGIONAL: ORIENTE */
if ($carteraTotalOriente!=0) {
	$hojaActiva->setCellValue('C13',$carteraTotalOriente);
}else{$hojaActiva->setCellValue('C13',0);}
if ($carteraProgramasOriente['Suma']!=0) {
	$hojaActiva->setCellValue('E13',$carteraProgramasOriente['Suma']);
}else{$hojaActiva->setCellValue('E13',0);}
if ($carteraAporteAdministrativoOriente['Suma']!=0) {
	$hojaActiva->setCellValue('F13',$carteraAporteAdministrativoOriente['Suma']);
}else{$hojaActiva->setCellValue('F13',0);}

/**REGIONAL: COSTA */
if ($carteraTotalCosta!=0) {
	$hojaActiva->setCellValue('C14',$carteraTotalCosta);
}else{$hojaActiva->setCellValue('C14',0);}
if ($carteraProgramasCosta['Suma']!=0) {
	$hojaActiva->setCellValue('E14',$carteraProgramasCosta['Suma']);
}else{$hojaActiva->setCellValue('E14',0);}
if ($carteraAporteAdministrativoCosta['Suma']!=0) {
	$hojaActiva->setCellValue('F14',$carteraAporteAdministrativoCosta['Suma']);
}else{$hojaActiva->setCellValue('F14',0);}

/**REGIONAL: TOTALES */
if ($carteraTotal!=0) {
	$hojaActiva->setCellValue('C16',$carteraTotal);
}else{$hojaActiva->setCellValue('C16',0);}
if ($carteraProgramas=0) {
	$hojaActiva->setCellValue('E16',$carteraProgramas);
}else{$hojaActiva->setCellValue('E16',0);}
if ($carteraAporteAdministrativo=0) {
	$hojaActiva->setCellValue('F16',$carteraAporteAdministrativo);
}else{$hojaActiva->setCellValue('F16',0);}
$hojaActiva->setCellValue('C16',$carteraTotal);
$hojaActiva->setCellValue('E16',$carteraProgramas);
$hojaActiva->setCellValue('F16',$carteraAporteAdministrativo);

/**Cuotas de sostenimiento*/
$item  = null;
$valor = null;
$carteras = CarteasController::ctrVerCarteras($item, $valor);
$suma = 0;
$cell=19;
foreach ($carteras as $key => $value) {
	if($value['valor']!= 0) {
		$cell=$cell+1;
		$hojaActiva->setCellValue('B'.$cell.'',$value['descripcion'].' '.$value['anio']);
		$hojaActiva->setCellValue('C'.$cell.'',$value['valor']);
		$suma = $suma + $value["valor"];
	}
}

/** -- */

/**CARTERA ASCUN NACIONAL */
/**TOTAL CUOTAS ASCUN NAL */
$hojaActiva->setCellValue('C26',$suma);
/**CARTERA FONDOS */
if ($carteraFondos['Suma']!=0) {
	$hojaActiva->setCellValue('C28',$carteraFondos['Suma']);
}else{$hojaActiva->setCellValue('C28',0);}
/**PROGRAMA RETOS */
if ($programasRetos['Suma']!=0) {
	$hojaActiva->setCellValue('F21',$programasRetos['Suma']);
}else{$hojaActiva->setCellValue('F21',0);}
/**EVENTOS ASCUN */
if ($eventosSACUN['Suma']!=0) {
	$hojaActiva->setCellValue('F22',$eventosSACUN['Suma']);
}else{$hojaActiva->setCellValue('F22',0);}
/**ADMINISTRATIVO */
if ($administrativo['Suma']!=0) {
	$hojaActiva->setCellValue('F23',$administrativo['Suma']);
}else{$hojaActiva->setCellValue('F23',0);}
/**PLENO */
if ($pleno['Suma']!=0) {
	$hojaActiva->setCellValue('F24',$pleno['Suma']);
}else{$hojaActiva->setCellValue('F24',0);}
/**CARTERA PROGRAMAS */
if ($carteraProgramas!=0) {
	$hojaActiva->setCellValue('F25',$carteraProgramas);
}else{$hojaActiva->setCellValue('F25',0);}
/**PROYECTOS */
if ($proyectos['Suma']!=0) {
	$hojaActiva->setCellValue('F28',$proyectos['Suma']);
}else{$hojaActiva->setCellValue('F28',0);}

/** -- */

/**CARTERA EN RIESGO MAYOR A UN AÑO */
/**REGIONAL: ANTIOQUIA */
if ($CRR_carteraTotalAntioquia!=0) {
	$hojaActiva->setCellValue('C33',$CRR_carteraTotalAntioquia);
}else{$hojaActiva->setCellValue('C33',0);}
if ($CRR_CarteraProgramasAntioquia['Suma']!=0) {
	$hojaActiva->setCellValue('E33',$CRR_CarteraProgramasAntioquia['Suma']);
}else{$hojaActiva->setCellValue('E33',0);}
if ($carteraCuotasAntioquia['Suma']!=0) {
	$hojaActiva->setCellValue('F33',$carteraCuotasAntioquia['Suma']);
}else{$hojaActiva->setCellValue('F33',0);}

// /**REGIONAL: BOGOTA */
if ($CRR_carteraTotalBogota!=0) {
	$hojaActiva->setCellValue('C34',$CRR_carteraTotalBogota);
}else{$hojaActiva->setCellValue('C34',0);}
if ($CRR_CarteraProgramasBogota['Suma']!=0) {
	$hojaActiva->setCellValue('E34',$CRR_CarteraProgramasBogota['Suma']);
}else{$hojaActiva->setCellValue('E34',0);}
if ($carteraCuotasBogota['Suma']!=0) {
	$hojaActiva->setCellValue('F34',$carteraCuotasBogota['Suma']);
}else{$hojaActiva->setCellValue('F34',0);}

// // /**REGIONAL: CENTRO */
if ($CRR_carteraTotalCentro!=0) {
	$hojaActiva->setCellValue('C35',$CRR_carteraTotalCentro);
}else{$hojaActiva->setCellValue('C35',0);}
if ($CRR_CarteraProgramasCentro['Suma']!=0) {
	$hojaActiva->setCellValue('E35',$CRR_CarteraProgramasCentro['Suma']);
}else{$hojaActiva->setCellValue('E35',0);}
if ($carteraCuotasCentro['Suma']!=0) {
	$hojaActiva->setCellValue('F35',$carteraCuotasCentro['Suma']);
}else{$hojaActiva->setCellValue('F35',0);}

// // /**REGIONAL: SUROCCIDENTE */
if ($CRR_carteraTotalSuroccidente!=0) {
	$hojaActiva->setCellValue('C36',$CRR_carteraTotalSuroccidente);
}else{$hojaActiva->setCellValue('C36',0);}
if ($CRR_CarteraProgramasSuroccidente['Suma']!=0) {
	$hojaActiva->setCellValue('E36',$CRR_CarteraProgramasSuroccidente['Suma']);
}else{$hojaActiva->setCellValue('E36',0);}
if ($carteraCuotasSuroccidente['Suma']!=0) {
	$hojaActiva->setCellValue('F36',$carteraCuotasSuroccidente['Suma']);
}else{$hojaActiva->setCellValue('F36',0);}

// // /**REGIONAL: ORIENTE */
if ($CRR_carteraTotalOriente!=0) {
	$hojaActiva->setCellValue('C37',$CRR_carteraTotalOriente);
}else{$hojaActiva->setCellValue('C37',0);}
if ($CRR_CarteraProgramasOriente['Suma']!=0) {
	$hojaActiva->setCellValue('E37',$CRR_CarteraProgramasOriente['Suma']);
}else{$hojaActiva->setCellValue('E37',0);}
if ($carteraCuotasOriente['Suma']!=0) {
	$hojaActiva->setCellValue('F37',$carteraCuotasOriente['Suma']);
}else{$hojaActiva->setCellValue('F37',0);}

// // /**REGIONAL: COSTA */
if ($CRR_carteraTotalCosta!=0) {
	$hojaActiva->setCellValue('C38',$CRR_carteraTotalCosta);
}else{$hojaActiva->setCellValue('C38',0);}
if ($CRR_CarteraProgramasCosta['Suma']!=0) {
	$hojaActiva->setCellValue('E38',$CRR_CarteraProgramasCosta['Suma']);
}else{$hojaActiva->setCellValue('E38',0);}
if ($carteraCuotasCosta['Suma']!=0) {
	$hojaActiva->setCellValue('F38',$carteraCuotasCosta['Suma']);
}else{$hojaActiva->setCellValue('F38',0);}

// // /**FONDOS */
if ($CRR_carteraTotalFondos!=0) {
	$hojaActiva->setCellValue('C39',$CRR_carteraTotalFondos);
}else{$hojaActiva->setCellValue('C39',0);}
if ($CRR_CarteraProgramasFondos['Suma']!=0) {
	$hojaActiva->setCellValue('E39',$CRR_CarteraProgramasFondos['Suma']);
}else{$hojaActiva->setCellValue('E39',0);}
if ($carteraCuotasFondos!=0) {
	$hojaActiva->setCellValue('F39',$carteraCuotasFondos);
}else{$hojaActiva->setCellValue('F39',0);}

// // /**ASCUN NACIONAL */
if ($CRR_carteraTotalASCUNNACINAL!=0) {
	$hojaActiva->setCellValue('C40',$CRR_carteraTotalASCUNNACINAL);
}else{$hojaActiva->setCellValue('C40',0);}
if ($CRR_CarteraProgramasASCUNNACINAL['Suma']!=0) {
	$hojaActiva->setCellValue('E40',$CRR_CarteraProgramasASCUNNACINAL['Suma']);
}else{$hojaActiva->setCellValue('E40',0);}
if ($carteraCuotasASCUNNACINAL['Suma']!=0) {
	$hojaActiva->setCellValue('F40',$carteraCuotasASCUNNACINAL['Suma']);
}else{$hojaActiva->setCellValue('F40',0);}

// // /**CARTERA EN RIESGO MAYOR A 1 AÑO */
if ($CRR_carteraTotal!=0) {
	$hojaActiva->setCellValue('C41',$CRR_carteraTotal);
}else{$hojaActiva->setCellValue('C41',0);}
if ($CRR_CarteraProgramas!=0) {
	$hojaActiva->setCellValue('E41',$CRR_CarteraProgramas);
}else{$hojaActiva->setCellValue('E41',0);}
if ($carteraCuotas!=0) {
	$hojaActiva->setCellValue('F41',$carteraCuotas);
}else{$hojaActiva->setCellValue('F41',0);}


/**guardar informe:RESÚMEN DE CARTERA */
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="RESÚMEN DE CARTERA '.$fecha_corte.'.xlsx"');
header('Cache-Control: max-age=0');
$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');