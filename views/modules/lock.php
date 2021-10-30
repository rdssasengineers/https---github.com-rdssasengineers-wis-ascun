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
						<div class="card card-login" style="width: 240px; height: 266px">
							<div
								class="azul-ascun card-header card-header-primary text-center"
								style="
									box-shadow: none;
									width: 90px;
									height: 90px;
									border-radius: 50px;
									right: -60px;
								"
							>
								<h4 class="card-title" style="color: #fdfcfc; font-size: 2rem">
									<?php echo $_COOKIE['nombreAbrev'];?>
								</h4>
							</div>
							<div class="card-body">
								<p
									class="card-description text-center"
									style="color: #0a367e; font-size: 16px; margin-right: -23px"
								>
								<?php echo $_COOKIE['nombre'];?>
								</p>
								<!-- usuario -->

								<!-- Fecha de expedición -->

								<!-- Contraseña -->
								<span class="md-form-group">
									<span class="bmd-form-group"
										><div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text">
													<i
														class="fad fa-fingerprint"
														style="color: #0a367e"
													></i>
												</span>
											</div>
											<input type="hidden" name="numdoc" value="<?php echo $_COOKIE['usuario'];?>" required>
											<input type="hidden" name="expdoc" value="<?php echo $_COOKIE['expdoc'];?>" required>
											<input
												type="password"
												class="form-control activo"
												placeholder="Contraseña"
												name="password"
												required=""
											/></div
									></span>
								</span>
							</div>
							<div class="card-footer justify-content-center">
								<button
									type="submit"
									class="
										rojo-ascun
										btn btn-primary btn-sm
										float-right
										btn-round
									"
									style="
										/* background: radial-gradient(circle, rgba(49,107,178,1) 0%, rgba(10,54,126,1) 100%); */
										box-shadow: none;
										color: #fdfcfc;
										top: -23px;
									"
								>
									<i class="fal fa-unlock-alt"></i>
									<div class="ripple-container"></div>
								</button>
								<!-- <a href="javascript:;" class="btn btn-primary">Ingresar</a> -->
							</div>
						</div>
						<?php $login = new UsuariosController(); $login->ctrLogin(); ?>
					</form>
				</div>
			</div>
		</div>
		<footer class="footer">
			<div class="container-fluid">
				<div class="copyright float-right" style="color: #0a367e">
					<strong
						>&copy;
						<?php echo date("Y");?></strong
					>
					Todos los derechos reservados.
					<i class="fas fa-code"></i> Desarrollado por
					<a
						style="color: #06b2e2; font-size: 2rem"
						href="https://rdssoft.com.co/"
						target="_blank"
						rel="noopener"
					>
						<i class="icon-rds"></i
					></a>
				</div>
			</div>
		</footer>
	</div>
</div>
