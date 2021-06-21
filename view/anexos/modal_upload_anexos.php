<?php
include('../../model/solicitud/fill.php');
	
	$id_expediente = $_POST['id_solicitud'];
	$expediente = fill_expediente($id_expediente);
?>

<div id="modal_anexo" class="modal" tabindex="-1" style="overflow-y:auto;">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="blue">Cargar Anexos a la Solicitud
					<small>
						<i class="ace-icon fa fa-angle-double-right"></i>
						Solicitud SARE 6565
					</small>
				</h3>
			</div>

			<div class="modal-body">
				<div class="row">

					<div class="col-xs-12">
						<div class="form-group">
							<div class="col-xs-12">
								<form id="form_anexo" method="POST">
									<input type="hidden" name="folio" id="folio" value="<?= $expediente['folio']?>">
									<input type="hidden" name="id_expediente" id="id_expediente" value="<?= $id_expediente ?>">

									<input multiple type="file" id="anexo" name="anexo" />
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>	

			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times">&nbsp;</i>Cerrar</button>
				<button type="button" class="btn btn-success" data-dismiss="modal" onclick="upload_anexo()"><i class="fa fa-upload">&nbsp;</i>Cargar</button>
			</div>

		</div>	
	</div>
</div>
