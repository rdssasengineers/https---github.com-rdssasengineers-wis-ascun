<!-- @format -->
<div class="col-md-12">
	<div class="card">
		<div class="card-header card-header-primary card-header-icon">
			<div class="card-icon">
				<a href="vcc">
					<i class="material-icons" style="color: #f8f9fa;font-size: 2rem;margin: 10px 0px 0px 10px;">account_balance_wallet</i>
				</a>
			</div>
			<h4 class="card-title">CARTERA CUOTAS</h4>
		</div>
		<div class="card-body">
			<div class="toolbar">
				<!--        Here you can write extra buttons/actions for the toolbar              -->
			</div>
			<div class="material-datatables">
				<table
					id="datatables"
					class="table table-striped table-no-bordered table-hover tablas"
					cellspacing="0"
					width="100%"
					style="width: 100%"
				>
					<thead>
						<tr>
							<th>Id</th>
							<th>Año</th>
							<th>Descripción Cartera</th>
							<th>Valor Cartera</th>
							<th class="disabled-sorting text-right">Opciones</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th>Id</th>
							<th>Año</th>
							<th>Descripción Cartera</th>
							<th>Valor Cartera</th>
							<th class="text-right">Opciones</th>
						</tr>
					</tfoot>
					<tbody>
					<?php
						$item  = null;
						$valor = null;
						$carteras = CarteasController::ctrVerCarteras($item, $valor);
						
						foreach ($carteras as $key => $value) {
							// var_dump($value['id']);
							echo
							'
							<tr>
								<td>'.($key + 1).'</td>
								<td>'.$value["anio"].'</td>
								<td>'.$value["descripcion"].'</td>
								<td>$ '.number_format($value["valor"],0, ",", ".").'</td>
								<td class="text-right">
									<button class="btn btn-link btn-warning btn-just-icon btnEditarCartera" idCartera="'.$value["id"].'"data-toggle="modal" data-target="#updateCartera"
										><i class="material-icons">edit_note</i></button>
								</td>
							</tr>
							';
						}
					?>
						
					</tbody>
				</table>
			</div>
		</div>
		<!-- end content-->
	</div>
	<!--  end card  -->
</div>
<?php include 'modal-update-cartera.php';?>