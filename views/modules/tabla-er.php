<!-- @format -->

<!-- php -->
<?php
global $excedentesDeAsignacion;
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
$excedentesDeAsignacion = &$totalExcedentes;

$extencionesASCUNbienestar = (($cuotaSostenimientoASCUNbienestar['Suma']+$programasProyectosASCUNbienestar['Suma']) -($administracionSostenimientoASCUNbienestar['Suma']+$programasASCUNbienestar['Suma']+$deterioroDeCartera['Suma']));

$extencionesASCUNnacional =($totalExcedentes-$extencionesASCUNbienestar);
// var_dump($programasFondos);
// echo '<h1>$ ' .number_format($programasFondos['Suma'],0, ",", ".").'</h1>';
?>
<div class="col-md-12">
	<div class="card">
		<div class="card-header">
			<h4 class="card-title">
				ESTADO DE RESULTADOS -
				<small class="description">INTEGRAL</small>
			</h4>
		</div>
		<div class="card-body">
			<div class="row">
				<div class="col-lg-2 col-md-3">
					<ul class="nav nav-pills nav-pills-icons flex-column" role="tablist">
						<li class="nav-item">
							<a
								class="nav-link active"
								data-toggle="tab"
								href="#ingresos"
								role="tablist"
							>
								<i class="fas fa-coins"></i> INGRESOS
							</a>
						</li>
						<li class="nav-item">
							<a
								class="nav-link"
								data-toggle="tab"
								href="#egresos"
								role="tablist"
							>
								<i class="fas fa-coin"></i> EGRESOS
							</a>
						</li>
					</ul>
				</div>
				<div class="col-md-10">
					<div class="tab-content">
						<div class="tab-pane active" id="ingresos">
							<div class="card">
								<div
									class="card-header card-header-icon card-header-success"
									style="box-shadow: none"
								>
									<div class="card-icon card-button" style="box-shadow: none">
										<a href="./views/modules/informes/eri.php" target="_blank"
											><i class="fad fa-file-spreadsheet" style="color: #f8f9fa;font-size: 2rem;margin: 10px 0px 0px 10px;"></i>
										</a>
									</div>
									<h4 class="card-title text-uppercase">
										Ingresos Operacionales
									</h4>
								</div>
								<div class="card-body table-full-width table-hover">
									<div class="table-responsive">
										<table class="table">
											<thead>
												<!-- <th>#</th> -->
												<th>Ingresos</th>
												<!-- php -->
												<?php	echo '<th>Corte ' .$fecha_corte.'</th>';?>
											</thead>
											<tbody>
												<!-- table-success - table-info - table-danger - table-warning -->
												<tr class="">
													<!-- <td>1</td> -->
													<td>CUOTAS DE SOSTENIMIENTO ASCUN NACIONAL</td>
													<td class="text-left">$ <?php echo number_format($sostenimineto['Suma'],0, ",", ".");?></td>
												</tr>
												<tr class="">
													<!-- <td>2</td> -->
													<td>PROGRAMAS</td>
													<td class="text-left">$ <?php echo number_format($programas['Suma'],0, ",", ".");?></td>
												</tr>
												<tr class="">
													<!-- <td>3</td> -->
													<td>PROGRAMAS FONDOS</td>
													<td class="text-left">$ <?php echo number_format($programasFondos['Suma'],0, ",", ".");?></td>
												</tr>
												<tr class="">
													<!-- <td>4</td> -->
													<td>PROYECTOS INTERNACIONALES</td>
													<td class="text-left">$ <?php echo number_format($proyectosInternacionales['Suma'],0, ",", ".");?></td>
												</tr>
												<tr class="">
													<!-- <td>5</td> -->
													<td>GERENCIA Y ADMINISTRACIÓN DE PROYECTOS</td>
													<td class="text-left">$ <?php echo number_format($gerenciaAdministracionProyectos['Suma'],0, ",", ".");?></td>
												</tr>
												<tr class="">
													<!-- <td>6</td> -->
													<td>CONTRATOS NACIONALES</td>
													<td class="text-left">$ <?php echo number_format($contratosNacionales['Suma'],0, ",", ".");?></td>
												</tr>
												<tr class="">
													<!-- <td>7</td> -->
													<td>PROGRAMAS RETOS</td>
													<td class="text-left">$ <?php echo number_format($programasRetos['Suma'],0, ",", ".");?></td>
												</tr>
												<tr class="">
													<!-- <td>8</td> -->
													<td>CUOTAS DE SOSTENIMIENTO ASCUN BIENESTAR</td>
													<td class="text-left">$ <?php echo number_format($cuotaSostenimientoASCUNbienestar['Suma'],0, ",", ".");?></td>
												</tr>
												<tr class="">
													<!-- <td>9</td> -->
													<td>PROGRAMAS Y PROYECTOS ASCUN BIENESTAR</td>
													<td class="text-left">$ <?php echo number_format($programasProyectosASCUNbienestar['Suma'],0, ",", ".");?></td>
												</tr>
												<tr class="">
													<!-- <td>10</td> -->
													<td><strong>TOTAL INGRESOS OPERACIONALES</strong></td>
													<td class="text-right">
														<strong>$ <?php echo number_format($totalIngresosOperacionales,0, ",", ".");?></strong>
													</td>
												</tr>
												<tr class="">
													<!-- <td>11</td> -->
													<td class="text-center">
														<strong>NO OPERACIONALES</strong>
													</td>
													<td></td>
												</tr>
												<tr class="">
													<!-- <td>12</td> -->
													<td>FINANCIEROS</td>
													<td>$ <?php echo number_format($financieros1['Suma'],0, ",", ".");?></td>
												</tr>
												<tr class="">
													<!-- <td>13</td> -->
													<td>FINANCIEROS</td>
													<td>$ <?php echo number_format($financieros2['Suma'],0, ",", ".");?></td>
												</tr>
												<tr class="">
													<!-- <td>14</td> -->
													<td>INDEMNIZACIONES</td>
													<td>$ <?php echo number_format($indemnizaciones['Suma'],0, ",", ".");?></td>
												</tr>
												<tr class="">
													<!-- <td>15</td> -->
													<td>DIVERSOS</td>
													<td>$ <?php echo number_format($diversos['Suma'],0, ",", ".");?></td>
												</tr>
												<tr class="">
													<!-- <td>16</td> -->
													<td>
														<strong>TOTAL INGRESOS NO OPERACIONALES</strong>
													</td>
													<td class="text-right">
														<strong>$ <?php echo number_format($totalIngresosNoOperacionales,0, ",", ".");?></strong>
													</td>
												</tr>
												<tr class="table-success">
													<!-- <td>17</td> -->
													<td><strong>TOTAL INGRESOS</strong></td>
													<td class="text-right">
														<strong>$ <?php echo number_format($totalIngresos,0, ",", ".");?></strong>
													</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane" id="egresos">
							<div class="card">
								<div
									class="card-header card-header-icon card-header-success"
									style="box-shadow: none"
								>
									<div class="card-icon card-button" style="box-shadow: none">
										<a href="./views/modules/informes/eri.php" target="_blank"
											><i class="fad fa-file-spreadsheet" style="color: #f8f9fa;font-size: 2rem;margin: 10px 0px 0px 10px;"></i>
										</a>
									</div>
									<h4 class="card-title text-uppercase">
										Egresos Operacionales
									</h4>
								</div>
								<div class="card-body table-full-width table-hover">
									<div class="table-responsive">
										<table class="table">
											<thead>
												<!-- <th>#</th> -->
												<th>Egresos</th>
												<!-- php -->
												<?php	echo '<th>Corte ' .$fecha_corte.'</th>';?>
											</thead>
											<tbody>
												<!-- table-success - table-info - table-danger - table-warning -->
												<tr class="">
													<!-- <td>1</td> -->
													<td>ADMINISTRACIÓN Y SOSTENIMIENTO</td>
													<td class="text-left">$ <?php echo number_format($administracioSosteniminento['Suma'],0, ",", ".");?></td>
												</tr>
												<tr class="">
													<!-- <td>1</td> -->
													<td>DETERIORO DE CARTERA</td>
													<td class="text-left">$ <?php echo number_format($deterioroCartera['Suma'],0, ",", ".");?></td>
												</tr>
												<tr class="">
													<!-- <td>2</td> -->
													<td>PROGRAMAS</td>
													<td class="text-left">$ <?php echo number_format($programasEgresos['Suma'],0, ",", ".");?></td>
												</tr>
												<tr class="">
													<!-- <td>3</td> -->
													<td>PROGRAMAS FONDOS</td>
													<td class="text-left">$ <?php echo number_format($programasFondosEgresos['Suma'],0, ",", ".");?></td>
												</tr>
												<tr class="">
													<!-- <td>4</td> -->
													<td>PROYECTOS INTERNACIONALES</td>
													<td class="text-left">$ <?php echo number_format($proyectosInternacionalesEgresos['Suma'],0, ",", ".");?></td>
												</tr>
												<tr class="">
													<!-- <td>5</td> -->
													<td>GERENCIA Y ADMINISTRACIÓN DE PROYECTOS</td>
													<td class="text-left">$ <?php echo number_format($gerenciaAdministracionProyectosEgresos['Suma'],0, ",", ".");?></td>
												</tr>
												<tr class="">
													<!-- <td>6</td> -->
													<td>CONTRATOS NACIONALES</td>
													<td class="text-left">$ <?php echo number_format($contratosNacionalesEgresos['Suma'],0, ",", ".");?></td>
												</tr>
												<tr class="">
													<!-- <td>7</td> -->
													<td>PROGRAMAS RETOS</td>
													<td class="text-left">$ <?php echo number_format($programasRetosEgresos['Suma'],0, ",", ".");?></td>
												</tr>
												<tr class="">
													<!-- <td>7</td> -->
													<td>INVERSION Y EQUIPO TECNICO</td>
													<td class="text-left">$ <?php echo number_format($inversionEquiposTecnico['Suma'],0, ",", ".");?></td>
												</tr>
												<tr class="">
													<!-- <td>7</td> -->
													<td>SISTEMA INTEGRADO DE GESTIÓN</td>
													<td class="text-left">$ <?php echo number_format($sistemaIntegradoGestion['Suma'],0, ",", ".");?></td>
												</tr>
												<tr class="">
													<!-- <td>8</td> -->
													<td>
														ADMINISTRACIÓN Y SOSTENIMIENTO ASCUN BIENESTAR
													</td>
													<td class="text-left">$ <?php echo number_format($administracionSostenimientoASCUNbienestar['Suma'],0, ",", ".");?></td>
												</tr>
												<tr class="">
													<!-- <td>9</td> -->
													<td>PROGRAMAS ASCUN BIENESTAR</td>
													<td class="text-left">$ <?php echo number_format($programasASCUNbienestar['Suma'],0, ",", ".");?></td>
												</tr>
												<tr class="">
													<!-- <td>9</td> -->
													<td>DETERIORO DE CARTERA</td>
													<td class="text-left">$ <?php echo number_format($deterioroDeCartera['Suma'],0, ",", ".");?></td>
												</tr>
												<tr class="">
													<!-- <td>10</td> -->
													<td><strong>TOTAL EGRESOS OPERACIONALES</strong></td>
													<td class="text-right">
														<strong>$ <?php echo number_format($totalEgresosOperacionales,0, ",", ".");?></strong>
													</td>
												</tr>
												<tr class="table-success">
													<!-- <td>17</td> -->
													<td><strong>EXCEDENTES OPERACIONALES</strong></td>
													<td class="text-right">
														<strong>$ <?php echo number_format($extencionesOperacionales,0, ",", ".");?></strong>
													</td>
												</tr>
												<tr class="">
													<!-- <td>11</td> -->
													<td class="text-center">
														<strong>NO OPERACIONALES</strong>
													</td>
													<td></td>
												</tr>
												<tr class="">
													<!-- <td>12</td> -->
													<td>FINANCIEROS</td>
													<td>$ <?php echo number_format($financierosEgresos['Suma'],0, ",", ".");?></td>
												</tr>
												<tr class="">
													<!-- <td>13</td> -->
													<td>GASTOS EXTRAORDINARIOS</td>
													<td>$ <?php echo number_format($gastosExtraordinarios['Suma'],0, ",", ".");?></td>
												</tr>
												<tr class="">
													<!-- <td>14</td> -->
													<td>GASTOS DIVERSOS</td>
													<td>$ <?php echo number_format($gastosDiversos['Suma'],0, ",", ".");?></td>
												</tr>
												<tr class="">
													<!-- <td>16</td> -->
													<td>
														<strong>TOTAL EGRESOS NO OPERACIONALES</strong>
													</td>
													<td class="text-right">
														<strong>$ <?php echo number_format($totalEgresosNoOperacionales,0, ",", ".");?></strong>
													</td>
												</tr>
												<tr class="table-success">
													<!-- <td>17</td> -->
													<td><strong>TOTAL EGRESOS</strong></td>
													<td class="text-right">
														<strong>$ <?php echo number_format($totalEgresos,0, ",", ".");?></strong>
													</td>
												</tr>
												<tr class="table-success">
													<!-- <td>18</td> -->
													<td><strong>TOTAL EXCEDENTES</strong></td>
													<td class="text-right">
														<strong>$ <?php echo number_format($totalExcedentes,0, ",", ".");?></strong>
													</td>
													<tr class="">
													<!-- <td>19</td> -->
													<td>EXCEDENTES ASCUN BIENESTAR</td>
													<td class="text-left">$ <?php echo number_format($extencionesASCUNbienestar,0, ",", ".");?></td>
												</tr>
												<tr class="">
													<!-- <td>20</td> -->
													<td>EXCEDENTES ASCUN NACIONAL</td>
													<td class="text-left">$ <?php echo number_format($extencionesASCUNnacional,0, ",", ".");?></td>
												</tr>
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
