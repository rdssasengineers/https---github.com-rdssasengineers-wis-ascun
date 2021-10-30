<?php

require_once "../../../controladores/ventas.controlador.php";
require_once "../../../modelos/ventas.modelo.php";

require_once "../../../controladores/clientes.controlador.php";
require_once "../../../modelos/clientes.modelo.php";

require_once "../../../controladores/usuarios.controlador.php";
require_once "../../../modelos/usuarios.modelo.php";

require_once "../../../controladores/productos.controlador.php";
require_once "../../../modelos/productos.modelo.php";

class imprimirFactura {

    public $codigo;

    public function traerImpresionFactura() {

      //TRAEMOS LA INFORMACIÓN DE LA VENTA

      $itemVenta = "codigo";
      $valorVenta = $this->codigo;

      $respuestaVenta = ControladorVentas::ctrMostrarVentas($itemVenta, $valorVenta);

      $fecha = substr($respuestaVenta["fecha"], 0, -8);
      $productos = json_decode($respuestaVenta["productos"], true);
      $neto = number_format($respuestaVenta["neto"], 2);
      $impuesto = number_format($respuestaVenta["impuesto"], 2);
      $total = number_format($respuestaVenta["total"], 2);
      $efectivo = number_format($respuestaVenta["pago"], 2);
      $cambio = number_format($respuestaVenta["cambio"], 2);

      //TRAEMOS LA INFORMACIÓN DEL CLIENTE

      $itemCliente = "id";
      $valorCliente = $respuestaVenta["id_cliente"];

      $respuestaCliente = ControladorClientes::ctrMostrarClientes($itemCliente, $valorCliente);

      //TRAEMOS LA INFORMACIÓN DEL VENDEDOR

      $itemVendedor = "id";
      $valorVendedor = $respuestaVenta["id_vendedor"];

      $respuestaVendedor = ControladorUsuarios::ctrMostrarUsuarios($itemVendedor, $valorVendedor);

      //REQUERIMOS LA CLASE TCPDF

      require_once 'tcpdf_include.php';

      $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

      $pdf->setPrintHeader(false);
      $pdf->setPrintFooter(false);

      // establecer fuente predeterminada monoespaciada
      $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

      //  establecer márgenes
      // $pdf->SetMargins(10, PDF_MARGIN_TOP, 10);

      // establecer saltos de página automáticos
      $pdf->SetAutoPageBreak(true, PDF_MARGIN_BOTTOM);

      // establecer el factor de escala de la imagen
      // $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);



      $pdf->AddPage('P', 'A6');
      

      //---------------------------------------------------------

      $bloque1 = <<<EOF
        <table style="font-size:9px;">
          <tr>
            <td style="width:256,77px; text-align:center;">
              <img src="images/logo-factura_A4.png" style="width:100px;">
            </td>
          </tr>
          <tr>
            <td style="width:256,77px;text-align:center;">
              <div>
                Imperio<br>- DISCO BAR -
                <br>
                NIT: 71.759.963-9
                <br>
                Fecha de expedición: $fecha
                <br>
                Cliente: $respuestaCliente[nombre]
              </div>
            </td>
          </tr>
          <tr>
            <td style="text-align:right;">
              <div>
                <strong>FACTURA N.$valorVenta</strong>
              </div>
            </td>
          </tr>
        </table>
EOF;
      $pdf->writeHTML($bloque1, false, false, false, false, '');

      // ---------------------------------------------------------

      foreach ($productos as $key => $item) {
        
        $valorUnitario = number_format($item["precio"], 2);
        $precioTotal = number_format($item["total"], 2);
        $bloque2 = 
        <<<EOF
          <table style="font-size:9px;">
            <tr>
              <td style="width:256,77px; text-align:left">
                $item[descripcion]
              </td>
            </tr>
            <tr>
              <td style="width:256,77px; text-align:right">
                $ $valorUnitario Und x $item[cantidad]  = $ $precioTotal
                <br>
              </td>
            </tr>
          </table>
EOF;
        $pdf->writeHTML($bloque2, false, false, false, false, '');
      }

      // ---------------------------------------------------------

      $bloque3 = <<<EOF
        <table style="font-size:9px;">
          <tr>
            <td style="text-align:center;">
              <div>
                ** DETALLES DEL IMPUESTO **
                <br>
              </div>
            </td>
          </tr>
          <tr>
            <td style="width:256,77px; text-align:right">
              IVA 19%:  $ $impuesto
            </td>
          </tr>
          <tr>
            <td style="width:256,77px; text-align:right">
              *SIN IVA: $ $neto
            </td>
          </tr>
          <tr>
            <td style="width:256,77px; text-align:right">
              ----------------
            </td>
          </tr>
          <tr>
            <td style="width:256,77px; text-align:right">
              *TOTAL*:  $ $total
            </td>
          </tr>
          <tr>
            <td style="width:256,77px; text-align:right">
            </td>
          </tr>

          <tr>
            <td style="width:256,77px; text-align:right">
              Efectivo: $ $efectivo
            </td>
          </tr>

          <tr>
            <td style="width:256,77px; text-align:right">
              CAMBIO: $ $cambio
            </td>
          </tr>

          <tr>
            <td style="width:256,77px; text-align:center;">
              <br><br>
              ======================================<br>
              *MUCHAS GRACIAS POR SU COMPRA*<br>
              Lo Atendió: $respuestaVendedor[nombre]
              <br>
              Dirección: Calle 44B 92-11
              <br>
              Teléfono: 300 786 52 49
              ======================================<br>
              PROHIBIDO EL EXPENDIO DE BEBIDAS EMBRIAGANTES A MENORES DE EDAD LEY 124 DE 1994.
            </td>
          </tr>
        </table>
EOF;
      $pdf->writeHTML($bloque3, false, false, false, false, '');

// ---------------------------------------------------------
        //SALIDA DEL ARCHIVO

//$pdf->Output('factura.pdf', 'D');
        $pdf->Output('factura.pdf');

    }

}

$factura = new imprimirFactura();
$factura->codigo = $_GET["codigo"];
$factura->traerImpresionFactura();
