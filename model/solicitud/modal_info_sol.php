<?php
	include('../../model/solicitud/fill.php');

	//INICIA LA SELECCION DE BOTONES QUE SE DEBEN IMPRIMIR PARA CADA ETAPA
	$pantalla = $_POST['pantalla'];
	$etapa = $_POST['etapa'];
	$id = $_POST['id']; 
	valida_visto($id, $etapa);
	$orden_btn = $alerta = '';
	$expediente = fill_expediente($id);
	$num_of = $expediente['solicita_noficial'];
	$rechaz_btn = '<button type="button" class="btn btn-danger" onclick="actualiza_status('.$id.',2,0,0);"><i class="fa fa-ban"></i>&nbsp;Rechazar Solicitud</button>';
	$aprob_btn = '<button type="button" class="btn btn-success" onclick="actualiza_status('.$id.',1,0,0);"><i class="fa fa-check"></i>&nbsp;Aprobar Solicitud</button>';
	$reinicia_btn = '<button id="btn_re" name="btn_re" type="button" class="btn btn-danger" style="display: none" onclick="revivir_sol('.$id.');"><i class="fa fa-refresh"></i>&nbsp;Reiniciar Solicitud</button>';
	
	if(($expediente['status'] == 2) && ($pantalla == 1)){
		$parametros_editar = $id . ',' . $expediente['tipo_persona'] . ',' . "'boton'" . ',' . 0;
		$parametros_editar;
		$editar_btn = '<div class="widget-toolbar">
					<label>
						<small class="blue">
							<b>Editar solicitud</b>
						</small>

						<input onclick="toggDelete();" id="check_edit" name="check_edit" type="checkbox" class="ace ace-switch ace-switch-6" />
						<span class="lbl middle"></span>

						<button class="btn btn-app btn-grey btn-xs radius-4 pull-rigth" id="boton_actualiza" name="boton_actualiza" style="display:none;" onclick="reinicia_solicitud('.$parametros_editar.')">
							<i class="ace-icon fa fa-floppy-o bigger-160"></i>
							<span style="font-size: 12px;">Actualizar</span>
						</button>
					</label>
				</div>';
	}else{
		$editar_btn = '';
	}

	if (($pantalla == 1 && $etapa == 2) || ($pantalla == 1 && $etapa == 3) || ($pantalla == 2 && $etapa == 3) || ($pantalla == 1 && $etapa == 4) || ($pantalla == 1 && $etapa == 5) || ($pantalla == 1 && $etapa == 6) || $etapa == 7 || $pantalla == 8 || $expediente['status'] == 2) {
		
		$rechaz_btn = '';
		$aprob_btn = '';

	}else if($etapa == 4){

		$aprob_btn = '';		
		$rechaz_btn = '';
		$orden_btn = '<button type="button" class="btn btn-primary" onclick="fill_modal_comp_uso('.$id.');"><i class="fa fa-pencil"></i>&nbsp;Redactar dictamen</button>';
	}
	//FIN BOTONES DE CADA ETAPA	
	
	$archivos = $documentos = "";

	
	$datos_generales = fill_datos_generales($expediente['id_persona'], $expediente['tipo_persona']);
	$establecimiento = fill_establecimiento_separado($expediente['id_dg_establecimiento']);
	$dimensiones = fill_dimensiones($expediente['id_dimensiones_establecimiento']);
	$folio_str= str_replace(array("/", " ",":"),array("-","-","-"),$expediente['folio']);
	$ruta = '../../assets/expedientes/'.$folio_str.'/docs';

	$filesDir = scandir('../../assets/expedientes/'.$folio_str.'/docs/documentacion/');
	$filesDir = array_diff($filesDir, array('.', '..'));
	


	$list = '<ul>';
	$url = '';
	foreach($filesDir as $dirFile){
		$url = '/assets/expedientes/'.$folio_str.'/docs/documentacion/'.$dirFile;
		$list .= '<li class="list-group-item node-tree_new" data-nodeid="1" style="color:#FF892A;background-color:undefined;"><span class="indent"></span><span class="icon glyphicon"></span><span class="icon node-icon fa fa-file-pdf-o"></span><a href="'.$url.'" style="color:inherit;" target="_blank"> '.$dirFile.'</a><span class="badge badge-danger" onclick="delete_file(this)"><i class="fa fa-times"></i></span></li>';
	}
	$list .= '</ul>';

	if(is_dir($ruta))
	{
		$archivos = scandir($ruta);	
		foreach ($archivos as $archivo)
		{
			if($archivo != '.')
			{
				if($archivo != '..')
				{

					$link = str_replace('../../', '', $ruta).'/'.$archivo;
					$documentos.='
								<div class="col-sm-2 center">
									<h1>
										<a href="'.$link.'" target="_blank">
											<span class="danger bigger-125">
												<i class="ace-icon fa fa-file-pdf-o"></i>
											</span>
										</a>
										<br>
									</h1>
									<h6 class="center" style="overflow-wrap: break-word;"><a href="'.$link.'" target="_blank">'.$archivo.'</a></h6>
								</div>
							';	
				}
			}
		}
	}
	if($expediente['solicita_noficial'])
	{
		$alerta = "(Solicitan el número oficial)";
	}

