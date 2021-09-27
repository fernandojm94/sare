<?php
use setasign\Fpdi;

require_once('../../assets/TCPDF/tcpdf.php');
require_once('../../assets/FPDI/src/autoload.php');

include('../../model/solicitud/fill.php');

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
    $dictamenLen = substr($dictamenLen, 0, 550);
    
    $fecha_autorizacion = date('d / m / Y');
    ob_start();

class Pdf extends Fpdi\Tcpdf\Fpdi {}

$header = '
    <table>
        <tbody>
            <tr>
                <td><h4 style="text-align: center;">FORMATO ÚNICO PARA SISTEMA DE APERTURA RÁPIDA DE EMPRESAS (FUSARE)
                    </h4></td>
            </tr>
            <tr>
                <td><h5 style="text-align: center;">PARA LA OBTENCIÓN DE LICENCIA DE FUNCIONAMIENTO
                    </h5></td>
            </tr>
        </tbody>
    </table>
';

$pie = '
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
            font-size: 7px;
        }
    </style>
    <table><tr bgcolor="#f2f2f2"><td style="width:12%;"><span>1 DE 3</span></td><td style="width:76%;"><b>Aguascalientes, Estado Líder en facilidades para hacer negocios con estándares internacionales</b></td><td style="width:12%;"><table><tr><td align="right" style="font-size: 6px;">FUSARE_BR</td></tr><tr><td align="right" style="font-size: 6px;">Rev.01/31.05.2018</td></tr></table></td></tr></table>';

