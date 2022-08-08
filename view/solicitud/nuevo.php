<?php
    include('../../controller/funciones.php');
    include('../../model/solicitud/fill.php');
    user_login();

    $tag_pfisica = fill_pfisica();
    $tag_pmoral = fill_pmoral();

    $giros = fill_giros();
    $options = fill_options($giros);
?>

<style type="text/css">
    #servicios_chosen, .chosen-container-multi .chosen-choices li.search-field, .chosen-container-multi .chosen-choices li.search-field input[type="text"]{
        width: 100% !important;
    }
    .chosen-container, .chosen-container+.help-inline, [class*=chosen-container]{
        width: 100% !important;
    }

    .switch {
      position: relative;
      display: inline-block;
      width: 60px;
      height: 34px;
    }

    .switch input { 
      opacity: 0;
      width: 0;
      height: 0;
    }

    .slider {
      position: absolute;
      cursor: pointer;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: #ccc;
      -webkit-transition: .4s;
      transition: .4s;
    }

    .slider:before {
      position: absolute;
      content: "";
      height: 26px;
      width: 26px;
      left: 4px;
      bottom: 4px;
      background-color: white;
      -webkit-transition: .4s;
      transition: .4s;
    }

    input:checked + .slider {
      background-color: #2196F3;
    }

    input:focus + .slider {
      box-shadow: 0 0 1px #2196F3;
    }

    input:checked + .slider:before {
      -webkit-transform: translateX(26px);
      -ms-transform: translateX(26px);
      transform: translateX(26px);
    }
</style>

<div class="page-content">    
    <div class="row">
        <div class="col-xs-12">
            <div class="container-fluid">
                
                <div id="fuelux-wizard-container" class="wizard" data-initialize="wizard">

                    <div>
                        <ul class="steps">
                            <li data-step="1" class="active" onclick="salto(1)">
                                <span class="step">1</span>
                                <span class="title">Inicio</span>
                            </li>

                            <li data-step="2" onclick="salto(2)">
                                <span class="step">2</span>
                                <span id="titulo_paso" class="title">Información de personas</span>
                            </li>

                            <li data-step="3" onclick="salto(3); mapa_inicial();">
                                <span class="step">3</span>
                                <span class="title">Ubicación y datos generales del establecimiento</span>
                            </li>

                            <li data-step="4" onclick="salto(4)">
                                <span class="step">4</span>
                                <span class="title">Dimensiones del establecimiento</span>
                            </li>

                            <li data-step="5" onclick="salto(5)">
                                <span class="step">5</span>
                                <span class="title">Carga de documentos</span>
                            </li>
                        </ul>
                    </div>

                    <hr />

                    <div class="step-content pos-rel">

<!-- ------------------------------------ COMIENZA PASO 1 ---------------------------------------------------- -->

                        <div class="step-pane active" data-step="1">
                            <form class="well form-horizontal" method="post"  id="form_inicio" name="form_inicio">
                                <fieldset>
                                    <legend class="center">Selecciona el tipo de persona</legend>

                                    <div class="form-group" style="text-align: center;">
                                        <!-- <label class="col-xs-2 col-md-4 control-label"></label>   -->
                                        <div class="inputGroupContainer" style="display: flex; justify-content: center;">
                                            <div class="input-group">
                                                <label style="margin: 5px;">
                                                    <input id="tipo_persona" name="tipo_persona" type="radio" class="ace input-lg" value="p_fisica"/>
                                                    <span class="lbl bigger-120"> Persona Física</span>
                                                </label>

                                                 <label style="margin: 5px;">
                                                    <input id="tipo_persona" name="tipo_persona" type="radio" class="ace input-lg" value="p_moral"/>
                                                    <span class="lbl bigger-120"> Persona Moral</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>                                    
                                </fieldset>
                            </form>
                        </div>

<!-- ------------------------------------ COMIENZA PASO 2 ---------------------------------------------------- -->

                        <div id="div_fisicas" class="step-pane">
                            <form class="well form-horizontal" method="post"  id="form_fisica" name="form_fisica">
                                <fieldset>
                                    <legend class="center">Información Personas Físicas</legend>

                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Nombre completo</label>  
                                        <div class="col-md-4 inputGroupContainer">
                                            <div class="input-group">
                                                <input type="hidden" name="id_solicitud" id="id_solicitud" />
                                                <input  name="nombre" id="nombre" placeholder="Nombre completo" class="form-control" type="text" required/>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="ocultos_fisica"></div>
                                    <div id="loading"></div>
                                    
                                </fieldset>
                            </form>
                        </div>
                        

                        <!-- PERSONAS MORALES  -->
                        <div id="div_morales" class="step-pane">
                            <form class="well form-horizontal" method="post"  id="form_moral" name="form_moral">
                                <fieldset>
                                    <legend class="center">Información Personas Morales</legend>

                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Nombre de la empresa</label>  
                                        <div class="col-md-4 inputGroupContainer">
                                            <div class="input-group">
                                                <input type="hidden" name="id_solicitud" id="id_solicitud" />
                                                <input  name="nombre_empresa" id="nombre_empresa" placeholder="Nombre de la empresa" class="form-control" type="text" required/>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="ocultos_moral"></div>
                                    <div id="loading_moral"></div>


                                    
                                </fieldset>
                            </form>
                        </div>

<!-- ------------------------------------ COMIENZA PASO 3 ---------------------------------------------------- -->


                        <div class="step-pane" data-step="3">
                            <form class="well form-horizontal" method="post"  id="form_dg" name="form_dg">
                                <fieldset>
                                    <legend class="center">Ubicación y Datos Generales del Establecimiento</legend>                                    

                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Nombre comercial</label>  
                                        <div class="col-md-4 inputGroupContainer">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-building"></i></span>
                                                <input type="hidden" name="id_solicitud" id="id_solicitud" />
                                                <input  name="nombre_comercial" id="nombre_comercial" placeholder="Nombre de la empresa" class="form-control" type="text" required/>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Fecha de constitución</label>  
                                        <div class="col-md-4 inputGroupContainer">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-building"></i></span>
                                                <input  name="horario_trabajo" id="horario_trabajo" placeholder="Fecha de constitución" class="form-control date_picker" type="text" required/>
                                            </div>
                                        </div>
                                    </div>

                                    <h3 class="header smaller lighter center"></h3>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Calle</label>
                                        <div class="col-md-4 inputGroupContainer">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                                                <input  name="calle_dg" id="calle_dg" placeholder="Calle" class="form-control" type="text" required/>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-4 control-label">No. Exterior - No. Interior</label>  
                                        <div class="col-md-2 inputGroupContainer">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                                                <input  name="no_ex_dg" id="no_ex_dg" placeholder="No. Exterior" class="form-control" type="number" required/>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-2 inputGroupContainer">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                                                <input  name="no_int_dg" id="no_int_dg" placeholder="No. Interior" class="form-control" type="text"/>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Colonia</label>  
                                        <div class="col-md-4 inputGroupContainer">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                                                <input  name="colonia_dg" id="colonia_dg" placeholder="Colonia" class="form-control" type="text" required/>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Entre calles</label>  
                                        <div class="col-md-4 inputGroupContainer">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                                                <input name="entre_calles" id="entre_calles" placeholder="Entre calles" class="form-control" type="text" required/>
                                            </div>
                                        </div>
                                    </div>
                                    

                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Municipio</label>  
                                        <div class="col-md-4 inputGroupContainer">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                                                <input  name="municipio_dg" id="municipio_dg" placeholder="Municipio" class="form-control" type="text" value="Jesús María" required readonly/>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Localidad</label>  
                                        <div class="col-md-4 inputGroupContainer">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                                                <input  name="localidad_dg" id="localidad_dg" placeholder="Localidad" class="form-control" type="text" required/>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Código Postal</label>  
                                        <div class="col-md-4 inputGroupContainer">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                                                <input name="cp_dg" id="cp_dg" placeholder="Código Postal" class="form-control mask_cp" type="text" required />
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Button -->
                                    <div class="form-group">
                                        <button onclick="buscar_direccion();" style="display: block; margin-right: auto; margin-left: auto;" class="btn btn-info"> <i class="ace-icon fa fa-search"></i> &nbsp Buscar domicilio </button>
                                    </div>
                                    <div class="form-group"></div>
                                    
                                    <div class="form-group">
                                        <div class="col-sm-8 col-sm-offset-2" id="map" style="height:400px; background: grey;">
                                        </div>
                                    </div>

                                    <div style="display: flex; justify-content: center;">
                                        <a role="button" onclick="mapa_inicial();" class="btn btn-success"><i class="fa fa-refresh"></i>&nbsp;Refrescar Mapa</a>
                                    </div>

                                    <div id="MyPix">
                                    </div>                                    


                                    <div id="panel"></div>
                                    
                                    <div class="form-group"></div>
                                    <h3 class="header smaller lighter center"></h3>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Latitud y Longitud</label>  
                                        <div class="col-md-4 inputGroupContainer">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                                                <input name="latlong" id="latlong" placeholder="Latitud y Longitud" class="form-control" type="text" required/>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Teléfono</label>  
                                        <div class="col-md-4 inputGroupContainer">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                                <input name="telefono_dg" id="telefono_dg" placeholder="Teléfono" class="form-control mask_tel" type="tel" required/>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Uso actual</label>  
                                        <div class="col-md-4 inputGroupContainer">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-building"></i></span>
                                        
                                                <select class="chosen-select form-control" name="uso" id="uso" data-placeholder="Elige una opción..." required>
                                                    <option value=""></option>
                                                    <option value="Habitacional">Habitacional</option>
                                                    <option value="Comercial">Comercial</option>
                                                    <option value="Servicios">Servicios</option>
                                                    <option value="Equipamiento Urbano">Equipamiento Urbano</option>
                                                    <option value="Industriales">Industriales</option>
                                                    <option value="Microindustrial">Microindustrial</option>
                                                    <option value="Agricola">Agricola</option>
                                                    <option value="Forestal">Forestal</option>
                                                    <option value="Conservación Ambiental">Conservación Ambiental</option>
                                                    <option value="Ecoturístico">Ecoturístico</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Uso solicitado</label>  
                                        <div class="col-md-4 inputGroupContainer">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-building"></i></span>
                                        
                                                <select class="chosen-select form-control" name="uso_sol" id="uso_sol" data-placeholder="Elige una opción..." required>
                                                    <option value=""></option>
                                                    <option value="Habitacional">Habitacional</option>
                                                    <option value="Comercial">Comercial</option>
                                                    <option value="Servicios">Servicios</option>
                                                    <option value="Equipamiento Urbano">Equipamiento Urbano</option>
                                                    <option value="Industriales">Industriales</option>
                                                    <option value="Microindustrial">Microindustrial</option>
                                                    <option value="Agricola">Agricola</option>
                                                    <option value="Forestal">Forestal</option>
                                                    <option value="Conservación Ambiental">Conservación Ambiental</option>
                                                    <option value="Ecoturístico">Ecoturístico</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Giro SCIAN</label>  
                                        <div class="col-md-4 inputGroupContainer">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-building"></i></span>
                                                <select class="chosen-select form-control" name="scian" id="scian" data-placeholder="Elige una opción..." required>
                                                    <?= $options; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Cuenta catastral</label>  
                                        <div class="col-md-4 inputGroupContainer">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-home"></i></span>
                                                <input  name="catastral" id="catastral" placeholder="Cuenta catastral" class="form-control" type="text" required/>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Manzana y Lote</label>  
                                        <div class="col-md-2 inputGroupContainer">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                                                <input  name="manzana" id="manzana" placeholder="Manzana" class="form-control" type="text" required/>
                                            </div>
                                        </div>
 
                                        <div class="col-md-2 inputGroupContainer">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                                                <input  name="lote" id="lote" placeholder="Lote" class="form-control" type="text" required/>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Distancia a esquina mas cercana</label>  
                                        <div class="col-md-4 inputGroupContainer">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-road"></i></span>
                                                <input  name="distancia_esquina" id="distancia_esquina" placeholder="Distancia en metros" class="form-control" type="text" required/>
                                                <span class="input-group-addon"><i></i>m</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Cajones de estacionamiento</label>  
                                        <div class="col-md-4 inputGroupContainer">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-car"></i></span>
                                                <input  name="cajones" id="cajones" placeholder="Cajones de estacionamiento" class="form-control" type="text" required/>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Monto de la inversión capital social (M.N.)</label>  
                                        <div class="col-md-4 inputGroupContainer">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-money"></i></span>
                                                <input  name="inversion" id="inversion" placeholder="Monto de la inversión capital social (M.N.)" class="form-control" type="text" required/>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Personal ocupado (PO)</label>  
                                        <div class="col-md-4 inputGroupContainer">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-users"></i></span>
                                                <input  name="personal_ocupado" id="personal_ocupado" placeholder="Personal ocupado (PO)" class="form-control" type="text" required/>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Servicios existentes</label>  
                                        <div class="col-md-4 inputGroupContainer">
                                            <div class="input-group">
                                                <!-- <span class="input-group-addon"><i class="fa fa-check-circle-o"></i></span>
                                                <input  name="servicios" id="servicios" placeholder="Servicios existentes" class="form-control" type="text" required/> -->
                                                <span class="input-group-addon"><i class="fa fa-check-circle-o"></i></span>
                                                <select multiple="" class="chosen-select form-control tag-input-style" name="servicios" id="servicios" data-placeholder="Seleccionar los servicios...">
                                                    <option value="Agua">Agua</option>
                                                    <option value="Drenaje">Drenaje</option>
                                                    <option value="Alumbrado">Alumbrado</option>
                                                    <option value="Teléfono">Teléfono</option>
                                                    <option value="Pavimento">Pavimento</option>
                                                    <option value="Banqueta">Banqueta</option>
                                                    <option value="Guarnición">Guarnición</option>
                                                    <option value="Internet">Internet</option>
                                                    <option value="Electrificación">Electrificación</option>
                                                    <option value="Otro">Otro</option>
                                                </select>                                                
                                            </div>
                                        </div>
                                    </div>                                 
                                </fieldset>
                            </form>
                        </div>

