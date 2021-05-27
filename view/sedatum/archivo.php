<?php

    /**
     * Clase que implementa un coversor de números
     * a letras.
     *
     * Soporte para PHP >= 5.4
     * Para soportar PHP 5.3, declare los arreglos
     * con la función array.
     *
     * @author AxiaCore S.A.S
     *
     */

    $monto = 1555.58;
    $letras = NumeroALetras::convertir($monto, 'pesos', 'centavos');
    $letras = strtolower($letras);
    $letras = ucfirst($letras);

    $today = date("d.m.Y");
    $today = str_replace('.', ' / ', $today);

    /*
        FALTA RECIBIR: 

            -DESTINATARIO
            -MONTO EN NÚMERO Y LETRA
            -CONCEPTO DEL TRÁMITE
            -MANDAR EL USUARIO QUE EMITE LA ORDEN
    */


    class NumeroALetras
{
    private static $UNIDADES = [
        '',
        'UN ',
        'DOS ',
        'TRES ',
        'CUATRO ',
        'CINCO ',
        'SEIS ',
        'SIETE ',
        'OCHO ',
        'NUEVE ',
        'DIEZ ',
        'ONCE ',
        'DOCE ',
        'TRECE ',
        'CATORCE ',
        'QUINCE ',
        'DIECISEIS ',
        'DIECISIETE ',
        'DIECIOCHO ',
        'DIECINUEVE ',
        'VEINTE '
    ];

    private static $DECENAS = [
        'VENTI',
        'TREINTA ',
        'CUARENTA ',
        'CINCUENTA ',
        'SESENTA ',
        'SETENTA ',
        'OCHENTA ',
        'NOVENTA ',
        'CIEN '
    ];

    private static $CENTENAS = [
        'CIENTO ',
        'DOSCIENTOS ',
        'TRESCIENTOS ',
        'CUATROCIENTOS ',
        'QUINIENTOS ',
        'SEISCIENTOS ',
        'SETECIENTOS ',
        'OCHOCIENTOS ',
        'NOVECIENTOS '
    ];

    public static function convertir($number, $moneda = '', $centimos = '', $forzarCentimos = false)
    {
        $converted = '';
        $decimales = '';

        if (($number < 0) || ($number > 999999999)) {
            return 'No es posible convertir el numero a letras';
        }

        $div_decimales = explode('.',$number);

        if(count($div_decimales) > 1){
            $number = $div_decimales[0];
            $decNumberStr = (string) $div_decimales[1];
            if(strlen($decNumberStr) == 2){
                $decNumberStrFill = str_pad($decNumberStr, 9, '0', STR_PAD_LEFT);
                $decCientos = substr($decNumberStrFill, 6);
                $decimales = self::convertGroup($decCientos);
            }
        }
        else if (count($div_decimales) == 1 && $forzarCentimos){
            $decimales = 'CERO ';
        }

        $numberStr = (string) $number;
        $numberStrFill = str_pad($numberStr, 9, '0', STR_PAD_LEFT);
        $millones = substr($numberStrFill, 0, 3);
        $miles = substr($numberStrFill, 3, 3);
        $cientos = substr($numberStrFill, 6);

        if (intval($millones) > 0) {
            if ($millones == '001') {
                $converted .= 'UN MILLON ';
            } else if (intval($millones) > 0) {
                $converted .= sprintf('%sMILLONES ', self::convertGroup($millones));
            }
        }

        if (intval($miles) > 0) {
            if ($miles == '001') {
                $converted .= 'MIL ';
            } else if (intval($miles) > 0) {
                $converted .= sprintf('%sMIL ', self::convertGroup($miles));
            }
        }

        if (intval($cientos) > 0) {
            if ($cientos == '001') {
                $converted .= 'UN ';
            } else if (intval($cientos) > 0) {
                $converted .= sprintf('%s ', self::convertGroup($cientos));
            }
        }

        if(empty($decimales)){
            $valor_convertido = $converted . strtoupper($moneda);
        } else {
            $valor_convertido = $converted . strtoupper($moneda) . ' CON ' . $decimales . ' ' . strtoupper($centimos);
        }

        return $valor_convertido;
    }

