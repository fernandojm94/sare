<?php
    include('../../controller/funciones.php');
    include('../../model/solicitud/fill.php');
    user_login();

    $tag_pfisica = fill_pfisica();
    $tag_pmoral = fill_pmoral();
    
?>

<style type="text/css">
    #servicios_chosen{
        width: 100% !important;
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
                                        <label class="col-md-4 control-label">Horario de trabajo</label>  
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
                                                <input  name="no_int_dg" id="no_int_dg" placeholder="No. Interior" class="form-control" type="number" required/>
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
                                        <button onclick="buscar_direccion();" style="display: block; margin-right: auto; margin-left: auto;" class="btn btn-success"> <i class="ace-icon fa fa-floppy-o"></i> &nbsp Buscar </button>
                                    </div>
                                    <div class="form-group"></div>
                                    
                                    <div class="form-group">
                                        <div class="col-sm-8 col-sm-offset-2" id="map" style="height:400px; background: grey;">
                                        </div>
                                    </div>
                                    
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
                                                <input  name="uso" id="uso" placeholder="Uso actual" class="form-control" type="text" required/>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Giro SCIAN</label>  
                                        <div class="col-md-4 inputGroupContainer">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-building"></i></span>
                                                <input  name="scian" id="scian" placeholder="Giro SCIAN" class="form-control" type="text" required/>
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
                                                <input  name="distancia_esquina" id="distancia_esquina" placeholder="Distancia a esquina mas cercana" class="form-control" type="text" required/>
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
                                            <input type="number" id="frente" name="frente" placeholder="Frente" class="col-xs-10 col-sm-10">
                                            <span class="help-inline col-xs-1 col-sm-1">
                                                <span class="middle">m</span>
                                            </span>
                                        </div>


                                        <label for="fondo" class="col-sm-2 control-label no-padding-right"> Fondo</label>

                                        <div class="col-sm-2">
                                            <input type="number" id="fondo" name="fondo" placeholder="Fondo" class="col-xs-12 col-sm-10">
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
                                            <input type="number" id="derecho" name="derecho" placeholder="Derecho" class="col-xs-12 col-sm-10">
                                            <span class="help-inline col-xs-1 col-sm-1">
                                                <span class="middle">m</span>
                                            </span>
                                        </div>


                                         <label for="izquierdo" class="col-sm-2 control-label no-padding-right"> Izquierdo</label>

                                        <div class="col-sm-2">
                                            <input type="number" id="izquierdo" name="izquierdo" placeholder="Izquierdo" class="col-xs-12 col-sm-10">
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
                            <form class="well form-horizontal" method="post"  id="form_documentos" name="form_documentos">
                                <fieldset>
                                    <div id=inst_idpf></div>
                                    <div id=inst_iddg></div>
                                    <div id=inst_iddim></div>

                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Escritura o titulo de propiedad (en su caso carta notariada de escritura en trámite).</label>  
                                        <div class="col-md-4 inputGroupContainer">
                                            <input type="file" id="titulo" name="titulo" />                                            
                                        </div>
                                    </div> 

                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Recibo predial año en curso.</label>  
                                        <div class="col-md-4 inputGroupContainer">
                                            <input type="file" id="pred" name="pred" />                                            
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Identificación oficial (de los implicados).</label>  
                                        <div class="col-md-4 inputGroupContainer">
                                            <input type="file" id="ine" name="ine"/>                                            
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Contrato de arrendamiento (en donde se especifiquen las medidas rentadas, el giro comercial, la ubicación del local y la vigencia del contrato).</label>  
                                        <div class="col-md-4 inputGroupContainer">
                                            <input type="file" id="contrato" name="contrato"/>                                            
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Número oficial.</label>  
                                        <div class="col-md-4 inputGroupContainer">
                                            <input type="file" id="no" name="no" />                                            
                                        </div>
                                    </div>

                                    <div id="upmoral"></div>                  
                                </fieldset>
                            </form>
                        </div> 
                    </div>

                 </div>

                <hr />
                <div class="wizard-actions">
                    <button class="btn btn-prev">
                        <i class="ace-icon fa fa-arrow-left"></i>
                        Anterior
                    </button>

                    <button class="btn btn-success btn-next" data-last="Finalizar">
                        Continuar
                        <i class="ace-icon fa fa-arrow-right icon-on-right"></i>
                    </button>
                </div>
            </div>    
            
        </div>
    </div>
