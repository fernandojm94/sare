<?php
	
	include('../../controller/funciones.php');
	user_login();
	
	//$modal_editar_propietario = fill_modal_propietario($propietarios);
	//$modal_info_propietario = fill_modal_info($propietarios);

	$pantalla = $_GET['pantalla'];
?>


<style type="text/css">
	
	@media only screen and (max-width: 520px){
		i + span{
			display: none;
		}
	}
	
</style>
<div class="breadcrumbs ace-save-state" id="breadcrumbs">
	<ul class="breadcrumb">
		<li>
			<i class="ace-icon fa fa-home home-icon"></i>
			<a href="inicio.php">Inicio</a>
		</li>
		<li>
			<a href="#">Solicitudes</a>
		</li>
		<li class="active">Listado de solicitudes</li>
	</ul><!-- /.breadcrumb -->	
</div>

<div class="page-content"> 
	<div class="page-header">		
		<h1>
			Solicitudes
			<small>
				<i class="ace-icon fa fa-angle-double-right"></i>
				Listado de solicitudes
			</small>
		</h1>
	</div><!-- /.page-header -->
	<div class="row">
		<div class="col-xs-12">
			<div class="container" style="width: 100%;">
				<div class="message-container">
					<div id="id-message-list-navbar" class="message-navbar clearfix">
						<div class="">
							<div class="message-infobar clearfix" id="id-message-infobar">
								<span style="display: block;" class="blue bigger-170"></span>
								<span style="display: inline-block;" class="grey bigger-140">Solicitudes registradas</span>
								 <div style="display: inline-block; float: right;">
									<a href="javascript:cambiarcont('view/solicitud/nuevo.php');" class="btn btn-primary">
										<i class="ace-icon fa fa-book"></i>
										<span>Nueva Solicitud</span>
									</a>
								</div> 

								<hr style="border-width: 1px; border-color: #b3bbc9;">									
							</div>
						</div>

						<div class="row">
							<div class="col-xs-12">
								<div class="row">
									<div class="col-xs-12">
										<div class="tabbable">
											<ul id="inbox-tabs" class="inbox-tabs nav nav-tabs padding-16 tab-size-bigger tab-space-1">

												<li class="active" onclick="fill_tabs(this)">
													<a data-toggle="tab" href="#pendientes" data-target="pendientes">
														<i class="blue ace-icon fa fa-clock-o bigger-130"></i>
														<span class="bigger-110">Pendientes</span>
													</a>
												</li>

												<li class="" onclick="fill_tabs(this)">
													<a data-toggle="tab" href="#atendidas" data-target="atendidas">
														<i class="orange ace-icon fa fa-check bigger-130"></i>
														<span class="bigger-110">Atendidas</span>
													</a>
												</li>

											</ul>

											<div class="tab-content no-border no-padding" id="tabs">
												<!--AQUI SE IMPRIMEN LAS TABS-->
											</div>

										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<hr>
			</div>
		</div>	
	</div>

	<input type="hidden" name="pantalla" id="pantalla" value="<?= $pantalla;?>">
	<div id="load_modal_info"></div>
	<div id="load_modal_upcomprobante"></div>

</div>

<script>

	$(document).ready(
		fill_tabs()
	);

    function fill_modal_upcomprobante(id)
    {
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
                document.getElementById("load_modal_upcomprobante").innerHTML=xmlhttp.responseText;                
                waitingDialog.hide();
                $('#modal_upcomprobante').modal('show');
                dropzone();
            }
        }

        var datos_modal = id;

        waitingDialog.show('Cargando Información', {dialogSize: 'sm', progressType: 'warning'})
        xmlhttp.open("POST","./model/solicitud/modal_upcomprobante.php",true);
        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlhttp.send(datos_modal);
    }

    function dropzone(){
    	$('#comprobante').ace_file_input({
			style: 'well',
			btn_choose: 'Arrastra o da click para agregar archivos',
			btn_change: null,
			no_icon: 'ace-icon fa fa-cloud-upload',
			droppable: true,
			thumbnail: 'small'//large | fit
			//,icon_remove:null//set null, to hide remove/reset button
			/**,before_change:function(files, dropped) {
				//Check an example below
				//or examples/file-upload.html
				return true;
			}*/
			/**,before_remove : function() {
				return true;
			}*/
			,
			preview_error : function(filename, error_code) {
				//name of the file that failed
				//error_code values
				//1 = 'FILE_LOAD_FAILED',
				//2 = 'IMAGE_LOAD_FAILED',
				//3 = 'THUMBNAIL_FAILED'
				//alert(error_code);
			}
	
		}).on('change', function(){
			//console.log($(this).data('ace_input_files'));
			//console.log($(this).data('ace_input_method'));
		});
    }

</script>