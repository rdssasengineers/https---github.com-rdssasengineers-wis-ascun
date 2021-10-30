<?php
$tabla = "bppcc";
$item  = 'transaccional';
$valor = 'sí';
/**GYP INGRESOS */
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
/**GYP EGRESOS */
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