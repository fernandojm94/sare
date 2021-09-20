<?php
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

    require_once('../../assets/TCPDF/tcpdf.php');

    class MYPDF extends TCPDF {
        
        //Page header
        public function Header() {
            
        }  

        // Page footer
        public function Footer() {
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
                            font-size: 7px;
                        }
                    </style>

                    <table>
                        <tr bgcolor="#f2f2f2">
                            <td style="width:12%;">
                                <span>1 DE 3</span>
                            </td>
                            <td style="width:80%;"><b>
                                Aguascalientes, Estado Líder en facilidades para hacer negocios con estándares internacionales</b>
                            </td>
                            <td style="width:12%;">
                                <table>
                                    <tr>
                                        <td align="right" style="font-size: 6px;">FUSARE_BR</td>
                                    </tr>
                                    <tr>
                                        <td align="right" style="font-size: 6px;">Rev.01/31.05.2018</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>';

            $this->writeHTMLCell(190, '', '', 267, $pie, $border=0, $ln=2, $fill=0, $reseth=true, $align='C', $autopadding=true);

        }
    }

    $pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'LETTER', true, 'UTF-8', false);

    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

    $pdf->SetMargins(9, 7, 9, TRUE);
    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
    // $pdf->SetFont('times', '', 12, '', true);
    //$pdf->SetAutoPageBreak(TRUE, 85);

    $pdf->AddPage();

    $pdf->SetFont('times', '', 10, true);

    $header = '<table><tbody><tr><td><h4 style="text-align: center;">FORMATO ÚNICO PARA SISTEMA DE APERTURA RÁPIDA DE EMPRESAS (FUSARE)</h4></td></tr><tr><td><h5 style="text-align: center;">PARA LA OBTENCIÓN DE LICENCIA DE FUNCIONAMIENTO</h5></td></tr></tbody></table>';

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
';

