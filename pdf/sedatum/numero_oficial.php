<?php
    include('../../model/solicitud/fill.php');
    
    $id = $_GET['id'];
    $numero_oficial = $_GET['numero_oficial'];

    $expediente = fill_expediente($id);

    $datos_generales = fill_datos_generales($expediente['id_persona'],$expediente['tipo_persona']);
    $establecimiento = fill_establecimiento_separado($expediente['id_dg_establecimiento']);
    $dimensiones = fill_dimensiones($expediente['id_dimensiones_establecimiento']);
    $folio_str = str_replace(array("/", " ",":"),array("-","-","-"),$expediente['folio']);

    $today = date("d.m.Y");
    $today = str_replace('.', ' / ', $today);

    $GLOBALS['fecha'] ='<span>'.$today.'</span>';

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

                <div style="border-width: 1; border-style: solid solid solid solid; border-color: black;">
                    <table>
                        <tr>
                            <td width="2%"></td>
                            <td width="68%" align="left">
                                <img width="350" src="../../img/logo_sedatum.png">
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
                                                    <td>'.$GLOBALS['fecha'].'</td>
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
                            <td colspan="6">NOTIFICACIÓN DE NÚMERO OFICIAL</td>
                        </tr>

                        <tr>
                            <td colspan="6"></td>
                        </tr>

                        <tr>
                            <td style="width: 3%;"></td>
                            <td style="width: 11%;">Destinatario: </td>    
                            <td style="width: 79%;" colspan="4" class="borderBottom">'.$GLOBALS['datos_generales']['nombre'].'</td>
                        </tr>

                        <tr>
                            <td style="width: 3%;"></td>
                            <td colspan="5">Por este conducto, me permito notificarle el número oficial por Usted solicitado a esta Dependencia.</td>
                        </tr>

                        <tr>
                            <td style="width: 3%;"></td>
                            <td style="width: 8%;">Número: </td>
                            <td style="width: 82%;" colspan="4" class="borderBottom">'.$GLOBALS['numero_oficial'].'</td>
                        </tr>    

                        <tr>
                            <td style="width: 3%;"></td>
                            <td style="width: 6%;">Calle: </td>
                            <td style="width: 24%;" class="borderBottom">'.$GLOBALS['establecimiento']['calle'].'</td>
                            <td style="width: 9%;">Manzana: </td>
                            <td style="width: 23%;" class="borderBottom">'.$GLOBALS['establecimiento']['manzana'].'</td>
                            <td style="width: 5%;">Lote: </td>
                            <td style="width: 23%" class="borderBottom">'.$GLOBALS['establecimiento']['lote'].'</td>
                        </tr>

                        <tr>
                            <td style="width: 3%;"></td>
                            <td style="width: 36%;" colspan="3">Colonia / Fraccionamiento / Condominio: </td>
                            <td style="width: 54%;" colspan="3" class="borderBottom">'.$GLOBALS['establecimiento']['colonia'].'</td>
                        </tr>

                        <tr>
                            <td style="width: 3%;"></td>
                            <td style="width: 24%;" colspan="2">Localidad y / o Delegación: </td>
                            <td style="width: 66%;" colspan="4" class="borderBottom">'.$GLOBALS['establecimiento']['localidad'].'</td>
                        </tr>

                        <tr><td></td></tr>
                        <tr><td></td></tr>
                        <tr><td></td></tr>

                        <tr align="center">
                            <td style="width: 5%;"></td>
                            <td style="width: 40%;" colspan="2" class="borderTop">Revisó</td>
                            <td style="width: 10%"></td>
                            <td style="width: 40%" colspan="2" class="borderTop">
                                <table>
                                    <tr>
                                        <td>
                                            Lic. José Refugio Muñoz López
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Secretario de Desarrollo Agrario, Territorial y Urbano Municipal
                                        </td>
                                    </tr>
                                </table>
                             </td>
                             <td style="width: 5%"></td>
                        </tr>

                        <tr>
                            <td colspan="6"></td>
                        </tr>

                        <tr align="center">
                            <td colspan="6">Nota: La presente no acredita propiedad, sólo se emite para fines informativos del predio.</td>
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

    $pdf->Output($_SERVER['DOCUMENT_ROOT'] . '/assets/expedientes/'.$folio_str.'/docs/documentacion/Número Oficial.pdf', 'FI');
    
?>