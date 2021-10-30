<!-- @format -->

<!-- Navbar -->
<nav
	class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top"
>
	<div class="container-fluid">
		<div class="navbar-wrapper">
			<!-- <div class="navbar-minimize">
				<button
					id="minimizeSidebar"
					class="btn btn-just-icon btn-white btn-fab btn-round"
					style="cursor: default"
				>
					<i class="material-icons text_align-center visible-on-sidebar-regular"
						>more_vert</i
					>
					<i
						class="material-icons design_bullet-list-67 visible-on-sidebar-mini"
						>view_list</i
					>
				</button>
			</div> -->
			<a class="navbar-brand" href="javascript:;" style="cursor: default">Menú principal</a>
		</div>
		<button
			class="navbar-toggler"
			type="button"
			data-toggle="collapse"
			aria-controls="navigation-index"
			aria-expanded="false"
			aria-label="Toggle navigation"
		>
			<span class="sr-only">Toggle navigation</span>
			<span class="navbar-toggler-icon icon-bar"></span>
			<span class="navbar-toggler-icon icon-bar"></span>
			<span class="navbar-toggler-icon icon-bar"></span>
		</button>
		<div class="collapse navbar-collapse justify-content-end">
			<ul class="navbar-nav">
				<!-- <li class="nav-item dropdown">
					<a
						class="nav-link"
						href="../../index.htm"
						id="navbarDropdownMenuLink"
						data-toggle="dropdown"
						aria-haspopup="true"
						aria-expanded="false"
					>
						<i class="fal fa-bell"></i>
						<span class="notification" style="animation: hc 1s infinite"
							>1</span
						>
						<p class="d-lg-none d-md-block">Notificaciones</p>
					</a>
					<div
						class="dropdown-menu dropdown-menu-right"
						aria-labelledby="navbarDropdownMenuLink"
					>
						<a class="dropdown-item" href="#">
							El archivo base se cargo de manera correcta a la DB.</a
						>
					</div>
				</li> -->
				<li class="nav-item dropdown">
					<a
						class="nav-link"
						href="javascript:;"
						id="navbarDropdownProfile"
						data-toggle="dropdown"
						aria-haspopup="true"
						aria-expanded="false"
					>
						<!-- <i class="material-icons">person</i> -->
						<i class="fal fa-user-alt"></i>
						<p class="d-lg-none d-md-block">Usuario</p>
					</a>
					<div
						class="dropdown-menu dropdown-menu-right"
						aria-labelledby="navbarDropdownProfile"
					>
						<div class="text-left">
							<small class="mt-2 ml-3 text-gray-dark"><?php echo $_SESSION["nombre"];?></small
							>
						</div>
						<div class="text-right">
							<small class="mr-3 text-gray-dark">super admin</small>
						</div>
						<div class="text-right">
							<small class="mr-3 text-gray-dark">
								<i class="fal fa-user-clock"></i> <?php echo $_SESSION["ultimo_login"];?></small>
						</div>
						<div class="dropdown-divider"></div>
						<div class="row" style="width: 100%">
							<!-- Restaurar contraseña -->
							<div class="col-md-4">
								<a
									class="navbar-brand"
									href="#"
									style="box-shadow: none; color: darkgray"
								>
									<i class="fal fa-fingerprint"></i>
								</a>
							</div>
							<!-- Bloquear sesion -->
							<div class="col-md-4">
								<a
									class="navbar-brand"
									href="bloquear"
									style="box-shadow: none; color: darkgray"
								>
									<i class="fal fa-lock-alt"></i>
								</a>
							</div>
							<!-- Cerrar sesion -->
							<div class="col-md-4">
								<a
									class="navbar-brand"
									href="salir"
									style="box-shadow: none; color: darkgray"
								>
									<i class="fal fa-times-circle"></i>
								</a>
							</div>
						</div>
					</div>
				</li>
			</ul>
		</div>
	</div>
</nav>
<!-- <script src="/extensions/sendgrid-php/sendgrid-php.php"></script> -->