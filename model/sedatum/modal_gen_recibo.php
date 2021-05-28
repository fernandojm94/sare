<?php
	include('../../model/solicitud/fill.php');
	$id = $_POST['id']; 
	$expediente = fill_expediente($id);
?>

<style type="text/css">
    #giro_chosen, .chosen-container-multi .chosen-choices li.search-field, .chosen-container-multi .chosen-choices li.search-field input[type="text"]{
        width: 100% !important;
    }
</style>


<div id="modal_rec" class="modal" tabindex="-1" style="overflow-y:auto;">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h1 class="blue">Costo solicitud <?=$expediente['folio'];?></h1>
			</div>

			<div class="modal-body">
				<div class="row">
					<div class="col-xs-2">
					</div>
					<div class="col-xs-8">
						<form id="form_gen_re" name="form_gen_re">
                            <div class="form-group">
                                <label class="col-md-12 control-label">Giro</label>  
                                <div class="col-md-12 inputGroupContainer">
                                    <div class="input-group col-sm-12">
                                        <span class="input-group-addon"><i class="fa fa-building"></i></span>
                                        <select class="form-control col-xs-10 col-sm-7" name="giro" id="giro" data-placeholder="Elige una opción..." required disabled>
                                            <option value="1">Abarrotes</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <br><br><br><br>							
                       		<div class="form-group">
								<label class="col-sm-12 control-label no-padding-right">Costo </label>
								<div class="col-md-12 inputGroupContainer">
									<div class="input-group col-sm-12">										
										<span class="input-group-addon"><i class="fa fa-usd"></i></span>											
										<input name="costo" id="costo" placeholder="Costo" class="col-xs-10 col-sm-7" type="number" value="150" required disabled />
										<span class="help-inline col-xs-12 col-sm-5">
											<label class="middle">
												<input class="ace" type="checkbox" id="check_edit" onclick="cambia_edit()" />
												<span class="lbl">  Modificar</span>
											</label>
										</span>										
									</div>
								</div>	
							</div>
                       		<br><br><br><br>

						</form>
					</div>
				</div>
			</div>	

			<div class="modal-footer">
				<button type="button" class="btn pull-left" data-dismiss="modal" onclick="show_hide_modals()"><i class="fa fa-times">&nbsp;</i>Cancelar</button>
				<button type="button" class="btn btn-primary" onclick="genera_orden(document.getElementById('giro').value,document.getElementById('costo').value,<?=$id;?>)"><i class="fa fa-money">&nbsp;</i>Generar orden de pago</button>
			</div>

		</div>	
	</div>
</div>


