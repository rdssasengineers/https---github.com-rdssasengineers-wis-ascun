<?php
require_once '../../../Models/Validaciones.php';
require_once '../../../Models/InformeER.php';
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

/**ESTADO DE RESULTADOS INTEGRAL */

/**INGRESOS */
$sostenimineto = ModeloInformeER::mdlCuotaSostenimientoASCUN_N($tabla, $item, $valor);
$programas = ModeloInformeER::mdlProgramas($tabla, $item, $valor);
$programasFondos = ModeloInformeER::mdlProgramasFondos($tabla, $item, $valor);
$proyectosInternacionales = ModeloInformeER::mdlproyectosInternacionales($tabla, $item, $valor);
$gerenciaAdministracionProyectos = ModeloInformeER::mdlGerenciaAdministracionProyectos($tabla, $item, $valor);
$contratosNacionales = ModeloInformeER::mdlContratosNacionales($tabla, $item, $valor);
$programasRetos = ModeloInformeER::mdlProgramasRetos($tabla, $item, $valor);
$cuotaSostenimientoASCUNbienestar = ModeloInformeER::mdlCuotaSostenimientoASCUNbienestar($tabla, $item, $valor);
$programasProyectosASCUNbienestar = ModeloInformeER::mdlProgramasProyectosASCUNbienestar($tabla, $item, $valor);
$totalIngresosOperacionales = ($sostenimineto['Suma']+$programas['Suma']+$programasFondos['Suma']+$proyectosInternacionales['Suma']+$gerenciaAdministracionProyectos['Suma']+$contratosNacionales['Suma']+$programasRetos['Suma']+$cuotaSostenimientoASCUNbienestar['Suma']+$programasProyectosASCUNbienestar['Suma']);
// No operacionales
$financieros1 = ModeloInformeER::mdlFinancieros1($tabla, $item, $valor);
$financieros2 = ModeloInformeER::mdlFinancieros2($tabla, $item, $valor);
$indemnizaciones = ModeloInformeER::mdlIndemnizaciones($tabla, $item, $valor);
$diversos = ModeloInformeER::mdlDiversos($tabla, $item, $valor);
$totalIngresosNoOperacionales = ($financieros1['Suma']+$financieros2['Suma']+$indemnizaciones['Suma']+$diversos['Suma']);
$totalIngresos = ($totalIngresosOperacionales+$totalIngresosNoOperacionales);

/**EGRESOS */
$administracioSosteniminento = ModeloInformeER::mdlAdministracionSostenimiento($tabla, $item, $valor);
$deterioroCartera = ModeloInformeER::mdlDeterioroCartera($tabla, $item, $valor);
$programasEgresos = ModeloInformeER::mdlProgramasEgresos($tabla, $item, $valor);
$programasFondosEgresos = ModeloInformeER::mdlProgramasFondosEgresos($tabla, $item, $valor);
$proyectosInternacionalesEgresos = ModeloInformeER::mdlProyectosInternacionalesEgresos($tabla, $item, $valor);
$gerenciaAdministracionProyectosEgresos = ModeloInformeER::mdlGerenciaAdministracionProyectosEgresos($tabla, $item, $valor);
$contratosNacionalesEgresos = ModeloInformeER::mdlContratosNacionalesEgresos($tabla, $item, $valor);
$programasRetosEgresos = ModeloInformeER::mdlProgramasRetosEgresos($tabla, $item, $valor);
$inversionEquiposTecnico = ModeloInformeER::mdlInversionEquiposTecnico($tabla, $item, $valor);
$sistemaIntegradoGestion = ModeloInformeER::mdlSistemaIntegradoGestion($tabla, $item, $valor);

$administracionSostenimientoASCUNbienestar = ModeloInformeER::mdlAdministracionSostenimientoASCUNbienestar($tabla, $item, $valor);
$programasASCUNbienestar = ModeloInformeER::mdlProgramasASCUNbienestar($tabla, $item, $valor);
$deterioroDeCartera = ModeloInformeER::mdlDeterioroDeCartera($tabla, $item, $valor);

$totalEgresosOperacionales = ($administracioSosteniminento['Suma']+$deterioroCartera['Suma']+$programasEgresos['Suma']+$programasFondosEgresos['Suma']+$proyectosInternacionalesEgresos['Suma']+$gerenciaAdministracionProyectosEgresos['Suma']+$contratosNacionalesEgresos['Suma']+$programasRetosEgresos['Suma']+$inversionEquiposTecnico['Suma']+$sistemaIntegradoGestion['Suma']+$administracionSostenimientoASCUNbienestar['Suma']+$programasASCUNbienestar['Suma']+$deterioroDeCartera['Suma']);

$extencionesOperacionales = ($totalIngresosOperacionales-$totalEgresosOperacionales);
// No operacionales
$financierosEgresos = ModeloInformeER::mdlFinancierosEgresos($tabla, $item, $valor);
$gastosExtraordinarios = ModeloInformeER::mdlGastosExtraordinarios($tabla, $item, $valor);
$gastosDiversos = ModeloInformeER::mdlGastosDiversos($tabla, $item, $valor);