?>
<style type="text/css">
	
	*,
	*::before,
	*::after {
	  box-sizing: border-box;
	}

	.input-sizer {
	  display: inline-grid;
	  vertical-align: top;
	  align-items: center;
	  position: relative;
	  padding: 0.25em 0.5em;
	  margin: 0px;
	}
	.input-sizer.stacked {
	  padding: 0.5em;
	  align-items: stretch;
	}
	.input-sizer.stacked::after,
	.input-sizer.stacked input,
	.input-sizer.stacked textarea {
	  grid-area: 2/1;
	}
	.input-sizer::after,
	.input-sizer input,
	.input-sizer textarea {
	  width: auto;
	  min-width: 1em;
	  grid-area: 1/2;
	  font: inherit;
	  padding: 0.25em;
	  margin: 0;
	  resize: none;
	  background: none;
	  -webkit-appearance: none;
	     -moz-appearance: none;
	          appearance: none;
	}
	.input-sizer span {
	  padding: 0.25em;
	}
	.input-sizer::after {
	  content: attr(data-value) " ";
	  visibility: hidden;
	  white-space: pre-wrap;
	}
	.input-sizer:focus-within {

	}
	.input-sizer:focus-within > span {
	  color: blue;
	}
	.input-sizer:focus-within textarea:focus,
	.input-sizer:focus-within input:focus {
	  outline: none;
	}

	/* ---------------------------------- */

	.sinborde {
	  border: 0 !important;
	}

	input[disabled] {
	    color: #000!important;
	    background-color: #fff!important;
	}
</style>

