<?php

	include('../../model/solicitud/fill.php');
	include('../../controller/funciones.php');
	$id = $_POST['id'];//ES EL NOMBRE DEL TAB EN LA QUE SE ENCUENTRA
	$etapa = $_POST['pantalla'];

	if($id == "pendientes")
	{
		$solicitudes  = pendientes_etapa($etapa);		
	}else{
		if($etapa == 1 OR $etapa == 7)
		{
			$solicitudes  = atendidas();	
		}else{
			$solicitudes  = atendidas_etapa($etapa);
		}		
		
	}
	$tr_solicitudes = fill_solicitudes($solicitudes, $etapa);	

	// $tipo = $_POST['algo']; SIRVE PARA IDENTIFICAR DESDE DONDE LLAMAN AL MODAL, DESDE DIRECTOR O DESDE SECRETARIO
	$tipo = 2; //ASIGNACION PARA QUE NO MARQUE ERROR
	$ausencia = 0;
?>

<div id="<?=$id;?>" class="tab-pane in active">
	<div class="message-container">
		<div id="id-message-list-navbar" class="message-navbar clearfix">
			<div class="pull-right tableTools-container"></div>
		</div>

		<div class="message-list-container">
			<div class="message-list" id="message-list">
				<div>
					<table id="dynamic-table" class="table table-striped table-bordered table-hover">
						<thead>
							<tr>
								<th>
									<i class="ace-icon fa fa-building bigger-110 ico_hid"></i>
									Nombre establecimiento
								</th>

								<th>
									<i class="ace-icon fa fa-clock-o bigger-110 ico_hid"></i>
									Fecha y hora de creación
								</th>

								<th class="hid_xs">
									<i class="ace-icon fa fa-map-marker bigger-110 ico_hid"></i>
									Dirección
								</th>

								<th class="hid_xs">
									<i class="ace-icon fa fa-phone bigger-110 ico_hid"></i>
									Número de teléfono
								</th>

								<th>
									<i class="ace-icon fa fa-flag bigger-110 ico_hid"></i>
									Etapa
								</th>

								<th>
									<i class="ace-icon fa fa-sliders bigger-110 ico_hid"></i>
									Estatus de la solicitud
								</th>

								<th style="min-width: 94px !important;">
									<i class="ace-icon fa fa-cogs bigger-110 ico_hid"></i>
									Acciones
								</th>
							</tr>
						</thead>

						<tbody>
							<?=$tr_solicitudes;?>
						</tbody>
					</table>
				</div>
			</div>
		</div>

	</div>
</div>
