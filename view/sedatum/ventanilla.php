<?php
	//include('../../model/propietarios/fill_propietarios.php');
	include('../../controller/funciones.php');
	user_login();
	/*$propietarios = propietarios();
	$tr_propietarios = fill_propietarios($propietarios);
	$modal_editar_propietario = fill_modal_propietario($propietarios);
	$modal_info_propietario = fill_modal_info($propietarios);*/
	$pantalla = $_GET['pantalla'];
?>

<style type="text/css">
	
	 
	
</style>

<div class="breadcrumbs ace-save-state" id="breadcrumbs">
	<ul class="breadcrumb">
		<li>
			<i class="ace-icon fa fa-home home-icon"></i>
			<a href="inicio.php">Inicio</a>
		</li>
		<li>
			<a href="#">Ventanilla Única</a>
		</li>
		<li class="active">Listado de solicitudes ventanilla única </li>
	</ul><!-- /.breadcrumb -->	
</div>

<div class="page-content"> 
	<div class="page-header">		
		<h1>
			
				<i class="ace-icon fa fa-angle-double-right"></i>
				Listado de solicitudes ventanilla única
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
								<span style="display: inline-block;" class="grey bigger-140">Listado de Solicitudes</span> 

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
	<div id="load_modal_recibo"></div>
</div>

<script type="text/javascript">

	$(document).ready(
		fill_tabs()
	);

	function cambia_edit() {
		var inp = $('#costo').get(0);
		if(inp.hasAttribute('disabled')) {
			inp.removeAttribute('disabled');
		}
		else {
			inp.setAttribute('disabled' , 'disabled');
		}
	}	
</script>