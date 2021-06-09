<?php
	include('../../model/solicitud/fill.php');

	//INICIA LA SELECCION DE BOTONES QUE SE DEBEN IMPRIMIR PARA CADA ETAPA
	$etapa = $_POST['etapa'];
	$id = $_POST['id']; 
	valida_visto($id, $etapa);
	$orden_btn = '';
	$rechaz_btn = '<button type="button" class="btn btn-danger" onclick="rechazar('.$id.');"><i class="fa fa-ban"></i>&nbsp;Rechazar Solicitud</button>';
	$aprob_btn = '<button type="button" class="btn btn-success" onclick="aprobar('.$id.');"><i class="fa fa-check"></i>&nbsp;Aprobar Solicitud</button>';	

	if ($etapa == '' || $etapa == ' ' || $etapa == 1) {
		
		$rechaz_btn = '';
		$aprob_btn = '';

	}else if($etapa == 3){

		$aprob_btn = '';	

	}else if($etapa == 4){

		$aprob_btn = '';		
		$rechaz_btn = '';
		$orden_btn = '<button type="button" class="btn btn-primary" onclick="fill_modal_comp_uso('.$id.');"><i class="fa fa-pencil"></i>&nbsp;Redactar dictámen</button>';
	}
	//FIN BOTONES DE CADA ETAPA	
	
	$archivos = $documentos = "";
	$expediente = fill_expediente($id);

	if($expediente['tipo_persona'])
	{
		$datos_generales = fill_persona_moral($expediente['id_persona']);
	}else{
		$datos_generales = fill_persona_fisica($expediente['id_persona']);
	}
	$establecimiento = fill_establecimiento($expediente['id_dg_establecimiento']);
	$dimensiones = fill_dimensiones($expediente['id_dimensiones_establecimiento']);
	$folio_str= str_replace(array("/", " ",":"),array("-","-","-"),$expediente['folio']);
	$ruta = '../../assets/expedientes/'.$folio_str.'/docs';

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
									<h6 class="center"><a href="'.$link.'" target="_blank">'.$archivo.'</a></h6>
								</div>
							';	
				}
			}
		}
	}

