/** @format */

$(document).ready(function () {
	$().ready(function () {
		$sidebar = $('.sidebar')
		$sidebar_img_container = $sidebar.find('.sidebar-background')
		$full_page = $('.full-page')
		$sidebar_responsive = $('body > .navbar-collapse')
		window_width = $(window).width()
		fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html()

		if (window_width > 767 && fixed_plugin_open == 'Dashboard') {
			if ($('.fixed-plugin .dropdown').hasClass('show-dropdown')) {
				$('.fixed-plugin .dropdown').addClass('open')
			}
		}

		$('.fixed-plugin a').click(function (event) {
			// Jhey si hacemos clic en el interruptor, detiene la propagación del evento, por lo que el menú desplegable no se ocultará, de lo contrario, establecemos la sección activa
			if ($(this).hasClass('switch-trigger')) {
				if (event.stopPropagation) {
					event.stopPropagation()
				} else if (window.event) {
					window.event.cancelBubble = true
				}
			}
		})

		$('.fixed-plugin .active-color span').click(function () {
			$full_page_background = $('.full-page-background')
			$(this).siblings().removeClass('active')
			$(this).addClass('active')
			var new_color = $(this).data('color')

			if ($sidebar.length != 0) {
				$sidebar.attr('data-color', new_color)
			}

			if ($full_page.length != 0) {
				$full_page.attr('filter-color', new_color)
			}

			if ($sidebar_responsive.length != 0) {
				$sidebar_responsive.attr('data-color', new_color)
			}
		})

		$('.fixed-plugin .background-color .badge').click(function () {
			$(this).siblings().removeClass('active')
			$(this).addClass('active')
			var new_color = $(this).data('background-color')

			if ($sidebar.length != 0) {
				$sidebar.attr('data-background-color', new_color)
			}
		})

		$('.fixed-plugin .img-holder').click(function () {
			$full_page_background = $('.full-page-background')
			$(this).parent('li').siblings().removeClass('active')
			$(this).parent('li').addClass('active')
			var new_image = $(this).find('img').attr('src')

			if (
				$sidebar_img_container.length != 0 &&
				$('.switch-sidebar-image input:checked').length != 0
			) {
				$sidebar_img_container.fadeOut('fast', function () {
					$sidebar_img_container.css(
						'background-image',
						'url("' + new_image + '")'
					)
					$sidebar_img_container.fadeIn('fast')
				})
			}

			if (
				$full_page_background.length != 0 &&
				$('.switch-sidebar-image input:checked').length != 0
			) {
				var new_image_full_page = $('.fixed-plugin li.active .img-holder')
					.find('img')
					.data('src')
				$full_page_background.fadeOut('fast', function () {
					$full_page_background.css(
						'background-image',
						'url("' + new_image_full_page + '")'
					)
					$full_page_background.fadeIn('fast')
				})
			}

			if ($('.switch-sidebar-image input:checked').length == 0) {
				var new_image = $('.fixed-plugin li.active .img-holder')
					.find('img')
					.attr('src')
				var new_image_full_page = $('.fixed-plugin li.active .img-holder')
					.find('img')
					.data('src')

				$sidebar_img_container.css(
					'background-image',
					'url("' + new_image + '")'
				)
				$full_page_background.css(
					'background-image',
					'url("' + new_image_full_page + '")'
				)
			}

			if ($sidebar_responsive.length != 0) {
				$sidebar_responsive.css('background-image', 'url("' + new_image + '")')
			}
		})

		$('.switch-sidebar-image input').change(function () {
			$full_page_background = $('.full-page-background')

			$input = $(this)

			if ($input.is(':checked')) {
				if ($sidebar_img_container.length != 0) {
					$sidebar_img_container.fadeIn('fast')
					$sidebar.attr('data-image', '#')
				}

				if ($full_page_background.length != 0) {
					$full_page_background.fadeIn('fast')
					$full_page.attr('data-image', '#')
				}

				background_image = true
			} else {
				if ($sidebar_img_container.length != 0) {
					$sidebar.removeAttr('data-image')
					$sidebar_img_container.fadeOut('fast')
				}

				if ($full_page_background.length != 0) {
					$full_page.removeAttr('data-image', '#')
					$full_page_background.fadeOut('fast')
				}

				background_image = false
			}
		})

		$('.switch-sidebar-mini input').change(function () {
			$body = $('body')
			$input = $(this)

			if (md.misc.sidebar_mini_active == true) {
				$('body').removeClass('sidebar-mini')
				md.misc.sidebar_mini_active = false

				if ($('.sidebar').length != 0) {
					var ps = new PerfectScrollbar('.sidebar')
				}
				if ($('.sidebar-wrapper').length != 0) {
					var ps1 = new PerfectScrollbar('.sidebar-wrapper')
				}
				if ($('.main-panel').length != 0) {
					var ps2 = new PerfectScrollbar('.main-panel')
				}
				if ($('.main').length != 0) {
					var ps3 = new PerfectScrollbar('main')
				}
			} else {
				if ($('.sidebar').length != 0) {
					var ps = new PerfectScrollbar('.sidebar')
					ps.destroy()
				}
				if ($('.sidebar-wrapper').length != 0) {
					var ps1 = new PerfectScrollbar('.sidebar-wrapper')
					ps1.destroy()
				}
				if ($('.main-panel').length != 0) {
					var ps2 = new PerfectScrollbar('.main-panel')
					ps2.destroy()
				}
				if ($('.main').length != 0) {
					var ps3 = new PerfectScrollbar('main')
					ps3.destroy()
				}

				setTimeout(function () {
					$('body').addClass('sidebar-mini')

					md.misc.sidebar_mini_active = true
				}, 300)
			}

			// Simulamos la ventana Redimensionar para que los gráficos se actualicen en tiempo real.
			var simulateWindowResize = setInterval(function () {
				window.dispatchEvent(new Event('resize'))
			}, 180)

			// detenemos la simulación de Window Resize después de que se completan las animaciones.
			setTimeout(function () {
				clearInterval(simulateWindowResize)
			}, 1000)
		})

		/** */

		// 1.
		md.checkFullPageBackgroundImage()
		setTimeout(function () {
			// después de 1000 ms agregamos la clase animada a la tarjeta de login/bloqueo
			$('.card').removeClass('card-hidden')
		}, 1000)

		// 2.
		// Inicializar la libreria Sweet Alert
		md.showSwal()

		// 3.
		// Inicializar la libreria dataTables
		$('#datatables').DataTable({
			pagingType: 'full_numbers',
			lengthMenu: [
				[10, 25, 50, -1],
				[10, 25, 50, 'Todos'],
			],
			iDisplayLength: 10,
			responsive: true,
			language: {
				sProcessing: 'Procesando...',
				sLengthMenu: 'Mostrar _MENU_ registros.',
				sZeroRecords: 'No se encontraron resultados.',
				sEmptyTable: 'No hay datos disponibles en la tabla.',
				sInfo: 'Mostrando registros _START_ al _END_ de un total de _TOTAL_',
				sInfoEmpty: 'Mostrando 0 registros de un total de 0.',
				sInfoFiltered: '(filtrado de un total de _MAX_ registros)',
				sInfoPostFix: '',
				search: 'Buscar por:',
				searchPlaceholder: 'Nombre o Documento',
				sUrl: '',
				sInfoThousands: ',',
				sLoadingRecords: 'Cargando...',
				oPaginate: {
					sFirst: 'Primero',
					sLast: 'Último',
					sNext: 'Siguiente',
					sPrevious: 'Anterior',
				},
				oAria: {
					sSortAscending: ': Odenar de manera ascendente',
					sSortDescending: ': Odenar de manera descendente',
				},
			},
		})

		// 4.
		// Inicializar la libreria Select2
		$('.centros-de-costos').select2()

		// 5.
		//Bloquear sesion inactivar
		var timeout
		document.onmousemove = function () {
			clearTimeout(timeout)
			timeout = setTimeout(function () {
				window.location = 'bloquear'
			}, 900000)
		}
		// 6.
		// Inicializar el wizard
		demo.initMaterialWizard()
		setTimeout(function () {
			$('.card.card-wizard').addClass('active')
		}, 600)

		// 7.
		// initialise Datetimepicker and Sliders
		md.initFormExtendedDatetimepickers()
		if ($('.slider').length != 0) {
			md.initSliders()
		}

		// 8.
		// mensajes del sistema WIS
		function cargaAB() {
			let timerInterval
			Swal.fire({
				title: 'Cargando archivo base a WIS!',
				html: '<b></b>',
				timer: 5000,
				timerProgressBar: true,
				didOpen: () => {
					Swal.showLoading()
					const b = Swal.getHtmlContainer().querySelector('b')
					timerInterval = setInterval(() => {
						b.textContent = Swal.getTimerLeft()
					}, 100)
				},
				willClose: () => {
					clearInterval(timerInterval)
				},
			}).then((result) => {
				/* Read more about handling dismissals below */
				if (result.dismiss === Swal.DismissReason.timer) {
					console.log('Cargando archivo base...')
					msj()
					// window.location = 'inicio'
				}
			})
		}
		function msj() {
			Swal.fire({
				icon: 'success',
				title:
					'¡Archivo base cargado! Se subieron 1172 registros a la base de datos WIS',
				toast: true,
				position: 'top-end',
				showConfirmButton: false,
				timer: 5000,
				timerProgressBar: true,
				didOpen: (toast) => {
					toast.addEventListener('mouseenter', Swal.stopTimer)
					toast.addEventListener('mouseleave', Swal.resumeTimer)
				},
			})
		}
		function guardadoExitos() {
			Swal.fire({
				icon: 'success',
				title: '¡Todos los datos se guardaron de manera exitosa.',
				toast: true,
				position: 'center',
				showConfirmButton: false,
				timer: 10000,
				timerProgressBar: true,
				didOpen: (toast) => {
					toast.addEventListener('mouseenter', Swal.stopTimer)
					toast.addEventListener('mouseleave', Swal.resumeTimer)
				},
			})
		}
		function error() {
			Swal.fire({
				icon: 'danger',
				title:
					'¡Ooooups! Parece que algo salio mal; no se gusradaron los datos',
				toast: true,
				position: 'center',
				showConfirmButton: false,
				timer: 10000,
				timerProgressBar: true,
				didOpen: (toast) => {
					toast.addEventListener('mouseenter', Swal.stopTimer)
					toast.addEventListener('mouseleave', Swal.resumeTimer)
				},
			})
		}

		//9.
		// Input solo números
		$('.input-number').on('input', function () {
			this.value = this.value.replace(/[^0-9]/g, '')
		})
	})
})