$totalEgresosNoOperacionales = ($financierosEgresos['Suma']+$gastosExtraordinarios['Suma']+$gastosDiversos['Suma']);

$totalEgresos = ($totalEgresosOperacionales+$totalEgresosNoOperacionales);

$totalExcedentes = ($totalIngresos-$totalEgresos);

$extencionesASCUNbienestar = (($cuotaSostenimientoASCUNbienestar['Suma']+$programasProyectosASCUNbienestar['Suma']) -($administracionSostenimientoASCUNbienestar['Suma']+$programasASCUNbienestar['Suma']+$deterioroDeCartera['Suma']));

$extencionesASCUNnacional =($totalExcedentes-$extencionesASCUNbienestar);
// var_dump($sostenimineto['Suma']);
require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\SpreadSheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;
$ruta = "ERI.xlsx";
$spreadsheet = IOFactory::load($ruta);
$creator = 'WIS';

// $spreadsheet = new SpreadSheet();
$spreadsheet->getProperties()->SetCreator($creator)->setTitle('ESTADO DE RESULTADOS INTEGRAL '.$fecha_corte);

$spreadsheet->setActiveSheetIndex(0);
$hojaActiva = $spreadsheet->getActiveSheet();


$hojaActiva->setCellValue('A7',$fecha_corte);

/**ESTADO DE RESULTADOS INTEGRAL */

/**INGRESOS*/
$hojaActiva->setCellValue('B11',$fecha_corte);
$hojaActiva->setCellValue('B15',$sostenimineto['Suma']);
$hojaActiva->setCellValue('B18',$programas['Suma']);
$hojaActiva->setCellValue('B20',$programasFondos['Suma']);
if ($proyectosInternacionales['Suma']="Null"){$proyectosInternacionales = 0;}
$hojaActiva->setCellValue('B22',$proyectosInternacionales);
$hojaActiva->setCellValue('B24',$gerenciaAdministracionProyectos['Suma']);
$hojaActiva->setCellValue('B26',$contratosNacionales['Suma']);
$hojaActiva->setCellValue('B28',$programasRetos['Suma']);
$hojaActiva->setCellValue('B35',$cuotaSostenimientoASCUNbienestar['Suma']);
$hojaActiva->setCellValue('B36',$programasProyectosASCUNbienestar['Suma']);
$hojaActiva->setCellValue('C40',$totalIngresosOperacionales);
$hojaActiva->setCellValue('B45',$financieros1['Suma']);
$hojaActiva->setCellValue('B46',$financieros2['Suma']);
$hojaActiva->setCellValue('B47',$indemnizaciones['Suma']);
$hojaActiva->setCellValue('B48',$diversos['Suma']);
$hojaActiva->setCellValue('C51',$totalIngresosNoOperacionales);
$hojaActiva->setCellValue('C54',$totalIngresos);

/**EGRESOS*/
$hojaActiva->setCellValue('G11',$fecha_corte);
$hojaActiva->setCellValue('G15',$administracioSosteniminento['Suma']);
if ($deterioroCartera['Suma']="Null"){$deterioroCartera = 0;}
$hojaActiva->setCellValue('G16',$deterioroCartera);
$hojaActiva->setCellValue('G18',$programasEgresos['Suma']);
$hojaActiva->setCellValue('G20',$programasFondosEgresos['Suma']);
$hojaActiva->setCellValue('G22',$proyectosInternacionalesEgresos['Suma']);
$hojaActiva->setCellValue('G24',$gerenciaAdministracionProyectosEgresos['Suma']);
$hojaActiva->setCellValue('G26',$contratosNacionalesEgresos['Suma']);
$hojaActiva->setCellValue('G28',$programasRetosEgresos['Suma']);
$hojaActiva->setCellValue('G31',$inversionEquiposTecnico['Suma']);
$hojaActiva->setCellValue('G32',$sistemaIntegradoGestion['Suma']);
$hojaActiva->setCellValue('G35',$administracionSostenimientoASCUNbienestar['Suma']);
$hojaActiva->setCellValue('G36',$programasASCUNbienestar['Suma']);
if ($deterioroDeCartera['Suma']="Null"){$deterioroDeCartera = 0;}
$hojaActiva->setCellValue('G37',$deterioroDeCartera);
$hojaActiva->setCellValue('H40',$totalEgresosOperacionales);
$hojaActiva->setCellValue('H42',$extencionesOperacionales);
$hojaActiva->setCellValue('G45',$financierosEgresos['Suma']);
$hojaActiva->setCellValue('G46',$gastosExtraordinarios['Suma']);
$hojaActiva->setCellValue('G47',$gastosDiversos['Suma']);
$hojaActiva->setCellValue('H51',$totalEgresosNoOperacionales);
$hojaActiva->setCellValue('H54',$totalEgresos);
$hojaActiva->setCellValue('H58',$totalExcedentes);
$hojaActiva->setCellValue('H61',$extencionesASCUNbienestar);
$hojaActiva->setCellValue('H62',$extencionesASCUNnacional);


/**guardar informe:ESTADO DE RESULTADOS INTEGRAL */
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="ESTADO DE RESULTADOS INTEGRAL '.$fecha_corte.'.xlsx"');
header('Cache-Control: max-age=0');
$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');