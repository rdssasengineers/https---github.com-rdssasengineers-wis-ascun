/** @format */
/**Editar Carteras de años anteriores */
$(document).ready(function () {
	$('.tablas').on('click', '.btnEditarCartera', function () {
		var idCartera = $(this).attr('idCartera')
		var datos = { idCartera: idCartera }
		$.ajax({
			url: 'ajax/carteras.ajax.php',
			type: 'POST',
			async: true,
			data: datos,
			success: function (respuesta) {
				var cartera = $.parseJSON(respuesta) /*JSON.parse(respuesta)*/
				$('#idCartera').val(cartera.id)
				$('#spanAnio').html(cartera.anio)
				$('#anio').val(cartera.anio)
				$('#descripcion').val(cartera.descripcion)
				$('#valorCartera').val(cartera.valor)
			},
		})
	})
})
