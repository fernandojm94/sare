<?php
    include('../../model/solicitud/fill.php');
    // $id_expediente = $_GET['id'];
    // $expediente = fill_expediente($id);
    // var_dump($expediente);
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
                      <td>SEDATUM</td>
                     </tr>

                    </table>';

    
            $this->writeHTMLCell('', '', '', 10, $cabeza, $border=0, $ln=2, $fill=0, $reseth=true, $align='C', $autopadding=true);
        }  

        // Page footer
        public function Footer() {
            $this->SetFont('times', '', 14);
            
            $pie = '<style>
                        .border_c{
                            border-style: solid solid solid solid;
                            border-width: 1px;
                        }

                        .border_b{
                            border-bottom-style: solid;
                            border-bottom-width: 1px;
                        }

                        td{
                            font-size: 10px;
                        }
                    </style>

                    <table cellspacing="2" cellpadding="3">
                        <tr>
                            <td style="width: 15%;"><h4>DICTAMINA</h4></td>
                            <td style="width: 15%;"><h4>REVISA</h4></td>
                            <td style="width: 40%;"><h4>AUTORIZA</h4></td>
                            <td style="width: 30%;"><h4>FECHA DE AUTORIZACIÓN</h4></td>
                        </tr>
                        <tr>
                            <td style="height: 70px;" class="border_c">ESPACIO FIRMA</td>
                            <td style="height: 70px;" class="border_c">ESPACIO FIRMA</td>
                            <td style="height: 70px;" class="border_c">ESPACIO FIRMA</td>
                            <td style="height: 70px;" class="border_c">FECHA DE AUTORIZACIÓN</td>
                        </tr>
                    </table>

                    <h6 align="justify" style="font-size: 8px;">EL INFORME DE COMPATIBILIDAD URBANÍSTICA NO CONSTITUYE APEGO Y DESLINDE RESPECTO DEL INMUEBLE, NO ACREDITA LA PROPIEDAD O POSESIÓN DEL MISMO. ART. 138 DEL CÓDIGO DE ORDENAMIENTO TERRITORIAL, DESARROLLO URBANO Y VIVIENDA PARA EL ESTADO DE AGS. ESTE INFORME NO TIENE VALIDEZ LEGAL PARA REALIZAR TRÁMITES DE FRACCIONAMIENTOS, CONDOMINIOS, RELOTIFICACIONES, FUSIONES O SUBDIVISIONES DE ÁREAS Y PREDIOS, ASÍ COMO LICENCIAS DE CONSTRUCCIÓN O DE FUNCIONAMIENTO, TRÁMITES DE ESCRITURACIÓN, CONTRATOS DE AGUA Y DE LUZ. EL INFORME DE COMPATIBILIDAD URBANISTICA TENDRÁ UNA VIGENCIA DE 1 AÑO CONTANDO A PARTIR DE LA FECHA DE EXPEDICIÓN ART. 141 DEL CÓDIGO DE ORDENAMIENTO TERRITORIAL, DESARROLLO URBANO Y VIVIENDA PARA EL ESTADO DE AGS. NO SERÁ VALIDO DE PRESENTAR TACHADURAS O ENMENDADURAS. LOS RECUADROS SOMBREADOS SON DE USO EXCLUSIVO DE LA SECRETARÍA.</h6>';

            $this->writeHTMLCell('', '', '', 275, $pie, $border=0, $ln=2, $fill=0, $reseth=true, $align='C', $autopadding=true);

        }
    }

    $pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'LEGAL', true, 'UTF-8', false);

    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

    $pdf->SetMargins(PDF_MARGIN_LEFT, 35, PDF_MARGIN_RIGHT, TRUE);
    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

    $pdf->SetFont('times', '', 12, '', true);

    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

    $pdf->AddPage();

    $subtable = '<table border="1" cellspacing="6" cellpadding="4"><tr><td>a</td><td>b</td></tr><tr><td>c</td><td>d</td></tr></table>';

    $html = '

    <style>
        .border_c{
            border-style: solid solid solid solid;
            border-width: 1px;
        }

        .border_b{
            border-bottom-style: solid;
            border-bottom-width: 1px;
        }

        td{
            font-size: 10px;
        }
    </style>

    <h4 align="center">INFORME DE COMPATIBILIDAD URBANÍSTICA</h4>

    <table>
        <tr>
            <td>
                <h4>DATOS DE LA PERSONA ######</h4>
            </td>
        </tr>
    </table>

    <table cellspacing="2" cellpadding="3">
        <tr>
            <td class="border_c" style="width:75%;">
                <table>
                    <tr>
                        <td>Nombre: </td>
                        <td class="border_b">########</td>
                    </tr>
                </table>

                <table>
                    <tr>
                        <td>Calle: </td>
                        <td class="border_b">########</td>
                        <td>Número: </td>
                        <td class="border_b">########</td>
                        <td>Tel: </td>
                        <td class="border_b">########</td>
                    </tr>
                </table>

                <table>
                    <tr>
                        <td>Colonia/Fracc: </td>
                        <td class="border_b">########</td>
                        <td>Localidad: </td>
                        <td class="border_b">########</td>
                    </tr>
                </table>
            </td>

            <td class="border_c" style="width:25%;">
                <table>
                    <tr>
                        <td>Constancia No.</td>
                    </tr>
                    <tr>
                        <td class="border_b">########</td>
                    </tr>
                    <tr>
                        <td>Fecha de Ingreso</td>
                    </tr>
                    <tr>
                        <td class="border_b">########</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>    

    <table>
        <tr>
            <td width="75%;"><h4>UBICACIÓN Y DATOS DEL PRECIO</h4></td>
            <td width="25%;"><h4>URBANIZACIÓN</h4></td>
        </tr>
    </table>        

    <table cellspacing="2" cellpadding="3">
        <tr>
            <td class="border_c" style="width:75%;">
                <table>
                    <tr>
                        <td>Calle: </td>
                        <td class="border_b">########</td>
                        <td>Número Oficial: </td>
                        <td class="border_b">########</td>
                        <td>Manzana: </td>
                        <td class="border_b">########</td>
                    </tr>
                    <tr>
                        <td>Colonia/Fracc: </td>
                        <td class="border_b">########</td>
                        <td>Código Postal: </td>
                        <td class="border_b">########</td>
                        <td>Lote: </td>
                        <td class="border_b">########</td>
                    </tr>
                </table>

                <table>
                    <tr>
                        <td>Uso Actual: </td>
                        <td class="border_b">########</td>
                        <td>Cuenta Catastral: </td>
                        <td class="border_b">########</td>
                    </tr>
                    <tr>
                        <td>Uso Solicitado: </td>
                        <td class="border_b">########</td>
                        <td>Cuenta Predial: </td>
                        <td class="border_b">########</td>
                    </tr>
                </table>
            </td>
            <td class="border_c" style="width:25%;">
                <table>
                    <tr>
                        <td>Agua</td>
                        <td>Electrificación</td>
                    </tr>
                    <tr>
                        <td>Drenaje</td>
                        <td>Pavimento</td>
                    </tr>
                    <tr>
                        <td>Guarnición</td>
                        <td>Banqueta</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

    <table>
        <tr>
            <td><h4>LUGAR PARA CROQUIS</h4></td>
        </tr>
    </table> 

    <table cellspacing="2" cellpadding="3" class="border_c">
        <tr><td align="center">Identificar las calles que limitan a la manzana donde se ubica el predio señalando donde se encuentra el mismo.</td></tr>
        <tr><td align="center"><img width="200" height="200" src="../../img/map.png"></td></tr>
    </table>

    <table>
        <tr>
            <td><h4>MEDIDAS DEL PREDIO</h4></td>
        </tr>
    </table> 

    <table cellspacing="2" cellpadding="3">
        <tr>
            <td class="border_c" style="width: 60%;">
                <table>
                    <tr>
                        <td colspan="6"></td>
                    </tr>
                    <tr>
                        <td style="width: 10%;">Frente: </td>
                        <td style="width: 10%;" class="border_b"></td>
                        <td style="width: 15%;"> Derecho: </td>
                        <td style="width: 10%;" class="border_b"></td>
                        <td style="width: 16%;"> Superficie: </td>
                        <td style="width: 39%;" class="border_b"></td>
                    </tr>
                    <tr>
                        <td style="width: 10%;">Fondo: </td>
                        <td style="width: 10%;" class="border_b"></td>
                        <td style="width: 15%;"> Izquierdo: </td>
                        <td style="width: 10%;" class="border_b"></td>
                        <td style="width: 28%;"> Distancia a esquina: </td>
                        <td style="width: 27%;" class="border_b"></td>
                    </tr>
                </table>        
            </td>
            <td class="border_c" style="width: 40%;">
                <table>
                    <tr>
                        <td style="width: 50%;">Densidad de Población: </td>
                        <td class="border_b" style="width: 50%;"></td>
                    </tr>
                    <tr>
                        <td style="width: 80%;">Coeficiente de Utilización del Suelo: </td>
                        <td class="border_b" style="width: 20%;"></td>
                    </tr>
                    <tr>
                        <td style="width: 80%;">Coeficiente de Ocupación del Suelo: </td>
                        <td class="border_b" style="width: 20%;"></td>
                    </tr>
                </table>     
            </td>
        </tr>    
    </table>   

    <table>
        <tr>
            <td style="width: 70%;"><h4>OBSERVACIONES DE COMPATIBILIDAD URBANÍSTICA</h4></td>
            <td style="width: 30%;"><h4>SELLO</h4></td>
        </tr>
    </table>

    <table cellspacing="2" cellpadding="3">
        <tr>
            <td class="border_c" style="width: 70%; height: 150;">Lorem ipsum dolor sit amet consectetur adipiscing elit, potenti hendrerit curae ligula porta maecenas cubilia, magnis arcu inceptos quisque justo dictumst. Quis himenaeos diam turpis duis vel dignissim facilisis, tempus nibh per ante luctus vitae, purus tempor gravida ligula cras class. Interdum vel aliquam arcu varius mus netus, sociis urna ante duis ultrices tristique, feugiat dictumst laoreet nullam risus.</td>
            <td class="border_c" style="width:  30%; height: 150;">ESPACIO PARA QUE PONGAN EL SELLO</td>
        </tr>
    </table>';

    $html_2 = '
    <h3>INFORME DE COMPATIBILIDAD URBANÍSTICA</h3>

    <p>OBSERVACIONES DE INFORME DE COMPATIBILIDAD URBANISTICA.</p>
    

    <table border="1" cellspacing="6" cellpadding="4">
        <tr>
            <td>
                <ol>
                    <li>EJEMPLO 1</li>
                    <li>EJEMPLO 2</li>
                    <li>EJEMPLO 3</li>        
                </ol>
            </td>
        </tr>
    </table>';

    // output the HTML content
    $pdf->writeHTML($html, true, false, true, false, '');
    $pdf->AddPage();
    $pdf->writeHTML($html_2, true, false, true, false, '');

    $pdf->Ln(0, false);
    $pdf->SetFont('times', '', 12, '', true);

    $pdf->SetY(23, false, false);
    $pdf->writeHTML($fecha_formato, false, 0, false, false, 'R');

    $pdf->Ln(25, false);
    $pdf->SetFont('times', '', 14, '', true);

    $pdf->Output('solicitud.pdf', 'I');
    
?>