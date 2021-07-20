<?php
    include('../../model/solicitud/fill.php');
    
    $id = $_GET['id'];

    $expediente = fill_expediente($id);

    if($expediente['tipo_persona'])
    {
        $datos_generales = fill_persona_moral($expediente['id_persona']);
    }else{
        $datos_generales = fill_persona_fisica($expediente['id_persona']);
    }
    $establecimiento = fill_establecimiento($expediente['id_dg_establecimiento']);
    $dimensiones = fill_dimensiones($expediente['id_dimensiones_establecimiento']);
    $folio_str = str_replace(array("/", " ",":"),array("-","-","-"),$expediente['folio']);

    $monto = $_GET['costo'];
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
        <br><span>CONSTANCIA: </span>
        <span>#######</span><br>

        <span>FECHA DE INGRESO: </span>
        <span>'.$today.'</span>
    ';

    ob_start();

    require_once('../../assets/TCPDF/tcpdf.php');

    class MYPDF extends TCPDF {
        
        //Page header
        public function Header() {
            // $this->SetY(-215); 
            $this->SetFont('times', 'R', 14);
    
            $cabeza = '
                <style>
                    .border_c{
                        border-style: solid solid solid solid;
                        border-bottom-width: 1px;
                    }

                    .border_b{
                        border-bottom-style: solid;
                        border-bottom-width: 1px;
                    }

                    .firma{
                        height: 50px;
                    }

                </style>

                <table border="1" cellpadding="3" cellspacing="0">
                    <tr>
                        <td colspan="3" rowspan="2" align="center"><img width="320" src="../../img/sde.png"></td>
                        <td align="center">2021</td>
                    </tr>
                    <tr>
                        <td align="center">FIRMA</td>
                    </tr>
                    <tr>
                        <td align="center" colspan="3">LICENCIA</td>
                        <td align="center">2022</td>
                    </tr>
                    <tr>
                        <td colspan="3" align="right">Folio: SARE-123</td>
                        <td rowspan="3" align="center">FIRMA</td>
                    </tr>
                    <tr>
                        <td colspan="3">Giro:</td>
                    </tr>
                    <tr>
                        <td colspan="3">Nombre:</td>
                    </tr>
                    <tr>
                        <td colspan="3">Domicilio:</td>
                        <td align="center">2023</td>
                    </tr>
                    <tr>
                        <td colspan="3">Fecha:</td>
                        <td rowspan="3" align="center">FIRMA</td>
                    </tr>
                    <tr>
                        <td colspan="3" rowspan="3"></td>
                        
                    </tr>
                    <tr>
                        <td></td>
                    </tr>
                </table>';

            $this->writeHTMLCell('', '', '', 10, $cabeza, $border=0, $ln=2, $fill=0, $reseth=true, $align='L', $autopadding=true);
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
    $pdf->SetPrintFooter(false);
    $pdf->AddPage();

    $pdf->Ln(0, false);
    $pdf->SetFont('times', '', 12, '', true);

    $pdf->SetY(23, false, false);
    //$pdf->writeHTML($fecha_formato, false, 0, false, false, 'R');

    $pdf->Ln(25, false);
    $pdf->SetFont('times', '', 14, '', true);

    $pdf->Output($_SERVER['DOCUMENT_ROOT'] . '/assets/expedientes/'.$folio_str.'/docs/documentacion/Licencia.pdf', 'FI');
    
?>