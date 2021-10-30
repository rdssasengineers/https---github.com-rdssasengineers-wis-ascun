<!-- Valida si hay registros en la bppcc -->
<div class="col-md">	
	<!-- si hay registros en la tabla bppcc-->
	<?php
		$tabla = "bppcc";
		$item  = null;
		$valor = null;
		$respuesta = ModeloValidaciones::mdlTablaVacia($tabla, $item, $valor);
		// var_dump($respuesta);
		// contar registros nulos en el campo centro de costos de la tabla BPPCC
		$cont = 0;
		foreach ($respuesta as $key => $value) {
			if (($value["transaccional"] == "Sí") && ($value["codigo_centro_costo"] == "")) {
				$cont = $cont + 1;
			}
		}
		$totalRegistros = count($respuesta);
		if ($totalRegistros != 0) {
			// consultar fecha_upload
			$tabla = "logs";
			$item  = "id";
			$valor = 1;
			$fecha_upload = ModeloValidaciones::mdlFecha_upload($tabla, $item, $valor);
			foreach ($fecha_upload as $key => $value) {
				echo 
				'
				<!-- si hay registros en la tabla bppcc-->
				<div class="alert alert-info alert-with-icon" data-notify="container" id="update-yes">
				<a href="bppcc"><i class="material-icons" data-notify="icon">cloud_upload</i></a>
					<button
						type="button"
						class="close"
						data-dismiss="alert"
						aria-label="Close"
					>
						<i class="material-icons">close</i>
					</button>
					<span data-notify="message">
						El <strong>Balance de Prueba por Centro de Costo</strong> se cargó por ultima ves a la <strong>base de datos WIS</strong> el día: <i class="fal fa-calendar-day" style="color: #f8f9fa;"></i> '.$value["fecha_upload"].'
					</span>
				</div>
				';
			}
		}
		else {
			echo 
			'
			<!-- no hay registros en la tabla bppcc-->
			<div class="alert alert-warning alert-with-icon" data-notify="container" id="update-not">
				<i class="material-icons" data-notify="icon">notification_important</i>
				<button
					type="button"
					class="close"
					data-dismiss="alert"
					aria-label="Close"
				>
					<i class="material-icons">close</i>
				</button>
				<span data-notify="message">
					<strong>ADVERTENCIA -</strong> El Balance de Prueba por Centro de Costo no ha sido cargado a la <strong>base de datos WIS</strong>, este archivo es requerido para generar los informes contables; Para subir el archivo haga clic en el botón cargar. <a href="bppcc"><i class="fal fa-cloud-upload-alt" style="color: #f8f9fa;"></i></a>
				</span>
			</div>
			';
		}
		if ($cont > 0) {
			echo
			'
			<!-- hay Cuentas Contables Transaccionales sin asignación de Centro de Costo en la tabla bppcc-->
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
					<strong>ERROR -</strong> Existen ('.$cont.') Cuentas Contables Transaccionales sin asignación de Centro de Costo, corrija el archivo base y cárguelo nuevamente; Para subir el archivo haga clic en el botón cargar. <a href="bppcc"><i class="fal fa-cloud-upload-alt" style="color: #f8f9fa;"></i></a>
				</span>
			</div>
			';
		}
		else {
			switch ($_GET["ruta"]) {
				case "er":
					include 'tabla-er.php';
					break;
				case "sf":
					include 'tabla-sf.php';
					break;
				case "rc":
					include 'tabla-rc.php';
					break;
					case "rds":
						include 'tabla-rds.php';
					break;
			}
		}
	?>
</div>