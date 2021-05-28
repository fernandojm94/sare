<?php
	include('../../model/suplente/fill.php');
	include('../../controller/funciones.php');

	$suplente = fill_suplente_activo($_SESSION['id_usuario']);
	user_login();
	/*$propietarios = propietarios();
	$tr_propietarios = fill_propietarios($propietarios);
	$modal_editar_propietario = fill_modal_propietario($propietarios);
	$modal_info_propietario = fill_modal_info($propietarios);*/
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
		<li>
			<a href="#">Director</a>
		</li>
		<li class="active">Listado de solicitudes del Director</li>
	</ul><!-- /.breadcrumb -->
</div>

<div class="page-content">
	<div class="page-header">
		<h1>
			Director
			<small>
				<i class="ace-icon fa fa-angle-double-right"></i>
				Listado de solicitudes del Director
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
								<div style="display: inline-block; float: left;">
									<div>
										<label>
											<input id="switch_director" value="<?=$suplente;?>" class="hidden">
											<div id="span_director"></div>
										</label>
									</div>
								</div>

								<span style="display: block;" class="blue bigger-170"></span>
								<span style="display: inline-block;" class="grey bigger-140">Listado de Solicutudes</span>

								<hr style="border-width: 1px; border-color: #b3bbc9;">


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
	<input type="hidden" name="pantalla" id="pantalla" value="<?= $pantalla;?>">
	<div id="load_modal_info"></div>
	<div id="load_modal_upcomprobante"></div>

</div>

<script>

	var check = document.getElementById("switch_director").value;

	if (check == 1) {
		document.getElementById("switch_director").checked = true;
		document.getElementById("span_director").style.backgroundColor = "#87b87f";
		document.getElementById("span_director").innerHTML = "&nbsp;<h4 style='display:inline'>Última Aprobación Activada</h4>";
	}else{
		document.getElementById("switch_director").checked = false;
		document.getElementById("span_director").style.backgroundColor = "#d15b47";
		document.getElementById("span_director").innerHTML = "&nbsp;<h4 style='display:inline'>Última Aprobación Desactivada</h4>";
	}

	$(document).ready(
		fill_tabs()
	);
</script>