<!-- ------------------------------------ COMIENZA PASO 4 ---------------------------------------------------- -->
                    
                        <div class="step-pane" data-step="4">
                            <form class="well form-horizontal" method="post"  id="form_dimensiones" name="form_dimensiones">
                                <fieldset>
                                    <legend class="center">Dimensiones del establecimiento</legend>

                                    <div class="form-group">
                                        <div class="col-sm-1"></div>
                                        <label for="frente" class="col-sm-2 control-label no-padding-right"> Frente</label>

                                        <div class="col-sm-2">
                                            <input type="number" id="frente" name="frente" onchange="superficie()" placeholder="Frente" class="col-xs-10 col-sm-10">
                                            <span class="help-inline col-xs-1 col-sm-1">
                                                <span class="middle">m</span>
                                            </span>
                                        </div>


                                        <label for="fondo" class="col-sm-2 control-label no-padding-right"> Fondo</label>

                                        <div class="col-sm-2">
                                            <input type="number" id="fondo" name="fondo"  placeholder="Fondo" class="col-xs-12 col-sm-10">
                                            <span class="help-inline col-xs-11 col-sm-1">
                                                <span class="middle">m</span>
                                            </span>
                                        </div>
                                    </div>

                                    <h3 class="header smaller lighter center">
                                        <small>Costado</small>
                                    </h3> 
                                    
                                    <div class="form-group">
                                        <div class="col-sm-1"></div>
                                        <label for="derecho" class="col-sm-2 control-label no-padding-right"> Derecho</label>

                                        <div class="col-sm-2">
                                            <input type="number" id="derecho" name="derecho" onchange="superficie()" placeholder="Derecho" class="col-xs-12 col-sm-10">
                                            <span class="help-inline col-xs-1 col-sm-1">
                                                <span class="middle">m</span>
                                            </span>
                                        </div>


                                         <label for="izquierdo" class="col-sm-2 control-label no-padding-right"> Izquierdo</label>

                                        <div class="col-sm-2">
                                            <input type="number" id="izquierdo" name="izquierdo" onchange="superficie()" placeholder="Izquierdo" class="col-xs-12 col-sm-10">
                                            <span class="help-inline col-xs-11 col-sm-1">
                                                <span class="middle">m</span>
                                            </span>
                                        </div>
                                    </div>

                                    <h3 class="header smaller lighter center">
                                        <small>Superficie</small>
                                    </h3> 

                                    <div class="form-group">
                                        <div class="col-sm-1"></div>
                                        <label for="terreno" class="col-sm-2 control-label no-padding-right"> Del terreno</label>

                                        <div class="col-sm-2">
                                            <input type="number" id="terreno" name="terreno" placeholder="Del terreno" class="col-xs-12 col-sm-10">
                                            <span class="help-inline col-xs-1 col-sm-1">
                                                <span class="middle">m<sup>2</sup></span>
                                            </span>
                                        </div>


                                         <label for="local" class="col-sm-2 control-label no-padding-right"> Del local</label>

                                        <div class="col-sm-2">
                                            <input type="number" id="local" name="local" placeholder="Del local" class="col-xs-12 col-sm-10">
                                            <span class="help-inline col-xs-11 col-sm-1">
                                                <span class="middle">m<sup>2</sup></span>
                                            </span>
                                        </div>
                                    </div>

                                    <h3 class="header smaller lighter center">
                                       
                                    </h3>  


                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Cuenta predial</label>  
                                        <div class="col-md-4 inputGroupContainer">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-home"></i></span>
                                                <input  name="predial" id="predial" placeholder="Cuenta predial" class="form-control" type="text" required/>
                                            </div>
                                        </div>
                                    </div>                                
                                </fieldset>
                            </form>
                        </div>

