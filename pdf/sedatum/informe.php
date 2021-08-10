<?php
    include('../../model/solicitud/fill.php');

    //INICIA LA SELECCION DE BOTONES QUE SE DEBEN IMPRIMIR PARA CADA ETAPA
    // $pantalla = $_POST['pantalla'];
    // $etapa = $_POST['etapa'];
    $id = $_GET['id'];

    $expediente = fill_expediente($id);
    $fecha_ingreso = fill_ventanilla_id($id);//fecha_ingreso[recibido] tiene la fecha
    $recibido = date("d/m/Y", strtotime($fecha_ingreso['recibido']));

    $datos_generales = fill_datos_generales($expediente['id_persona'],$expediente['tipo_persona']);
    $establecimiento = fill_establecimiento_separado($expediente['id_dg_establecimiento']);
    $dimensiones = fill_dimensiones($expediente['id_dimensiones_establecimiento']);
    $folio_str = str_replace(array("/", " ",":"),array("-","-","-"),$expediente['folio']);
    $dictamen = file_get_contents('../../assets/expedientes/'.$folio_str.'/docs/documentacion/suelo.txt', FILE_USE_INCLUDE_PATH);
    $dictamenLen = strlen($dictamen);

    
    $dict_1 = "";
    $dict_2 = "";
    for($i = 0; $i < $dictamenLen; $i++){
        if ($i < 481) {
            $dict_1 .=  $dictamen[$i];
        }else{
            $dict_2 .= $dictamen[$i];
        }
    }
    
    $monto = 5;
    $letras = NumeroALetras::convertir($monto, 'pesos', 'centavos');
    $letras = strtolower($letras);
    $letras = ucfirst($letras);

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

    ob_start();

    require_once('../../assets/TCPDF/tcpdf.php');

    class MYPDF extends TCPDF {
        
        //Page header
        public function Header() {
            // $today = str_replace('.', ' / ', date("d.m.Y"));
            // $this->SetY(-215); 
            $this->SetFont('times', 'R', 14);
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

    
            $this->writeHTMLCell('', '', '', 12, $cabeza, $border=0, $ln=2, $fill=0, $reseth=true, $align='C', $autopadding=true);
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
                            <td style="height: 70px;" class="border_c"></td>
                            <td style="height: 70px;" class="border_c"></td>
                            <td style="height: 70px;" class="border_c"></td>
                            <td style="height: 70px;" class="border_c"></td>
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


    <table>
        <tr>
            <td><h4 align="center">INFORME DE COMPATIBILIDAD URBANÍSTICA</h4></td>    
        </tr>
        <tr><td>
                <h4>DATOS DE LA PERSONA ######</h4>
            </td>
        </tr>
    </table>

    <table cellspacing="2" cellpadding="3">
        <tr>
            <td class="border_c" style="width:75%;">
                <table>
                    <tr>
                        <td style="width: 10%;">Nombre: </td>
                        <td style="width: 90%;" class="border_b">'.$datos_generales['nombre'].'</td>
                    </tr>
                </table>

                <table>
                    <tr>
                        <td style="width: 7%;">Calle: </td>
                        <td style="width: 40%;" class="border_b">'.$datos_generales['calle'].'</td>
                        <td style="width: 10%;">Número: </td>
                        <td style="width: 15%;" class="border_b">'.$datos_generales['no_exterior'].'</td>
                        <td style="width: 5%;">Tel: </td>
                        <td style="width: auto;" class="border_b">'.$datos_generales['telefono'].'</td>
                    </tr>
                </table>
               
                <table>
                    <tr>
                        <td style="width: 16%;">Colonia/Fracc: </td>
                        <td style="width: 31%;" class="border_b">'.$datos_generales['colonia'].'</td>
                        <td style="width: 12%;">Localidad: </td>
                        <td style="width: auto;" class="border_b">'.$datos_generales['localidad'].'</td>
                    </tr>
                </table>

                <table>
                    <tr>
                        <td style="width: 9%;">E-mail: </td>
                        <td style="width: 89%;" class="border_b">'.$datos_generales['email'].'</td>
                    </tr>
                </table>
            </td>

            <td class="border_c" style="width:25%;">
                <table>
                    <tr>
                        <td>Constancia No.</td>
                    </tr>
                    <tr>
                        <td class="border_b">'.$folio_str.'</td>
                    </tr>
                    <tr>
                        <td>Fecha de Ingreso</td>
                    </tr>
                    <tr>
                        <td class="border_b">'.$recibido.'</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>    

    <table>
        <tr>
            <td width="75%;"><h4>UBICACIÓN Y DATOS DEL PREDIO</h4></td>
            <td width="25%;"><h4>URBANIZACIÓN</h4></td>
        </tr>
    </table>        

    <table cellspacing="2" cellpadding="3">
        <tr>
            <td class="border_c" style="width:75%;">
                <table>
                    <tr>
                        <td style="width: 7%">Calle: </td>
                        <td style="width: 53%" class="border_b">'.$establecimiento['calle'].'</td>
                        <td style="width: 10%">Número: </td>
                        <td style="width: 11%" class="border_b">'.$establecimiento['no_exterior'].'</td>
                        <td style="width: 11%">Manzana: </td>
                        <td style="width: 8%" class="border_b">'.$establecimiento['manzana'].'</td>
                    </tr>
                    <tr>
                        <td style="width: 16%">Colonia/Fracc: </td>
                        <td style="width: 44%" class="border_b">'.$establecimiento['colonia'].'</td>
                        <td style="width: 16%">Código Postal: </td>
                        <td style="width: 10%" class="border_b">'.$datos_generales['c_p'].'</td>
                        <td style="width: 6%">Lote: </td>
                        <td style="width: 8%" class="border_b">'.$establecimiento['lote'].'</td>
                    </tr>
                </table>

                <table>
                    <tr>
                        <td style="width: 13%;">Uso Actual: </td>
                        <td style="width: 39%;" class="border_b">'.$establecimiento['uso_actual'].'</td>
                        <td style="width: 19%;">Cuenta Catastral: </td>
                        <td style="width: 29%;" class="border_b">'.$establecimiento['cuenta_catastral'].'</td>
                    </tr>
                    <tr>
                        <td style="width: 17%;">Uso Solicitado: </td>
                        <td style="width: 35%;" class="border_b">'.$establecimiento['uso_solicitado'].'</td>
                        <td style="width: 17%;">Cuenta Predial: </td>
                        <td style="width: 31%;" class="border_b">'.$dimensiones['cuenta_predial'].'</td>
                    </tr>
                </table>
            </td>
            <td class="border_c" style="width:25%;">
                <table>
                    <tr>
                         <td>'.$establecimiento['servicios_existentes'].'</td>
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
                        <td style="width: 10%;" class="border_b">'.$dimensiones['frente'].'&nbsp;m</td>
                        <td style="width: 15%;"> Derecho: </td>
                        <td style="width: 10%;" class="border_b">'.$dimensiones['derecho'].'&nbsp;m</td>
                        <td style="width: 16%;"> Superficie: </td>
                        <td style="width: 39%;" class="border_b">'.$dimensiones['sup_local'].'&nbsp;m&sup2;</td>
                    </tr>
                    <tr>
                        <td style="width: 10%;">Fondo: </td>
                        <td style="width: 10%;" class="border_b">'.$dimensiones['fondo'].'&nbsp;m</td>
                        <td style="width: 15%;"> Izquierdo: </td>
                        <td style="width: 10%;" class="border_b">'.$dimensiones['izquierdo'].'&nbsp;m</td>
                        <td style="width: 28%;"> Distancia a esquina: </td>
                        <td style="width: 27%;" class="border_b">'.$establecimiento['distancia_esquina'].'</td>
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
                        <td style="width: 77%;">Coeficiente de Utilización del Suelo: </td>
                        <td class="border_b" style="width: 23%;"></td>
                    </tr>
                    <tr>
                        <td style="width: 77%;">Coeficiente de Ocupación del Suelo: </td>
                        <td class="border_b" style="width: 23%;"></td>
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
            <td class="border_c" style="width: 70%; height: 150;">'.$dict_1.'</td>
            <td class="border_c" style="width:  30%; height: 150;"></td>
        </tr>
    </table>';

    $html_2 = '
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

    <h3 align="center">INFORME DE COMPATIBILIDAD URBANÍSTICA</h3>

    <p>OBSERVACIONES DE INFORME DE COMPATIBILIDAD URBANISTICA (Continuación)</p>
    
    <table cellspacing="2" cellpadding="3">
        <tr>
            <td class="border_c"><p>'.$dict_2.'</p></td>
        </tr>
    </table>';

    // output the HTML content
    $pdf->writeHTML($html, false, false, true, false, '');
    $pdf->AddPage();
    $pdf->writeHTML($html_2, true, false, true, false, '');

    $pdf->Ln(0, false);
    $pdf->SetFont('times', '', 12, '', true);

    

    $pdf->Ln(25, false);
    $pdf->SetFont('times', '', 14, '', true);

    $pdf->Output($_SERVER['DOCUMENT_ROOT'] . '/assets/expedientes/'.$folio_str.'/docs/documentacion/Informe.pdf', 'FI');
    
?>