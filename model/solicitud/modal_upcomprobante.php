<?php
include('../../model/solicitud/fill.php');
	
	$id_expediente = $_POST['id'];
	$expediente = fill_expediente($id_expediente);
?>

<div id="modal_upcomprobante" class="modal" tabindex="-1" style="overflow-y:auto;">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="blue">Cargar comprobante de pago
					<small>
						<i class="ace-icon fa fa-angle-double-right"></i>
						Solicitud <?= $expediente['folio'];?>
					</small>
				</h3>
			</div>

			<div class="modal-body">

				<form id="form_comprobante" method="POST">
					<input type="hidden" name="folio" id="folio" value="<?= $expediente['folio']?>">
					<input type="hidden" name="id_expediente" id="id_expediente" value="<?= $id_expediente ?>">
					
					<div class="row">
						<div class="col-xs-12">
							<div class="form-group">
								<div class="col-xs-12">
									<input multiple="" type="file" id="comprobante" name="comprobante" />
								</div>
							</div>
						</div>
					</div>
					
				</form>

			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times">&nbsp;</i>Cerrar</button>
				<button type="button" class="btn btn-success" data-dismiss="modal" onclick="upload_comprobante()"><i class="fa fa-upload">&nbsp;</i>Cargar</button>
			</div>

		</div>	
	</div>
</div>