    private static function convertGroup($n)
    {
        $output = '';

        if ($n == '100') {
            $output = "CIEN ";
        } else if ($n[0] !== '0') {
            $output = self::$CENTENAS[$n[0] - 1];
        }

        $k = intval(substr($n,1));

        if ($k <= 20) {
            $output .= self::$UNIDADES[$k];
        } else {
            if(($k > 30) && ($n[2] !== '0')) {
                $output .= sprintf('%sY %s', self::$DECENAS[intval($n[1]) - 2], self::$UNIDADES[intval($n[2])]);
            } else {
                $output .= sprintf('%s%s', self::$DECENAS[intval($n[1]) - 2], self::$UNIDADES[intval($n[2])]);
            }
        }

        return $output;
    }
}

    $fecha_formato ='
        <span>Fecha: </span>
        <span>'.$today.'</span>
    ';

    ob_start();

    require_once('../../assets/TCPDF/tcpdf.php');

    class MYPDF extends TCPDF {

        
        //Page header
        public function Header() {
            // $this->SetY(-215); 
            $this->SetFont('times', 'I', 14);
            $this->Image('../../img/2.png', '', '', 25, 28, '', '', 'T', false, 300, '', false, false, 1, false, false, false);

            $cabeza = '<table>
                     <tr>
                      <td>Presidencia Municipal de Jesús María</td>
                     </tr>

                     <tr>
                      <td>Gobierno Municipal 2019 - 2021</td>
                     </tr>

                     <tr>
                      <td>Secretaría de Finanzas</td>
                     </tr>
                    </table>';

    
            $this->writeHTMLCell('', '', '', 10, $cabeza, $border=0, $ln=2, $fill=0, $reseth=true, $align='C', $autopadding=true);
        }  

        // Page footer
        public function Footer() {
            // Position at 15 mm from bottom
            $this->SetY(-15);
            // Set font
            $this->SetFont('times', 'I', 14);
            // Page number
            $this->write(0, '', '', 0, 'C', true, 0, false, false, 0);

        }
    }

    $pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'LETTER', true, 'UTF-8', false);

    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

    $pdf->SetMargins(PDF_MARGIN_LEFT, 35, PDF_MARGIN_RIGHT, TRUE);
    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

    $pdf->SetFont('times', '', 12, '', true);

    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

    $pdf->AddPage();

    $seccion_1 = '
            <h3>ORDEN DE PAGO</h3>
             <table>
                    <tr>
                        <td>PROGRAMA DE REGULARIZACIÓN DE LICENCIAS COMERCIALES DE BAJO RIESGO</td>
                    </tr>
                    <tr><td></td></tr>
                </table>';

    $seccion_2 = '<table>
                    <tr>
                        <td><span><b>LICENCIA: </b></span>SARE-1O238<span></span></td>
                    </tr>
                    <tr><td></td></tr>
                </table>';

    $seccion_3 = '<span><b>TITULAR: </b></span>
                  <span>FERNANDO EMMANUEL MARTINEZ</span><br><span><b>GIRO: </b></span>
                  <span>VENDEDOR DE FRUTAS</span><br>';

    $seccion_4 = '<style>
                      .border{
                        border-style: solid solid solid solid;
                        border-width: 1px 1px 1px 1px;
                        border-color: black;
                      }
                  </style>

                <table>
                    <tr>
                        <td style="width: 5%;"></td>
                        <td class="border" style="width: 3%;"></td>
                        <td style="width: auto;"> DERECHOS DE FUNCIONAMIENTO</td>
                    </tr>
                </table>

                <table>
                    <tr>
                        <td style="width: 5%;"></td>
                        <td class="border" style="width: 3%;"></td>
                        <td style="width: auto;"> NUEVA CREACIÓN</td>
                    </tr>
                    <tr><td></td></tr>
                </table>

                <table>
                    <tr>
                        <td style="width: 21%;"><span><b>TOTAL A PAGAR: </b></span></td>
                        <td style="width: auto;">$'.$monto.', '.$letras.'.</td>
                    </tr>
                    <tr><td></td></tr>
                </table>';

    $seccion_5 = '<table>
                    <tr>
                        <td style="width: 21%;"><span><b>OBSERVACIONES: </b></span></td>
                        <td style="width: auto;">El compa es un hijo de la verrga que se la pasa sancianandome porque no traigo el cubreboocas ni mis clientes, pinche virus ni existe.</td>
                    </tr>
                    <tr><td></td></tr>
                </table>';

    $seccion_6 = '<span><b>AUTORIZÓ: </b></span>
                  <span>EL PEPE</span>';


    $pdf->Ln(0, false);
    $pdf->SetFont('times', '', 12, '', true);

    $pdf->writeHTML($seccion_1, false, 0, false, false, 'C');
    $pdf->writeHTML($seccion_2, false, 0, false, false, 'R');
    $pdf->writeHTML($seccion_3, true, false, true, false, '');
    $pdf->writeHTML($seccion_4, false, 0, false, false, 'L');
    $pdf->writeHTML($seccion_5, true, false, true, false, '');
    $pdf->writeHTML($seccion_6, false, 0, false, false, 'R');


    $pdf->SetY(23, false, false);
    $pdf->writeHTML($fecha_formato, false, 0, false, false, 'R');


    $pdf->Ln(25, false);
    $pdf->SetFont('times', '', 14, '', true);

    $pdf->Output('solicitud.pdf', 'I');
    
?>