<!-- ------------------------------------ COMIENZA PASO 5 ---------------------------------------------------- -->

                        <div class="step-pane" data-step="5">
                            <form class="form-horizontal" method="post"  id="form_documentos" name="form_documentos">
                                <fieldset>
                                    <legend class="center">Carga de Documentos</legend>

                                    <div class="" id="inst_idpf"></div>
                                    <div class="" id="inst_idpm"></div>
                                    <input type="text" id="img_map" name="img_map" />
                                    <div class="" id="inst_iddg"></div>
                                    <div class="" id="inst_iddim"></div>
                                </fieldset>
                            </form>        
                                   
                            <form id="form_title" class=" form-horizontal">                               
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Escritura o titulo de propiedad (en su caso carta notariada de escritura en trámite).</label>  
                                    <div class="col-md-4 inputGroupContainer">
                                        <input type="file" id="titulo" name="titulo" required/> 
                                        <input type="text" class="fill_fol" name="folio" id="folio">                                           
                                    </div>
                                </div>                                
                            </form>

                            <form id="form_pre" class=" form-horizontal">
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Recibo predial año en curso.</label>  
                                    <div class="col-md-4 inputGroupContainer">
                                        <input type="file" id="pred" name="pred" required/>     
                                        <input type="text" class="fill_fol" name="folio" id="folio">                                        
                                    </div>
                                </div>
                            </form>
                            
                            <form id="form_ine" class=" form-horizontal">
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Identificación oficial (de los implicados).</label>  
                                    <div class="col-md-4 inputGroupContainer">
                                        <input type="file" id="ine" name="ine" required/>     
                                        <input type="text" class="fill_fol" name="folio" id="folio">                                        
                                    </div>
                                </div>
                            </form>

                            <form id="form_cont" class=" form-horizontal">        
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Contrato de arrendamiento (en donde se especifiquen las medidas rentadas, el giro comercial, la ubicación del local y la vigencia del contrato).</label>  
                                    <div class="col-md-4 inputGroupContainer">
                                        <input type="file" id="contrato" name="contrato" required/>  
                                        <input type="text" class="fill_fol" name="folio" id="folio">                                           
                                    </div>
                                </div>
                            </form>

                            <form id="form_no" class=" form-horizontal">
                                <div class="form-group" id="noOf">
                                    <label class="col-md-4 control-label">Número oficial.</label>  
                                    <div class="col-md-4 inputGroupContainer">
                                        <input type="file" id="no" name="no" required/>
                                        <input type="text" class="fill_fol" name="folio" id="folio">
                                    </div>
                                </div>
                            </form>

                            <form id="form_num" class=" form-horizontal">
                                <div class="form-group" id="comnoOf" hidden>
                                    <label class="col-md-4 control-label">Comprobante de Pago del Número oficial.</label>  
                                    <div class="col-md-4 inputGroupContainer">
                                        <input type="file" id="cp_no" name="cp_no"/>
                                        <input type="text" class="fill_fol" name="folio" id="folio">
                                    </div>
                                </div>
                            </form>

                            <form id="" class=" form-horizontal">
                                <div class="form-group">
                                    <label class="col-md-4 control-label">¿Solicitar Número Oficial a SEDATUM?</label>
                                    <label class="col-md-4 inputGroupContainer">
                                        <input type="checkbox" name="checkNumOficial" id="checkNumOficial" class="ace ace-switch ace-switch-5">

                                        <span class="lbl middle"></span>
                                    </label>
                                </div>
                            </form>

                            <div id="upmoral"></div>
                        </div> 
                    </div>

                 </div>

                <hr />
                <div class="wizard-actions">
                    <button class="btn btn-prev">
                        <i class="ace-icon fa fa-arrow-left"></i>
                        Anterior
                    </button>

                    <button class="btn btn-success btn-next" data-last="Finalizar" id="btn_next">
                        Continuar
                        <i class="ace-icon fa fa-arrow-right icon-on-right"></i>
                    </button>
                </div>
        
            </div>    
            
        </div>
    </div>
</div>


<script type="text/javascript">

    $("#checkNumOficial").on("change", function(){
        var numOficial = document.getElementById("no");
        var comNumOficial = document.getElementById("cp_no");

        reqNumOficial = numOficial.getAttribute("required");

        if (reqNumOficial == null) {
            //REQUIRED
            numOficial.setAttribute("required", "true");
            comNumOficial.removeAttribute("required", "false");
            //HIDDEN
            $("#noOf").removeAttr("hidden", "true");
            $("#comnoOf").attr("hidden", "true");
            //ERROR-CLASS
            $("#comnoOf").removeClass("has-error");
        }else{
            //REQUIRED
            numOficial.removeAttribute("required");
            comNumOficial.setAttribute("required", "true");
            //HIDDEN
            $("#noOf").attr("hidden", "true");
            $("#comnoOf").removeAttr("hidden", "true");
            //ERROR-CLASS
            $("#noOf").removeClass("has-error");
        }
    });

    function superficie(){
        var derecho = $("#derecho").val();
        var izquierdo = $("#izquierdo").val();
        var frente = $("#frente").val();

        var mayor = Math.max(derecho, izquierdo);

        $("#local").val(mayor*frente);

    }


   jQuery(function($) {
                    
        if(!ace.vars['touch']) {
            $('.chosen-select').chosen({allow_single_deselect:true}); 
            //resize the chosen on window resize
    
            $(window)
            .off('resize.chosen')
            .on('resize.chosen', function() {
                $('.chosen-select').each(function() {
                     var $this = $(this);
                     $this.next().css({'width': $this.parent().width()});
                })
            }).trigger('resize.chosen');
            //resize chosen on sidebar collapse/expand
            $(document).on('settings.ace.chosen', function(e, event_name, event_val) {
                if(event_name != 'sidebar_collapsed') return;
                $('.chosen-select').each(function() {
                     var $this = $(this);
                     $this.next().css({'width': $this.parent().width()});
                })
            });
    
    
            $('#chosen-multiple-style .btn').on('click', function(e){
                var target = $(this).find('input[type=radio]');
                var which = parseInt(target.val());
                if(which == 2) $('#form-field-select-4').addClass('tag-input-style');
                 else $('#form-field-select-4').removeClass('tag-input-style');
            });            
        }
    
        $('#catastral').mask('**-**-**-***-***-***');

        $('#local').on('change', function() {
            if ($('#local').val() >= 150){
                swal({
                    title: "Este local no aplica para SARE",
                    text: "La superficie del local excede el tamaño establecido para SARE.",
                    icon: "error",
                    button: "Aceptar"
                });
                $('#local').val("");
            }
        });

        function show_msg()
        {
            $.gritter.add({
                title: '<i class="fa fa-check"></i> Archivo cargado correctamente',
                text: '',
                class_name: 'gritter-success'
            });
            return false;
        }

        function send_file(form)
        {
            waitingDialog.show('Subiendo archivo', {dialogSize: 'sm', progressType: 'warning'})
            $.ajax({
                data:  form,
                url:   './model/solicitud/create_documentos.php',
                type:  'post',
                processData: false,
                contentType: false, 

                success:  function (data) {                
                    waitingDialog.hide();
                    var datos = data.split(',');
                    if (datos[0]==='correcto'){
                       //document.getElementById("folio").value=datos[1];
                       $('.fill_fol').val(datos[1]);
                       show_msg();
                    }                    
                }
            });
        }

        $('#titulo').ace_file_input({

            no_file:'Seleccione un documento ...',
            btn_choose:'Seleccionar',
            btn_change:'Cambiar',
            droppable:false,
            onchange:null,
            thumbnail:true,
            icon_remove : false

        }).on('change', function() {
            swal({
                title: "¿El documento cumple con lo siguiente?:",
                text: "La escritura o titulo de propiedad debe coincidir con el comprobante de domicilio, el form_preial actual y el contrato de arrendamiento en cuanto a dueño de la propiedad, ubicación de la propiedad, área de la propiedad total y de uso comercial, asi como la vigencia del contrato de arrendamiento.",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                buttons: ["Sí", "No"]
            }).then((value) => {                
                if (value) {
                    $("#"+this.id).next().next().click();
                } else{
                    fd_title = new FormData(document.getElementById("form_title"));
                    send_file(fd_title);
                }
            });
        });


        $('#pred').ace_file_input({
            no_file:'Seleccione un documento ...',
            btn_choose:'Seleccionar',
            btn_change:'Cambiar',
            droppable:false,
            onchange:null,
            thumbnail:true,
            icon_remove : false
        }).on('change', function() {
            swal({
                title: "¿El documento cumple con lo siguiente?:",
                text: "Recibo del predial actual (2022).",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                buttons: ["Sí", "No"]
            }).then((value) => {
                
                if (value) {
                    $("#"+this.id).next().next().click();
                } else{
                   fd_pred = new FormData(document.getElementById("form_pre"));
                   send_file(fd_pred); 
                }
            });
        });

        $('#ine').ace_file_input({
            no_file:'Seleccione un documento ...',
            btn_choose:'Seleccionar',
            btn_change:'Cambiar',
            droppable:false,
            onchange:null,
            thumbnail:true,
            icon_remove : false
        }).on('change', function() {
            swal({
                title: "¿El documento cumple con lo siguiente?:",
                text: "Las identificaciones oficiales de los implicados debe coincidir con la escritura o titulo de propiedad, uso de suelo, numero oficial, comprobante de domicilio, recibo predial actual, contrato de arrendamiento, acta constitutiva, poder notarial y formato único para sistema de apertura.",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                buttons: ["Sí", "No"]
            }).then((value) => {
                
                if (value) {
                    $("#"+this.id).next().next().click();
                } else{
                    fd_ine = new FormData(document.getElementById("form_ine"));
                    send_file(fd_ine);
                }
            });
        });

        $('#contrato').ace_file_input({
            no_file:'Seleccione un documento ...',
            btn_choose:'Seleccionar',
            btn_change:'Cambiar',
            droppable:false,
            onchange:null,
            thumbnail:true,
            icon_remove : false
        }).on('change', function() {
            swal({
                title: "¿El documento cumple con lo siguiente?:",
                text: "El contrato de arrendamiento debe coincidir en cuanto a dueño de la propiedad, ubicación de la propiedad, área de la propiedad total y de uso comercial, asi como la vigencia del mismo.",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                buttons: ["Sí", "No"]
            }).then((value) => {
                
                if (value) {
                    $("#"+this.id).next().next().click();
                } else{
                    fd_cont = new FormData(document.getElementById("form_cont"));
                    send_file(fd_cont);
                }
            });
        });

        $('#no').ace_file_input({
            no_file:'Seleccione un documento ...',
            btn_choose:'Seleccionar',
            btn_change:'Cambiar',
            droppable:false,
            onchange:null,
            thumbnail:true,
            icon_remove : false
        }).on('change', function() {
            swal({
                title: "¿Está usted seguro?:",
                text: "",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                buttons: ["Sí", "No"]
            }).then((value) => {
                
                if (value) {
                    $("#"+this.id).next().next().click();
                } else{
                    fd_no = new FormData(document.getElementById("form_no"));
                    send_file(fd_no);
                }
            });
        });

        $('#cp_no').ace_file_input({
            no_file:'Seleccione un documento ...',
            btn_choose:'Seleccionar',
            btn_change:'Cambiar',
            droppable:false,
            onchange:null,
            thumbnail:true,
            icon_remove : false
        }).on('change', function() {
            swal({
                title: "¿Está usted seguro?:",
                text: "",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                buttons: ["Sí", "No"]
            }).then((value) => {
                
                if (value) {
                    $("#"+this.id).next().next().click();
                } else{
                    fd_num = new FormData(document.getElementById("form_num"));
                    send_file(fd_num);
                }
            });
        });

            
    });
