<!-- Valida si hay registros en la tabla cartera-cuotas -->
<div class="col-md">	
	<!-- si hay registros en la tabla cartera-cuotas-->
	<?php
		$tabla = "carteras";
		$item  = "id";
		$respuesta = ModeloValidaciones::mdlTablaVacia($tabla, $item);
		// var_dump($respuesta);
		$totalRegistros = $respuesta['Total'];
		if ($totalRegistros != 0) {
			echo
			'
			<!-- si hay registros en la tabla cartera-->
			<div class="alert alert-info alert-with-icon" data-notify="container" id="update-yes">
				<i class="material-icons" data-notify="icon">circle_notifications</i>
				<button
					type="button"
					class="close"
					data-dismiss="alert"
					aria-label="Close"
				>
					<i class="material-icons">close</i>
				</button>
				<span data-notify="message">
					<strong>Hay carteras pendientes de años anteriores</strong> ¿Desea Actualizar la Cartera a Cuotas
					<a href="upc"><i class="fad fa-sync" style="color: #f8f9fa;"></i></a> , Agregar Cartera a Cuotas <a href="add-cartera" data-toggle="modal" data-target="#addCartera"><i class="fad fa-plus" style="color: #f8f9fa;"></i></a> o Continuar y previsualizar el informe <a href="rc"><i class="fad fa-share" style="color: #f8f9fa;"></i></a>  ?
				</span>
			</div>
			';
		}
		else {
			echo 
			'
			<!-- no hay registros en la tabla cartera-->
			<div class="alert alert-info alert-with-icon" data-notify="container" id="update-yes">
					<i class="material-icons" data-notify="icon">circle_notifications</i>
					<button
						type="button"
						class="close"
						data-dismiss="alert"
						aria-label="Close"
					>
						<i class="material-icons">close</i>
					</button>
					<span data-notify="message">
						<strong>No hay carteras pendientes de años anteriores</strong> ¿Desea Agregar Cartera a Cuotas
						<a href="add-cartera" data-toggle="modal" data-target="#addCartera"><i class="fad fa-plus" style="color: #f8f9fa;"></i></a> o Continuar y previsualizar el informe <a href="rc"><i class="fad fa-share" style="color: #f8f9fa;"></i></a>  ?
					</span>
				</div>
			';
		}
	?>
</div>
<?php include 'modal-add-cartera.php';?>