?>
<div id="modal_info" class="modal" tabindex="-1" style="overflow-y:auto;">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="blue">Solicitud <?=$expediente['folio'];?></h1>
			</div>

			<div class="modal-body">
				<div class="row">

					<div class="col-xs-12">

						<div class="tabbable">
				
							<ul id="inbox-tabs" class="nav nav-tabs padding-16 tab-size-bigger tab-space-1">
								<li class="active">
									<a data-toggle="tab" href="#datos">
										<i class="blue ace-icon fa fa-user bigger-130"></i>
										<span class="hid_spa">Datos Generales</span>
									</a>
								</li>

								<li>
									<a data-toggle="tab" href="#establecimiento">
										<i class="green ace-icon fa fa-info-circle bigger-130"></i>
										<span class="hid_spa">Datos del establecimiento</span>
									</a>
								</li>

								<li>
									<a data-toggle="tab" href="#dimensiones">
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
										<div class="profile-user-info profile-user-info-striped">
											<div class="profile-info-row">
												<div class="profile-info-name"> Nombre: </div>

												<div class="profile-info-value">
													<i class="fa fa-user blue bigger-110"></i>&nbsp;
													<span><?=$datos_generales['nombre'];?></span>
												</div>
											</div>

											<div class="profile-info-row">
												<div class="profile-info-name"> Dirección: </div>

												<div class="profile-info-value">
													<i class="fa fa-map-marker blue bigger-110"></i>&nbsp;
													<span><?=$datos_generales['domicilio']?></span>
												</div>
											</div>

											<div class="profile-info-row">
												<div class="profile-info-name"> RFC: </div>

												<div class="profile-info-value">
												<i class="fa fa-user blue bigger-110"></i>&nbsp;
													<span><?=$datos_generales['rfc']?></span>
												</div>
											</div>

											<div class="profile-info-row">
												<div class="profile-info-name"> CURP: </div>

												<div class="profile-info-value">
												<i class="fa fa-user blue bigger-110"></i>&nbsp;
													<span><?=$datos_generales['curp']?></span>
												</div>
											</div>									

											<div class="profile-info-row">
												<div class="profile-info-name"> Teléfono: </div>

												<div class="profile-info-value">
												<i class="fa fa-phone blue bigger-110"></i>&nbsp;
													<span><?=$datos_generales['telefono']?></span>
												</div>
											</div>

											<div class="profile-info-row">
												<div class="profile-info-name"> Correo: </div>

												<div class="profile-info-value">
												<i class="fa fa-envelope blue bigger-110"></i>&nbsp;
													<span><?=$datos_generales['email']?></span>
												</div>
											</div>

										</div>
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
											<div class="profile-info-row">
												<div class="profile-info-name"> Nombre comercial: </div>

												<div class="profile-info-value">
													<i class="fa fa-user green bigger-110"></i>&nbsp;
													<span><?=$establecimiento['nombre_comercial']?></span>
												</div>
											</div>

											<div class="profile-info-row">
												<div class="profile-info-name"> Dirección: </div>

												<div class="profile-info-value">
													<i class="fa fa-map-marker green bigger-110"></i>&nbsp;
													<span><?=$establecimiento['domicilio']?></span>
												</div>
											</div>

											<div class="profile-info-row">
												<div class="profile-info-name"> Localización: </div>

												<div class="profile-info-value">
													<i class="fa fa-map-marker green bigger-110"></i>&nbsp;
													<span><?=$establecimiento['latitud_longitud']?></span>
												</div>
											</div>

											<div class="profile-info-row">
												<div class="profile-info-name"> Horario de trabajo: </div>

												<div class="profile-info-value">
												<i class="fa fa-clock-o green bigger-110"></i>&nbsp;
													<span><?=$establecimiento['horario_trabajo']?></span>
												</div>
											</div>

											<div class="profile-info-row">
												<div class="profile-info-name"> Uso actual: </div>

												<div class="profile-info-value">
												<i class="fa fa-building green bigger-110"></i>&nbsp;
													<span><?=$establecimiento['uso_actual']?></span>
												</div>
											</div>									

											<div class="profile-info-row">
												<div class="profile-info-name"> Teléfono: </div>

												<div class="profile-info-value">
												<i class="fa fa-phone green bigger-110"></i>&nbsp;
													<span><?=$establecimiento['telefono']?></span>
												</div>
											</div>

											<div class="profile-info-row">
												<div class="profile-info-name"> Cuenta catastral: </div>

												<div class="profile-info-value">
												<i class="fa fa-map-marker green bigger-110"></i>&nbsp;
													<span><?=$establecimiento['cuenta_catastral']?></span>
												</div>
											</div>

											<div class="profile-info-row">
												<div class="profile-info-name"> Manzana - Lote: </div>

												<div class="profile-info-value">
												<i class="fa fa-map-marker green bigger-110"></i>&nbsp;
													<span><?=$establecimiento['manzana'].' -'.$establecimiento['lote']?></span>
												</div>
											</div>

											<div class="profile-info-row">
												<div class="profile-info-name">Servicios existentes: </div>

												<div class="profile-info-value">
												<i class="fa fa-cogs green bigger-110"></i>&nbsp;
													<span><?=$establecimiento['servicios_existentes']?></span>
												</div>
											</div>

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
											<div class="profile-info-row">
												<div class="profile-info-name"> Frente x Fondo: </div>

												<div class="profile-info-value">
													<i class="fa fa-map-marker red bigger-110"></i>&nbsp;
													<span><?=$dimensiones['frente'].' mts. X '.$dimensiones['fondo'].' mts.'?></span>
												</div>
											</div>

											<div class="profile-info-row">
												<div class="profile-info-name"> Costado derecho: </div>

												<div class="profile-info-value">
													<i class="fa fa-map-marker red bigger-110"></i>&nbsp;
													<span><?=$dimensiones['derecho'].' mts.'?></span>
												</div>
											</div>

											<div class="profile-info-row">
												<div class="profile-info-name"> Costado izquierdo: </div>

												<div class="profile-info-value">
													<i class="fa fa-map-marker red bigger-110"></i>&nbsp;
													<span><?=$dimensiones['izquierdo'].' mts.'?></span>
												</div>
											</div>

											<div class="profile-info-row">
												<div class="profile-info-name"> Superficie del terreno: </div>

												<div class="profile-info-value">
												<i class="fa fa-map-marker red bigger-110"></i>&nbsp;
													<span><?=$dimensiones['sup_terreno'].' mts.'?><sup>2</sup>.</span>
												</div>
											</div>

											<div class="profile-info-row">
												<div class="profile-info-name"> Superficie del local: </div>

												<div class="profile-info-value">
												<i class="fa fa-map-marker red bigger-110"></i>&nbsp;
													<span><?=$dimensiones['sup_local'].' mts.'?><sup>2</sup>.</span>
												</div>
											</div>									

											<div class="profile-info-row">
												<div class="profile-info-name"> Cuenta predial: </div>

												<div class="profile-info-value">
												<i class="fa fa-home red bigger-110"></i>&nbsp;
													<span><?=$dimensiones['cuenta_predial']?></span>
												</div>
											</div>											
										</div>
									</div>
								</div>

								<div id="documentos" class="tab-pane fade">
									<div class="message-container">
										<div id="id-message-list-navbar" class="message-navbar clearfix">
											<div class="message-bar">
												<div class="message-infobar" id="id-message-infobar">
													<span class="blue bigger-150">Documentación</span>
												</div>
											</div>
										</div>

										<div class="message-footer clearfix">
											<?=$documentos?>
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
				
			</div>

		</div>	
	</div>
</div>
