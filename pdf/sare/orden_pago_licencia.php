<?php
    include('../../model/solicitud/fill.php');
    $id_expediente = $_GET['id'];
    $expediente = fill_expediente($id_expediente);
    $establecimiento = fill_establecimiento($expediente['id_dg_establecimiento']);

    if($expediente['tipo_persona'])
    {
        $persona = fill_persona_moral($expediente['id_persona']);
    }else{
        $persona = fill_persona_fisica($expediente['id_persona']);
    }
        
    // $nombre_persona = fill_nombre_persona($expediente['id_persona']);
    $GLOBALS['monto'] = $_GET['monto'];
    $GLOBALS['folio'] = $expediente['folio'];
    $GLOBALS['nombre'] = $persona['nombre']; 
    $GLOBALS['giro'] = $establecimiento['giro_scian'];

    $GLOBALS['letras'] = NumeroALetras::convertir($GLOBALS['monto'], 'pesos', 'centavos');
    $GLOBALS['letras'] = strtolower($letras);
    $GLOBALS['letras'] = ucfirst($letras);

    $today = date("d.m.Y");
    $today = str_replace('.', ' / ', $today);

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

    $GLOBALS['fecha_formato'] ='<span>'.$today.'</span>';

    ob_start();

    require_once('../../assets/TCPDF/tcpdf.php');

    class MYPDF extends TCPDF {

        
        //Page header
        public function Header() {
            $this->SetFont('times', 'R', 11);
           
            $cabeza = '
                <style type="text/css">
                    .borderBottom{
                        border-bottom-width: 1;
                        border-bottom-color: black;
                        border-bottom-style: solid;
                    }

                    .borderTop{
                        border-top-width: 1;
                        border-top-color: black;
                        border-top-style: solid;
                    }
                </style>

                <div style="border-width: 1px; border-style: solid solid solid solid; border-color: black;">
                    <table>
                        <tr>
                            <td width="2%"></td>
                            <td width="68%" align="left">
                                <img width="350" src="../../img/logo_finanzas.png">
                            </td>
                            <td width="30%">
                                <table align="center" cellpadding="25">
                                    <tr>
                                        <td align="center" colspan="3">
                                            <table border=".5">
                                                <tr>
                                                    <td>Fecha</td>
                                                </tr>
                                                <tr>
                                                    <td>'.$GLOBALS['fecha_formato'].'</td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>

                    <table>
                        <tr align="center">
                            <td colspan="4">ORDEN DE PAGO</td>
                        </tr><tr><td></td></tr>

                        <tr align="right">
                            <td width="95%" colspan="3"><span><b>LICENCIA: </b></span><span>'.$GLOBALS['folio'].'</span></td>
                            <td width="5%"></td>
                        </tr><tr><td></td></tr>

                        <tr>
                            <td width="3%"></td>
                            <td width="12.5%"><span><b>Destinatario: </b></span></td>
                            <td class="borderBottom" width="80%" colspan="2"><span>'.$GLOBALS['nombre'].'</span></td>
                        </tr><tr><td></td></tr>

                        <tr>
                            <td width="3%"></td>
                            <td style="width: 100%;" colspan="3"><span>Sírvase liquidar en la Secretaría de Finanzas del H. Ayuntamiento de Jesús María, Ags., la cantidad de:</span>
                            </td>
                        </tr><tr><td></td></tr>

                        <tr>
                            <td width="3%"></td>
                            <td width="20%" align="center" class="borderBottom"><span>$'.$GLOBALS['monto'].'</span></td>
                            <td width="1%">,</td>
                            <td width= "71.5%" class="borderBottom">
                                <span>('.$GLOBALS['letras'].').</span>
                            </td>
                        </tr><tr><td></td></tr>

                        <tr>
                            <td width="3%"></td>
                            <td width="25.5%"><b>Por concepto de trámite de:</b> </td>
                            <td width="67%" class="borderBottom" colspan="2">Expedición de licencia para negocio de <b>'.$GLOBALS['giro'].'.</b></td>
                        </tr><tr><td></td></tr><tr><td></td></tr>

                        <tr align="right">
                            <td colspan="4"><b>ATENTAMENTE: </b>'.$_SESSION['nombre_completo'].'.</td>
                        </tr>
                    </table>
                </div>';
    
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
    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
    $pdf->SetPrintFooter(false);
    $pdf->AddPage();

    $pdf->Ln(25, false);

    if(!is_dir('../../assets/expedientes/'.$folio.'/docs/pagos/'))
    {
        mkdir('../../assets/expedientes/'.$folio.'/docs/pagos/');
    }

    $pdf->Output($_SERVER['DOCUMENT_ROOT'] . 'assets/expedientes/'.$folio.'/docs/pagos/Orden de Pago de Licencia.pdf', 'FI');
    
?>