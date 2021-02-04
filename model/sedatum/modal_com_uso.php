<div id="modal_comp" class="modal" tabindex="-1" style="overflow-y:auto;">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h1 class="blue">Complemento solicitud SARE 66524</h1>
			</div>

			<div class="modal-body">
				<div class="row">
					<div class="col-xs-12">
						<form id="form_comp_uso" name="form_comp_uso">
							<div class="wysiwyg-editor" id="complemento" name="complemento"></div>
						</form>
					</div>
				</div>
			</div>	

			<div class="modal-footer">
				<button type="button" class="btn btn-danger pull-left" data-dismiss="modal" onclick="show_hide_modals()"><i class="fa fa-times">&nbsp;</i>Cancelar</button>
				<button type="button" class="btn btn-success" data-dismiss="modal" onclick="guardar_complemento(document.getElementById('complemento').innerHTML,1,3)"><i class="fa fa-check">&nbsp;</i>Aprobar solicitud</button>
			</div>

		</div>	
	</div>
</div>
