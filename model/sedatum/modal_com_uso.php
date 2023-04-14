<?php
	include('../../model/solicitud/fill.php');
	$id = $_POST['id']; 
	$expediente = fill_expediente($id);
?>

<div id="modal_comp" class="modal" tabindex="-1" style="overflow-y:auto;">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h1 class="blue">Complemento solicitud <?=$expediente['folio'];?></h1>
			</div>

			<div class="modal-body">
				<div class="row">
					<div class="col-xs-12">
							<div class="wysiwyg-editor" id="complemento" name="complemento"></div>
							<br>
							<br>
						<form id="form_comp_uso" name="form_comp_uso">
							<input type="hidden" name="id_solicitud" id="id_solicitud" value="<?=$id;?>">
							<input type="hidden" name="folio" id="id_solicitud" value="<?=$expediente['folio'];?>">
							<div class="form-group">
								<div class="col-xs-12">
									<input type="file" id="file_uso" name="file_uso" accept="application/pdf"/>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>	

			<div class="modal-footer">
				<button type="button" class="btn btn-danger pull-left" data-dismiss="modal" onclick="show_hide_modals()"><i class="fa fa-times">&nbsp;</i>Cancelar</button>
				<button type="button" class="btn btn-success" onclick="upload_doc_uso(<?=$id;?>,1,document.getElementById('complemento').innerHTML,0);"><i class="fa fa-check">&nbsp;</i>Aprobar solicitud</button>
				<button type="button" class="btn btn-danger" onclick="actualiza_status(<?=$id;?>,2,document.getElementById('complemento').innerHTML,0)"><i class="fa fa-ban"></i>&nbsp;Rechazar Solicitud</button>
			</div>

		</div>	
	</div>
</div>
