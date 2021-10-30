<!-- @format -->

<!-- Navbar -->
<nav
	class="
		navbar navbar-expand-lg navbar-transparent navbar-absolute
		fixed-top
		text-white
	"
>
	<!-- <div class="container">
		<div class="navbar-wrapper">
			<a class="navbar-brand" href="javascript:;">WIS Web Information System</a>
		</div>
	</div> -->
</nav>
<!-- End Navbar -->
<div class="wrapper wrapper-full-page">
	<div
		class="page-header login-page header-filter"
		filter-color="black"
		style="
			background-image: url('./views/assets/img/login.png');
			background-size: cover;
			background-position: top center;
		"
	>
		<!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
		<div class="container">
			<div class="row">
			<div class="col-6 col-lg-4 col-md-6 col-sm-8 ml-auto mr-auto"></div>
				<div class="col-6 col-lg-4 col-md-6 col-sm-8 ml-auto mr-auto">
					<form class="form" method="post">
						<div class="card card-login card-hidden">
							<div class="card-header card-header-primary text-center rojo-ascun" style="box-shadow: none;">
								<h4 class="card-title" style="color:#FDFCFC"></i>Ingreso al Sistema</h4>
							</div>
							<div class="card-body">
								<p class="card-description text-center" style="color:#0A367E;font-size: 16px;">
									Datos de autenticación
								</p>
								<!-- usuario -->
								<span class="md-form-group">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">
												<i class="fad fa-address-card" style="color:#0A367E"></i>
											</span>
										</div>
										<input
											type="text"
											class="form-control activo input-number"
											placeholder="Documento"
											name="numdoc"
											required
										/>
									</div>
								</span>
								<!-- Fecha de expedición -->
								<span class="md-form-group">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">
												<i class="fad fa-calendar" style="color:#0A367E"></i>
											</span>
										</div>
										<input
											type="text"
											class="form-control datepicker"
											placeholder="Fecha de expedición"
											name="expdoc"
											required
										/>
									</div>
								</span>
								<!-- Contraseña -->
								<span class="md-form-group">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">
												<i class="fad fa-fingerprint" style="color:#0A367E"></i>
											</span>
										</div>
										<input
											type="password"
											class="form-control activo"
											placeholder="Contraseña"
											name="password"
											required
										/>
									</div>
								</span>
							</div>
							<div class="card-footer justify-content-center">
							<button type="submit" class="btn btn-primary btn-sm btn-round float-right azul-ascun" style="box-shadow:none; color:#FDFCFC"><i class="fad fa-fingerprint"></i> Ingresar</button>
							</div>
						</div>
						<?php $login = new UsuariosController(); $login->ctrLogin(); ?>
					</form>
				</div>
			</div>
		</div>
		<footer class="footer">
	<div class="container-fluid">
		<div class="copyright float-right" style="color: #0A367E">
		<strong>&copy; <?php echo date("Y");?></strong>
    Todos los derechos reservados. <i class="fas fa-code"></i> Desarrollado por
                <a style="color: #06b2e2
; font-size: 2rem;" href="https://rdssoft.com.co/" target="_blank" rel="noopener"> <i class=" icon-rds"></i></a>
		</div>
	</div>
</footer>
	</div>
</div>
