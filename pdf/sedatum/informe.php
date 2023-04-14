<?php
    include('../../model/solicitud/fill.php');

    //INICIA LA SELECCION DE BOTONES QUE SE DEBEN IMPRIMIR PARA CADA ETAPA
    // $pantalla = $_POST['pantalla'];
    // $etapa = $_POST['etapa'];
    $id = $_GET['id'];

    $expediente = fill_expediente($id);

    $tipo_persona = "";
    if ($expediente['tipo_persona'] == 0) {
        $tipo_persona = "FÍSICA";
    }else{
        $tipo_persona = "MORAL";
    }

    $fecha_ingreso = fill_ventanilla_id($id);//fecha_ingreso[recibido] tiene la fecha
    $recibido = date("d/m/Y", strtotime($fecha_ingreso['recibido']));

    $datos_generales = fill_datos_generales($expediente['id_persona'],$expediente['tipo_persona']);
    $establecimiento = fill_establecimiento_separado($expediente['id_dg_establecimiento']);
    $dimensiones = fill_dimensiones($expediente['id_dimensiones_establecimiento']);
    $folio_str = str_replace(array("/", " ",":"),array("-","-","-"),$expediente['folio']);
    $dictamen = file_get_contents('../../assets/expedientes/'.$folio_str.'/docs/documentacion/Dictamen.html', FILE_USE_INCLUDE_PATH);
    $mapa = '../../assets/expedientes/'.$folio_str.'/docs/mapa.png';
    $dictamenLen = strip_tags($dictamen);
    $dictamenLen = substr($dictamenLen, 0, 450);
    
    $fecha_autorizacion = date('d / m / Y');
    ob_start();

    require_once('../../assets/TCPDF/tcpdf.php');

    class MYPDF extends TCPDF {
        
        //Page header
        public function Header() {
            // $today = str_replace('.', ' / ', date("d.m.Y"));
            // $this->SetY(-215); 
            $this->SetFont('times', 'R', 14);
            $this->Image('../../img/2.png', '', '', 25, 28, '', '', 'T', false, 300, '', false, false, 1, false, false, false);

            $cabeza = '';

    
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
                            <td style="height: 70px;" class="border_c">
                            <h2>'.$GLOBALS['fecha_autorizacion'].'</h2></td>
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

    $pdf->SetAutoPageBreak(TRUE, 85);

    $html = '';

    $html_2 = '
    <style>
        .border_c{
            border-style: solid solid solid solid;
            border-width: 1px;
            border-radius: 1px 1px 1px 1px;
        }

        .border_b{
            border-bottom-style: solid;
            border-bottom-width: 1px;
        }

        td{
            font-size: 5px;
        }
    </style>

    <h3 align="center">INFORME DE COMPATIBILIDAD URBANÍSTICA</h3>

    <p>OBSERVACIONES DE INFORME DE COMPATIBILIDAD URBANISTICA (Continuación)</p>
    
    <table cellspacing="2" cellpadding="3">
        <tr>
            <td align="justify" class="border_c">'.$dictamen.'</td>
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