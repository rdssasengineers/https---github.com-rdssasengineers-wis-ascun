<!-- Valida si hay centros de costos nulos en una cuenta transaccional -->
<div class="col-md-12">
	<?php
		$tabla = "bppcc";
		$item  = null;
		$valor = null;
		$respuesta = ModeloBPPCC::mdlTablaVacia($tabla, $item, $valor);
		// var_dump($respuesta);
		// contar registros nulos en el campo centro de costos de la tabla BPPCC
		$cont = 0;
		foreach ($respuesta as $key => $value) {
			if (($value["transaccional"] == "Sí") && ($value["codigo_centro_costo"] == "")) {
				$cont = $cont + 1;
			}
		}
		if ($cont > 0) {
			echo
			'
			<!-- hay Cuentas Contables Transaccionales sin asignacion de Centro de Costo en la tabla bppcc-->
			<div class="alert alert-danger alert-with-icon" data-notify="container" id="update-not">
				<i class="fal fa-radiation-alt" data-notify="icon"></i>
				<button
					type="button"
					class="close"
					data-dismiss="alert"
					aria-label="Close"
				>
					<i class="material-icons">close</i>
				</button>
				<span data-notify="message">
					<strong>ERROR -</strong> Por favor revisar el archivo base cargado a la <strong>base de datos WIS</strong>, existen Cuentas Contables Transaccionales sin asignacion de Centro de Costo; Para subir el archivo haga clic en el botón cargar. <a href="bppcc"><i class="fal fa-cloud-upload-alt" style="color: #f8f9fa;"></i></a>
				</span>
			</div>
			';
		}else{include 'tabla-er.php';}
	?>
</div>