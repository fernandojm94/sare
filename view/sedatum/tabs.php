<?php
	$id_tab = $_POST['id'];

	// $sec_or_dir = $_POST['algo']; SIRVE PARA IDENTIFICAR DESDE DONDE LLAMAN AL MODAL, DESDE DIRECTOR O DESDE SECRETARIO
	$sec_or_dir = 2; //ASIGNACION PARA QUE NO MARQUE ERROR
?>

<div id="<?=$id_tab;?>" class="tab-pane in active">
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
									<i class="ace-icon fa fa-clock-o bigger-110 ico_hid"></i>
									Fecha y hora de creación
								</th>

								<th>
									<i class="ace-icon fa fa-building bigger-110 ico_hid"></i>
									Nombre establecimiento
								</th>

								<th class="hid_xs">
									<i class="ace-icon fa fa-map-marker bigger-110 ico_hid"></i>
									Dirección
								</th>

								<th class="hidden"></th>


								<th class="hid_xs">
									<i class="ace-icon fa fa-phone bigger-110 ico_hid"></i>
									Número de teléfono
								</th>

								<th>
									<i class="ace-icon fa fa-sliders bigger-110 ico_hid"></i>
									Estatus de la solicitud
								</th>

								<th>
									<i class="ace-icon fa fa-cogs bigger-110 ico_hid"></i>
									Acciones
								</th>
							</tr>
						</thead>

						<tbody>
							<tr>
								<td>10 de noviembre 2020 15:34:21</td>
								<td>Abarrotes Mi casita</td>
								<td class="hid_xs">
									Emiliano Zapata 109 Centro, Jesús María
								</td>
								<td class="hidden"></td>
								<td class="hid_xs">449 121 1213</td>
								<td class="center"><span class="label label-warning arrowed-right">3. Departamento de uso de suelo.</span></td>
								<td class="center">
									<div class="btn-group">
										<a class="btn btn-xs btn-info" onclick="fill_modal_info(<?= $sec_or_dir; ?>)" role="button" data-toggle="modal">
											<i class="ace-icon fa fa-info-circle bigger-130"></i>
										</a>
									</div>
								</td>
							</tr>

							<!-- <tr>
								<td>2 de diciembre 2020 12:04:55</td>
								<td>Cadena Comercial Oxxo</td>
								<td class="hid_xs">
									Av. López Mateos 1024, Lomas de Jesús María
								</td>
								<td class="hidden"></td>
								<td class="hid_xs">449 895 7852</td>
								<td class="center"><span class="label label-danger arrowed-right">2. Comprobante de pago.</span></td>
								<td class="center">
									<div class="btn-group">
										<a class="btn btn-xs btn-info" onclick="fill_modal_info(2)" role="button" data-toggle="modal">
											<i class="ace-icon fa fa-info-circle bigger-130"></i>
										</a>

										<a class="btn btn-xs btn-success" onclick="fill_modal_upcomprobante(2)" role="button" data-toggle="modal">
											<i class="ace-icon fa fa-upload bigger-130"></i>
										</a>
									</div>
								</td>
							</tr> -->

						</tbody>
					</table>
				</div>
			</div>
		</div>

	</div>
</div>