$pagina_2 = '

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

    <table cellspacing="4">
        <tr>
            <td bgcolor="black" style="color: white;">
                <table cellpadding="2">
                    <tr>
                        <td align="center">
                            <b>4. CUESTIONARIO DE INFORMACIÓN BÁSICA AMBIENTAL</b>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr>
            <td>
                <table align="left">
                    <tr>
                        <td>
                            <b>COLINDANCIAS DEL PREDIO:</b>
                        </td>
                        <td>
                            <table>
                                <tr>
                                    <td width="10" class="border_c"></td>
                                    <td width="60"> HABITACIONAL</td>
                                </tr>
                            </table>
                        </td>

                        <td width="20%">
                            <table>
                                <tr>
                                    <td width="10" class="border_c"></td>
                                    <td width="90"> COMERCIOS Y SERVICIOS</td>
                                </tr>
                            </table>
                        </td>

                        <td>
                            <table>
                                <tr>
                                    <td width="10" class="border_c"></td>
                                    <td> LOTE BALDÍO</td>
                                </tr>
                            </table>
                        </td>

                        <td>
                            <table>
                                <tr>
                                    <td width="10" class="border_c"></td>
                                    <td> INDUSTRIAL</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>    
        </tr>

        <tr>
            <td style="font-size: 1px;"></td>
        </tr>

        <tr>
            <td>
                <table>
                    <tr>
                        <td>
                            <b>EQUIPO, MOBILIARIO Y MAQUINARIA NECESARIO PARA DESARROLLAR LA ACTIVIDAD</b> (características y cantidad de la misma):
                        </td>
                    </tr>
                </table>
            </td>    
        </tr>

        <tr>
            <td>
                <table border="1">
                    <tr>
                        <td height="60">
                            
                        </td>
                    </tr>
                </table>
            </td>    
        </tr>

        <tr>
            <td>
                <table>
                    <tr>
                        <td>
                            <b>MATERIAS PRIMAS, MATERIALES Y PRODUCTOS UTILIZADOS EN EL DESARROLLO DE LA ACTIVIDAD</b> (anexar características):
                        </td>
                    </tr>
                </table>
            </td>    
        </tr>

        <tr>
            <td>
                <table border="1">
                    <tr>
                        <td height="60">
                            
                        </td>
                    </tr>
                </table>
            </td>    
        </tr>

        <tr>
            <td>
                <table align="left">
                    <tr>
                        <td width="12%">
                            <b>COMBUSTIBLES:</b>
                        </td>

                        <td width="8%">
                            <table>
                                <tr>
                                    <td width="10" class="border_c"></td>
                                    <td width="60"> GAS L.P.</td>
                                </tr>
                            </table>
                        </td>

                        <td width="10%">
                            <table>
                                <tr>
                                    <td width="10" class="border_c"></td>
                                    <td width="90"> GASOLINA</td>
                                </tr>
                            </table>
                        </td>

                        <td width="9%">
                            <table>
                                <tr>
                                    <td width="10" class="border_c"></td>
                                    <td width="30"> DIESEL</td>
                                </tr>
                            </table>
                        </td>

                        <td width="7%">
                            <table>
                                <tr>
                                    <td width="10" class="border_c"></td>
                                    <td width="25"> LEÑA</td>
                                </tr>
                            </table>
                        </td>

                        <td width="9%">
                            <table>
                                <tr>
                                    <td width="10" class="border_c"></td>
                                    <td width="35"> CARBÓN</td>
                                </tr>
                            </table>
                        </td>

                        <td width="13%">
                            <table>
                                <tr>
                                    <td width="10" class="border_c"></td>
                                    <td width="60"> COMBUSTOLEO</td>
                                </tr>
                            </table>
                        </td>

                        <td width="12%">
                            <table>
                                <tr>
                                    <td width="10" class="border_c"></td>
                                    <td width="70"> GAS NATURAL</td>
                                </tr>
                            </table>
                        </td>

                        <td width="7%">
                            <table>
                                <tr>
                                    <td width="10" class="border_c"></td>
                                    <td width="25"> OTRO:</td>
                                </tr>
                            </table>
                        </td>
                        <td width="13%" class="border_b"></td>
                    </tr>
                </table>
            </td>    
        </tr>

        <tr>
            <td>
                <table align="left" bgcolor="#f2f2f2">
                    <tr><td style="font-size: 5px;"></td></tr>
                    <tr>
                        <td width="14%">
                            <b>AGUA RESIDUAL:</b>
                        </td>

                        <td width="8%">
                            <table>
                                <tr>
                                    <td width="10" class="border_c"></td>
                                    <td width="60"> NO</td>
                                </tr>
                            </table>
                        </td>

                        <td width="19%">
                            <table>
                                <tr>
                                    <td width="10" class="border_c"></td>
                                    <td width="90"> SÍ (especificar tipos) TIPOS:</td>
                                </tr>
                            </table>
                        </td>

                        <td width="20%">
                            <table>
                                <tr>
                                    <td width="10" class="border_c"></td>
                                    <td width="100"> SANITARIOS Y SERVICIOS</td>
                                </tr>
                            </table>
                        </td>

                        <td width="9%">
                            <table>
                                <tr>
                                    <td width="10" class="border_c"></td>
                                    <td width="40"> PROCESO</td>
                                </tr>
                            </table>
                        </td>

                        <td width="7%">
                            <table>
                                <tr>
                                    <td width="10" class="border_c"></td>
                                    <td width="25"> OTRO:</td>
                                </tr>
                            </table>
                        </td>
                        <td width="23%" class="border_b"></td>
                    </tr>
                    <tr><td style="font-size: 5px;"></td></tr>
                </table>
            </td>    
        </tr>

        <tr>
            <td width="40%">
                <table>
                    <tr>
                        <td align="center" rowspan="3">RESIDUOS GENERADOS:</td>
                        <td width="17%">LÍQUIDOS:</td>
                        <td width="22%">
                            <table>
                                <tr>
                                    <td width="9" class="border_c"></td>
                                    <td width="35"> ACEITES</td>
                                </tr>
                            </table>
                        </td>

                        <td width="40%">
                            <table>
                                <tr>
                                    <td width="9" class="border_c"></td>
                                    <td width="45"> SOLVENTES</td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <tr><td style="font-size: 5px;"></td></tr>

                    <tr>
                        <td></td>
                        <td width="22%">
                            <table>
                                <tr>
                                    <td width="9" class="border_c"></td>
                                    <td width="35"> GRASAS</td>
                                </tr>
                            </table>
                        </td>

                        <td>
                            <table>
                                <tr>
                                    <td width="9" class="border_c"></td>
                                    <td width="45"> QUÍMICOS</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>   
            </td>

            <td width="60%">
                <table>
                    <tr>
                        <td width="10%" rowspan="3">SÓLIDOS:</td>
                        <td width="14%">
                            <table>
                                <tr>
                                    <td width="9" class="border_c"></td>
                                    <td width="33"> ESTOPAS</td>
                                </tr>
                            </table>
                        </td>

                        <td width="11%">
                            <table>
                                <tr>
                                    <td width="9" class="border_c"></td>
                                    <td width="24"> PAPEL</td>
                                </tr>
                            </table>
                        </td>

                        <td width="15%">
                            <table>
                                <tr>
                                    <td width="9" class="border_c"></td>
                                    <td width="34"> LLANTAS</td>
                                </tr>
                            </table>
                        </td>

                        <td width="13%">
                            <table>
                                <tr>
                                    <td width="9" class="border_c"></td>
                                    <td width="31"> CARTÓN</td>
                                </tr>
                            </table>
                        </td>

                        <td width="37%">
                            <table>
                                <tr>
                                    <td width="9" class="border_c"></td>
                                    <td width="93"> RESIDUOS HOSPITALARIOS</td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <tr><td colspan="6" style="font-size: 5px;"></td></tr>

                    <tr>
                        <td width="14%">
                            <table>
                                <tr>
                                    <td width="9" class="border_c"></td>
                                    <td width="33"> ASERRÍN</td>
                                </tr>
                            </table>
                        </td>

                        <td width="17%">
                            <table>
                                <tr>
                                    <td width="9" class="border_c"></td>
                                    <td width="41"> CHATARRA</td>
                                </tr>
                            </table>
                        </td>

                        <td width="12%">
                            <table>
                                <tr>
                                    <td width="9" class="border_c"></td>
                                    <td width="26"> LODOS</td>
                                </tr>
                            </table>
                        </td>

                        <td width="16%">
                            <table>
                                <tr>
                                    <td width="9" class="border_c"></td>
                                    <td width="40"> PLÁSTICOS</td>
                                </tr>
                            </table>
                        </td>

                        <td width="28%">
                            <table>
                                <tr>
                                    <td width="9" class="border_c"></td>
                                    <td width="77"> BASURA DE LIMPIEZA</td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <tr><td colspan="6" style="font-size: 5px;"></td></tr>

                    <tr>
                        <td></td>
                        <td width="14%">
                            <table>
                                <tr>
                                    <td width="9" class="border_c"></td>
                                    <td width="33"> MADERA</td>
                                </tr>
                            </table>
                        </td>

                        <td width="12%">
                            <table>
                                <tr>
                                    <td width="9" class="border_c"></td>
                                    <td width="27"> VIDRIO</td>
                                </tr>
                            </table>
                        </td>

                        <td width="18%">
                            <table>
                                <tr>
                                    <td width="9" class="border_c"></td>
                                    <td width="45"> ESCOMBRO</td>
                                </tr>
                            </table>
                        </td>

                        <td></td>
                        <td></td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr>
            <td width="100%">
                <table>
                    <tr>
                        <td>
                            <b>MANEJO Y DISPOSICIÓN FINAL DE LOS RESIDUOS ARRIBA MENCIONADOS:</b>
                        </td>
                    </tr>
                </table>
            </td>    
        </tr>

        <tr>
            <td>
                <table>
                    <tr>
                        <td width="7%">LÍQUIDOS:</td>
                        <td width="10%">
                            <table>
                                <tr>
                                    <td width="9" class="border_c"></td>
                                    <td width="45"> DRENAJE</td>
                                </tr>
                            </table>
                        </td>
                        <td width="7%">
                            <table>
                                <tr>
                                    <td width="9" class="border_c"></td>
                                    <td width="45"> OTRO:</td>
                                </tr>
                            </table>
                        </td>
                        <td class="border_b"></td>
                        <td align="right">SÓLIDOS:</td>
                        <td width="12%">
                            <table>
                                <tr>
                                    <td width="9" class="border_c"></td>
                                    <td width="50"> CONTENEDOR</td>
                                </tr>
                            </table>
                        </td>
                        <td width="18%">
                            <table>
                                <tr>
                                    <td width="9" class="border_c"></td>
                                    <td width="90"> RELLENOS SANITARIOS</td>
                                </tr>
                            </table>
                        </td>
                        <td width="18%">
                            <table>
                                <tr>
                                    <td width="9" class="border_c"></td>
                                    <td width="90"> REUSO O RECICLAJE</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr>
            <td>
                <table>
                    <tr>
                        <td rowspan="3" width="7%">
                            <b>RUIDO:</b>
                        </td>
                        <td width="12%">
                            <table>
                                <tr>
                                    <td width="9" class="border_c"></td>
                                    <td width="90"> COMPRESORES</td>
                                </tr>
                            </table>
                        </td>

                        <td>
                            <table>
                                <tr>
                                    <td width="9" class="border_c"></td>
                                    <td width="90"> MOTORES</td>
                                </tr>
                            </table>
                        </td>

                        <td>
                            <table>
                                <tr>
                                    <td width="9" class="border_c"></td>
                                    <td width="90"> CIZALLAS</td>
                                </tr>
                            </table>
                        </td>

                        <td>
                            <table>
                                <tr>
                                    <td width="9" class="border_c"></td>
                                    <td width="90"> TALADRO</td>
                                </tr>
                            </table>
                        </td>

                        <td width="8%">
                            <table>
                                <tr>
                                    <td width="9" class="border_c"></td>
                                    <td width="90"> RAUTER</td>
                                </tr>
                            </table>
                        </td>

                        <td width="14%">
                            <table>
                                <tr>
                                    <td width="9" class="border_c"></td>
                                    <td width="90"> SIERRA DE BANCO</td>
                                </tr>
                            </table>
                        </td>

                        <td width="12%">
                            <table>
                                <tr>
                                    <td width="9" class="border_c"></td>
                                    <td width="90"> CANTEADORA</td>
                                </tr>
                            </table>
                        </td>

                        <td>
                            <table>
                                <tr>
                                    <td width="9" class="border_c"></td>
                                    <td width="90"> PULIDORA</td>
                                </tr>
                            </table>
                        </td>

                        <td>
                            <table>
                                <tr>
                                    <td width="9" class="border_c"></td>
                                    <td width="90"> TORNO</td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <tr><td style="font-size: 5px;"></td></tr>

                    <tr>
                        <td width="22%">
                            <table>
                                <tr>
                                    <td width="9" class="border_c"></td>
                                    <td width="120"> COMPRESOR DE REFRIGERADOR</td>
                                </tr>
                            </table>
                        </td>

                        <td width="18%">
                            <table>
                                <tr>
                                    <td width="9" class="border_c"></td>
                                    <td width="90"> SIERRA DE MANO</td>
                                </tr>
                            </table>
                        </td>

                        <td width="11%">OTRO (especificar):</td>
                        <td width="42%" class="border_b"></td>
                    </tr>
                </table>
            </td>    
        </tr>

        <tr>
            <td>
                <table>
                    <tr>
                        <td align="center" rowspan="3" width="18%">
                            <b>ELEMENTOS DE RIESGO:</b>
                            <span>(La actividad a desarrollar se encuentra cerca de)</span>
                        </td>

                        <td width="34%">
                            <table>
                                <tr>
                                    <td width="9" class="border_c"></td>
                                    <td width="165"> FALLA O FRACTURA GEOLOGICA (a menos de 30m)</td>
                                </tr>
                            </table>
                        </td>

                        <td width="32%">
                            <table>
                                <tr>
                                    <td width="9" class="border_c"></td>
                                    <td width="165"> CAUCE DE UN RIO O ZONA INUNDABLE (500m)</td>
                                </tr>
                            </table>
                        </td>

                        <td>
                            <table>
                                <tr>
                                    <td width="9" class="border_c"></td>
                                    <td width="90"> ESCUELAS (500m)</td>
                                </tr>
                            </table>
                        </td>

                    </tr>

                    <tr><td style="font-size: 5px;"></td></tr>

                    <tr>
                        <td width="34%">
                            <table>
                                <tr>
                                    <td width="9" class="border_c"></td>
                                    <td width="170"> DUCTO DE PEMEX, GASOLINERA O GASERA (500m)</td>
                                </tr>
                            </table>
                        </td>

                        <td width="16%">
                            <table>
                                <tr>
                                    <td width="9" class="border_c"></td>
                                    <td width="90"> HOSPITALES (500m)</td>
                                </tr>
                            </table>
                        </td>

                        <td width="22%">
                            <table>
                                <tr>
                                    <td width="9" class="border_c"></td>
                                    <td width="120"> VIAS DE FERROCARRIL (500m)</td>
                                </tr>
                            </table>
                        </td>

                        <td width="18%">
                            <table>
                                <tr>
                                    <td width="9" class="border_c"></td>
                                    <td width="90"> NINGUNA</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>    
        </tr>

        <tr>
            <td bgcolor="black">
                <table>
                    <tr>
                        <td>
                            
                        </td>
                    </tr>
                </table>
            </td>    
        </tr>

        <tr>
            <td>
                <table>
                    <tr>
                        <td>
                            espacio en blanco
                        </td>
                    </tr>
                </table>
            </td>    
        </tr>

        <tr>
            <td>
                <table>
                    <tr>
                        <td>
                            <b>MANIFIESTO BAJO FORMAL PROTESTA DE DECIR VERDAD, QUE LOS DATOS ASENTADOS EN LA PRESENTE SOLICITUD SON CIERTOS Y VERIFICABLES EN CUALQUIER MOMENTO POR LAS AUTORIDADES COMPETENTES. HE LEÍDO, ENTIENDO Y ESTOY DE ACUERDO EN CUMPLIR CON LA NORMATIVIDAD APLICABLE A LA ACTIVIDAD ECONÓMICA A REALIZAR.</b>
                        </td>
                    </tr>
                </table>
            </td>    
        </tr>

        <tr>
            <td>
                <table>
                    <tr>
                        <td>
                            <b align="center">COSAS PARA FIRMAS</b>
                        </td>
                    </tr>
                </table>
            </td>    
        </tr>

        <tr>
            <td bgcolor="black" style="color: white;">
                <table>
                    <tr>
                        <td align="center">
                            <b align="center">REQUISITOS:</b>
                        </td>
                    </tr>
                </table>
            </td>    
        </tr>

        <tr>
            <td>
                <table>
                    <tr>
                        <td>
                            <b>TABLA DE REQUISITOS</b>
                        </td>
                    </tr>
                </table>
            </td>    
        </tr>

        <tr>
            <td>
                <table>
                    <tr>
                        <td>
                            <b>NOTAS</b>
                        </td>
                    </tr>
                </table>
            </td>    
        </tr>
    </table>    
