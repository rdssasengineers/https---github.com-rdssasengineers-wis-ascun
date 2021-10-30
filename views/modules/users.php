<!-- @format -->
<div class="col-md-12">
	<div class="card">
		<div class="card-header card-header-primary card-header-icon">
			<div class="card-icon">
				<a href="users-add">
					<i
						class="fal fa-user-plus"
						style="color: #f8f9fa; font-size: 1.8rem; margin: 10px 0px 0px 10px"
					></i>
				</a>
			</div>
			<h4 class="card-title">USUARIOS DEL SISTEMA <strong>WIS</strong></h4>
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
							<th>#</th>
							<th>Foto</th>
							<th>Nombre</th>
							<th>Documento</th>
							<th>Expedición</th>
							<th>Perfil</th>
							<th>Estado</th>
							<th>Último acceso</th>
							<th class="disabled-sorting text-right">Opciones</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th>#</th>
							<th>Foto</th>
							<th>Nombre</th>
							<th>Documento</th>
							<th>Expedición</th>
							<th>Perfil</th>
							<th>Estado</th>
							<th>Último acceso</th>
							<th class="text-right">Opciones</th>
						</tr>
					</tfoot>
					<tbody>
						<?php
						$item = null;
						$valor = null;
						$usuarios = UsuariosController::ctrMostrarUsuarios($item, $valor);
						foreach ($usuarios as $key => $value) {
							echo 
							'<tr>
								<td>' . ($key + 1) . '</td>
								<td>';
									if($value["foto"] != "") {
										echo '<img src="' . $value["foto"] . '" alt="..."
										class="img-fluid rounded-circle"
										style="width: 50px; height: 50px">';
									} else {
										echo '<img src="./views/assets/img/usuarios/default/anonymous.png" alt="..."
										class="img-fluid rounded-circle"
										style="width: 50px; height: 50px">';
									}
								echo 
								'</td>
								<td>' 
									. $value["nombre"] . ' '. $value["apellido"] .
								'</td>
								<td>' 
									. $value["numdoc"] . 
								'</td>
								<td>'
									. $value["expdoc"] .
								'</td>
								<td>'
									. $value["perfil"] .
								'</td>';
								if($value["estado"] != 0) {
									echo
									'
									<td>
										<div class="togglebutton">
											<label for="' . $value["id"] . '" class="btnActivar" idUsuario="' . $value["id"] . '" estadoUsuario="0">
												<input type="checkbox" id="' . $value["id"] . '" class="checkActivar" />
												<span class="toggle"></span>
											</label>
										</div>
									</td>
									';
									echo
									'
									<script>
                  	$("#"+';
										echo $value["id"];
										echo ').attr("checked", true);
                  </script>';
								} else {
									echo
									'
									<td>
										<div class="togglebutton">
											<label for="' . $value["id"] . '" class="btnActivar" idUsuario="' . $value["id"] . '" estadoUsuario="1">
												<input type="checkbox" id="' . $value["id"] . '" class="checkActivar" />
												<span class="toggle"></span>
											</label>
										</div>
									</td>
									';
									echo
									'
									<script>
                  	$("#"+';echo $value["id"];echo ').attr("checked", false);
                  </script>';
								}
								echo
								'
								<td>'
									. $value["ultimo_login"] .
								'</td>
								<td class="td-actions text-right">
									<button
										type="button"
										rel="tooltip"
										class="btn btn-warning btn-link btnEditarUsuario" idUsuario="' . $value["id"] . '"
										data-original-title=""
										title=""
									>
										<i class="material-icons">edit_note</i>
									</button>
									<button
										type="button"
										rel="tooltip"
										class="btn btn-danger btn-link btnEliminarUsuario" idUsuario="' . $value["id"] . '" fotoUsuario="' . $value["foto"] . '" numdoc="' . $value["numdoc"] . '"
										data-original-title=""
										title=""
									>
										<i class="material-icons">delete_forever</i>
									</button>
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