$html_1 = '
    <style type="text/css">
        .border_b{
            border-bottom-style: solid;
            border-bottom-width: 1px;
        }

        td{
            font-size: 7px;
            font-weight: 100;
        }
    </style>

    <table>
        <tr>
            <td class="border_b">
                <table>
                    <tr>
                        <td style="width: 60%"></td>
                        <td style="width: 40%">
                            <table cellspacing="5">
                                <tr>
                                    <td align="center" bgcolor="#d9d9d9" style="font-size: 8px;">FECHA DE INGRESO</td>
                                    <td align="center" bgcolor="#d9d9d9" style="font-size: 8px;">FOLIO NO.</td>
                                </tr>
                                <tr>
                                    <td align="center" class="border_b" style="font-size: 9px;">20 / 09 / 1994</td>
                                    <td align="center" class="border_b" style="font-size: 9px;">SARE-98987</td>
                                </tr>
                            </table>     
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr><td align="justify" style="font-size: 4px;"></td></tr>
        <tr><td align="justify" style="font-size: 5.5px">Como lo dispone el artículo 6° párrafo segundo, fracción II de la Constitución Política de los Estados Unidos Mexicanos; 1°, 2°, 3° fracción I, 23 fracciones II, III y IV, 24, 26, 27 y 71 fracción III, incisos f) y g) de la Ley de Transparencia y Acceso a la Información Pública del Estado de Aguascalientes, se hace del conocimiento del solicitante que sus datos personales contenidos en el Sistema de Apertura Rápida de Empresas, serán tratados para procesar su solicitud y conocidos por las dependencias Estatales y Municipales correspondientes en el ejercicio de sus funciones, cuya finalidad es expedir la Constancia de Alineamiento y Compatibilidad Urbanística, Número Oficial (en caso de no contar con el), Licencia de Funcionamiento y otros trámites relacionados. Asimismo se le informa que sus datos personales no podrán ser difundidos salvo que otorgue su consentimiento expreso por escrito o por un medio de autenticidad similar.</td></tr>

        <tr>
            <td style="font-size: 4px;"></td>
        </tr>
    </table>

    <table cellspacing="4">
        <!--PERSONAS FÍSICAS-->
        <tr>
            <th align="center" bgcolor="black" style="color: white;"><h5>1. INFORMACIÓN PERSONAS FÍSICAS</h5></th>
        </tr>

        <tr>
            <td>
                <table>
                    <tr>
                        <td width="6%">NOMBRE:</td>
                        <td width="54%" class="border_b"></td>
                        <td width="3%">RFC:</td>
                        <td class="border_b"></td>
                        <td width="4%">CURP:</td>
                        <td class="border_b"></td>
                    </tr>
                </table>
            </td>
        </tr>    
        <tr>
            <td>
                <table>
                    <tr>
                        <td width="16%">DOMICILIO PARTICULAR:</td>
                        <td width="60%" class="border_b"></td>
                        <td width="6%">NO. EXT:</td>
                        <td width="6%" class="border_b"></td>
                        <td width="6%">NO. INT:</td>
                        <td width="6%" class="border_b"></td>
                    </tr>
                </table>
            </td> 
        </tr>
        <tr>    
            <td>
                <table>
                    <tr>
                        <td width="7%">COLONIA:</td>
                        <td width="22%" class="border_b"></td>
                        <td width="8%">MUNICIPIO:</td>
                        <td width="22%" class="border_b"></td>
                        <td width="8%">LOCALIDAD:</td>
                        <td width="22%" class="border_b"></td>
                        <td width="3%">C.P.:</td>
                        <td width="8%" class="border_b"></td>
                    </tr>
                </table>
            </td> 
        </tr>
        <tr>
            <td>
                <table>
                    <tr>
                        <td width="7%">ESTADO:</td>
                        <td width="22%" class="border_b"></td>
                        <td width="8%">TELÉFONO:</td>
                        <td width="22%" class="border_b"></td>
                        <td width="6%">EMAIL:</td>
                        <td width="35%" class="border_b"></td>
                    </tr>
                </table>
            </td>     
        </tr>

        <tr>
            <th align="center" bgcolor="black" style="color: white;"><h5>2. INFORMACIÓN PERSONAS MORALES</h5></th>
        </tr>

        <tr>
            <td>
                <table>
                    <tr>
                        <td width="17%">NOMBRE DE LA EMPRESA:</td>
                        <td width="54%" class="border_b"></td>
                        <td width="17%">FECHA DE CONSTITUCIÓN:</td>
                        <td width="12%" class="border_b"></td>
                    </tr>
                </table>
            </td>
        </tr>    
        <tr>
            <td>
                <table>
                    <tr>
                        <td width="3%">RFC:</td>
                        <td width="25%" class="border_b"></td>
                        <td width="7%">TELÉFONO:</td>
                        <td width="24%" class="border_b"></td>
                        <td width="6%">EMAIL:</td>
                        <td width="35%" class="border_b"></td>
                    </tr>
                </table>
            </td> 
        </tr>
        <tr>    
            <td>
                <table>
                    <tr>
                        <td><b>DATOS REPRESENTANTE LEGAL</b></td>
                    </tr>
                </table>
            </td> 
        </tr>
        <tr>
            <td>
                <table>
                    <tr>
                        <td width="6%">NOMBRE:</td>
                        <td width="54%" class="border_b"></td>
                        <td width="3%">RFC:</td>
                        <td class="border_b"></td>
                        <td width="4%">CURP:</td>
                        <td class="border_b"></td>
                    </tr>
                </table>
            </td>     
        </tr>
        <tr>
            <td>
                <table>
                    <tr>
                        <td width="8%">DOMICILIO:</td>
                        <td width="68%" class="border_b"></td>
                        <td width="6%">NO. EXT:</td>
                        <td width="6%" class="border_b"></td>
                        <td width="6%">NO. INT:</td>
                        <td width="6%" class="border_b"></td>
                    </tr>
                </table>
            </td>     
        </tr>
        <tr>
            <td>
                <table>
                    <tr>
                        <td width="7%">COLONIA:</td>
                        <td width="22%" class="border_b"></td>
                        <td width="8%">MUNICIPIO:</td>
                        <td width="22%" class="border_b"></td>
                        <td width="8%">LOCALIDAD:</td>
                        <td width="22%" class="border_b"></td>
                        <td width="3%">C.P.:</td>
                        <td width="8%" class="border_b"></td>
                    </tr>
                </table>
            </td>     
        </tr>
        <tr>
            <td>
                <table>
                    <tr>
                        <td width="7%">ESTADO:</td>
                        <td width="22%" class="border_b"></td>
                        <td width="8%">TELÉFONO:</td>
                        <td width="22%" class="border_b"></td>
                        <td width="6%">EMAIL:</td>
                        <td width="35%" class="border_b"></td>
                    </tr>
                </table>
            </td>     
        </tr>

        <tr>
            <th align="center" bgcolor="black" style="color: white;"><h5>3. UBICACIÓN Y DATOS GENERALES DEL ESTABLECIMIENTO</h5></th>
        </tr>

        <tr>
            <td>
                <table>
                    <tr>
                        <td width="14%">NOMBRE COMERCIAL:</td>
                        <td width="75%" class="border_b"></td>
                        <td width="3%">C.P.:</td>
                        <td width="8%" class="border_b"></td>
                    </tr>
                </table>
            </td>
        </tr>    
        <tr>
            <td>
                <table>
                    <tr>
                        <td width="8%">DOMICILIO:</td>
                        <td width="40%" class="border_b"></td>
                        <td width="6%">NO. EXT:</td>
                        <td width="6%" class="border_b"></td>
                        <td width="6%">NO. INT:</td>
                        <td width="6%" class="border_b"></td>
                        <td width="7%">COLONIA:</td>
                        <td width="21%" class="border_b"></td>
                    </tr>
                </table>
            </td> 
        </tr>
        <tr>    
            <td>
                <table>
                    <tr>
                        <td width="13%">ENTRE LAS CALLES:</td>
                        <td width="87%" class="border_b"></td>
                    </tr>
                </table>
            </td> 
        </tr>
        <tr>
            <td>
                <table>
                    <tr>
                        <td width="8%">LOCALIDAD:</td>
                        <td width="25%" class="border_b"></td>
                        <td width="8%">MUNICIPIO:</td>
                        <td width="25%" class="border_b"></td>
                        <td width="8%">TELÉFONO:</td>
                        <td width="26%" class="border_b"></td>
                    </tr>
                </table>
            </td>     
        </tr>
        <tr>
            <td>
                <table>
                    <tr>
                        <td>CUENTA CATASTRAL:</td>
                        <td class="border_b"></td>
                        <td>CUENTA PREDIAL:</td>
                        <td class="border_b"></td>
                    </tr>
                </table>
            </td>     
        </tr>
        <tr>
            <td>
                <table>
                    <tr>
                        <td width="7%">MANZANA:</td>
                        <td width="11%" class="border_b"></td>
                        <td width="4%">LOTE:</td>
                        <td width="11%" class="border_b"></td>
                        <td width="25%">DISTANCIA A ESQUINA MÁS CERCANA:</td>
                        <td width="11%" class="border_b">m</td>
                        <td width="21%">CAJONES DE ESTABLECIMIENTO:</td>
                        <td width="10%" class="border_b"></td>
                    </tr>
                </table>
            </td>     
        </tr>
        <tr>
            <td>
                <table>
                    <tr>
                        <td width="9%">USO ACTUAL:</td>
                        <td width="91%" class="border_b"></td>
                    </tr>
                </table>
            </td>     
        </tr>
        <tr>
            <td>
                <table>
                    <tr>
                        <td width="15%" align="center">CLAVE SCIAN:</td>
                        <td width="85%" align="center">USO ESPECÍFICO PROPUESTO(DESCRIPCIÓN DE LA ACTIVIDAD)</td>
                    </tr>
                    <tr>
                        <td width="15%" align="center" class="border_b">23412341234</td>
                        <td width="85%" align="center" class="border_b">el suasdamlasdlknasdnaskbjdbjkasdbjkasd</td>
                    </tr>
                </table>
            </td>     
        </tr>
        <tr>
            <td>
                <table>
                    <tr>
                        <td width="16%"><b>SERVICIOS EXISTENTES:</b></td>
                        <td width="84%" class="border_b"></td>
                    </tr>
                </table>
            </td>     
        </tr>
    </table>
