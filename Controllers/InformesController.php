<?php
class InformesController {
  /**consultar si la tabla bppcc esta vacia */
  public static function ctrBPPCC ($item, $valor) {
    $tabla = "bppcc";
    $respuesta = ModeloBPPCC::mdlConsultaTabla($tabla, $item, $valor);
    return $respuesta;
  }
  /**generar informe de Redes por centro de costos */
  public static function ctrGenerarInformeRedes($item, $valor) {
    if (isset($_POST["centroDecostos"])) {
      // consultar fecha_upload
      date_default_timezone_set('America/Bogota');
      $tabla = "logs";
      $item  = "id";
      $valor = 1;
      $fecha_upload = ModeloValidaciones::mdlFecha_upload($tabla, $item, $valor);
      foreach ($fecha_upload as $key =>	$value) {
        $fecha = $value["fecha_corte"];
      }
      $dateTime = new DateTime($fecha);
      $d = date_format($dateTime,"d");
      $m = date_format($dateTime,"F");
      $a = date_format($dateTime,"Y");
      $mes = ModeloValidaciones::traducirMes($m);
      $fecha_corte = $d." de ".$mes." ".$a;

      /**Traer centro de costos */
      $tabla = "centrosdecostos";
      $item  = "centro_decostos";
      $valor = $_POST["centroDecostos"];
      $centro_decostos = ModeloInformeRDS::mdlTraerCentroDeCostos($tabla, $item, $valor);
      $tabla = "bppcc";
      $item  = 'transaccional';
      $valor = 'sí';
      $codigo_centro_decostos = $centro_decostos['centro_decostos'];

      /**RESUMEN */
      // -> /**DETALLE */
      /**SALDO AÑOS ANTERIORES */
      $saldoAniosAnteriores = ModeloInformeRDS::mdlSaldoAniosAnteriores($tabla, $item, $valor, $codigo_centro_decostos);
      
      
      /**ANTICIPOS POR LEGALIZAR */
      $anticiposPorLegalizar = ModeloInformeRDS::mdlAnticiposPorLegalizar($tabla, $item, $valor, $codigo_centro_decostos);
      

      // -> /**DISPONIBLE */
      /**CARTERA POR COBRAR */
      $carteraPorCobrar = ModeloInformeRDS::mdlCarteraPorCobrar($tabla, $item, $valor, $codigo_centro_decostos);
      /**TOTAL DISPONIBLE */
      $totalDisponible = $carteraPorCobrar['Suma'];

       /**INFORMACIÓN DETALLADA */

      // ->INGRESOS

      /**INGRESOS FONDO */
      $ingresoFondo = ModeloInformeRDS::mdlIngresoFondo($tabla, $item, $valor, $codigo_centro_decostos);
      /**INGRESOS NO OPERACIONALES */
      $ingresosNoOperacionales = ModeloInformeRDS::mdlIngresosNoOperacionales($tabla, $item, $valor, $codigo_centro_decostos);
      /**DEVOLUCIONES */
      $devoluciones = ModeloInformeRDS::mdlDevoluciones($tabla, $item, $valor, $codigo_centro_decostos);
      /**TOTAL INGRESOS */
      $totalIngresos = $ingresoFondo['Suma'] + $ingresosNoOperacionales['Suma'] + $devoluciones['Suma'];

      /**... */
      $honorariosEJE = ModeloInformeRDS::mdlHonorariosEJE($tabla, $item, $valor, $codigo_centro_decostos);
      $iVADescontable_1EJE = ModeloInformeRDS::mdlIVADescontable_1EJE($tabla, $item, $valor, $codigo_centro_decostos);
      $iVADescontable_2EJE = ModeloInformeRDS::mdlIVADescontable_2EJE($tabla, $item, $valor, $codigo_centro_decostos);
      $iVADescontable_3EJE = ModeloInformeRDS::mdlIVADescontable_3EJE($tabla, $item, $valor, $codigo_centro_decostos);
      $impoconsumoEJE = ModeloInformeRDS::mdlImpoconsumoEJE($tabla, $item, $valor, $codigo_centro_decostos);
      $alquileresEJE = ModeloInformeRDS::mdlAlquileresEJE($tabla, $item, $valor, $codigo_centro_decostos);
      $licenciasEJE = ModeloInformeRDS::mdlLicenciasEJE($tabla, $item, $valor, $codigo_centro_decostos);
      $segurosYPolizasEJE = ModeloInformeRDS::mdlSegurosYPolizasEJE($tabla, $item, $valor, $codigo_centro_decostos);

      $asistenciaTecnica = ModeloInformeRDS::mdlAsistenciaTecnica($tabla, $item, $valor, $codigo_centro_decostos);
      $celularRecargas = ModeloInformeRDS::mdlCelularRecargas($tabla, $item, $valor, $codigo_centro_decostos);
      $internetYPaginaWeb = ModeloInformeRDS::mdlInternetYPaginaWeb($tabla, $item, $valor, $codigo_centro_decostos);
      $correoPortesYTelegramas = ModeloInformeRDS::mdlCorreoPortesYTelegramas($tabla, $item, $valor, $codigo_centro_decostos);
      $trasporteFletesYAcarreos = ModeloInformeRDS::mdlTrasporteFletesYAcarreos($tabla, $item, $valor, $codigo_centro_decostos);
      $impresos = ModeloInformeRDS::mdlImpresos($tabla, $item, $valor, $codigo_centro_decostos);
      $gastosLegales = ModeloInformeRDS::mdlGastosLegales($tabla, $item, $valor, $codigo_centro_decostos);
      $alojamientoYManutencion = ModeloInformeRDS::mdlAlojamientoYManutencion($tabla, $item, $valor, $codigo_centro_decostos);

      $pasajesAereos = ModeloInformeRDS::mdlPasajesAereos($tabla, $item, $valor, $codigo_centro_decostos);
      $pasajesTerrestres = ModeloInformeRDS::mdlPasajesTerrestres($tabla, $item, $valor, $codigo_centro_decostos);
      $elementosDeAseoYCafeteria = ModeloInformeRDS::mdlElementosDeAseoYCafeteria($tabla, $item, $valor, $codigo_centro_decostos);
      $utilesPapeleriaYFotocopias = ModeloInformeRDS::mdlUtilesPapeleriaYFotocopias($tabla, $item, $valor, $codigo_centro_decostos);
      $combustiblesYLubricantes = ModeloInformeRDS::mdlCombustiblesYLubricantes($tabla, $item, $valor, $codigo_centro_decostos);
      $taxisYBuses = ModeloInformeRDS::mdlTaxisYBuses($tabla, $item, $valor, $codigo_centro_decostos);
      $casinoYRestaurante = ModeloInformeRDS::mdlCasinoYRestaurante($tabla, $item, $valor, $codigo_centro_decostos);
      $parqueaderosYPeajes = ModeloInformeRDS::mdlParqueaderosYPeajes($tabla, $item, $valor, $codigo_centro_decostos);

      $almuerzosYRefrigerios = ModeloInformeRDS::mdlAlmuerzosYRefrigerios($tabla, $item, $valor, $codigo_centro_decostos);
      $apoyosEInscripciones = ModeloInformeRDS::mdlApoyosEInscripciones($tabla, $item, $valor, $codigo_centro_decostos);
      $gastosVarios = ModeloInformeRDS::mdlGastosVarios($tabla, $item, $valor, $codigo_centro_decostos);
      $gastosFinancieros = ModeloInformeRDS::mdlGastosFinancieros($tabla, $item, $valor, $codigo_centro_decostos);


      /**... */

      /**INGRESOS DEL PERIODO */
      $ingresosDelPeriodo = $totalIngresos;
      /**GASTOS DEL PERIODO */
      $gastosDelPeriodo = $honorariosEJE['Suma'] + $iVADescontable_1EJE['Suma'] + $iVADescontable_2EJE['Suma'] + $iVADescontable_3EJE['Suma'] + $impoconsumoEJE['Suma'] + $alquileresEJE['Suma'] + $licenciasEJE['Suma'] + $segurosYPolizasEJE['Suma'] + $asistenciaTecnica['Suma'] + $celularRecargas['Suma'] + $internetYPaginaWeb['Suma'] + $correoPortesYTelegramas['Suma'] + $trasporteFletesYAcarreos['Suma'] + $impresos['Suma'] + $gastosLegales['Suma'] + $alojamientoYManutencion['Suma'] + $pasajesAereos['Suma'] + $pasajesTerrestres['Suma'] + $elementosDeAseoYCafeteria['Suma'] + $utilesPapeleriaYFotocopias['Suma'] + $combustiblesYLubricantes['Suma'] + $taxisYBuses['Suma'] + $casinoYRestaurante['Suma'] + $parqueaderosYPeajes['Suma'] + $almuerzosYRefrigerios['Suma'] + $apoyosEInscripciones['Suma'] + $gastosVarios['Suma'] + $gastosFinancieros['Suma'];

      /**RESULTADO DEL EJERCICIO */
      $resultadoDelEjercicio = $saldoAniosAnteriores['Suma'] + $ingresosDelPeriodo + $gastosDelPeriodo + $anticiposPorLegalizar['Suma'];

            echo
            '
            <div id="tablaRedes" class="col-md-12">
        <div class="card card-plain" style="margin-top: 60px;">
          <div class="card-header card-header-icon card-header-success">
            <div class="card-icon card-button">
            <a href="./views/modules/informes/rds.php/?centroDecostos='.$_POST["centroDecostos"].'" target="_blank"
                ><i class="fad fa-file-spreadsheet" style="color: #f8f9fa;font-size: 2rem;margin: 10px 0px 0px 10px;"></i>
              </a>
            </div>
            <h4 class="card-title mt-0">INFORME DE EJECUCIÓN PRESUPUESTAL</h4>
            <p class="card-category"> Informe a '.$fecha_corte.' -  <span class="font-weight-bold">Centro de costos: '.$centro_decostos['centro_decostos'].' '.$centro_decostos['nombre_sbcdc'].'</span></p>
          </div>
          <div class="card-body">
            <div class="table-responsive">
            <!-- TABLA RESUMEN -->
              <table class="table">
                <tbody>
                  <tr class="text-center">
                    <td>
                    <span class="h3 font-weight-bold">RESUMEN</span>
                    </td>
                  </tr>
                </tbody>
              </table>
              <table class="table">
                <thead class="table-info text-center font-weight-bold" >
                  <th class="font-weight-bold">
                    DETALLE
                  </th>
                  <th class="font-weight-bold">
                    VALOR
                  </th>
                </thead>
                <tbody>
                  <!-- SALDO AÑOS ANTERIORES -->
                  <tr class="text-center">
                    <td class="text-justify">
                      SALDO AÑOS ANTERIORES
                    </td>';
                    if ($saldoAniosAnteriores['Suma'] != 0) {
                      echo '<td> $ '.number_format($saldoAniosAnteriores['Suma'],0, ",", ".").'</td>';
                    }
                    else {echo '<td> $ -</td>';}
                  echo '</tr>
                  <!-- INGRESOS DEL PERIODO -->
                  <tr class="text-center">
                    <td class="text-justify">
                      INGRESOS DEL PERIODO
                    </td>';
                    if ($ingresosDelPeriodo != 0) {
                      echo'<td> $ '.number_format($ingresosDelPeriodo,0, ",", ".").'</td>';
                    }
                    else {echo'<td> $ -</td>';}
                    ?>
                  </tr>
                  <!-- GASTOS DEL PERIODO  -->
                  <tr class="text-center">
                    <td class="text-justify">
                      GASTOS DEL PERIODO
                    </td>
                    <?php
                    if ($gastosDelPeriodo != 0) {
                      echo'<td> $ '.number_format($gastosDelPeriodo,0, ",", ".").'</td>';
                    }
                    else {echo'<td> $ -</td>';}
                    ?>
                  </tr>
                  <!-- ANTICIPOS POR LEGALIZAR  -->
                  <tr class="text-center">
                    <td class="text-justify">
                      ANTICIPOS POR LEGALIZAR
                    </td>
                    <?php
                    if ($anticiposPorLegalizar['Suma'] != 0) {
                      echo'<td> $ '.number_format($anticiposPorLegalizar['Suma'],0, ",", ".").'</td>';
                    }
                    else {echo'<td> $ -</td>';}
                    ?>
                  </tr>
                  <!-- RESULTADO DEL EJERCICIO   -->
                  <tr class="text-center">
                    <td class="font-weight-bold">
                      RESULTADO DEL EJERCICIO
                    </td>
                    <?php
                    if ($resultadoDelEjercicio != 0) {
                      echo'<td class="font-weight-bold"> $ '.number_format($resultadoDelEjercicio,0, ",", ".").'</td>';
                    }
                    else {echo'<td class="font-weight-bold"> $ -</td>';}
                    ?>
                  </tr>
                </tbody>
              </table>
              <!-- ... -->
              <table class="table">
                <thead class="table-info text-center font-weight-bold" >
                  <th class="font-weight-bold">
                    DISPONIBLE
                  </th>
                  <th class="font-weight-bold">
                    VALOR
                  </th>
                </thead>
                <tbody>
                  <!-- CARTERA POR COBRAR -->
                  <tr class="text-center">
                    <td class="text-justify">
                      CARTERA POR COBRAR
                    </td>
                    <?php
                    if ($carteraPorCobrar['Suma'] != 0) {
                      echo'<td> $ '.number_format($carteraPorCobrar['Suma'],0, ",", ".").'</td>';
                    }
                    else {echo'<td> $ -</td>';}
                    ?>
                  </tr>
                  <!-- TOTAL DISPONIBLE -->
                  <tr class="text-center">
                    <td class="font-weight-bold">
                      TOTAL DISPONIBLE
                    </td>
                    <?php
                    if ($totalDisponible != 0) {
                      echo'<td class="font-weight-bold"> $ '.number_format($totalDisponible,0, ",", ".").'</td>';
                    }
                    else {echo'<td class="font-weight-bold"> $ -</td>';}
                    ?>
                  </tr>
                </tbody>
              </table>
              <!-- INFORMACIÓN DETALLADA -->
              <table class="table">
                <tbody>
                  <tr class="text-center">
                    <td>
                    <span class="h3 font-weight-bold">INFORMACIÓN DETALLADA</span>
                    </td>
                  </tr>
                </tbody>
              </table>
              <table class="table">
                <thead class="table-info text-center font-weight-bold" >
                  <th class="font-weight-bold">
                    INGRESOS
                  </th>
                  <th class="font-weight-bold">
                    EJECUCIÓN
                  </th>
                </thead>
                <tbody>
                  <!-- INGRESOS FONDO -->
                  <tr class="text-center">
                    <td class="text-justify">
                      INGRESOS FONDO
                    </td>
                    <?php
                    if ($ingresoFondo['Suma'] != 0) {
                      echo'<td> $ '.number_format($ingresoFondo['Suma'],0, ",", ".").'</td>';
                    }
                    else {echo'<td> $ -</td>';}
                    ?>
                  </tr>
                  <!-- INGRESOS NO OPERACIONALES -->
                  <tr class="text-center">
                    <td class="text-justify">
                      INGRESOS NO OPERACIONALES
                    </td>
                    <?php
                    if ($ingresosNoOperacionales['Suma'] != 0) {
                      echo'<td> $ '.number_format($ingresosNoOperacionales['Suma'],0, ",", ".").'</td>';
                    }
                    else {echo'<td> $ -</td>';}
                    ?>
                  </tr>
                  <!-- DEVOLUCIONES  -->
                  <tr class="text-center">
                    <td class="text-justify">
                      DEVOLUCIONES
                    </td>
                    <?php
                    if ($devoluciones['Suma'] != 0) {
                      echo'<td> $ '.number_format($devoluciones['Suma'],0, ",", ".").'</td>';
                    }
                    else {echo'<td> $ -</td>';}
                    ?>
                  </tr>
                  <!-- TOTAL INGRESOS -->
                  <tr class="text-center">
                    <td class="font-weight-bold">
                      TOTAL INGRESOS
                    </td>
                    <?php
                    if ($totalIngresos != 0) {
                      echo'<td class="font-weight-bold"> $ '.number_format($totalIngresos,0, ",", ".").'</td>';
                    }
                    else {echo'<td class="font-weight-bold"> $ -</td>';}
                    ?>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <?php
    }

  }
}