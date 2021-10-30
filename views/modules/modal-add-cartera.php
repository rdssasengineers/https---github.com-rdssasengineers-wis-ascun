<!-- @format -->

<div class="modal" id="addCartera" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">CARTERA CUOTAS</h5>
				<button
					type="button"
					class="close"
					data-dismiss="modal"
					aria-label="Close"
				>
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form class="form" method="post">
					<p class="description text-center">
						Agregar cartera de años anterires
					</p>
					<div class="card-body">
						<!-- Año cartera -->
						<div class="form-group bmd-form-group">
							<div class="input-group">
								<div class="input-group-prepend">
									<div class="input-group-text">
										<i class="material-icons">calendar_today</i>
									</div>
								</div>
								<input
									type="text"
									class="form-control datepicker-cartera"
									placeholder="Año..."
									name="anio"
									required
								/>
							</div>
						</div>
						<!-- Descripción de la cartera -->
						<div class="form-group bmd-form-group">
							<div class="input-group">
								<div class="input-group-prepend">
									<div class="input-group-text">
										<i class="material-icons">edit_note</i>
									</div>
								</div>
								<input
									type="text"
									class="form-control"
									placeholder="Descripción..."
									name="descripcion"
									required
								/>
							</div>
						</div>
						<!-- Valor de la cartera -->
						<div class="form-group bmd-form-group">
							<div class="input-group">
								<div class="input-group-prepend">
									<div class="input-group-text">
										<i class="material-icons">account_balance_wallet</i>
									</div>
								</div>
								<input
									type="text"
									class="form-control"
									placeholder="Valor cartera..."
									name="valorCartera"
									required
								/>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-primary">Guardar</button>
						<button
							type="button"
							class="btn btn-secondary"
							data-dismiss="modal"
						>
							Cancelar
						</button>
					</div>
					<?php $addCartera = new CarteasController(); $addCartera->ctrAddCartera();
					?>
				</form>
			</div>
		</div>
	</div>
</div>