';

$croquis = '
    <style type="text/css">
        .border_c{
            border-style: solid solid solid solid;
            border-width: 1px;
        }

        .border_b{
            border-bottom-style: solid;
            border-bottom-width: 1px;
        }

        td{
            font-size: 7px;
        }
    </style>

    <table cellpadding="1">
        <tr>
            <td width="10%"><b>CROQUIS</b></td>
            <td width="90%" style="font-size: 6px;">Acotaciones en metros, identificando las calles que limitan la manzana, usos de predios colindantes(Si requiere, dibuje croquis al reverso o en anexo.)</td>
        </tr>     
        <tr>
            <td colspan="2" class="border_c">
                <table>
                    <tr>
                        <td width="25%">
                            <table cellspacing="7">
                                <tr>
                                    <td align="center" colspan="2" bgcolor="lightgrey">DIMENSIONES DEL ESTABLECIMIENTO</td>
                                </tr>
                                <tr>
                                    <td>FRENTE:</td>
                                    <td>m</td>
                                </tr>
                                <tr>
                                    <td>FONDO:</td>
                                    <td>m</td>
                                </tr>
                                <tr>
                                    <td>COSTADO:</td>
                                </tr>
                                <tr>
                                    <td>DERECHO:</td>
                                    <td>m</td>
                                </tr>
                                <tr>
                                    <td>IZQUIERDO:</td>
                                    <td>m</td>
                                </tr>
                                <tr>
                                    <td>SUPERFICIE:</td>
                                </tr>
                                <tr>
                                    <td>DEL TERRENO:</td>
                                    <td>m<span>2</span></td>
                                </tr>
                                <tr>
                                    <td>DEL LOCAL:</td>
                                    <td>m<span>2</span></td>
                                </tr>
                                <tr>
                                    <td align="center" colspan="2">
                                        <img src="../../img/lados.png" width="60">
                                    </td>
                                </tr>
                            </table>
                        </td>

                        <td width="75%">
                            <table>
                                <tr>
                                    <td align="center" colspan="3">N</td>
                                </tr>
                                <tr>
                                    <td width="5%">
                                        <table>
                                            <tr><td></td></tr>
                                            <tr><td></td></tr>
                                            <tr><td></td></tr>
                                            <tr><td></td></tr>
                                            <tr><td></td></tr>
                                            <tr><td></td></tr>
                                            <tr><td></td></tr>
                                            <tr><td></td></tr>
                                            <tr><td></td></tr>
                                            <tr><td></td></tr>
                                            <tr><td></td></tr>
                                            <tr><td></td></tr>
                                            <tr><td>O</td></tr>
                                            <tr><td></td></tr>
                                            <tr><td></td></tr>
                                            <tr><td></td></tr>
                                            <tr><td></td></tr>
                                            <tr><td></td></tr>
                                            <tr><td></td></tr>
                                            <tr><td></td></tr>
                                            <tr><td></td></tr>
                                            <tr><td></td></tr>
                                            <tr><td></td></tr>
                                            <tr><td></td></tr>
                                        </table>
                                    </td>
                                    <td width="90%" height="210" class="border_c" style="border-color: grey;"></td>
                                    <td width="5%">
                                        <table>
                                            <tr><td></td></tr>
                                            <tr><td></td></tr>
                                            <tr><td></td></tr>
                                            <tr><td></td></tr>
                                            <tr><td></td></tr>
                                            <tr><td></td></tr>
                                            <tr><td></td></tr>
                                            <tr><td></td></tr>
                                            <tr><td></td></tr>
                                            <tr><td></td></tr>
                                            <tr><td></td></tr>
                                            <tr><td></td></tr>
                                            <tr><td>E</td></tr>
                                            <tr><td></td></tr>
                                            <tr><td></td></tr>
                                            <tr><td></td></tr>
                                            <tr><td></td></tr>
                                            <tr><td></td></tr>
                                            <tr><td></td></tr>
                                            <tr><td></td></tr>
                                            <tr><td></td></tr>
                                            <tr><td></td></tr>
                                            <tr><td></td></tr>
                                            <tr><td></td></tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" colspan="3">S</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

    <table cellspacing="5">
        <tr>
            <td align="center">HORARIO DE OPERACIONES</td>
            <td></td>
        </tr>
        <tr>
            <td width="50%">
                <table border="1" cellpadding="1" align="center">
                    <tr>
                        <td>D</td>
                        <td>L</td>
                        <td>M</td>
                        <td>M</td>
                        <td>J</td>
                        <td>V</td>
                        <td>S</td>
                        <td>de</td>
                        <td></td>
                        <td>hrs a</td>
                        <td></td>
                        <td>hrs</td>
                    </tr>

                    <tr>
                        <td>D</td>
                        <td>L</td>
                        <td>M</td>
                        <td>M</td>
                        <td>J</td>
                        <td>V</td>
                        <td>S</td>
                        <td>de</td>
                        <td></td>
                        <td>hrs a</td>
                        <td></td>
                        <td>hrs</td>
                    </tr>
                </table>
            </td>

            <td width="50%">
                <table cellpadding="1">
                    <tr>
                        <td width="70%">MONTO DE LA INVERSIÓN O CAPITAL SOCIAL (M.N.):</td>
                        <td class="border_b" width="30%">$</td>
                    </tr>
                    <tr>
                        <td width="40%">PERSONAL OCUPADO(PO):</td>
                        <td class="border_b" width="25%"></td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

    <table>
        <tr><td style="font-size:35px;"></td></tr>
        <tr bgcolor="#f2f2f2">
            <td style="width:12%;">
                <span>1 DE 3</span>
            </td>
            <td align="center" style="width:76%;">
                <b>Aguascalientes, Estado Líder en facilidades para hacer negocios con estándares internacionales</b>
            </td>
            <td style="width:12%;">
                <table>
                    <tr>
                        <td align="right" style="font-size: 6px;">FUSARE_BR</td>
                    </tr>
                    <tr>
                        <td align="right" style="font-size: 6px;">
                            Rev.01/31.05.2018
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
';

