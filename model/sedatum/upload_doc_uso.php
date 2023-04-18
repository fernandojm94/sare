<?php
    $id = $_POST['id_solicitud'];
    $folio_str = $_POST['folio'];
    $dictamen = $_POST['dictamen'];    

    $ruta = "../../assets/expedientes/".$folio_str."/docs/documentacion/";
	$uso = $ruta.'/'.basename($_FILES['file_uso']['name']);
	if(!is_dir($ruta))
	{
		mkdir($ruta,0777, true);
	}
		
	if(move_uploaded_file($_FILES['file_uso']['tmp_name'], $uso))
	{
		$mensaje = "correcto";
	}else{
		$mensaje = "error6";
	}
    
    $dictamenLen = strip_tags($dictamen);
    $dictamenLen = substr($dictamenLen, 0, 450);
    
    $fecha_autorizacion = date('d / m / Y');
    ob_start();

	use \setasign\Fpdi\Tcpdf\Fpdi;
    require_once('../../assets/TCPDF/tcpdf.php');
    require_once('../../assets/FPDI/src/autoload.php');

class MYPDF extends TCPDF {
        
        //Page header
        public function Header() {
            // $today = str_replace('.', ' / ', date("d.m.Y"));
            // $this->SetY(-215); 
            $this->SetFont('times', 'R', 14);
            

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

                    ';

            $this->writeHTMLCell('', '', '', 275, $pie, $border=0, $ln=2, $fill=0, $reseth=true, $align='C', $autopadding=true);

        }
    }

    //$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'LEGAL', true, 'UTF-8', false);
    $pdf = new Fpdi(PDF_PAGE_ORIENTATION, PDF_UNIT, 'LEGAL', true, 'UTF-8', false);
	$pdf->AddPage();
	$pdf->setSourceFile("../../assets/expedientes/".$folio_str."/docs/documentacion/".basename($_FILES['file_uso']['name']));
	$template = $pdf->importPage(1);
	$pdf->useImportedPage($template, 0, 0);

    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

    $pdf->SetMargins(10, 15, 10, TRUE);
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

    $pdf->SetFont('times', '', 12, '', true);

    $pdf->SetAutoPageBreak(TRUE, 35);

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
    </style>
    <table cellspacing="2" cellpadding="3">
	    <tr>
            <td style="width: 50%;">
            	<img src="../../img/informe.png" />
            </td>            
        </tr>
		<tr>
			<td style="width: 100%;" align="center"><h3>INFORME DE COMPATIBILIDAD URBANÍSTICA</h3></td>
		</tr>
		<tr>
			<td style="width: 100%;"><p>OBSERVACIONES DE INFORME DE COMPATIBILIDAD URBANISTICA (Continuación)</p></td>
		</tr>

        <tr>
            <td align="justify" style="height: 550px; width: 100%; style="font-size: 5px;"" class="border_c">'.$dictamen.'</td>
        </tr>
        <tr>
            <td style="width: 12%;"><h6>DICTAMINA</h6></td>
            <td style="width: 12%;"><h6>REVISA</h6></td>
            <td style="width: 56%;" align="center"><h6>AUTORIZA</h6></td>
            <td style="width: 20%;"><h6 style="font-size: 6px;">FECHA DE AUTORIZACIÓN</h6></td>
        </tr>
        <tr>
            <td style="height: 70px;" class="border_c"></td>
            <td style="height: 70px;" class="border_c"></td>
            <td style="height: 70px; font-size: 8px;" class="border_c" align="center"><br><br><br><br><br>____________________________________________________<br>Lic. José Refugio Muñoz López<br>Secretario de Desarrollo Agrario, Territorial y Urbano</td>
            <td style="height: 70px;" class="border_c">
            <h2>'.$GLOBALS['fecha_autorizacion'].'</h2></td>
            
        </tr>
        <tr>
        	<td style="width: 100%;">
            	<h6 align="justify" style="font-size: 6px;">EL INFORME DE COMPATIBILIDAD URBANÍSTICA NO CONSTITUYE APEO Y DESLINDE RESPECTO DEL INMUEBLE, NO ACREDITA LA PROPIEDAD O POSESIÓN DEL MISMO. ART. 177 DEL CÓDIGO URBANO PARA EL ESTADO DE AGUASCALIENTES. ESTE INFORME NO TENDRA VALIDEZ LEGAL PARA REALIZAR TRÁMITE ALGUNO. EL INFORME DE COMPATIBILIDAD URBANÍSTICA TENDRÁ VIGENCIA DE UN AÑO CONTANDO A PARTIR DE LA FECHA DE EXPEDICIÓN ART. 172 DEL CÓDIGO URBANO PARA EL ESTADO DE AGUASCALIENTES. NO SERÁ VALIDO DE PRESENTAR TACHADURAS O ENMENDADURAS.</h6>
            </td>
		</tr>
    </table>';
    $pdf->AddPage();
    $pdf->writeHTML($html_2, true, false, true, false, '');

    $pdf->Ln(0, false);
    $pdf->SetFont('times', '', 12, '', true);

    

    $pdf->Ln(25, false);
    $pdf->SetFont('times', '', 14, '', true);

$pdf->Output($_SERVER['DOCUMENT_ROOT'] . '/assets/expedientes/'.$folio_str.'/docs/documentacion/Informe.pdf', 'F');

echo $mensaje;