<div id="modal_info" class="modal" tabindex="-1" style="overflow-y:auto;">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">				
				<?= $editar_btn; ?>
				<h1 class="blue">Solicitud <?=$expediente['folio'];?></h1>
				<input type="hidden" id="folio_ruta" value="<?=$expediente['folio'];?>">
				<input type="hidden" id="paso_actual" name="paso_actual" value="1">
			</div>

			<div class="modal-body">
				<div class="row">

					<div class="col-xs-12">

						<div class="tabbable">
				
							<ul id="inbox-tabs" class="nav nav-tabs padding-16 tab-size-bigger tab-space-1">
								<li class="active">
									<a data-toggle="tab" href="#datos" onclick="reinicia_solicitud(<?=$expediente['tipo_persona'];?>,'pestana',<?=$expediente['id_persona'];?>,<?=$expediente['id_dg_establecimiento'];?>,<?=$expediente['id_dimensiones_establecimiento'];?>); new_step(1);">
										<i class="blue ace-icon fa fa-user bigger-130"></i>
										<span class="hid_spa">Datos Generales</span>
									</a>
								</li>

								<li>
									<a data-toggle="tab" href="#establecimiento" onclick="reinicia_solicitud(<?=$expediente['tipo_persona'];?>,'pestana',<?=$expediente['id_persona'];?>,<?=$expediente['id_dg_establecimiento'];?>,<?=$expediente['id_dimensiones_establecimiento'];?>); new_step(2);">
										<i class="green ace-icon fa fa-info-circle bigger-130"></i>
										<span class="hid_spa">Datos del establecimiento</span>
									</a>
								</li>

								<li>
									<a data-toggle="tab" href="#dimensiones" onclick="reinicia_solicitud(<?=$expediente['tipo_persona'];?>,'pestana',<?=$expediente['id_persona'];?>,<?=$expediente['id_dg_establecimiento'];?>,<?=$expediente['id_dimensiones_establecimiento'];?>); new_step(3);">
										<i class="red ace-icon fa fa-building bigger-130"></i>
										<span class="hid_spa">Dimensiones del establecimento</span>
									</a>
								</li>

								<li>
									<a data-toggle="tab" href="#documentos">
										<i class="orange ace-icon fa fa-folder-open bigger-130"></i>
										<span class="hid_spa">Documentación</span>
									</a>
								</li>

							</ul>
								

							<div class="tab-content no-padding">		
								<div id="datos" class="tab-pane fade in active">
									<div class="message-container">
										<div id="id-message-list-navbar" class="message-navbar clearfix">
											<div class="message-bar">
												<div class="message-infobar" id="id-message-infobar">
													<span style="display: block;" class="blue bigger-150">Datos Generales</span>
												</div>
											</div>
										</div>	
										<form id="form_edit_dg">
											<div class="profile-user-info profile-user-info-striped">
												<div class="profile-info-row">
													<div class="profile-info-name"> Nombre: </div>

													<div class="profile-info-value">
														<i class="fa fa-user blue bigger-110"></i>&nbsp;
														<input id="dg0" name="dg0" type="text" class="sinborde"  value="<?=$datos_generales['nombre'];?>" disabled size="50">
													</div>
												</div>

												<div class="profile-info-row">
													<div class="profile-info-name"> Dirección: </div>

													<div class="profile-info-value">
														<div style="display: flex;">
															<div style="align-self: center;">
																<i class="fa fa-map-marker blue bigger-110"></i>&nbsp;
															</div>

															<div>
																<label class="input-sizer">
																	<input onInput="inputs_width(this);" id="dg1" name="dg1" type="text" class="sinborde"  value="<?=$datos_generales['calle'];?>" placeholder="Calle" disabled size="1">
																</label>

																<label class="input-sizer">
																	<input onInput="inputs_width(this)" id="dg2" name="dg2" type="text" class="sinborde"  value="<?=$datos_generales['no_exterior'];?>" placeholder="No. Ext." disabled size="1">
																</label>

																<label class="input-sizer">
																	<input onInput="inputs_width(this)" id="dg3" name="dg3" type="text" class="sinborde"  value="<?=$datos_generales['no_interior'];?>" placeholder="No. Int." disabled size="1">
																</label>

																<label class="input-sizer">
																	<input onInput="inputs_width(this)" id="dg4" name="dg4" type="text" class="sinborde"  value="<?=$datos_generales['colonia'];?>" placeholder="Colonia" disabled size="1">
																</label>

																<label class="input-sizer">
																	<input onInput="inputs_width(this)" id="dg6" name="dg6" type="text" class="sinborde"  value="<?=$datos_generales['localidad'];?>" placeholder="Localidad" disabled size="1">
																</label>

																<label class="input-sizer">
																	<input onInput="inputs_width(this)" id="dg5" name="dg5" type="text" class="sinborde"  value="<?=$datos_generales['municipio'];?>" placeholder="Municipio" disabled size="1">
																</label>

																<label class="input-sizer">
																	<input onInput="inputs_width(this)" id="dg7" name="dg7" type="text" class="sinborde"  value="<?=$datos_generales['c_p'];?>" placeholder="CP" disabled size="1"> 
																</label>

																<label class="input-sizer">
																	<input onInput="inputs_width(this)" id="dg8" name="dg8" type="text" class="sinborde"  value="<?=$datos_generales['estado'];?>" placeholder="Estado" disabled size="1"> 
																</label>
															</div>
														</div>
													</div>
												</div>

												<div class="profile-info-row">
													<div class="profile-info-name"> RFC: </div>

													<div class="profile-info-value">
													<i class="fa fa-user blue bigger-110"></i>&nbsp;
														<input id="dg9" name="dg9" type="text" class="sinborde"  value="<?=$datos_generales['rfc'];?>" disabled size="50">
													</div>
												</div>

												<div class="profile-info-row">
													<div class="profile-info-name"> CURP: </div>

													<div class="profile-info-value">
													<i class="fa fa-user blue bigger-110"></i>&nbsp;
														<input id="dg10" name="dg10" type="text" class="sinborde"  value="<?=$datos_generales['curp'];?>" disabled size="50">
													</div>
												</div>									

												<div class="profile-info-row">
													<div class="profile-info-name"> Teléfono: </div>

													<div class="profile-info-value">
													<i class="fa fa-phone blue bigger-110"></i>&nbsp;
														<input id="dg11" name="dg11" type="text" class="sinborde"  value="<?=$datos_generales['telefono'];?>" disabled size="50">
													</div>
												</div>

												<div class="profile-info-row">
													<div class="profile-info-name"> Correo: </div>

													<div class="profile-info-value">
													<i class="fa fa-envelope blue bigger-110"></i>&nbsp;
														<input id="dg12" name="dg12" type="text" class="sinborde"  value="<?=$datos_generales['email'];?>" disabled size="50">
													</div>
												</div>
											</div>
										</form>
									</div>
								</div>
								
								<div id="establecimiento" class="tab-pane fade">
									<div class="message-container">
										<div id="id-message-list-navbar" class="message-navbar clearfix">
											<div class="message-bar">
												<div class="message-infobar" id="id-message-infobar">
													<span style="display: block;" class="blue bigger-150">Datos del establecimiento</span>
												</div>
											</div>
										</div>		
										<div class="profile-user-info profile-user-info-striped">
											<form id="form_edit_de">
												<div class="profile-info-row">
													<div class="profile-info-name"> Nombre comercial: </div>

													<div class="profile-info-value">
														<i class="fa fa-user green bigger-110"></i>&nbsp;
														<input id="de0" name="de0" type="text" class="sinborde"  value="<?=$establecimiento['nombre_comercial'];?>" disabled size="50">
													</div>
												</div>

												<div class="profile-info-row">
													<div class="profile-info-name"> Dirección: </div>

													<div class="profile-info-value">
														<div style="display: flex;">
															<div style="align-self: center;">
																<i class="fa fa-map-marker green bigger-110"></i>&nbsp;
															</div>

															<div>
																<label class="input-sizer">
																	<input onInput="inputs_width(this)" id="de1" name="de1" type="text" class="sinborde"  value="<?=$establecimiento['calle'];?>" disabled placeholder="Calle" size="1">
																</label>
																<label class="input-sizer">
																	<input onInput="inputs_width(this)" id="de2" name="de2" type="text" class="sinborde"  value="<?=$establecimiento['no_exterior'];?>" disabled placeholder="No. Ext." size="1">
																</label>
																<label class="input-sizer">
																	<input onInput="inputs_width(this)" id="de3" name="de3" type="text" class="sinborde"  value="<?=$establecimiento['no_interior'];?>" disabled placeholder="No. Int." size="1">
																</label>
																<label class="input-sizer">
																	<input onInput="inputs_width(this)" id="de4" name="de4" type="text" class="sinborde"  value="<?=$establecimiento['colonia'];?>" disabled placeholder="Colonia" size="1">
																</label>
																<label class="input-sizer">
																	<input onInput="inputs_width(this)" id="de6" name="de6" type="text" class="sinborde"  value="<?=$establecimiento['localidad'];?>" disabled placeholder="Localidad" size="1">
																</label>
																<label class="input-sizer">
																	<input onInput="inputs_width(this)" id="de5" name="de5" type="text" class="sinborde"  value="<?=$establecimiento['municipio'];?>" disabled placeholder="Municipio" size="1">
																</label>
																<label class="input-sizer">
																	<input onInput="inputs_width(this)" id="de7" name="de7" type="text" class="sinborde"  value="<?=$establecimiento['cp'];?>" disabled placeholder="CP" size="1">
																</label>
															</div>
														</div>	
													</div>
												</div>

												<div class="profile-info-row">
													<div class="profile-info-name"> Localización: </div>

													<div class="profile-info-value">
														<!--<i class="fa fa-map-marker green bigger-110"></i>&nbsp;
														 <span><?=$establecimiento['latitud_longitud']?></span> -->
														 <a href="https://maps.google.com/?q=<?=$establecimiento['latitud_longitud']?>&z=23" target="_blank"><img src="./assets/expedientes/<?=$expediente['folio'];?>/docs/mapa.png" width="50%" height="50%"></a>
													</div>
												</div>

												<div class="profile-info-row">
													<div class="profile-info-name"> Horario de trabajo: </div>

													<div class="profile-info-value">
													<i class="fa fa-clock-o green bigger-110"></i>&nbsp;
														<input id="de8" name="de8" type="text" class="sinborde"  value="<?=$establecimiento['horario_trabajo'];?>" disabled size="50">
													</div>
												</div>

												<div class="profile-info-row">
													<div class="profile-info-name"> Uso actual: </div>

													<div class="profile-info-value">
													<i class="fa fa-building green bigger-110"></i>&nbsp;
														<input id="de9" name="de9" type="text" class="sinborde"  value="<?=$establecimiento['uso_actual'];?>" disabled size="50">
													</div>
												</div>									

												<div class="profile-info-row">
													<div class="profile-info-name"> Teléfono: </div>

													<div class="profile-info-value">
													<i class="fa fa-phone green bigger-110"></i>&nbsp;
														<input id="de10" name="de10" type="text" class="sinborde"  value="<?=$establecimiento['telefono'];?>" disabled size="50">
													</div>
												</div>

												<div class="profile-info-row">
													<div class="profile-info-name"> Cuenta catastral: </div>

													<div class="profile-info-value">
													<i class="fa fa-map-marker green bigger-110"></i>&nbsp;
														<input id="de11" name="de11" type="text" class="sinborde"  value="<?=$establecimiento['cuenta_catastral'];?>" disabled size="50">
													</div>
												</div>

												<div class="profile-info-row">
													<div class="profile-info-name"> Manzana - Lote: </div>

													<div class="profile-info-value">
													<i class="fa fa-map-marker green bigger-110"></i>&nbsp;
														<input id="de12" name="de12" type="text" class="sinborde"  value="<?=$establecimiento['manzana'];?>" disabled size="50">
													</div>
												</div>

												<div class="profile-info-row">
													<div class="profile-info-name">Servicios existentes: </div>

													<div class="profile-info-value">
													<i class="fa fa-cogs green bigger-110"></i>&nbsp;
														<label class="input-sizer">
															<input id="de13" name="de13" type="text" class="sinborde"  value="<?=$establecimiento['servicios_existentes'];?>" disabled>
														</label>	
													</div>
												</div>
											</form>
										</div>
									</div>
								</div>

								<div id="dimensiones" class="tab-pane fade">
									<div class="message-container">
										<div id="id-message-list-navbar" class="message-navbar clearfix">
											<div class="message-bar">
												<div class="message-infobar" id="id-message-infobar">
													<span style="display: block;" class="blue bigger-150">Dimensiones del establecimiento</span>
												</div>
											</div>
										</div>		
										<div class="profile-user-info profile-user-info-striped">
											<form id="form_edit_dim">
												<div class="profile-info-row">
													<div class="profile-info-name"> Frente: </div>

													<div class="profile-info-value">
														<i class="fa fa-map-marker red bigger-110"></i>&nbsp;
														<input id="dim0" name="dim0" type="text" class="sinborde"  value="<?=$dimensiones['frente'];?>" disabled size="2"><span>mts</span>
													</div>
												</div>

												<div class="profile-info-row">
													<div class="profile-info-name"> Fondo: </div>

													<div class="profile-info-value">
														<i class="fa fa-map-marker red bigger-110"></i>&nbsp;
														<input id="dim1" name="dim1" type="text" class="sinborde"  value="<?=$dimensiones['fondo'];?>" disabled size="2"><span>mts</span>
													</div>
												</div>

												<div class="profile-info-row">
													<div class="profile-info-name"> Costado derecho: </div>

													<div class="profile-info-value">
														<i class="fa fa-map-marker red bigger-110"></i>&nbsp;
														<input id="dim2" name="dim2" type="text" class="sinborde"  value="<?=$dimensiones['derecho'];?>" disabled size="2"><span>mts</span>
													</div>
												</div>

												<div class="profile-info-row">
													<div class="profile-info-name"> Costado izquierdo: </div>

													<div class="profile-info-value">
														<i class="fa fa-map-marker red bigger-110"></i>&nbsp;
														<input id="dim3" name="dim3" type="text" class="sinborde"  value="<?=$dimensiones['izquierdo'];?>" disabled size="2"><span>mts</span>
													</div>
												</div>

												<div class="profile-info-row">
													<div class="profile-info-name"> Superficie del terreno: </div>

													<div class="profile-info-value">
													<i class="fa fa-map-marker red bigger-110"></i>&nbsp;
														<input id="dim4" name="dim4" type="text" class="sinborde"  value="<?=$dimensiones['sup_terreno'];?>" disabled size="2"><span>mts<sup>2</sup></span>
													</div>
												</div>

												<div class="profile-info-row">
													<div class="profile-info-name"> Superficie del local: </div>

													<div class="profile-info-value">
													<i class="fa fa-map-marker red bigger-110"></i>&nbsp;
														<input id="dim5" name="dim5" type="text" class="sinborde"  value="<?=$dimensiones['sup_local'];?>" disabled size="2"><span>mts<sup>2</sup></span>
													</div>
												</div>									

												<div class="profile-info-row">
													<div class="profile-info-name"> Cuenta predial: </div>

													<div class="profile-info-value">
													<i class="fa fa-home red bigger-110"></i>&nbsp;
														<input id="dim6" name="dim6" type="text" class="sinborde"  value="<?=$dimensiones['cuenta_predial'];?>" disabled size="50">
													</div>
												</div>
											</form>									
										</div>
									</div>
								</div>

								<div id="documentos" class="tab-pane fade">
									<div class="message-container">
										<div id="id-message-list-navbar" class="message-navbar clearfix">
											<div class="message-bar">
												<div class="message-infobar" id="id-message-infobar">
													<span class="blue bigger-150">Documentación</span><span class="red">&nbsp;<?=$alerta;?></span>
												</div>
											</div>
										</div>

										<div class="message-footer clearfix">
											
											<div class="col-xs-12 treeEditFile" style="display: none;">
												<div class="widget-body">
													<div style="padding: 2em;">
														<?= $list; ?>
													</div>
												</div>
											</div>

											<div class="col-xs-12 treeEditFile" style="display: initial;">
												<div class="widget-body">
													<div id="tree_new"></div>
													<div class="widget-main padding-8">
														<ul id="tree2"></ul>
													</div>
												</div>
											</div>

											<div class="col-xs-12 treeEditFile" style="display: none;">
												<form class="well form-horizontal" method="post" id="form_drop_docs" name="form_drop_docs">
													<fieldset>
														<br>
														<div class="form-group">
															<div class="col-xs-12">
																<div class="widget-box">
																	<div class="widget-body">
																		<div class="widget-main">
																			<div class="form-group">
																				<div class="col-xs-12">
																					<input type="hidden" name="id_expediente" id="id_expediente" value="<?=$id;?>">
																					<input type="hidden" name="folio_docs" id="folio_docs" value="<?=$expediente['folio'];?>">
																					<input multiple="multiple" class="form-control" type="file" id="dropFileInput" name="dropFileInput" />
																				</div>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</fieldset>
													<div align="center">
														<a onclick="reupload_files();" role="button" type="button" class="btn btn-success"><i class="fa fa-cloud-upload"></i>&nbsp;Subir Archivos</a>
													</div>
												</form>
											</div>

										</div>
									</div>
								</div>

							</div><!-- /.tab-content -->
							<br>
						</div><!-- /.tabbable -->
					</div>
				</div>
			</div>	

			<div class="modal-footer">
				<button type="button" class="btn btn-secondary pull-left" data-dismiss="modal"><i class="fa fa-times">&nbsp;</i>Cerrar</button>

				<?= $orden_btn; ?>
				<?= $aprob_btn; ?>
				<?= $rechaz_btn; ?>
				<?= $reinicia_btn; ?>
				
			</div>

		</div>	
	</div>
</div>