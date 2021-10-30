<!-- @format -->

<!-- php -->
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
$valor = 'si';
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
// var_dump($equipoDeComputacionComunicacion);
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
include('scripts-er.php');
// var_dump($totalExcedentes);
// $excedentesDeAsignacion = ModeloInformeSF::mdlExcedentesDeAsignacion($tabla, $item, $valor);
/**Total Patrimonio */
$totalPatrimonio = $fondoPatrimonial['Suma']+$totalExcedentes;
/**TOTAL PASIVO Y PATRIMONIO */
$totalPasivoPatrimonio = $totalPasivo+$totalPatrimonio;
// var_dump($disponibleASCUNNAC);
// echo '<h1>$ ' .number_format($disponibleASCUNNAC['Suma'],0, ",", ".").'</h1>';
?>
<div class="col-md-12">
	<div class="card">
		<div class="card-header">
			<h4 class="card-title">
				ESTADO DE SITUACIÓN -
				<small class="description">FINANCIERA</small>
			</h4>
			<?php include 'validar-balance.php'?>
		</div>
		<div class="card-body">
			<div class="row">
				<div class="col-lg-2 col-md-3">
					<ul class="nav nav-pills nav-pills-icons flex-column" role="tablist">
						<li class="nav-item">
							<a
								class="nav-link active"
								data-toggle="tab"
								href="#activo"
								role="tablist"
							>
								<i class="fas fa-coins"></i> ACTIVO
							</a>
						</li>
						<li class="nav-item">
							<a
								class="nav-link"
								data-toggle="tab"
								href="#pasivo"
								role="tablist"
							>
								<i class="fas fa-coin"></i> PASIVO
							</a>
						</li>
					</ul>
				</div>
				<div class="col-md-10">
					<div class="tab-content">
						<div class="tab-pane active" id="activo">
							<div class="card">
								<div
									class="card-header card-header-icon card-header-success"
									style="box-shadow: none"
								>
									<div class="card-icon card-button" style="box-shadow: none">
										<a href="./views/modules/informes/esf.php" target="_blank"
											><i class="fad fa-file-spreadsheet" style="color: #f8f9fa;font-size: 2rem;margin: 10px 0px 0px 10px;"></i>
										</a>
									</div>
									<h4 class="card-title text-uppercase">
										Activo Corriente
									</h4>
								</div>
								<div class="card-body table-full-width table-hover">
									<div class="table-responsive">
										<table class="table">
											<thead>
												<!-- <th>#</th> -->
												<th>Activo</th>
												<!-- php -->
												<?php	echo '<th>Corte ' .$fecha_corte.'</th>';?>
											</thead>
											<tbody>
												<!-- table-success - table-info - table-danger - table-warning -->
												<tr class="">
													<!-- <td>1</td> -->
													<td><strong>EFECTIVO O EQUIVALENTE A EFECTIVO</strong></td>
													<td class="text-right">$ <?php echo number_format($efectivoOequivalenteAefectivo,0, ",", ".");?></td>
												</tr>
												<tr class="">
													<!-- <td>2</td> -->
													<td>DISPONIBLE ASCUN NACIONAL</td>
													<td class="text-left">$ <?php echo number_format($disponibleASCUNNAC['Suma'],0, ",", ".");?></td>
												</tr>
												<tr class="">
													<!-- <td>3</td> -->
													<td>DISPONIBLE ASCUN BIENESTAR</td>
													<td class="text-left">$ <?php echo number_format($disponibleASCUNBIE['Suma'],0, ",", ".");?></td>
												</tr>
												<tr class="">
													<!-- <td>4</td> -->
													<td>INVERSIONES FIDUCIARIAS</td>
													<td class="text-left">$ <?php echo number_format($inversionesFiduciarias['Suma'],0, ",", ".");?></td>
												</tr>
												<tr class="">
													<!-- <td>5</td> -->
													<td><strong>CUENTAS COMERCIALES POR COBRAR</strong></td>
													<td class="text-right">$ <?php echo number_format($cuentasComercialesPorCobrar,0, ",", ".");?></td>
												</tr>
												<tr class="">
													<!-- <td>6</td> -->
													<td>ANTICIPOS Y AVANCES</td>
													<td class="text-left">$ <?php echo number_format($anticiposAvances['Suma'],0, ",", ".");?></td>
												</tr>
												<tr class="">
													<!-- <td>7</td> -->
													<td>ANTICIPO DE IMPUESTOS</td>
													<td class="text-left">$ <?php echo number_format($anticiposImpuestos['Suma'],0, ",", ".");?></td>
												</tr>
												<tr class="">
													<!-- <td>8</td> -->
													<td>DEUDORES CUOTAS ASCUN NACIONAL</td>
													<td class="text-left">$ <?php echo number_format($deudoresCuotaASCUNNAC['Suma'],0, ",", ".");?></td>
												</tr>
												<tr class="">
													<!-- <td>9</td> -->
													<td>DEUDORES CUOTAS ASCUN BIENESTAR</td>
													<td class="text-left">$ <?php echo number_format($deudoresCuotaASCUNBIE['Suma'],0, ",", ".");?></td>
												</tr>
												<tr class="">
													<!-- <td>10</td> -->
													<td>PROGRAMAS Y PROYECTOS  ASCUN NACIONAL</td>
													<td class="text-left">
														$ <?php echo number_format($programasProyectosASCUNNAC['Suma'],0, ",", ".");?>
													</td>
												</tr>
												<tr class="">
													<!-- <td>12</td> -->
													<td>PROGRAMAS ASCUN BIENESTAR</td>
													<td>$ <?php echo number_format($programasASCUNBIE['Suma'],0, ",", ".");?></td>
												</tr>
												<tr class="">
													<!-- <td>13</td> -->
													<td>CONVENIOS INTERNACIONALES</td>
													<td>$ <?php echo number_format($conveniosInternacionales['Suma'],0, ",", ".");?></td>
												</tr>
												<tr class="">
													<!-- <td>14</td> -->
													<td>DEUDORES FONDOS UNIVERSIDADES</td>
													<td>$ <?php echo number_format($deudoresFondosUniversidades['Suma'],0, ",", ".");?></td>
												</tr>
												<tr class="">
													<!-- <td>15</td> -->
													<td>PROVISION DEUDORES</td>
													<?php
														if($provisionDeudores['Suma']<0) {
															$positivo = ($provisionDeudores['Suma'] *(-1));
															echo '<td style="color: #d81920;">$ '.number_format($positivo,0, ",", ".").'</td>';
														}
														else{echo '<td>$ '.number_format($provisionDeudores['Suma'],0, ",", ".").'</td>';}
													?>
												</tr>
												<tr class="">
													<!-- <td>16</td> -->
													<td>CUENTAS POR COBRAR EMPLEADOS</td>
													<td>$ <?php echo number_format($cuentasPorCobrarEmpleados['Suma'],0, ",", ".");?></td>
												</tr>
												<tr class="">
													<!-- <td>17</td> -->
													<td>DEUDORES CONTRATOS Y CONVENIOS</td>
													<td>$ <?php echo number_format($deudoresContratosConvenios['Suma'],0, ",", ".");?></td>
												</tr>
												<tr class="">
													<!-- <td>18</td> -->
													<td>
														<strong>TOTAL ACTIVO CORRIENTE</strong>
													</td>
													<td class="text-right">
														<strong>$ <?php echo number_format($totalActivoCorriente,0, ",", ".");?></strong>
													</td>
												</tr>
												<tr class="">
													<!-- <td>19</td> -->
													<td class="text-center">
														<strong>Activo No Corriente</strong>
													</td>
													<td></td>
												</tr>
												<tr class="">
													<!-- <td>20</td> -->
													<td><strong>PROPIEDAD PLANTA Y EQUIPO</strong></td>
													<td class="text-right">$ <?php echo number_format($propiedadPlantaEquipo,0, ",", ".");?></td>
												</tr>
												<tr class="">
													<!-- <td>21</td> -->
													<td>CONSTRUCCIONES Y EDIFICACIONES</td>
													<td>$ <?php echo number_format($construccionesEdificaciones['Suma'],0, ",", ".");?></td>
												</tr>
												<tr class="">
													<!-- <td>22</td> -->
													<td>EQUIPO DE OFICINA</td>
													<td>$ <?php echo number_format($equipoDeOficina['Suma'],0, ",", ".");?></td>
												</tr>
												<tr class="">
													<!-- <td>23</td> -->
													<td>EQUIPO DE COMPUTACION Y COMUNICACION</td>
													<td>$ <?php echo number_format($equipoDeComputacionComunicacion['Suma'],0, ",", ".");?></td>
												</tr>
												<tr class="">
													<!-- <td>24</td> -->
													<td>FLOTA Y EQUIPO DE TRANSPORTE</td>
													<td>$ <?php echo number_format($flotaEquipoDeTransporte['Suma'],0, ",", ".");?></td>
												</tr>
												<tr class="">
													<!-- <td>18</td> -->
													<td>
														<strong>TOTAL ACTIVO NO CORRIENTE</strong>
													</td>
													<td class="text-right">
														<strong>$ <?php echo number_format($totalActivoNoCorriente,0, ",", ".");?></strong>
													</td>
												</tr>
												<tr class="table-success">
													<!-- <td>17</td> -->
													<td><strong>TOTAL ACTIVO</strong></td>
													<td class="text-right">
														<strong>$ <?php echo number_format($activoTotal,0, ",", ".");?></strong>
													</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane" id="pasivo">
							<div class="card">
								<div
									class="card-header card-header-icon card-header-success"
									style="box-shadow: none"
								>
									<div class="card-icon card-button" style="box-shadow: none">
										<a href="./views/modules/informes/esf.php" target="_blank"
											><i class="fad fa-file-spreadsheet" style="color: #f8f9fa;font-size: 2rem;margin: 10px 0px 0px 10px;"></i>
										</a>
									</div>
									<h4 class="card-title text-uppercase">
										Pasivo Corriente
									</h4>
								</div>
								<div class="card-body table-full-width table-hover">
									<div class="table-responsive">
										<table class="table">
											<thead>
												<!-- <th>#</th> -->
												<th>Pasivo</th>
												<!-- php -->
												<?php	echo '<th>Corte ' .$fecha_corte.'</th>';?>
											</thead>
											<tbody>
												<!-- table-success - table-info - table-danger - table-warning -->
												<tr class="">
													<!-- <td>1</td> -->
													<td><strong>CUENTAS COMERCIALES POR PAGAR</strong></td>
													<td class="text-right">$ <?php echo number_format($cuentasComercialesPorPagar,0, ",", ".");?></td>
												</tr>
												<tr class="">
													<!-- <td>2</td> -->
													<td>OBLIGACIONES FINANCIERAS</td>
													<td class="text-left">$ <?php echo number_format($obligacionesFinancieras['Suma'],0, ",", ".");?></td>
												</tr>
												<tr class="">
													<!-- <td>3</td> -->
													<td>COSTOS Y GASTOS POR PAGAR</td>
													<td class="text-left">$ <?php echo number_format($costosGastosPorPagar['Suma'],0, ",", ".");?></td>
												</tr>
												<tr class="">
													<!-- <td>4</td> -->
													<td>CONTRATOS EN EJECUCION</td>
													<td class="text-left">$ <?php echo number_format($contratosEnEjecucion['Suma'],0, ",", ".");?></td>
												</tr>
												<tr class="">
													<!-- <td>5</td> -->
													<td><strong>PASIVOS POR IMPUESTOS CORRIENTES</strong></td>
													<td class="text-right">$ <?php echo number_format($pasivosPorImpuestoCorriente,0, ",", ".");?></td>
												</tr>
												<tr class="">
													<!-- <td>6</td> -->
													<td>IMPUESTO DE INDUSTRIA Y COMERCIO RETENIDO</td>
													<td class="text-left">$ <?php echo number_format($impuestoDeIndustriaComercio['Suma'],0, ",", ".");?></td>
												</tr>
												<tr class="">
													<!-- <td>7</td> -->
													<td>IMPUESTO SOBRE LAS VENTAS POR PAGAR</td>
													<td class="text-left">$ <?php echo number_format($impuestoSobrelasVentas['Suma'],0, ",", ".");?></td>
												</tr>
												<tr class="">
													<!-- <td>8</td> -->
													<td>RETENCION EN LA FUENTE</td>
													<td class="text-left">$ <?php echo number_format($retencionEnLaFuente['Suma'],0, ",", ".");?></td>
												</tr>
												<tr class="">
													<!-- <td>9</td> -->
													<td><strong>BENEFICIOS  EMPLEADOS</strong></td>
													<td class="text-right">$ <?php echo number_format($beneficiosEmpleados,0, ",", ".");?></td>
												</tr>
												<tr class="">
													<!-- <td>10</td> -->
													<td>OBLIGACIONES LABORALES</td>
													<td class="text-left">
														$ <?php echo number_format($obligacionesLaborales['Suma'],0, ",", ".");?>
													</td>
												</tr>
												<tr class="">
													<!-- <td>12</td> -->
													<td><strong>OTROS PASIVOS A CORTO PLAZO</strong></td>
													<td class="text-right">$ <?php echo number_format($otrosPasivosCortoPlazo,0, ",", ".");?></td>
												</tr>
												<tr class="">
													<!-- <td>13</td> -->
													<td>PASIVOS ESTIMADOS Y PROVISIONES</td>
													<td>$ <?php echo number_format($pasivosEstimadosProvisionales['Suma'],0, ",", ".");?></td>
												</tr>
												<tr class="">
													<!-- <td>14</td> -->
													<td>ANTICIPOS Y AVANCES RECIBIDOS</td>
													<td>$ <?php echo number_format($anticiposAvancesRecibidos['Suma'],0, ",", ".");?></td>
												</tr>
												<tr class="">
													<!-- <td>15</td> -->
													<td><strong>Total Pasivo Corriente</strong></td>
													<td class="text-right">$ <?php echo number_format($totalPasivoCorriente,0, ",", ".");?></td>
												</tr>
												<tr class="">
													<!-- <td>19</td> -->
													<td class="text-center">
														<strong>Pasivo no corriente</strong>
													</td>
													<td></td>
												</tr>
												<tr class="">
													<!-- <td>20</td> -->
													<td><strong>OTROS PASIVOS NO CORRIENTES</strong></td>
													<td class="text-right">$ <?php echo number_format($otrosPasivosNoCorrientes,0, ",", ".");?></td>
												</tr>
												<tr class="">
													<!-- <td>21</td> -->
													<td>INGRESOS RECIBIDOS POR ANTICIPADO</td>
													<td>$ <?php echo number_format($ingresosRecividosPorAnticipado['Suma'],0, ",", ".");?></td>
												</tr>
												<tr class="">
													<!-- <td>22</td> -->
													<td>FONDOS UNIVERSIDADES</td>
													<td>$ <?php echo number_format($fondosUniversidades['Suma'],0, ",", ".");?></td>
												</tr>
												<tr class="">
													<!-- <td>23</td> -->
													<td>FONDO CON DESTINACION ESPECIFICA</td>
													<td>$ <?php echo number_format($fondoConDestinacioEspecifica['Suma'],0, ",", ".");?></td>
												</tr>
												<tr class="">
													<!-- <td>18</td> -->
													<td>
														<strong>TOTAL PASIVO NO CORRIENTE</strong>
													</td>
													<td class="text-right">
														<strong>$ <?php echo number_format($otrosPasivosNoCorrientes,0, ",", ".");?></strong>
													</td>
												</tr>
												<tr class="">
													<!-- <td>17</td> -->
													<td><strong>TOTAL PASIVO</strong></td>
													<td class="text-right">
														<strong>$ <?php echo number_format($totalPasivo,0, ",", ".");?></strong>
													</td>
												</tr>
												<tr class="">
													<!-- <td>19</td> -->
													<td class="text-center">
														<strong>PATRIMONIO</strong>
													</td>
													<td></td>
												</tr>
												<tr class="">
													<!-- <td>18</td> -->
													<td>
														FONDO PATRIMONIAL
													</td>
													<td class="text-right">
														$ <?php echo number_format($fondoPatrimonial['Suma'],0, ",", ".");?>
													</td>
												</tr>
												<tr class="">
													<!-- <td>17</td> -->
													<td>EXCEDENTES DE ASIGNACION DEL PRESENTE EJERCICIO</td>
													<td class="text-right">
														$ <?php echo number_format($totalExcedentes,0, ",", ".");?>
													</td>
												</tr>
												<tr class="">
													<!-- <td>17</td> -->
													<td><strong>Total Patrimonio</strong></td>
													<td class="text-right">
														<strong>$ <?php echo number_format($totalPatrimonio,0, ",", ".");?></strong>
													</td>
												</tr>
												<tr class="table-success">
													<!-- <td>17</td> -->
													<td><strong>TOTAL PASIVO Y PATRIMONIO</strong></td>
													<td class="text-right">
														<strong>$ <?php echo number_format($totalPasivoPatrimonio,0, ",", ".");?></strong>
													</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