</div>


<script type="text/javascript">

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

        $('#titulo').ace_file_input({
            no_file:'Seleccione un documento ...',
            btn_choose:'Seleccionar',
            btn_change:'Cambiar',
            droppable:false,
            onchange:null,
            thumbnail:true
        }).on('change', function() {
            swal({
                title: "¿El documento cumple con lo siguiente?:",
                text: "La escritura o titulo de propiedad debe coincidir con el comprobante de domicilio, el predial actual y el contrato de arrendamiento en cuanto a dueño de la propiedad, ubicación de la propiedad, área de la propiedad total y de uso comercial, asi como la vigencia del contrato de arrendamiento.",
                icon: "info",
                button: "Aceptar"
            });
        });

        $('#pred').ace_file_input({
            no_file:'Seleccione un documento ...',
            btn_choose:'Seleccionar',
            btn_change:'Cambiar',
            droppable:false,
            onchange:null,
            thumbnail:true
        }).on('change', function() {
            swal({
                title: "¿El documento cumple con lo siguiente?:",
                text: "Recibo del predial actual (2020).",
                icon: "info",
                button: "Aceptar"
            });
        });

        $('#contrato').ace_file_input({
            no_file:'Seleccione un documento ...',
            btn_choose:'Seleccionar',
            btn_change:'Cambiar',
            droppable:false,
            onchange:null,
            thumbnail:true
        }).on('change', function() {
            swal({
                title: "¿El documento cumple con lo siguiente?:",
                text: "El contrato de arrendamiento debe coincidir en cuanto a dueño de la propiedad, ubicación de la propiedad, área de la propiedad total y de uso comercial, asi como la vigencia del mismo.",
                icon: "info",
                button: "Aceptar"
            });
        });

        $('#ine').ace_file_input({
            no_file:'Seleccione un documento ...',
            btn_choose:'Seleccionar',
            btn_change:'Cambiar',
            droppable:false,
            onchange:null,
            thumbnail:true
        }).on('change', function() {
            swal({
                title: "¿El documento cumple con lo siguiente?:",
                text: "Las identificaciones oficiales de los implicados debe coincidir con la escritura o titulo de propiedad, uso de suelo, numero oficial, comprobante de domicilio, recibo predial actual, contrato de arrendamiento, acta constitutiva, poder notarial y formato único para sistema de apertura.",
                icon: "info",
                button: "Aceptar"
            });
        });

        $('#no').ace_file_input({
            no_file:'Seleccione un documento ...',
            btn_choose:'Seleccionar',
            btn_change:'Cambiar',
            droppable:false,
            onchange:null,
            thumbnail:true
        });

        $('#terreno').on('change', function() {
            if ($('#terreno').val() >= 150){
                swal({
                    title: "Este terreno no aplica para SARE",
                    text: "La superficie del terreno excede el tamaño establecido para SARE.",
                    icon: "error",
                    button: "Aceptar"
                });
            }
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
                if ($('input', form_fisica).is('[readonly]')) 
                {
                    $('input', form_fisica).removeAttr("readonly");
                    $('select', form_fisica).prop("disabled", false);
                } else {
                    $('input', form_fisica).attr("readonly","readonly");
                    $('select', form_fisica).attr("disabled","disabled");
                }
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
                if ($('input', form_moral).is('[readonly]')) 
                {
                    $('input', form_moral).removeAttr("readonly");
                } else {
                    $('input', form_moral).attr("readonly","readonly");
                }
            });
        }
    }


    function mapa_inicial(){
        $(map).empty();

        var calle = document.getElementById('calle_dg');
        var num_ext = document.getElementById('no_ex_dg');
        var colonia = document.getElementById('colonia_dg');
        var localidad = document.getElementById('localidad_dg');
        var cp = document.getElementById('cp_dg');
        var latlong = document.getElementById('latlong');

        function moveMapToAgs(map){
            map.setCenter({lat:21.961431132297992, lng:-102.34325996858598});
            map.setZoom(14);

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
                        console.log(JSON.stringify(data));
                        calle.value= data.Response.View[0].Result[0].Location.Address.Street;
                        num_ext.value= data.Response.View[0].Result[0].Location.Address.HouseNumber;
                        colonia.value= data.Response.View[0].Result[0].Location.Address.District;
                        localidad.value= data.Response.View[0].Result[0].Location.Address.City;
                        cp.value= data.Response.View[0].Result[0].Location.Address.PostalCode;
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
                console.log(JSON.stringify(data));
                var longitud = data.Response.View[0].Result[0].Location.DisplayPosition.Longitude;
                var latitud = data.Response.View[0].Result[0].Location.DisplayPosition.Latitude;

                function moveMapToBerlin(map){
                    map.setCenter({lat:latitud, lng:longitud});
                    map.setZoom(17);

                    latlong.value=latitud+", "+longitud;

                    var direccionMarker = new H.map.Marker({lat:latitud, lng:longitud});
                    map.addObject(direccionMarker);

                    map.addEventListener('tap', function (evt) {
                        var coord = map.screenToGeo(evt.currentPointer.viewportX,
                                evt.currentPointer.viewportY);
                        alert('Clicked at ' + Math.abs(coord.lat.toFixed(4)) +
                            ((coord.lat > 0) ? 'N' : 'S') +
                            ' ' + Math.abs(coord.lng.toFixed(4)) +
                             ((coord.lng > 0) ? 'E' : 'W'));
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
        console.log(value);
        if (value==true){
            $("#ocultar").css("display", "block");
        } else{
            $("#ocultar").css("display", "none");
            $("#especifique").val("");
        }
    }

    //datepicker plugin
    //link
    $('.date_picker').datepicker({
        language: 'es',
        autoclose: true,
        todayHighlight: true
    })

    
    //var $validation = false;
        $('#fuelux-wizard-container')
        .ace_wizard({
            //step: 2 //optional argument. wizard will jump to step "2" at first
            //buttons: '.wizard-actions:eq(0)'
        })
        .on('actionclicked.fu.wizard' , function(e, info){
            var tipo_persona = $('#tipo_persona:checked').val();

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

                        var codehtml='<h3 class="header smaller lighter center"><small>Persona Moral</small></h3><div class="form-group"><label class="col-md-4 control-label">Acta constitutiva de la empresa.</label><div class="col-md-4 inputGroupContainer"><input type="file" id="acta" name="acta"/></div></div><div class="form-group"><label class="col-md-4 control-label">Poder notarial.</label><div class="col-md-4 inputGroupContainer"><input type="file" id="poder" name="poder"/></div></div><div class="form-group"><label class="col-md-4 control-label">Solicitud firmada por el representante legal de la empresa.</label><div class="col-md-4 inputGroupContainer"><input type="file" id="solicitud" name="solicitud" /></div></div>';
                        document.getElementById("upmoral").innerHTML=codehtml;

                        $('#acta').ace_file_input({
                            no_file:'Seleccione un documento ...',
                            btn_choose:'Seleccionar',
                            btn_change:'Cambiar',
                            droppable:false,
                            onchange:null,
                            thumbnail:true
                        });

                        $('#poder').ace_file_input({
                            no_file:'Seleccione un documento ...',
                            btn_choose:'Seleccionar',
                            btn_change:'Cambiar',
                            droppable:false,
                            onchange:null,
                            thumbnail:true
                        });

                        $('#solicitud').ace_file_input({
                            no_file:'Seleccione un documento ...',
                            btn_choose:'Seleccionar',
                            btn_change:'Cambiar',
                            droppable:false,
                            onchange:null,
                            thumbnail:true
                        });
                    }

                } else{
                    swal({
                        title: "¡Error!",
                        text: "Favor de seleccionar una opción",
                        icon: "warning",
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
                                "curp_fis" : $('#curp_fis').val(),
                                "colonia" : $('#colonia').val(),
                                "municipio" : $('#municipio').val(),
                                "localidad" : $('#localidad').val(),
                                "cp" : $('#cp').val(),
                                "rfc" : $('#rfc').val(),
                                "curp_fis" : $('#curp_fis').val(),
                                "telefono" : $('#telefono').val(),
                                "email" : $('#email').val(),
                            };

                            var id_pfi= $('#id_pfisica').val();
                            
                            $.ajax({
                                    data:  parametros_conyugue,
                                    url:   './model/solicitud/create_pfisica.php',
                                    type:  'post',
                                    
                                    success:  function (data) {
                                                                            
                                        if (data==='correcto'){
                                            swal({
                                                title: "¡Datos guardados correctamente!",
                                                timer: 3000,
                                                icon: "success",
                                                button: "Aceptar"
                                            });                  

                                            $('#fuelux-wizard-container').wizard('selectedItem', {
                                                step: 3
                                            });

                                            var code_idpf='<input type="text" name="id_pf" id="id_pf" value="'+id_pfi+'"/>';
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
                            };
                            
                            $.ajax({
                                    data:  parametros_moral,
                                    url:   './model/solicitud/create_pmoral.php',
                                    type:  'post',
                                    
                                    success:  function (data) {
                                                                            
                                        if (data==='correcto'){
                                            swal({
                                                title: "¡Datos guardados correctamente!",
                                                timer: 3000,
                                                icon: "success",
                                                button: "Aceptar"
                                            });                  

                                            $('#fuelux-wizard-container').wizard('selectedItem', {
                                                step: 3
                                            });
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
                        console.log("segun no esta completo el form");
                    }
                    else{
                        console.log("si entro");
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
                        console.log("segun no esta completo el form");
                    }
                    else{
                        console.log("si entro");
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
                    if(!$('#form_dg').valid()){
                        e.preventDefault();
                    }
                    else{
                        e.preventDefault();

                        //poner el formdata
                                                
                        $.ajax({
                                data:  parametros_conyugue,
                                url:   './model/solicitud/create_documentos.php',
                                type:  'post',
                                
                                success:  function (data) {
                                                                        
                                    if (data==='correcto'){
                                        swal({
                                            title: "¡Datos guardados correctamente!",
                                            timer: 3000,
                                            icon: "success",
                                            button: "Aceptar"
                                        });                  

                                        $('#fuelux-wizard-container').wizard('selectedItem', {
                                            step: 3
                                        });                     
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

                no_int: {
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

                cp: {
                    required: true
                },

                rfc: {
                    required: true
                },

                curp_fis: {
                    required: true
                },

                telefono: {
                    required: true
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

                no_int: {
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

                cp: {
                    required: "Favor de ingresar el código postal."
                },

                rfc: {
                    required: "Favor de ingresar el RFC."
                },

                curp_fis: {
                    required: "Favor de ingresar la CURP."
                },

                telefono: {
                    required: "Favor de ingresar el teléfono."
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
                    required: true
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

                no_int_rl: {
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
                    required: true
                },

                estado_rl: {
                    required: true
                },

                telefono_rl: {
                    required: true
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
                    required: "Favor de ingresar el teléfono de la empresa."
                },

                email_pm: {
                    required: "Favor de ingresar el correo electrónico de la empresa."
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

                no_int_rl: {
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
                    required: "Favor de ingresar el código postal."
                },

                estado_rl: {
                    required: "Favor de seleccionar el estado."
                },

                telefono_rl: {
                    required: "Favor de ingresar el teléfono."
                },

                email_rl: {
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

                no_int_dg: {
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

                no_int_dg: {
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
</script>