</script>

<script  type="text/javascript" charset="UTF-8" >

    function tags_fisica(){
    
        var tag_input = $('#nombre');
        var mis_datos = <?=$tag_pfisica?>;
        
        
        try{
            tag_input.tag(
              {
                placeholder:tag_input.attr('placeholder'),
                //enable typeahead by specifying the source array
                 
                source: mis_datos,//defined in ace.js >> ace.enable_search_ahead
                /**
                //or fetch data from database, fetch those that match "query"
                source: function(query, process) {
                  $.ajax({url: 'remote_source.php?q='+encodeURIComponent(query)})
                  .done(function(result_items){
                    process(result_items);
                  });
                }
                */
              }
            )

            //programmatically add/remove a tag
            var $tag_obj = $('#nombre').data('tag');
            
            var index = $tag_obj.inValues('some tag');
            $tag_obj.remove(index);

            
        }

        catch(e) {
            //display a textarea for old IE, because it doesn't support this plugin or another one I tried!
            tag_input.after('<textarea id="'+tag_input.attr('nombre')+'" name="'+tag_input.attr('nombre')+'" rows="3">'+tag_input.val()+'</textarea>').remove();
            //autosize($('#form-field-tags'));
        }

        $('[data-rel=tooltip]').tooltip();
            
        tag_input.on('added', function (e, value) {
            
            $(".valid").attr('readonly', true);

            var xmlhttp;

            if (window.XMLHttpRequest){
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp=new XMLHttpRequest();
            }
            
            else{// code for IE6, IE5
                xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
            }
            
            xmlhttp.onreadystatechange=function(){
                
                if (xmlhttp.readyState==4 && xmlhttp.status==200){
                    document.getElementById("loading").innerHTML = ''; // Hide the image after the response from the
                    document.getElementById("ocultos_fisica").innerHTML=xmlhttp.responseText;
                    $("#editar").css("display", "block");
                    switch_edit();
                    mask_data();
                }
            }

            document.getElementById("loading").innerHTML = '<img src="./img/loader_2.gif" alt="Cargando, favor de esperar"/>'; // Set here the image before sending request
            xmlhttp.open("POST","./model/sedatum/datos_persona_fisica.php",true);
            xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
            xmlhttp.send(value);
        });


        tag_input.on('removed', function (e, value) {
            $("#ocultos_fisica").empty();
            $("#editar").css("display", "none");
            $(".valid").attr('readonly', false);
        });


        function switch_edit(){

            $("#switch_edit",).change(function() {

                var $inputs = $('#form_fisica :input');

                $inputs.each(function() {

                    if ($(this).is('[readonly]') && this.id != 'rfc' && this.id != 'curp_fis' && this.id != '') {
                        
                        $(this).removeAttr("readonly");
                        $('select', form_fisica).removeAttr("readonly");
                        $('select', form_fisica).prop("disabled", false);
                    
                    }else{
                        $(this).attr("readonly","readonly");
                        $('select', form_fisica).attr("readonly");
                        $('select', form_fisica).prop("disabled",true);
                    }
                });

            });
        }
    }

    function tags_moral(){
    
        var tag_input = $('#nombre_empresa');
        var mis_datos = <?=$tag_pmoral?>;
        
        try{
            tag_input.tag(
              {
                placeholder:tag_input.attr('placeholder'),
                //enable typeahead by specifying the source array
                 
                source: mis_datos,//defined in ace.js >> ace.enable_search_ahead
                /**
                //or fetch data from database, fetch those that match "query"
                source: function(query, process) {
                  $.ajax({url: 'remote_source.php?q='+encodeURIComponent(query)})
                  .done(function(result_items){
                    process(result_items);
                  });
                }
                */
              }
            )

            //programmatically add/remove a tag
            var $tag_obj = $('#nombre_empresa').data('tag');
            
            var index = $tag_obj.inValues('some tag');
            $tag_obj.remove(index);

            
        }

        catch(e) {
            //display a textarea for old IE, because it doesn't support this plugin or another one I tried!
            tag_input.after('<textarea id="'+tag_input.attr('nombre_empresa')+'" name="'+tag_input.attr('nombre_empresa')+'" rows="3">'+tag_input.val()+'</textarea>').remove();
            //autosize($('#form-field-tags'));
        }

        $('[data-rel=tooltip]').tooltip();
            
        tag_input.on('added', function (e, value) {
            
            $(".valid").attr('readonly', true);

            var xmlhttp;

            if (window.XMLHttpRequest){
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp=new XMLHttpRequest();
            }
            
            else{// code for IE6, IE5
                xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
            }
            
            xmlhttp.onreadystatechange=function(){
                
                if (xmlhttp.readyState==4 && xmlhttp.status==200){
                    document.getElementById("loading_moral").innerHTML = ''; // Hide the image after the response from the
                    document.getElementById("ocultos_moral").innerHTML=xmlhttp.responseText;
                    $("#editar").css("display", "block");
                    switch_edit();
                    date_pick();
                    mask_data();
                }
            }

            document.getElementById("loading").innerHTML = '<img src="./img/loader_2.gif" alt="Cargando, favor de esperar"/>'; // Set here the image before sending request
            xmlhttp.open("POST","./model/sedatum/datos_persona_moral.php",true);
            xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");            
            xmlhttp.send(value);
        });


        tag_input.on('removed', function (e, value) {
            $("#ocultos_moral").empty();
            $("#editar").css("display", "none");
            $(".valid").attr('readonly', false);
        });


        function switch_edit(){

            $("#switch_edit",).change(function() {

                var $inputs = $('#form_moral :input');
                $inputs.each(function() {

                    if ($(this).is('[readonly]') && this.id != 'rfc_pm' && this.id != 'rfc_rl' && this.id != 'curp_rl' && this.id != '') {
                        
                        $(this).removeAttr("readonly");
                        $('select', form_moral).removeAttr("readonly");
                        $('select', form_moral).prop("disabled", false);

                    
                    }else{
                        $(this).attr("readonly","readonly");
                        $('select', form_moral).attr("readonly");
                        $('select', form_moral).prop("disabled",true);
                    }
                });

            });

        }
    }

    function mapa_inicial(){
        document.getElementById("map").innerHTML = "";
        //$(map).empty();

        var calle = document.getElementById('calle_dg');
        var num_ext = document.getElementById('no_ex_dg');
        var colonia = document.getElementById('colonia_dg');
        var localidad = document.getElementById('localidad_dg');
        var cp = document.getElementById('cp_dg');
        var latlong = document.getElementById('latlong');

        function capture(resultContainer, map, ui) {
            // Capturing area of the map is asynchronous, callback function receives HTML5 canvas
            // element with desired map area rendered on it.
            // We also pass an H.ui.UI reference in order to see the ScaleBar in the output.
            // If dimensions are omitted, whole veiw port will be captured
            map.capture(function(canvas) {
                if (canvas) {
                    //resultContainer.innerHTML = '';
                    //resultContainer.appendChild(canvas);
                    if (canvas.getContext){
                        console.log("entro captura");
                        var ctx = canvas.getContext("2d");                
                        var image = canvas.toDataURL("image/png").replace("image/png", "image/octet-stream");                       
                    }
                    var imageElement = document.getElementById("img_map");
                    imageElement.value = image;

                } else {
                    // For example when map is in Panorama mode
                    resultContainer.innerHTML = 'Capturing is not supported';
                }
            }, [ui]);
        }

        function moveMapToAgs(map){
            map.setCenter({lat:21.961431132297992, lng:-102.34325996858598});
            map.setZoom(14);

            map.addEventListener('tap', function (evt) {

                var objects = map.getObjects();
                console.log(objects);
                if(objects.length>0){alert("hay marcadores anteriores");}
                
                var coord = map.screenToGeo(evt.currentPointer.viewportX, evt.currentPointer.viewportY);
                var laticlick = coord.lat;
                var longiclick = coord.lng;
                //alert('Clicked at ' + Math.abs(coord.lat.toFixed(4)) +  ((coord.lat > 0) ? 'N' : 'S') + ' ' + Math.abs(coord.lng.toFixed(4)) + ((coord.lng > 0) ? 'E' : 'W'));
                latlong.value=laticlick+", "+longiclick;
                var direccionMarker = new H.map.Marker({lat:laticlick, lng:longiclick});
                map.addObject(direccionMarker);

                $.ajax({
                    url: 'https://reverse.geocoder.api.here.com/6.2/reversegeocode.json',
                    type: 'GET',
                    dataType: 'jsonp',
                    jsonp: 'jsoncallback',
                    data: {
                        prox: laticlick+','+longiclick,
                        mode: 'retrieveAddresses',
                        maxresults: '1',
                        gen: '9',
                        app_id: 'ZGz7zZ8IFFGIJi6gmhRE',
                        app_code: 'dVGiTbgyVPotX-_dyzRd3A'
                    },
                    success: function (data) {

                        // calle.value= data.Response.View[0].Result[0].Location.Address.Street;
                        // num_ext.value= data.Response.View[0].Result[0].Location.Address.HouseNumber;
                        colonia.value= data.Response.View[0].Result[0].Location.Address.District;
                        localidad.value= data.Response.View[0].Result[0].Location.Address.City;
                        cp.value= data.Response.View[0].Result[0].Location.Address.PostalCode;
                        capture(resultContainer, map, ui);
                    }
                });
            });
        }

        /**
         * Boilerplate map initialization code starts below:
         */

        //Step 1: initialize communication with the platform
        var platform = new H.service.Platform({
            app_id: 'ZGz7zZ8IFFGIJi6gmhRE',
            app_code: 'dVGiTbgyVPotX-_dyzRd3A',
            useHTTPS: true
        });
        var pixelRatio = window.devicePixelRatio || 1;
        var defaultLayers = platform.createDefaultLayers({
          tileSize: pixelRatio === 1 ? 256 : 512,
          ppi: pixelRatio === 1 ? undefined : 320
        });
        var mapContainer = document.getElementById('map');

        //Step 2: initialize a map  - not specificing a location will give a whole world view.
        var map = new H.Map(document.getElementById('map'),
          defaultLayers.normal.map, {pixelRatio: pixelRatio});

        //Step 3: make the map interactive
        // MapEvents enables the event system
        // Behavior implements default interactions for pan/zoom (also on mobile touch environments)
        var behavior = new H.mapevents.Behavior(new H.mapevents.MapEvents(map));

        // Create the default UI components
        var ui = H.ui.UI.createDefault(map, defaultLayers);

        // Now use the map as required...
        moveMapToAgs(map);

        // Step 6: Create "Capture" button and place for showing the captured area
        var resultContainer = document.getElementById('panel');       
    }

    function buscar_direccion(){
        $(map).empty();
        var calle = document.getElementById('calle_dg').value;
        var num_ext = document.getElementById('no_ex_dg').value;
        var colonia = document.getElementById('colonia_dg').value;
        var localidad = document.getElementById('localidad_dg').value;
        var cp = document.getElementById('cp_dg').value;
        var latlong = document.getElementById('latlong');

        $.ajax({
            url: 'https://geocoder.api.here.com/6.2/geocode.json',
            type: 'GET',
            dataType: 'jsonp',
            jsonp: 'jsoncallback',
            data: {
                housenumber: num_ext,
                street: calle,
                city: localidad,
                state: 'Aguascalientes',
                district: colonia,
                postalCode: cp,
                gen: '9',
                app_id: 'ZGz7zZ8IFFGIJi6gmhRE',
                app_code: 'dVGiTbgyVPotX-_dyzRd3A'
            },
            success: function (data) {
                var longitud = data.Response.View[0].Result[0].Location.DisplayPosition.Longitude;
                var latitud = data.Response.View[0].Result[0].Location.DisplayPosition.Latitude;

                function capture(resultContainer, map, ui) {
                    // Capturing area of the map is asynchronous, callback function receives HTML5 canvas
                    // element with desired map area rendered on it.
                    // We also pass an H.ui.UI reference in order to see the ScaleBar in the output.
                    // If dimensions are omitted, whole veiw port will be captured
                    map.capture(function(canvas) {
                        if (canvas) {
                            //resultContainer.innerHTML = '';
                            //resultContainer.appendChild(canvas);
                            if (canvas.getContext){
                                console.log("entro captura");
                                var ctx = canvas.getContext("2d");                
                                var image = canvas.toDataURL("image/png").replace("image/png", "image/octet-stream");                       
                            }
                            var imageElement = document.getElementById("img_map");
                            imageElement.value = image;

                        } else {
                            // For example when map is in Panorama mode
                            resultContainer.innerHTML = 'Capturing is not supported';
                        }
                    }, [ui]);
                }

                function moveMapToBerlin(map){
                    map.setCenter({lat:latitud, lng:longitud});
                    map.setZoom(17);

                    map.addEventListener('tap', function (evt) {
                        //map.removeObjects();
                        var coord = map.screenToGeo(evt.currentPointer.viewportX, evt.currentPointer.viewportY);
                        var laticlick = coord.lat;
                        var longiclick = coord.lng;
                        //alert('Clicked at ' + Math.abs(coord.lat.toFixed(4)) +  ((coord.lat > 0) ? 'N' : 'S') + ' ' + Math.abs(coord.lng.toFixed(4)) + ((coord.lng > 0) ? 'E' : 'W'));
                        latlong.value=laticlick+", "+longiclick;
                        var direccionMarker = new H.map.Marker({lat:laticlick, lng:longiclick});
                        map.addObject(direccionMarker);

                        $.ajax({
                            url: 'https://reverse.geocoder.api.here.com/6.2/reversegeocode.json',
                            type: 'GET',
                            dataType: 'jsonp',
                            jsonp: 'jsoncallback',
                            data: {
                                prox: laticlick+','+longiclick,
                                mode: 'retrieveAddresses',
                                maxresults: '1',
                                gen: '9',
                                app_id: 'ZGz7zZ8IFFGIJi6gmhRE',
                                app_code: 'dVGiTbgyVPotX-_dyzRd3A'
                            },
                            success: function (data) {
                                capture(resultContainer, map, ui);
                            }
                        });
                    });
                }

                //Step 1: initialize communication with the platform
                var platform = new H.service.Platform({
                  app_id: 'ZGz7zZ8IFFGIJi6gmhRE',
                  app_code: 'dVGiTbgyVPotX-_dyzRd3A',
                  useHTTPS: true
                });

                var pixelRatio = window.devicePixelRatio || 1;
                var defaultLayers = platform.createDefaultLayers({
                    tileSize: pixelRatio === 1 ? 256 : 512,
                    ppi: pixelRatio === 1 ? undefined : 320
                });

                //Step 2: initialize a map  - not specificing a location will give a whole world view.
                var map = new H.Map(document.getElementById('map'),
                    defaultLayers.normal.map, {pixelRatio: pixelRatio});

                //Step 3: make the map interactive
                // MapEvents enables the event system
                // Behavior implements default interactions for pan/zoom (also on mobile touch environments)
                var behavior = new H.mapevents.Behavior(new H.mapevents.MapEvents(map));

                // Create the default UI components
                var ui = H.ui.UI.createDefault(map, defaultLayers);

                // Now use the map as required...
                moveMapToBerlin(map);

                var resultContainer = document.getElementById('panel');
            }
        });
    }       
