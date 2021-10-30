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
$valor = 'sí';

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

?>
<div class="col-md-12">
	<div class="card card-plain" style="margin-top: 60px;">
		<div class="card-header card-header-icon card-header-success">
			<div class="card-icon card-button">
			<a href="./views/modules/informes/esf.php" target="_blank"
					><i class="fad fa-file-spreadsheet" style="color: #f8f9fa;font-size: 2rem;margin: 10px 0px 0px 10px;"></i>
				</a>
			</div>
			<h4 class="card-title mt-0"> RESUMEN CARTERA</h4>
			<p class="card-category"> Con corte a <?php echo $fecha_corte?></p>
		</div>
		<div class="card-body">
			<div class="table-responsive">
			<!-- CARTERA NODOS RED DE BIENETAR UNIVERSITARIO -->
				<table class="table">
					<tbody>
						<tr class="table-info text-center">
							<td class="font-weight-bold">
								CARTERA NODOS RED DE BIENETAR UNIVERSITARIO
							</td>
						</tr>
					</tbody>
				</table>
				<table class="table">
					<thead class="text-center font-weight-bold" >
						<th class="font-weight-bold">
							REGIONAL
						</th>
						<th class="font-weight-bold">
							CARTERA TOTAL
						</th>
						<th class="font-weight-bold">
							CARTERA PROGRAMAS
						</th>
						<th class="font-weight-bold">
							CARTERA APORTE ADMINISTRATIVO
						</th>
					</thead>
					<tbody>
						<!-- ANTIOQUIA -->
						<tr class="text-center">
							<td class="text-justify">
								ANTIOQUIA
							</td>
							<?php
							if ($carteraTotalAntioquia != 0) {
								echo'<td> $ '.number_format($carteraTotalAntioquia,0, ",", ".").'</td>';
							}
							else {echo'<td> $ -</td>';}
							?>
							<?php
							if ($carteraProgramasAntioquia['Suma'] != 0) {
								echo'<td> $ '.number_format($carteraProgramasAntioquia['Suma'],0, ",", ".").'</td>';
							}
							else {echo'<td> $ -</td>';}
							?>
							<?php
							if ($carteraAporteAdministrativoAntioquia['Suma'] != 0) {
								echo'<td> $ '.number_format($carteraAporteAdministrativoAntioquia['Suma'],0, ",", ".").'</td>';
							}
							else {echo'<td> $ -</td>';}
							?>
						</tr>
						<!-- BOGOTA -->
						<tr class="text-center">
							<td class="text-justify">
								BOGOTA
							</td>
							<?php
							if ($carteraTotalBogota != 0) {
								echo'<td> $ '.number_format($carteraTotalBogota,0, ",", ".").'</td>';
							}
							else {echo'<td> $ -</td>';}
							?>
							<?php
							if ($carteraProgramasBogota['Suma'] != 0) {
								echo'<td> $ '.number_format($carteraProgramasBogota['Suma'],0, ",", ".").'</td>';
							}
							else {echo'<td> $ -</td>';}
							?>
							<?php
							if ($carteraAporteAdministrativoBogota['Suma'] != 0) {
								echo'<td> $ '.number_format($carteraAporteAdministrativoBogota['Suma'],0, ",", ".").'</td>';
							}
							else {echo'<td> $ -</td>';}
							?>
						</tr>
						<!-- CENTRO  -->
						<tr class="text-center">
							<td class="text-justify">
								CENTRO
							</td>
							<?php
							if ($carteraTotalCentro != 0) {
								echo'<td> $ '.number_format($carteraTotalCentro,0, ",", ".").'</td>';
							}
							else {echo'<td> $ -</td>';}
							?>
							<?php
							if ($carteraProgramasCentro['Suma'] != 0) {
								echo'<td> $ '.number_format($carteraProgramasCentro['Suma'],0, ",", ".").'</td>';
							}
							else {echo'<td> $ -</td>';}
							?>
							<?php
							if ($carteraAporteAdministrativoCentro['Suma'] != 0) {
								echo'<td> $ '.number_format($carteraAporteAdministrativoCentro['Suma'],0, ",", ".").'</td>';
							}
							else {echo'<td> $ -</td>';}
							?>
						</tr>
						<!-- SUROCCIDENTE  -->
						<tr class="text-center">
							<td class="text-justify">
								SUROCCIDENTE
							</td>
							<?php
							if ($carteraTotalSuroccidente != 0) {
								echo'<td> $ '.number_format($carteraTotalSuroccidente,0, ",", ".").'</td>';
							}
							else {echo'<td> $ -</td>';}
							?>
							<?php
							if ($carteraProgramasSuroccidente['Suma'] != 0) {
								echo'<td> $ '.number_format($carteraProgramasSuroccidente['Suma'],0, ",", ".").'</td>';
							}
							else {echo'<td> $ -</td>';}
							?>
							<?php
							if ($carteraAporteAdministrativoSuroccidente['Suma'] != 0) {
								echo'<td> $ '.number_format($carteraAporteAdministrativoSuroccidente['Suma'],0, ",", ".").'</td>';
							}
							else {echo'<td> $ -</td>';}
							?>
						</tr>
						<!-- ORIENTE  -->
						<tr class="text-center">
							<td class="text-justify">
								ORIENTE
							</td>
							<?php
							if ($carteraTotalOriente != 0) {
								echo'<td> $ '.number_format($carteraTotalOriente,0, ",", ".").'</td>';
							}
							else {echo'<td> $ -</td>';}
							?>
							<?php
							if ($carteraProgramasOriente['Suma'] != 0) {
								echo'<td> $ '.number_format($carteraProgramasOriente['Suma'],0, ",", ".").'</td>';
							}
							else {echo'<td> $ -</td>';}
							?>
							<?php
							if ($carteraAporteAdministrativoOriente['Suma'] != 0) {
								echo'<td> $ '.number_format($carteraAporteAdministrativoOriente['Suma'],0, ",", ".").'</td>';
							}
							else {echo'<td> $ -</td>';}
							?>
						</tr>
						<!-- COSTA   -->
						<tr class="text-center">
							<td class="text-justify">
								COSTA
							</td>
							<?php
							if ($carteraTotalCosta != 0) {
								echo'<td> $ '.number_format($carteraTotalCosta,0, ",", ".").'</td>';
							}
							else {echo'<td> $ -</td>';}
							?>
							<?php
							if ($carteraProgramasCosta['Suma'] != 0) {
								echo'<td> $ '.number_format($carteraProgramasCosta['Suma'],0, ",", ".").'</td>';
							}
							else {echo'<td> $ -</td>';}
							?>
							<?php
							if ($carteraAporteAdministrativoCosta['Suma'] != 0) {
								echo'<td> $ '.number_format($carteraAporteAdministrativoCosta['Suma'],0, ",", ".").'</td>';
							}
							else {echo'<td> $ -</td>';}
							?>
						</tr>
						<!-- TOTALES   -->
						<tr class="text-center">
							<td class="font-weight-bold">
								TOTALES
							</td>
							<?php
							if ($carteraTotal != 0) {
								echo'<td class="font-weight-bold"> $ '.number_format($carteraTotal,0, ",", ".").'</td>';
							}
							else {echo'<td class="font-weight-bold"> $ -</td>';}
							?>
							<?php
							if ($carteraProgramas != 0) {
								echo'<td class="font-weight-bold"> $ '.number_format($carteraProgramas,0, ",", ".").'</td>';
							}
							else {echo'<td class="font-weight-bold"> $ -</td>';}
							?>
							<?php
							if ($carteraAporteAdministrativo != 0) {
								echo'<td class="font-weight-bold"> $ '.number_format($carteraAporteAdministrativo,0, ",", ".").'</td>';
							}
							else {echo'<td class="font-weight-bold"> $ -</td>';}
							?>
						</tr>
					</tbody>
				</table>
				<!-- CARTERA ASCUN NACIONAL -->
				<table class="table">
					<tbody>
						<tr class="table-info text-center">
							<td class="font-weight-bold">
								CARTERA ASCUN NACIONAL
							</td>
						</tr>
					</tbody>
				</table>
				<!-- CARTERA CUOTAS -->
				<div class="row">
					<div class="col-md-6">
						<table class="table tablas">
							<thead>
								<th class="font-weight-bold text-right">
									CARTERA CUOTAS
								</th>
								<th></th>
								<th class="text-left">
									<a class="btn btn-link btn-success btn-just-icon" data-toggle="modal" data-target="#addCartera">
										<i class="fal fa-plus-circle"></i>
									</a>
								</th>
							</thead>
							<tbody>
								<?php
								$item  = null;
								$valor = null;
								$carteras = CarteasController::ctrVerCarteras($item, $valor);
								$suma = 0;
								foreach ($carteras as $key => $value) {
									if($value['valor']!= 0) {
										echo
										'
										<tr>
											<td>
												'.$value["descripcion"].' '.$value["anio"].'
											</td>
											<td>
												$ '.number_format($value["valor"],0, ",", ".").'
											</td>
											<td class="text-left">
									<a class="btn btn-link btn-warning btn-just-icon btnEditarCartera" idCartera="'.$value["id"].'"data-toggle="modal" data-target="#updateCartera"
										><i class="material-icons">edit_note</i>
										</a>
										<a class="btn btn-link btn-danger btn-just-icon btnEliminarCartera" idCartera="'.$value["id"].'"
										><i class="material-icons">delete_forever</i></a>
								</td>
										</tr>
										';
										$suma = $suma + $value["valor"];
									}
								}
								?>
								<!-- TOTAL CUOTAS ASCUN NAL  -->
								<tr>
									<td class="font-weight-bold text-right">
										TOTAL CUOTAS ASCUN NAL
									</td>
									<td class="font-weight-bold">
										$ <?php echo number_format($suma,0, ",", ".")?>
									</td>
									<td></td>
								</tr>
								<!-- CARTERA FONDOS  -->
								<tr>
									<td class="font-weight-bold text-right">
										CARTERA FONDOS
									</td>
									<td class="font-weight-bold">
										$ <?php echo number_format($carteraFondos['Suma'],0, ",", ".")?>
									</td>
									<td></td>
								</tr>
							</tbody>
						</table>
					</div>
					<!-- PROGRAMAS Y PROYECTOS -->
					<div class="col-md-6">
						<table class="table">
							<thead>
								<th class="font-weight-bold text-right">
									PROGRAMAS Y PROYECTOS
								</th>
								<th></th>
							</thead>
							<tbody>
								<!-- PROGRAMA RETOS -->
								<tr>
									<td>
										PROGRAMA RETOS
									</td>
									<?php
									if ($programasRetos['Suma'] != 0) {
										echo'<td> $ '.number_format($programasRetos['Suma'],0, ",", ".").'</td>';
									}
									else {echo'<td> $ -</td>';}
									?>
								</tr>
								<!-- EVENTOS ASCUN -->
								<tr>
									<td>
										EVENTOS ASCUN
									</td>
									<?php
									if ($eventosSACUN['Suma'] != 0) {
										echo'<td> $ '.number_format($eventosSACUN['Suma'],0, ",", ".").'</td>';
									}
									else {echo'<td> $ -</td>';}
									?>
								</tr>
								<!--  ADMINISTRATIVO  -->
								<tr>
									<td>
										ADMINISTRATIVO
									</td>
									<?php
									if ($administrativo['Suma'] != 0) {
										echo'<td> $ '.number_format($administrativo['Suma'],0, ",", ".").'</td>';
									}
									else {echo'<td> $ -</td>';}
									?>
								</tr>
								<!-- PLENO  -->
								<tr>
									<td>
										PLENO
									</td>
									<?php
									if ($pleno['Suma'] != 0) {
										echo'<td> $ '.number_format($pleno['Suma'],0, ",", ".").'</td>';
									}
									else {echo'<td> $ -</td>';}
									?>
								</tr>
								<!-- CARTERA PROGRAMAS -->
								<tr>
									<td class="font-weight-bold text-right">
										CARTERA PROGRAMAS
									</td>
									<?php
									if ($carteraProgramas != 0) {
										echo'<td class="font-weight-bold"> $ '.number_format($carteraProgramas,0, ",", ".").'</td>';
									}
									else {echo'<td class="font-weight-bold"> $ -</td>';}
									?>
								</tr>
								<!-- PROYECTOS -->
								<tr>
									<td class="font-weight-bold text-right">
										PROYECTOS
									</td>
									<?php
									if ($proyectos['Suma'] != 0) {
										echo'<td class="font-weight-bold"> $ '.number_format($proyectos['Suma'],0, ",", ".").'</td>';
									}
									else {echo'<td class="font-weight-bold"> $ -</td>';}
									?>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				<!-- CARTERA EN RIESGO MAYOR A UN AÑO -->
				<table class="table">
					<tbody>
						<tr class="table-info text-center">
							<td class="font-weight-bold">
								CARTERA EN RIESGO MAYOR A UN AÑO
							</td>
						</tr>
					</tbody>
				</table>
				<div class="row">
					<div class="col-md-6">
						<table class="table">
							<thead>
								<th class="font-weight-bold">
									REGIONAL
								</th>
								<th class="font-weight-bold">
									CARTERA TOTAL
								</th>
							</thead>
							<tbody>
								<!-- ANTIOQUIA -->
								<tr>
									<td>
										ANTIOQUIA
									</td>
									<?php
							if ($CRR_carteraTotalAntioquia != 0) {
								echo'<td> $ '.number_format($CRR_carteraTotalAntioquia,0, ",", ".").'</td>';
							}
							else {echo'<td> $ -</td>';}
							?>
								</tr>
								<!-- BOGOTA -->
								<tr>
									<td>
										BOGOTA
									</td>
									<?php
							if ($CRR_carteraTotalBogota != 0) {
								echo'<td> $ '.number_format($CRR_carteraTotalBogota,0, ",", ".").'</td>';
							}
							else {echo'<td> $ -</td>';}
							?>
								</tr>
								<!--  CENTRO  -->
								<tr>
									<td>
										CENTRO
									</td>
									<?php
							if ($CRR_carteraTotalCentro != 0) {
								echo'<td> $ '.number_format($CRR_carteraTotalCentro,0, ",", ".").'</td>';
							}
							else {echo'<td> $ -</td>';}
							?>
								</tr>
								<!-- SUROCCIDENTE  -->
								<tr>
									<td>
										SUROCCIDENTE
									</td>
									<?php
							if ($CRR_carteraTotalSuroccidente != 0) {
								echo'<td> $ '.number_format($CRR_carteraTotalSuroccidente,0, ",", ".").'</td>';
							}
							else {echo'<td> $ -</td>';}
							?>
								</tr>
								<!-- ORIENTE  -->
								<tr>
									<td>
										ORIENTE
									</td>
									<?php
							if ($CRR_carteraTotalOriente != 0) {
								echo'<td> $ '.number_format($CRR_carteraTotalOriente,0, ",", ".").'</td>';
							}
							else {echo'<td> $ -</td>';}
							?>
								</tr>
								<!-- COSTA  -->
								<tr>
									<td>
										COSTA
									</td>
									<?php
							if ($CRR_carteraTotalCosta != 0) {
								echo'<td> $ '.number_format($CRR_carteraTotalCosta,0, ",", ".").'</td>';
							}
							else {echo'<td> $ -</td>';}
							?>
								</tr>
								<!-- FONDOS  -->
								<tr>
									<td class="font-weight-bold text-right">
										FONDOS
									</td>
									<?php
										if ($CRR_carteraTotalFondos != 0) {
											echo'<td class="font-weight-bold"> $ '.number_format($CRR_carteraTotalFondos,0, ",", ".").'</td>';
										}
										else {echo'<td class="font-weight-bold"> $ -</td>';}
									?>
								</tr>
								<!-- ASCUN NACIONAL  -->
								<tr>
									<td class="font-weight-bold text-right">
										ASCUN NACIONAL
									</td>
									<?php
										if ($CRR_carteraTotalASCUNNACINAL != 0) {
											echo'<td class="font-weight-bold"> $ '.number_format($CRR_carteraTotalASCUNNACINAL,0, ",", ".").'</td>';
										}
										else {echo'<td class="font-weight-bold"> $ -</td>';}
									?>
								</tr>
								<!-- CARTERA EN RIESTO MAYOR A 1 AÑO  -->
								<tr>
									<td class="font-weight-bold text-right">
										CARTERA EN RIESTO MAYOR A 1 AÑO
									</td>
									<?php
										if ($CRR_carteraTotal != 0) {
											echo'<td class="font-weight-bold"> $ '.number_format($CRR_carteraTotal,0, ",", ".").'</td>';
										}
										else {echo'<td class="font-weight-bold"> $ -</td>';}
									?>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="col-md-6">
						<table class="table">
							<thead>
								<th class="font-weight-bold">
									CARTERA PROGRAMAS
								</th>
								<th class="font-weight-bold">
									CARTERA CUOTAS
								</th>
							</thead>
							<tbody>
								<tr>
								<?php
							if ($CRR_CarteraProgramasAntioquia['Suma'] != 0) {
								echo'<td> $ '.number_format($CRR_CarteraProgramasAntioquia['Suma'],0, ",", ".").'</td>';
							}
							else {echo'<td> $ -</td>';}
							?>
									<?php
							if ($carteraCuotasAntioquia['Suma'] != 0) {
								echo'<td> $ '.number_format($carteraCuotasAntioquia['Suma'],0, ",", ".").'</td>';
							}
							else {echo'<td> $ -</td>';}
							?>
								</tr>
								<tr>
								<?php
							if ($CRR_CarteraProgramasBogota['Suma'] != 0) {
								echo'<td> $ '.number_format($CRR_CarteraProgramasBogota['Suma'],0, ",", ".").'</td>';
							}
							else {echo'<td> $ -</td>';}
							?>
									<?php
							if ($carteraCuotasBogota['Suma'] != 0) {
								echo'<td> $ '.number_format($carteraCuotasBogota['Suma'],0, ",", ".").'</td>';
							}
							else {echo'<td> $ -</td>';}
							?>
								</tr>
								<tr>
									<?php
							if ($CRR_CarteraProgramasCentro['Suma'] != 0) {
								echo'<td> $ '.number_format($CRR_CarteraProgramasCentro['Suma'],0, ",", ".").'</td>';
							}
							else {echo'<td> $ -</td>';}
							?>
									<?php
							if ($carteraCuotasCentro['Suma'] != 0) {
								echo'<td> $ '.number_format($carteraCuotasCentro['Suma'],0, ",", ".").'</td>';
							}
							else {echo'<td> $ -</td>';}
							?>
								</tr>
								<tr>
									<?php
							if ($CRR_CarteraProgramasSuroccidente['Suma'] != 0) {
								echo'<td> $ '.number_format($CRR_CarteraProgramasSuroccidente['Suma'],0, ",", ".").'</td>';
							}
							else {echo'<td> $ -</td>';}
							?>
									<?php
							if ($carteraCuotasSuroccidente['Suma'] != 0) {
								echo'<td> $ '.number_format($carteraCuotasSuroccidente['Suma'],0, ",", ".").'</td>';
							}
							else {echo'<td> $ -</td>';}
							?>
								</tr>
								<tr>
									<?php
							if ($CRR_CarteraProgramasOriente['Suma'] != 0) {
								echo'<td> $ '.number_format($CRR_CarteraProgramasOriente['Suma'],0, ",", ".").'</td>';
							}
							else {echo'<td> $ -</td>';}
							?>
									<?php
							if ($carteraCuotasOriente['Suma'] != 0) {
								echo'<td> $ '.number_format($carteraCuotasOriente['Suma'],0, ",", ".").'</td>';
							}
							else {echo'<td> $ -</td>';}
							?>
								</tr>
								<tr>
									<?php
							if ($CRR_CarteraProgramasCosta['Suma'] != 0) {
								echo'<td> $ '.number_format($CRR_CarteraProgramasCosta['Suma'],0, ",", ".").'</td>';
							}
							else {echo'<td> $ -</td>';}
							?>
									<?php
							if ($carteraCuotasCosta['Suma'] != 0) {
								echo'<td> $ '.number_format($carteraCuotasCosta['Suma'],0, ",", ".").'</td>';
							}
							else {echo'<td> $ -</td>';}
							?>
								</tr>
								<tr>
								<?php
							if ($CRR_CarteraProgramasFondos['Suma'] != 0) {
								echo'<td> $ '.number_format($CRR_CarteraProgramasFondos['Suma'],0, ",", ".").'</td>';
							}
							else {echo'<td> $ -</td>';}
							?>
									<?php
							if ($carteraCuotasFondos != 0) {
								echo'<td> $ '.number_format($carteraCuotasFondos,0, ",", ".").'</td>';
							}
							else {echo'<td> $ -</td>';}
							?>
								</tr>
								<tr>
								<?php
							if ($CRR_CarteraProgramasASCUNNACINAL['Suma'] != 0) {
								echo'<td> $ '.number_format($CRR_CarteraProgramasASCUNNACINAL['Suma'],0, ",", ".").'</td>';
							}
							else {echo'<td> $ -</td>';}
							?>
									<?php
							if ($carteraCuotasASCUNNACINAL['Suma'] != 0) {
								echo'<td> $ '.number_format($carteraCuotasASCUNNACINAL['Suma'],0, ",", ".").'</td>';
							}
							else {echo'<td> $ -</td>';}
							?>
								</tr>
								<?php
							if ($CRR_CarteraProgramas != 0) {
								echo'<td class="font-weight-bold"> $ '.number_format($CRR_CarteraProgramas,0, ",", ".").'</td>';
							}
							else {echo'<td class="font-weight-bold"> $ -</td>';}
							?>
									<?php
							if ($carteraCuotas != 0) {
								echo'<td class="font-weight-bold"> $ '.number_format($carteraCuotas,0, ",", ".").'</td>';
							}
							else {echo'<td class="font-weight-bold"> $ -</td>';}
							?>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php 
include 'modal-add-cartera.php';
include 'modal-update-cartera.php';
?>