$left = 'Formato coordinado por el Instituto Estatal de Gestión Empresarial y Mejora Regulatoria conjuntamente con las dependencias estatales y municipales involucradas de los 11 municipios del estado.';

$right = 'Formato de Libre Reproducción en hoja blanca, tamaño carta y papel bond.';

// Inicializa instancia de TCPDF
$tcpdf = new Pdf(PDF_PAGE_ORIENTATION, PDF_UNIT, 'LETTER', true, 'UTF-8', false);
$tcpdf->setPrintHeader(false);
$tcpdf->setPrintFooter(false);
$tcpdf->SetMargins(9, 7, 9, TRUE);
$tcpdf->SetFont('times', '', 10, true);
$tcpdf->SetAutoPageBreak(false);

$tcpdf->AddPage();
$tcpdf->writeHTML($header, false, false, false, false, '');
$tcpdf->writeHTML($html_1, false, false, false, false, '');
$tcpdf->writeHTML($croquis, false, false, false, false, '');

$tcpdf->Image('../../img/escudo_estado.png', 9, 9.4, 15.5, 18, '', '', 'T', false, 300, '', false, false, 0, false, false, false);
$tcpdf->Image('../../img/escudos_municipios.png', '', 15, 95, 12, '', '', 'T', false, 300, '', false, false, 0, false, false, false);

// Start Transformation
$tcpdf->StartTransform();
$tcpdf->Rotate(90, 40, 215);
$tcpdf->SetFont('times', '', 8, '', true);
$tcpdf->Text(0, 180, $left);
$tcpdf->StopTransform();

// Start Transformation
$tcpdf->StartTransform();
$tcpdf->Rotate(90, 72, 110);
$tcpdf->SetFont('times', '', 8, '', true);
$tcpdf->Text(0, 245, $right);
$tcpdf->StopTransform();

// Añade un pdf al pdf generado con código.
$tcpdf->AddPage();
$tcpdf->setSourceFile('FUSARE2.pdf');
$tplIdx = $tcpdf->importPage(1);
$tcpdf->useTemplate($tplIdx,0, 0, 216, 280);

// Añade un segundo pdf.
$tcpdf->AddPage();
$tcpdf->setSourceFile('FUSARE3.pdf');
$tplIdx = $tcpdf->importPage(1);
$tcpdf->useTemplate($tplIdx,0, 0, 216, 280);

// Genera el pdf completo.
$tcpdf->Output($_SERVER['DOCUMENT_ROOT'] . '/assets/expedientes/'.$folio_str.'/docs/documentacion/Fusare.pdf', 'FI');