';

    // output the HTML content
    $pdf->writeHTML($header, false, false, false, false, '');
    $pdf->writeHTML($html_1, false, false, false, false, '');
    $pdf->writeHTML($html_2, false, false, false, false, '');
    $pdf->writeHTML($croquis, false, false, false, false, '');
    // --- Rotation --------------------------------------------
    
    // Start Transformation
    $pdf->StartTransform();
    $pdf->Rotate(90, 40, 215);
    $pdf->SetFont('times', '', 8, '', true);
    $pdf->Text(0, 180, 'Formato coordinado por el Instituto Estatal de Gestión Empresarial y Mejora Regulatoria conjuntamente con las dependencias estatales y municipales involucradas de los 11 municipios del estado.');
    $pdf->StopTransform();

    // Start Transformation
    $pdf->StartTransform();
    $pdf->Rotate(90, 72, 110);
    $pdf->SetFont('times', '', 8, '', true);
    $pdf->Text(0, 245, 'Formato de Libre Reproducción en hoja blanca, tamaño carta y papel bond');
    $pdf->StopTransform();

    $pdf->Image('../../img/escudo_estado.png', 9, 9.4, 15.5, 18, '', '', 'T', false, 300, '', false, false, 0, false, false, false);
    $pdf->Image('../../img/escudos_municipios.png', '', 15, 95, 12, '', '', 'T', false, 300, '', false, false, 0, false, false, false);
    //$pdf->AddPage();
    //$pdf->writeHTML($pagina_2, false, false, false, false, '');

    //$pdf->AddPage();
    //$pdf->writeHTML($pagina_2, false, false, false, false, '');

    $pdf->Output($_SERVER['DOCUMENT_ROOT'] . '/assets/expedientes/'.$folio_str.'/docs/documentacion/Informe.pdf', 'FI');
    
?>