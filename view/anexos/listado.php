<?php
	include('../../controller/funciones.php');
	user_login();

	$pantalla = $_GET['pantalla']; 

?>


<style type="text/css">

	#span_director{
		padding: 5px;
		border-radius: 5px;
	}

	#span_director h4{
		color: white;
	}

</style>

<div class="breadcrumbs ace-save-state" id="breadcrumbs">
	<ul class="breadcrumb">
		<li>
			<i class="ace-icon fa fa-home home-icon"></i>
			<a href="inicio.php">Inicio</a>
		</li>
		<!--<li>
			<a href="#">Dependencia</a>
		</li>-->
		<li class="active">
			<i></i>
			<a href="javascript:cambiarcont('./view/anexos/listado.php')">Listado de Solucitudes Aprobadas</a>
		</li>
	</ul><!-- /.breadcrumb -->
</div>

<div class="page-content">
	<div class="page-header">
		<h1>
			Dependencia
			<!--<small>
				<i class="ace-icon fa fa-angle-double-right"></i>
				COMENTARIOS
			</small>-->
		</h1>
	</div><!-- /.page-header -->

	<div class="row">
		<div class="col-xs-12">
			<div class="container" style="width: 100%;">
				<div class="message-container">
					<div id="id-message-list-navbar" class="message-navbar clearfix">
						<div style="margin-top: 15px;">
							<div class="message-infobar clearfix" id="id-message-infobar">

								<!--<hr style="border-width: 1px; border-color: #b3bbc9;">-->


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
					</div>
				</div>
				<hr>
			</div>
		</div>
	</div>

	<input type="hidden" id="pantalla" value="<?= $pantalla; ?>">
	<div id="load_modal_info"></div>
	<div id="modal_upload_anexo"></div>

</div>

<script>

	$(document).ready(fill_tabs());

    function fill_modal_update_anexos(id_solicitud){

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
                //document.getElementById("loading").innerHTML = ''; // Hide the image after the response from the
                document.getElementById("modal_upload_anexo").innerHTML=xmlhttp.responseText;
                dropzone();
                $('#modal_anexo').modal('show');
                waitingDialog.hide();
            }
        }

        var datos_modal = 'id_solicitud=' + id_solicitud;

        waitingDialog.show('Cargando Información', {dialogSize: 'sm', progressType: 'warning'})
        xmlhttp.open("POST","./view/anexos/modal_upload_anexos.php",true);
        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlhttp.send(datos_modal);
    }

    function dropzone(){
    	$('#anexo').ace_file_input({
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

    function upload_anexo(){

    	var comp = $('#anexo').next();
		comp = $(comp).hasClass("selected");
		
		if(comp == true){
	    	var myForm = document.getElementById('form_anexo');
			var formData = new FormData(myForm);

			$.ajax({
				data:  formData,
				url:   './model/anexos/upload_anexos.php',
				type:  'post',
				processData: false,
	            contentType: false,

				success:  function (data) {

					if (data==='correcto'){
						swal({
							title: "¡Correcto!",
							text: "¡El status fue cambiado!",
							icon: "success"
						});
					}

					if (data==='error'){
						swal({
							title: "¡Error!",
							text: "¡Ocurrió algo al cambiar el status!",
							icon: "error"
						});
					}
				}
			});
		}else{
			swal({
                title: "¡Error!",
                text: "No has seleccionado ningún archivo",
                icon: "error",
                button: "Aceptar"
            });
		}	
    }

</script>