</script>

<script type="text/javascript">

    $.mask.definitions['~']='[+-]';
    $('.mask_curp').mask('aaaa999999aaaaaa99', {reverse: true});
    $('.mask_tel').mask('9999999999', {reverse: true});
    $('.mask_cp').mask('99999', {reverse: true});
    $('.mask_rfc_fis').mask('aaaa999999aa9', {reverse: true});

    function mask_data(){
        $.mask.definitions['~']='[+-]';
        $('.mask_curp').mask('aaaa999999aaaaaa99', {reverse: true});
        $('.mask_tel').mask('9999999999', {reverse: true});
        $('.mask_cp').mask('99999', {reverse: true});
        $('.mask_rfc_fis').mask('aaaa999999aa9', {reverse: true});
        $('.mask_rfc_mor').mask('aaa999999aa9', {reverse: true});
    }

    function mayus(e) {
        e.value = e.value.toUpperCase();
    }

    $('#chosen-multiple-style .btn').on('click', function(e){
        var target = $(this).find('input[type=radio]');
        var which = parseInt(target.val());
        if(which == 2) $('#form-field-select-4').addClass('tag-input-style');
         else $('#form-field-select-4').removeClass('tag-input-style');
    });

    $.fn.datepicker.dates['es'] = {
        days: ["Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado"],
        daysShort: ["Dom", "Lun", "Mar", "Mié", "Jue", "Vie", "Sáb"],
        daysMin: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa"],
        months: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
        monthsShort: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"],
        today: "Hoy",
        monthsTitle: "Meses",
        clear: "Borrar",
        weekStart: 0,
        format: "yyyy-mm-dd"
    };

    function cambia_especifique(value)
    {
        if (value==true){
            $("#ocultar").css("display", "block");
        } else{
            $("#ocultar").css("display", "none");
            $("#especifique").val("");
        }
    }

    //datepicker plugin
    //link
    function date_pick(){
        $('.date_picker').datepicker({
            language: 'es',
            autoclose: true,
            todayHighlight: true
        });    
    }
    
    $('.date_picker').datepicker({
        language: 'es',
        autoclose: true,
        todayHighlight: true
    });

    
    //var $validation = false;
    $('#fuelux-wizard-container')
    .ace_wizard({
        //step: 2 //optional argument. wizard will jump to step "2" at first
        //buttons: '.wizard-actions:eq(0)'
    })
    .on('actionclicked.fu.wizard' , function(e, info){
        var tipo_persona = $('#tipo_persona:checked').val();
        
        function send_file(form)
        {
            waitingDialog.show('Subiendo archivo', {dialogSize: 'sm', progressType: 'warning'})
            $.ajax({
                data:  form,
                url:   './model/solicitud/create_documentos.php',
                type:  'post',
                processData: false,
                contentType: false, 

                success:  function (data) {                
                    waitingDialog.hide();
                    var datos = data.split(',');
                    if (datos[0]==='correcto'){
                       //document.getElementById("folio").value=datos[1];
                       $('.fill_fol').val(datos[1]);
                       show_msg();
                    }                    
                }
            });
        }

        function show_msg()
        {
            $.gritter.add({
                title: '<i class="fa fa-check"></i> Archivo cargado correctamente',
                text: '',
                class_name: 'gritter-success'
            });
            return false;
        }

        if(info.step == 1) {
            e.preventDefault();

            if(typeof tipo_persona !== "undefined")
            {
                if(tipo_persona=="p_fisica")
                {
                    document.getElementById("titulo_paso").innerHTML="Información Personas Físicas";
                    $("#div_morales").removeAttr("data-step");
                    $('#div_fisicas').attr('data-step','2');                            
                    $('#fuelux-wizard-container').wizard('selectedItem', {
                        step: 2
                    }); 
                    tags_fisica();                           
                } else{
                    document.getElementById("titulo_paso").innerHTML="Información Personas Morales";
                    $("#div_fisicas").removeAttr("data-step");
                    $('#div_morales').attr('data-step','2');
                    $('#fuelux-wizard-container').wizard('selectedItem', {
                        step: 2
                    });
                    tags_moral();

                    var codehtml='<h3 class="header smaller lighter center"><small>Persona Moral</small></h3><form id="form_acta" class=" form-horizontal"><div class="form-group"><label class="col-md-4 control-label">Acta constitutiva de la empresa.</label><div class="col-md-4 inputGroupContainer"><input type="file" id="acta" name="acta"/><input type="text" class="fill_fol" name="folio" id="folio"></div></div></form><form id="form_pod" class=" form-horizontal"><div class="form-group"><label class="col-md-4 control-label">Poder notarial.</label><div class="col-md-4 inputGroupContainer"><input type="file" id="poder" name="poder"/><input type="text" class="fill_fol" name="folio" id="folio"></div></div></form><form id="form_sol" class=" form-horizontal"><div class="form-group"><label class="col-md-4 control-label">Solicitud firmada por el representante legal de la empresa.</label><div class="col-md-4 inputGroupContainer"><input type="file" id="solicitud" name="solicitud" /><input type="text" class="fill_fol" name="folio" id="folio"></div></div></form>';
                    document.getElementById("upmoral").innerHTML=codehtml;

                    $('#acta').ace_file_input({
                        no_file:'Seleccione un documento ...',
                        btn_choose:'Seleccionar',
                        btn_change:'Cambiar',
                        droppable:false,
                        onchange:null,
                        thumbnail:true,
                        icon_remove : false
                    }).on('change', function() {
                        swal({
                            title: "¿El documento cumple con los requerimientos?:",
                            text: "",
                            icon: "warning",
                            buttons: true,
                            dangerMode: true,
                            buttons: ["Sí", "No"]
                        }).then((value) => {
                            
                            if (value) {
                                $("#"+this.id).next().next().click();
                            } else{
                                fd_act = new FormData(document.getElementById("form_acta"));
                                send_file(fd_act);
                            }
                        });
                    });

                    $('#poder').ace_file_input({
                        no_file:'Seleccione un documento ...',
                        btn_choose:'Seleccionar',
                        btn_change:'Cambiar',
                        droppable:false,
                        onchange:null,
                        thumbnail:true,
                        icon_remove : false
                    }).on('change', function() {
                        swal({
                            title: "¿El documento cumple con los requerimientos?:",
                            text: "",
                            icon: "warning",
                            buttons: true,
                            dangerMode: true,
                            buttons: ["Sí", "No"]
                        }).then((value) => {
                            
                            if (value) {
                                $("#"+this.id).next().next().click();
                            } else{
                                fd_pod = new FormData(document.getElementById("form_pod"));
                                send_file(fd_pod);
                            }
                        });
                    });

                    $('#solicitud').ace_file_input({
                        no_file:'Seleccione un documento ...',
                        btn_choose:'Seleccionar',
                        btn_change:'Cambiar',
                        droppable:false,
                        onchange:null,
                        thumbnail:true,
                        icon_remove : false
                    }).on('change', function() {
                        swal({
                            title: "¿El documento cumple con los requerimientos?:",
                            text: "",
                            icon: "warning",
                            buttons: true,
                            dangerMode: true,
                            buttons: ["Sí", "No"]
                        }).then((value) => {
                            
                            if (value) {
                                $("#"+this.id).next().next().click();
                            } else{
                                fd_sol = new FormData(document.getElementById("form_sol"));
                                send_file(fd_sol);
                            }
                        });
                    });
                }

            } else{
                swal({
                    title: "¡Atención!",
                    text: "Favor de seleccionar una opción",
                    icon: "info",
                    button: "Aceptar"
                });
            }
            
        }

        if(info.step == 2) {
            if(info.direction == 'next')
            {                    
                if(tipo_persona=="p_fisica")
                {
                    if(!$('#form_fisica').valid()){
                        e.preventDefault();
                    }
                    else{

                        e.preventDefault();
                        var parametros_conyugue = {                     
                            "nombre" : $('#nombre').val(),
                            "calle" : $('#calle').val(),
                            "no_ex" : $('#no_ex').val(),
                            "no_int" : $('#no_int').val(),
                            "colonia" : $('#colonia').val(),
                            "municipio" : $('#municipio').val(),
                            "localidad" : $('#localidad').val(),
                            "estado" : $('#estado_f').val(),
                            "cp" : $('#cp').val(),
                            "rfc" : $('#rfc').val(),
                            "curp_fis" : $('#curp_fis').val(),
                            "telefono" : $('#telefono').val(),
                            "email" : $('#email').val(),
                            "id" : $('#id_pfisica').val(),
                        };
                        
                        if($("#switch_edit").is('[readonly]')){
                            var url_fisica = './model/solicitud/update_pfisica.php';    
                        }else{
                            url_fisica = './model/solicitud/create_pfisica.php';
                        }
                        
                        $.ajax({
                                data:  parametros_conyugue,
                                url:   url_fisica,
                                type:  'post',
                                
                                success:  function (data) {

                                    var datos = data.split(',');
                                                                 
                                    if (datos[0]==='correcto'){
                                        swal({
                                            title: "¡Datos guardados correctamente!",
                                            timer: 3000,
                                            icon: "success",
                                            button: "Aceptar"
                                        });                  

                                        $('#fuelux-wizard-container').wizard('selectedItem', {
                                            step: 3
                                        });

                                        var code_idpf='<input type="text" name="id_per" id="id_per" value="'+datos[1]+'"/>';
                                        document.getElementById("inst_idpf").innerHTML=code_idpf;

                                        mapa_inicial();             
                                    }
                                    
                                    if (data==='error2'){
                                        swal({
                                            title: "¡Error Grave!",
                                            text: "¡Ocurrio algo al guardar!",
                                            timer: 3000,
                                            icon: "error",
                                            button: "Aceptar"
                                        });
                                    }
                                }

                        });
                    }
                } else{
                    if(!$('#form_moral').valid()){
                        e.preventDefault();
                    }
                    else{

                        e.preventDefault();
                        var parametros_moral = {                     
                            "nombre_empresa" : $('#nombre_empresa').val(),
                            "fecha_constitucion" : $('#fecha_constitucion').val(),
                            "rfc_pm" : $('#rfc_pm').val(),
                            "telefono_pm" : $('#telefono_pm').val(),
                            "email_pm" : $('#email_pm').val(),
                            "nombre_rl" : $('#nombre_rl').val(),
                            "rfc_rl" : $('#rfc_rl').val(),
                            "curp_rl" : $('#curp_rl').val(),
                            "calle_rl" : $('#calle_rl').val(),
                            "no_ex_rl" : $('#no_ex_rl').val(),
                            "no_int_rl" : $('#no_int_rl').val(),
                            "colonia_rl" : $('#colonia_rl').val(),
                            "municipio_rl" : $('#municipio_rl').val(),
                            "localidad_rl" : $('#localidad_rl').val(),
                            "cp_rl" : $('#cp_rl').val(),
                            "estado_rl" : $('#estado_rl').val(),
                            "telefono_rl" : $('#telefono_rl').val(),
                            "email_rl" : $('#email_rl').val(),
                            "id" : $('#id_pmoral').val(),
                        };

                        if($("#switch_edit").is('[readonly]')){
                            var url_moral = './model/solicitud/update_pmoral.php';    
                        }else{
                            url_moral = './model/solicitud/create_pmoral.php';
                        }
                        
                        $.ajax({
                                data:  parametros_moral,
                                url:   url_moral,
                                type:  'post',
                                
                                success:  function (data) {
        
                                    var datos = data.split(',');

                                    if (datos[0]==='correcto'){
                                        swal({
                                            title: "¡Datos guardados correctamente!",
                                            timer: 3000,
                                            icon: "success",
                                            button: "Aceptar"
                                        });                  

                                        $('#fuelux-wizard-container').wizard('selectedItem', {
                                            step: 3
                                        });

                                        var code_idpm='<input type="text" name="id_per" id="id_per" value="'+datos[1]+'"/>';
                                        document.getElementById("inst_idpm").innerHTML=code_idpm;

                                        mapa_inicial();                 
                                    }
                                    
                                    if (data==='error2'){
                                        swal({
                                            title: "¡Error Grave!",
                                            text: "¡Ocurrio algo al guardar!",
                                            timer: 3000,
                                            icon: "error",
                                            button: "Aceptar"
                                        });
                                    }
                                }

                        });
                    }
                }
            }                
        }


        if(info.step == 3) {
            if(info.direction == 'next')
            {
                if(!$('#form_dg').valid()){
                    e.preventDefault();
                }
                else{
                    
                    e.preventDefault();

                    var parametros_dg = {                     
                        "id_solicitud" : $('#id_solicitud').val(),
                        "nombre_comercial" : $('#nombre_comercial').val(), 
                        "horario_trabajo" : $('#horario_trabajo').val(),
                        "calle_dg" : $('#calle_dg').val(),
                        "no_ex_dg" : $('#no_ex_dg').val(),
                        "no_int_dg" : $('#no_int_dg').val(),
                        "colonia_dg" : $('#colonia_dg').val(),
                        "entre_calles" : $('#entre_calles').val(),
                        "municipio_dg" : $('#municipio_dg').val(),     
                        "localidad_dg" : $('#localidad_dg').val(),
                        "cp_dg" : $('#cp_dg').val(),
                        "telefono_dg" : $('#telefono_dg').val(),
                        "uso" : $('#uso').val(),
                        "uso_sol" : $('#uso_sol').val(),
                        "scian" : $('#scian').val(),
                        "catastral" : $('#catastral').val(),
                        "manzana"  : $('#manzana').val(),
                        "lote" : $('#lote').val(),
                        "distancia_esquina" : $('#distancia_esquina').val(),
                        "cajones" : $('#cajones').val(),
                        "inversion" : $('#inversion').val(),
                        "personal_ocupado" : $('#personal_ocupado').val(),
                        "servicios" : $('#servicios').val(),
                        "latlong" : $('#latlong').val(),
                    };
                    
                    $.ajax({
                            data:  parametros_dg,
                            url:   './model/solicitud/create_dg.php',
                            type:  'post',
                            
                            success:  function (data) {
                                var datadiv = data.split(",", 3);
                                var mensaje = datadiv[0];
                                var id_dg = datadiv[1];
                                                                    
                                if (mensaje==='correcto'){
                                    swal({
                                        title: "¡Datos guardados correctamente!",
                                        timer: 3000,
                                        icon: "success",
                                        button: "Aceptar"
                                    });                  

                                    $('#fuelux-wizard-container').wizard('selectedItem', {
                                        step: 4
                                    });        

                                    var code_iddg='<input type="text" name="id_dg" id="id_dg" value="'+id_dg+'"/>';
                                    document.getElementById("inst_iddg").innerHTML=code_iddg;             
                                }
                                
                                if (mensaje==='error1'){
                                    swal({
                                        title: "¡Error!",
                                        text: "¡Ocurrio algo al guardar!",
                                        timer: 3000,
                                        icon: "error",
                                        button: "Aceptar"
                                    });
                                }
                            }

                    });
                }
            }                
        }


        if(info.step == 4) {
            if(info.direction == 'next')
            {
                if(!$('#form_dimensiones').valid()){
                    e.preventDefault();
                }
                else{
                    
                    e.preventDefault();

                    var parametros_dim = {                     
                        "frente" : $('#frente').val(),
                        "fondo" : $('#fondo').val(), 
                        "derecho" : $('#derecho').val(),
                        "izquierdo" : $('#izquierdo').val(),
                        "terreno" : $('#terreno').val(),
                        "local" : $('#local').val(),
                        "predial" : $('#predial').val()
                    };

                    $.ajax({
                        data:  parametros_dim,
                        url:   './model/solicitud/create_dimensiones.php',
                        type: "POST",
                        
                        success:  function (data) {
                            var datadiv4 = data.split(",", 3);
                            var mensaje4 = datadiv4[0];
                            var id_dime = datadiv4[1];
                                                                
                            if (mensaje4=='correcto'){
                                swal({
                                    title: "¡Datos guardados correctamente!",
                                    timer: 3000,
                                    icon: "success",
                                    button: "Aceptar"
                                });

                                //$("#btn_next").attr('disabled','disabled');
                                var code_iddim='<input type="text" name="id_dim" id="id_dim" value="'+id_dime+'"/>';
                                document.getElementById("inst_iddim").innerHTML=code_iddim;

                                $('#fuelux-wizard-container').wizard('selectedItem', {
                                    step: 5
                                });
                            }
                            
                            if (mensaje4=='error1'){
                                swal({
                                    title: "¡Error!",
                                    text: "¡Ocurrio algo al guardar!",
                                    timer: 3000,
                                    icon: "error",
                                    button: "Aceptar"
                                });
                            }
                        }

                    });                        
                }
            }                
        }


        if(info.step == 5) {
            if(info.direction == 'next')
            {
                
                e.preventDefault();

                // PARA SELECCIONAR EL INPUT QUE SE ENVIARÁ DE LOS RADIOBUTTONS
                var radio_fisica = document.getElementsByName("tipo_persona")[0];
                var radio_moral = document.getElementsByName("tipo_persona")[1];
                
                if (radio_fisica.checked == true) {
                    $(radio_fisica).appendTo('#form_documentos');
                    if (($("#titulo").val()=="")||($("#pred").val()=="")||($("#ine").val()=="")||($("#contrato").val()=="")||($("#no").val()=="")){swal("Tip", "Favor de cargar la documentación completa.", "info"); console.log("entro fis"); return;}
                }else if(radio_moral.checked == true){
                    $(radio_moral).appendTo('#form_documentos');
                    if (($("#titulo").val()=="")||($("#pred").val()=="")||($("#ine").val()=="")||($("#contrato").val()=="")||($("#no").val()=="")||($("#acta").val()=="")||($("#poder").val()=="")||($("#solicitud").val()=="")){swal("Tip", "Favor de cargar la documentación completa.", "info"); console.log("entro_ mor"); return;}
                }

                var myForm = document.getElementById('form_documentos');

                var formData = new FormData(myForm);
             
                $.ajax({
                    data:  formData,
                    url:   './model/solicitud/finalizar_solicitud.php',
                    type:  'post',
                    processData: false,
                    contentType: false,
                    
                    success:  function (data) {
                                                            
                        if (data==='correcto'){
                            swal({
                                title: "¡Datos guardados correctamente!",
                                timer: 3000,
                                icon: "success",
                                button: "Aceptar"
                            }).then((value) => {
                                if(value) {
                                    
                                }
                            });   
                            cambiarcont('view/solicitud/listado.php?pantalla=1');                 
                        }
                        
                        if (data==='error'){
                            swal({
                                title: "¡Error!",
                                text: "¡Ocurrio algo al guardar!",
                                timer: 3000,
                                icon: "error",
                                button: "Aceptar"
                            });
                        }
                    }
                    
                });
                
            }                
        }
    })
    //.on('changed.fu.wizard', function() {
    //})
    .on('finished.fu.wizard', function(e) {
        swal({
            title: "Título creado correctamente",
            timer: 3000,
            icon: "success",
            button: "Aceptar"
        });

        location.reload();
       
    }).on('stepclicked.fu.wizard', function(e){
        e.preventDefault();//this will prevent clicking and selecting steps
    });
    
    
    //jump to a step
    function salto(paso){
        var wizard = $('#fuelux-wizard-container').data('fu.wizard')
        wizard.currentStep = paso;
        wizard.setState();
    }

    //determine selected step
    //wizard.selectedItem().step

    $('#form_fisica').validate({
        errorElement: 'div',
        errorClass: 'help-block',
        focusInvalid: false,
        ignore: "",
        rules: {
            nombre: {
                required: true
            },

            calle: {
                required: true
            },

            no_ex: {
                required: true,
                number: true
            },

            colonia: {
                required: true
            },

            municipio: {
                required: true
            },

            localidad: {
                required: true
            },

            estado_f: {
                required: true
            },

            cp: {
                required: true,
                minlength: 5,
                maxlength: 5
            },

            rfc: {
                required: true
            },

            curp_fis: {
                required: true
            },

            telefono: {
                required: true,
                minlength: 10,
                maxlength: 10
            },

            email: {
                required: true,
                email: true
            }
        },     

        messages: {
            nombre: {
                required: "Favor de ingresar el nombre."
            },

            calle: {
                required: "Favor de ingresar la calle."
            },

            no_ex: {
                required: "Favor de ingresar el número exterior.",
                number: "Favor de ingresar solo números."
            },

            colonia: {
                required: "Favor de ingresar la colonia."
            },

            municipio: {
                required: "Favor de seleccionar el municipio."
            },

            localidad: {
                required: "Favor de ingresar la localidad."
            },

            estado_f: {
                required: "Favor de seleccionar el estado."
            },

            cp: {
                required: "Favor de ingresar el código postal.",
                minlength: "Ingresar el código postal completo.",
                maxlength: "Ingresar correctamente el código postal."
            },

            rfc: {
                required: "Favor de ingresar el RFC."
            },

            curp_fis: {
                required: "Favor de ingresar la CURP."
            },

            telefono: {
                required: "Favor de ingresar el teléfono.",
                minlength: "Ingresar el número telefónico completo.",
                maxlength: "Número telefónico demasiado largo."
            },

            email: {
                required: "Favor de ingresar el correo electrónico."
            }
        },


        highlight: function (e) {
            $(e).closest('.form-group').removeClass('has-info').addClass('has-error');
        },

        success: function (e) {
            $(e).closest('.form-group').removeClass('has-error');//.addClass('has-info');
            $(e).remove();
        },

        errorPlacement: function (error, element) {
            if(element.is('input[type=checkbox]') || element.is('input[type=radio]')) {
                var controls = element.closest('div[class*="col-"]');
                if(controls.find(':checkbox,:radio').length > 1) controls.append(error);
                else error.insertAfter(element.nextAll('.lbl:eq(0)').eq(0));
            }
            else if(element.is('.select2')) {
                error.insertAfter(element.siblings('[class*="select2-container"]:eq(0)'));
            }
            else if(element.is('.chosen-select')) {
                error.insertAfter(element.siblings('[class*="chosen-container"]:eq(0)'));
            }
            else error.insertAfter(element.parent());
        },

        submitHandler: function (form) {
            
            
        }
    
    });

    $('#form_moral').validate({
        errorElement: 'div',
        errorClass: 'help-block',
        focusInvalid: false,
        ignore: "",
        rules: {
            nombre_empresa: {
                required: true
            },

            fecha_constitucion: {
                required: true
            },

            rfc_pm: {
                required: true
            },

            telefono_pm: {
                required: true,
                digits: true,
                minlength: 10,
                maxlength: 10
            },

            email_pm: {
                email: true,
                required: true
            },

            nombre_rl: {
                required: true
            },

            rfc_rl: {
                required: true
            },

            curp_rl: {
                required: true
            },

            calle_rl: {
                required: true
            },

            no_ex_rl: {
                required: true,
                number: true
            },

            colonia_rl: {
                required: true
            },

            municipio_rl: {
                required: true
            },

            localidad_rl: {
                required: true
            },

            cp_rl: {
                required: true,
                digits: true,
                minlength : 5,
                maxlength: 5
            },

            estado_rl: {
                required: true
            },

            telefono_rl: {
                 required: true,
                digits: true,
                minlength: 10,
                maxlength: 10
            },

            email_rl: {
                required: true,
                email: true
            }
        },     

        messages: {
            nombre_empresa: {
                required: "Favor de ingresar el nombre de la empresa."
            },

            fecha_constitucion: {
                required: "Favor de ingresar la fecha de constitución."
            },

            rfc_pm: {
                required: "Favor de ingresar el RFC de la empresa."
            },

            telefono_pm: {
                required: "Favor de ingresar el teléfono de la empresa.",
                digits: "Ingresa solamente números",
                minlength : "Número telefónico demasiado corto.",
                maxlength: "Número telefónico demasiado largo."
            },

            email_pm: {
                required: "Favor de ingresar el correo electrónico de la empresa.",
                email: "Ingresar un correo electrónico válido."
            },

            nombre_rl: {
                required: "Favor de ingresar el nombre."
            },

            rfc_rl: {
                required: "Favor de ingresar el RFC."
            },

            curp_rl: {
               required: "Favor de ingresar la CURP."
            },

            calle_rl: {
                required: "Favor de ingresar la calle."
            },

            no_ex_rl: {
                required: "Favor de ingresar el número exterior.",
                number: "Favor de ingresar solo números."
            },

            colonia_rl: {
                required: "Favor de ingresar la colonia."
            },

            municipio_rl: {
                required: "Favor de seleccionar el municipio."
            },

            localidad_rl: {
                required: "Favor de ingresar el nombre."
            },

            cp_rl: {
                required: "Favor de ingresar el código postal.",
                digits: "Ingresa solamente números",
                minlength : "Número telefónico demasiado corto.",
                maxlength: "Número telefónico demasiado largo."
            },

            estado_rl: {
                required: "Favor de seleccionar el estado."
            },

            telefono_rl: {
                required: "Favor de ingresar el teléfono de la empresa.",
                digits: "Ingresa solamente números",
                minlength : "Número telefónico demasiado corto.",
                maxlength: "Número telefónico demasiado largo."
            },

            email_rl: {
                required: "Favor de ingresar el correo electrónico.",
                email: "Ingresar un correo electrónico válido."
            }
        },


        highlight: function (e) {
            $(e).closest('.form-group').removeClass('has-info').addClass('has-error');
        },

        success: function (e) {
            $(e).closest('.form-group').removeClass('has-error');//.addClass('has-info');
            $(e).remove();
        },

        errorPlacement: function (error, element) {
            if(element.is('input[type=checkbox]') || element.is('input[type=radio]')) {
                var controls = element.closest('div[class*="col-"]');
                if(controls.find(':checkbox,:radio').length > 1) controls.append(error);
                else error.insertAfter(element.nextAll('.lbl:eq(0)').eq(0));
            }
            else if(element.is('.select2')) {
                error.insertAfter(element.siblings('[class*="select2-container"]:eq(0)'));
            }
            else if(element.is('.chosen-select')) {
                error.insertAfter(element.siblings('[class*="chosen-container"]:eq(0)'));
            }
            else error.insertAfter(element.parent());
        },

        submitHandler: function (form) {
            
            
        }
    
    });

    $('#form_dg').validate({
        errorElement: 'div',
        errorClass: 'help-block',
        focusInvalid: false,
        ignore: "",
        rules: {
            nombre_comercial: {
                required: true
            },

            horario_trabajo: {
                required: true
            },

            calle_dg: {
                required: true
            },

            no_ex_dg: {
                required: true,
                number: true
            },

            colonia_dg: {
                required: true
            },

            colonia_dg: {
                required: true
            },

            entre_calles: {
                required: true
            },

            municipio_dg: {
                required: true
            },

            localidad_dg: {
                required: true
            },

            cp_dg: {
                required: true
            },

            telefono_dg: {
                required: true
            },

            uso: {
                required: true
            },

            scian: {
                required: true
            },

            catastral: {
                required: true
            },

            manzana: {
                required: true
            },

            lote: {
                required: true
            },

            distancia_esquina: {
                required: true
            },

            cajones: {
                required: true
            },

            inversion: {
                required: true
            },

            personal_ocupado: {
                required: true
            },

            servicios: {
                required: true
            },
        },     

        messages: {
            nombre_comercial: {
                required: "Favor de ingresar el nombre comercial."
            },

            horario_trabajo: {
                required: "Favor de ingresar el horario de trabajo."
            },

            calle_dg: {
                required: "Favor de ingresar la calle."
            },

            no_ex_dg: {
                required: "Favor de ingresar el número exterior.",
                number: "Favor de ingresar solo números."
            },

            colonia_dg: {
                required: "Favor de ingresar la colonia."
            },                

            entre_calles: {
                required: "Favor de ingresar la colonia."
            },

            municipio_dg: {
                required: "Favor de seleccionar el municipio."
            },

            localidad_dg: {
                required: "Favor de ingresar el nombre."
            },

            cp_dg: {
                required: "Favor de ingresar el código postal."
            },

            telefono_dg: {
                required: "Favor de ingresar el teléfono."
            },

            uso: {
                required: "Favor de ingresar uso actual."
            },

            scian: {
                required: "Favor de ingresar el giro scian."
            },

            catastral: {
                required: "Favor de ingresar la cuenta catastral."
            },

            manzana: {
                required: "Favor de ingresar la manzana."
            },

            lote: {
                required: "Favor de ingresar el lote."
            },

            distancia_esquina: {
                required: "Favor de ingresar la distancia a la esquina más cercana."
            },

            cajones: {
                required: "Favor de ingresar el numero de cajones de estacionamiento."
            },

            inversion: {
                required: "Favor de ingresar el monto de la inversión capital social."
            },

            personal_ocupado: {
                required: "Favor de ingresar el personal ocupado."
            },

            servicios: {
                required: "Favor de ingresar los servicios existentes."
            },
        },


        highlight: function (e) {
            $(e).closest('.form-group').removeClass('has-info').addClass('has-error');
        },

        success: function (e) {
            $(e).closest('.form-group').removeClass('has-error');//.addClass('has-info');
            $(e).remove();
        },

        errorPlacement: function (error, element) {
            if(element.is('input[type=checkbox]') || element.is('input[type=radio]')) {
                var controls = element.closest('div[class*="col-"]');
                if(controls.find(':checkbox,:radio').length > 1) controls.append(error);
                else error.insertAfter(element.nextAll('.lbl:eq(0)').eq(0));
            }
            else if(element.is('.select2')) {
                error.insertAfter(element.siblings('[class*="select2-container"]:eq(0)'));
            }
            else if(element.is('.chosen-select')) {
                error.insertAfter(element.siblings('[class*="chosen-container"]:eq(0)'));
            }
            else error.insertAfter(element.parent());
        },

        submitHandler: function (form) {
            
            
        }
    
    });

    $('#form_dimensiones').validate({
        errorElement: 'div',
        errorClass: 'help-block',
        focusInvalid: false,
        ignore: "",
        rules: {
            frente: {
                required: true,
                number: true
            },

            fondo: {
                required: true,
                number: true
            },

            derecho: {
                required: true,
                number: true
            },

            izquierdo: {
                required: true,
                number: true
            },

            terreno: {
                 required: true,
                number: true
            },

            local: {
                 required: true,
                number: true
            },

            predial: {
                required: true,
                number: true
            }
        },     

        messages: {
            frente: {
                required: "Favor de ingresar los metros de frente.",
                number: "Favor de ingresar solo números."
            },

            fondo: {
                required: "Favor de ingresar los metros de fondo.",
                number: "Favor de ingresar solo números."
            },

            derecho: {
                required: "Favor de ingresar los metros del lado derecho.",
                number: "Favor de ingresar solo números."
            },

            izquierdo: {
                required: "Favor de ingresar los metros del lado izquierdo.",
                number: "Favor de ingresar solo números."
            },

            terreno: {
                required: "Favor de ingresar el área del terreno.",
                number: "Favor de ingresar solo números."
            },

            local: {
                required: "Favor de ingresar el área del local.",
                number: "Favor de ingresar solo números."
            },

            predial: {
                required: "Favor de ingresar su cuenta predial.",
                number: "Favor de ingresar solo números."
            }
        },


        highlight: function (e) {
            $(e).closest('.form-group').removeClass('has-info').addClass('has-error');
        },

        success: function (e) {
            $(e).closest('.form-group').removeClass('has-error');//.addClass('has-info');
            $(e).remove();
        },

        errorPlacement: function (error, element) {
            if(element.is('input[type=checkbox]') || element.is('input[type=radio]')) {
                var controls = element.closest('div[class*="col-"]');
                if(controls.find(':checkbox,:radio').length > 1) controls.append(error);
                else error.insertAfter(element.nextAll('.lbl:eq(0)').eq(0));
            }
            else if(element.is('.select2')) {
                error.insertAfter(element.siblings('[class*="select2-container"]:eq(0)'));
            }
            else if(element.is('.chosen-select')) {
                error.insertAfter(element.siblings('[class*="chosen-container"]:eq(0)'));
            }
            else error.insertAfter(element.parent());
        },

        submitHandler: function (form) {
            
            
        }
    
    });

    $('#form_documentos').validate({

        errorElement: 'div',
        errorClass: 'help-block',
        focusInvalid: false,
        ignore: "",
        rules: {
            
        },     

        messages: {
            
        },


        highlight: function (e) {
            $(e).closest('.form-group').removeClass('has-info').addClass('has-error');
        },

        success: function (e) {
            $(e).closest('.form-group').removeClass('has-error');//.addClass('has-info');
            $(e).remove();
        },

        errorPlacement: function (error, element) {
            if(element.is('input[type=checkbox]') || element.is('input[type=radio]')) {
                var controls = element.closest('div[class*="col-"]');
                if(controls.find(':checkbox,:radio').length > 1) controls.append(error);
                else error.insertAfter(element.nextAll('.lbl:eq(0)').eq(0));
            }
            else if(element.is('.select2')) {
                error.insertAfter(element.siblings('[class*="select2-container"]:eq(0)'));
            }
            else if(element.is('.chosen-select')) {
                error.insertAfter(element.siblings('[class*="chosen-container"]:eq(0)'));
            }
            else error.insertAfter(element.parent());
        },

        submitHandler: function (form) {
        
        }
    
    });
</script>