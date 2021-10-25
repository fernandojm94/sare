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
  
       ob_start();

    require_once('../../assets/TCPDF/tcpdf.php');

    class MYPDF extends TCPDF {
        
        //Page header

        public function Header() {
            // $this->SetY(-215); 
            $this->SetFont('times', 'R', 12);
            
            global $expediente;
            global $datos_generales;
            global $establecimiento;
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
                        <td rowspan="4" width="75%" align="center"><img width="320" src="../../img/sde.png"></td>
                        <td align="center" width="25%">2021</td>
                    </tr>
                    <tr>
                        <td style="color: lightgrey;" rowspan="2" align="center">Firma</td>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>
                    <tr>
                        <td align="center">2022</td>
                    </tr>
                    <tr>
                        <td align="center" style="font-size: 14px;"><b>LICENCIA</b></td>
                        <td style="color: lightgrey;" rowspan="2" align="center">Firma</td>
                    </tr>
                    <tr>
                        <td align="right"><b>Folio:</b> '.$expediente['folio'] .'</td>
                        
                    </tr>
                    <tr>
                        <td><b> Nombre del Establecimiento:</b> '.$establecimiento['nombre_comercial'].'</td>
                        <td align="center">2023</td>
                    </tr>
                    <tr>
                        <td><b> Giro:</b> '.$establecimiento['giro_scian'].'</td>
                        <td style="color: lightgrey;" rowspan="2" align="center">Firma</td>
                    </tr>
                    <tr>
                        <td><b> Nombre:</b> '.$datos_generales['nombre'].'</td>
                    </tr>
                    <tr>
                        <td><b> Domicilio:</b> '.$datos_generales['domicilio'].'</td>
                        <td align="center">2024</td>
                    </tr>
                    <tr>
                        <td><b> Fecha:</b> '.$expediente['fecha_apertura'].'</td>
                        <td style="color: lightgrey;" rowspan="2" align="center">Firma</td>
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

    $pdf->Output($_SERVER['DOCUMENT_ROOT'] . '/assets/expedientes/'.$expediente['folio'].'/docs/documentacion/Licencia.pdf', 'FI');
    
?>