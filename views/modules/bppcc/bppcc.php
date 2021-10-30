<!-- @format -->

<!-- jquery-1.9.1 -->
<!-- views\modules\bppcc -->
<!-- <script src="./views/modules/bppcc/jquery-1.9.1.js"></script> -->
<script>
	var oFileIn
	//Código JQuery
	$(function () {
		oFileIn = document.getElementById('my_file_input')
		if (oFileIn.addEventListener) {
			oFileIn.addEventListener('change', filePicked, false)
		}
	})

	//Método que hace el proceso de importar excel a html
	function filePicked(oEvent) {
		// Obtener el archivo del input
		var oFile = oEvent.target.files[0]
		var sFilename = oFile.name
		// Crear un Archivo de Lectura HTML5
		var reader = new FileReader()

		// Leyendo los eventos cuando el archivo ha sido seleccionado
		reader.onload = function (e) {
			var data = e.target.result
			var cfb = XLS.CFB.read(data, {
				type: 'binary',
			})
			var wb = XLS.parse_xlscfb(cfb)
			// Iterando sobre cada sheet
			wb.SheetNames.forEach(function (sheetName) {
				// Obtener la fila actual como CSV
				var sCSV = XLS.utils.make_csv(wb.Sheets[sheetName])
				var data = XLS.utils.sheet_to_json(wb.Sheets[sheetName], {
					header: 1,
				})
				$.each(data, function (indexR, valueR) {
					var sRow = '<tr>'
					$.each(data[indexR], function (indexC, valueC) {
						sRow = sRow + '<td>' + valueC + '</td>'
					})
					sRow = sRow + '</tr>'
					$('#my_file_output').append(sRow)
				})
			})
		}

		// Llamar al JS Para empezar a leer el archivo .. Se podría retrasar esto si se desea
		reader.readAsBinaryString(oFile)
	}
</script>
<div class="row">
	<!-- selecciones el archivo base y la fecha de corte-->
	<div class="col-md-12 d-none" id="alerta">
		<div
			class="alert alert-warning alert-with-icon"
			data-notify="container"
			id="update-not"
		>
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
				<strong>ADVERTENCIA -</strong> Verifique que ha seleccionado el archivo
				base y la fecha de corte antes de cargar los datos a WIS.
			</span>
		</div>
	</div>
	<div class="col-md">
		<div class="card">
			<div class="card-header card-header-danger" style="padding: 0.3rem">
				<h4
					class="card-title text-uppercase"
					style="margin-top: 6px; margin-left: 6px"
				>
					Cargar Balance de Prueba por Centro de Costo
				</h4>
			</div>
			<div class="card-body mt-3">
				<div class="row">
					<div class="col-md-4 text-left">
						<input type="file" id="my_file_input" accept=".xls" />
					</div>
					<div class="col-md-4">
						<!-- Fecha de corte del archivo base-->
						<span class="md-form-group">
							<div class="input-group">
								<div class="input-group-prepend" style="margin-right: 10px">
									<span class="input-group-text">
										<i class="fad fa-calendar" style="color: #0a367e"></i>
									</span>
								</div>
								<input
									type="text"
									class="form-control datepicker"
									placeholder=" Fecha de corte"
									name="fecha_corte"
									id="fecha_corte"
									required
								/>
							</div>
						</span>
					</div>
					<div class="col-md-4">
						<button id="btn_lectura"  class="btn btn-just-icon btn-round btn-info">
              <i class="material-icons">cloud_upload</i>
            </button>
						<!-- <button id="btn_lectura" class="btn btn-info">Cargar</button> -->
						<a href="inicio" class="btn btn-just-icon btn-round btn-danger">
						<i class="material-icons">do_not_disturb_alt</i>
						</a>
						<p id="respuesta"></p>
						<p id="contador"></p>
					</div>
					<div class="col-md-12">
						<div class="card">
							<div class="card-header card-header-icon card-header-success">
								<div class="card-icon card-button">
									<i class="fad fa-file-excel" style="font-size: 2rem;margin: 7px 0px 0px 9px;"></i>
								</div>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table class="table" id="my_file_output">
										<tbody></tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script>
		$('#my_file_input').click(function () {
			$('#alerta').addClass('d-none')
		})
		$('#fecha_corte').click(function () {
			$('#alerta').addClass('d-none')
		})

		$('#btn_lectura').click(function () {
			console.log('fecha_corte: ' + $('#fecha_corte').val())
			if ($('#fecha_corte').val() != '' && $('#my_file_input').val() != '') {
				$('#alerta').addClass('d-none')
				$.post('./views/modules/bppcc/truncate.php', {
					fecha_corte: $('#fecha_corte').val(),
				})
				valores = new Array()
				var contador = 0
				$('#my_file_output tr').each(function () {
					var d1 = $(this).find('td').eq(0).html()
					var d2 = $(this).find('td').eq(1).html()
					var d3 = $(this).find('td').eq(2).html()
					var d4 = $(this).find('td').eq(3).html()
					var d5 = $(this).find('td').eq(4).html()
					var d6 = $(this).find('td').eq(5).html()
					var d7 = $(this).find('td').eq(6).html()
					var d8 = $(this).find('td').eq(7).html()
					var d9 = $(this).find('td').eq(8).html()
					var d10 = $(this).find('td').eq(9).html()
					valor = new Array(d1, d2, d3, d4, d5, d6, d7, d8, d9, d10)
					valores.push(valor)
					// console.log(valor)
					$.post(
						'./views/modules/bppcc/insertar.php',
						{
							d1: d1,
							d2: d2,
							d3: d3,
							d4: d4,
							d5: d5,
							d6: d6,
							d7: d7,
							d8: d8,
							d9: d9,
							d10: d10,
						},
						function (datos) {
							$('#respuesta').html(datos)
						}
					)
					contador = contador + 1;
				})
				cargaAB()
			} else {
				$('#alerta').removeClass('d-none')
				console.log(
					'Error: Verifique que ha seleccionado el archivo base y la fecha de corte para el mismo.'
				)
			}
		})
	</script>
</div>
