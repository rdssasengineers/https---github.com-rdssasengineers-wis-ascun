<!-- @format -->

<!-- php -->
<?php
/**Cargar Select con los centros de costos a consultar */
$tabla = "centrosdecostos";
$centros_decostos = ModeloInformeRDS::mdlCargarCentrosDeCostos($tabla);
// var_dump($centros_decostos);
?>
<div class="col-12">
	<div class="card bd-callout bd-callout-info" style="width: 100%;">
		<form class="form" method="post">
			<div class="card-body text-right row">
				<div class="col-11">
					<h4 class="card-title font-weight-bold">Seleccione el centro de costos a consultar...</h4>
					<select class="centros-de-costos" name="centroDecostos" style="width:100%">
						<option></option>
						<!-- ADMINISTRACIÓN -1 -->
						<optgroup label="ADMINISTRACIÓN">
							<?php
							foreach ($centros_decostos as $key => $value) {
								if($value["id_cdc"] == 1){
									echo '<option value="'.$value['centro_decostos'].'">'.$value['centro_decostos'].' '.$value['nombre_sbcdc'].'</option>';
								}
							}
							?>
						</optgroup>
						<!-- EVENTOS, PROGRAMAS & PROYECTOS -2 -->
						<optgroup label="EVENTOS, PROGRAMAS & PROYECTOS">
							<?php
							foreach ($centros_decostos as $key => $value) {
								if($value["id_cdc"] == 2){
									echo '<option value="'.$value['centro_decostos'].'">'.$value['centro_decostos'].' '.$value['nombre_sbcdc'].'</option>';
								}
							}
							?>
						</optgroup>
						<!-- CONTRATOS Y CONVENIOS -4 -->
						<optgroup label="CONTRATOS Y CONVENIOS">
							<?php
							foreach ($centros_decostos as $key => $value) {
								if($value["id_cdc"] == 4){
									echo '<option value="'.$value['centro_decostos'].'">'.$value['centro_decostos'].' '.$value['nombre_sbcdc'].'</option>';
								}
							}
							?>
						</optgroup>
						<!-- EQUIPO TÉCNICO -13 -->
						<optgroup label="EQUIPO TÉCNICO">
							<?php
							foreach ($centros_decostos as $key => $value) {
								if($value["id_cdc"] == 13){
									echo '<option value="'.$value['centro_decostos'].'">'.$value['centro_decostos'].' '.$value['nombre_sbcdc'].'</option>';
								}
							}
							?>						
						</optgroup>
						<!-- INVERSIÓN -14 -->
						<optgroup label="INVERSIÓN">
							<?php
							foreach ($centros_decostos as $key => $value) {
								if($value["id_cdc"] == 14){
									echo '<option value="'.$value['centro_decostos'].'">'.$value['centro_decostos'].' '.$value['nombre_sbcdc'].'</option>';
								}
							}
							?>
						</optgroup>
						<!-- PROGRAMA RETOS -15 -->
						<optgroup label="PROGRAMA RETOS">
							<?php
							foreach ($centros_decostos as $key => $value) {
								if($value["id_cdc"] == 15){
									echo '<option value="'.$value['centro_decostos'].'">'.$value['centro_decostos'].' '.$value['nombre_sbcdc'].'</option>';
								}
							}
							?>
						</optgroup>
						<!-- SISTEMA DE GESTIÓN DE CALIDAD -16 -->
						<optgroup label="SISTEMA DE GESTIÓN DE CALIDAD">
							<?php
							foreach ($centros_decostos as $key => $value) {
								if($value["id_cdc"] == 16){
									echo '<option value="'.$value['centro_decostos'].'">'.$value['centro_decostos'].' '.$value['nombre_sbcdc'].'</option>';
								}
							}
							?>
						</optgroup>
						<!-- PROVISIÓN DE CONTINGENCIAS -17 -->
						<optgroup label="PROVISIÓN DE CONTINGENCIAS">
							<?php
							foreach ($centros_decostos as $key => $value) {
								if($value["id_cdc"] == 17){
									echo '<option value="'.$value['centro_decostos'].'">'.$value['centro_decostos'].' '.$value['nombre_sbcdc'].'</option>';
								}
							}
							?>
						</optgroup>
						<!-- ASCUN BIENESTAR NODO ORIENTE -40 -->
						<optgroup label="ASCUN BIENESTAR NODO ORIENTE">
							<?php
							foreach ($centros_decostos as $key => $value) {
								if($value["id_cdc"] == 40){
									echo '<option value="'.$value['centro_decostos'].'">'.$value['centro_decostos'].' '.$value['nombre_sbcdc'].'</option>';
								}
							}
							?>
						</optgroup>
						<!-- ASCUN BIENESTAR NODO BOGOTÁ -50 -->
						<optgroup label="ASCUN BIENESTAR NODO BOGOTÁ">
							<?php
							foreach ($centros_decostos as $key => $value) {
								if($value["id_cdc"] == 50){
									echo '<option value="'.$value['centro_decostos'].'">'.$value['centro_decostos'].' '.$value['nombre_sbcdc'].'</option>';
								}
							}
							?>
						</optgroup>
						<!-- ASCUN BIENESTAR NODO ANTIOQUIA -60 -->
						<optgroup label="ASCUN BIENESTAR NODO ANTIOQUIA">
							<?php
							foreach ($centros_decostos as $key => $value) {
								if($value["id_cdc"] == 60){
									echo '<option value="'.$value['centro_decostos'].'">'.$value['centro_decostos'].' '.$value['nombre_sbcdc'].'</option>';
								}
							}
							?>
						</optgroup>
						<!-- ASCUN BIENESTAR NODO CARIBE -70 -->
						<optgroup label="ASCUN BIENESTAR NODO CARIBE">
							<?php
							foreach ($centros_decostos as $key => $value) {
								if($value["id_cdc"] == 70){
									echo '<option value="'.$value['centro_decostos'].'">'.$value['centro_decostos'].' '.$value['nombre_sbcdc'].'</option>';
								}
							}
							?>
						</optgroup>
						<!-- ASCUN BIENESTAR OCCIDENTE -80 -->
						<optgroup label="ASCUN BIENESTAR OCCIDENTE">
							<?php
							foreach ($centros_decostos as $key => $value) {
								if($value["id_cdc"] == 80){
									echo '<option value="'.$value['centro_decostos'].'">'.$value['centro_decostos'].' '.$value['nombre_sbcdc'].'</option>';
								}
							}
							?>
						</optgroup>
						<!-- ASCUN BIENESTAR NODO CENTRO -90 -->
						<optgroup label="ASCUN BIENESTAR NODO CENTRO">
							<?php
							foreach ($centros_decostos as $key => $value) {
								if($value["id_cdc"] == 90){
									echo '<option value="'.$value['centro_decostos'].'">'.$value['centro_decostos'].' '.$value['nombre_sbcdc'].'</option>';
								}
							}
							?>
						</optgroup>
						<!-- CENTRO DE COSTO INDIVIDUALES -500 al 520 -->
						<optgroup label="CENTRO DE COSTO INDIVIDUALES">
							<?php
							foreach ($centros_decostos as $key => $value) {
								if($value["id_cdc"] >= 500 && $value["id_cdc"] <=520){
									echo '<option value="'.$value['centro_decostos'].'">'.$value['centro_decostos'].' '.$value['nombre_sbcdc'].'</option>';
								}
							}
							?>
						</optgroup>
						<!-- CENTRO DE COSTO RED DE EXTENCION -521 al 529 -->
						<optgroup label="CENTRO DE COSTO RED DE EXTENCION">
							<?php
							foreach ($centros_decostos as $key => $value) {
								if($value["id_cdc"] >= 521 && $value["id_cdc"] <=529){
									echo '<option value="'.$value['centro_decostos'].'">'.$value['centro_decostos'].' '.$value['nombre_sbcdc'].'</option>';
								}
							}
							?>
						</optgroup>
						<!-- CENTRO DE COSTO RED ENREDELE -531 al 539 -->
						<optgroup label="CENTRO DE COSTO RED ENREDELE">
							<?php
							foreach ($centros_decostos as $key => $value) {
								if($value["id_cdc"] >= 531 && $value["id_cdc"] <=539){
									echo '<option value="'.$value['centro_decostos'].'">'.$value['centro_decostos'].' '.$value['nombre_sbcdc'].'</option>';
								}
							}
							?>
						</optgroup>
						<!-- CENTRO DE COSTOS RED REDLESS -541 al 549 -->
						<optgroup label="CENTRO DE COSTOS RED REDLESS">
							<?php
							foreach ($centros_decostos as $key => $value) {
								if($value["id_cdc"] >= 541 && $value["id_cdc"] <=549){
									echo '<option value="'.$value['centro_decostos'].'">'.$value['centro_decostos'].' '.$value['nombre_sbcdc'].'</option>';
								}
							}
							?>
						</optgroup>
						<!-- CENTRO DE COSTO RENACE -551 al 560 menos el 552 -->
						<optgroup label="CENTRO DE COSTO RENACE">
							<?php
							foreach ($centros_decostos as $key => $value) {
								if($value["id_cdc"] == 551 || ($value["id_cdc"] >=553 && $value["id_cdc"] <=560)){
									echo '<option value="'.$value['centro_decostos'].'">'.$value['centro_decostos'].' '.$value['nombre_sbcdc'].'</option>';
								}
							}
							?>
						</optgroup>
						<!-- EGRESADOS -552 -->
						<optgroup label="EGRESADOS">
							<?php
							foreach ($centros_decostos as $key => $value) {
								if($value["id_cdc"] == 552){
									echo '<option value="'.$value['centro_decostos'].'">'.$value['centro_decostos'].' '.$value['nombre_sbcdc'].'</option>';
								}
							}
							?>
						</optgroup>
						<!-- CENTRO DE COSTOS RCI -561 al 599 -->
						<optgroup label="CENTRO DE COSTOS RCI">
							<?php
							foreach ($centros_decostos as $key => $value) {
								if($value["id_cdc"] >= 561 && $value["id_cdc"] <=599){
									echo '<option value="'.$value['centro_decostos'].'">'.$value['centro_decostos'].' '.$value['nombre_sbcdc'].'</option>';
								}
							}
							?>
						</optgroup>
						<!-- CENTRO DE COSTOS REUNE -600 al 650 -->
						<optgroup label="CENTRO DE COSTOS REUNE">
							<?php
							foreach ($centros_decostos as $key => $value) {
								if($value["id_cdc"] >= 600 && $value["id_cdc"] <=650){
									echo '<option value="'.$value['centro_decostos'].'">'.$value['centro_decostos'].' '.$value['nombre_sbcdc'].'</option>';
								}
							}
							?>
						</optgroup>
						<!-- CENTRO DE COSTOS BIENESTAR -651... -->
						<optgroup label="CENTRO DE COSTOS BIENESTAR">
							<?php
							foreach ($centros_decostos as $key => $value) {
								if($value["id_cdc"] >= 651){
									echo '<option value="'.$value['centro_decostos'].'">'.$value['centro_decostos'].' '.$value['nombre_sbcdc'].'</option>';
								}
							}
							?>
						</optgroup>
					</select>
				</div>
				<div class="col-1">
					<button type="submit" class="btn btn-social btn-link"><i class="fad fa-search" style="font-size:2rem;text-align: left !important;margin-left: -26px;margin-top: 10px;color: #316bb2 !important;"></i></button>
				</div>
			</div>
			<?php $generarInformeRedes = new InformesController(); $generarInformeRedes->ctrGenerarInformeRedes($item, $valor);
						?>
		</form>
	</div>
</div>